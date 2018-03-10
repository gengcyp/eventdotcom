<?php
$newLine = "";
for ($i=1 ; $i<$numcolumn+1 ; $i++){
  $newLine = $newLine.'<td style="'.$stylecolumn[$i-1].'"><input style="width:100%" type="'.$typecolumn[$i-1].'" id="'.$name .$i. '" /></td>';
}
$newLine = $newLine.'<td><input type="button" onclick="Add'.$tableid.'(\''.$name.'\')" value="Add" /></td>';

$head = "";
foreach ($headcolumn as $value){
  $head = $head.'<th><div class="col-md-12"><h5 class="text-center">'
  .$value.
  '</h5></div></th>';
}

 ?>
<script type="text/javascript">
    function Add<?php echo $tableid ?>(name) {
      var lines = [];
      for (var i = 1;i <= <?php echo $numcolumn ?>;i++){
        var value = $("#"+name+i).val();
        lines.push(value);
        $("#"+name+i).val("");
      }

      AddRow<?php echo $tableid ?>.apply(this,lines); // call function with array lines
      console.log(lines);
    };

    function AddRow<?php echo $tableid ?>() {
        //Get the reference of the Table's TBODY element.
        var tBody = $("#"+"<?php echo $tableid ?>"+" > TBODY")[0];//arguments[arguments.length]+

        //Add Row.
        row = tBody.insertRow(-1);

        for (var i=0;i<arguments.length;i++){
          var cell = $(row.insertCell(-1));
          cell.html(arguments[i]);
        }
        //Add Button cell.
        cell = $(row.insertCell(-1));
        var btnRemove = $("<input />");
        btnRemove.attr("type", "button");
        btnRemove.attr("onclick", "Remove"+"<?php echo $tableid ?>"+"(this);");
        btnRemove.val("Remove");
        cell.append(btnRemove);

    };


    function Remove<?php echo $tableid ?>(button) {
        //Determine the reference of the Row using the Button.
        var row = $(button).closest("TR");
        var name = $("TD", row).eq(3).html();
        // if (confirm("Do you want to delete: " + name)) {
            //Get the reference of the Table.
            var table = $("#"+"<?php echo $tableid ?>")[0];

            //Delete the Table row using it's Index.
            table.deleteRow(row[0].rowIndex);
            var rem = [];
            for (var i=0;i< <?php echo $numcolumn ?>;i++){
              rem.push($("TD", row).eq(i).html());
            }

        // }
    };


</script>
