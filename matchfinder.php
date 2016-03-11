<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Perplex.GG</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->    
        <link href="css/styles.css" rel="stylesheet" type="text/css">
        <style>
            p {
                display: inline-block;   
            }
        </style>
    </head>
    <body data-navSetting="matchFinder">
        <?php 
            require_once("includes/connection.php"); 
            require_once("includes/timeAgoFunction.php");
            include_once("includes/template/nav.php");
        ?>
        <div class="content contentContainer" id="topContainer">
            <div class="row">      
                <div class="col-md-8 col-md-offset-2 marginTop" id="bgColor">
                    
            
                    <h1 class="titleText">Match Finder</h1>                   
                    <button class="btn btn-success" id="postButton">Post Match</button>
                
                    
                    <div class="btn-group">
                        <a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#">
                            Filter Game
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                        <!-- dropdown menu links -->
                            <li><a href="http://176.32.230.9/perplex.gg/matchfinder.php?Game=BO3">Black Ops III</a></li>
                            <li><a href="http://176.32.230.9/perplex.gg/matchfinder.php?Game=CSGO">CS:GO</a></li>
                        </ul>
                              <?php
                        if (isset($_POST["submit"])) {
                            $gamertag = ($_POST["Gamertag"]);
                            $game = ($_POST["Game"]);
                            $description = ($_POST["Description"]);
                            $type = ($_POST["Type"]);
                        } else {
                            $gamertag = "";
                            $game = "";
                            $description = "";
                            $type = "";
                        }
                    ?>
                                                
                                                <?php 
                        if (isset($_POST["submit"])) {
                            if (empty($gamertag)) {
                                echo "Please enter a Gamertag: ";
                            } else {
                                if(isset($_POST["submit"])) {
                                    $query = "INSERT INTO matchFinder (user, game, description, type) VALUES ('{$gamertag}', '{$game}', '{$description}', '{$type}')";
                                    $result = mysqli_query($connection, $query); 
                                    
                                    if($result) {
                                        $message =   "Congratulations we are not complete retards! <3"; 
                                    } else {
                                        $message = "We fucked up, sorry <3"; 
                                    }
                                    ?> <br> <h3><?php echo $message; ?></h3><?php
                                }
                            }
                        }                mysqli_query("DELETE FROM matchFinder WHERE DATE('time') < DATE(NOW(INTERVAL 3 HOUR))");
                                                ?>
                    </div>
                    
                    <div class="postHidden" id="formPost">
              
                        <div class="form-group">                        
                            <form action="" method="post">
                                <br />
                                <input type="text" name="Gamertag" value="" class="form-control" placeholder="Gamertag:" id="gamertagWidth"> <br />
                                <select name="Game" class="form-control" id="gamertagWidth">
                                    <option value="">Select Game:</option>
                                    <option value="BO3">Black Ops III</option>
                                    <option value="CSGO">CS:GO</option>
                                </select> <br />
                                <select name="Type" class="form-control" id="gamertagWidth">
                                    <option value="">Please select type:</option>
                                    <option value="scrim">Scrim</option>
                                    <option value="8s">8's Lobby</option>
                                </select> <br />
                                <textarea type="text" name="Description" value="" class="form-control" placeholder="Message:" id="gamertagWidth"></textarea> <br />
                                <button class="btn btn-success floatRight" type="submit" name="submit" value="Submit">Post Match</button>
                            </form>  
                        </div>
                    </div>    
                    <hr>
                    
                    
                    <?php
                        if ($_GET[Game] != "") {
                            //$data = "SELECT id, user, game, description FROM matchFinder WHERE game = ‘$_GET[Game]’ ORDER BY ID DESC";
                            $data = "SELECT * FROM matchFinder WHERE game = '$_GET[Game]' AND time > DATE_SUB( NOW(), INTERVAL 3 HOUR) ORDER BY ID DESC";
                            $result = mysqli_query($connection, $data);
                        } else {
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
                        <p>Gamertag: <?php echo $row["user"]; ?></p> <br />
                        <p>Game: <?php echo $row["game"]; ?></p> <br />
                        <p>Description: <?php echo $row["description"]; ?></p> <br />
                        <hr>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div id="footerCon">
            <div id="leftFooter">
                <p class="footerText">&copy; Perplex 2016 - All rights reserved </p>
            </div>
            <div id="rightFooter">
                <a href="#"><img src="images/youtube.png" class="socialLogo"></a>
                <a href="https://twitter.com/Perplex_eSports"><img src="images/twitter.png" class="socialLogo"></a>
            </div>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>    
        <script src="js/navSetting.js"></script>
        <script src="js/postButton.js"></script>
    </body>    
</html>