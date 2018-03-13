<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php include 'header.php';
       include 'eventDB.php'; ?>
      <script>
      <?php
      // if (in_array("uid",$_SESSION)){
      	$uid = $_SESSION['uid'];
      // }else{
      // 	$uid = 0;
      // }

       ?>
      if ("<?php echo $uid; ?>"=="<?php echo $own; ?>"){   //no permission to edit this event

      }else{
      	window.location.href = "event.php?id="+"<?php echo $id ?>";
      }
      </script>
<style>
.flex-container {
  display: flex;
  flex-wrap: wrap;
  /* background-color: DodgerBlue; */
}
.flex-container > div {
  width: 325px;
  margin: 10px;
}
.flex-container > button {
	line-height: 25px;
}
</style>
<script>
	var numPic = 0;      // Declaring and defining global increment variable.
$(document).ready(function() {
//  To add new input file field dynamically, on click of "Add More Files" button below function will be executed.
	$('#add_more').click(function() {
	$(this).before($("<div/>", {
		id: 'filediv'
		}).fadeIn('slow').append($("<input/>", {
			name: 'file[]',
			type: 'file',
			id: 'file'
		})/*, $("<br/><br/>")*/));
	});
	// Following function will executes on change event of file input to select different file.
	$('body').on('change', '#file', function() {
		if (this.files && this.files[0]) {
			numPic += 1; // Incrementing global variable by 1.
			var z = numPic - 1;
			var x = $(this).parent().find('#previewimg' + z).remove();
			$(this).before("<div id='prevImg" + numPic + "' class='prevImg'><img height='250' width='325' id='previewimg" + numPic + "' src='' </div> ");
			var reader = new FileReader();
			reader.onload = imageIsLoaded;
			reader.readAsDataURL(this.files[0]);
			$(this).hide();
			//<a class="btn btn-outline-primary upload" id="add_more">Add More Images</a>
			$("#prevImg" + numPic).append($("<a class='btn btn-outline-primary' id='img'>Delete</a>")
			.click(function() {$(this).parent().parent().remove();}));
	}
		});
	// To Preview Image
	function imageIsLoaded(e) {
		$('#previewimg' + numPic).attr('src', e.target.result);
	};
	$('#upload').click(function(e) {
		var name = $(":file").val();
		if (!name) {
			alert("First Image Must Be Selected");
			e.preventDefault();
		}
	});
});
</script>


<body>

	<div id="formdiv">
		<form enctype="multipart/form-data" action="" method="post" class="flex-container">
		<div id="filediv"><input name="file[]" type="file" id="file"/></div>
			<a class="btn btn-outline-primary upload" id="add_more">Add More Images</a>

			<br><input type="submit" value="Upload Transaction" name="submit" id="upload" class="upload"/>
		</form>
	<?php //include "uploadpic.php"; ?>
  <a class="btn btn-outline-primary" id="" href="event.php?id=<?php echo $_GET['id']?>">Go To Event</a>
	</div>

</body>
<?php

if (isset($_POST['submit'])){
  $j = 0;     // Variable for indexing uploaded image.
  $base_path = "uploads/";
  echo $base_path;
  $target_path = $base_path;     // Declaring Path for uploaded images.
  for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
    $validextensions = array("jpeg", "jpg", "png");      // Extensions which are allowed.
    $ext = explode('.', basename($_FILES['file']['name'][$i]));   // Explode file name from dot(.)
    $file_extension = end($ext); // Store extensions in the variable.
    //***
    $target_path = $base_path ."Event_".$_GET['id']."_". md5(uniqid()) . "." . $ext[count($ext) - 1];     // Set the target path with a new name of image.
    $j = $j + 1;      // Increment the number of uploaded images according to the files in array.
    if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {
      // If file moved to uploads folder.
      echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
      //upload pic
      uploadAlbum($db,$_GET['id'],$target_path);
  } else {     //  If File Was Not Moved.
    echo $j. ').<span id="error">please try again!.</span><br/><br/>';
  }
}
}

?>
