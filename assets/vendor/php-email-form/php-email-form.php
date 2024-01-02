<?php

class PHP_Email_Form {

  public $to;
  public $from_name;
  public $from_email;
  public $subject;
  public $message;
  public $headers;

  public function __construct() {
    $this->headers = "MIME-Version: 1.0" . "\r\n";
    $this->headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  }

  public function add_message($content, $label, $length = 70) {
    $this->message .= "<p><strong>{$label}:</strong> " . wordwrap($content, $length, "<br>") . "</p>";
  }

  public function send() {
    $message = "<html><body>{$this->message}</body></html>";
    return mail($this->to, $this->subject, $message, $this->headers . "From: {$this->from_name} <{$this->from_email}>");
  }
}

?>
