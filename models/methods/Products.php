<?php

namespace iAmirNet\HesabFa\Models\Methods;

use Azarinweb\Minimall\Models\Product;

trait Products
{
    public function setProduct($product_id)
    {
        $product = Product::find($product_id);
        $data = [];
        if ($product->hesabfa_code)
            $data['Code'] = $product->hesabfa_code;
        $data['Name'] = $product->name;
        $data['ItemType'] = 0;
        $data['SellPrice'] = $product->price()->integer / 10;
        $curl = $this->_curl(['item' => $data], 'setProduct');
        if (!$product->hesabfa_code && $curl->status){
            $product->hesabfa_code = $curl->result->Code;
            $product->save();
        }
        return $product;
    }

    public function getProduct($id, $type = 'code')
    {
        switch ($type){
            case "code":
                return $this->_curl(['code' => $id], 'getProduct')->result;
                break;
        }
    }

    public function getQuantity()
    {
        return $this->_curl([], 'getQuantity')->result;
    }
}
