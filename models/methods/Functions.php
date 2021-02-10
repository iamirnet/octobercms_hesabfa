<?php

namespace iAmirNet\HesabFa\Models\Methods;

trait Functions
{
    public function _curl($data, $url)
    {
        $data = array_merge(
            [
                "apiKey" => $this->api_key,
                "userId" => $this->user_id,
                "password" => $this->password,
            ],
            $data
        );
        $headers = array(
            'Content-Type: application/json',
        );
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_URL, $this->domain . $this->urls[$url]);
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $data ) );
        $result = json_decode(curl_exec($ch));
        if ($result->ErrorCode == 0){
            return (object) ['status' => true, 'result' => $result->Result];
        }else{
            return (object) ['status' => false,
                'code' => $result->ErrorCode,
                'message' => $result->ErrorMessage];
        }
    }
}