<?php
require_once __DIR__ . '/../database.php';

class User
{
  private $connection;

  public function __construct()
  {
    global $database;
    $this->connection = $database;
  }

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

  public function delete($id)
  {
    $query = $this->connection->prepare("DELETE FROM users WHERE id = ?");
    return $query->execute([$id]);
  }

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

  public function fetchOne($id)
  {
    $query = $this->connection->prepare("SELECT * FROM users WHERE id = ?");
    $query->execute([$id]);
    return $query->fetch(PDO::FETCH_ASSOC);
  }

  public function fetchOneByEmail($email)
  {
    $query = $this->connection->prepare("SELECT * FROM users WHERE email = ?");
    $query->execute([$email]);
    return $query->fetch(PDO::FETCH_ASSOC);
  }

  public function fetchOnebyResetToken($token)
  {
    $query = $this->connection->prepare("SELECT * FROM users WHERE reset_token = ?");
    $query->execute([$token]);
    return $query->fetch(PDO::FETCH_ASSOC);
  }

  public function fetchAll()
  {
    $query = $this->connection->prepare("SELECT * FROM users");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

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

  public function resetPassword($id, $password)
  {
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $query = $this->connection->prepare(
      "UPDATE users SET password = ?, reset_token = NULL, reset_token_expiration = NULL WHERE id = ?"
    );
    return $query->execute([$hashed_password, $id]);
  }

  public function setResetToken($id, $token, $expires_at)
  {
    $query = $this->connection->prepare(
      "UPDATE users SET reset_token = ?, reset_token_expiration = ? WHERE id = ?"
    );
    return $query->execute([$token, $expires_at, $id]);
  }

  public function isAdmin($id)
  {
    $query = $this->connection->prepare("SELECT role FROM users WHERE id = ?");
    $query->execute([$id]);
    $role = $query->fetchColumn();
    return $role === 1;
  }
}
