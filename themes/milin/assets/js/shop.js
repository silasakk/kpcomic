var app = angular.module('milin', []);


app.controller('cartController', function($scope) {
    $scope.products = {};
    $scope.selectAddress = null;
    $scope.updatecart = function(){
        var subtotal = 0;
        angular.forEach($scope.products, function(value, key) {
            subtotal = subtotal +  ( parseInt(value.price)) * value.qty;
        });
        $scope.subtotal = subtotal;
    }
    $scope.load_cart =function(){
        jQuery.ajax({
            url: 'shop/service/load_cart',
            type: 'post',
            dataType: 'json',
            success: function(response) {



                $scope.products = response;
                $scope.updatecart();
                $scope.$apply();

            }
        });
    }
    $scope.load_cart();
    $scope.addCart = function(item_code){

        if(!item_code){
            item_code = $('#singleCode').val()
        }

        jQuery.ajax({
            url: "shop/service/add_cart",
            type: 'post',
            dataType: 'json',
            data: {'item_code' : item_code},
            success: function(response) {
                $scope.load_cart();

                $(".cart-menu").fadeIn();
                setTimeout(function(){
                    $(".cart-menu").fadeOut();
                },3000)
            }
        });
    }
    $scope.preparecart = function(products, go){



        jQuery.ajax({
            url: "shop/service/preparecart",
            type: 'post',
            dataType: 'json',
            data: {'products' : products},
            success: function(response) {
                if(go.length){
                    $("#add_order").submit();
                }

            }
        });
    }
    $scope.removeCart = function(product){
        jQuery.ajax({
            url: 'shop/service/remove_cart',
            type: 'post',
            dataType: 'json',
            data: { 'item_code' : product.id},
            success: function(response) {

                $scope.load_cart();

                $(".cart-menu").fadeIn();
                setTimeout(function(){
                    $(".cart-menu").fadeOut();
                },3000)
            }
        });
    };
    $scope.plusqty = function(product){
        product.qty  = parseInt(product.qty)+ 1;
        $scope.updatecart();

    }
    $scope.minusqty = function(product){
        if(product.qty > 0){
            product.qty  = parseInt(product.qty)- 1;
            $scope.updatecart();
        }



    }
    $scope.shippingCost = function(){
        var type = $scope.shipping.method;



        if(type == 'ems'){
            $scope.shipping.cost = 100;
        }else{
            $scope.shipping.cost = 50;
        }

    }



});

//logout
jQuery("#user_logout").on('click',function(){
    jQuery.ajax({
        url: ajax_object.ajaxUrl,
        type: 'post',
        dataType: 'json',
        data: {'action': 'user_logout'},
        success: function(response) {

            window.location = ajax_object.siteUrl;

        }
    });
})
function sizegetCode(){
    var size = $(".sel_size").val();
    var color = $('.sel_color.selected').attr('data-color');
    var main_product = $("#mainproduct").val();
    getcode(color,size,main_product);
    return false

}
function colorgetCode(item){
    $('.sel_color').removeClass("selected");
    $(item).addClass("selected");

    var size = $(".sel_size").val();
    var color = $('.sel_color.selected').attr('data-color');
    var main_product = $("#mainproduct").val();
    getcode(color,size,main_product);
    return false
}
function getcode(color,size,main_product){
    jQuery.ajax({
        url: 'shop/service/getcode',
        type: 'post',
        dataType: 'json',
        data: { 'color' : color  , 'size' : size , 'main_product' : main_product },
        success: function(response) {
            $('#singleCode').val(response);
        }
    });
}
$('.proceed').on('click',function(){

    if($('#select_address').val() == 0){
        $('.text-danger').show();
        return false;
    }else{

    }
})
