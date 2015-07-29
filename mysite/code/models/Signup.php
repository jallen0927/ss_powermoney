<?php

/**
 * Created by PhpStorm.
 * User: xlin
 * Date: 14/07/15
 * Time: 11:05 PM
 */
class Signup extends DataObject {

    private static $db = array(
        'Title' => "Enum(array('Mr', 'Miss', 'Mrs', 'Ms', 'Dr', 'Rev'))",
        'FirstName' => 'Varchar(50)',
        'LastName' => 'Varchar(50)',
        'Phone' => 'Varchar(50)',
        'Email' => 'Varchar(50)',
        'License' => 'Varchar(50)',
        'Version' => 'Varchar(50)',
        'DateOfBirth' => 'Date',
        'Address' => 'Text',
        'Primary' => 'Boolean',
        'Services' => 'Varchar(50)',
        'People' => 'Varchar(20)',
        'Situation' => 'Varchar(20)',
        'Prevent' => 'Boolean',
        'Medical' => 'Boolean',
        'Threat' => 'Boolean',
//        'BillingSame' => 'Boolean',
        'Billing' => 'Text',
        'Created' => 'SS_Datetime',
        'Company' => 'Varchar(50)',
        'Plan' => 'Varchar(50)'
    );

}