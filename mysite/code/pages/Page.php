<?php

class Page extends SiteTree {

	private static $db = array(
	);

	private static $has_one = array(
	);


    public function getMenuTitle() {
        $pageName = $this->ClassName;

        return _t("Common.Menu.$pageName", parent::getMenuTitle());
    }

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
        'setLanguage'
	);

    private static $url_handlers = array(
        'lang/$language' => 'setLanguage'
    );

    /**
     * @var array
     * Array containing all allowed languages
     */
    private static $allowed_languages = array(
        'cn' => array(
            'code' => 'cn',
            'title' => '中文',
            'locale' => 'zh_CN'
        ),
        'en' => array(
            'code' => 'en',
            'title' => 'English',
            'locale' => 'en_US'
        )
    );

	public function init() {
		parent::init();

        i18n::set_locale(Session::get('language'));
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

    /**
     * @param HttpRequest $request
     * @return mixed
     * Function is to set language.
     * Default 'en_US'
     */
    public function setLanguage(HttpRequest $request) {

        $language = $request->param('language');

        if (array_key_exists($language, self::$allowed_languages)) {
            Session::set('language', self::$allowed_languages[$language]['locale']);
        } else {
            Session::set('language', 'en_US');
        }

        return $this->redirectBack();
    }

    /**
     * @return mixed
     * Get available languages
     */
    public function getLanguages() {

        $languages = ArrayList::create(self::$allowed_languages);
        return $languages;
    }

}
