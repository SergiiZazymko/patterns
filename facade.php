<?php

class OldSystem {
  
  public function performSomeOperation() {}
  
  public function performSomeOperation2() {}
  
  public function doSomething() {}
}

class AnotherOldSystem {
  
  public function someAction() {}
  
  public function callOldApi() {}
  
  public function Kakoeto_Deystvie() {}
}

class LegacyFacade {
  
  private $oldSystem;
  private $anotherOldSystem;
  
  public function __construct() {
    $this->oldSystem        = new OldSystem;
    $this->anotherOldSystem = new AnotherOldSystem;
  }
  
  public function init() {
    $this->oldSystem->performSomeOperation();
    $this->oldSystem->doSomething();
    $this->anotherOldSystem->Kakoeto_Deystvie();
  }
  
}