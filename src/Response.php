<?php

namespace Phptycoon\Response;

class Response
{
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
        $codeType = [
            '000' => '成功',
            '001' => '失敗',
            '002' => '登入帳戶錯誤',
            '005' => '參數錯誤',
            '006' => '指定代碼已存在',
            '999' => '無此權限'
        ];
        return $codeType[$resultCode] ?? '失敗';
    }
}
