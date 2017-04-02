<?php

function isZipValid($zip) {
    
    $zipRegez = '/^[0-9]{5}$/';
    
    if ( preg_match($zipRegez, $zip) ) {
            return true;
    }
    
    return false;
}

function isDateValid($date) {
    return (bool)strtotime($date);
}

function isEmailValid($email) {
   if ( filter_var($email, FILTER_VALIDATE_EMAIL) !== false ) {
       return true;
   }
   
   return false;
}