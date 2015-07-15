<?php

class Page extends SiteTree {

	private static $db = array(
	);

	private static $has_one = array(
	);

}

class Page_Controller extends ContentController {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	private static $allowed_actions = array (
	);

	public function init() {
		parent::init();
		// You can include any CSS or JS required by your project here.
		// See: http://doc.silverstripe.org/framework/en/reference/requirements

        Requirements::css(BOWER_PATH . '/bootstrap/dist/css/bootstrap.min.css');
        Requirements::css('http://fonts.googleapis.com/css?family=Raleway');
        Requirements::css(BOWER_PATH . '/fancybox/source/jquery.fancybox.css');
		Requirements::css(CSS_DIR . '/customise.css');

        Requirements::javascript(BOWER_PATH . '/jquery/dist/jquery.min.js');
        Requirements::javascript(BOWER_PATH . '/bootstrap/dist/js/bootstrap.min.js');
        Requirements::javascript(BOWER_PATH . '/fancybox/source/jquery.fancybox.pack.js');

        Requirements::javascript(JS_DIR . '/customise.js');
	}

}
