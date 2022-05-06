<?php
namespace App\Core;

class RSA
{
   // public $pubKey = '...public key here...';
    //public $privKey = '...private key here...';

    protected $privateKey;
    protected $publicKey;

    public function setPrivateKey($privateKey)
    {
        $this->privateKey=$privateKey;
    }

    public function setPublicKey($publicKey)
    {
        $this->publicKey=$publicKey;
    }

    public function createKey()
    {
        $config = array(
            "digest_alg" => "sha512",
            "private_key_bits" => 2048,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        );
        
        // Create the private and public key
        $res = openssl_pkey_new($config);
        
        // Extract the private key from $res to $privateKey
        openssl_pkey_export($res, $privateKey);
        
        // Extract the public key from $res to $pubKey
        $pubKey = openssl_pkey_get_details($res);
        $publicKey = $pubKey['key'];
        $this->setPrivateKey($privateKey);
        $this->setPublicKey($publicKey);
    }
 
    public function encrypt($data){
        if (openssl_public_encrypt($data, $encrypted, $this->publicKey))
            $data = base64_encode($encrypted);
        else
            return false;
 
        return $data;
    }
 
    public function decrypt($data){
        if (openssl_private_decrypt(base64_decode($data), $decrypted, $this->privateKey))
            $data = $decrypted;
        else
            $data = '';
 
        return $data;
    }

}
?>