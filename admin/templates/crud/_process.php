

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


//$className = "SMSTemplate";
//$filePrefix = "sms_template";
//$validationTAG = "SMS_TEMPLATE";
//$listVariableName = "smsTemplates";
//$singleObjectVariableName = "sms";
//$listPageTitle = "SMS Templates";
//$nameForMessages = "SMS Template";
//
//
//
////var_dump($createProps); 
//
//
//$tableFields = [
//    "#" => "id",
//    "Name" => "name",
//    "instructions" => 'content'
//];
//
//$formFields = [
//    "Name" => "name",
//    "Content" => 'content'
//];



$className = "PaymentMethod";
$filePrefix = "test_payment_method";
$validationTAG = "PaymentMethod";
$listVariableName = "paymentMethods";
$singleObjectVariableName = "paymentMethod";
$listPageTitle = "Payment Methods";
$nameForMessages = "Payment Method";



//var_dump($createProps); 


$tableFields = [
    "#" => "id",
    "Active" => "active",
    "Name" => "name",
    "Instructions" => 'instructions',
];

$formFields = [
    "Name" => "name",
    "Instructions" => 'instructions',
    "Active" => 'active'
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