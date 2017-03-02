<?php
namespace TDD\Test;
require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use PHPUnit\Framework\TestCase;
use TDD\Formatter;

class FormatterTest extends TestCase{
    public function setUp(){
        $this->Formatter = new Formatter();
    }
    public function tearDown(){
        unset($this->Formatter);
    }

    /**
     * @dataProvider providerCurrencyAmt
     */
    public function testCurrencyAmt($input, $expected, $msg){
        $this->assertSame(
            $expected,
            $this->Formatter->currencyAmt($input),
            $msg
        );
    }

    function providerCurrencyAmt(){
        return [
            [1, 1.00, '1 should be transformed to 1.00'],
            [1.1, 1.10, '1.1 should be transformed to 1.10'],
            [1.11, 1.11, '1.11 should be transformed to 1.11'],
            [1.111, 1.11, '1.111 should be transformed to 1.11']
        ];
    }
}
