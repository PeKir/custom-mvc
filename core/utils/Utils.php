<?php

namespace core\utils;


use DateTime;

class Utils
{

    /**
     * Generate a more truly "random" alpha-numeric string.
     *
     * @param  int $length
     *
     * @return string
     */
    public static function randomStr($length = 16)
    {
        $string = '';

        while (($len = strlen($string)) < $length) {
            $size = $length - $len;

            try {

                $bytes = random_bytes($size);
            } catch (\Exception $e) {
                echo $e->getMessage();
            }

            $string .= substr(str_replace(['/', '+', '='], '',
                base64_encode($bytes)), 0, $size);
        }

        return $string;
    }

    public static function hashSting($password) {
        return hash('sha256', $password);
    }

    public static function defineDateTime($dateTimeStamp)
    {
        $result = date('Y-m-d H:i', $dateTimeStamp);

        return $result;
    }

    public static function defineDate($dateStamp)
    {
        $result = date('Y-m-d', $dateStamp);

        return $result;
    }
}