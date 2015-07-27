<?php

/**
 * Created by PhpStorm.
 * User: xlin
 * Date: 18/07/15
 * Time: 11:30 PM
 */
class SignupAdmin extends ModelAdmin {

    private static $managed_models = array('Signup');

    private static $url_segment = 'signups';

    private static $menu_title = 'Signups';

}
