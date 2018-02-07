<?php 

interface Button {}

class WebButton implements Button {}

interface Input {}

interface Form {
  public function addButton(Button $button);
  public function addInput(Input $input);
}

class IOSForm implements Form {
  public function addButton(Button $button) {
    
  }
  
  public function addInput(Input $input) {
    
  }

}

class IOSButton implements Button {}

class IOSInput implements Input {}
  
abstract class AbstractFactory {     
  abstract public function createButton() : Button;
  abstract public function createInput() : Input;
  abstract public function createForm() : Form;  
}

class IOSFactory extends AbstractFactory {
  public function createButton() : Button {
    return new IOSButton();
  }
  
  public function createInput() : Input {
    return new IOSInput();
  }
  
  public function createForm() : Form {
    return new IOSForm();
  }
}

$factory = new IOSFactory;

$button = $factory->createButton();
$input  = $factory->createInput();
$form   = $factory->createForm();

$form->addButton($button);
$form->addInput($input);