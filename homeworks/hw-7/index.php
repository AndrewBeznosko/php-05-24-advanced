<?php

// HW 7. Single Responsibility
class Product {
    public function get(name) {}
    public function set(name, value) {}
}

class ProductController {
    public function __construct(private Product $product) {
    }

    public function save() {}
    public function update() {}
    public function delete() {}
}

class ProductDisplay {
    public function __construct(private Product $product) {
    }

    public function print() {}

    public function show() {}
}