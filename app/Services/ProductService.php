<?php
namespace App\Services;

class ProductService
{
    public static array $products = [
        [
            "id"    => '00abc',
            "name"  => 'Producto Numero 1',
            "stock" => 15,
            "price" => 15.02
        ],
        [
            "id"    => '01abc',
            "name"  => 'Producto Numero 2',
            "stock" => 25,
            "price" => 35.20
        ],
        [
            "id"    => '02abc',
            "name"  => 'Producto Numero 3',
            "stock" => 50,
            "price" => 49.99
        ]
    ];

    /**
     * @return array send all the products registered
    */
    public function lists(): array
    {
        return self::$products;
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

    public function add(array &$product): array
    {
        $product['id'] = uniqid('', true);
        self::$products[] = $product;

        return self::$products;
    }

    public function delete(string $id)
    {

    }
}
