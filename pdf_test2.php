<?php
 function fetch_data($instruQuery)
 {
      echo $instruQuery;
      
      $output = '';
      $connection = new PDO(
         'mysql:host=localhost:3306;dbname=eventdotcom;charset=utf8mb4',
         'chanidapa',
         '1234'
       );

      $output .= '
        <table class="table table-bordered">
          <tr>
      ';

      $statementHeadTable = $connection->query('SHOW COLUMNS FROM eventdotcom.users;');
      $countHeadTable = '';

      while($column = $statementHeadTable->fetch(PDO::FETCH_NUM)){
        $output .= '<th>' . $column[0] .'</th>';
        $countHeadTable += 1;
      }

      $output .= '
          </tr>
        
      ';
      // $statementDetailTable = 'SELECT * FROM users';

      // foreach($connection->query('SELECT * FROM users') as $row) {
      // $output .= '<tr>
      //     <td>'.$row["type"].'</td>
      //     <td>'.$row["fname"].'</td>
      //   </tr>
      //   ';
      // }


      $statement = $connection->query('SELECT * FROM users');
      echo $countHeadTable;
      while($row = $statement->fetch(PDO::FETCH_NUM)) {
       
        echo $row[0];
        //   $output .= '<tr>
        //   <td>'.$row["type"].'</td>
        //   <td>'.$row["fname"].'</td>
        // </tr>
        // ';
      }

      $output .= '</table>';
      return $output;
 }
 if(isset($_POST["create_pdf"]))
 {
      require_once('tcpdf/tcpdf.php');
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
      $obj_pdf->SetCreator(PDF_CREATOR);
      $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
      $obj_pdf->SetDefaultMonospacedFont('helvetica');
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
      $obj_pdf->setPrintHeader(false);
      $obj_pdf->setPrintFooter(false);
      $obj_pdf->SetAutoPageBreak(TRUE, 10);
      $obj_pdf->SetFont('helvetica', '', 12);
      $obj_pdf->AddPage();
      $content = '';
      $content .= '
      <h3 align="center">Export HTML Table data to PDF using TCPDF in PHP</h3><br /><br />
      <table border="1" cellspacing="0" cellpadding="5">
           <tr>
                <th width="5%">ID</th>
                <th width="30%">Name</th>
                <th width="10%">Gender</th>
                <th width="45%">Designation</th>
                <th width="10%">Age</th>
           </tr>
      ';
      $content .= fetch_data();
      $content .= '</table>';
      $obj_pdf->writeHTML($content);
      ob_end_clean();
      $obj_pdf->Output('sample.pdf', 'I');
 }
 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <title>Webslesson Tutorial | Export HTML Table data to PDF using TCPDF in PHP</title>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
      </head>
      <body>
           <br /><br />
           <div class="container" style="width:700px;">
                <h3 align="center">Export HTML Table data to PDF using TCPDF in PHP</h3><br />
                <div class="table-responsive">
                     <!-- <table class="table table-bordered">
                          <tr>
                               <th width="5%">ID</th>
                               <th width="30%">Name</th>
                               <th width="10%">Gender</th>
                               <th width="45%">Designation</th>
                               <th width="10%">Age</th>
                          </tr> -->
                     <?php
                     echo fetch_data('SELECT * FROM users');
                     ?>
                     <!-- </table> -->
                     <br />
                     <form method="post">
                          <input type="submit" name="create_pdf" class="btn btn-danger" value="Create PDF" />
                     </form>
                </div>
           </div>
      </body>
 </html>
<!-- admin -->
