<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 02/06/18
 * Time: 07:57
 */

namespace AppBundle\Service;


use AppBundle\Entity\Flight;

class FlightInfo
{
    /**
     * @var
     */
    private $unit;

    public function __construct($unit)
    {
        $this->unit = $unit;
    }


    /**
     * Distance calculation between latitude/longitude based on Harnive's formula
     * based on http://www.codecodex.com/wiki/Calculate_Distance_Between_Two_Points_on_a_Globe#PHP
     *
     * @param float $latitudeFrom
     * @param float $longitudeFrom
     * @param float $latitudeTo
     * @param float $longitudeTo
     * @return float
     */
    public function getDistance(float $latitudeFrom, float $longitudeFrom, float $latitudeTo, float $longitudeTo): float
    {
        $d = 0;
        $earth_radius = 6371;
        $dLat = deg2rad($latitudeTo - $latitudeFrom);
        $dLon = deg2rad($longitudeTo - $longitudeFrom);

        $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * sin($dLon/2) * sin($dLon/2);
        $c = 2 * asin(sqrt($a));

        switch ($this->unit) {
            case 'km':
                $d = $c * $earth_radius;
                break;
            case 'mi':
                $d = $c * $earth_radius / 1.609344;
                break;
            case 'nmi':
                $d = $c * $earth_radius / 1.852;
                break;
        }
        return $d;
    }

    public function getTime(float $distance, float $cruiseSpeed): float
    {
        $flightTime = $distance/$cruiseSpeed;
        return $flightTime;
    }
}