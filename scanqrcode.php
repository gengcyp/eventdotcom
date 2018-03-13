<?php
    include 'header.php';

    confirmQRcode("reservationid=2 eventid=2");
    if(!empty($_POST['scannedQR'])){
        $scannedQR = $_POST['scannedQR'];
        confirmQRcode($scannedQR);
    }

    function confirmQRcode($scannedQR){
        global $connection;
        global $me;

        if($scannedQR == ""){

        }
        else{
            // split code scannedQR
            list($reservationid_list, $eventid_list) = split('[ .-]', $scannedQR);
            
            // split code reservation
            list($id_reservation,$value_reservation) = split('[=.-]', $reservationid_list);
            $reservationid = $value_reservation;

            // split code eventid
            list($id_event,$value_event) = split('[=.-]', $eventid_list);
            $id_event = $value_event;

            // check eventown
            $organ_id = $me[0]["userid"];
            $eventown_id = $connection->select("eventown, userid", "eventdetail", "WHERE eventid = ".'"'.$id_event.'"');
            
            if($organ_id == $eventown_id[0]["eventown"]){
                
                echo $eventown_id[0]["userid"];

                date_default_timezone_set("Asia/Bangkok");
                $checkintime = date("YmdHis",time());

                $column = "(reservationid, checkintime)";
                $values = "("."'".$reservationid."',". "'".$checkintime."'".")";
                $connection->insert("attendees", $column, $values);
                echo "<script>alert('Success111')</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Scanner demo</title>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
        <style type="text/css">
        .scanner-laser{
            position: absolute;
            margin: 40px;
            height: 30px;
            width: 30px;
        }
        .laser-leftTop{
            top: 0;
            left: 0;
            border-top: solid red 5px;
            border-left: solid red 5px;
        }
        .laser-leftBottom{
            bottom: 0;
            left: 0;
            border-bottom: solid red 5px;
            border-left: solid red 5px;
        }
        .laser-rightTop{
            top: 0;
            right: 0;
            border-top: solid red 5px;
            border-right: solid red 5px;
        }
        .laser-rightBottom{
            bottom: 0;
            right: 0;
            border-bottom: solid red 5px;
            border-right: solid red 5px;
        }
        </style>
    </head>
    <body>
        <div class="page-header">
            <h1 style="text-align: center;">Scan to check-in with event<br>
           
            </h1>
        </div>
        <div id="QR-Code" class="container" style="width:100%">
            <div class="panel panel-primary">
                <div class="panel-heading" style="display: inline-block;width: 100%;">
                    <h4 style="width:50%;float:left;">Start to scan</h4>
                    <div style="width:50%;float:right;margin-top: 5px;margin-bottom: 5px;text-align: right;">
                    <select id="cameraId" class="form-control" style="display: inline-block;width: auto;"></select>
                    <button id="save" data-toggle="tooltip" title="Image shoot" type="button" class="btn btn-info btn-sm disabled"><span class="glyphicon glyphicon-picture"></span></button>
                    <button id="play" data-toggle="tooltip" title="Play" type="button" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-play"></span></button>
                    <button id="stop" data-toggle="tooltip" title="Stop" type="button" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-stop"></span></button>
                    <button id="stopAll" data-toggle="tooltip" title="Stop streams" type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-stop"></span></button>
                </div>
            </div>
            <div class="panel-body">
                <div class="col-md-12" style="text-align: center; margin:0 auto;">
                    <div class="well" style="position: relative;display: inline-block; margin: 0 auto;">
                        <canvas id="qr-canvas" width="320" height="240"></canvas>
                        <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
                        <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
                        <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
                        <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
                    </div>
                    <div class="caption">
                        <h3>Scanned result</h3>
                        <p id="scanned-QR"></p>
                    </div>
                
                </div>
            </div>
            <div class="panel-footer">
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/qrcodelib.js"></script>
<script type="text/javascript" src="js/WebCodeCam.js"></script>
<script type="text/javascript" src="js/mainScan.js"></script>

</html>