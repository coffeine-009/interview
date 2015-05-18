<?php
/**
 * @copyright 2015, (c) by Vitaliy Tsutsman
 *
 * @author Vitaliy Tsutsman <vitaliyacm@gmail.com>
 */


/**
 * Phone
 */
class Phone implements FactoryItem {

    private $brand;
    private $model;

    private $keyboard;
    private $display;


    public function __construct(
        Keyboard $keyboard,
        Display $display,
        $brand,
        $model
    ) {
        $this -> keyboard = $keyboard;
        $this -> display = $display;

        $this -> brand = $brand;
        $this -> model = $model;
    }

    /**
     * Using ...
     */
}

interface Keyboard {}

class ButtonsKeyboardA implements Keyboard {}
class TouchKeyboardA implements Keyboard {}
class ButtonsKeyboardB implements Keyboard {}
class TouchKeyboardB implements Keyboard {}


interface Display {}

class OldDisplayA implements Display {}
class TouchDisplayA implements Display {};
class OldDisplayB implements Display {}
class TouchDisplayB implements Display {};
class D3Display implements Display {}


/**
 * FactoryItem
 */
interface FactoryItem {

    /**
     * Constructor for create items.
     *
     * @param Keyboard $keyboard
     * @param Display $display
     * @param $brand
     * @param $model
     */
    public function __construct(
        Keyboard $keyboard,
        Display $display,
        $brand,
        $model
    );
}

interface Factory {

    /**
     * Create phone.
     *
     * @return FactoryItem
     */
    public function createItem();

    /**
     * Create phone with touch screen.
     *
     * @return FactoryItem
     */
    public function createNewItem();
}

class Abrykos implements Factory {

    /**
     * Create phone.
     *
     * @return FactoryItem
     */
    public function createItem()
    {
        return  new Phone(
            new ButtonsKeyboardA(),
            new OldDisplayA(),
            'Abrykos',
            'A1'
        );
    }

    /**
     * Create phone with touch screen.
     *
     * @return FactoryItem
     */
    public function createNewItem()
    {
        return  new Phone(
            new TouchKeyboardA(),
            new TouchDisplayA(),
            'Abrykos',
            'A2'
        );
    }
}

class Slyva implements Factory {

    /**
     * Create phone.
     *
     * @return FactoryItem
     */
    public function createItem()
    {
        return  new Phone(
            new ButtonsKeyboardB(),
            new OldDisplayB(),
            'Slyva',
            'S1'
        );
    }

    /**
     * Create phone with touch screen.
     *
     * @return FactoryItem
     */
    public function createNewItem()
    {
        return  new Phone(
            new TouchKeyboardB(),
            new TouchDisplayB(),
            'Slyva',
            'S2'
        );
    }
}

class Ananas implements Factory {

    /**
     * Create phone.
     *
     * @return FactoryItem
     */
    public function createItem()
    {
        return  new Phone(
            new ButtonsKeyboard(),
            new D3Display(),
            'Ananas',
            'AS1'
        );
    }

    /**
     * Firm does not create other phones.
     *
     * @return FactoryItem
     */
    public function createNewItem()
    {
        return null;
    }
}

//- Using -//
$factory = new Ananas();

//- Create phone form firm Ananas -//
$phone = $factory -> createItem();
