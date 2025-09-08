<?php

namespace Omnipay\Razorpay\Message;

class Signature
{
    private string $key;

    public function __construct(string $key)
    {
        $this->key = $key;
    }

    public function getSignature(array $data): string
    {
        $validFields = array_filter(array_keys($data), function ($key) {
            return $key != 'x_signature' && substr($key, 0, 2) == 'x_';
        });

        $data = array_intersect_key($data, array_flip($validFields));

        //sort the array
        ksort($data);

        // prepare the message
        $message = '';

        foreach ($data as $key => $value) {
            $message .= $key . $value;
        }

        return hash_hmac('sha256', $message, $this->key);
    }
}
