<?php
namespace App\Services;

class ProductService
{
    public array $products = [
        [
            "id"    => '661ae82f16c3b679637335',
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
        return $this->products;
    }

    /**
     * Search a specific product
     * @param string $id
     * @return array return the data about of a product: id, name, stock, price
     */
    public function search(string $id): array
    {
        $product = array_filter($this->products, function($product) use ($id){
            return $product['id'] === $id;
        });

        return array_values($product)[0] ?? [];
    }

    /**
     * Add a product in the list
     * @param array $product
     * @return array return the data of product include your id
     */

    public function add(array &$product): array
    {
        $id = uniqid('', true);
        $product['id'] = str_replace('.','', $id);
        $this->products[] = $product;

        return $this->products;
    }

    /**
     * Remove a product specific of the list
     * @param string $id
     * @return array All the products existing
    */
    public function delete(string $id): array
    {
        $index = $this->findById($id, 'index');
        array_splice($this->products, $index, 1);

        return $this->products;
    }

    /**
     * Search
     * @param string $id
     * @param string $type there are 2 option: index and values
     * @return int|array send index or position of the object or the value
     *
    */
    public function findById(string $id, string $type): int|array
    {
        $index = -1;
        $item = [];
        foreach ($this->products as $indexProd => $product) {
            if ($product['id'] === $id) {
                $item = $product;
                $index = $indexProd;
                break;
            }
        }

        return $type === 'index' ? $index : $item;
    }
}
