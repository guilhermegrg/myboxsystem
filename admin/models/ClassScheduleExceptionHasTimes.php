<?php include_once($_SERVER['DOCUMENT_ROOT']."/myboxsystem/includes/model/SimpleRelationModel.php");?>
<?php


/** 
TABLE:  class_schedule_exception_times
*/
class ClassScheduleExceptionHasTimes extends SimpleRelationModel {

    /** 
    TYPE: int(11) NOT NULL
    RELATION: PARENT_ID
    */
    public $class_schedule_exception_id;


    /** 
    TYPE: int(11) NOT NULL
    RELATION: CHILD_ID
    */
    public $id;
    

    /** TYPE: TIME NOT NULL
    */
    public $times;
    
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