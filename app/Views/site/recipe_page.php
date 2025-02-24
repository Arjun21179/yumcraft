<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <!-- ======================================================================================================================================== -->

  <!-- ================================================================================================================================================== -->

  <section class="recipe_banner">
    <div class="banner_name">
      <!-- <a href="" class="recipepage_banner"><img src="assets/images/Banner_img.jpg" alt="" /></a> -->
      <div class="container">

        <div class="sub_p">
          <h1>
          Recipes
          </h1>
        </div>
      </div>
    </div>
  </section>

  <!-- ================================================================================================================================================== -->

  <section class="two_divide">

    <div class="recipe_shortdescr">
      <p class="discover container">
        Discover a delicious variety of recipes tailored for every occasion! From kid-friendly parathas and healthy soups to spicy curries and festive desserts, our collection has something for everyone.
        Whether you're planning a special lunchbox, craving hearty rice dishes, or looking for quick snacks and breakfast options, explore our easy-to-make, allergy-free recipes that bring flavor and nutrition to your table.
      </p>
    </div>



    <div class="container">


      <div class="main_details_divs">


        <div class="details_one">


          <?php if (!empty($category_data)) { ?>

            <div class="same_recipe_page">

              <?php foreach ($category_data as $val) { ?>
                <div class="recipes_shows">
                  <!-- <img src="assets/images/biryani3.webp" alt=""> -->
                  <a href="recipe/<?php echo $val['c_url']; ?>">
                    <?php
                    if (!empty($val['c_img'])) {
                    ?>
                      <img src="<?php echo base_url(); ?>uploads/recipes_img/<?php echo $val['c_img']; ?>" alt="<?php echo !empty($val['category_img_alt']) ? $val['category_img_alt'] :''; ?>">
                    <?php
                    } else {
                    ?>
                      <img src="<?php echo base_url(); ?>uploads/noimage.jpg" alt="">
                    <?php
                    }
                    ?>
                  </a>
                  <div class="img_categ">
                    <a href="recipe/<?php echo $val['c_url']; ?>">
                      <?php echo $val['c_name']; ?>
                    </a>
                    <br>
                    <a href="recipe/<?php echo $val['c_url']; ?>" class="btn"> <i class="fa-solid fa-arrow-right"></i>
                      Explore Recipes
                    </a>
                  </div>
                </div>
              <?php } ?>

              <!-- <div class="recipes_shows">
    <img src="assets/images/biryani3.webp" alt="">

    <div class="img_categ">

      <a href="">category</a>

      <br>

      <a href="" class="btn"> <i class="fa-solid fa-arrow-right"></i> Explore Recipes</a>

    </div>

  </div>


  <div class="recipes_shows">
    <img src="assets/images/biryani3.webp" alt="">

    <div class="img_categ">

      <a href="">category</a>

      <br>

      <a href="" class="btn"> <i class="fa-solid fa-arrow-right"></i> Explore Recipes</a>

    </div>

  </div> -->

            </div>
          <?php } ?>



        </div>





        <div class="details_two">
          


          <?php
          if (!empty($popular_recipe_reighside)) {
          ?>
            <div class="author">
              <h3>POPULAR RECIPE</h3>
              <div class="author_details1">

                <?php
                $counter = 0;
                foreach ($popular_recipe_reighside as $index=>$val) {


                  if ($index < 2) {

                    if ($counter % 2 == 0) {
                      if ($counter > 0) {
                        echo '</div>'; // Close the previous row
                      }
                      echo '<div class="popular">'; // Open a new row
                    }
                ?>
                    <div class="posts">
                      <a href="recipe/<?= $val['re_titleurl']; ?>">
                        <!-- <img src="assets/images/popular1.jpg" alt="" /> -->
                        <img src="<?php echo base_url(); ?>uploads/recipes_img/<?php echo $val['re_images']; ?>" alt="<?php echo !empty($val['img_alt']) ? $val['img_alt'] :''; ?>">

                      </a>

                      <div class="tag_text third_tag">
                        <a href="recipe/<?= $val['re_titleurl']; ?>" class="short_desc">
                          <!-- Allergy-Friendly Vangi Kaap Recipe -->
                          <?php echo $val['re_title']; ?>
                        </a>

                        <h4>
                          <i>
                            <!-- February 1, 2004 -->
                            <?php
                            // echo $val['publish_data']; 
                            echo  date('F j, Y', strtotime($val['publish_data']));

                            ?>
                          </i>
                        </h4>
                      </div>
                    </div>
                <?php
                    $counter++;
                  }
                }
                if ($counter % 2 != 0) {
                  echo '</div>'; // Close the last row if it wasn't closed
                }
                ?>
              </div>
            </div>
          <?php
          }
          ?>


          <div class="main_author_sec">
            <div class="author">
              <h3>FOLLOW US</h3>

              <div class="author_details2 ">
                <div class="social">
                  <a href="" target="_blank" class="header_logos"><img src="assets/images/youtube.svg" alt=""></a>
                  <a href="" target="_blank" class="header_logos"><img src="assets/images/facebook_black.svg" alt=""></a>
                  <a href="" target="_blank" class="header_logos"><img src="assets/images/instagram_bg_black.svg" alt="" class="_head_instagram"></a>
                  <a href="" target="_blank" class="header_logos"><img src="assets/images/pinterest_black.svg" alt=""></a>
                </div>

              </div>
            </div>
          </div>



          <div class="main_author_sec">
            <div class="author">
              <h3>SUBSCRIBE NEWSLETTER </h3>

              <div class="author_details2 ">
                <div class="newsletter_btn">
                  <a href="subscriber-newsletter">
                    Subscribe Newsletter
                  </a>
                </div>

              </div>
            </div>
          </div>



          <?php
          if (!empty($category_data)) {
          ?>
            <div class="author">
              <h3>CATEGORIES</h3>
              <div class="author_details2">


                <?php
                foreach ($category_data as $index => $val) {

                  if ($index < 4) {

                ?>
                    <div class="catagary">
                      <a href="recipe/<?php echo $val['c_url']; ?>">
                        <div>
                          <!-- <img src="assets/images/categ1.webp" alt="" /> -->
                          <span> <i class="fa-solid fa-tag"></i>
                            <!-- BAKING  -->
                            <?php echo $val['c_name']; ?>
                          </span>

                          <!-- <h4>19 Posts</h4> -->
                        </div>
                      </a>
                    </div>
                <?php
                  }
                }
                ?>



                <div class="newsletter_btn">
                  <a href="recipe">
                    Explore More
                  </a>
                </div>


              </div>
            </div>
          <?php } ?>


          <div class="main_author_sec">
            <?php
            if (!empty($blog_two_data_rightside)) {
            ?>
              <div class="author">
                <h3>LATEST BLOGS</h3>
                <div class="author_details1">
                  <?php
                  $counter = 0;
                  foreach ($blog_two_data_rightside as $val) {
                    if ($counter % 2 == 0) {
                      if ($counter > 0) {
                        echo '</div>'; // Close the previous row
                      }
                      echo '<div class="popular">'; // Open a new row
                    }
                  ?>
                    <div class="posts">
                      <a href="blog/<?= $val['blog_url']; ?>">
                        <!-- <img src="assets/images/popular1.jpg" alt="" /> -->
                        <?php if ($val['blog_img']) { ?>
                          <img src="<?php echo base_url(); ?>uploads/blog_img/<?php echo $val['blog_img']; ?>" alt="<?php echo !empty($val['blog_img_alt']) ? $val['blog_img_alt'] :''; ?>">
                        <?php } else {
                        ?>
                          <img src="<?php echo base_url(); ?>uploads/noimage.jpg" alt="">
                        <?php
                        }
                        ?>
                      </a>
                      <div class="tag_text third_tag">
                        <a href="blog/<?= $val['blog_url']; ?>" class="short_desc">
                          <!-- Allergy-Friendly Vangi Kaap Recipe -->
                          <?php echo $val['blog_name']; ?>
                        </a>
                        <h4>
                          <i>
                            <!-- February 1, 2004 -->
                            <?php
                            // echo $val['publish_data']; 
                            echo date('F j, Y', strtotime($val['blog_publish_date']));
                            ?>
                          </i>
                        </h4>
                      </div>
                    </div>
                  <?php
                    $counter++;
                  }
                  if ($counter % 2 != 0) {
                    echo '</div>'; // Close the last row if it wasn't closed
                  }
                  ?>
                </div>
              </div>
            <?php
            }
            ?>
          </div>


        </div>


      </div>
    </div>
  </section>
</body>

</html>