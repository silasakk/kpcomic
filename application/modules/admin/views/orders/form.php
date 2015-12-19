
<div class="menubar">
    <div class="sidebar-toggler visible-xs">
        <i class="ion-navicon"></i>
    </div>

    <div class="page-title">
        Add Member

    </div>

</div>
<div class="content-wrapper" ng-controller="OrderController">

    <div class="panel-search">
        <div class="form-group">
            <label class="col-sm-2 col-md-2 control-label">Search</label>
            <div class="col-sm-10  col-md-8">
                <input type="text" ng-model="searchText" onkeypress="" required  class="form-control" placeholder="Product ID , Product NAME">
                <ul class="ng-search-result">
                    <li ng-repeat="search in searchResult" ng-click="addTotable(search)">
                        <img class="im-thumb" src="{{search.image == '' | iif : 'themes/admin/assets/images/noimg.png' : './uploads/'+search.image }} " >
                        <div class="s-top">
                            <span class="name">{{search.name}}</span>
                            <span class="price">{{search.price}}</span>
                        </div>
                        <div class="clearfix"></div>
                        <div class="s-bottom">
                            <span class="code">{{search.code}}</span>
                        </div>

                    </li>


                </ul>
            </div>
        </div>
    </div>
    <br><br><br><br>
    <form id="" class="form-horizontal" method="post" action="admin/orders/save/" role="form" >


        <div class="row" <?php echo ($order_id)?"ng-init='getOrder(".$order_id.")'" : "" ?>>

            <table class="table tbi tborder" <?php echo ($order_id)?"ng-init='getOrderDetail(".$order_id.")'" : "" ?>>
                <tr>

                    <th width="50">Image</th>
                    <th width="100">Code</th>
                    <th>Name</th>
                    <th width="100">Price</th>
                    <th width="100">Quantity</th>
                    <th width="100">Amount</th>
                    <th class="td-tool"><i class="fa fa-bolt"></i></th>
                </tr>
                <tr ng-repeat="product in products">
                    <td>
                        <img width="20" src="{{product.image == '' | iif : 'themes/admin/assets/images/noimg.png' : './uploads/'+product.image }} " >
                        <input type="hidden" ng-model="product.product_unit_id"  value="{{product.product_unit_id}}" name="product_unit_id[]">
                    </td>
                    <td>
                        {{product.code}}
                        <input type="hidden" ng-model="product.code"  value="{{product.code}}" name="product_code[]">
                    </td>
                    <td>
                        {{product.name}}
                        <input type="hidden" ng-model="product.name"  value="{{product.name}}" name="product_name[]">
                    </td>
                    <td><input type="number" class="form-control" ng-change="calOrder()" ng-model="product.price" ng-value="{{product.price}}" value="{{product.price}}" name="product_price[]"></td>
                    <td><input type="number" class="form-control" ng-change="calOrder()" ng-model="qty" ng-init="qty=1" value="" name="product_qty[]" ></td>
                    <td>{{product.price * qty}}</td>
                    <td class="text-center"><a ng-click="removeProduct(product)" href="javascript:;"><i class="fa fa-trash-o"></i></a></td>


                </tr>

            </table>

            <div class="row well">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Remark</label>
                        <div class="col-sm-10">
                            <textarea rows="7" class="form-control" name="remark" class="form-control" ></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="col-sm-6 control-label">Subtotal</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" value="{{subtotal}}" ng-value="{{subtotal}}" ng-model="subtotal" name="subtotal" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-6 control-label">Discount</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" class="form-control" value="{{discount}}" ng-value="{{discount}}" ng-model="discount" name="discount" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-6 control-label">Shipping</label>
                        <div class="col-sm-6 ">
                            <input type="text" class="form-control" value="{{shipping}}" ng-value="{{shipping}}" ng-model="shipping" name="shipping" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-6 control-label">Total</label>
                        <div class="col-sm-6  ">
                            <input type="text" class="form-control" value="{{total}}" ng-value="{{total}}" ng-model="total" name="total" >
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row well">
            <div class="col-md-12 info">
                <h2>Member</h2>


            </div>
            <div class="col-sm-8 col-sm-offset-2">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Search Member</label>
                    <div class="col-sm-10  ">
                        <input type="text" class="form-control" ng-model="member_search" name="member_search" >
                        <ul class="member_search_result ng-search-result">
                            <li ng-click="addTowell(mem)" ng-repeat="mem in member_search_result" style="padding-left: 10px">
                                {{mem.name}} {{mem.lastname}} [<em>{{mem.email}}</em>] <span class="pull-right">{{mem.telephone}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Member ID</label>
                    <div class="col-sm-10  ">
                        <input type="text" class="form-control" readonly value="{{member.member_id}}" ng-value="{{member.member_id}}" ng-model="member.member_id" name="member_member_id" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10  ">
                        <input type="text" class="form-control" value="{{member.name}}" ng-value="{{member.name}}" ng-model="member.name" name="member_name" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Lastname</label>
                    <div class="col-sm-10  ">
                        <input type="text" class="form-control" value="{{member.lastname}}" ng-value="{{member.lastname}}" ng-model="member.lastname" name="member_lastname" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10  ">
                        <input type="text" class="form-control" value="{{member.email}}" ng-value="{{member.email}}" ng-model="member.email" name="member_email" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Telephone</label>
                    <div class="col-sm-10  ">
                        <input type="text" class="form-control" value="{{member.telephone}}" ng-value="{{member.telephone}}" ng-model="member.telephone" name="member_telephone" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Address</label>
                    <div class="col-sm-10  ">
                        <input type="text" class="form-control" value="{{member.address}}" ng-value="{{member.address}}" ng-model="member.address" name="member_address" >
                    </div>
                </div>

            </div>
        </div>



        <div class="form-group form-actions">
            <div class="col-sm-12">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </div>
    </form>


</div>

