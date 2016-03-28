$(document).ready(function(){
    
    var screenPosition = "";
            
    $(window).scroll(function() {  
        screenPosition = $(document).scrollTop();
         
            $("#headerImage").css("top", (screenPosition/2.1)); 
            
            if ($("#eminem").height() > screenPosition) {
                $(".navbar").removeClass("navbar-fixed-top");
            }
            if ($(".navbar").position().top < screenPosition) {
                $(".navbar").addClass("navbar-fixed-top");
                $(".title").css("margin-top", "100px"); 
            }   
    
    });

})