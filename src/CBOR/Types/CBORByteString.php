<?php
namespace CBOR\Types;

class CBORByteString {
    private $byte_string = null;

    public function __construct($byte_string)
    {
        $this->byte_string = $byte_string;
    }

    // バイト列を取得するための「getData()」メソッド
    public function getData()
    {
        return $this->byte_string;
    }

    // 文字列キャスト時にバイト列を返す
    public function __toString()
    {
        return (string)$this->byte_string;
    }

    public function get_byte_string()
    {
        return $this->byte_string;
    }

    public function set_byte_string($byte_string)
    {
        $this->byte_string = $byte_string;
    }
}
