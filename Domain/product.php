<?php
    namespace SimpleInventoryChallenge\Domain {
        
        class Product {
            private $name;
            private $amount;
            private $price;
            
            public function __construct($name, $amount, $price) {
                $this->name = $name;
                $this->amount = $amount;
                $this->price = $price;
            }
            
            public function getName() {
                return $this->name;
            }
            
            public function getAmount() {
                return $this->amount;
            }
            
            public function getPrice() {
                return $this->price;
            }
        }
    }

