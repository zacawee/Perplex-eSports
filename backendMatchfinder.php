<?php 
    require_once("includes/connection.php"); 
    require_once("includes/timeAgoFunction.php");
?>
               
<?php
    //Filter Results    
    if ($_GET[Game] != "" && $_GET[Region] == "") {
        //Game Only Set
        $data = "SELECT * FROM matchFinder WHERE game = '$_GET[Game]' AND time > DATE_SUB( NOW(), INTERVAL 3 HOUR) ORDER BY ID DESC";
        $result = mysqli_query($connection, $data);
    } else if ($_GET[Game] == "" && $_GET[Region] != "") {
        //Region Only Set
        $data = "SELECT * FROM matchFinder WHERE region = '$_GET[Region]' AND time > DATE_SUB( NOW(), INTERVAL 3 HOUR) ORDER BY ID DESC";
        $result = mysqli_query($connection, $data);
    } else if ($_GET[Game] != "" && $_GET[Region] != "") {
        //Both Are Set
        $data = "SELECT * FROM matchFinder WHERE game = '$_GET[Game]' AND region = '$_GET[Region]' AND time > DATE_SUB( NOW(), INTERVAL 3 HOUR) ORDER BY ID DESC";
        $result = mysqli_query($connection, $data);
    } else if ($_GET[Game] == "" && $_GET[Region] == "") {
        //Nothing Is Set
        $data = "SELECT * FROM matchFinder WHERE time > DATE_SUB( NOW(), INTERVAL 3 HOUR) ORDER BY ID DESC";
        $result = mysqli_query($connection, $data);
    }
?>
                    
<?php while($row = mysqli_fetch_assoc($result)) { ?>

    <div class="divBox">
        <div class="floatRight">
            <p><?php
            $timeago=get_timeago(strtotime($row['time']));
            echo $timeago;
                ?></p> 
            <br />
        </div>
        <p>Region: <?php echo $row["region"]; ?></p> <br />
        <p>Console: <?php echo $row["console"]; ?></p> <br />
        <p>Gamertag: <?php echo $row["user"]; ?></p> <br />
        <p>Game: <?php echo $row["game"]; ?></p> <br />
        <p>Type: <?php echo $row["type"]; ?></p> <br />
        <p>Description: <?php echo $row["description"]; ?></p> <br />
        <hr>
    </div>

<?php } ?>  
</html>