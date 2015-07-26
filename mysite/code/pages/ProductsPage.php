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
        'LeftImages' => 'SiteImage',
        'RightImages' => 'AddImage'
    );

    public function ContentLeft() {
        if (i18n::get_locale() === 'zh_CN') {
            return $this->ContentLeft_cn;
        }

        return $this->ContentLeft;
    }

    public function ContentRight() {
        if (i18n::get_locale() === 'zh_CN') {
            return $this->ContentRight_cn;
        }

        return $this->ContentRight;
    }

    public function getCMSFields() {
        $fields = parent::getCMSFields();

        $fields->removeFieldsFromTab('Root.Main', array('Content', 'Title', 'MenuTitle', 'URLSegment'));

        $fields->addFieldsToTab('Root.Main', array(
            HtmlEditorField::create('ContentLeft', 'Left Content'),
            HtmlEditorField::create('ContentLeft_cn', 'Left Content cn'),
            HtmlEditorField::create('ContentRight', 'Right Content'),
            HtmlEditorField::create('ContentRight_cn', 'Right Content cn'),
            $leftImagesField = UploadField::create('LeftImages', 'Left Images', $this->LeftImages()),

            $rightImagesField = UploadField::create('RightImages', 'Right Images', $this->RightImages())
        ), 'Metadata');

        $leftImagesField->setAllowedExtensions(array('jpg', 'jpeg', 'gif', 'png'))
            ->setAllowedMaxFileNumber(20)
            ->setFolderName('LeftImages');

        $rightImagesField->setAllowedExtensions(array('jpg', 'jpeg', 'gif', 'png'))
            ->setAllowedMaxFileNumber(20)
            ->setFolderName('RightImages');

        return $fields;
    }
}

class ProductsPage_Controller extends Page_Controller {

    public function init() {
        parent::init();

        Requirements::javascript(JS_DIR . '/productspage.js');
    }
}