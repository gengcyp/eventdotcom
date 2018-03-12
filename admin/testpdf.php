<?php  
include 'DBconnect.php';
   
      // global $edate;
        $fdate =(string)$_POST["edate"];
        $forg = $_POST['forg'];
        $torg = $_POST['torg'];
        $floc = $_POST['floc'];
        $tloc = $_POST['tloc'];
        $fatt = $_POST['fatt'];
        $tatt = $_POST['tatt'];
         // echo "<script type='text/javascript'>alert($edate);</script>";
        $date=date_create($fdate);
        $edate = date_format($date,"Y-m-d H:i:s");
        // echo "dd".$edate;
     

 function fetch_data($pedate, $pforg, $ptorg, $pfloc, $ptloc, $pfatt, $ptatt)  
 {  
      $output = '';  
      $connection =  new DBconnect();  
      // $sql = "SELECT * FROM users ";  
      // echo $edate1;
      $table = 'eventdetail left outer join users on eventdetail.eventown= users.userid';
      $clause = "where eventdetail.started like ="."'".$pedate."'"."
      and (fname  <="."'".$pforg."'"."and fname >="."'".$ptorg."'"." ) 
      and (location  <="."'".$pfloc."'"."and location >="."'".$ptloc."'".") 
      and   (attendeeslimit  >="."'".$pfatt."'"."and  attendeeslimit <="."'".$ptatt."'".") ";
      var_dump($table);
      var_dump($clause);



      $result =  $connection->select('*',$table,'');

      foreach($result as $row)  
      {       
      $output .= '<tr>  
                          <td>'.$row["eventid"].'</td>  
                          <td>'.$row["eventname"].'</td>  
                          <td>'.$row["started"].'</td> 
                          <td>'.$row["finished"].'</td> 
                          <td>'.$row["location"].'</td> 
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
            $content = '<h3 align="center">Export HTML Table data to PDF using TCPDF in PHP</h3><br /><br/>';  
            // $content .= '<h3 align="center">Export HTML Table data to PDF using TCPDF in PHP</h3><br /><br />';
            $obj_pdf->writeHTML($content ,true, 0, true, 0);  
           $obj_pdf->lastPage();
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
                <h3 align="center">รายงานการจัดอีเวนท์และการอบรมประจำวัน</h3><br/>  
               <p>วันที่ <?php echo $fdate ?> </p> 
               <p>ผู้จัดงาน จาก <?php echo $forg ?> &nbsp;&nbsp;&nbsp;ถึง <?php echo $torg ?></p> 
               <p>สถานที่จัดงาน จาก <?php echo $floc ?> &nbsp;&nbsp;&nbsp;ถึง <?php echo $tloc ?></p>
               <p>จำนวนผู้เข้าร่วมงาน จาก <?php echo $fatt ?> &nbsp;&nbsp;&nbsp;ถึง <?php echo $tatt ?></p>
               

                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="15%">ID</th>  
                               <th width="25%">ชื่ออีเวนท์</th>  
                               <th width="20%">วันที่จัด</th>  
                               <th width="20%">วันที่สิ้นสุด</th>  
                               <th width="20%">สถานที่</th>  
                          </tr>  
                     <?php  
                     echo fetch_data($edate,$forg,$torg,$floc,$tloc,$fatt,$tatt);  
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