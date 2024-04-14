<?php
namespace App\Services;

class ProductService
{
    public string $pathDB = "../database/data.json";

    /**
     * Open the file data.json
     * This function opens the data.json and returns a new array con index custom this is the id each product
     * @return array convert the data got in an array
     */
    public function getDataJson(): array
    {
        $json = json_decode(file_get_contents($this->pathDB));
        $data = [];
        foreach ($json as $row) {
            $data[$row->id] = $row;
        }
        return $data;
    }

    /**
     * Updated or write the data in the file data.json
     * @param array $data new data save in the file
     * @return bool
    */
    public function updateDataJson(array $data): bool
    {
        $json = json_encode(array_values($data), JSON_PRETTY_PRINT);
        return file_put_contents($this->pathDB, $json);
    }

    /**
     * @return array send all the products registered
    */
    public function lists(): array
    {
        return $this->getDataJson();
    }

    /**
     * Add a product in the list
     * @param array $product
     * @return array return the data of product include your id
     */

    public function add(array &$product): array
    {
        $id = uniqid('', true);
        $data = $this->getDataJson();
        $product['id'] = str_replace('.','', $id);
        $data[$id] = (object)$product;
        $this->updateDataJson($data);

        return $product;
    }

    /**
     * Remove a product specific of the list
     * @param string $id
     * @return string Send a confirmation message
    */
    public function delete(string $id): string
    {
        $data = $this->getDataJson();
        if (isset($data[$id])) {
            unset($data[$id]);
            $response = $this->updateDataJson($data);
        }
        return $response ? 'Deleted data' : 'Dont Delete';
    }

    /**
     * Search product by id
     * Search a product in specific according to id
     * and return 2 different value according to the type string
     * @param string $id
     * @param string $type there are 2 options: index and values
     * @return int|array send index or value of the object
     *
    */
    public function findById(string $id, string $type): int|array
    {
        $index = -1;
        $item = [];
        $data = $this->getDataJson();
        foreach ($data as $indexProd => $product) {
            if ($product->id === $id) {
                $item = $product;
                $index = $indexProd;
                break;
            }
        }

        return $type === 'index' ? $index : (array)$item;
    }

    /**
     * Search products by name
     * This function filters the products according to the search string
     * @param array $products List of products to search
     * @param string $search The search string
     * @return array An array containing the products that match the search.
    */
    public function searchByName(array $products, string $search): array
    {
        $productsTmp = [];
        foreach($products as $product) {
            if (str_contains(strtolower($product->name), strtolower($search))){
                $productsTmp[] = $product;
            }
        }
        return $productsTmp;
    }
}
