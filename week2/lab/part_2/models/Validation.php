<?php

class Validation {

    public function isZipValid($zip) {

        $zipRegez = '/^[0-9]{5}$/';

        if ( preg_match($zipRegez, $zip) ) {
                return true;
        }

        return false;
    }

    public function isDateValid($date) {
        return (bool)strtotime($date);
    }

    public function isEmailValid($email) {
       if ( filter_var($email, FILTER_VALIDATE_EMAIL) !== false ) {
           return true;
       }

       return false;
    }
    
    public function isEmpty($input) {
        if (empty($input)) {
            return true;
        }
        
        return false;
    }

}