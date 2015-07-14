<?php

/**
 * Created by PhpStorm.
 * User: xlin
 * Date: 14/07/15
 * Time: 11:05 PM
 */
class Enquiry extends DataObject {

    private static $db = array(
        'Name' => 'Varchar(50)',
        'Email' => 'Varchar(50)',
        'Phone' => 'Varchar(50)',
        'Subject' => 'Text',
        'Message' => 'Text',
        'Created' => 'SS_Datetime'
    );

    private static $has_one = array();
}