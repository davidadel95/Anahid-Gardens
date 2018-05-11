
<?php




class EncryptionDecrptionClass {

    public $key;

    public function __construct(){

    }
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
