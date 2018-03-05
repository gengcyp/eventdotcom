<?php
 function fetch_data($listheader, $instruQuery)
 {
      
      $output = '';
      $connection = new PDO(
         'mysql:host=localhost:3306;dbname=eventdotcom;charset=utf8mb4',
         'chanidapa',
         '1234'
       );

      $output .= '<tr>';

      foreach ($listheader as &$value) {
        $output .= '<th>' . $value .'</th>';
      }
      
      $output .= '</tr>';

      foreach($connection->query('SELECT * FROM users') as $row) {
        $output .= '<tr>';
        foreach ($listheader as &$value) {
            $output .= '<td>'.$row[$value].'</td>';
        }
        $output .= '</tr>';
      } 
      return $output;
 }
 if(isset($_POST["create_pdf"]))
 {
      require_once('tcpdf/tcpdf.php');
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
      $obj_pdf->SetCreator(PDF_CREATOR);
      $obj_pdf->SetTitle("Report");
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
      $content = file_get_contents('css/template.css');
      $content = '';
      $content = '<style>
        table th{
          font-weight: bold;
          text-align: center;
        }
      </style>';
      $content .= '
        <h3 align="center">Report</h3><br /><br />
        <table border="1" cellspacing="0" cellpadding="5"> 
      ';
      $content .= fetch_data($my_array = array("type","fname"),'SELECT * FROM users');
      $content .= '</table>';
      $obj_pdf->writeHTML($content);
      ob_end_clean();
      $obj_pdf->Output('report.pdf', 'I');
 }
 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <title>Report</title>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
      </head>
      <body>
           <br /><br />
           <div class="container" style="width:700px;">
                <h3 align="center">Report</h3><br/>
                <div class="table-responsive">
                  <table class="table table-bordered">
                     <?php
                        echo fetch_data($my_array = array("type","fname"),'SELECT * FROM users');
                     ?>
                     <br />
                  </table>
                  <form method="post">
                    <input type="submit" name="create_pdf" class="btn btn-danger" value="Create PDF" />
                  </form>
                </div>
           </div>
      </body>
 </html>
<!-- admin -->
