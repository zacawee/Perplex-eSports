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
                <button class="btn btn-success" id="postButton">Post A Match</button>
                            
                    <!-- dropdown menu links -->
                        <form class="sameLine floatRight">
                            <select class="form-control filterRegion">
                                <option value="">Select Region:</option>
                                <option value="na">NA</option>
                                <option value="eu">EU</option>
                                <option value="anz">ANZ</option>
                            </select>
                        </form>
                        <form class="sameLine floatRight">
                            <select class="form-control filterGame">
                                <option value="">Select Game:</option>
                                <option value="BO3">BO3</option>
                                <option value="CSGO">CSGO</option>
                                <option value="GTA">GTA</option>
                            </select>
                        </form>
                        <form class="sameLine floatRight">
                            <select class="form-control filterConsole">
                                <option value="">Select Console:</option>
                                <option value="ps4">PS4</option>
                                <option value="xb1">Xbox One</option>
                                <option value="pc">PC</option>
                            </select>
                        </form>    
                
                <div class="btn-group">                    
                          <?php
                    if (isset($_POST["submit"])) {
                        $gamertag = ($_POST["Gamertag"]);
                        $game = ($_POST["Game"]);
                        $description = ($_POST["Description"]);
                        $type = ($_POST["Type"]);
                        $region = ($_POST["Region"]);
                        $console = ($_POST["Console"]);
                    } else {
                        $gamertag = "";
                        $game = "";
                        $description = "";
                        $type = "";
                        $region = "";
                        $console = "";
                    }
                ?>
                                            
                                            <?php 
                    if (isset($_POST["submit"])) {
                        if (empty($gamertag)) {
                            echo "Please enter a Gamertag: ";
                        } else if (empty($game)) { 
                            echo "Please select game type:";
                        } else if (empty($type)){
                            echo "Please select type:";
                        } else if (empty($description)){
                            echo "Please enter description:";
                        } else if (empty($region)){
                            echo "Please select region:";
                        } else if (empty($console)){
                            echo "Please select console";
                        }   else {
                            if(isset($_POST["submit"])) {
                                $query = "INSERT INTO matchFinder (user, game, description, type, region, console) VALUES ('{$gamertag}', '{$game}', '{$description}', '{$type}', '{$region}', '{$console}')";
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
                    <div class="row marginTop">
          <div class="col-md-6">
                    <div class="form-group">                        
                        <form action="" method="post">
                            <input type="text" name="Gamertag" value="" class="form-control" placeholder="Gamertag:" id="gamertagWidth"> <br />
                            <select name="Game" class="form-control" id="sameLine">
                                <option value="">Select Game:</option>
                                <option value="BO3">Black Ops III</option>
                                <option value="CSGO">CS:GO</option>
                                <option value="GTA">GTA V</option>
                            </select> 
                            <select name="Type" class="form-control" id="sameLine">
                                <option value="">Select Type:</option>
                                <option value="scrim">Scrim</option>
                                <option value="8s">8's Lobby</option>
                                <option value="heist">Heists</option>
                            </select> <br /> <br />                                 
                            <select name="Region" class="form-control" id="sameLine">
                                <option value="">Select Region:</option>
                                <option value="eu">EU</option>
                                <option value="na">NA</option>
                                <option value="ANZ">ANZ</option>
                            </select>
                            <select name="Console" class="form-control" id="sameLine">
                                <option value="">Select Console:</option>
                                <option value="ps4">PS4</option>
                                <option value="xb1">Xbox One</option>
                                <option value="pc">PC</option>
                            </select> 
                            <br /> <br />
                            <textarea type="text" name="Description" value="" class="form-control" placeholder="Message:" id="gamertagWidth"></textarea> <br />
                            <button class="btn btn-success floatRight" type="submit" name="submit" value="Submit">Post Match</button>
                        </form>  
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="alert alert-success">
                            <h3>Tips for posting a match.</h3>
                            <li><ul>Make sure you spell your Gamertag correctly.</ul></li>
                            <li><ul>Be descriptive with what you are looking for.</ul></li>
                            <li><ul>Your post will expire after 3 hours.</ul></li>
                                           
                        </div>
                    </div>
                </div>    
                </div>
                <hr>
                
            <div id="matchfinderLoader"></div>
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
        <script src="js/posts.js"></script>
    </body>    
</html>