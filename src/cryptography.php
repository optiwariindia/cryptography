<?php
/* $plaintext = "message to be encrypted";
$cipher = "aes-128-gcm";
$key="1q2w3e";
print_r(openssl_get_cipher_methods());
if (in_array($cipher, openssl_get_cipher_methods()))
{
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext = openssl_encrypt($plaintext, $cipher, $key, $options=0, $iv, $tag);
    echo $ciphertext;
    
    //store $cipher, $iv, and $tag for decryption later
    $original_plaintext = openssl_decrypt($ciphertext, $cipher, $key, $options=0, $iv, $tag);
    echo $original_plaintext."\n";
}
 */

namespace optiwariindia;

class cryptography
{
    private $algo, $iv, $key;
    public function __Construct()
    {
    }
    public function setErrorLang($lang){
        Exception::lang($lang);
    }
    public function listAlgo()
    {
        return openssl_get_cipher_methods();
    }
    public function algo($algo = "")
    {
        if ($algo == "")
            return $this->algo();
        if (!in_array($algo, $this->listAlgo()))
            throw Exception::new(1);
        $this->algo = $algo;
        return true;
    }
    public function iv($iv = "")
    {
        if (!isset($this->algo)) {
            throw Exception::new(2);
        }
        if ($iv != "") {
            $this->iv = $iv;
            return true;
        }
        $len = openssl_cipher_iv_length($this->algo());
        $this->iv = openssl_random_pseudo_bytes($len);
        return $this->iv;
    }
    public function key($key = "")
    {
        if ($key == "") {
            return $this->key;
        } else {
            $this->key = $key;
            return true;
        }
    }
    public function encrypt($text)
    {
        // prerequisites
        if (!isset($this->algo)) throw Exception::new(2);
        if (!isset($this->iv)) throw Exception::new(3);
        if (!isset($this->key)) throw Exception::new(4);
        $cypher = openssl_encrypt($text, $this->algo, $this->key, $options = 0, $this->iv, $tag);
        return [$cypher, base64_encode($tag)];
    }
    public function decrypt($cypher, $tag = "")
    {
        $t = "";
        if ($tag != "") {
            $t = base64_decode($tag);
        }
        if (!isset($this->algo)) throw Exception::new(2);
        if (!isset($this->iv)) throw Exception::new(3);
        if (!isset($this->key)) throw Exception::new(4);
        return openssl_decrypt($cypher, $this->algo, $this->key, $options = 0, $this->iv, $t);
    }
}
