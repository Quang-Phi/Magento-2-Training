<?php

namespace UnitFive\MyAPI\Model;

use UnitFive\MyAPI\Api\MyInterface;

class MyClass implements MyInterface
{
    /**
     * @inheritdoc
     */
    public function myMethod()
    {
        return 'Hello World!';
    }
}