<?php
    namespace SimpleInventoryChallenge\Application;
    use ProductRepository;
    use SimpleInventoryChallenge\Domain\Product;
    
    class ProductService {
        private ProductRepository $productRepository;
        
        public function __construct(ProductRepository $productRepository) {
            $this->productRepository = $productRepository;
        }
        
        public function addProduct($name, $amount, $price)
        : void {
            $product = new Product($name, $amount, $price);
            $this->productRepository->add($product);
        }
        
        public function removeProduct($name)
        : void {
            $this->productRepository->removeByName($name);
        }
        
        public function findProduct($id) {
            return $this->productRepository->findById($id);
        }
        
        public function listProducts() {
            return $this->productRepository->findAll();
        }
        
        public function saveProductsToFile() {
            $this->productRepository->saveProductsToFile();
        }
        
        public function loadProductsFromFile() {
            $this->productRepository->loadProductsFromFile();
        }
    }

