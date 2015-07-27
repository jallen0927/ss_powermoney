<?php

/**
 * Created by PhpStorm.
 * User: xlin
 * Date: 19/07/15
 * Time: 8:09 PM
 */
class PlanCalculator {

    private $powerAmount;

    private $area;

    private $withGas;

    private $gasAmount;

    public function __construct($suburbName, $powerAmount, $withGas=false, $gasAmount=0) {
        $area = self::getArea($suburbName);
        if (!$area) {
            throw new Exception('Area not supported');
        }
        $this->area = $area;
        $this->powerAmount = $powerAmount;
        $this->withGas = $withGas;
        $this->gasAmount = $gasAmount;
    }

    public function CalPower(PowerPlan &$plan) {
        $daily = $plan->DailyCharge;
        $rate = $this->withGas ? $plan->RateWithGas : $plan->Rate;
        $ppd = $plan->PPD;
        $amount = $this->powerAmount;

        $plan->rate = $rate;
        $value = ($daily * 30 + $rate * $amount) * 1.15 * (1 - $ppd);

        $cost = new Currency();
        $cost->setValue($value);
        $plan->cost = $cost;

        return $plan;
    }

    public function CalGas(GasPlan &$plan) {
        $daily = $plan->DailyCharge;
        $rate = $plan->Rate;
        $ppd = $plan->PPD;
        $amount = $this->gasAmount;

        $value = ($daily * 30 + $rate * $amount) * 1.15 * (1 - $ppd);

        $cost = new Currency();
        $cost->setValue($value);
        $plan->cost = $cost;

        return $plan;
    }

    public function Calculate() {
        $plans = PowerPlan::get('PowerPlan', "AreaID = '{$this->area->ID}'")->toArray();
        foreach ($plans as &$plan) {
            $this->CalPower($plan);
        }

        $result['PowerPlans'] = ArrayList::create($plans);

        if ($this->withGas) {
            $gPlans = GasPlan::get('GasPlan')->toArray();
            foreach ($gPlans as &$gPlan) {
                $this->CalGas($gPlan);
            }

            $result['GasPlans'] = ArrayList::create($gPlans);
        }

        return $result;
    }

/**
 * @param $suburbName
 * @return bool|int|string
 * Get the area of given suburb
 */
    public static function getArea($suburbName) {
        $suburb = Suburb::get_one('Suburb', "Name = '$suburbName'");

        if ($suburb) {
            return $suburb->area();
        }

        return false;
    }
}