$(document).ready(function() {
    $("#postButton").click(function() {
        
        if ($("#formPost").height() == 0) {
            $("#formPost").removeClass("postHidden"); 
            $("#formPost").addClass("postForm");
        } else {
            $("#formPost").removeClass("postForm"); 
            $("#formPost").addClass("postHidden");
        }
    });
})