<?php
//session_start();
require 'config.php';
include("../header.php");
echo getUserName($conn,$registration_id);
$registration_id=$_SESSION['registration_id'];
?>

<?php 

if(!empty($_SESSION['registration_id'])){
    
    $right_answer=0;
    $wrong_answer=0;
    $unanswered=0; 
  
   $keys=array_keys($_POST);
   $order=join(",",$keys);
   
   //$query="select * from questions id IN($order) ORDER BY FIELD(id,$order)";
  // echo $query;exit;
   
   //$response=mysql_query("select id,category_id,answer from questions where id IN($order) ORDER BY FIELD(id,$order)")   or die(mysql_error());
 $neely="select `gque_id`,`sub_id`,`true_ans` from master_general_question where `gque_id` IN($order) ORDER BY FIELD(`gque_id`,$order)";
   $response=mysql_query($neely);
   while($result=mysql_fetch_array($response)){
       if($result['true_ans']==$_POST[$result['gque_id']]){
               $right_answer++;
           }else if($_POST[$result['gque_id']]==5){
               $unanswered++;
           }
           else{
               $wrong_answer++;
           }
		@$category=$result['sub_id'];
   }
   $name=$_SESSION['name']; 
	 $user_id = $_SESSION['registration_id'];

 $neelx="INSERT INTO `scores`(`id`, `user_id`, `subject_id`, `right_answer`, `wrong_answer`, `unanswered`) VALUES ('','$user_id','$category','$right_answer','$wrong_answer','$unanswered')";
$result=mysql_query($neelx);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Jobready Quiz Application</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="css/style.css" rel="stylesheet" media="screen">
        
    </head>
    <body>
        <header>
            <p class="text-center">
                Welcome <?php 
                if(!empty($_SESSION['registration_id'])){ echo $_SESSION['registration_id'];}?>
               
            </p>
        </header>
        <div class="container result">
            <div class="row"> 
                    <div class='result-logo'>
                            <img src="image/Quiz_result.png" class="img-responsive"/>
                    </div>    
           </div>  
           <hr>   
           <div class="row"> 
                  <div class="col-xs-18 col-sm-9 col-lg-9"> 
                    <div class='result-logo1'>
                            <img src="image/cat.GIF" class="img-responsive"/>
                    </div>
                  </div>
                  
                  <div class="col-xs-6 col-sm-3 col-lg-3"> 
                     <a href="index.php" class='btn btn-success'>Start new Quiz!!!</a>                   
                     <a href="logout.php" class='btn btn-success'>Logout</a>
                   
                       <div style="margin-top: 30%">
                        <p>Total no. of right answers : <span class="answer"><?php echo $right_answer;?></span></p>
                        <p>Total no. of wrong answers : <span class="answer"><?php echo $wrong_answer;?></span></p>
                        <p>Total no. of Unanswered Questions : <span class="answer"><?php echo $unanswered;?></span></p>                   
                       </div> 
                   
                   </div>
                    
            </div>    
            <div class="row">    
                    
            </div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/jquery.validate.min.js"></script>
    </body>
</html>
<?php }else{
    
 header( 'Location: http://localhost:8080/jobreadyadmin/Jobready/exam/index.php' ) ; 
      
}?>