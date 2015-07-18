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
    public function CalcForm() {

        $fields = new FieldList(
            $addressField = TextField::create('Address', _t('Home.Address', 'Please input your address')),
            $powerField = TextField::create('PowerAmount', _t('Home.PowerAmount', 'Your monthly power consumption')),
            $withGasField = CheckboxField::create('WithGas', _t('Home.WithGas', 'Also want to check gas plan?')),
            $gasField = TextField::create('GasAmount', _t('Home.GasAmount', 'Your monthly gas consumption'))
        );

        $actions = new FieldList(
            $submitField = FormAction::create('Calculate', _t('Home.Submit', 'Submit'))
        );

        $validator = new RequiredFields('Address', 'PowerAmount');

        $form = Form::create($this, __FUNCTION__, $fields, $actions, $validator);

        return $form;
    }


    public function Calculate($form, $data) {

    }

    public function getSuburbs() {
        $suburbs = array();

        return $suburbs;
    }
}