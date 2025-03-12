<?php
require_once __DIR__ . '/../constants.php';
require_once __DIR__ . '/../models/User.php';

class UserController
{
  /**
   * Index action
   * 
   * Fetches all users and renders the users view
   *
   * @return void
   */
  public function index()
  {
    $user = new User();
    $users = $user->fetchAll();

    include ROOT_PATH . '/src/views/users/users.view.php';
  }

  /**
   * Create user action
   * 
   * Handles the creation of a user, if the request method is POST.
   * If the user is created successfully, redirects the user to the users page with a success message.
   * If the user already exists (i.e. email already exists), renders the create user form with an error message.
   * If the request method is not POST, renders the create user form.
   * 
   * @return void
   */
  public function createUser()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $role = $_POST['role'];

      $user = new User();

      if ($user->create($first_name, $last_name, $email, $password, $role)) {
        header('Location:' . PAGES_URL . '/users/users.php?success=1');
        exit;
      } else {
        $error = 'Email already exists.';
        include ROOT_PATH . '/src/views/users/create-user.view.php';
      }
    } else {
      include ROOT_PATH . '/src/views/users/create-user.view.php';
    }
  }

  /**
   * Update user action
   * 
   * Handles the update of a user, if the request method is POST.
   * If the user is updated successfully, redirects the user to the users page with a success message.
   * If the user does not exist (i.e. email does not exist), renders the update user form with an error message.
   * If the request method is not POST, renders the update user form.
   * 
   * @return void
   */
  public function updateUser()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = $_POST['id'];
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $email = $_POST['email'];
      $role = $_POST['role'];

      $user = new User();

      if ($user->update($id, $first_name, $last_name, $email, $role)) {
        header('Location:' . PAGES_URL . '/users/users.php?success=1');
        exit;
      } else {
        $error = 'User does not exist.';
        include ROOT_PATH . '/src/views/users/update-user.view.php';
      }
    } else {
      $user = new User();
      $user_data = $user->fetchOne($_GET['id']);

      include ROOT_PATH . '/src/views/users/update-user.view.php';
    }
  }

  /**
   * Delete user action
   * 
   * Handles the deletion of a user, if the request method is POST.
   * If the user is deleted successfully, redirects the user to the users page with a success message.
   * If the user does not exist (i.e. email does not exist), renders the delete user form with an error message.
   * If the request method is not POST, renders the delete user form.
   * 
   * @return void
   */

  public function deleteUser()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = $_POST['id'];
      $user = new User();

      if ($user->delete($id)) {
        header('Location:' . PAGES_URL . '/users/users.php?success=1');
        exit;
      } else {
        $error = 'User does not exists.';
        include ROOT_PATH . '/src/views/users/delete-user.view.php';
      }
    } else {
      $user = new User();
      $user_data = $user->fetchOne($_GET['id']);

      include ROOT_PATH . '/src/views/users/delete-user.view.php';
    }
  }
}
