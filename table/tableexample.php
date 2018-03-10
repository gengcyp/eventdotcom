<!-- this is example of yourfile that include table -->
<?php
$numcolumn = 2;               // define number of column
$headcolumn = array("a","b"); // define head of table
$typecolumn = array("text","text"); //define type of value
$stylecolumn = array("","");  //define column style
$name = "test";              // define running of object id e.g. name1,name2,name...
$tableid = "tb2";             // define id of table
include 'tablestructure.php';
 ?>

<?php
$numcolumn = 4;
$headcolumn = array("Ticket Code","Name","Start","End");
$typecolumn = array("number","text","date","date");
$stylecolumn = array("width:10%","width:20%","width:30%","width:30%");
$name = "name";
$tableid = "tb1";
include 'tablestructure.php';
 ?>
