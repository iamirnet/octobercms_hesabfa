<?php

namespace iAmirNet\HesabFa\Models\Methods;

use iAmirNet\HesabFa\Models\HesabFaSettings;

trait Variables
{
    public $user_id = null;
    public $password = null;
    public $api_key = null;

    public $errors = [
        "100" => "خطای داخلی در نرم افزار",
        "101" => "تعداد در خواست ها در دقیقه از حد مجاز بیشتر شده است.",
        "103" => "در درخواست ارسالی پارامتر Data وجود ندارد.",
        "104" => "پارامتر ضروری ارسال نشده یا نامعتبر است.",
        "105" => "API غیرفعال است.",
        "106" => "کاربر، صاحب کسب و کار نیست.",
        "107" => "کسب و کار پیدا نشد.",
        "108" => "کسب و کار منقضی شده است.",
        "109" => "سال مالی پیدا نشد.",
        "110" => "Id شی ارسالی باید صفر باشد.",
        "111" => "Id شی ارسالی نباید صفر باشد.",
        "112" => "شی درخواستی پیدا نشد.",
        "113" => "ApiKey ارسال نشده است.",
        "114" => "پارامتر خارج از رنج است.",
        "190" => "خطای حسابفا.",
    ];

    public $domain = 'https://api.hesabfa.com/v1/';

    public $urls = [
        'setProduct' => 'item/save',
        'getProduct' => 'item/get',
        'getQuantity' => 'item/GetQuantity',
        'setUser' => 'contact/save',
        'getUser' => 'contact/get',
        'setFactor' => 'invoice/save',
        'getFactor' => 'invoice/get',
        'setPayment' => 'invoice/savepayment',
    ];

    public $order = null;
    public $user = null;

    public $products = [];
}