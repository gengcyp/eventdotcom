<?php
    function write_data($name_attendant, $name_event, $name_organizer)
    {
      
        $content = '';
        $content .= '
            <div class="header">
                <img src="images/logo/logo.png">
                <h1>Eventdotcom Certifications</h1>
            </div>
            <div class="center">
                <h1>
        ';
        $content .= $name_attendant;
        $content .= '
            </h1><br/>
            <p>HAS SUCCESSFUL </p>
            <br><br><br>
            
            <p class="footer">
        ';
        $content .= $name_organizer;
        $content .= '
            </p>
        ';

        $content .= '</div>';
        return $content;
    }
    if(isset($_POST["create_pdf"]))
    {
        $id = $_POST["id"];
        $name = "Praewa Jidpakdee";
        $date = "2017-03-04";
        $name_footer = "Johnson";

        require_once('tcpdf/tcpdf.php');
        $obj_pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
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
            header{
                padding-top: 40px;
                font-weight: bold;
                text-align: center;
            }
            .header img{
                width: 200px;
                height: 200px;
            }
            .header, .center{
                text-align: center;
            .center h1{
                font-size: 20px;
            }
            .footer{
                text-align: right;
                margin-right: 20px;
            }
        </style>';

        $content .= write_data($name, $date, $name_footer);
        $obj_pdf->writeHTML($content);
        ob_end_clean();
        $obj_pdf->Output('reportCertificate.pdf', 'I');
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
                  
                <form method="post">
                    <input type="text" name="id" placeholder="id"/>
                    <!-- <input type="text" name=""/> -->
                    <input type="submit" name="create_pdf" class="btn btn-danger" value="Create PDF" />
                </form>
            </div>
        </div>
    </body>
</html>
