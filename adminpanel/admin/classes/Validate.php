<?php
class Validate
{
    public function validateEmail($email)
    {
        $rezult = filter_var($_REQUEST[$email], FILTER_VALIDATE_EMAIL);
        
        return $rezult;
    }

    public function validateIntFloat($int)
    {
        $rezult = filter_var($_REQUEST[$int], FILTER_VALIDATE_FLOAT);
        
        return $rezult;
    }

    public function validateInt($int)
    {
        $rezult = filter_var($_REQUEST[$int], FILTER_VALIDATE_INT);
        
        return $rezult;
    }
}

