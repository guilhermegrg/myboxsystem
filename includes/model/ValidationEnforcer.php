<?php include_once("ValidationUtils.php"); ?>
<?php include_once("ReflectionUtils.php"); ?>
<?php include_once("../DatabaseUtils.php"); ?>

<?php



abstract class ValidationTester {
    
    public abstract function isApplicable($type);
    
    public abstract function validate($validationRule, $fieldName, $fieldValue, $object);
    
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
    
}





class NameTester extends DefaultValidationTester{
    
    public $type = VU::NAME;
    
    public function validate($validationRule, $fieldName, $fieldValue, $object){
        return preg_match("/([\p{L}]{2,})([ ]+([\p{L}]{2,}))+/u",$fieldValue);
    }
    
}

class EmailTester extends DefaultValidationTester{
    
    public $type = VU::EMAIL;
    
    public function validate($validationRule, $fieldName, $fieldValue, $object){
        return filter_var($fieldValue, FILTER_VALIDATE_EMAIL);
    }
    
}


class URLTester extends DefaultValidationTester{
    
    public $type = VU::URL;
    
    public function validate($validationRule, $fieldName, $fieldValue, $object){
        return filter_var($fieldValue, FILTER_VALIDATE_URL);
    }
    
}

//weak password 
class PasswordTester extends DefaultValidationTester{
    
    public $type = VU::PASSWORD;
    
    public function validate($validationRule, $fieldName, $fieldValue, $object){
       
         return preg_match("/^[a-zA-Z0-9.!]{4,}$/",$fieldValue);
        
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
    
}

class NotDuplicate extends DefaultValidationTester{
    
    public $type = VU::NOT_DUPLICATED;
    
    public function validate($validationRule, $fieldName, $fieldValue, $object){
        
        $result = $object->isFieldValueDuplicated($fieldName);
        
        return !$result;
        
        
        
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
                
                
                echo "Rule Type: {$rule->type} Value: $fieldValue <br>";
                
                
                
                $result = $tester->validate($rule,$fieldName,$fieldValue,$object);
                
                if($result == false){
                    $messages[$fieldName] = $rule->message;
                    break;
                }
            }
        }
        
        return $messages;
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