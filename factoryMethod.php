<?php

interface Transport {
  public fuction setColor($color);
}

class Car implements Transport {
  public function setColor($color) {}
}

abstract class TransportFactory {
  
  public function create() : Transport {
    $transport = $this->factoryMethod();
    $transport->setColor('black');
    return $transport;
  }
  
  abstract protected function factoryMethod() : Transport
  
}

class CarFactory extends TransportFactory {
  protected function factoryMethod() : Transport {
    return new Car();
  }
}