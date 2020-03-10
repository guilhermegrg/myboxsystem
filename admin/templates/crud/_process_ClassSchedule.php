

<?php



require_once '../../../includes/model/ReflectionUtils.php';

require_once '../../../vendor/autoload.php';


$loader = new \Twig\Loader\FilesystemLoader('.');
$twig = new \Twig\Environment($loader, [
    'cache' => 'false','auto_reload' => 'true'
]);




$className = "ClassSchedule";
$filePrefix = "schedule";
$validationTAG = "ClassSchedule";
$listVariableName = "schedules";
$singleObjectVariableName = "schedule";
$listPageTitle = "Class Schedules";
$nameForMessages = "Class Schedule";



//var_dump($createProps); 


$tableFields = [
    "#" => "id",
    "Active" => "active",
    "Date" => "startDate",
    "Class" => "modality_class_name",
    "Coach" => "coach_name",
    
    "Res" => "reservable",
    "Vis" => "visibleToUsers",
    "Bill" => "billable",
    "Claim" => "claimableByCoach",
    
    "Limit" => "limitParticipants",
    "part" => "participantLimit",
    "Dur" => "durationInMinutes",
    
];

$formFields = [
    "Active" => "active",
    "Date" => "startDate",
    "Time Limited" => "timeLimited",
    "Finish Date" => "finishDate",
    
    
    "Class" => "modality_class_id",
    "Coach" => "coach_id",
    
    "Reservable" => "reservable",
    "Visible to Users" => "visibleToUsers",
    "Billable" => "billable",
    "Claimable by Coach" => "claimableByCoach",
    
    "Limit Participants" => "limitParticipants",
    "Participant Limit" => "participantLimit",
    "Duration in Minutes" => "durationInMinutes",
    

    "Repetition" => "repetition",
    
    "sunday" => "sunday",
    "Monday" => "monday",
    "Tuesday" => "tuesday",
    "Wednesday" => "wednesday",
    "Thursday" => "thursday",
    "Friday" => "friday",
    "Saturday" => "saturday"
    
    
];



include_once("../../models/$className.php");

$class = new ReflectionClass($className);
$allprops = RU::getPropertiesAndTypesArray($class);
$createProps = RU::getOnlyCreateFields($class);

$vars = [
'className' => $className,
'filePrefix' => $filePrefix,
'validationTAG' => $validationTAG,
'listVariableName' => $listVariableName,
'singleObjectVariableName' => $singleObjectVariableName,
'listPageTitle' => $listPageTitle,
'nameForMessages' => $nameForMessages,
'fields' => $allprops,
'createFields' =>  $createProps,
'tableFields' => $tableFields,
'formFields' => $formFields
];



if(isset($_POST['generate'])){
//echo $twig->render('index', ['name' => 'Fabien']);

$template = $twig->load('email_template_read_list_view.template.php');
$text =  $template->render($vars);
$myfile = fopen("../../{$filePrefix}_read_list_view.php", "w");
fwrite($myfile,$text);
fclose($myfile);

$template = $twig->load('email_template_create_process.template.php');
$text =  $template->render($vars);
$myfile = fopen("../../{$filePrefix}_create_process.php", "w");
fwrite($myfile,$text);
fclose($myfile);

$template = $twig->load('email_template_edit_process.template.php');
$text =  $template->render($vars);
$myfile = fopen("../../{$filePrefix}_edit_process.php", "w");
fwrite($myfile,$text);
fclose($myfile);

$template = $twig->load('email_template_create_view.template.php');
$text =  $template->render($vars);
$myfile = fopen("../../{$filePrefix}_create_view.php", "w");
fwrite($myfile,$text);
fclose($myfile);


$template = $twig->load('email_template_edit_view.template.php');
$text =  $template->render($vars);
$myfile = fopen("../../{$filePrefix}_edit_view.php", "w");
fwrite($myfile,$text);
fclose($myfile);
    
 
    echo "<br>Generated 5 files for CRUD !<br><br>";
    
}
    
?>


<form action="" method="post" >
   
   
   <div class="form-group">
        <label for="name">Class Schedule:</label>
    </div>
   
   
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="generate" value="Generate">
    </div>

    
</form> 


<?php

echo "<pre>";
var_dump($vars);
echo "</pre>";

?>