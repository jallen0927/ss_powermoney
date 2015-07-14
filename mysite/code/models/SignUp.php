<?php

/**
 * Created by PhpStorm.
 * User: xlin
 * Date: 14/07/15
 * Time: 11:05 PM
 */
class SignUp extends DataObject {

    private static $db = array(
        'Title' => "Enum(array('Mr', 'Miss', 'Mrs', 'Ms', 'Dr', 'Rev'))",
        'Title_cn' => "Enum(array('先生', '小姐', '女士'))",
        'FirstName' => 'Varchar(50)',
        'LastName' => 'Varchar(50)',
        'Phone' => 'Varchar(50)',
        'Email' => 'Varchar(50)',
        'License' => 'Varchar(50)',
        'Version' => 'Varchar(50)',
        'DoB' => 'Date',
        'Address' => 'Text',
        'Primary' => 'Boolean',
        'Services' => 'Varchar(50)',
        'People' => 'Varchar(20)',
        'Situation' => 'Varchar(20)',
        'Prevent' => 'Boolean',
        'Medical' => 'Boolean',
        'Threat' => 'Boolean',
        'BillingSame' => 'Boolean',
        'Created' => 'SS_Datetime'
    );

    private static $has_one = array(
        'PowerPlan' => 'PowerPlan',
        'GasPlan' => 'GasPlan'
    );
}