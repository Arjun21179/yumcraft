<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?= base_url() ?>">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">


    <title>
        <?php
        if (!empty($website_title)) {
            echo $website_title;
        } else {
            echo "yumcraft";
        }
        ?>
    </title>

    <link rel="shortcut icon" href="<?php echo base_url(); ?>uploads/logo_info/<?php if (!empty($logo_favicon)) {
                                                                                    echo $logo_favicon->manages_pages_favicon;
                                                                                } ?>">


    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="stylesheet" href="admin_assets/plugins/morris/morris.css">

    <link href="admin_assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="admin_assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="admin_assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="admin_assets/css/style.css" rel="stylesheet" type="text/css">


    <!-- own links -->
    <!-- dynamic admin css -->
    <link href="admin_assets/css/dynamic_admin.css" rel="stylesheet" type="text/css">


    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- select multiple data  -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- summernotes -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <!-- SWEET ALERT Link -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Toaster Links -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script> -->
    <link rel="stylesheet" href="admin_assets/css/admin_links/toaster_css_link.css" />
    <script src="admin_assets/js/admin_links/toaster_js_link.js"></script>

    <!-- Data table css -->
    <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"> -->
    <link rel="stylesheet" href="admin_assets/css/admin_links/admin_datable_links.css">



    <!-- own css -->
    <link rel="stylesheet" href="admin_assets/css/admin_dynamic.css">




</head>

<body>


    <!-- transfer base url to js file -->
    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">


    <?php


$this->db = \Config\Database::connect();

    
    $logo_info=$this->db->table('manages_pages')
                                ->get()
                                ->getRow();


        
                                //   echo '<pre>';
                                //   print_r($logo_info);
                                //   die;
    
    ?>




    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="recipes" class="logo">
                    <span>
                        <img src="<?php echo base_url(); ?>uploads/logo_info/<?php echo $logo_info->manages_pages_logo; ?>" alt="" height="80">
                    </span>
                    <!-- <i>
                        <img src="admin_assets/images/logo-sm.png" alt="" height="22">
                    </i> -->
                </a>
            </div>

            <nav class="navbar-custom">

                <ul class="navbar-right d-flex list-inline float-right mb-0">
                  


                    <li class="dropdown notification-list">
                        <div class="dropdown notification-list nav-pro-img">
                            <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="admin_assets/images/profile.png" alt="user" class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <a class="dropdown-item" href="profile">
                                    <!-- <i class="mdi mdi-account-circle m-r-5"></i> -->
                                    <img src="admin_assets/images/profile.png" alt="user" class="rounded-circle" height="20">
                                    Profile</a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="admin_logout"><i class="mdi mdi-power text-danger"></i>
                                    Logout</a>
                            </div>
                        </div>
                    </li>

                </ul>

                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left waves-effect waves-light">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
                    <!-- <li class="d-none d-sm-block">
                        <div class="dropdown pt-3 d-inline-block">
                            <a class="btn btn-header waves-effect waves-light dropdown-toggle" href="#" role="button"
                                id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Create New
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </div>
                    </li> -->
                </ul>

            </nav>

        </div>
        <!-- Top Bar End -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <div class="slimscroll-menu" id="remove-scroll">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu m-t-20" id="side-menu">
                      
                      

                        <li>
                            <a href="category-section" class="waves-effect">
                                <i class="fa-solid fa-table-list"></i>
                                <span>
                                    Category
                                </span>
                            </a>
                        </li>



                        <li>
                            <a href="recipes" class="waves-effect">
                                <i class="fa-solid fa-plate-wheat"></i>
                                <span> Recipes Post</span>
                            </a>
                        </li>


                       
                        <li>
                            <a href="blog-list" class="waves-effect">
                                <i class="fa-solid fa-blog"></i>
                                <span> Blogs </span>
                            </a>
                        </li>

                      
                        <li>
                            <a href="banner" class="waves-effect">
                                <i class="fa-solid fa-image"></i>
                                <span>
                                    Banner & Mobile Image
                                </span>
                            </a>
                        </li>


                        
                        <li>
                            <a href="video" class="waves-effect">
                                <i class="fa-solid fa-circle-play"></i>
                                <span>
                                    Video Url
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="waves-effect"><i class="fa-solid fa-list-check"></i><span> Manage Pages
                                    <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
                            <ul class="submenu">

                                <li><a href="logo-info"><span><i class="fa-solid fa-circle-info m-r-10"></i></span>Manage Website
                                        Logo/Info</a></li>
                                <li><a href="homepage-sections"><span><i class="fa-brands fa-dropbox"></i></span>
                                        Homepage Sections
                                    </a></li>

                            </ul>
                        </li>



                        <li>
                            <a href="#" class="waves-effect"><i class="fa-solid fa-list-check"></i><span> Import/Export
                                    <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
                            <ul class="submenu">

                                <li><a href="import-export-recipes"><span><i class="fa-solid fa-file-import  m-r-10"></i></span> Recipes</a></li>
                              
                            </ul>
                        </li>



                        <li>
                            <a href="contact-list" class="waves-effect">
                                <i class="fa-solid fa-address-card"></i>
                                <span>
                                    Contact Us
                                </span>
                            </a>
                        </li>

                     


                        <li>
                            <a href="#" class="waves-effect"><i class="fa-solid fa-list-check"></i><span> Comments
                                    <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
                            <ul class="submenu">
                                <li>
                                    <a href="comments-recipes"><span><i class="fa-solid fa-comment m-r-10"></i></span>
                                        Recipes
                                    </a>
                                </li>
                                <li>
                                    <a href="comments-blog"><span><i class="fa-solid fa-comment m-r-10"></i></i></span>
                                        Blog
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#" class="waves-effect"><i class="fa-solid fa-list-check"></i><span> All Project Gallery
                                    <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
                            <ul class="submenu">

                                <li><a href="gallery-section"><span class="mr-2"><i class="fa-solid fa-images"></i></span>Website Gallery </a></li>
                                <li><a href="recipe-gallery"><span class="mr-2"><i class="fa-solid fa-images"></i></span>Recipes Images</a></li>
                            </ul>
                        </li>






                    </ul>

                </div>
                <!-- Sidebar -->
                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->