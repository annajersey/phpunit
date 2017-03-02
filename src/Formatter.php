<?php
/**
 * Created by PhpStorm.
 * User: ann
 * Date: 01.03.2017
 * Time: 13:08
 */

namespace TDD;


class Formatter
{
    public function CurrencyAmt($input){
        return round($input,2);
    }
}