<?php  
include 'DBconnect01.php';
   
$fyear =$_POST["fyear"];
$tyear =$_POST["tyear"];
$org = $_POST['org'];
$loc = $_POST['loc'];
$att = $_POST['att'];

 function fetch_data($pfyear, $ptyear, $porg, $ploc,$patt)  
 {  
     $output = '';  
      $connection = new DBconnect();  
      $table = 'eventdetail left outer join users on eventdetail.eventown= users.userid';
      $clause = "where (year(started) >= "."'".$pfyear."'".
      "and year(started) <="."'".$ptyear."'".
      ") and fname like '%"."".$porg.""."%' ".
      "and location like '%"."".$ploc.""."%'".
      "and attendeeslimit like '%"."".$patt.""."%'";

      $result =  $connection->select('eventname, location, fname, lname, date(started), date(finished) ',$table,$clause);  
      foreach($result as $row)  
      {       
      $output .= '<tr>  
                          <td>'.$row["eventname"].'</td>
                          <td>'.$row["date(started)"].'</td>
                          <td>'.$row["date(finished)"].'</td>   
                          <td>'.$row["location"].'</td> 
                          <td>'.$row["fname"]." ".$row["lname"].'</td> 
                       
                     </tr>  
                          ';  
      }  
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
            $obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_FOOTER);  
            $obj_pdf->SetFont('freeserif', '', 12);  
            $obj_pdf->AddPage();  
            $content = '';  
            $content .= '  
            <h3 align="center">รายงานการจัดอีเวนท์และการอบรมประจำปี</h3><br /><br /> 
               
            <table border="1" cellspacing="0" cellpadding="5">  
                 <tr>  
                    <th width="30%">ชื่ออีเวนท์หรือการอบรม </th>  
                    <th width="15%">วันที่เริ่มต้น</th>
                    <th width="15%">วันที่สิ้นสุด </th>
                    <th width="20%">สถานที่</th> 
                    <th width="20%">ชื่อผู้จัด</th>
                 </tr>  
            ';   
            $content .= fetch_data($fyear, $tyear, $org, $loc,$att);  
            $content .= '</table>';  
            $obj_pdf->writeHTML($content);  
            ob_end_clean();
            $obj_pdf->Output('yearly.pdf', 'I');  
       }
    
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>EVENTDOTCOM REPORT</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />            
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:700px;">  
                <h3 align="center">รายงานการจัดอีเวนท์และการอบรมประจำปี</h3><br/> 
                <table width = 70% align="center">
                  <tr>
                    <td><p>ปีที่จัด     <?php echo $fyear?> </p></td>
                    <td><p>ถึง     <?php echo $tyear?> </p></td>
                  </tr>
                  <tr>
                    <td><p>ผู้จัดงาน : <?php echo $org ?></p></td>
                  </tr>
                  <tr>
                    <td><p>สถานที่จัดงาน : <?php echo $loc ?></p></td>
                  </tr>
                  <tr>
                    <td><p>จำนวนผู้เข้าร่วมงาน : <?php echo $att ?></p></td>
                  </tr>
                </table> 
       
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                            <th width="30%">ชื่ออีเวนท์หรือการอบรม </th>  
                            <th width="15%">วันที่เริ่มต้น</th>
                            <th width="15%">วันที่สิ้นสุด </th>
                            <th width="20%">สถานที่</th> 
                            <th width="20%">ชื่อผู้จัด</th>
                          </tr>  
                     <?php  
                     echo fetch_data($fyear, $tyear, $org, $loc,$att);  
                     ?>  
                     </table>  
                     <br />  
                     <form method="post" >  
                        <div class="form-group" style="display:none">
                            <input type="text"  class="form-control" name="fyear" value = "<?php echo $fyear; ?>"/>
                            <input type="text"  class="form-control" name="tyear" value = "<?php echo $tyear; ?>"/>
                            <input type="text"  class="form-control" name="org" value = "<?php echo $org; ?>"/>
                            <input type="text"  class="form-control" name="loc" value = "<?php echo $loc; ?>"/>
                            <input type="text"  class="form-control" name="att" value = "<?php echo $att; ?>"/>      
                        </div>
                          <input type="submit" name="create_pdf" class="btn btn-danger" value="Create PDF" />  
                    </form>  
                </div>  
           </div>  
      </body>  
 </html>  