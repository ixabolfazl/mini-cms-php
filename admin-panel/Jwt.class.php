<?php

namespace Admin;

class JWT
{

    public $extended_exp;
    public $default_exp;

    protected function base64UrlEncode($input)
    {
        return str_replace(
            ["+", "/", "="],
            ["-", "_", ""],
            base64_encode($input)
        );
    }

    protected function base64UrlDecode($input)
    {
        $remainder = strlen($input) % 4;
        if ($remainder) {
            $padLen = 4 - $remainder;
            $input .= str_repeat("=", $padLen);
        }

        return base64_decode(
            str_replace(
                ["-", "_"],
                ["+", "/"],
                $input
            )
        );
    }

    protected function makeJWT($header, $payload, $secret)
    {
        $header = json_encode($header);
        $header = $this->base64UrlEncode($header);
        $payload = json_encode($payload);
        $payload = $this->base64UrlEncode($payload);
        $signature = hash_hmac("sha256", "$header.$payload", $secret, true);
        $signature = $this->base64UrlEncode($signature);

        return "$header.$payload.$signature";
    }


    public function verify($token)
    {

        list($header, $payload, $signature) = explode(".", $token);
        return hash_equals(
            $this->base64UrlDecode($signature),
            hash_hmac("sha256", "$header.$payload", jwtSecret, true)
        );
    }

    public function decode($token)
    {

        $payload = explode(".", $token)[1];

        if (!$this->verify($token)) {
            return false;
        }
        $payload = $this->base64UrlDecode($payload);
        $payload = json_decode($payload, true);

        return $payload;
    }

    public function encode($userId, $remember = false)
    {


        if ($remember) {
            $remember = time() + extended_exp;
        } else {
            $remember = time() + default_exp;
        }


        return $this->makeJWT(
            [
                "typ" => "JWT",
                "alg" => "HS256"
            ],
            [
                "userid" => $userId,
                "exp" => $remember
            ],
            jwtSecret
        );


    }


    public function __construct()
    {
        $this->extended_exp = extended_exp;
        $this->default_exp = default_exp;


    }
}