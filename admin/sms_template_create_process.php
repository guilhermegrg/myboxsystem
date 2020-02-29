
<?php include "models/SMSTemplate.php"; ?>


<?php

    
    if(isset($_POST["create"])){
//        echo "post!";
        
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        var_dump($post);
        
        $sms = new SMSTemplate();

        $sms->name = $post["name"];
        $sms->content = $post["content"];
                 
        
//        $sms->name = $post["name"];
//        $sms->title = $post["title"];
//        $sms->content = $post["content"];
        
//        if(isset($post['active']))
//            $paymentMethod->active = ($post["active"]=="on");
//        else
//            $paymentMethod->active = false;
        
        
                
//        $discount->import($post);
        
        $errors = $sms->validate();
        
//        echo "<br><br><pre>";
//        var_dump($errors);
//        echo "</pre><br><br>";


        
        if(!empty($errors))
        {
//            echo "sending back to form to revalidate!<br>";
            setError("Please correct the form and submit again");
            setFormValidation("SMS_TEMPLATE",$errors);
            
//            send("discount_create_view.php");
//            var_dump($_SESSION);
//            exit;
        }else{
        
        echo "Creating SMS Template!!<br>";
//            $active= ($active=="on"?1:0);
            
            $sms->save();
            
            
           setSuccess("Created new SMS Template Nº " . $id); 
           send("sms_template_read_list_view.php"); 
            exit;
        }
        
    }else{
//        echo "No POST!<br>";
//         $name="";
//    $value="";
//    $active="off";
        $sms = new SMSTemplate();
    }
//echo "hello!";

//echo "name: " . $name;
//echo "value: " . $value;
//echo "active: ". $active;
    
    
    ?>

