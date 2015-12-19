<!DOCTYPE html>
<html ng-app="milin">
<head>
	<base href="<?php echo base_url() ?>">
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />	
	<title>Wolf - Bootstrap Admin Theme</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- stylesheets -->
	<link rel="stylesheet" type="text/css" href="themes/admin/assets/css/compiled/theme.css" />
	<link rel="stylesheet" type="text/css" href="themes/admin/assets/js/select2/select2.css" />
	<link rel="stylesheet" type="text/css" href="themes/admin/assets/css/vendor/animate.css" />
	<link rel="stylesheet" type="text/css" href="themes/admin/assets/css/vendor/brankic.css" />
	<link rel="stylesheet" type="text/css" href="themes/admin/assets/css/vendor/ionicons.min.css" />
	<link rel="stylesheet" type="text/css" href="themes/admin/assets/css/vendor/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="themes/admin/assets/css/vendor/jquery.dataTables.css" />
	<link rel="stylesheet" type="text/css" href="themes/admin/assets/css/dropzone.css" />
    <link rel="stylesheet" type="text/css" href="themes/admin/assets/css/vendor/messenger/messenger.css" />
    <link rel="stylesheet" type="text/css" href="themes/admin/assets/css/vendor/messenger/messenger-theme-flat.css" />
	<link rel="stylesheet" type="text/css" href="themes/admin/assets/css/vendor/summernote.css" />
    <link rel="stylesheet" type="text/css" href="themes/admin/assets/css/style.css" />
    


	<!-- javascript -->

	<script src="themes/admin/assets/js/angular.min.js"></script>
	<script src="themes/admin/assets/js/jquery.min.js"></script>
    
	<script src="themes/admin/assets/js/dropzone.js"></script>
	<script src="themes/admin/assets/js/bootstrap/bootstrap.min.js"></script>
	<script src="themes/admin/assets/js/vendor/jquery.cookie.js"></script>
    <script src="themes/admin/assets/js/vendor/messenger/messenger.min.js"></script>
    <script src="themes/admin/assets/js/vendor/messenger/messenger-theme-flat.js"></script>
    <script src="themes/admin/assets/js/vendor/jquery.maskedinput.js"></script>
	<script src="themes/admin/assets/js/theme.js"></script>
    <script src="themes/admin/assets/js/vendor/summernote.min.js"></script>
	<script src="themes/admin/assets/js/packery.pkgd.min.js"></script>
	<script src="themes/admin/assets/js/draggabilly.pkgd.js"></script>
	<script src="themes/admin/assets/js/select2/select2.min.js"></script>
    <script src="themes/admin/assets/js/orders.js"></script>
	
	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script>
    Messenger.options = {
        extraClasses: 'messenger-fixed messenger-on-top messenger-on-right',
        theme: 'flat'
    }
    <?php if($this->session->flashdata("success")): ?>
    $(function(){
        Messenger().post("Data has been save");
    })
    <?php endif; ?>
    </script>
