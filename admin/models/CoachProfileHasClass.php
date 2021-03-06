<?php include_once($_SERVER['DOCUMENT_ROOT']."/myboxsystem/includes/model/SimpleRelationModel.php");?>
<?php


/** 
TABLE:  coach_profile_has_class
CUSTOM_SELECT_QUERY: SELECT {tableName.fields}, modality_classes.name as modality_class_name, modalities.name as modality_name FROM {tableName} LEFT JOIN modality_classes ON {tableName}.modality_class_id=modality_classes.id LEFT JOIN modalities ON modality_classes.modality_id=modalities.id
*/
class CoachProfileHasClass extends SimpleRelationModel {

    /** 
    TYPE: int(11) NOT NULL
    RELATION: PARENT_ID
    */
    public $coach_profile_id;


    /** 
    TYPE: int(11) NOT NULL
    RELATION: CHILD_ID
    */
    public $modality_class_id;
    
    /** 
    NOT-USED: CREATE, QUERY, INSERT, UPDATE
    */
    public $modality_class_name;

    /** 
    NOT-USED: CREATE, QUERY, INSERT, UPDATE
    */
    public $modality_name;
    
}


//$test = new ClassAccessRule();
//$test->class_access_template_id = 1;
//$test->id = 1;
//$test->modality_class_id = 1;
//$test->limited = true;
//$test->frequency = 3;
//$test->period = 'MONTHLY';

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



//
//$test = new ClassAccessRule();
//$test->class_access_template_id = 1;
//$test->id = 1;
//$test->modality_class_id = 3;
//$list[0] = $test;
//
//$test = new ClassAccessRule();
//$test->class_access_template_id = 1;
//$test->id = 2;
//$test->modality_class_id = 3;
//$list[1] = $test;
//
//$test = new ClassAccessRule();
//$test->class_access_template_id = 1;
//$test->id = 3;
//$test->modality_class_id = 3;
//$list[2] = $test;
//
//$test = new ClassAccessRule();
//$test->class_access_template_id = 1;
//$test->id = 4;
//$test->modality_class_id = 3;
//$list[3] = $test;
//
//$test = new ClassAccessRule();
//$test->class_access_template_id = 1;
//$test->id = 5;
//$test->modality_class_id = 3;
//$list[4] = $test;
//
//$test = new ClassAccessRule();
//$test->class_access_template_id = 1;
//$test->id = 6;
//$test->modality_class_id = 3;
//$list[5] = $test;
//
//
//var_dump($list);
//
//ClassAccessRule::updateChildren(1,$list);
//
//
//
//var_dump(ClassAccessRule::getChildrenAsObjects(1));

?>