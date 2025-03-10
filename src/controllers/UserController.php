<?php
require_once __DIR__ . '/../constants.php';
require_once __DIR__ . '/../models/User.php';

class UserController
{
  public function index()
  {
    $user = new User();
    $users = $user->fetchAll();

    include __DIR__ . '/../views/users.view.php';
  }

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
        header('Location:' . BASE_URL . '/users.php?success=1');
        exit;
      } else {
        $error = 'Email already exists.';
        include __DIR__ . '/../views/create-user.view.php';
      }
    } else {
      include __DIR__ . '/../views/create-user.view.php';
    }
  }

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
        header('Location:' . BASE_URL . '/users.php?success=1');
        exit;
      } else {
        $error = 'User does not exist.';
        include __DIR__ . '/../views/update-user.view.php';
      }
    } else {
      $user = new User();
      $user_data = $user->fetchOne($_GET['id']);

      include __DIR__ . '/../views/update-user.view.php';
    }
  }

  public function deleteUser()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = $_POST['id'];
      $user = new User();

      if ($user->delete($id)) {
        header('Location:' . BASE_URL . '/users.php?success=1');
        exit;
      } else {
        $error = 'User does not exists.';
        include __DIR__ . '/../views/delete-user.view.php';
      }
    } else {
      $user = new User();
      $user_data = $user->fetchOne($_GET['id']);

      include __DIR__ . '/../views/delete-user.view.php';
    }
  }
}
