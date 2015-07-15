<?php

/**
 * Created by PhpStorm.
 * User: xlin
 * Date: 15/07/15
 * Time: 9:35 AM
 */
class BlogsPage extends Page {

    private static $db = array();

    private static $allowed_children = array(
        'ArticlePage'
    );

}

class BlogsPage_Controller extends Page_Controller {


}