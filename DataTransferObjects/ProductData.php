<?php

namespace DataTransferObjects;

final readonly class ProductData
{
    public function __construct(
        public string $name,
        public float $price,
        public int $quantity,
    )
    {
    }

    public static function fromArray(array $data): ProductData
    {
        return new self(
            data_get($data, 'name'),
            data_get($data, 'price'),
            data_get($data, 'quantity'),
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
        ];
    }
}