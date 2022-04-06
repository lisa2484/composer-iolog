# Response

## composer

將此下載後解壓縮到放置安裝包的位置,如/package/response

要安裝此包的專案 composer.json 設定

可用絕對或相對路徑,相對路徑以設定的 composer.json 檔案位置為主

下面為絕對路徑示範
```
    "repositories": [
        {
            "type": "path",
            "url": "/package/*"
        }
    ]
```
在專案下指令 composer require phptycoon/response

成功的話則可在 composer.json 的 require 看到 phptycoon/response

## 功能
回傳json格式
```
\Phptycoon\Response\Response::json(array(), '000');
```
設定指定錯誤訊息
```
\Phptycoon\Response\Response::setCode(000, '成功');
```
覆寫所有錯誤訊息
```
\Phptycoon\Response\Response::setCodeArray([['000' => '成功'],['001' => '失敗']]);
```