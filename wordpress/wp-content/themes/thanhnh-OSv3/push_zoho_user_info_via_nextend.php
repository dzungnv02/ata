<?php

/* Template Name: PUSH USER INFOR TO ZOHO VIA NEXTEND */

$current_user = wp_get_current_user();

if ($current_user && $current_user->ID) {

    $crm = new \Zoho\CRM;

    // check if user existed
    $zoho_contact = $crm->search(\Zoho\CRM::MODULE_CONTACTS, 'email', $current_user->user_email);

    // insert new
    if (!$zoho_contact) {
        $crm->insertRecord(\Zoho\CRM::MODULE_CONTACTS, [
            'data' => [
                [
                    "Last_Name" => $current_user->user_lastname,
                    "First_Name" => $current_user->user_firstname,
                    "Email" => $current_user->user_email,
                    "Lead_Source" => 'sanhangnhapkhau',
                    "Group" => 'Khách lẻ'
                ]
            ]
        ]);
    }
}

$redirect_to = get_home_url();

header("Location: " . $redirect_to);
die();