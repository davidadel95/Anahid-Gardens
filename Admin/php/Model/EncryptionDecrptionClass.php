
<?php




class EncryptionDecrptionClass {

    public $key;

    public function __construct(){

    }

    // string mcrypt_encrypt ( string $cipher , string $key , string $data , string $mode [, string $iv ] )
  //   cipher
  // One of the MCRYPT_ciphername constants, or the name of the algorithm as string.
  // key
  // The key with which the data will be encrypted. If the provided key size is not supported by the cipher, the function will emit a warning and return FALSE
  // data
  // The data that will be encrypted with the given cipher and mode. If the size of the data is not n * blocksize, the data will be padded with '\0'.
  // The returned crypttext can be larger than the size of the data that was given by data.
  // mode
  // One of the MCRYPT_MODE_modename constants, or one of the following strings: "ecb", "cbc", "cfb", "ofb", "nofb" or "stream".
  // iv
  // Used for the initialization in CBC, CFB, OFB modes, and in some algorithms in STREAM mode. If the provided IV size is not supported by the chaining mode or no IV was provided, but the chaining mode requires one, the function will emit a warning and return FALSE.



  public function Encrypt($String){
    $iv = mcrypt_create_iv(
        mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC),
        MCRYPT_DEV_URANDOM
    );

    $encrypted = base64_encode(
        $iv .
        mcrypt_encrypt(
            MCRYPT_RIJNDAEL_128,
            hash('sha256', $this->key, true),
            $String,
            MCRYPT_MODE_CBC,
            $iv
        )
    );
    return $encrypted;
  }


// string mcrypt_decrypt ( string $cipher , string $key , string $data , string $mode [, string $iv ] )

  public function Decrept($String){
    $data = base64_decode($String);
    $iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));
    $decrypted = rtrim(
        mcrypt_decrypt(
            MCRYPT_RIJNDAEL_128,
            hash('sha256', $this->key, true),
            substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)),
            MCRYPT_MODE_CBC,
            $iv
        ),
        "\0"
    );
    return $decrypted;
  }


  public function ReadFromFile(){
    $myfile = fopen('Key.txt', "r") or die("Unable to open file!");
    $this->key=fread($myfile,filesize("Key.txt"));
    fclose($myfile);

  }

  public function WriteToFile(){
    $myfile = fopen('Key.txt', "w") or die("Unable to open file!");
    fwrite($myfile, $this->key);
    fclose($myfile);

  }



}
?>
