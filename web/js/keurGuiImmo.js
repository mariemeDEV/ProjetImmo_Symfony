
$("document").ready(function () {

    $("#clientConn").on("click",function(){
        $("#connForm").show();
        $("#reservForm").hide();
    });
    $("#clientIns").on("click",function(){
        $("#reservForm").show();
        $("#connForm").hide();
    });

    $("#dets").on("click",function(){
        alert("ok");
    });

    $("#inlineCheckbox1").on("click",function(){
        //alert("yes");
        $("#validation").attr('disabled',false);
    });
    $("#inlineCheckbox2").on("click",function(){
        alert("non");
        $("#validation").attr('enabled',true);
    });
});

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
}

