<?php

use App\Models\Product;

function getProductName($id) 
{
    return Product::findOrFail($id)->name;
}