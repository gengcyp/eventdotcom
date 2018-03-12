<?php  
include 'DBconnect01.php';
   
$year =$_POST["year"];
$forg = $_POST['forg'];
$torg = $_POST['torg'];
$floc = $_POST['floc'];
$tloc = $_POST['tloc'];
$fatt = $_POST['fatt'];
$tatt = $_POST['tatt'];

 function fetch_data($pyear, $pforg, $ptorg, $pfloc, $ptloc, $pfatt, $ptatt)  
 {  
     $output = '';  
      $connection = new DBconnect();  
      $table = 'eventdetail left outer join users on eventdetail.eventown= users.userid';
      $clause = "where  year(started)= "."'".$pyear."'".
      "and (fname >="."'".$pforg."'"."and fname <="."'".$ptorg."'".")".
      "and (location >="."'".$pfloc."'"."and location <="."'".$ptloc."'".")".
      "and (attendeeslimit >="."'".$pfatt."'"."and attendeeslimit <="."'".$ptatt."'".")";

      $result =  $connection->select('*',$table,$clause);  
      foreach($result as $row)  
      {       
      $output .= '<tr>  
                          <td>'.$row["eventname"].'</td>   
                          <td>'.$row["location"].'</td> 
                          <td>'.$row["fname"].'</td> 
                       
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
                    <th width="55%">Event </th>  
                    <th width="25%">Location</th> 
                    <th width="20%">Organizer</th>
                 </tr>  
            ';   
            $content .= fetch_data($year,$forg,$torg,$floc,$tloc,$fatt,$tatt);  
            $content .= '</table>';  
            $obj_pdf->writeHTML($content);  
            ob_end_clean();
            $obj_pdf->Output('sample.pdf', 'I');  
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
                    <td><p>ปีที่จัด     <?php echo $year?> </p></td>
                  </tr>
                  <tr>
                    <td><p>ผู้จัดงาน    จาก    <?php echo $forg ?></p></td>
                    <td><p> ถึง <?php echo $torg ?></p></td>
                  </tr>
                  <tr>
                    <td><p>สถานที่จัดงาน    จาก    <?php echo $floc ?></p></td>
                    <td><p> ถึง <?php echo $tloc ?></p></td>
                  </tr>
                  <tr>
                    <td><p>จำนวนผู้เข้าร่วมงาน    จาก    <?php echo $fatt ?></p></td>
                    <td><p>ถึง <?php echo $tatt ?></p></td>
                  </tr>
                </table> 
       
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                                <th width="55%">Event </th>  
                                <th width="25%">Location</th> 
                                <th width="20%">Organizer</th>  
                          </tr>  
                     <?php  
                     echo fetch_data($year,$forg,$torg,$floc,$tloc,$fatt,$tatt);  
                     ?>  
                     </table>  
                     <br />  
                     <form method="post" >  
                        <div class="form-group" style="display:none">
                            <input type="text"  class="form-control" name="edate" value = "<?php echo $fdate; ?>"/>
                            <input type="text"  class="form-control" name="forg" value = "<?php echo $forg; ?>"/>
                            <input type="text"  class="form-control" name="torg" value = "<?php echo $torg; ?>"/>
                            <input type="text"  class="form-control" name="floc" value = "<?php echo $floc; ?>"/>
                            <input type="text"  class="form-control" name="tloc" value = "<?php echo $tloc; ?>"/>
                            <input type="text"  class="form-control" name="fatt" value = "<?php echo $fatt; ?>"/>
                            <input type="text"  class="form-control" name="tatt" value = "<?php echo $tatt; ?>"/>         
                        </div>
                          <input type="submit" name="create_pdf" class="btn btn-danger" value="Create PDF" />  
                    </form>  
                </div>  
           </div>  
      </body>  
 </html>  