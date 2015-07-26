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

    public function getArticleSummaries() {
        $articles = ArticlePage::get()->sort('Date', 'Desc')->toArray();

        $summaries = new ArrayList();
        for ($i = 0; $i < 4; $i ++) {
            if (array_key_exists($i, $articles)) {
                $article = $articles[$i];

                $summaries->push($article);
            }

        }

        return $summaries;
    }
}

class HomePage_Controller extends Page_Controller {

    private static $allowed_actions = array(
        'CalcForm',
        'Result'
    );

    private static $url_handlers = array(
        'result' => 'Result'
    );

    /**
     * @return mixed
     * Calculate power form
     */
    public function CalcForm() {

        $fields = new FieldList(
            $addressField = TextField::create('Address', _t('Home.Address', 'Please input your address')),
            $suburbField = HiddenField::create('Suburb'),
            $powerField = TextField::create('PowerAmount', _t('Home.PowerAmount', 'Your monthly power consumption')),
            $withGasField = CheckboxField::create('WithGas', _t('Home.WithGas', 'Also want to check gas plan?')),
            $gasField = TextField::create('GasAmount', _t('Home.GasAmount', 'Your monthly gas consumption'))
        );

        $gasField->setAttribute('disabled', 'disabled');

        $actions = new FieldList(
            $submitField = FormAction::create('Calculate', _t('Home.Submit', 'Submit'))
        );

        $validator = new RequiredFields('Address', 'PowerAmount');

        $form = Form::create($this, __FUNCTION__, $fields, $actions, $validator);

        return $form;
    }


    /**
     * @param $data
     * @param Form $form
     * @return HTMLText
     * This is the function for calculate cost of plans based on input data, the cost data will add into original plan objects
     */
    public function Calculate($data, Form $form) {
        Session::set('checkData', serialize($data));
        $area = PlanCalculator::getArea($data['Suburb']);

        if ($area) {
            return $this->redirect('home/result');
        }

        $form->addErrorMessage('Address', _t('Home.AddressInvalid', 'Sorry, your area is not supported yet.'), 'bad');

        return $this->redirectBack();
    }

    public function Result() {
        $checkData = unserialize(Session::get('checkData'));
        $withGas = array_key_exists('WithGas', $checkData) ? $checkData['WithGas'] : false;
        $gasAmount = array_key_exists('GasAmount', $checkData) ? $checkData['GasAmount'] : 0;
        $calculator = new PlanCalculator($checkData['Suburb'], $checkData['PowerAmount'], $withGas, $gasAmount);

        $result = $calculator->Calculate();

        return $this->customise($result)->renderWith(array('HomePage_Result', 'Page'));
    }

    public function WithGas() {
        $checkData = unserialize(Session::get('checkData'));
        $withGas = array_key_exists('WithGas', $checkData) ? $checkData['WithGas'] : false;

        return $withGas;
    }

    public function init() {
        parent::init();

        Requirements::javascript(JS_DIR . '/homepage.js');
    }
}