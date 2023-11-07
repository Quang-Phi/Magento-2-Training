<?php
namespace Custom\Price\Plugin;

class PricePlugin
{
    public function afterGetPrice($subject, $result)
    {
        return $result;
    }
}
