<?php
    
    use SimpleInventoryChallenge\Domain\Product;
    
    interface ProductRepository
    {
        public
        function add(
            Product $product,
        );
        
        public
        function removeById(
            string $id,
        );
        
        public
        function findByName(
            string $name,
        );
        
        public
        function findAll();
    }
    
    

