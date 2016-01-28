<?php
//session_start();
//require 'config.php';
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

$neely=$conn->query("select `gque_id`,`sub_id`,`true_ans` from master_general_question where `gque_id` IN($order) ORDER BY FIELD(`gque_id`,$order)");
 while($row=$neely->fetch_assoc()){
       if($row['true_ans']==$_POST[$row['gque_id']]){
               $right_answer++;
           }else if($_POST[$row['gque_id']]==5){
               $unanswered++;
           }
           else{
               $wrong_answer++;
           }
		@$category=$row['sub_id'];
   }
   $name=$_SESSION['name']; 
   $user_id = $_SESSION['registration_id'];

$neelx=$conn->query("INSERT INTO `scores`(`id`, `user_id`, `subject_id`, `right_answer`, `wrong_answer`, `unanswered`) VALUES ('','$user_id','$category','$right_answer','$wrong_answer','$unanswered')");

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Jobready Quiz Application</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="exam_css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="exam_css/style.css" rel="stylesheet" media="screen">
        
</head>
<body>
<header>
<p class="text-center">Welcome <?php if(!empty($_SESSION['registration_id'])){ echo $_SESSION['registration_id'];} ?></p>
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
                     <a href="http://localhost/jobready/exam/online_test.php" class='btn btn-success'>Start new Quiz!!!</a>                   
                     <a href="logout.php" class='btn btn-success'>Logout</a>
                   
                    <div style="margin-top: 30%">
                    <p>Total no. of right answers : <span class="answer"><?php echo $right_answer;?></span></p>
                    <p>Total no. of wrong answers : <span class="answer"><?php echo $wrong_answer;?></span></p>
                    <p>Total no. of Unanswered Questions : <span class="answer"><?php echo $unanswered;?></span></p></div>
                   </div>
                    
            </div>    
            <div class="row">    
                    
            </div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="exam_js/jquery-1.10.2.min.js"></script>
        <script src="exam_js/bootstrap.min.js"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="exam_js/jquery.validate.min.js"></script>
    </body>
</html>
<?php }else{    
 header( 'Location: http://localhost:8080/jobreadyadmin/Jobready/exam/index.php' ) ;       
}?>