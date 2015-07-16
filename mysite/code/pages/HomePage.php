<?php

/**
 * Created by PhpStorm.
 * User: xlin
 * Date: 14/07/15
 * Time: 11:05 PM
 */
class HomePage extends Page {

    private static $db = array();

    private static $has_many = array();
}

class HomePage_Controller extends Page_Controller {

    private static $allowed_actions = array(
        'PowerForm'
    );

    /**
     * @return mixed
     * Calculate power form
     */
    public function PowerForm() {

        $fields = new FieldList(
            $addressField = TextField::create('Address', _t('Home.Address', 'Please input your address')),
            $powerField = TextField::create('PowerAmount', _t('Home.PowerAmount', 'Your monthly power consumption'))
        );

        $addressField->addExtraClass('form-group');
        $powerField->addExtraClass('form-group');

        $actions = new FieldList(
            $submitField = FormAction::create('submitPower', _t('Home.Submit', 'Submit'))
        );

        $form = Form::create($this, __FUNCTION__, $fields, $actions);

        return $form;
    }

    /**
     * @return mixed
     * Calculate gas form
     */
    public function GasForm() {

        $fields = new FieldList(
            $addressField = TextField::create('Address', _t('Home.Address', 'Please input your address')),
            $powerField = TextField::create('PowerAmount', _t('Home.PowerAmount', 'Your monthly power consumption')),
            $gasField = TextField::create('GasAmount', _t('Home.GasAmount', 'Your monthly gas consumption'))
        );

        $actions = new FieldList(
            $submitField = FormAction::create('submitGas', _t('Home.Submit', 'Submit'))
        );

        $form = Form::create($this, __FUNCTION__, $fields, $actions);

        return $form;
    }
}