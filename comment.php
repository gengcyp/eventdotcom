<?php

// $connectionname='eventdotcom';
// $user = 'root';
// $pass = '';
$userID = 0;
$eventID = 16;
date_default_timezone_set("Asia/Bangkok");
$dt = date("YmdHis",time());
include 'header.php';
// include "DBconnect.php";

// $connection = new DBconnect($connectionname, $user, $pass);
// var_dump($reply);
if(isset($_POST['btnSave'])){
  $connection->insert('reply','(EventID,CreateDate,Details,UserID)','("'.$eventID.'","'.$dt.'","'.$_POST['txtDetails'].'",'.$userID.')');
unset($_POST['btnSave']);
}
$reply = $connection->select('*','reply','WHERE EventID = "'.$eventID.'"');
?>

<html>
<head><!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<h1 style="font-family:verdana;" >Board</h1>
</head>
<body>

<?php
for($i=0;$i<count($reply);$i++){
	// $intRows++;


echo '<table width="100%" border="1" cellpadding="1" cellspacing="1" style="font-family:courier;">';
 echo '<tr>';
    echo '<td height="53" colspan="2">'.$reply[$i]["Details"].'</td>';
  echo'</tr>';
  echo'<tr>';
    echo'<td width="397">Name :';
        echo $reply[$i]["UserID"].'</td>';
    echo'<td width="253">Create Date :';
    echo $reply[$i]["CreateDate"].'</td>';
  echo'</tr>';
echo'</table><br>';
}
?>

<br>
<br>
<form method="post" name="frmMain" id="frmMain">
  <table class="table table-condensed" width="738" border="1" cellpadding="1" cellspacing="1">
    <tr>
      <td width="78" style="font-family:verdana;">Details</td>
      <td width="100%" ><input name="txtDetails" type="text"  id="txtDetails" value="" size="60" placeholder="Write your comment..."></input></td>
    </tr>
    <tr>
      <td width="78" style="font-family:verdana;">Name</td>
      <td width="100%"><input name="txtName" type="text" id="txtName" value="" size="60" placeholder="Write your name..."></td>
    </tr>
  </table>
  
  <br>
  <input class="btn btn-default" name="btnSave" type="submit" id="btnSave" value="Submit">
</form>
</body>
</html>