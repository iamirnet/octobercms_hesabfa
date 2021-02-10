<?php

namespace iAmirNet\HesabFa\Models\Methods;

use Azarinweb\Minimall\Models\User;

trait Users
{
    public function setUser($user = null)
    {
        if (!$user) $user = $this->order->customer->user_id;
        $this->getUser($user);
        $data = [];
        if ($this->user->hesabfa_code)
            $data['Code'] = $this->user->hesabfa_code;
        $data['Name'] = $this->user->name . " " . $this->user->surname;
        $data['FirstName'] = $this->user->name;
        $data['LastName'] = $this->user->surname;
        $data['Phone'] = $this->user->phone ? : "0212222222";
        $data['Mobile'] = $this->user->mobile ? : "0912222222222";
        $data['ContactType'] = 1;
        $curl = $this->_curl(['contact' => $data], 'setUser');
        if (!$this->user->hesabfa_code && $curl->status){
            $this->user->hesabfa_code = $curl->result->Code;
            $this->user->save();
        }
        return $this->user->hesabfa_code;
    }

    public function getUser($user) {
        return $this->user = is_numeric($user) ? User::findOrFail($user) : $user;
    }
}