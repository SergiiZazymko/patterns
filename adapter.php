<?php

interface LoggerInterface {
  public function log($message);
}

class MyLogger implements LoggerInterface {
  public function log($message) {
    echo "Loggin message $message";
  }
}

class SuperLogger {
  public function superLog($message, $level) {
    echo "Super logging $message $level";
  }
}

class SuperLoggerAdapter implements LoggerInterface  {
  
  private $adaptee;
  
  public function __construct() {
    $this->adaptee = new SuperLogger();
  }
  
  public function log($message) {
    $this->adaptee->superLog($message, 'info')
  }
  
}

class Client {
  private $logger;
  
  public function setLogger(LoggerInterface $logger) {
    $this->logger = $logger;
  }
}

$client = new Cient();
$client->setLogger(new MyLogger);