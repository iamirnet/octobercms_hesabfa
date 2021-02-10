<?php

namespace iAmirNet\HesabFa\Models\Methods;

use Azarinweb\Minimall\Models\Order;
use Carbon\Carbon;

trait Factors
{
    public function setFactor($order, $payment)
    {
        $this->getOrder($order);
        $this->setOrderProducts();
        $this->setUser();
        $data = [];
        if ($this->order->hesabfa_code)
            $data['Number'] = $this->order->hesabfa_code;
        $data['InvoiceType'] = 0;
        $data['ContactCode'] = $this->user->hesabfa_code;
        $data['Date'] = Carbon::now()->format('Y-m-d H:i:s');
        $data['DueDate'] = Carbon::now()->format('Y-m-d H:i:s');
        $data['Freight'] = round($this->order->shipping['total'] / 1000) * 100;
        $data['InvoiceItems'] = $this->products;
        $curl = $this->_curl(['invoice' => $data], 'setFactor');
        if ($curl->status){
            $this->order->hesabfa_code = $curl->result->Number;
            $this->order->save();
            $this->setPayment($payment);
        }
        return $this->order->hesabfa_code;
    }

    public static function _setFactor($order, $payment = [])
    {
        return (new self())->setFactor($order, $payment);
    }

    public function setPayment($payment)
    {
        $data = [];
        $data['number'] = $this->order->hesabfa_code;
        $data['bankCode'] = (string) 0002;
        $data['date'] = Carbon::now()->format('Y-m-d H:i:s');
        $data['amount'] = $this->order->total_post_taxes * 10;
        $data['transactionNumber'] = time();
        $data['description'] = 'پرداخت آنلاین';
        $data['transactionFee'] = 0;
        $curl = $this->_curl($data, 'setPayment');
    }

    public function getOrder($order) {
        return $this->order = is_numeric($order) ? Order::findOrFail($order) : $order;
    }

    public function setOrderProducts() {
        foreach ($this->order->products()->get() as $product)
            $this->products[] = $this->setOrderProduct($product->product_id, $product->quantity);
        return $this->products;
    }

    public function setOrderProduct($product, $quantity) {
        $product = $this->setProduct($product);
        $data['ItemCode'] = $product->hesabfa_code;
        $data['Description'] = $product->description_short;
        $data['Quantity'] = $quantity;
        $data['UnitPrice'] = $product->price()->integer / 10;
        $data['Discount'] = 0;
        $data['Tax'] = 0;
        return $data;
    }
}
