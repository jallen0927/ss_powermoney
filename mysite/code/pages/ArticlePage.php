<?php

/**
 * Created by PhpStorm.
 * User: xlin
 * Date: 14/07/15
 * Time: 11:05 PM
 */
class ArticlePage extends Page {

    private static $db = array(
        'Date' => 'Date',
        'Title_cn' => 'Text',
        'Content_cn' => 'HTMLText'
    );

    private static $has_one = array();

    public function getCMSFields() {
        $fields = parent::getCMSFields();

        $fields->removeFieldsFromTab('Root.Main', array('Title', 'Content', 'MenuTitle'));
        $fields->addFieldsToTab('Root.Main', array(
            TextField::create('Title', 'Title'),
            TextField::create('Title_cn', 'Title_cn'),
            HtmlEditorField::create('Content', 'Content'),
            HtmlEditorField::create('Content_cn', 'Content_cn'),
            DateField::create('Date', 'Date')->setConfig ('showcalendar', true)
        ), 'URLSegment');

        return $fields;
    }

    public function Title() {
        if (i18n::get_locale() === 'zh_CN') {
            return $this->Title_cn;
        }

        return $this->Title;
    }

    public function Content() {
        if (i18n::get_locale() === 'zh_CN') {
            return $this->Content_cn;
        }

        return $this->Content;
    }
}

class ArticlePage_Controller extends Page_Controller {

}