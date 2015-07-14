<?php

/**
 * Created by PhpStorm.
 * User: xlin
 * Date: 14/07/15
 * Time: 11:05 PM
 */
class Article extends Page {

    private static $db = array(
        'Title_cn' => 'Text',
        'Content_cn' => 'HTMLText',
    );

    private static $has_one = array();
}

class Article_Controller extends Page_Controller {

}