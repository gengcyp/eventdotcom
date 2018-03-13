<?php
include "header.php";

$dbname='eventdotcom';
$user = 'root';
$pass = '';
$userID = 0;
$eventID = $_GET['id'];
$questionID = 5;
date_default_timezone_set("Asia/Bangkok");
$dt = date("YmdHis",time());
$db = new DBconnect($dbname, $user, $pass);
if(isset($_POST['btnSave'])){
  $db->insert('reply','(EventID,CreateDate,Details,UserID)','("'.$eventID.'","'.$dt.'","'.$_POST['txtDetails'].'",'.$userID.')');
unset($_POST['btnSave']);
}
// include "DBconnect.php";

//  if (in_array("uid",$_SESSION)){
  $userID = $_SESSION['uid'];
  
//  }else{
//   $userID = 0;
 
// }
// var_dump($reply);


$webboard = $db->select('*','webboard','WHERE QuestionID = "'.$questionID.'"');
$reply = $db->select('*','reply','WHERE EventID = "'.$eventID.'"');
$ename = $db->select('eventname','eventdetail','WHERE eventid='.$_GET['id']);
$uname =$db->select('fname,lname','users','WHERE userid='.$userID);
$uname = $uname[0][0].' '.$uname[0][1];
?>

<html>
<head><!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<h1><?php echo $ename[0][0] ?></h1>
</head>
<body>

<?php
// for ($x=0;$x<count($webboard);$x++){
//   echo'<table width="738" border="1" cellpadding="1" cellspacing="1">';
//   echo '<tr>';
//     echo'<td colspan="2"><center><h1>'.$webboard[$x]["Question"].'</h1></center></td>';
//   echo '</tr>';
//   echo'<tr>';
//     echo'<td height="53" colspan="2">'.$webboard[$x]["Details"].'</td>';
//   echo'</tr>';
//   echo'<tr>';
//     echo'<td width="397">Name : '.$webboard[$x]["Name"]. 'Create Date : '.$webboard["CreateDate"].'</td>';
//     echo '<td width="253">View :' .$webboard[$x]["View"]. 'Reply : ' .$webboard["Reply"].'</td>';
//   echo'</tr>';
// echo'</table>';
// }
?>
<br>
<br>

<?php 
$postname="";
for($i=0;$i<count($reply);$i++){

if ($reply[$i]["UserID"]!=0){
  $postname=$db->select('fname,lname','users','WHERE userid='.$reply[$i]["UserID"]);
  $postname = $postname[0][0].' '.$postname[0][1];
}else{
  $postname="Guest";
}

echo '<table width="738" border="1" cellpadding="1" cellspacing="1">';
 echo '<tr>';
    echo '<td height="53" colspan="2">'.$reply[$i]["Details"].'</td>';
  echo'</tr>';
  echo'<tr>';
    echo'<td width="397">Name :';
        echo $postname.'</td>';
    echo'<td width="253">Create Date :';
    echo $reply[$i]["CreateDate"].'</td>';
  echo'</tr>';
echo'</table><br>';
}
?>

<br>
<br>
<form method="post" name="frmMain" id="frmMain">
  <table class="table table-hoverd" width="738" border="1" cellpadding="1" cellspacing="1">
    <tr>
      <td width="78">Details</td>
      <td><textarea name="txtDetails" cols="50" rows="5" id="txtDetails" checked></textarea></td>
    </tr>
    <tr>
      <td width="78">Name</td>
      <td width="647"><input name="txtName" type="text" id="txtName" size="50" value="<?php echo $uname; ?>" readonly></td>
    </tr>
  </table>
  
  <br>
  <input class="btn btn-default" name="btnSave" type="submit" id="btnSave" value="Submit">
</form>
</body>
</html>