</head>
<body>
	

	<div id="wrapper">
		<div id="sidebar-default" class="main-sidebar">
        <div class="current-user">
            <a href="index.html" class="name">
                <img class="avatar" src="themes/admin/assets/images/avatars/1.jpg" />
					<span>
						John Smith
						<i class="fa fa-chevron-down"></i>
					</span>
            </a>
            <ul class="menu">
                <li>
                    <a href="account-profile.html">Account settings</a>
                </li>
                <li>
                    <a href="account-billing.html">Billing</a>
                </li>
                <li>
                    <a href="account-notifications.html">Notifications</a>
                </li>
                <li>
                    <a href="account-support.html">Help / Support</a>
                </li>
                <li>
                    <a href="signup.html">Sign out</a>
                </li>
            </ul>
        </div>
        <!-- <div class="menu-section">
            <h3>General</h3>
            <ul>
                <li>
                    <a href="index.html" class="">
                        <i class="ion-speedometer"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="users.html" data-toggle="sidebar">
                        <i class="ion-person-stalker"></i> <span>Members</span>
                        <i class="fa fa-chevron-down"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="users.html">Members list</a></li>
                        <li><a href="form.html">Add New</a></li>
                        <li><a href="search.html">Members Group</a></li>
                    </ul>
                </li>
                <li>
                    <a href="users.html" data-toggle="sidebar">
                        <i class="ion-ios-list"></i> <span>Orders</span>
                        <i class="fa fa-chevron-down"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="datatables.html">Order list</a></li>
                        <li><a href="datatables.html">Add New</a></li>
                    </ul>
                </li>
                <li>
                    <a href="users.html" data-toggle="sidebar">
                        <i class="ion-ios-box"></i> <span>Products</span>
                        <i class="fa fa-chevron-down"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="datatables.html">Order list</a></li>
                        <li><a href="datatables.html">Add New</a></li>
                    </ul>
                </li>
                <li>
                    <a href="users.html" data-toggle="sidebar">
                        <i class="ion-stats-bars"></i> <span>Reports</span>
                        <i class="fa fa-chevron-down"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="reports.html">Reports orders</a></li>
                        <li><a href="reports-alt.html">Report sales</a></li>
                    </ul>
                </li>

            </ul>
        </div> -->
        <div class="menu-section">
        	<h3>Store Content </h3>
            <ul>
                <li>
                    <?php
                    $active = "";
                    if($this->uri->segment(2) == 'member'){
                        $active = "active";
                    }
                    ?>
                    <a href="admin/member"  class="<?php echo $active ?>">
                        <i class="ion-ios-copy"></i> <span>Member </span>
                    </a>
                </li>
            	<li>
                    <?php 
                        $active = "";
                        if($this->uri->segment(2) == 'product'){
                            $active = "active";
                        }
                    ?>
                    <a href="admin/product"  class="<?php echo $active ?>">
                        <i class="ion-ios-copy"></i> <span>Product </span>
                    </a>
                </li>
               <li>
                    <?php 
                        $active = "";
                        if($this->uri->segment(2) == 'product_category'){
                            $active = "active";
                        }
                    ?>
                    <a href="admin/product_category"  class="<?php echo $active ?>">
                        <i class="ion-ios-copy"></i> <span>Product Category</span>
                    </a>
                </li>
                <li>
                    <?php
                    $active = "";
                    if($this->uri->segment(2) == 'product_collection'){
                        $active = "active";
                    }
                    ?>
                    <a href="admin/product_collection"  class="<?php echo $active ?>">
                        <i class="ion-ios-copy"></i> <span>Collection</span>
                    </a>
                </li>


                
            </ul>
            <br><br>
            <h3>Order & shipping </h3>
            <ul>
                <li>
                    <?php
                    $active = "";
                    if($this->uri->segment(2) == 'order'){
                        $active = "active";
                    }
                    ?>
                    <a href="admin/orders/"  class="<?php echo $active ?>">
                        <i class="ion-ios-copy"></i> <span>Order</span>
                    </a>
                </li>


            </ul>
            <br><br>
            <h3>Web Content </h3>
            <ul>
               
                <li>
                    <?php 
                        $active = "";
                        if($this->uri->segment(2) == 'home'){
                            $active = "active";
                        }
                    ?>
                    <a href="#" data-toggle="sidebar" <?php echo $active ?> >
                        <i class="ion-ios-copy"></i> <span>Home page</span>
                        <i class="fa fa-chevron-down"></i>
                    </a>
                    
                    <ul class="submenu <?php echo $active ?>">
                        <li>
                            <?php 
                                $active = "";
                                if($this->uri->segment(2) == 'home' && ($this->uri->segment(3) == "index_slide" ||  $this->uri->segment(3) == "form_slide")){
                                    $active = "active";
                                }
                            ?>
                            <a href="admin/home/index_slide"  class="<?php echo $active ?>">
                                <i class="fa fa-picture-o"></i> <span>Slide Show</span>
                            </a>
                        </li>
                        <li>
                            <?php 
                                $active = "";
                                if($this->uri->segment(2) == 'home' && ($this->uri->segment(3) == "index_banner" ||  $this->uri->segment(3) == "form_banner")){
                                    $active = "active";
                                }
                            ?>
                            <a href="admin/home/index_banner"  class="<?php echo $active ?>">
                                <i class="fa fa-picture-o"></i> <span>Home Banner</span>
                            </a>
                        </li>
                        <li>
                            <?php 
                                $active = "";
                                if($this->uri->segment(3) == 'setting_index' ||  $this->uri->segment(3) == 'setting'){
                                    $active = "active";
                                }
                            ?>
                            <a href="#" class="<?php echo $active ?>" data-toggle="sidebar">
                                <i class="fa fa-table"></i> Grid <i class="fa fa-chevron-down"></i>
                            </a>
                            
                            <ul class="submenu <?php echo $active ?>">
                                <?php 
                                    $active = "";
                                    if($this->uri->segment(3) == 'setting_index' ||  $this->uri->segment(3) == 'setting'){
                                        $active = "active";
                                    }
                                ?>
                                <li><a <?php echo ($this->uri->segment(3) == "setting_index")? "class='active'":"" ?> href="admin/home/setting_index">Setting Grid</a></li>
                                <li><a <?php echo ($this->uri->segment(3) == "setting")? "class='active'":"" ?> href="admin/home/setting">Add Grid</a></li>
                            </ul>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <?php 
                        $active = "";
                        if($this->uri->segment(2) == 'event' || $this->uri->segment(2) == 'event_category'){
                            $active = "active";
                        }
                    ?>
                    <a href="admin/event"  class="<?php echo $active ?>">
                        <i class="ion-ios-copy"></i> <span>Event</span>
                    </a>
                        <ul class="submenu <?php echo $active ?>">
                           <?php 
                            $active = "";
                            if($this->uri->segment(2) == 'event_category'){
                                $active = "active";
                            }
                        ?>
                        <li><a class="<?php echo $active ?>" href="admin/event_category">Event Category</a></li>
                    </ul>
                </li>
                <li>
                    <?php 
                        $active = "";
                        if($this->uri->segment(2) == 'bio'){
                            $active = "active";
                        }
                    ?>
                    <a href="admin/bio"  class="<?php echo $active ?>">
                        <i class="ion-ios-copy"></i> <span>Biography</span>
                    </a>
                </li>
                <li>
                    <?php 
                        $active = "";
                        if($this->uri->segment(2) == 'collection'){
                            $active = "active";
                        }
                    ?>
                    <a href="admin/collection"  class="<?php echo $active ?>">
                        <i class="ion-ios-copy"></i> <span>Collections</span>
                    </a>
                </li>
                <li>
                    <?php 
                        $active = "";
                        if($this->uri->segment(2) == 'store'){
                            $active = "active";
                        }
                    ?>
                    <a href="admin/store"  class="<?php echo $active ?>">
                        <i class="ion-ios-copy"></i> <span>Store Locator</span>
                    </a>
                </li>
                <li>
                    <?php 
                        $active = "";
                        if($this->uri->segment(2) == 'press'){
                            $active = "active";
                        }
                    ?>
                    <a href="admin/press"  class="<?php echo $active ?>">
                        <i class="ion-ios-copy"></i> <span>Press</span>
                    </a>
                </li>
                <li>
                    <?php 
                        $active = "";
                        if($this->uri->segment(3) == 'form_contact'){
                            $active = "active";
                        }
                    ?>
                    <a href="admin/setting/form_contact"  class="<?php echo $active ?>">
                        <i class="ion-ios-copy"></i> <span>Contact Us</span>
                    </a>
                </li>
                <li>
                    <?php 
                        $active = "";
                        if($this->uri->segment(3) == 'form_brand'){
                            $active = "active";
                        }
                    ?>
                    <a href="admin/setting/form_brand"  class="<?php echo $active ?>">
                        <i class="ion-ios-copy"></i> <span>Brand</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- <div class="menu-section">
            <h3>Admin</h3>
            <ul>
                <li>
                    <a href="account.html" data-toggle="sidebar">
                        <i class="ion-ios-gear"></i> <span>Settings</span>
                        <i class="fa fa-chevron-down"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="account-profile.html">General</a></li>
                        <li><a href="account-billing.html">Billing</a></li>
                        <li><a href="account-notifications.html">Notifications</a></li>
                        <li><a href="account-support.html">Support</a></li>
                    </ul>
                </li>
                <li>
                    <a href="account.html" data-toggle="sidebar">
                        <i class="ion-android-contacts"></i> <span>Users</span>
                        <i class="fa fa-chevron-down"></i>
                    </a>
                    <ul class="submenu">
                        <li><a href="account-profile.html">Users List</a></li>
                        <li><a href="account-billing.html">Add New</a></li>
                        <li><a href="account-notifications.html">Privilege</a></li>
                    </ul>
                </li>

            </ul>
        </div> -->
        <div class="bottom-menu hidden-sm">
            <ul>
                <li><a href="#"><i class="ion-help"></i></a></li>
                <li>
                    <a href="#">
                        <i class="ion-archive"></i>
                        <span class="flag"></span>
                    </a>
                    <ul class="menu">
                        <li><a href="#">5 unread messages</a></li>
                        <li><a href="#">12 tasks completed</a></li>
                        <!-- <li><a href="#">3 features added</a></li> -->
                    </ul>
                </li>
                <li><a href="signup.html"><i class="ion-log-out"></i></a></li>
            </ul>
        </div>
    </div>

	<div id="content">
		<?php echo $template['body']; ?>

		
	</div>
