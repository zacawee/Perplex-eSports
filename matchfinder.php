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
            include_once("includes/template/nav.php");
        ?>
        <div class="content contentContainer" id="topContainer">
            <div class="row">      
                <div class="col-md-8 col-md-offset-2 marginTop" id="bgColor">
                    <?php
                        $data = "SELECT * FROM matchFinder ORDER BY ID DESC";
                        $result = mysqli_query($connection, $data);
                     ?>
            
                    <h1 class="titleText">Match Finder</h1>                   
                    <button class="btn btn-success" data-toggle="modal" data-target="#myModal">Post Match</button>
                    <div class="modal" id="myModal">
                        <div class="modal-dialogue modal-sm">       
                            <div class="modal-content">          
                                <div class="modal-header">            
                                    <button class="close" data-dismiss="modal">X</button>          
                                    <h4 class="modal-title">Post a Match</h4>          
                                </div>          
                                <div class="modal-body">            
                                    <p>Gamertag:</p> <br />
                                    <p>Game:</p> <br />
                                    <p>Descrition:</p> <br />
                                </div>          
                                <div class="modal-footer">            
                                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button class="btn btn-success">Post Match</button>
                                </div>                    
                            </div>        
                        </div>      
                    </div>               
                    
                    
                    <div class="btn-group">
                        <a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#">
                            Filter Game
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                        <!-- dropdown menu links -->
                            <li><a href="#">Black Ops III</a></li>
                            <li><a href="#">CS:GO</a></li>
                        </ul>
                    </div>
                    <hr>
                    <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="divBox">
                        <div class="floatRight">
                            <p><?php
                                include_once("includes/timeAgoFunction.php");
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
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>    
    <script src="js/navSetting.js"></script>
    </body>    
</html>