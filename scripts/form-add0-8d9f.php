<?php

require_once('FormProcessor.php');

$form = array(
    'subject' => 'New Form Submission',
    'email_message' => 'You have a new form submission',
    'success_redirect' => '',
    'sendIpAddress' => true,
    'email' => array(
        'from' => 'email@gmail.com',
        'to' => 'soholalfa@gmail.com',
        'toCopy' => 'soholalfa@gmail.com',
        'toHiddenCopy' => 'soholalfa@gmail.com'
    ),
    'fields' => array(
        'name' => array(
            'order' => 1,
            'type' => 'string',
            'label' => 'الاسم',
            'required' => true,
            'errors' => array(
                'required' => 'Field \'الاسم\' is required.'
            )
        ),
        'email' => array(
            'order' => 2,
            'type' => 'email',
            'label' => 'Email',
            'required' => true,
            'errors' => array(
                'required' => 'Field \'Email\' is required.'
            )
        ),
    )
);

$processor = new FormProcessor('');
$processor->process($form);

?>