</div>


	<script type="text/javascript">
		$(function () {
			// User list checkboxes
			var $allUsers = $(".select-users input:checkbox");
			var $checkboxes = $("[name='select-user']");

			$allUsers.change(function () {
				var checked = $allUsers.is(":checked");
				if (checked) {
					$checkboxes.prop("checked", "checked");
					toggleBulkActions(checked, $checkboxes.length);
				} else {
					$checkboxes.prop("checked", "");
					toggleBulkActions(checked, 0);
				}
			});

			$checkboxes.change(function () {
				var anyChecked = $(".user [name='select-user']:checked");
				toggleBulkActions(anyChecked.length, anyChecked.length);
			});

			function toggleBulkActions(shouldShow, checkedCount) {
				if (shouldShow) {
					$(".users-list .header").hide();
					$(".users-list .header.select-users").addClass("active").find(".total-checked").html("(" + checkedCount + " total users)");

				} else {
					$(".users-list .header").show();
					$(".users-list .header.select-users").removeClass("active");
				}
			}


			// Grid switcher
			$btns = $(".grid-view");
			$views = $(".users-view");

			$btns.click(function (e) {
				e.preventDefault();
				$btns.removeClass("active");
				$(this).addClass("active");
				
				$views.removeClass("active");
				
				$(".users-grid").hide();
				$(".users-list").hide();

				$($(this).data("grid")).show();
			});
		})
	</script>
</body>
</html>