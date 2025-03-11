<?php
require_once __DIR__ . '/../constants.php';
require_once __DIR__ . '/../mail.php';
require_once __DIR__ . '/../models/User.php';

$env = parse_ini_file(__DIR__ . '/../../.env');

session_start();

class AuthController
{
  public function signup()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $email = $_POST['email'];
      $password = $_POST['password'];

      $user = new User();

      if ($user->create($first_name, $last_name, $email, $password)) {
        header('Location:' . BASE_URL . '/signin.php?success=1');
        exit;
      } else {
        $error = 'Email already exists.';
        include __DIR__ . '/../views/signup.view.php';
      }
    } else {
      include __DIR__ . '/../views/signup.view.php';
    }
  }

  public function signin()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $email = $_POST['email'];
      $password = $_POST['password'];

      $user = new User();
      $logged_in_user = $user->login($email, $password);

      if ($logged_in_user) {
        $_SESSION['first_name'] = $logged_in_user['first_name'];
        $_SESSION['last_name'] = $logged_in_user['last_name'];

        $_SESSION['user'] = $logged_in_user['first_name'] . ' ' . $logged_in_user['last_name'];
        $_SESSION['id'] = $logged_in_user['id'];
        $_SESSION['role'] = $logged_in_user['role'];

        header('Location:' . BASE_URL . '/dashboard.php');
        exit;
      } else {
        $error = 'Invalid email or password.';
        include __DIR__ . '/../views/signin.view.php';
      }
    } else {
      include __DIR__ . '/../views/signin.view.php';
    }
  }

  public function signout()
  {
    session_destroy();
    header('Location:' . BASE_URL . '/index.php');
    exit;
  }

  public function profile()
  {
    $user = new User();
    $user_data = $user->fetchOne($_SESSION['id']);

    include __DIR__ . '/../views/profile.view.php';
  }

  public function updateProfile()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $email = $_POST['email'];

      $user = new User();
      $user->update($_SESSION['id'], $first_name, $last_name, $email);

      $_SESSION['first_name'] = $first_name;
      $_SESSION['last_name'] = $last_name;
      $_SESSION['user'] = $first_name . ' ' . $last_name;

      header('Location:' . BASE_URL . '/profile.php?success=1');
      exit;
    } else {
      include __DIR__ . '/../views/profile.view.php';
    }
  }

  public function changePassword()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $password = $_POST['password'];
      $password_new = $_POST['password_new'];

      $user = new User();

      if ($user->updatePassword($_SESSION['id'], $password, $password_new)) {
        header('Location:' . BASE_URL . '/profile.php?success=1');
        exit;
      } else {
        $error = 'Invalid password.';
        include __DIR__ . '/../views/profile.view.php';
      }
    } else {
      include __DIR__ . '/../views/profile.view.php';
    }
  }

  public function forgotPassword()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $email = $_POST['email'];
      $user = new User();
      $user_data = $user->fetchOneByEmail($email);

      if ($user_data) {
        $reset_token = bin2hex(random_bytes(16));
        $reset_token_expiration = date('Y-m-d H:i:s', strtotime('+1 hour'));
        $user->setResetToken($user_data['id'], $reset_token, $reset_token_expiration);

        $url = BASE_URL . '/reset-password.php?reset_token=' . urlencode($reset_token);

        $mail = new Mail();
        $mail->sendPasswordResetEmail($email, $url);

        $message = 'A password reset link has been sent to your email.';
        include __DIR__ . '/../views/forgot-password.view.php';
      } else {
        $error = 'Email not found.';
        include __DIR__ . '/../views/forgot-password.view.php';
      }
    } else {
      include __DIR__ . '/../views/forgot-password.view.php';
    }
  }

  public function resetPassword()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $reset_token = $_POST['reset_token'];
      $password = $_POST['password'];

      $user = new User();
      $user_data = $user->fetchOneByResetToken($reset_token);

      if ($user_data) {
        $user->resetPassword($user_data['id'], $password);
        $message = 'Your password has been successfully reset.';

        include __DIR__ . '/../views/signin.view.php';
      } else {
        $error = 'Invalid or expired reset token.';

        include __DIR__ . '/../views/reset-password.view.php';
      }
    } else {
      $reset_token = $_GET['reset_token'];

      include __DIR__ . '/../views/reset-password.view.php';
    }
  }

  public function isAdmin($id)
  {
    $user = new User();
    return $user->isAdmin($id);
  }
}
