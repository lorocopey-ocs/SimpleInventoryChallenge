<?php

require_once 'Exceptions/ProductNotFoundException.php';

class ProductService {
    
    /** since I'm not using a database and I don't like to use in memory variables
    * , I decided the best approach I could do it is saving the data in a file 
    */
    public string $filepath = 'data.json';

    public function save($data) {
        
        $data['id'] = uniqid();
        //sanitaze
        $data['name'] = trim($data['name']);

        $products = $this->findAll();
        $products[] = $data;

        file_put_contents($this->filepath, json_encode($products));
        return $data;
    }
    
    public function delete(string $id) {
        
        $productFound = false;
        $products = $this->findAll();

        foreach($products as $key=>$product){
            if( $product['id'] == $id){
                unset($products[$key]);
                $productFound = true;
                break;
            }
        }

        if($productFound){
            file_put_contents($this->filepath, json_encode(array_values($products)));
        }else{
            throw new ProductNotFoundException("Unable to delete the element");
        }

    }
    
    public function findAll() : array {

        if (file_exists($this->filepath)) {
            $data = file_get_contents($this->filepath);
            return json_decode($data, true);
        }
        
        return [];
    }

    public function filterByProductName(string $productName) : array {
        $products = $this->findAll();
        $filteredData = array_values(array_filter($products,function($product) use ($productName) {
            return $product['name'] == $productName;
        }));

        return $filteredData;
    }
}

