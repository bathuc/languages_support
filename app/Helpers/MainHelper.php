<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MainHelper
{
    public static function getSubject($userId)
    {
        return DB::table('subject')
                ->where('user_id',$userId)
                ->get()->toArray();
    }

    /*
     * $header:  default | json
     */
    public static function curl($method = 'post', $url = "", $params = [], $authen = [], $header = 'default')
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);

        // neu ko dung POST, mac dinh method cua curl la GET
        if($method == 'post') {
            if($header == 'default') {
                // ko dung header, mac dinh header la application/x-www-form-urlencoded
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
            }
            elseif($header == 'json') {
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
            }
        }

        if(!empty($authen)) {
            curl_setopt($ch, CURLOPT_USERPWD, $authen['username'] . ":" . $authen['password']);
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        }

        $result = curl_exec($ch);
        if (curl_errno($ch) !== 0) {
            \Log::Info('cURL error when connecting to ' . $url . ': ' . curl_error($ch));
        }

        curl_close($ch);
        return $result;
    }
}