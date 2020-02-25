<?php include_once("ValidationUtils.php"); ?>
<?php include_once("ReflectionUtils.php"); ?>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/myboxsystem/includes/DatabaseUtils.php"); ?>

<?php



abstract class ValidationTester {
    
    public abstract function isApplicable($type);
    
    public abstract function validate($validationRule, $fieldName, $fieldValue, $object);
    
    public abstract function getHTMLValidation($validationRule);
    
}

abstract class DefaultValidationTester extends ValidationTester {
    
    public $type ;
    
    public function isApplicable($type){
        return $this->type == $type;
    }

}


class NotNullTester extends DefaultValidationTester{
    
    public $type = VU::NOT_NULL;
    
    public function validate($validationRule, $fieldName, $fieldValue, $object){
        if($fieldValue == null || empty($fieldValue))
            return false;
        
        return true;
    }
    
    public function getHTMLValidation($validationRule){
        return " required ";
    }
    
    
    
}





class NameTester extends DefaultValidationTester{
    
    public $type = VU::NAME;
    
    public function validate($validationRule, $fieldName, $fieldValue, $object){
        return preg_match("/([\p{L}]{2,})([ ]+([\p{L}]{2,}))+/u",$fieldValue);
    }
    
    public function getHTMLValidation($validationRule){
        return " pattern='/([\p{L}]{2,})([ ]+([\p{L}]{2,}))+/u' title='{$validationRule->message}' ";
    }

    
}

class EmailTester extends DefaultValidationTester{
    
    public $type = VU::EMAIL;
    
    public function validate($validationRule, $fieldName, $fieldValue, $object){
        return filter_var($fieldValue, FILTER_VALIDATE_EMAIL);
    }
    
    public function getHTMLValidation($validationRule){
        return " pattern='(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|'(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*')@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])' title='{$validationRule->message}' ";
    }
    
}


class URLTester extends DefaultValidationTester{
    
    public $type = VU::URL;
    
    public function validate($validationRule, $fieldName, $fieldValue, $object){
        return filter_var($fieldValue, FILTER_VALIDATE_URL);
    }
    
     public function getHTMLValidation($validationRule){
        return " pattern='(\b(https?|ftp|file)://)?[-A-Za-z0-9+&@#/%?=~_|!:,.;]+[-A-Za-z0-9+&@#/%=~_|]' title='{$validationRule->message}' ";
    }
    
}

//weak password 
class PasswordTester extends DefaultValidationTester{
    
    public $type = VU::PASSWORD;
    
    public function validate($validationRule, $fieldName, $fieldValue, $object){
       
         return preg_match("/^[a-zA-Z0-9.!]{4,}$/",$fieldValue);
        
    }
    
     public function getHTMLValidation($validationRule){
        return " pattern='[a-zA-Z0-9.!]{4,}' title='{$validationRule->message}' ";
    }
    
}




class RegexTester extends DefaultValidationTester{
    
    public $type = VU::REGEX;
    
    public function validate($validationRule, $fieldName, $fieldValue, $object){
        
        $regex = $validationRule->conditions;
        
        $regexRule = "/^{$regex}$/";
        
        $result =  preg_match($regexRule,$fieldValue);
        
//        echo "Regex : $regexRule Value: $fieldValue Result: $result <br>";
        
        
        return $result;
        
    }
    
     public function getHTMLValidation($validationRule){
        return " pattern='{$validationRule->conditions}' title='{$validationRule->message}' ";
    }
    
}

class NotDuplicate extends DefaultValidationTester{
    
    public $type = VU::NOT_DUPLICATED;
    
    public function validate($validationRule, $fieldName, $fieldValue, $object){
        
        $result = $object->isFieldValueDuplicated($fieldName);
        
        return !$result;
        
    }
    
     public function getHTMLValidation($validationRule){
         return "";
     }
    
}


class LengthTester extends DefaultValidationTester{
    
    public $type = VU::LENGTH;
    
    public function validate($validationRule, $fieldName, $fieldValue, $object){
        
        $length = strlen($fieldValue);
        
//        if($fieldValue == null || empty($fieldValue))
//            return false;
        
        return true;
    }
    
    public function getHTMLValidation($validationRule){
         return "";
     }

    
}



class VE {
    
    
    public static $testers = [];
    
    
    public static function getTester($type){
        foreach(VE::$testers as $tester){
            
            if($tester->isApplicable($type))
                return $tester;
        }
        return null;
    }
    
    
    public static function validate($object){
        
//        echo "Begin validating!<br>";
        
        $class = new ReflectionClass(get_class($object));
        $vals = VU::getValidations($class);
        
        $messages = [];
        
        
//        echo "<br><br><pre>";
//        var_dump($vals);
//        echo "</pre><br><br>";
        
        
        foreach($vals as $fieldName => $rules){
            foreach($rules as $rule){
                $tester = VE::getTester($rule->type);
                $prop = $class->getProperty($fieldName);
                $fieldValue = $prop->getValue($object);
                
                
//                echo "Rule Type: {$rule->type} Value: $fieldValue <br>";
                
//                echo "Validating value!<br>";
                
                $result = $tester->validate($rule,$fieldName,$fieldValue,$object);
                
                if($result == false){
                    $messages[$fieldName] = $rule->message;
                    break;
                }
            }
        }
        
//        echo "Done validating!<br>";
        
        return $messages;
    }
    
    public static function getHTMLValidation($class, $fieldName){
        
        $html = "";
        
//        $class = new ReflectionClass(get_class($object));
        $vals = VU::getValidations($class);
        
        $rules = $vals[$fieldName];
        
        foreach($rules as $rule){
            $tester = VE::getTester($rule->type);
            
            if($tester == null)
                return "";
            else
            {
               $html.= $tester->getHTMLValidation($rule);
            }
            
            
            
        }
        
//        echo "HTML Validation: $html<br><br>";
        
        return $html;
    }
    
        
        
    
}
    

$notNull = new NotNullTester();
$regex = new RegexTester();
$length = new LengthTester();
$password = new PasswordTester();
$url = new URLTester();
$email = new EmailTester();
$name = new NameTester();  
$notDuplicate = new NotDuplicate();
    
VE::$testers = [$notNull, $name, $email, $url , $password, $length, $regex, $notDuplicate ];

//var_dump(VE::$testers);

?>