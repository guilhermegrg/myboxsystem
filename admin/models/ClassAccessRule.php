<?php include_once($_SERVER['DOCUMENT_ROOT']."/myboxsystem/includes/model/SimpleRelationModel.php");?>
<?php


/** 
TABLE:  class_access_rule
CUSTOM_SELECT_QUERY: SELECT {tableName.fields}, modality_classes.name as modality_class_name FROM {tableName} LEFT JOIN modality_classes ON {tableName}.modality_class_id=modality_classes.id
*/
class ClassAccessRule extends SimpleRelationModel {

    /** 
    TYPE: int(11) NOT NULL
    RELATION: PARENT_ID
    */
    public $class_access_template_id;


    /** 
    TYPE: int(11) NOT NULL
    RELATION: CHILD_ID
    */
    public $id;
    
    /** 
    TYPE: int(11) NOT NULL
    */
    public $modality_class_id;
    
    /** 
    NOT-USED: CREATE, QUERY, INSERT, UPDATE
    */
    public $modality_class_name;

    /** 
    TYPE: int(11)
    */
    public $frequency;
    
    /** TYPE: SET('WEEKLY','MONTHLY') NOT NULL DEFAULT 'WEEKLY'
    */
    public $period;
    
    /** TYPE: boolean NOT NULL default true
    */
    public $limited = true;
    
}


$test = new ClassAccessRule();
$test->class_access_template_id = 1;
$test->id = 1;
$test->modality_class_id = 1;
$test->limited = true;
$test->frequency = 3;
$test->period = 'MONTHLY';

//
//$test->save();
//
//
//$test->id = 2;
//$test->save();
//
//$test->id = 3;
//$test->save();


//echo "created rule n.: " . $test->save() . "<br>";

//var_dump($test);

//ClassAccessRule::deleteAllChildrenFromParent(1);
//var_dump(ClassAccessRule::getChildrenAsObjects(1));




$test = new ClassAccessRule();
$test->class_access_template_id = 1;
$test->id = 1;
$test->modality_class_id = 3;
$list[0] = $test;

$test = new ClassAccessRule();
$test->class_access_template_id = 1;
$test->id = 2;
$test->modality_class_id = 3;
$list[1] = $test;

$test = new ClassAccessRule();
$test->class_access_template_id = 1;
$test->id = 3;
$test->modality_class_id = 3;
$list[2] = $test;

$test = new ClassAccessRule();
$test->class_access_template_id = 1;
$test->id = 4;
$test->modality_class_id = 3;
$list[3] = $test;

$test = new ClassAccessRule();
$test->class_access_template_id = 1;
$test->id = 5;
$test->modality_class_id = 3;
$list[4] = $test;


var_dump($list);

ClassAccessRule::updateChildren(1,$list);



var_dump(ClassAccessRule::getChildrenAsObjects(1));

?>