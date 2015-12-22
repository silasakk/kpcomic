function selected_item(){
    var item = $("#language").val();

    $('.lang_block').addClass('hidden');
    if(item){
        for(var i = 0 ; i < item.length ;i++ ){
            $(".lang_"+item[i]).removeClass("hidden");
        }
    }


}
$(function(){

    selected_item();

    $("#language").select2().on("change", function(e) {


        selected_item();

    })



    $("#tags").select2();



})