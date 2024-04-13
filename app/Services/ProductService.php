<?php
namespace App\Services;

class ProductService
{
    public function lists()
    {
        return 'aqui tiene q estar toda las lista';
    }

    /**
     * Search a specific product
     * @param string $id
     * @return array return the data about of a product: id, name, stock, price
     */
    public function search(string $id): array
    {
        return  [];
    }

    /**
     * Add a product in the list
     * @param array $product
     * @return array return the data of product include your id
     */

    public function add(array $product): array
    {
        $product->id = uniqid('', true);

        return [];
    }

    public function delete(string $id)
    {

    }
}
