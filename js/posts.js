$(document).ready(function() {
    $("#matchfinderLoader").load("backendMatchfinder.php");
    
    var filterOne = "";
    var filterTwo = "";
    var filterThree = "";
    
    $(".filterRegion").change(function(){     
        filterOne = $(".filterRegion option:selected").val();
        filter();
    });
    
    $(".filterGame").change(function(){     
        filterTwo = $(".filterGame option:selected").val();
        filter();
    });
    
    $(".filterConsole").change(function(){
        filterThree = $(".filterConsole option:selected").val();
        filter();
    });
    
    
    
    function filter() {
        $("#matchfinderLoader").html("");
        $("#matchfinderLoader").load("http://176.32.230.9/perplex.gg/backendMatchfinder.php?Game="+ filterTwo +"&Region="+ filterOne +"&Console="+ filterThree);
        
    };
});
