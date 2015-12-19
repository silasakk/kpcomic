var app = angular.module('milin',[]);
app.filter('iif', function () {
    return function(input, trueValue, falseValue) {
        return input ? trueValue : falseValue;
    };
});
app.controller('OrderController',function($scope,$timeout,$http) {

    $scope.subtotal= 0;
    $scope.discount= 0;
    $scope.shipping= 0;
    $scope.total = 0;
    $scope.filterText = '';
    var tempFilterText = '',
        filterTextTimeout;

    $scope.products = [];

    $scope.calOrder = function(){
        var subtotal  = 0;
        angular.forEach($scope.products, function(product) {

            subtotal = parseInt(subtotal) + parseInt(product.price);

        });
        $scope.subtotal= subtotal;
        $scope.total= ($scope.subtotal + $scope.shipping ) -$scope.discount;

    }
    $scope.$watch('searchText', function (val) {
        if (filterTextTimeout) $timeout.cancel(filterTextTimeout);

        tempFilterText = val;
        filterTextTimeout = $timeout(function() {

                $http.get('admin/search/search_product/'+tempFilterText).then(function(result){
                    if(result.data.length){
                        $('.ng-search-result').show();
                    }else{
                        $('.ng-search-result').hide();
                    }
                    $scope.searchResult = result.data;
                    $scope.calOrder();

                });


        }, 250); // delay 250 ms
    });
    $scope.removeProduct = function($product){
        $scope.products.splice($product);
        $scope.calOrder();
    }
    $scope.addTotable = function($product){

        $scope.products.push($product);
        $scope.searchResult = {};
        $scope.searchText = "";


    }
    $scope.$watch('member_search', function (val) {
        if (filterTextTimeout) $timeout.cancel(filterTextTimeout);

        tempFilterText = val;
        filterTextTimeout = $timeout(function() {

            $http.get('admin/search/search_member/'+tempFilterText).then(function(result){
                if(result.data.length){
                    $('.member_search_result').show();
                }else{
                    $('.member_search_resultt').hide();
                }
                $scope.member_search_result = result.data;


            });


        }, 250); // delay 250 ms
    });
    $scope.addTowell = function($mem){
        $scope.member = $mem;
        $scope.member_search = [];
        $scope.member_search_result = [];
    }

    $scope.getOrderDetail = function($order_id){
        $http.get('admin/orders/get_order_detail/'+$order_id).then(function(result){

            $scope.products = result.data;


        });
    }
    $scope.getOrder = function($order_id){
        $http.get('admin/orders/get_order/'+$order_id).then(function(result){

            var member = {
                'member_id' : result.data[0].member_id,
                'name' : result.data[0].name,
                'lastname' : result.data[0].lastname,
                'email' : result.data[0].email,
                'telephone' : result.data[0].telephone,
                'address' : result.data[0].address


            }
            $scope.member = member;
            $scope.total = result.data[0].total;
            $scope.subtotal = result.data[0].subtotal;
            $scope.shipping = result.data[0].shipping;
            $scope.discount = result.data[0].discount;


            //console.log(result.data[0].member_id);


        });
    }



})