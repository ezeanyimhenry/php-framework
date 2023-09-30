<?php 
namespace Framework\Validators;

class ProfileValidator extends BaseValidator
{
    public static function validateProfileData($data)
    {
        $errors = [];

        $nameValidation = self::validateName($data['firstname']);
        if ($nameValidation !== true) {
            $errors['firstname'] = $nameValidation;
        }

        $nameValidation = self::validateName($data['lastname']);
        if ($nameValidation !== true) {
            $errors['lastname'] = $nameValidation;
        }

        return $errors;
    }
}
