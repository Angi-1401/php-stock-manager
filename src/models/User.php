<?php
require_once __DIR__ . '/../database.php';

class User
{
  private $connection;

  /**
   * User constructor.
   * 
   * Initializes the User object by setting up a connection to the database.
   */
  public function __construct()
  {
    global $database;
    $this->connection = $database;
  }

  /**
   * Creates a new user with given parameters.
   * 
   * If the given email already exists, returns false.
   * If the given email does not exist, creates a new user with the given parameters
   * and returns true.
   * 
   * @param string $first_name The first name of the user.
   * @param string $last_name The last name of the user.
   * @param string $email The email of the user.
   * @param string $password The password of the user.
   * @param int $role The role of the user. If not set, defaults to 2 (User).
   * 
   * @return bool True if the user was created successfully, false otherwise.
   */
  public function create($first_name, $last_name, $email, $password, $role = 2)
  {
    $query = $this->connection->prepare("SELECT * FROM users WHERE email = ?");
    $query->execute([$email]);
    if ($query->rowCount() > 0) {
      return false;
    }

    $query = $this->connection->prepare("SELECT COUNT(*) as count FROM users");
    $query->execute();
    $count = $query->fetchColumn();

    $role = ($count == 0) ? 1 : $role;
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $query = $this->connection->prepare(
      "INSERT INTO users (first_name, last_name, email, password, role) VALUES (?, ?, ?, ?, ?)"
    );
    return $query->execute([$first_name, $last_name, $email, $hashed_password, $role]);
  }

  /**
   * Updates a user with the given parameters.
   * 
   * If the $role parameter is null, the user's current role is used.
   * If the $role parameter is not null, the user's role is updated to the given value.
   * 
   * @param int $id The ID of the user to update.
   * @param string $first_name The first name of the user.
   * @param string $last_name The last name of the user.
   * @param string $email The email of the user.
   * @param int $role The role of the user.
   * 
   * @return bool True if the user was updated successfully, false otherwise.
   */
  public function update($id, $first_name, $last_name, $email, $role = null)
  {
    if ($role === null) {
      $query = $this->connection->prepare("SELECT role FROM users WHERE id = ?");
      $query->execute([$id]);
      $role = $query->fetchColumn();
    }

    $query = $this->connection->prepare(
      "UPDATE users SET first_name = ?, last_name = ?, email = ?, role = ? WHERE id = ?"
    );
    return $query->execute([$first_name, $last_name, $email, $role, $id]);
  }

  /**
   * Deletes a user by their ID.
   * 
   * Executes a DELETE query to remove the user with the specified ID from the database.
   * 
   * @param int $id The ID of the user to delete.
   * 
   * @return bool True if the user was deleted successfully, false otherwise.
   */

  public function delete($id)
  {
    $query = $this->connection->prepare("DELETE FROM users WHERE id = ?");
    return $query->execute([$id]);
  }

  /**
   * Logs in a user given their email and password.
   * 
   * If the given email does not exist, returns false.
   * If the given email exists, checks if the given password matches the stored password.
   * If the given password matches the stored password, returns the user object.
   * If the given password does not match the stored password, returns false.
   * 
   * @param string $email The email of the user to log in.
   * @param string $password The password of the user to log in.
   * 
   * @return array|bool The user object if the login was successful, false otherwise.
   */
  public function login($email, $password)
  {
    $query = $this->connection->prepare("SELECT * FROM users WHERE email = ?");
    $query->execute([$email]);
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
      return false;
    }

