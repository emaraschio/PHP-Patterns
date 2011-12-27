<?php

interface cashRegister {
    public function calculateTotal();
}

class weeklyCashRegister implements cashRegister {
    
    private $amount;
    private $tax;
    
    public function __construct($amount, $tax) {
    	$this->amount = $amount;
    	$this->tax = $tax;
    }
    
    public function getAmount() {
        return $this->amount;
    }
    
    public function getTax() {
        return $this->tax;
    }
    
    public function calculateTotal() {
        return $this->getAmount() * $this->getTax();
    }
}

class weekendCashRegister implements cashRegister {
    
    private $amount;
    private $tax;
    private $shippingCost;
    
    public function __construct($amount, $tax, $shippingCost) {
    	$this->amount = $amount;
    	$this->tax = $tax;
    	$this->shippingCost = $shippingCost;
    }
    
    public function getShippingCost() {
        return $this->shippingCost;        
    }
    
    public function getAmount() {
        return $this->amount;
    }
    
    public function getTax() {
        return $this->tax;
    }
    
    public function calculateTotal() {
        return ($this->getAmount() * $this->getTax()) + $this->getShippingCost();
    }
}





