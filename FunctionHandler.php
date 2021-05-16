<?php
abstract class FunctionHandler {
    static private $functions = array();
    static private $containers = array();

    static function addFunction($tag, $function) {
        self::$functions[$tag] = $function;
    }

    static function addContainer($tag, $arrayOfFunctions) {
        self::$containers[$tag] = $arrayOfFunctions;
    }

    static function handle($data, $container) {
        $x = function ($x) use ($container) {
            if (empty(self::$containers[$container])) return false;

            foreach (self::$containers[$container] as $function) {
                if (empty(self::$functions[$function])) continue;
                $x = call_user_func(self::$functions[$function], $x);
            }
            return $x;
        };

        if (!is_array($data)) return $x($data);

        foreach ($data as $key => $value) {
            $data[$key] = $x($value);
        }
        return $data;
    }
}