<?php

namespace Phptycoon\Response;

class Response
{
    static $codeType = [];

    public static function setCodeArray(array $codeArr)
    {
        if (self::$codeType != $codeArr)
            self::$codeType = $codeArr;
    }

    public static function setCode(string $code, string $message)
    {
        self::$codeType[$code] = $message;
    }

    public static function json(array $data = [], string $resultCode = '000'): string
    {
        return json_encode(self::array($data, $resultCode));
    }

    public static function array(array $data = [], string $resultCode = '000'): array
    {
        return [
            'resultCode' => $resultCode,
            'resultMap' => $data,
            'msg' => self::resultCode($resultCode)
        ];
    }

    private static function resultCode(string $resultCode): string
    {
        return self::$codeType[$resultCode] ?? $resultCode;
    }
}
