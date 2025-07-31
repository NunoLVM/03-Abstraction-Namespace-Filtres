<?php

namespace App;

class FormValidator {
    public static function nettoyerNom($nom) {
        return filter_var($nom, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    public static function validerEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function validerAge($age) {
        $age = filter_var($age, FILTER_VALIDATE_INT);
        if ($age === false || $age < 13 || $age > 120) {
            return false;
        }
        return $age;
    }    

    public static function validerWebsite($website) {
        return filter_var($website, FILTER_VALIDATE_URL);
    }
    
}    