<?php
/**
 * @copyright 2015, (c) by Vitaliy Tsutsman
 *
 * @author Vitaliy Tsutsman <vitaliyacm@gmail.com>
 */


/**
 * Phone
 */
class Phone {

    private $keyboard;
    private $display;


    public function __construct(
        Keyboard $keyboard,
        Display $display
    ) {
        $this -> keyboard = $keyboard;
        $this -> display = $display;
    }

    /**
     * Using ...
     */
}

interface Keyboard {}

class ButtonsKeyboard implements Keyboard {}
class TouchKeyboard implements Keyboard {}


interface Display {}

class OldDisplay implements Display {}
class TouchDisplay implements Display {};
class D3Display implements Display {}


// Ex. Phone
$phone = new Phone(
    new TouchKeyboard(),
    new D3Display()
);
