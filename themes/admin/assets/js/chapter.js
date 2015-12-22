
var myDropzoneOptions  = {
    url: "/upload",
    maxFilesize: 10,
    maxFiles : 1,
    addRemoveLinks: true,
    clickable: true,
    acceptedFiles: 'application/msword, image/*, text/*, and so on...',
    init: function() {
        this.on("success", function(file, response) {





            $(file.previewElement).find('.hdd').val(response);
        });

        this.on("addedfile", function(file) {

            var name = file.serverId ? file.serverId : file.name;

            $(file.previewElement).append('<input type="hidden" class="hdd" name="page[]" value="'+ name +'" >');

        });

        this.on("removedfile", function(file) {
            console.log(file)
            if (!file.serverId) { return; }
            $.get("upload/delete/" + file.serverId);
        });
    }
}
var myDropzone = new Dropzone("#myId", myDropzoneOptions );

$.post('admin/api/get_page',{'id' : $("#chapter_id").val()},function(data){


    for(var i = 0; i <= data.length ; i++){

        var mockFile = { name: data[i].name , size: data[i].size };

        myDropzone.emit("addedfile", mockFile);

        myDropzone.options.thumbnail.call(myDropzone, mockFile, "uploads/"+mockFile.name);
    }
})




Dropzone.autoDiscover = false;

$("#myId").sortable({
    items:'.dz-preview',
    cursor: 'move',
    opacity: 0.5,
    containment: "parent",
    distance: 20,
    tolerance: 'pointer',
    update: function(e, ui){
        // do what you want
    }
});

$(document).ready(function(){
    var timeout;
    $("#language").on('change',function(){

        if($(this).val()){
            $.post('admin/api/get_book',{'lang':$(this).val()},function(data){

                $('#comic_book').html(data);

            })
        }

    });

    $("#comic_book").on('change',function(){

        if($(this).val()){

            $("#chapter_number").removeAttr('disabled');
        }

    });
    $('#chapter_number').on('keyup',function(){
        var chapter_number = $(this).val();
        var book = $('#comic_book').val();

        if(timeout) {

            clearTimeout(timeout);
            timeout = null;
        }

        timeout = setTimeout(function(){
            $.post('admin/api/check_chapter_number',{'chapter_number':chapter_number,'comic_book':book},function(data){

                $('#chapter_number').blur().parent().removeClass('success-control').find('.fa').removeClass('fa-check');
                $('#chapter_number').blur().parent().removeClass('error-control').find('.fa').removeClass('fa-exclamation-triangle');

                //$('#comic_book').append(data);
                if(data == 0){
                    $('#chapter_number').blur().parent().addClass('success-control').find('.fa').addClass('fa-check');
                }else{
                    $('#chapter_number').blur().parent().addClass('error-control').find('.fa').addClass('fa-exclamation-triangle');
                    $('#chapter_number').val('')
                }

            })
        }, 1000)

    });



    //Date Pickers
    $('.input-append.date').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: "yyyy-mm-dd",
    });

    //Time pickers
    $('.clockpicker ').clockpicker({
        autoclose: true
    });


})