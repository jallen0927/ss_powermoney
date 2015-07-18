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
        'CalcForm'
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
        $suburb = $data['Suburb'];
        $area = $this->Area($suburb);

        if ($area) {
            $powerPlans = $this->CalcPower($area->ID);
            $data = array(
                'PowerPlans' => $powerPlans
            );

            return $this->customise($data)->renderWith(array('HomePage_Result', 'Page'));
        }

        $form->addErrorMessage('Address', _t('HOME.AddressInvalid', 'Sorry, your area is not supported yet.'), 'bad');

        $this->redirectBack();
    }


    /**
     * @param $suburbName
     * @return bool|int|string
     * Get the area of given suburb
     */
    public function Area($suburbName) {
        $suburb = Suburb::get_one('Suburb', "Name = '$suburbName'");

        if ($suburb) {
            return $suburb->area();
        }

        return false;
    }

    public function CalcPower($areaID) {
        $plans = PowerPlan::get('PowerPlan', "AreaID = '$areaID'");

        return $plans;
    }

}