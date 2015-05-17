<?php
/**
 * @copyright 2015, (c) by Vitaliy Tsutsman
 *
 * @author Vitaliy Tsutsman <vitaliyacm@gmail.com>
 */


/**
 * Suv
 */
class Suv {

    /**
     * Chassis, injected in run time.
     *
     * @var Chassis
     */
    private $chassis;


    /**
     * Constructor and injecting dependencies.
     *
     * @param Chassis $chassis
     */
    public function __construct(Chassis $chassis) {
        $this -> chassis = $chassis;
    }

    /**
     * Example of using
     */
    public function using() {
        $this -> chassis -> go();
    }
}

/**
 * Chassis
 */
interface Chassis {

    /**
     * Abilities.
     */
    public function go();
}

/**
 * Wheels
 */
class Wheels implements Chassis {

    /**
     * Abilities.
     */
    public function go()
    {
        // TODO: Implement
        echo 'Wheels';
    }
}

/**
 * Skis
 */
class Skis implements Chassis {

    /**
     * Abilities.
     */
    public function go()
    {
        // TODO: Implement
        echo 'Skis';
    }
}

/**
 * AirPillow
 */
class AirPillow implements Chassis {

    /**
     * Abilities.
     */
    public function go()
    {
        // TODO: Implement
        echo 'Air pillow';
    }
}


//- Using Car.Suv -//
$car = new Suv( new AirPillow() );// You can inject any from chassis

//- Using car -//
$car -> using();
