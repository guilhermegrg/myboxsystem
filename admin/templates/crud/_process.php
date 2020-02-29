<?php

require_once '../../../vendor/autoload.php';


$loader = new \Twig\Loader\FilesystemLoader('.');
$twig = new \Twig\Environment($loader, [
    'cache' => '/compilation_cache',
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

$vars = [
'className' => $className,
'filePrefix' => $filePrefix,
'validationTAG' => $validationTAG,
'listVariableName' => $listVariableName,
'singleObjectVariableName' => $singleObjectVariableName,
'listPageTitle' => $listPageTitle,
'nameForMessages' => $nameForMessages];




//echo $twig->render('index', ['name' => 'Fabien']);

$template = $twig->load('email_template_read_list_view.template.php.template');
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