# CBOR encoder for PHP

PHPデータとCBORバイナリ文字列の相互変換を行うエンコーダ／デコーダです。  
このコードはVen氏により2014年1月に開発・メンテナンスされています。

CBORは[IETF](http://ietf.org)で定義されたオブジェクト表現フォーマットです。  
[仕様書](http://tools.ietf.org/html/rfc7049)はIETFのStandards-Track仕様として承認され、RFC 7049として公開されています。

## フォークでの主な変更点

- `CBORByteString`クラスに以下のメソッドを追加・整理しました:
  - `getData()` バイト列データ取得用メソッドの追加
  - `__toString()` バイト列を文字列として返すメソッドの追加
  - コードの可読性向上のためのリファクタリング
- コメントの日本語化・整理

## 主な機能

- PHPの配列や数値、文字列、null、真偽値などをCBORバイナリ形式にエンコード
- CBORバイナリデータをPHPのデータ型にデコード
- CBOR仕様に準拠したバイナリデータの生成・解析
- バイト列データの取得や文字列変換など、CBORバイトストリング型の操作

## インストール

`composer.json`に `2tvenom/cborencode` を追加してください:

```JavaScript
{
    "require": {
       "2tvenom/cborencode": "1.0.0"
    }
}
```

## 使い方

```php
<?php
include("vendor/autoload.php");

// エンコード対象
$target = array(true, array("variable1" => 100000, "variable2" => "Hello, World!", "Hello!"), 0.234, 0, null, 590834290589032580);

// エンコード
$encoded_data = \CBOR\CBOREncoder::encode($target);

// デバッグ用バイト配列出力
$byte_arr = unpack("C*", $encoded_data);

echo "Byte hex map = " . implode(" ", array_map(function($byte){
        return "0x" . strtoupper(dechex($byte));
    }, $byte_arr)) . PHP_EOL;

echo "Byte dec map = " . implode(" ", $byte_arr) . PHP_EOL;

// デコード
$decoded_variable = \CBOR\CBOREncoder::decode($encoded_data);
// 出力
var_dump($decoded_variable);
```

## 互換性

エンコード・デコードの動作は[Ruby拡張](https://github.com/cabo/cbor-ruby)で検証済みです。

## 既知の問題

- タグ（major type 6）は未対応（将来的に対応予定）
- 16/32ビット浮動小数点のエンコードは未対応（将来的に対応予定）
- 浮動小数点はIEEE 754 Double-Precision Float（64ビット）のみサポート
- エンコードは不定長値に未対応
