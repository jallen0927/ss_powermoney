<?php

/**
 * Created by PhpStorm.
 * User: xlin
 * Date: 18/07/15
 * Time: 11:30 PM
 */
class PlanAdmin extends ModelAdmin {

    private static $managed_models = array('Company', 'PowerPlan', 'GasPlan', 'Area', 'Suburb');

    private static $url_segment = 'plans';

    private static $menu_title = 'Plans';

}
