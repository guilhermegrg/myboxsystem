<?php

class ValidationRule {
    public $type = "";
    public $conditions = "";
    public $message = "";
    
}

class VU{
    
    public const NOT_NULL = 'NOT_NULL';
    public const NOT_DUPLICATED = 'NOT_DUPLICATED';
    public const NAME = 'NAME';
    public const EMAIL = 'EMAIL';
    public const URL = 'URL';
    public const PASSWORD = 'PASSWORD';
    public const LENGTH = 'LENGTH';
    public const REGEX = 'REGEX';
    
//    public const MIN = 'MIN';
//    public const MAX = 'MAX';
//    public const BOOLEAN = 'BOOLEAN';
//    public const NUMERIC = 'NUMERIC';
//    public const INTEGER = 'INTEGER';
//    public const FLOAT = 'FLOAT';

    public static function getDocField($tag, $comment){

        $index = strpos($comment,$tag);
        if($index<=2)
            return null;
        
        $index = $index+strlen($tag);
        $comment = substr($comment,$index); //start on the new position
        $length = strpos($comment,PHP_EOL); //get the position of the first new line after the tag

//        echo "Length: $length <br>";
//        echo "Comment: $comment<br>";
        
        $type = substr($comment,0,$length);
//        echo "Type: $type<br>";
//        var_dump($type);
        return trim($type);
    }

 
    
    public static function getInstructions($prop){
        $comment = $prop->getDocComment();
        $rules =  VU::getDocField("VALIDATION:",$comment);
        
        if($rules==null)
            return null;
        
        $array = explode(', ', $rules);
        
        return $array;
    }
    
    public static function getWarning($rule){
        
//         echo "<br><br>RULE:<pre>";
//            var_dump($rule);
//            echo "</pre><br><br>";
        
        
        $index = strpos($rule,'"');
        if($index == false){
//            echo "no custom warning found!<br><br>";
            return $rule;
        }
        
//        $index = $index+strlen($tag);
//        $warning = substr($comment,$index); //start on the new position
//        $length = strpos($rule,PHP_EOL); //get the position of the first new line after the tag
        $warning = substr($rule,$index, strlen($rule)-1);
        $rule = substr($rule,0,$index);
        
        return [$rule,$warning];
        
    }
    
    
    public static function getRegex($rule){
        
        $index = strpos($rule,'=');
        if($index<0)
            return null;
        
        $regex = trim(substr($rule,$index+1));
        
        return $regex;
        
    }
    
    public static function getLengthConditions($rule){
        
        $index = strlen(VU::LENGTH);
        

        $conditions = trim(substr($rule,$index));
        
        return $conditions;
        
    }
    
    public static function decodeInstructions($array){
        
        $rules = [];
        $counter = 0;
        
        foreach($array as $rule){
        
            $rule = VU::getWarning($rule);
            
//             echo "<br><br><pre>";
//            var_dump($rule);
//            echo "</pre><br><br>";
            
            if(is_array($rule))
            {
                $warning = $rule[1];
                $rule = $rule[0];
            }else
                $warning = null; //TODO add default error messages
            

            $valRule = new ValidationRule();
            
            if(strpos($rule, VU::NOT_NULL) !== false)
            {
                if($warning == null)
                    $warning = "Can't be null!";
                
                $valRule->type = VU::NOT_NULL;
            }elseif(strpos($rule, VU::NOT_DUPLICATED) !== false)
            {
                if($warning == null)
                    $warning = "Already exists! Pick another one!";

                $valRule->type = VU::NOT_DUPLICATED;
            }elseif(strpos($rule, VU::NAME) !== false)
            {
                if($warning == null)
                    $warning = "Choose a valid name!";

                $valRule->type = VU::NAME;
            }elseif(strpos($rule, VU::EMAIL) !== false)
            {
                if($warning == null)
                    $warning = "Input a proper email!";

                $valRule->type = VU::EMAIL;
            }elseif(strpos($rule, VU::URL) !== false)
            {
                if($warning == null)
                    $warning = "Input a proper URL!";

                $valRule->type = VU::URL;
            }elseif(strpos($rule, VU::PASSWORD) !== false)
            {
                if($warning == null)
                    $warning = "Chooser a proper password!";

                $valRule->type = VU::PASSWORD;
            }elseif(strpos($rule, VU::LENGTH) !== false)
            {
                if($warning == null)
                    $warning = "Has to be longer than"; //TODO get length

                $valRule->type = VU::LENGTH;
                
                $regex = VU::getLengthConditions($rule);
                $valRule->conditions = $regex;
                
            }elseif(strpos($rule, VU::REGEX) !== false)
            {
                if($warning == null)
                    $warning = "Invalid format! ";

                
                $valRule->type = VU::REGEX;
                
                $regex = VU::getRegex($rule);
                
//                echo "Got a new Regex rule: $regex <br>";
                
                $valRule->conditions = $regex;
            }
            
            
            $valRule->message = $warning;
            $rules[$counter] = $valRule;
            ++$counter;
            
//            var_dump($elements);
//            echo "<br><br>";
            
        }
        
        return $rules;
        
    }
    
       public static function getValidations($class){
        $validations = [];
        $count = 0;
        
        $props = $class->getProperties();
        
        foreach($props as $prop){
            
            $key = $prop->getName();
            
            $array = VU::getInstructions($prop);
            
//            echo "<br><br><pre>";
//            var_dump($array);
//            echo "</pre><br><br>";
            
            if($array != null){
                $rules = VU::decodeInstructions($array);
                $validations[$key] = $rules;
                
            }
            
            ++$count;
        }
        
        return $validations;
        
    }
    
}



?>