
<?php include "models/ClassSchedule.php"; ?>
<?php include "models/ClassScheduleHasTimes.php"; ?>



<?php include "models/ModalityClass.php"; ?>
<?php include "models/Staff.php"; ?>
<?php include "models/User.php"; ?>



<?php
    
    if(isset($_POST["edit"])){
//        echo "post!";
        
       $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//        var_dump($post);
        
        $schedule = new ClassSchedule();

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
        
        if(isset($post['session_times'])){
            $session_times = $post['session_times'];
        }
        
        $schedule->id = $post["id"];
        
        
        $errors = $schedule->validate();
 

        
        //todo check for uniqueness of name
        
//        var_dump($discount);


        
        if(!empty($errors))
        {
            
            setError("Please correct the form and submit again");
            setFormValidation("ClassSchedule",$errors);
            
//            send("discount_create_view.php");
//            var_dump($_SESSION);
//            exit;
        }else{
        
//         echo "active: $active<br>";
//        $input_active= ($active=="on"?1:0);
//             echo "active 4: $active<br>";
            $schedule->save();
//           cleanFormValues("DISCOUNT");
            
            $childrenToSave = [];
            $counter = 1;
            foreach($session_times as $child){
                
                $stime = new ClassScheduleHasTimes();
                $stime->class_schedule_id = $schedule->id;
                $stime->id = $counter;
                $stime->times = $child;
                
                $childrenToSave[$counter]=$stime;
                ++$counter;
            }            
           
//            var_dump();
            
            ClassScheduleHasTimes::updateChildren($schedule->id,$childrenToSave);
            
            
           setSuccess("Updated Class Schedule Nº " . $schedule->id); 
           send("schedule_read_list_view.php"); 
            exit;
        }
        
    }elseif(isset($_GET["edit"])){
        $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        $id = $get["edit"];
        
        if(!is_numeric($id)){
            send("schedule_read_list_view.php");
            exit;
        }
        else
        if($id<=0){
            send("schedule_read_list_view.php");
            exit;
        }
        
        
        //load values from db
        $schedule = ClassSchedule::get($id);
        $children = ClassScheduleHasTimes::getChildrenAsObjects($id);
        
        $session_times = [];
        
        foreach($children as $child){
            array_push($session_times,$child->times);
        }
//        $name = $discount["name"];
//        $value = $discount["value"];
//        $active = $discount["active"];
//        
////         echo "active 2: $active<br>";
//        $active = ($active == 1?"on":"off");
//         echo "active 3: $active<br>";
    }
    

    
    
    ?>

