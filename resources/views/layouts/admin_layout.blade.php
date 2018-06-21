<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="" type="image/x-icon">
    <title>UgaBus:Admin</title>
    <!-- CSS -->
    <link rel="stylesheet" href="/admin_inc/assets/css/app.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.css"
          rel="stylesheet" type="text/css">
    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #F5F8FA;
            z-index: 9998;
            text-align: center;
        }

        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%;
        }
    </style>
</head>
<body class="light">
<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="preloader-wrapper small active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End pre loader -->
<div id="app">
    <aside class="main-sidebar fixed offcanvas shadow">
        <section class="sidebar">
            <div class="w-80px mt-3 mb-3 ml-3">
                {{--<img src="/admin_inc/assets/img/basic/logo.png" alt="">--}}
                <h4>Uga Bus</h4>
            </div>
            <div class="relative">
                <a data-toggle="collapse" href="#userSettingsCollapse" role="button" aria-expanded="false"
                   aria-controls="userSettingsCollapse" class="btn-fab btn-fab-sm fab-right fab-top btn-primary shadow1 ">
                    <i class="icon icon-cogs"></i>
                </a>
                <div class="user-panel p-3 light mb-2">
                    <div>
                        <div class="float-left image">
                            <img class="user_avatar" src="/user_avatars/avatar.jpg" alt="User Image">
                        </div>
                        <div class="float-left info">
                            <h6 class="font-weight-light mt-2 mb-1">{{Auth::guard('admin')->user()->last_name}}
                                {{Auth::guard('admin')->user()->first_name}}</h6>
                            <a href="#">Admin</a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="collapse multi-collapse" id="userSettingsCollapse">
                        <div class="list-group mt-3 shadow">
                            <a href="index.html" class="list-group-item list-group-item-action ">
                                <i class="mr-2 icon-umbrella text-blue"></i>Profile
                            </a>
                            <a href="/admin/logout" class="list-group-item list-group-item-action"><i class="mr-2 icon-security text-purple"></i>Logout</a>

                        </div>
                    </div>
                </div>
            </div>

            <ul class="sidebar-menu">
                <li class="header"><strong>MAIN NAVIGATION</strong></li>
                {{--<li class="treeview"><a href="/admin">
                        <i class="icon icon-sailing-boat-water purple-text s-18"></i> <span>Dashboard</span> <i
                                class="icon icon-angle-left s-18 pull-right"></i>
                    </a>
                </li>--}}
                <li class="treeview"><a href="#"><i class="icon icon-account_box light-green-text s-18"></i>Agents<i
                                class="icon icon-angle-left s-18 pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/agents"><i class="icon icon-circle-o"></i>All Agents</a>
                        </li>
                        <li><a href="/admin/agents/create"><i class="icon icon-add"></i>Add Agent</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview"><a href="#"><i class="icon icon-business_center text-blue s-18"></i>Bus Companies<i
                                class="icon icon-angle-left s-18 pull-right"></i></a>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/companies"><i class="icon icon-circle-o"></i>All Bus Companies</a>
                        </li>
                        <li><a href="/admin/companies/create"><i class="icon icon-add"></i>Add
                                New Bus Company</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview"><a href="#"><i class="icon icon-bus text-blue s-18"></i>Bus<i
                                class="icon icon-angle-left s-18 pull-right"></i></a>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/buses"><i class="icon icon-circle-o"></i>All Buses</a>
                        </li>
                        <li><a href="/admin/buses/create"><i class="icon icon-add"></i>Add
                                New Bus</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview"><a href="#"><i class="icon icon-road text-red s-18"></i>Routes<i
                                class="icon icon-angle-left s-18 pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/routes"><i class="icon icon-circle-o"></i>All Routes</a>
                        </li>
                        <li><a href="/admin/routes/create"><i class="icon icon-add"></i>Add
                                New Route</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview"><a href="#"><i class="icon icon-book-bookmark light-green-text s-18"></i>Bookings<i
                                class="icon icon-angle-left s-18 pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/bookings"><i class="icon icon-circle-o"></i>All Bookings</a>
                        </li>
                    </ul>
                </li>
                {{--<li class="treeview"><a href="#"><i class="icon icon-local_parking text-black s-18"></i>Parks<i
                                class="icon icon-angle-left s-18 pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/parks"><i class="icon icon-circle-o"></i>All Parks</a>
                        </li>
                    </ul>
                </li>--}}
                <li class="treeview"><a href="#"><i class="icon icon-user light-green-text s-18"></i>Users<i
                                class="icon icon-angle-left s-18 pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/users"><i class="icon icon-circle-o"></i>All Users</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview"><a href="#"><i class="icon icon-accessibility text-danger s-18"></i>Staff Users<i
                                class="icon icon-angle-left s-18 pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/staff"><i class="icon icon-circle-o"></i>All Staffs</a>
                        </li>
                        <li><a href="/admin/staff/create"><i class="icon icon-add"></i>Add Staff</a>
                        </li>
                    </ul>
                </li>
                {{--<li class="treeview"><a href="#"><i class="icon icon-account_box light-green-text s-18"></i>Payments<i
                                class="icon icon-angle-left s-18 pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/routes"><i class="icon icon-circle-o"></i>All Payments</a>
                        </li>
                        <li><a href="/admin/routes"><i class="icon icon-circle-o"></i>Payment Methods</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview"><a href="#"><i class="icon icon-account_box light-green-text s-18"></i>User Stories<i
                                class="icon icon-angle-left s-18 pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/routes"><i class="icon icon-circle-o"></i>All Stories</a>
                        </li>
                        <li><a href="/admin/routes"><i class="icon icon-circle-o"></i>Published Stories</a>
                        </li>
                        <li><a href="/admin/routes"><i class="icon icon-circle-o"></i>Unpublished Stories</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview"><a href="#"><i class="icon icon-account_box light-green-text s-18"></i>News Letters<i
                                class="icon icon-angle-left s-18 pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/routes"><i class="icon icon-circle-o"></i>All Letters</a>
                        </li>
                        <li><a href="/admin/routes"><i class="icon icon-circle-o"></i>Compose News Letter</a>
                        </li>
                        <li><a href="/admin/routes"><i class="icon icon-circle-o"></i>Sent News Letters</a>
                        </li>
                        <li><a href="/admin/routes"><i class="icon icon-circle-o"></i>Pending News Letters</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview no-b"><a href="#">
                        <i class="icon icon-package light-green-text s-18"></i>
                        <span>Inbox</span>
                        <span class="badge r-3 badge-success pull-right">20</span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="panel-page-inbox.html"><i class="icon icon-circle-o"></i>All Messages</a>
                        </li>
                        <li><a href="panel-page-inbox-create.html"><i class="icon icon-add"></i>Compose</a>
                        </li>
                    </ul>
                </li>--}}
            </ul>
        </section>
    </aside>
    <!--Sidebar End-->
    <div class="page has-sidebar-left">
        <div class="pos-f-t">
            <div class="collapse" id="navbarToggleExternalContent">
                <div class="bg-dark pt-2 pb-2 pl-4 pr-2">
                    <div class="search-bar">
                        <input class="transparent s-24 text-white b-0 font-weight-lighter w-128 height-50" type="text"
                               placeholder="start typing...">
                    </div>
                    <a href="#" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-expanded="false"
                       aria-label="Toggle navigation" class="paper-nav-toggle paper-nav-white active "><i></i></a>
                </div>
            </div>
        </div>
        <div class="navbar navbar-expand d-flex navbar-dark justify-content-between bd-navbar blue accent-3 shadow">
            <div class="relative">
                <div class="d-flex">
                    <div>
                        <a href="#" data-toggle="offcanvas" class="paper-nav-toggle pp-nav-toggle">
                            <i></i>
                        </a>
                    </div>
                    <div class="d-none d-md-block">
                        <h1 class="nav-title text-white">Dashboard</h1>
                    </div>
                </div>
            </div>
            <!--Top Menu Start -->
            <div class="navbar-custom-menu p-t-10">
                <ul class="nav navbar-nav">
                    <!-- Messages-->
                    <!-- Notifications -->
                    <li>
                        <a class="nav-link " data-toggle="collapse" data-target="#navbarToggleExternalContent"
                           aria-controls="navbarToggleExternalContent"
                           aria-expanded="false" aria-label="Toggle navigation">
                            <i class=" icon-search3 "></i>
                        </a>
                    </li>
                    <!-- Right Sidebar Toggle Button -->
                </ul>
            </div>
        </div>

        {{--Content area--}}
        @yield('content')
        {{--End content area--}}
    </div>
    <!-- Right Sidebar -->
    <!-- /.right-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
    <div class="control-sidebar-bg shadow white fixed"></div>
</div>
<script src="/admin_inc/assets/js/app.unminified.js"></script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>

</body>
</html>

