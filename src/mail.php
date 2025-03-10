<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$env = parse_ini_file(__DIR__ . "/../.env");

class Mail
{
  private $mail;

  public function __construct()
  {
    global $env;

    $this->mail = new PHPMailer(true);
    try {
      $this->mail->isSMTP();
      $this->mail->Host = $env["SMTP_HOST"];
      $this->mail->SMTPAuth = true;
      $this->mail->Username = $env["SMTP_USER"];
      $this->mail->Password = $env["SMTP_PASS"];
      $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $this->mail->Port = $env["SMTP_PORT"];

      $this->mail->setFrom($env["SMTP_USER"], 'Support');
    } catch (Exception $error) {
      echo "Failed to setup PHPMailer. Error: {$this->mail->ErrorInfo}";
    }
  }

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
        <p><a href='http://{$env["DB_HOST"]}{$url}'>http://{$env["DB_HOST"]}{$url}</a></p>
        <p>If you did not request a password reset, you can ignore this email.</p>
      ";

      $this->mail->send();
      return true;
    } catch (Exception $error) {
      return "Failed to send email. Error: {$this->mail->ErrorInfo}";
    }
  }
}