    if ($user && password_verify($password, $user["password"])) {
      return $user;
    }
    return false;
  }

  /**
   * Fetches a user by their ID.
   * 
   * Executes a query to retrieve a user record from the database based on the provided user ID.
   *
   * @param int $id The ID of the user to fetch.
   * 
   * @return array|false An associative array of the user data if found, false otherwise.
   */

  public function fetchOne($id)
  {
    $query = $this->connection->prepare("SELECT * FROM users WHERE id = ?");
    $query->execute([$id]);
    return $query->fetch(PDO::FETCH_ASSOC);
  }

  /**
   * Fetches a user by their email.
   * 
   * Executes a query to retrieve a user record from the database based on the provided email.
   * 
   * @param string $email The email of the user to fetch.
   * 
   * @return array|false An associative array of the user data if found, false otherwise.
   */
  public function fetchOneByEmail($email)
  {
    $query = $this->connection->prepare("SELECT * FROM users WHERE email = ?");
    $query->execute([$email]);
    return $query->fetch(PDO::FETCH_ASSOC);
  }

  /**
   * Fetches a user by their reset token.
   * 
   * Executes a query to retrieve a user record from the database based on the provided reset token.
   * 
   * @param string $token The reset token of the user to fetch.
   * 
   * @return array|false An associative array of the user data if found, false otherwise.
   */
  public function fetchOnebyResetToken($token)
  {
    $query = $this->connection->prepare("SELECT * FROM users WHERE reset_token = ?");
    $query->execute([$token]);
    return $query->fetch(PDO::FETCH_ASSOC);
  }

  /**
   * Fetches all users.
   * 
   * Executes a query to retrieve all user records from the database.
   * 
   * @return array An associative array of all user data.
   */
  public function fetchAll()
  {
    $query = $this->connection->prepare("SELECT * FROM users");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
   * Updates a user's password.
   * 
   * Checks if the given password matches the stored password.
   * If the given password matches the stored password, updates the user's password to the new one.
   * If the given password does not match the stored password, returns false.
   * 
   * @param int $id The ID of the user to update.
   * @param string $password The current password of the user to update.
   * @param string $password_new The new password of the user to update.
   * 
   * @return bool True if the password was updated successfully, false otherwise.
   */
  public function updatePassword($id, $password, $password_new)
  {
    $query = $this->connection->prepare("SELECT password FROM users WHERE id = ?");
    $query->execute([$id]);

    $current_password = $query->fetchColumn();
    if (!password_verify($password, $current_password)) {
      return false;
    }

    $hashed_password = password_hash($password_new, PASSWORD_BCRYPT);

    $query = $this->connection->prepare(
      "UPDATE users SET password = ? WHERE id = ?"
    );
    return $query->execute([$hashed_password, $id]);
  }

  /**
   * Resets a user's password.
   * 
   * Hashes the given password and updates the user's password to the new one.
   * Also sets the reset token and reset token expiration to null.
   * 
   * @param int $id The ID of the user to reset the password for.
   * @param string $password The new password of the user to reset.
   * 
   * @return bool True if the password was reset successfully, false otherwise.
   */
  public function resetPassword($id, $password)
  {
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $query = $this->connection->prepare(
      "UPDATE users SET password = ?, reset_token = NULL, reset_token_expiration = NULL WHERE id = ?"
    );
    return $query->execute([$hashed_password, $id]);
  }

  /**
   * Sets the reset token and expiration date for the given user.
   * 
   * Executes a query to update the user's reset token and expiration date in the database.
   * 
   * @param int $id The ID of the user to set the reset token for.
   * @param string $token The reset token to set for the user.
   * @param string $expires_at The expiration date for the reset token to set.
   * 
   * @return bool True if the reset token and expiration date were set successfully, false otherwise.
   */
  public function setResetToken($id, $token, $expires_at)
  {
    $query = $this->connection->prepare(
      "UPDATE users SET reset_token = ?, reset_token_expiration = ? WHERE id = ?"
    );
    return $query->execute([$token, $expires_at, $id]);
  }

  /**
   * Checks if the user is an admin
   * 
   * Executes a query to retrieve the role of the user with the given ID.
   * If the role is 1, returns true; otherwise, returns false.
   * 
   * @param int $id The ID of the user to check.
   * 
   * @return bool True if the user is an admin, false otherwise.
   */
  public function isAdmin($id)
  {
    $query = $this->connection->prepare("SELECT role FROM users WHERE id = ?");
    $query->execute([$id]);
    $role = $query->fetchColumn();
    return $role == 1;
  }
}
