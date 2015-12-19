$(function(){
    $("#language").select2().on("change", function(e) {
        var item = $("#language").val();

        for(var i = 0 ; i < item.length ;i++ ){
            $(".lang_"+item[i]).attr("style", "display: block !important");
            console.log(item[i])
        }

    });
    $("#tags").select2();



})