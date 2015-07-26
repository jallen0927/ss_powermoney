<?php

/**
 * Created by PhpStorm.
 * User: xlin
 * Date: 14/07/15
 * Time: 11:05 PM
 */
class AddImage extends Image {

    private static $db = array();

    private static $has_one = array(
        'ProductsPage' => 'ProductsPage'
    );
}