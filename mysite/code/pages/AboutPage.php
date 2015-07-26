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

    private static $has_many = array(
        'Images' => 'SiteImage'
    );


    public function getCMSFields() {
        $fields = parent::getCMSFields();
        $fields->removeFieldsFromTab('Root.Main', array('Title', 'Content', 'URLSegment', 'MenuTitle'));
        $fields->addFieldsToTab('Root.Main', array(
            HtmlEditorField::create('Content', 'Content'),
            HtmlEditorField::create('Content_cn', 'Content_cn'),
            UploadField::create('Images', 'Images', $this->Images())
                ->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif'))
                ->setAllowedMaxFileNumber(5)
                ->setFolderName('AboutImages')
        ), 'Metadata');

        return $fields;
    }

    public function Content() {
        if (i18n::get_locale() === 'zh_CN') {
            return $this->Content_cn;
        }

        return $this->Content;
    }
}

class AboutPage_Controller extends Page_Controller {

}