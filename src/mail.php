<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/constants.php';

$env = parse_ini_file(ROOT_PATH . '/.env');

class Mail
{
  private $mail;

  /**
   * Mail constructor.
   * 
   * Initializes the PHPMailer object and sets up SMTP configuration using environment variables.
   * Configures the SMTP host, authentication, username, password, encryption type, and port.
   * Sets the sender's email address for the mailer.
   * Handles exceptions if the PHPMailer setup fails.
   */
  public function __construct()
  {
    global $env;

    $this->mail = new PHPMailer(true);
    try {
      $this->mail->isSMTP();
      $this->mail->Host = $env['SMTP_HOST'];
      $this->mail->SMTPAuth = true;
      $this->mail->Username = $env['SMTP_USER'];
      $this->mail->Password = $env['SMTP_PASS'];
      $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $this->mail->Port = $env['SMTP_PORT'];

      $this->mail->setFrom($env['SMTP_USER'], 'Support');
    } catch (Exception $error) {
      echo "Failed to setup PHPMailer. Error: {$this->mail->ErrorInfo}";
    }
  }

  /**
   * Sends a password reset email to the user.
   *
   * @param string $toEmail The email address of the user to send the password reset email to.
   * @param string $url The URL to include in the email for the user to reset their password.
   *
   * @return bool|string True if the email is sent successfully, otherwise an error message with details.
   */
  public function sendPasswordResetEmail($toEmail, $url)
  {
    global $env;

    try {
      $this->mail->addAddress($toEmail);
      $this->mail->Subject = 'Reset password';
      $this->mail->isHTML(true);
      $this->mail->Body = "
        <p>Hi,</p>
        <p>We received a request to reset your password.</p>
        <p>Please, click the link below:</p>
        <p>
          <a href=\"http://{$env['DB_HOST']}{$url}\">http://{$env['DB_HOST']}{$url}</a>
        </p>
        <p>If you did not request a password reset, you can ignore this email.</p>
      ";

      $this->mail->send();
      return true;
    } catch (Exception $error) {
      return "Failed to send email. Error: {$this->mail->ErrorInfo}";
    }
  }
}
