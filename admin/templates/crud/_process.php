

<?php

require_once '../../../includes/model/ReflectionUtils.php';

require_once '../../../vendor/autoload.php';


$loader = new \Twig\Loader\FilesystemLoader('.');
$twig = new \Twig\Environment($loader, [
    'cache' => 'false','auto_reload' => 'true'
]);

//$loader = new \Twig\Loader\ArrayLoader([
//    'index' => 'Hello {{ name }}!',
//]);
//$twig = new \Twig\Environment($loader);


$className = "SMSTemplate";
$filePrefix = "sms_template";
$validationTAG = "SMS_TEMPLATE";
$listVariableName = "smsTemplates";
$singleObjectVariableName = "sms";
$listPageTitle = "SMS Templates";
$nameForMessages = "SMS Template";

include_once("../../models/$className.php");

$class = new ReflectionClass($className);
$allprops = RU::getPropertiesAndTypesArray($class);
$createProps = RU::getOnlyCreateFields($class);

var_dump($createProps); 


$tableFields = [
    "#" => "id",
    "Name" => "name",
    "Content" => 'content'
];

$formFields = [
    "Name" => "name",
    "Content" => 'content'
];


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
?>