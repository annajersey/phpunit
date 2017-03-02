<?php

 namespace TDD;

 use \BadMethodCallException;
 class Receipt{


     /**
      * Receipt constructor.
      */
     public function __construct($formatter)
     {
         $this->Formatter = $formatter;
     }

     public function subtotal(array $items=[], $coupon){
         if($coupon > 1.00){
             throw new BadMethodCallException('Coupon must be <= 1.00');
         }
         $sum = array_sum($items);
         if(!is_null($coupon)){
             return $sum - ($sum * $coupon);
         }
         return $sum ;
     }
     public function tax($amount){
         return $this->Formatter->currencyAmt($amount * $this->tax);
     }

     public function postTaxTotal($items, $coupon){
         $subtotal = $this->subtotal($items,$coupon);
         return $subtotal + $this->tax($subtotal);
     }


 }
