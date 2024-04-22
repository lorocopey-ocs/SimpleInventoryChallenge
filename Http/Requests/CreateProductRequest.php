<?php

namespace Http\Requests;

use Core\Validator;
use DataTransferObjects\ProductData;

class CreateProductRequest
{
    protected array $errors = [];

    public function validate($name, $price, $quantity): bool
    {
        if (! Validator::string(value: $name, max: 255)) {
            $this->errors['name'] = "The name field is required with a right length [1-255]";
        }

        if (! Validator::string(value: $price, max: 1000)) {
            $this->errors['price'] = "Price is required";
        } elseif (! Validator::number(value: $price)) {
            $this->errors['price'] = "Price must be a number";
        }

        if (! Validator::string(value: $quantity, max: 1000)) {
            $this->errors['quantity'] = "Quantity is required";
        } elseif (! Validator::number(value: $quantity)) {
            $this->errors['quantity'] = "Quantity must be a number";
        }

        return empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }
}