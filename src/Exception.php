<?php

namespace optiwariindia;


class Exception extends \Exception
{
    private static $lang = "en";
    public static function new($id)
    {
        $info=json_decode(file_get_contents("locale/".self::$lang.".json"));
        return new Exception($info[$id-1], $id);
    }
    public static function lang($lang = "")
    {
        if ($lang != "")
            self::$lang = $lang;
        return self::$lang;
    }
}
