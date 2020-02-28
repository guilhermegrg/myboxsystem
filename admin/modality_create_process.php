
<?php include "models/Modality.php"; ?>


<?php

    
    if(isset($_POST["create"])){
//        echo "post!";
        
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        var_dump($post);
        
        $modality = new Modality();
        $modality->name = $post["name"];
       
        
        if(isset($post['active']))
            $modality->active = ($post["active"]=="on");
        else
            $modality->active = false;
        
        
                
//        $discount->import($post);
        
        $errors = $modality->validate();
        
//        echo "<br><br><pre>";
//        var_dump($errors);
//        echo "</pre><br><br>";


        
        if(!empty($errors))
        {
//            echo "sending back to form to revalidate!<br>";
            setError("Please correct the form and submit again");
            setFormValidation("MODALITY",$errors);
            
//            send("discount_create_view.php");
//            var_dump($_SESSION);
//            exit;
        }else{
        
        echo "Creating Modality!!<br>";
//            $active= ($active=="on"?1:0);
            
            $modality->save();
            
            
           setSuccess("Created new Modality Nº " . $id); 
           send("modality_read_list_view.php"); 
            exit;
        }
        
    }else{
//        echo "No POST!<br>";
//         $name="";
//    $value="";
//    $active="off";
        $modality = new Modality();
    }
//echo "hello!";

//echo "name: " . $name;
//echo "value: " . $value;
//echo "active: ". $active;
    
    
    ?>

