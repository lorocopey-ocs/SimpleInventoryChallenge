<?php
    
    use SimpleInventoryChallenge\Domain\Product;
    
    interface ProductRepository {
        public function add(Product $product);
        public function removeByName(string $name);
        public function findById( string $name);
        public function findAll();
    }
    
    

