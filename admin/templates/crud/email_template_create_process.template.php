
<?php include "models/{{ className }}.php"; ?>


<?php

    
    if(isset($_POST["create"])){
//        echo "post!";
        
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        var_dump($post);
        
        ${{ singleObjectVariableName }} = new {{ className }}();

        {% for fieldname, type in createFields %}
${{ singleObjectVariableName }}->{{ fieldname }} = $post["{{ fieldname }}"];
        {% endfor %}
         
        if(isset($post['active']))
            $modality->active = ($post["active"]=="on");
        else
            $modality->active = false;
        
        
        
//        ${{ singleObjectVariableName }}->name = $post["name"];
//        ${{ singleObjectVariableName }}->title = $post["title"];
//        ${{ singleObjectVariableName }}->content = $post["content"];
        
//        if(isset($post['active']))
//            $paymentMethod->active = ($post["active"]=="on");
//        else
//            $paymentMethod->active = false;
        
        
                
//        $discount->import($post);
        
        $errors = ${{ singleObjectVariableName }}->validate();
        
//        echo "<br><br><pre>";
//        var_dump($errors);
//        echo "</pre><br><br>";


        
        if(!empty($errors))
        {
//            echo "sending back to form to revalidate!<br>";
            setError("Please correct the form and submit again");
            setFormValidation("{{ validationTAG }}",$errors);
            
//            send("discount_create_view.php");
//            var_dump($_SESSION);
//            exit;
        }else{
        
        echo "Creating {{ nameForMessages }}!!<br>";
//            $active= ($active=="on"?1:0);
            
            ${{ singleObjectVariableName }}->save();
            
            
           setSuccess("Created new {{ nameForMessages }} Nº " . $id); 
           send("{{ filePrefix }}_read_list_view.php"); 
            exit;
        }
        
    }else{
//        echo "No POST!<br>";
//         $name="";
//    $value="";
//    $active="off";
        ${{ singleObjectVariableName }} = new {{ className }}();
    }
//echo "hello!";

//echo "name: " . $name;
//echo "value: " . $value;
//echo "active: ". $active;
    
    
    ?>

