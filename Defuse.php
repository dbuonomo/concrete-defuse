<?php
namespace Application\Src\Crypto;

use Concrete\Core\Support\Facade\Config;
use Defuse\Crypto\Crypto;
use Defuse\Crypto\File;
use Defuse\Crypto\Key;


class Defuse
{
    public function __construct()
    {
    }

    public static function encrypt($cleartext)
    {
        $key = Key::loadFromAsciiSafeString(Config::get('app.secret_key'));
        $ciphertext = Crypto::encrypt($cleartext, $key);

        return $ciphertext;
    }

    public static function decrypt($ciphertext)
    {
        $key = Key::loadFromAsciiSafeString(Config::get('app.secret_key'));
        $cleartext = Crypto::decrypt($ciphertext, $key);

        return $cleartext;
    }

    public static function encrypt_file($file_in, $file_out)
    {
        $key = Key::loadFromAsciiSafeString(Config::get('app.secret_key'));
        File::encryptFile($file_in, $file_out, $key);
    }

    public static function decrypt_file($file_encrypted, $file_clear)
    {
        $key = Key::loadFromAsciiSafeString(Config::get('app.secret_key'));
        File::decryptFile($file_encrypted, $file_clear, $key);
    }
}
