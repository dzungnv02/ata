<?php

/* Template Name: PUSH USER INFOR TO ZOHO VIA NEXTEND */

$current_user = wp_get_current_user();

if ($current_user && $current_user->ID) {

    // insert a new contact to Zoho
    $crm = new \Zoho\CRM;
    $crm->insertRecord(\Zoho\CRM::MODULE_CONTACTS, [
        'data' => [
            [
                "Last_Name" => $current_user->user_lastname,
                "First_Name" => $current_user->user_firstname,
                "Email" => $current_user->user_email
            ]
        ]
    ]);
}

$redirect_to = get_home_url();

header("Location: " . $redirect_to);
die();