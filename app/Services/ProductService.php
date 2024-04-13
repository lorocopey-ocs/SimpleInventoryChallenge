<?php
namespace App\Services;

class ProductService
{
    public string $pathDB = "../database/data.json";

    /**
     * Open the file data.json
     * @return array convert the data got in array
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
     * @return array send all the products registered
    */
    public function lists(): array
    {
        return $this->getDataJson();
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
        $data = $this->getDataJson();
        $product['id'] = str_replace('.','', $id);
        $data[$id] = (object)$product;
        $json = json_encode(array_values($data), JSON_PRETTY_PRINT);
        file_put_contents($this->pathDB, $json);

        return $product;
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
}
