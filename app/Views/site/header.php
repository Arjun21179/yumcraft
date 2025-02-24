<!DOCTYPE html>
<html lang="en">

<head>
  <base href="<?php echo base_url(); ?>">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  
  <title>
    <?php
    if (!empty($seo_title)) {
      echo $seo_title;
    } elseif (!empty($title)) {
      echo $title;
    } else {
      echo "yumcraft";
    }
    ?>
  </title>

  
  

  <!-- favicon logo -->
  <!-- <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon"/> -->
  <?php if (!empty($logo_favicon->manages_pages_favicon)) {
  ?>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>uploads/logo_info/<?php echo $logo_favicon->manages_pages_favicon; ?>" type="image/x-icon" />
  <?php
  } else {
  ?>
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon" />
  <?php
  }
  ?>



  <!-- slick link -->

  <link rel="stylesheet" href="assets/css/slick.css" />

  <link rel="stylesheet" href="assets/css/slick-theme.css" />

  <!-- font awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 



  <!-- google fonts links -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Aleo:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet" />

  <link href="https://fonts.googleapis.com/css2?family=FuturaPT:wght@400&display=swap" rel="stylesheet" />







  <!-- extra google font links links -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap"
    rel="stylesheet" />








  <script src="assets/js/jquery.min.js"></script>

  <style>
    label.error {
      color: red;
      font-size: 15px !important;
      font-weight: bold;
      margin-left: 2px;
    }
  </style>





  <!-- css link -->
  <link rel="stylesheet" href="assets/css/style.css" />


</head>

<body>

  <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">



  <nav class="header">
    <div class="logo">
      <a href="<?php echo base_url(); ?>">
        <!-- <img src="assets/images/logo.png" alt="" class="img_logo" /> -->
        <?php if (!empty($logo_favicon->manages_pages_logo)) {
        ?>
          <img src="<?php echo base_url(); ?>uploads/logo_info/<?php echo $logo_favicon->manages_pages_logo; ?>" alt="" class="img_logo" />
        <?php
        }
        ?>
      </a>
    </div>
    <div class="menu-area">
      <ul class="nav-links">
        <li><a href="<?php echo base_url(); ?>">HOME</a></li>

        

        <li>
          <div class="dropdown">
            <a href="recipe" class="dropbtn" onclick="toggleDropdown()">
              RECIPES <img src="assets/images/down_arrow.svg" alt="" class="downarrow" />
            </a>

            <?php if (!empty($set_category_onmenu)) {

            ?>
              <div class="dropdown-content container" id="dropdown_elements">

                <div class="recipes_names">
                  <?php foreach ($set_category_onmenu as $val) {
                    // Skip the "Uncategorized" category
                    if ('Uncategorized' == $val['c_name']) {
                      continue;
                    }
                  ?>

                    <a href="recipe/<?php echo $val['c_url']; ?>"><?php echo $val['c_name']; ?></a>
                  <?php } ?>
                </div>


              </div>
            <?php } ?>

          </div>
        </li>




        <li><a href="blog">BLOG testing</a></li>

      

        <li>
          <a href="contact"> CONTACT US</a>
        </li>


        <li>
          <!-- <div class="dropdown"> -->
            <!-- <button class="dropbtn" onclick="toggleDropdown3()">
              More
              <img src="assets/images/down_arrow.svg" alt="" />
            </button> -->

            <!-- <div class="dropdown-content container more" id="dropdown_elements3">
              <div class="more_dropdown"> -->

                <a href="gallery">Gallery</a>
              <!-- </div>


            </div>

          </div> -->


        </li>

        <li>
        <a href="video-recipe">Video</a>
        </li>




      </ul>

    </div>



    <div class="searchbar_effects">

      <!-- <form method="get" action="<?= base_url() ?>">
          <input type="text" name="s" id="popup" class="show" placeholder="Search" />
          <button id="theButton" type="submit">
            <img src="assets/images/search.svg" alt="" />
          </button>
        </form> -->

      <!-- search result -->
      <!-- <div class="card search_section" style="position:absolute;width:100%;background:#fff;overflow-y:scroll;padding:10px 18px;">
          <div class="card-body" id="searchResults">

          </div>
        </div> -->
      <!--  -->


      <a href="" target="_blank" class="header_logos"><img src="assets/images/youtube.svg" alt=""></a>
      <a href="" target="_blank" class="header_logos"><img src="assets/images/facebook_black.svg" alt=""></a>
      <a href="" target="_blank" class="header_logos"><img src="assets/images/instagram_bg_black.svg" alt="" class="_head_instagram"></a>
      <a href="" target="_blank" class="header_logos"><img src="assets/images/pinterest_black.svg" alt=""></a>



      <a href="javascript:void(0)" onclick="openModal()" class="searchborder"><img src="assets/images/searchborder.svg" alt="" /></a>



      <!-- The Modal -->
      <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
          <span class="close" onclick="closeModal()">&times;</span>


          <form method="get" action="<?= base_url() ?>" class="search_form">
            <input type="text" name="s" id="popup" class="show" placeholder="Search" />
            <button id="theButton" type="submit" class="search_button">
              <!-- <img src="assets/images/search.svg" alt="" /> -->Search
            </button>
          </form>


        </div>


        <!-- search result -->
        <div class="card search_section container">
          <div class="card-body" id="searchResults">

          </div>
        </div>
        <!-- </form> -->



      </div>



    </div>




    <div class="burger">
      <div class="line1"></div>
      <div class="line2"></div>
      <div class="line3 add"></div>
    </div>
  </nav>









  <script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Function to open the modal
    function openModal() {
      modal.style.display = "block";
    }

    // Function to close the modal
    function closeModal() {
      modal.style.display = "none";
    }

    // Close the modal if the user clicks outside of it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>