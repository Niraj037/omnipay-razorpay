<?php

namespace Omnipay\Razorpay\Message;

class CompletePurchaseResponse extends PurchaseResponse
{
    public function isSuccessful(): bool
    {
        if (!empty($_POST['x_result'])) {
            $data = parent::getRedirectData();

            $hmacKey = $data['key_secret'];
            $razorpaySignature = $_POST['x_signature'];

            $verifySignature = new Signature($hmacKey);
            $signature = $verifySignature->getSignature($_POST);

            return $this->hash_equals($signature, $razorpaySignature);
        }

        return false;
    }

    /**
     * Secure string comparison function
     * 
     * @param string $str1
     * @param string $str2
     * @return bool
     */
    protected function hash_equals(string $str1, string $str2): bool
    {
        if (function_exists('hash_equals')) {
            return hash_equals($str1, $str2);
        }
        
        if (strlen($str1) !== strlen($str2)) {
            return false;
        }

        $result = 0;

        for ($i = 0; $i < strlen($str1); $i++) {
            $result |= ord($str1[$i]) ^ ord($str2[$i]);
        }

        return ($result === 0);
    }
}
