<?php
    
    namespace SimpleInventoryChallenge\Domain;
    
    use ProductRepository;
    
    class JsonProductRepository implements ProductRepository
    {
        private array  $products     = [];
        private string $productsFile = 'Storage/products.json';
        
        public
        function __construct()
        {
            $this -> loadProductsFromFile();
        }
        
        public
        function add(
            Product $product,
        ) {
            $this -> products[ 0 ] = $product;
            $this -> saveProductsToFile();
        }
        
        
        public
        function removeById(
            string $id,
        ) {
            foreach ($this -> products as $key => $product) {
                if ($product -> getId() === $id) {
                    unset($this -> products[ $key ]);
                    $this -> saveProductsToFile();
                    break;
                }
            }
        }
        
        public
        function findByName(
            string $name,
        )
        : array {
            $foundProducts = [];
            foreach ($this -> products as $product) {
                if ($product -> getName() === $name) {
                    $foundProducts[] = $product;
                }
            }
            
            return $foundProducts;
        }
        
        
        public
        function findAll()
        : array
        {
            return array_values($this -> products);
        }
        
        public
        function saveProductsToFile()
        {
            $productsArray = [];
            if (!file_exists($this -> productsFile)) {
                mkdir(dirname($this -> productsFile), 0777, true);
            }
            foreach ($this -> products as $product) {
                $productsArray[] = [
                    'id'     => uniqid(),
                    'name'   => $product -> getName(),
                    'price'  => $product -> getPrice(),
                    'amount' => $product -> getAmount(),
                ];
            }
            
            file_put_contents($this -> productsFile, json_encode($productsArray));
        }
        
        
        public
        function loadProductsFromFile()
        {
            if (file_exists($this -> productsFile)) {
                $productsData = json_decode(file_get_contents($this -> productsFile), true);
                foreach ($productsData as $productData) {
                    $product                                 = new Product($productData[ 'id' ], $productData[ 'name' ],
                        $productData[ 'amount' ], $productData[ 'price' ]);
                    $this -> products[ $product -> getId() ] = $product;
                }
            }
        }
    }
