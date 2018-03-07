<!-- <!DOCTYPE html>
<html>
<title>slide pic</title> -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style_slidepic.css">


<!-- <body> -->

<div class="content display-container">
<?php
$pic = array('https://www.w3schools.com/w3css/img_lights.jpg',
    'https://www.w3schools.com/w3css/img_mountains.jpg',
    'https://www.w3schools.com/w3css/img_forest.jpg',
    'https://www.w3schools.com/w3css/img_mountains.jpg',
    'https://www.w3schools.com/w3css/img_fjords.jpg');
$caption = array('Trolltunga, Norway',
    'Beautiful Mountains',
    'The Rain Forest',
    'Mountains!',
    'dddd');
for ($i=0;$i < count($pic);$i++){
  echo '<div class="display-container mySlides">';
  echo '<img src='.$pic[$i].' style="width:100%">';
  // echo '<div class="large container padding-16 black">
  //   '.$caption[$i].'</div>';
  echo '</div>';
}
?>

<button class="button display-left black" onclick="plusDivs(-1)">&#10094;</button>
<button class="button display-right black" onclick="plusDivs(1)">&#10095;</button>

</div>

<script>
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
