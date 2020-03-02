$(document).ready(function(){
    
    $("#addRule").click(function(){
//        event.preventDefault();
        
        
        
        var modality_class_id = $("#modality_class").val();
        var limited = $("#limited").is(':checked');
        var frequency = $("#frequency").val();
        var period = $("#period").val();
        
        
        var rowCount = $('#ruleList >tbody >tr').length;
//        alert("Limited: " + limited + " freq: " + frequency + " period:" + period);
//        $("#limited");
//        $("#frequency");
//        $("#period");
        $("#ruleList > tbody:last-child").append("<tr id='row"+rowCount+"'><td>asdasd</td><td>QQQQQ</td><td>DDDDD</td><td>DDDD</td><td><input type='button' class='btn btn-primary deleteRule' name='' id='" +rowCount+"' value='Delete'></td></tr>");
        
//        var form = $(this);
//        
//        $("#name_error").html("");
//        $("#description_error").html("");
//        
//        $.ajax({
//            url:"create.php",
//            method: 'POST',
//            data: formData,
//            dataType: 'json',
//            encode: true,
//            success: function(data){
//                
////                alert(data.message.name);
//               
//                if(data.success = 'false'){
//                    
//                    if(data.message.name != ""){
//                        $("#name_error").css("display","block").html(data.message.name);
////                        alert("Error name!");
//                    }
//                    
//                    if(data.message.description != ""){
//                         $("#description_error").css("display","block").html(data.message.description);
////                        alert("Error description!");
//                    }
//                }else{
//                    $("#ajax_msg").css("display","block").delay(3000).slideUp(300).html(data.message);
//                    document.getElementById("create-task").reset();
//                }
//            }
//            
//        });
        
        
        
        
//        var name = $("#name").val();
//        var description = $("#description").val();
        
        
//        console.log(name + " - " + description);
        
        
        
    });
    
   
    
//    $("#task-list").load('read.php');
    
});


$(document).on('click','.deleteRule',function(event){
    var id = event.target.id;
//    alert("Deleting rule!!!" + id);
    $("#row"+id).remove();
});

function deleteTask(taskid){
    if(confirm("Do you rally want to delete this task?")){
        
        $.ajax({
            url:"delete.php",
            method: 'POST',
            data: {id: taskid},
            success: function(data){
                $("#ajax_msg").css("display","block").delay(3000).slideUp(300).html(data);
                
                
                
            }
            
        });
        
//        $("#task-list").load("read.php");
        window.location.replace('tasks.php?p=1');
    
        
        
    }
    
    return false;
}