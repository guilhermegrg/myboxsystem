<?php include_once("../includes/db.php") ?>

<?php include "../includes/daos/UserDAO.php"; ?>


<?php
//    $name="";
//    $value="";
//    $active="off";
    
    if(isset($_POST["edit"])){
//        echo "post!";
        
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        var_dump($post);
        $id = $post["id"];
        $name = $post["name"];
        $email = $post["email"];
        $mobile = $post["mobile"];
        $birthday = $post["birthday"];
        
        if(isset($post['active']))
            $active = $post["active"];
        else
            $active = "off";
        
        
        
       $error = [];
        //todo check if name and valuea are not empty and valid
        if(empty($name) || $name=="")
        {
            $error["name"] = "Name cannot be empty!";
        }elseif(strlen($name)<=3){
            $error["name"] = "Name must have two or more names of at least 2 characters each";
        }elseif(!preg_match("/([\p{L}]{2,})([ ]+([\p{L}]{2,}))+/u",$name))
        {
            $error["name"] = "Name must have two or more names of at least 2 characters each";
        }
        
        if(empty($email) || $email=="")
        {
            $error["email"] = "Email cannot be empty!";
        }elseif(strlen($email)<1){
            $error["email"] = "Email must have more than one character!";
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $error["email"] = "Format Error! Enter a valid email account!";
        }else{
            $result = UserDAO::isDuplicateEmail($id,$email);
            if($result)
                $error["email"] = "Email already registered to another account! Choose another one!";
        }
        
        if(empty($mobile) || $mobile=="")
        {
            $error["mobile"] = "Mobile cannot be empty!";
        }elseif(strlen($mobile)<1){
            $error["mobile"] = "Mobile must have more than one character!";
        }elseif(!preg_match("/^[0-9]{9,}$/",$mobile))
        {
            $error["mobile"] = "Format Error! Enter a valid mobile phone number!";
        }
        
        
        if(empty($birthday) || $birthday=="")
        {
            $error["birthday"] = "Birthday cannot be empty!";
        }elseif(strlen($birthday)<1){
            $error["birthday"] = "Birthday must have more than one character!";
        }else
        {
            if(!strtotime($birthday))
                $error["birthday"] = "Format Error! Enter a valid date1!";
        }

        
        //todo check for uniqueness of name
        
//        var_dump($error);


        
        if(!empty($error))
        {
            
            setError("Please correct the form and submit again");
            setFormValidation("USER",$error);
            
//            send("discount_create_view.php");
//            var_dump($_SESSION);
//            exit;
        }else{
        
//         echo "active: $active<br>";
            $input_active= ($active=="on"?1:0);
//             echo "active 4: $active<br>";
            UserDAO::update($id, $name, $email, $mobile, $birthday, $input_active);
//           cleanFormValues("DISCOUNT");
            
           setSuccess("Updated User nº " . $id); 
           send("user_read_list_view.php"); 
        }
        
    }elseif(isset($_GET["edit"])){
        $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        $id = $get["edit"];
        
        if(!is_numeric($id))
            send("user_read_list_view.php");
        else
        if($id<=0)
            send("user_read_list_view.php");
        
        
        //load values from db
        $user = UserDAO::getById($id);
        $name = $user["name"];
        $email = $user["email"];
        $mobile = $user["mobile"];
        $birthday = $user["birthday"];
        $active = $user["active"];
        
//         echo "active 2: $active<br>";
        $active = ($active == 1?"on":"off");
//         echo "active 3: $active<br>";
    }
    

//echo "name: " . $name;
//echo "Email: " . $email;
//echo "active: ". $active;
    
    
    ?>

