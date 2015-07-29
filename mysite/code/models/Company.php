<?php

/**
 * Created by PhpStorm.
 * User: xlin
 * Date: 14/07/15
 * Time: 11:05 PM
 */
class Company extends DataObject {

    private static $db = array(
        'Name' => 'Varchar(50)',
        'Name_cn' => 'Varchar(50)',
    );

    private static $has_one = array(
        'Logo' => 'SiteImage'
    );

    private static $has_many = array(
        'PowerPlans' => 'PowerPlan',
        'GasPlans' => 'GasPlan'
    );

    public function canView($member=null) {
        return true;
    }

    public function canEdit($member=null) {
        return true;
    }

    public function canDelete($member=null) {
        return true;
    }

    public function canCreate($member=null) {
        return true;
    }

}