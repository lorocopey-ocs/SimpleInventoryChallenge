<?php
    
    namespace SimpleInventoryChallenge\Application;
    
    use ProductRepository;
    use SimpleInventoryChallenge\Domain\Product;
    
    class ProductService
    {
        private ProductRepository $productRepository;
        
        public
        function __construct(
            ProductRepository $productRepository,
        ) {
            $this -> productRepository = $productRepository;
        }
        
        public
        function addProduct(
            $name,
            $amount,
            $price,
        )
        : void {
            $product = new Product('', $name, $amount, $price);
            $this -> productRepository -> add($product);
        }
        
        public
        function removeById(
            $id,
        )
        : void {
            $this -> productRepository -> removeById($id);
        }
        
        public
        function findProduct(
            $name,
        ) {
            return $this -> productRepository -> findByName($name);
        }
        
        public
        function listProducts()
        {
            return $this -> productRepository -> findAll();
        }
        
        public
        function loadProductsFromFile()
        {
            $this -> productRepository -> loadProductsFromFile();
        }
    }

