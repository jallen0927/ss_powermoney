<?php

/**
 * Created by PhpStorm.
 * User: xlin
 * Date: 27/07/15
 * Time: 9:37 PM
 */
class SignupPage extends Page {

}

class SignupPage_Controller extends Page_Controller {

    public function index(SS_HTTPRequest $request) {
        $vars = $request->getVars();
        if (array_key_exists('power', $vars) && $vars['power']) {
            $data['type'] = 'PowerPlan';
            $data['id'] = $vars['power'];
            Session::set('Signup', $data);
        } elseif (array_key_exists('gas', $vars) && $vars['gas']) {
            $data['type'] = 'GasPlan';
            $data['id'] = $vars['gas'];
            Session::set('Signup', $data);
        } else {
            $this->redirect('home/result');
        }

        return $this;
    }

    public function SignupForm() {
        $fields = new FieldList();

        $detailFields = new CompositeField(
            DropdownField::create('Title', _t('Signup.Title', 'Title'), array('Mr', 'Miss', 'Mrs', 'Ms', 'Dr')),
            TextField::create('FirstName', _t('Signup.FirstName', 'First Name')),
            TextField::create('LastName', _t('Signup.LastName', 'Last Name')),
            TextField::create('Phone', _t('Signup.Phone', 'Phone')),
            TextField::create('Email', _t('Signup.Email', 'Email')),
            TextField::create('License', _t('Signup.License', 'License No.')),
            TextField::create('Version', _t('Signup.Version', 'License Version')),
            DateField::create('DateOfBirth', _t('Signup.DateOfBirth', 'Date Of Birth'))->setConfig('showcalendar', true)
        );

        $propertyFields = new CompositeField(
            TextField::create('Address', _t('Signup.Address', 'Property'))->setAttribute('placeholder', _t('Signup.PropertyTip', 'Your property address')),
            OptionsetField::create('Primary', _t('Signup.Primary', 's this your primary address?'), array(
                '1' => _t('Signup.Yes', 'Yes'),
                '0' => _t('Signup.No', 'No')
            )),
            OptionsetField::create('Services', _t('Signup.Services', 'How many people live in your household?'), array(
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '4 or more' => '4' . _t('Signup.More', 'or more')
            )),
            OptionsetField::create('Situation', _t('Signup.Situation', 'What is your situation?'), array(
                'Moving' => _t('Signup.Moving', "I'm moving or need a new connection"),
                'Switch' => _t('Signup.Switch', 'I just want to switch energy providers')
            )),
            OptionsetField::create('Prevent', _t('Signup.Prevent', 'Is there anything that could prevent a meter reader accessing your meter, such as any dogs on the property?'), array(
                '1' => _t('Signup.Yes', 'Yes'),
                '0' => _t('Signup.No', 'No')
            )),
            OptionsetField::create('Medical', _t('Signup.Medical', 'Is anyone at this property reliant on mains electricity for critical medical support?'), array(
                '1' => _t('Signup.Yes', 'Yes'),
                '0' => _t('Signup.No', 'No')
            )),
            OptionsetField::create('Threat', _t('Signup.Threat', 'Does disconnection of electricity present a clear threat to the health or wellbeing of anyone at this property for reasons of age, health or disability?'), array(
                '1' => _t('Signup.Yes', 'Yes'),
                '0' => _t('Signup.No', 'No')
            ))
        );

        $billingFields = new CompositeField(
            OptionsetField::create('BillingSame', _t('Signup.BillingSame', 'Is your billing address the same as your supply address?'), array(
                '1' => _t('Signup.Yes', 'Yes'),
                '0' => _t('Signup.No', 'No')
            )),
            TextField::create('Billing', _t('Signup.Billing', 'Billing address'))
        );

        $fields->push($detailFields);
        $fields->push($propertyFields);
        $fields->push($billingFields);

        $actions = new FieldList(
            FormAction::create('Submit', 'Submit')
        );

        $required = new RequiredFields();

        $form = new Form($this, __FUNCTION__, $fields, $actions, $required);

        return $form;
    }
}