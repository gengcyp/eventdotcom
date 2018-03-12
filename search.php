<?php 
    $searchtext = "";
    $filter = "";
    $results = "";
    if(isset($_POST['search'])){
        if (empty($_POST["searchtext"]) || empty($_POST["filter"])) {
            $searchtext = "";
            $filter = "";
            $results = "";

        } else {
            $searchtext = test_input($_POST["searchtext"]);
            $filter = test_input($_POST["filter"]);

            $results = checkSearch($searchtext, $filter);
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function checkSearch($data, $filter){
        global $connection;

        $findSearch = $connection->select('*','eventdetail','');
        if($filter == "name_event"){
            $searchMatch = "name";
        }
        else if($filter == "name_organizer"){
            $findSearch = $connection->select('*','eventdetail','inner join users on Users.userid = Eventdetail.eventown ;');
            $searchMatch = "fname";
        }
        else if($filter == "name_place"){
            $searchMatch = "location";
        }
        $showPanel = '<table>';

        foreach($findSearch as $row){
        
            if (!preg_match("/".$data."/", $row[$searchMatch])) {
                // $showPanel = 'Don\'t have event that you want to search';
            }
            else{
                if($row["profilepic"] === "profile-pic"){
                    $pictureSearch = "images/story/img-2.jpg";
                }
                else{
                    $pictureSearch = $row["profilepic"];
                }
                $showPanel .= '
                    <tr>
                        <th><p>Result is : ' . $row[$searchMatch] . '</p></th>
                    </tr>
                    <tr>
                        <td><img src="'. $pictureSearch .'"></td>
                        <td><a href="event.php?id=' . $row["eventid"] . '"><button class="btn btn-success">Buy ticket</button></a></td>
                    </tr>
                ';
            }
        }
        $showPanel .= '</table>';
        return $showPanel; 	
    }
?>