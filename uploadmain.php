<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
	<?php include "uploadpic.php"; ?>
	</div>

</body>
