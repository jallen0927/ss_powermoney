<?php

/**
 * Created by PhpStorm.
 * User: xlin
 * Date: 14/07/15
 * Time: 11:05 PM
 */
class ContactPage extends Page {

    private static $db = array();

    private static $has_many = array();

}

class ContactPage_Controller extends Page_Controller {

    private static $email = 'shawn@3a.nz';

    private static $allowed_actions = array(
        'ContactForm'
    );

    /**
     * @return mixed
     * The contact us form
     */
    public function ContactForm() {
        $fields = FieldList::create(
            TextField::create('Name', _t('Contact.Name', 'Name')),
            TextField::create('Email', _t('Contact.Email', 'Email')),
            TextField::create('Phone', _t('Contact.Phone', 'Phone Number')),
            TextField::create('Subject', _t('Contact.Subject', 'Subject')),
            TextareaField::create('Message', _t('Contact.Message', 'Message'))
        );

        $actions = FieldList::create(
            FormAction::create('Submit', _t('Contact.Submit', 'Submit'))
        );

        $required = RequiredFields::create('Name', 'Email', 'Message');

        $form = new Form($this, __FUNCTION__, $fields, $actions, $required);

        if (Session::get('Contact')) {
            $form->loadDataFrom(Session::get('Contact'));
        }

        return $form;
    }

    /**
     * @param $data
     * @param Form $form
     * @return bool|SS_HTTPResponse
     * Handle form submission
     */
    public function Submit($data, Form $form) {
        Session::set('Contact', $data);

        if($this->sendMail($data)) {
            Session::clear('Contact');
        }

        $form->sessionMessage('Your message has been sent', 'good');

        return $this->redirectBack();
    }

    /**
     * @param $data
     * @return bool
     * Send email with data user input
     */
    public function sendMail($data) {
        $from = $data['Email'];
        $to = self::$email;
        $subject = $data['Subject'];
        $body = "Name: {$data['Name']}\r\nPhone Number: {$data['Phone']}\r\nMessage: {$data['Message']}";

        $email = new Email($from, $to, $subject, $body);

        return $email->sendPlain();
    }
}