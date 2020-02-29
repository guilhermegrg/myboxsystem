
<?php include "models/EmailMessageTemplate.php"; ?>


<?php

    
    if(isset($_POST["create"])){
//        echo "post!";
        
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        var_dump($post);
        
        $email = new EmailMessageTemplate();
        $email->name = $post["name"];
        $email->title = $post["title"];
        $email->content = $post["content"];
        
//        if(isset($post['active']))
//            $paymentMethod->active = ($post["active"]=="on");
//        else
//            $paymentMethod->active = false;
        
        
                
//        $discount->import($post);
        
        $errors = $email->validate();
        
//        echo "<br><br><pre>";
//        var_dump($errors);
//        echo "</pre><br><br>";


        
        if(!empty($errors))
        {
//            echo "sending back to form to revalidate!<br>";
            setError("Please correct the form and submit again");
            setFormValidation("EMAIL_TEMPLATE",$errors);
            
//            send("discount_create_view.php");
//            var_dump($_SESSION);
//            exit;
        }else{
        
        echo "Creating Email Message Template!!<br>";
//            $active= ($active=="on"?1:0);
            
            $email->save();
            
            
           setSuccess("Created new Email Message Template Nº " . $id); 
           send("email_template_read_list_view.php"); 
            exit;
        }
        
    }else{
//        echo "No POST!<br>";
//         $name="";
//    $value="";
//    $active="off";
        $email = new EmailMessageTemplate();
    }
//echo "hello!";

//echo "name: " . $name;
//echo "value: " . $value;
//echo "active: ". $active;
    
    
    ?>

