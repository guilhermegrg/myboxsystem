
<?php include "models/ClassSchedule.php"; ?>

<?php include "models/ModalityClass.php"; ?>
<?php include "models/Staff.php"; ?>
<?php include "models/User.php"; ?>


<?php

    $schedule = new ClassSchedule();

    if(isset($_GET["date"])){
        $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        $schedule->startDate = $get["date"];  
    }


    
    if(isset($_POST["create"])){
//        echo "post!";
        
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        var_dump($post);
        
        

        $schedule->repetition = $post["repetition"];
        if(isset($post['monday']))
            $schedule->monday = ($post["monday"]=="on");
        else
            $schedule->monday = false;
        if(isset($post['tuesday']))
            $schedule->tuesday = ($post["tuesday"]=="on");
        else
            $schedule->tuesday = false;
        if(isset($post['wednesday']))
            $schedule->wednesday = ($post["wednesday"]=="on");
        else
            $schedule->wednesday = false;
        if(isset($post['thursday']))
            $schedule->thursday = ($post["thursday"]=="on");
        else
            $schedule->thursday = false;
        if(isset($post['friday']))
            $schedule->friday = ($post["friday"]=="on");
        else
            $schedule->friday = false;
        if(isset($post['saturday']))
            $schedule->saturday = ($post["saturday"]=="on");
        else
            $schedule->saturday = false;
        if(isset($post['sunday']))
            $schedule->sunday = ($post["sunday"]=="on");
        else
            $schedule->sunday = false;
        $schedule->startDate = $post["startDate"];
        if(isset($post['timeLimited']))
            $schedule->timeLimited = ($post["timeLimited"]=="on");
        else
            $schedule->timeLimited = false;
        $schedule->finishDate = $post["finishDate"];
        if(isset($post['active']))
            $schedule->active = ($post["active"]=="on");
        else
            $schedule->active = false;
        
        $schedule->modality_class_id = $post["modality_class_id"];
        
        $schedule->coach_id = $post["coach_id"];
        
        $schedule->session_price = $post["session_price"];
        if(isset($post['reservable']))
            $schedule->reservable = ($post["reservable"]=="on");
        else
            $schedule->reservable = false;
        if(isset($post['visibleToUsers']))
            $schedule->visibleToUsers = ($post["visibleToUsers"]=="on");
        else
            $schedule->visibleToUsers = false;
        if(isset($post['billable']))
            $schedule->billable = ($post["billable"]=="on");
        else
            $schedule->billable = false;
        if(isset($post['claimableByCoach']))
            $schedule->claimableByCoach = ($post["claimableByCoach"]=="on");
        else
            $schedule->claimableByCoach = false;
        if(isset($post['limitParticipants']))
            $schedule->limitParticipants = ($post["limitParticipants"]=="on");
        else
            $schedule->limitParticipants = false;
        
        $schedule->participantLimit = $post["participantLimit"];
        $schedule->durationInMinutes = $post["durationInMinutes"];
        
        
        
                
//        $discount->import($post);
        
        $errors = $schedule->validate();
        
//        echo "<br><br><pre>";
//        var_dump($errors);
//        echo "</pre><br><br>";


        
        if(!empty($errors))
        {
//            echo "sending back to form to revalidate!<br>";
            setError("Please correct the form and submit again");
            setFormValidation("ClassSchedule",$errors);
            
//            send("discount_create_view.php");
//            var_dump($_SESSION);
//            exit;
        }else{
        
        echo "Creating Class Schedule!!<br>";
//            $active= ($active=="on"?1:0);
            
           $id = $schedule->save();
            
            
           setSuccess("Created new Class Schedule Nº " . $schedule->id); 
           send("schedule_read_list_view.php"); 
            exit;
        }
        
    }else{
//        echo "No POST!<br>";
//         $name="";
//    $value="";
//    $active="off";
//        $schedule = new ClassSchedule();
    }
//echo "hello!";

//echo "name: " . $name;
//echo "value: " . $value;
//echo "active: ". $active;
    
    
    ?>

