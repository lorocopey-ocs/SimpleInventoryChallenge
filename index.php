<?php
    
    use SimpleInventoryChallenge\Application\ProductService;
    use SimpleInventoryChallenge\Domain\JsonProductRepository;
    
    require_once './Domain/Product.php';
    require_once './Domain/ProductRepository.php';
    require_once './Domain/jsonProductRepository.php';
    require_once './Application/ProductService.php';
    
    $productRepository = new JsonProductRepository();
    $productService = new ProductService($productRepository);
    
    $productService->loadProductsFromFile();
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    
    if ($uri === '/' || $uri === '/listProducts') {
        include './Presentation/Product/list.php';
    } elseif ($uri === '/addProduct') {
        include './Presentation/Product/add.php';
    } elseif ($uri === '/findProduct') {
        include './Presentation/Product/find.php';
    } else {
        echo "Not Found";
    }

