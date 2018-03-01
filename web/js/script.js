$(document).ready(function() {

    $('.pgwSlider').pgwSlider();

    pgwSlider.reload({
        maxHeight : 300,
        intervalDuration : 4000
    });

    $("#clientConn").on("click",function(){
        $("#formConn").show();
        $("#formIns").hide();
    });
});

