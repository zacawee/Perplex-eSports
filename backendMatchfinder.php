<?php 
    require_once("includes/connection.php"); 
    require_once("includes/timeAgoFunction.php");
?>
               
<?php
    //Filter Results    
    if ($_GET[Game] != "" && $_GET[Region] == "" && $_GET[Console] == "") {
        //Game Only Set
        $data = "SELECT * FROM matchFinder WHERE game = '$_GET[Game]' AND time > DATE_SUB( NOW(), INTERVAL 3 HOUR) ORDER BY ID DESC";
        $result = mysqli_query($connection, $data);
    } else if ($_GET[Game] == "" && $_GET[Region] != "" && $_GET[Console] == "") {
        //Region Only Set
        $data = "SELECT * FROM matchFinder WHERE region = '$_GET[Region]' AND time > DATE_SUB( NOW(), INTERVAL 3 HOUR) ORDER BY ID DESC";
        $result = mysqli_query($connection, $data);
        
    } else if ($_GET[Game] == "" && $_GET[Region] == "" && $_GET[Console] != "") {
        //Console Only Set
        $data = "SELECT * FROM matchFinder WHERE console = '$_GET[Console]' AND time > DATE_SUB( NOW(), INTERVAL 3 HOUR) ORDER BY ID DESC";
        $result = mysqli_query($connection, $data);
        
    } else if ($_GET[Game] != "" && $_GET[Region] != "" && $_GET[Console] != "") {
        //All Three Are Set
        $data = "SELECT * FROM matchFinder WHERE game = '$_GET[Game]' AND region = '$_GET[Region]' AND console = '$_GET[Console]' AND time > DATE_SUB( NOW(), INTERVAL 3 HOUR) ORDER BY ID DESC";
        $result = mysqli_query($connection, $data);
        
    } else if ($_GET[Game] != "" && $_GET[Region] != "" && $_GET[Console] == "") {
        //Game and Region Only Set
        $data = "SELECT * FROM matchFinder WHERE game ='$_GET[Game]' AND region = '$_GET[Region]' AND time > DATE_SUB( NOW(), INTERVAL 3 HOUR) ORDER BY ID DESC";
        $result = mysqli_query($connection, $data);
        
    } else if ($_GET[Game] != "" && $_GET[Region] == "" && $_GET[Console] != "") {
        //Game and Console Only Set
        $data = "SELECT * FROM matchFinder WHERE game = '$_GET[Game]' AND console = '$_GET[Console]' AND time > DATE_SUB( NOW(), INTERVAL 3 HOUR) ORDER BY ID DESC";
        $result = mysqli_query($connection, $data);
        
    } else if ($_GET[Game] == "" && $_GET[Region] != "" && $_GET[Console] != "") {
        //Region and Console Only Set
        $data = "SELECT * FROM matchFinder WHERE region = '$_GET[Region]' AND console = '$_GET[Console]' AND time > DATE_SUB( NOW(), INTERVAL 3 HOUR) ORDER BY ID DESC";
        $result = mysqli_query($connection, $data);
        
    } else if ($_GET[Game] == "" && $_GET[Region] == "" && $_GET[Console] == "") {
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
        
    </div>

<?php } ?>  
</html>