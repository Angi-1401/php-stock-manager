<?php
require_once __DIR__ . '/../constants.php';
require_once __DIR__ . '/../mail.php';
require_once __DIR__ . '/../models/User.php';

$env = parse_ini_file(ROOT_PATH . '/.env');

session_start();

class AuthController
{
  /**
   * Handles the signup process
   *
   * Creates a new user with given parameters and logs them in.
   * If the user already exists, shows an error message.
   *
   * @return void
   */
  public function signup()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $email = $_POST['email'];
      $password = $_POST['password'];

      $user = new User();

      if ($user->create($first_name, $last_name, $email, $password)) {
        header('Location:' . PAGES_URL . '/auth/signin.php?success=1');
        exit;
      } else {
        $error = 'Email already exists.';
        include ROOT_PATH . '/src/views/auth/signup.view.php';
      }
    } else {
      include ROOT_PATH . '/src/views/auth/signup.view.php';
    }
  }

  /**
   * Handles the signin process
   *
   * Authenticates a user with given email and password. If successful,
   * sets session variables for the user and redirects to the dashboard.
   * If authentication fails, displays an error message.
   *
   * @return void
   */
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

        header('Location:' . PAGES_URL . '/dashboard.php');
        exit;
      } else {
        $error = 'Invalid email or password.';
        include ROOT_PATH . '/src/views/auth/signin.view.php';
      }
    } else {
      include ROOT_PATH . '/src/views/auth/signin.view.php';
    }
  }

  /**
   * Handles the signout process
   *
   * Destroys the session and redirects to the homepage.
   *
   * @return void
   */
  public function signout()
  {
    session_destroy();
    header('Location:' . BASE_URL . '/index.php');
    exit;
  }

  /**
   * Displays the user profile page
   *
   * Fetches the user data based on the session ID and includes the
   * profile view.
   *
   * @return void
   */
  public function profile()
  {
    $user = new User();
    $user_data = $user->fetchOne($_SESSION['id']);

    include ROOT_PATH . '/src/views/auth/profile.view.php';
  }

  /**
   * Updates the user profile
   *
   * Handles the update of user data when submitted from the profile page.
   * If the request method is POST, updates the user data and redirects to
   * the profile page with a success message. If the request method is not
   * POST, includes the profile view to display the user data.
   *
   * @return void
   */
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

      header('Location:' . PAGES_URL . '/auth/profile.php?success=1');
      exit;
    } else {
      include ROOT_PATH . '/src/views/auth/profile.view.php';
    }
  }

  /**
   * Handles the change of user password
   *
   * Authenticates the user with given current password and updates
   * the user's password with the new one if the authentication is successful.
   * If the authentication fails, displays an error message.
   *
   * @return void
   */
  public function changePassword()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $password = $_POST['password'];
      $password_new = $_POST['password_new'];

      $user = new User();

      if ($user->updatePassword($_SESSION['id'], $password, $password_new)) {
        header('Location:' . PAGES_URL . '/auth/profile.php?success=1');
        exit;
      } else {
        $error = 'Invalid password.';
        include ROOT_PATH . '/src/views/auth/profile.view.php';
      }
    } else {
      include ROOT_PATH . '/src/views/auth/profile.view.php';
    }
  }

  /**
   * Handles the forgot password request
   *
   * If the request method is POST, generates a reset token, sets it in the user's
   * database record and sends an email with a link to reset the password.
   * If the request method is not POST, displays the forgot password view.
   *
   * @return void
   */
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

        $url = PAGES_URL . '/auth/reset-password.php?reset_token=' . urlencode($reset_token);

        $mail = new Mail();
        $mail->sendPasswordResetEmail($email, $url);

        $message = 'A password reset link has been sent to your email.';
        include ROOT_PATH . '/src/views/forgot-password.view.php';
      } else {
        $error = 'Email not found.';
        include ROOT_PATH . '/src/views/auth/forgot-password.view.php';
      }
    } else {
      include ROOT_PATH . '/src/views/auth/forgot-password.view.php';
    }
  }

  /**
   * Resets the user's password.
   *
   * If the request method is POST, validates the reset token and
   * password, then updates the user's password if the validation is
   * successful. If the validation fails, displays an error message.
   * If the request method is not POST, displays the reset password view.
   *
   * @return void
   */
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

        include ROOT_PATH . '/src/views/auth/signin.view.php';
      } else {
        $error = 'Invalid or expired reset token.';

        include ROOT_PATH . '/src/views/auth/reset-password.view.php';
      }
    } else {
      $reset_token = $_GET['reset_token'];

      include ROOT_PATH . '/src/views/auth/reset-password.view.php';
    }
  }

  /**
   * Checks if the user is an admin
   *
   * @param int $id User ID
   *
   * @return bool True if the user is an admin, false otherwise
   */
  public function isAdmin($id)
  {
    $user = new User();
    return $user->isAdmin($id);
  }
}
