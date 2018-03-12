<!-- <!DOCTYPE html>
<html>
<title>slide pic</title> -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style_slidepic.css">


<!-- <body> -->

<div class="content display-container">
<?php

if (count($pic)>0){
  for ($i=0;$i < count($pic);$i++){
    echo '<div class="display-container mySlides">';
    echo '<img src='.$pic[$i][0].' style="width:100%;height:300px" >';
    // echo '<div class="large container padding-16 black">
    //   '.$caption[$i].'</div>';
    echo '</div>';
  }
  // echo '<button class="button display-left black" onclick="plusDivs(-1)">&#10094;</button>';
  // echo '<button class="button display-right black" onclick="plusDivs(1)">&#10095;</button>'
}

?>
<button class="button display-left black" id="bl" onclick="plusDivs(-1)">&#10094;</button>
<button class="button display-right black" id="br" onclick="plusDivs(1)">&#10095;</button>

</div>

<script>
if (<?php echo count($pic) ?>==0){
  $("#bl").hide();
  $("#br").hide();
}
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  x[slideIndex-1].style.display = "block";
}
</script>

<!-- </body> -->
<!-- </html> -->
