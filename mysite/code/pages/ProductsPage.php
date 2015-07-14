<?php

/**
 * Created by PhpStorm.
 * User: xlin
 * Date: 14/07/15
 * Time: 11:05 PM
 */
class ProductsPage extends Page {

    private static $db = array(
        'ContentLeft' => 'HTMLText',
        'ContentLeft_cn' => 'HTMLText',
        'ContentRight' => 'HTMLText',
        'ContentRight_cn' => 'HTMLText',
    );

    private static $has_many = array(
        'LeftImages' => 'SiteImages',
        'RightImages' => 'SiteImages'
    );
}

class ProductsPage_Controller extends Page_Controller {

}