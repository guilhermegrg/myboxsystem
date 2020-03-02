
<?php include "models/{{ className }}.php"; ?>


<?php

    
    if(isset($_POST["create"])){
//        echo "post!";
        
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        var_dump($post);
        
        ${{ singleObjectVariableName }} = new {{ className }}();

{% for fieldname, type in createFields %}
{% if fieldname in fields|keys %}
{% set foo = fields[fieldname] %}
{% if 'BOOLEAN' in foo|upper  %}
        if(isset($post['{{ fieldname }}']))
            ${{ singleObjectVariableName }}->{{ fieldname }} = ($post["{{ fieldname }}"]=="on");
        else
            ${{ singleObjectVariableName }}->{{ fieldname }} = false;
{% else %}
        ${{ singleObjectVariableName }}->{{ fieldname }} = $post["{{ fieldname }}"];
{% endif %}
{% endif %}
{% endfor %}
        
        
        
                
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
            
           $id = ${{ singleObjectVariableName }}->save();
            
            
           setSuccess("Created new {{ nameForMessages }} Nº " . ${{ singleObjectVariableName }}->id); 
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

