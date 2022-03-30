<?php

namespace Phptycoon\Response;

class Response
{
    static $codeType = [
        '000' => '成功',
        '001' => '失敗',
        '002' => '登入帳戶錯誤',
        '005' => '參數錯誤',
        '006' => '指定代碼已存在',
        '999' => '無此權限'
    ];

    /**
     * 覆寫所有狀態
     * @param array $codeArr 狀態陣列 [[狀態碼 => 狀態敘述]]
     */
    public static function setCodeArray(array $codeArr)
    {
        if (self::$codeType != $codeArr)
            self::$codeType = $codeArr;
    }

    /**
     * 覆寫單一狀態
     * @param string $code 狀態碼
     * @param string $message 狀態敘述
     */
    public static function setCode(string $code, string $message)
    {
        self::$codeType[$code] = $message;
    }

    /**
     * 回傳json格式
     */
    public static function json(array $data = [], string $resultCode = '000'): string
    {
        return json_encode(self::array($data, $resultCode));
    }

    /**
     * 回傳array
     */
    public static function array(array $data = [], string $resultCode = '000'): array
    {
        return [
            'resultCode' => $resultCode,
            'resultMap' => $data,
            'msg' => self::resultCode($resultCode)
        ];
    }

    /**
     * 狀態取得
     */
    private static function resultCode(string $resultCode): string
    {
        return self::$codeType[$resultCode] ?? $resultCode;
    }
}
