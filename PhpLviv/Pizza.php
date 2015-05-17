<?php
/**
 * @copyright 2015, (c) by Vitaliy Tsutsman
 *
 * @author Vitaliy Tsutsman <vitaliyacm@gmail.com>
 */

/**
 * Pizza
 */
class Pizza implements PriceStrategy {

    /**
     * Cake as base for pizza.
     *
     * @var Cake
     */
    private $cake;

    /**
     * Supplements for pizza.
     *
     * @var array of Supplements
     */
    private $supplements;


    /**
     * Constructor.
     *
     * @param Cake $cake
     * @param array $supplements
     */
    public function __construct(
        Cake $cake,
        array $supplements
    ) {
        /**
         * Validate supplements.
         * @NotEmpty
         */
        //TODO
        //- Inject dependencies -//
        $this -> cake = $cake;
        $this -> supplements = $supplements;
    }

    /**
     * Calculate price
     */
    public function getPrice() {
        $price = $this -> cake -> getPrice();

        foreach ($this ->supplements as $supplement) {
            $price += $supplement -> getPrice();
        }

        return $price;
    }
}

/**
 * Strategy for Price
 */
interface PriceStrategy {

    /**
     * Get price for ingredient.
     *
     * @return double
     */
    public function getPrice();
}

/**
 * Emulate Enum for Size
 */
class Size {

    const BIG = 'big';
    const SMALL = 'small';

    private $val;


    public function __construct($value) {
        if ( !in_array( $value, [ 'big', 'small' ] ) )
            throw new Exception( 'Not support' );
            // Should create a new Exception type, for ex. NotSupportedException()

        $this -> val = $value;
    }

    public function value() {
        return $this -> value;
    }
}

/**
 * Cake
 */
abstract class Cake implements PriceStrategy {

    /**
     * @var Enum {BIG, SMALL}
     */
    protected $size;

    /**
     * Get price for ingredient.
     *
     * @return double
     */
    public abstract function getPrice();


}

/**
 * BigCake
 */
class BigCake extends Cake {

    public function __construct() {
        $this -> size = new Size( Size :: BIG );
    }

    /**
     * Get price for ingredient.
     *
     * @return double
     */
    public function getPrice()
    {
        //TODO:
        echo 'Calculate price, big cake';
        return 20;
    }
}

/**
 * SmallCake
 */
class SmallCake extends Cake {

    public function __construct() {
        $this -> size = new Size( Size :: SMALL );
    }

    /**
     * Get price for ingredient.
     *
     * @return double
     */
    public function getPrice()
    {
        //TODO:
        echo 'Calculate price, small cake';
        return 10;
    }
}

/**
 * Ingredient
 */
abstract class Ingredient implements PriceStrategy {

    protected $name;


    public function getName() {
        return $this -> name;
    }

    /**
     * Get price for ingredient.
     *
     * @return double
     */
    public abstract function getPrice();
}

/**
 * Cheese
 */
class Cheese extends Ingredient {

    public function __construct() {
        $this -> name = 'Cheese';
    }

    /**
     * Get price for ingredient.
     *
     * @return double
     */
    public function getPrice()
    {
        // TODO: Implement
        echo 'Calc price, cheese';
        return 1;
    }
}

/**
 * Tomato
 */
class Tomato extends Ingredient {

    public function __construct() {
        $this -> name = 'Tomato';
    }

    /**
     * Get price for ingredient.
     *
     * @return double
     */
    public function getPrice()
    {
        // TODO: Implement
        echo 'Calc price, tomato';
        return 2;
    }
}

/**
 * Meat
 */
class Meat extends Ingredient {

    public function __construct() {
        $this -> name = 'Meat';
    }

    /**
     * Get price for ingredient.
     *
     * @return double
     */
    public function getPrice()
    {
        // TODO: Implement
        echo 'Calc price, meat';
        return 3;
    }
}


//- Using -//
$pizza = new Pizza(
    new SmallCake(),
    [
        new Cheese(),
        new Cheese(),
        new Meat()
    ]
);

echo "Cheese - 1, Tomato - 2, Meat - 3, Small cake - 10, Big cake - 20\n",
    printf( "\n%.2f\n", $pizza -> getPrice() );
