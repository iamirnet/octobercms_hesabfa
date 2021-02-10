<?php

namespace iAmirNet\HesabFa\Models;

use iAmirNet\HesabFa\Models\Methods\Factors;
use iAmirNet\HesabFa\Models\Methods\Functions;
use iAmirNet\HesabFa\Models\Methods\Products;
use iAmirNet\HesabFa\Models\Methods\Users;
use iAmirNet\HesabFa\Models\Methods\Variables;
use Request;
use Session;
use Validator;

class HesabFa
{
    use Variables, Functions, Users, Products, Factors;
    public function __construct()
    {
        $this->user_id = (string)HesabFaSettings::get('hesabfa_user_id');
        $this->password = (string)HesabFaSettings::get('hesabfa_password');
        $this->api_key = (string)HesabFaSettings::get('hesabfa_api_key');
    }
}
