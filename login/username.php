<!DOCTYPE HTML>
<html>
 <head>
 <script type="text/javascript">
$(document).ready(function() {
    var x_timer;    
    $("#username").keyup(function (e){
        clearTimeout(x_timer);
        var userName = $(this).val();
        x_timer = setTimeout(function(){
            check_userName_ajax(userName);
        }, 1000);
    }); 

function check_userName_ajax(userName){
    $("#user-result").html('<img src="ajax-loader.gif" />');
    $.post('userName-checker.php', {'userName':userName}, function(data) {
      $("#user-result").html(data);
    });
}
});
</script>
 </head>
  <body>
  <?php
  if(isset($_POST["userName"]))
{
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    }
    $mysqli = new mysqli('localhost' , 'ebiomo7_aida', 'LOVEebi@1', 'ebiomo7_aida');
    if ($mysqli->connect_error){
        die('Could not connect to database!');
    }
    
    $username = filter_var($_POST["userName"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
    
    $statement = $mysqli->prepare("SELECT userName FROM tbl_user WHERE userName=?");
    $statement->bind_param('s', $username);
    $statement->execute();
    $statement->bind_result($username);
    if($statement->fetch()){
        die('<img src="../assets/images/negative.png" />');
    }else{
        die('<img src="../assets/images/ok-icon.png" />');
    }
}
  ?>
<div id="registration-form">
  <label for="userName">Test for Username :
  <input name="userName" type="text" id="userName" maxlength="15"> <span id="user-result"></span>
  </label>
</div>
</body>
</html>