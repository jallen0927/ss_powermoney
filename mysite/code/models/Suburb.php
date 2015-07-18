<?php

/**
 * Created by PhpStorm.
 * User: xlin
 * Date: 18/07/15
 * Time: 11:49 PM
 */
class Suburb extends DataObject {

    private static $db = array(
        'Name' => 'Varchar(20)'
    );

    private static $has_one = array(
        'Area' => 'Area'
    );
}