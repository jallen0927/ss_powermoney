<?php

/**
 * Created by PhpStorm.
 * User: xlin
 * Date: 14/07/15
 * Time: 11:05 PM
 */
class AboutPage extends Page {

    private static $db = array(
        'Content_cn' => 'HTMLText'
    );

    private static $has_many = array();
}

class AboutPage_Controller extends Page_Controller {

}