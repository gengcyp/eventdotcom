<?php 
    include 'reportCertificate.php';
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
                    <input type="text" name="name_attendant" placeholder="atten"/>
                    <input type="text" name="name_event" placeholder="event"/>
                    <input type="text" name="name_organizer" placeholder="organ"/>

                    <input type="submit" name="create_pdf" class="btn btn-danger" value="Create PDF" />
                </form>
            </div>
        </div>
    </body>
</html>
