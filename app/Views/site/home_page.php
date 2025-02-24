<!-- ======================================================================================================================================== -->
<?php
if (!empty($banner_image)) {
?>
  <section class="one_banner">
    <div class="banner">


      <?php
      foreach ($banner_image as $val) {
      ?>
        <div class="set_banner">
          <img src="<?php echo base_url(); ?>uploads/banner_img/<?php echo $val['banner_site_img']; ?>" alt="<?php echo base_url(); ?>uploads/banner_img/<?php echo $val['banner_site_img']; ?>"
            class="desktop" />

          <img src="<?php echo base_url(); ?>uploads/banner_img/<?php echo $val['banner_mobile_img']; ?>" alt="<?php echo base_url(); ?>uploads/banner_img/<?php echo $val['banner_mobile_img']; ?>"
            class="mobile" />

          <div class="container">
            <div class="tag_text">
              <!-- <a href=""> <i class="fa-solid fa-tag"></i> rice verieties</a> -->
              <p>
                <a href="javascript:;" class="paragraph">
                  <!-- Explore Vegan Recipes for Food Allergies with yumcraft:
                Allergy-Friendly Vegan Delights -->
                  <?php echo $val['banner_title']; ?>
                </a>
              </p>
              <p class="banner_disr">

                <!-- Savor delicious vegan recipes that fit all allergy needs. yumcraft brings you tempting, allergy-friendly meals made with care. -->

                <?php echo $val['banner_shortdescription']; ?>

              </p>

              <a href="recipe">Explore Recipes </a>



            </div>
          </div>
        </div>

    <?php
      }
    }
    ?>

    </div>
  </section>



  <!-- ==================================================================================================================================================== -->
  <!-- counter on banner -->
  <div class="container">
    <div class="contents">
      <div class="feacher" data-aos="zoom-in-left">
        <div class="box">
          <div class="main_content">
            <div class="font_icons">
              <img src="assets/images/count-icon-1.svg" alt="assets/images/count-icon-1.svg">
            </div>
            <div class="sub_content">
              <h4><span class="num" data-val="450">00</span>+</h4>
              <p>Unique recipes for every taste bud</p>
            </div>
          </div>
        </div>

        <div class="box">
          <div class="main_content">
            <div class="font_icons">
              <img src="assets/images/count-icon-2.svg" alt="assets/images/count-icon-2.svg">
            </div>
            <div class="sub_content">
              <h4><span class="num" data-val="10">000</span>+ </h4>
              <p>years of recipe expertise</p>
            </div>
          </div>
        </div>

        <div class="box">
          <div class="main_content">
            <div class="font_icons">
              <img src="assets/images/count-icon-3.svg" alt="assets/images/count-icon-3.svg">
            </div>
            <div class="sub_content">
              <!-- <h1><span class="num" data-val="20000">000</span> Tons</h1> -->
              <h4><span class="num" data-val="5">1</span>+ </h4>
              <p>Allergy-Free Cuisines
                <!-- Tailored for Every Diet -->
              </p>
            </div>
          </div>
        </div>
        <!-- <div class="box">
          <div class="main_content">
            <div class="font_icons">
              <img src="assets/images/count-icon-4.svg">
            </div>
            <div class="sub_content">
              <p>Crafting Culinary Delights with <span>Allergy-Friendly Recipes</span> </p>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </div>

  <!-- end counter -->
  <!-- ==================================================================================================================================================== -->



  <!-- Allergen category section home page -->

  <?php
  if (!empty($homepage_Allergencategory_section_data)) {
  ?>
    <section class="container">
      <h1 class="findrecipe_for_heading">
        <!-- Allergy-Free Recipes -->
        <?php
        if (!empty($homepage_allergen_category_section)) {
          echo $homepage_allergen_category_section->heading;
        }
        ?>
      </h1>

      <h6 class="subtitle">
        <!-- Explore our top 9 allergen-free recipes designed for every palate -->
        <?php
        if (!empty($homepage_allergen_category_section)) {
          echo $homepage_allergen_category_section->sub_heading;
        }
        ?>
      </h6>

      <div class="findrecipe_for">

        <?php
        foreach ($homepage_Allergencategory_section_data as $index => $val) {

        ?>
          <div class="colums4">
            <a href="recipe/<?php echo $val['c_url']; ?>">
              <!-- <img src="assets/images/categ1.webp">  -->
              <img src="<?php echo base_url(); ?>uploads/recipes_img/<?php echo $val['c_img']; ?>" alt="<?php echo !empty($val['category_img_alt'])? $val['category_img_alt'] :''; ?>">
            </a>
            <h3>
              <!-- Gluten Free -->
              <?php
              echo $val['c_name'];
              ?>
            </h3>
          </div>
        <?php

        }

        ?>

        <!-- <div class="colums4">

        <a href=""> <img src="assets/images/categ2.webp"> </a>

        <h3>Dairy-Free</h3>

      </div>

      <div class="colums4">

        <a href=""> <img src="assets/images/categ3.webp"> </a>

        <h3>Vegan</h3>

      </div>

      <div class="colums4">

        <a href=""> <img src="assets/images/categ4.webp"> </a>

        <h3> Nut-Free</h3>

      </div> -->

      </div>
    </section>
  <?php } ?>



  <!-- ==================================================================================================================================================== -->
  <!-- main category section -->

  <?php if (!empty($all_main_category_data)) {
  ?>

    <section class="catagary_slider">

      <div class="container">

        <h2 class="catagary_slider_heading">
          <!-- Explore Every Flavor: Our Diverse Recipe Collection -->
          <?php
          if (!empty($homepage_category_section)) {
            echo $homepage_category_section->heading;
          }
          ?>
        </h2>
        <h6 class="subtitle">
          <!-- From Parathas to Desserts, find the perfect recipe for any taste or occasion. -->
          <?php
          if (!empty($homepage_category_section)) {
            echo $homepage_category_section->sub_heading;
          }
          ?>
        </h6>
        <div class="main_racepies">

          <?php foreach ($all_main_category_data as $index => $val) {

            // Skip the "Uncategorized" category
            if ('Uncategorized' == $val['c_name']) {
              continue;
            }

          ?>
            <div class="col-5">
              <a href="recipe/<?php echo $val['c_url']; ?>">
                <img src="<?php echo base_url(); ?>uploads/recipes_img/<?php echo $val['c_img']; ?>" alt="<?php echo !empty($val['category_img_alt']) ? $val['category_img_alt'] : ''; ?>">
              </a>

              <a href="recipe/<?php echo $val['c_url']; ?>">
                <h4>
                  <!-- Salads -->
                  <?php echo $val['c_name']; ?>
                </h4>
              </a>
            </div>
          <?php
          }
          ?>


        </div>

      </div>

    </section>

  <?php
  }
  ?>





  <!-- ==================================================================================================================================================== -->

  <!-- <section class="youtube_videos sec-2">
    <div class="container">
      <?php
      if (!empty($homepage_youtube_sec)) {
      ?>

        <h2>
          <?php
          echo $homepage_youtube_sec->heading;
          ?>
        </h2>
      <?php
      }
      ?> -->
      <!-- <p>
        Discover a delectable world of allergy-free recipes at yumcraft,
        where taste meets dietary needs. Explore a diverse collection of
        gluten-intolerant recipes crafted to satisfy your cravings without
        compromising on flavor. Indulge in a culinary journey that caters to
        allergies without sacrificing the joy of delicious dining. Elevate
        your meals with our allergy-friendly recipes, making every bite a
        celebration of health and taste.
      </p>    -->


      <!-- <?php
      if (!empty($homepage_youtube_sec_recipes)) {

      ?>

        <div class="main_youtube_videos">

          <?php
          foreach ($homepage_youtube_sec_recipes as $index => $val) {

            if ($index < 9) {
          ?>
              <div class="videos_slider_div">
                <iframe width="100%" height="250" src="<?= $val['video_url'] ?>" title="YouTube video player" frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                  referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                <a href="recipe/<?php echo $val['re_titleurl']; ?>">
                  <?php echo $val['re_title']; ?>
                </a>
              </div>
          <?php
            }
          }
          ?>

        </div>
      <?php
      }
      ?>


    </div>
  </section> -->



  <!-- ==================================================================================================================================================== -->
  <?php if (!empty($homepage_first_sec_recipes)) {
  ?>
    <section class="explore sec-3">
      <div class="container">
        <h2>
          <!-- Explore Delightful Kid-Friendly Allergy-Free and Simple Gluten-Free
        Recipes for Happy, Healthy Meals -->
          <?php
          if (!empty($homepage_first_sec)) {
            echo $homepage_first_sec->heading;
          }
          ?>
        </h2>

        <!-- <p>
          Unlock the joy of cooking with yumcraft's collection of
          kid-friendly allergy-free recipes and simple gluten-free delights.
          Elevate family meals with delicious, wholesome options for toddlers.
          Explore allergy-friendly dinner recipes and discover allergen-free
          meal plans to cater to dietary needs without sacrificing flavor or
          fun.
        </p> -->


        <div class="rec_varieties">
          <div class="more_verie">

            <!-- 1 -->
            <?php foreach ($homepage_first_sec_recipes as $index => $val) {
              if (!empty($index == 0)) {
            ?>
                <div class="photo_text">
                  <div class="photo">
                    <a href="recipe/<?= $val['re_titleurl']; ?>">
                      <!-- <img src="assets/images/bon_img1.webp" alt="" /> -->
                      <img src="<?php echo base_url(); ?>uploads/recipes_img/<?php echo $val['re_images']; ?>" alt="<?php echo !empty($val['img_alt']) ? $val['img_alt'] : ''; ?>">
                    </a>
                  </div>


                  <div class="text">
                    <div class="tag_text third_tag">
                      <!-- <a href="category"> <i class="fa-solid fa-tag"></i> SIDES </a> -->

                      <p>
                        <a href="recipe/<?= $val['re_titleurl']; ?>" class="parag">
                          <!-- 1 RECIPES
                        Rice Noodles With Shrimp and Coconut-Lime Dressing -->
                          <?php echo $val['re_title']; ?>
                        </a>
                      </p>

                      <h4>
                        <i>
                          <!-- February 1, 2004 -->
                          <?php
                          // echo $date = explode(' ', $val['publish_data'])[0];
                          echo date('F j, Y', strtotime($val['publish_data']));

                          ?>
                        </i>
                        <!-- - -->
                        <!-- <i class="fa-regular fa-clock"></i> -->
                        <!-- <i> 2 Min Read</i> -->
                      </h4>
                    </div>
                  </div>
                </div>
            <?php }
            } ?>



            <!-- 2 -->
            <?php foreach ($homepage_first_sec_recipes as $index => $val) {
              if (!empty($index == 1)) {
            ?>
                <div class="photo_text">
                  <div class="photo">
                    <a href="recipe/<?= $val['re_titleurl']; ?>">
                      <!-- <img src="assets/images/bon_img2.webp" alt="" /> -->
                      <img src="<?php echo base_url(); ?>uploads/recipes_img/<?php echo $val['re_images']; ?>" alt="<?php echo !empty($val['img_alt']) ? $val['img_alt'] : ''; ?>">
                    </a>
                  </div>

                  <div class="text">
                    <div class="tag_text third_tag">
                      <!-- <a href="category">
                    <i class="fa-solid fa-tag"></i> RICE VARIETIES
                  </a> -->

                      <p>
                        <a href="recipe/<?= $val['re_titleurl']; ?>" class="parag">
                          <!-- 2 BA’s Best Caprese Salad -->
                          <?php echo $val['re_title']; ?>
                        </a>
                      </p>

                      <h4>
                        <i>
                          <!-- February 1, 2004 -->
                          <?php
                          // echo $date = explode(' ', $val['publish_data'])[0];
                          echo date('F j, Y', strtotime($val['publish_data']));
                          ?>
                        </i>
                        <!-- - -->
                        <!-- <i class="fa-regular fa-clock"></i> -->
                        <!-- <i> 2 Min Read</i> -->
                      </h4>
                    </div>
                  </div>
                </div>
            <?php }
            } ?>


          </div>




          <!-- 3 -->
          <?php foreach ($homepage_first_sec_recipes as $index => $val) {
            if (!empty($index == 2)) {
          ?>
              <div class="photo_info">
                <div class="photo">
                  <a href="recipe/<?= $val['re_titleurl']; ?>">
                    <!-- <img src="assets/images/bon_img5.webp" alt="" /> -->
                    <img src="<?php echo base_url(); ?>uploads/recipes_img/<?php echo $val['re_images']; ?>" alt="<?php echo !empty($val['img_alt']) ? $val['img_alt'] : ''; ?>">
                  </a>
                </div>

                <div class="tag_text second_tag">
                  <p>
                    <a href="recipe/<?= $val['re_titleurl']; ?>" class="parag">
                      <!-- 3 Welcome to one of the most premiere seafood capitals of the world. The Best Lobster Rolls in Portland, Maine -->
                      <?php echo $val['re_title']; ?>
                    </a>
                  </p>

                  <h4>
                    <i>
                      <!-- February 1, 2004 -->
                      <?php
                      // echo $date = explode(' ', $val['publish_data'])[0];
                      echo date('F j, Y', strtotime($val['publish_data']));
                      ?>
                    </i>
                    <!-- - <i class="fa-regular fa-clock"></i>
                <i> 2 Min Read</i> -->
                  </h4>
                </div>
              </div>
          <?php }
          } ?>



          <div class="more_verie">
            <!-- 4 -->
            <?php foreach ($homepage_first_sec_recipes as $index => $val) {
              if (!empty($index == 3)) {
            ?>
                <div class="photo_text">
                  <div class="photo">
                    <a href="recipe/<?= $val['re_titleurl']; ?>">
                      <!-- <img src="assets/images/delight4.webp" alt="" /> -->
                      <img src="<?php echo base_url(); ?>uploads/recipes_img/<?php echo $val['re_images']; ?>" alt="<?php echo !empty($val['img_alt']) ? $val['img_alt'] : ''; ?>">
                    </a>
                  </div>

                  <div class="text">
                    <div class="tag_text third_tag">
                      <!-- <a href="category"> <i class="fa-solid fa-tag"></i> UNCATEGORIZED </a> -->

                      <p>
                        <a href="recipe/<?= $val['re_titleurl']; ?>" class="parag">
                          <!-- 4 Aromatic Vegan Green Peas Pulao Recipe -->
                          <?php echo $val['re_title']; ?>
                        </a>
                      </p>

                      <h4>
                        <i>
                          <!-- February 1, 2004 -->
                          <?php
                          // echo $date = explode(' ', $val['publish_data'])[0];
                          echo date('F j, Y', strtotime($val['publish_data']));
                          ?>
                        </i>
                        <!-- -<i class="fa-regular fa-clock"></i>
                    <i> 2 Min Read</i> -->
                      </h4>
                    </div>
                  </div>
                </div>
            <?php }
            } ?>



            <!-- 5  -->
            <?php foreach ($homepage_first_sec_recipes as $index => $val) {
              if (!empty($index == 4)) {
            ?>
                <div class="photo_text">
                  <div class="photo">
                    <a href="recipe/<?= $val['re_titleurl']; ?>">
                      <!-- <img src="assets/images/bon_img4.webp" alt="" /> -->
                      <img src="<?php echo base_url(); ?>uploads/recipes_img/<?php echo $val['re_images']; ?>" alt="<?php echo !empty($val['img_alt']) ? $val['img_alt'] : ''; ?>">
                    </a>
                  </div>

                  <div class="text">
                    <div class="tag_text third_tag">
                      <p>
                        <a href="recipe/<?= $val['re_titleurl']; ?>" class="parag">
                          <!-- 5 31 Easy Fish Recipes for Crazy-Busy Weeknights -->
                          <?php echo $val['re_title']; ?>
                        </a>
                      </p>

                      <h4>
                        <i>
                          <!-- February 1, 2004 -->
                          <?php
                          // echo $date = explode(' ', $val['publish_data'])[0];
                          echo date('F j, Y', strtotime($val['publish_data']));
                          ?>
                        </i>
                        <!-- -
                    <i class="fa-regular fa-clock"></i>
                    <i> 2 Min Read</i> -->
                      </h4>
                    </div>
                  </div>
                </div>
          </div>
      <?php }
            } ?>


        </div>

      </div>
    </section>
  <?php } ?>

  <!-- ==================================================================================================================================================== -->

  <?php if (!empty($homepage_second_section)) {
  ?>

    <section class="savor sec-4">
      <div class="container">
        <div class="two_section">
          <div class="sec_one">
            <!-- <img src="assets/images/side_img1.png" alt="" /> -->
            <img src="<?php echo base_url(); ?>uploads/other-img/<?php echo $homepage_second_section->image; ?>" alt="<?php echo base_url(); ?>uploads/other-img/<?php echo $homepage_second_section->image; ?>">
          </div>

          <div class="sec_two">
            <h3>
              <!-- Savor Every Bite: yumcraft's Allergy-Friendly Dinner Recipes
              and Delectable Gluten-Free Culinary Creations Await Your Palate. -->
              <?php echo $homepage_second_section->heading; ?>
            </h3>

            <p>
              <!-- Indulge in a world of flavor with yumcraft's collection of
              allergy-friendly dinner recipes and gluten-free delights. From
              comforting classics to innovative dishes, experience the joy of
              dining without compromising on taste or dietary needs. -->
              <?php echo $homepage_second_section->desc; ?>
            </p>

            <a href="<?= $homepage_second_section->link; ?>">READ MORE</a>
          </div>
        </div>
      </div>
    </section>

  <?php
  }
  ?>

  <!-- ==================================================================================================================================================== -->

  <?php if (!empty($homepage_third_sec_recipes)) {

  ?>

    <section class=" popular_dish">
      <div class="container">
        <h2>
          <!-- Simple Delights: yumcraft's Easy Recipes for Celiac Disease and
        Scrumptious Gluten-Free Culinary Creations Await Your Kitchen -->
          <?php echo $homepage_third_section->heading; ?>

          <!-- TRENDING RECIPES -->
        </h2>

        <div class="simple_delight">

          <?php foreach ($homepage_third_sec_recipes as $val) {
          ?>
            <div class="delights">
              <div class="delight_img">
                <a href="recipe/<?= $val['re_titleurl']; ?>">
                  <!-- <img src="assets/images/jamie_img1.webp" alt=""> -->
                  <img src="<?php echo base_url(); ?>uploads/recipes_img/<?php echo $val['re_images']; ?>" alt="<?php echo !empty($val['img_alt']) ? $val['img_alt'] : ''; ?>">
                </a>
              </div>

              <div class="delight_des">
                <a href="recipe/<?= $val['re_titleurl']; ?>">
                  <!-- The quickest tomato sauce -->
                  <?php echo $val['re_title']; ?>
                </a>
              </div>
            </div>
          <?php } ?>


        </div>
      </div>

    </section>
  <?php
  }
  ?>







  <!-- ==================================================================================================================================================== -->

  <?php if (!empty($homepage_four_sec_blog)) {
  ?>

    <section class="last_sec">
      <div class="container">
        <h4>
          <!-- Stay Updated with Our Vegan Allergy-Free Food Journey: Explore Our Blog -->
          <?php
          if (!empty($homepage_four_section)) {
            echo $homepage_four_section->heading;
          }
          ?>
        </h4>

        <!-- <p>
          Discover ease in the kitchen with GrubAllergy's collection of easy
          recipes tailored for celiac disease. Explore a variety of gluten-free
          culinary creations, ensuring both simplicity and deliciousness in
          every bite, catering to your dietary needs without compromise.
        </p> -->

        <div class="simple_three">

          <?php
          foreach ($homepage_four_sec_blog as $index => $val) {

            if ($index < 4) {

          ?>
              <div class="last_main_divs">
                <a href="blog/<?php echo $val['blog_url']; ?>">
                  <!-- <img src="assets/images/blog1.jpg" alt="" /> -->
                  <?php
                  if (!empty($val['blog_img'])) {
                  ?>
                    <img src="<?php echo base_url(); ?>uploads/blog_img/<?php echo $val['blog_img']; ?>" alt="<?php echo !empty($val['blog_img_alt']) ? $val['blog_img_alt'] : ''; ?>">
                  <?php
                  } else {
                  ?>
                    <img src="<?php echo base_url(); ?>uploads/noimage_1.jpg" alt="">
                  <?php
                  }
                  ?>
                </a>

                <div class="tag_text third_tag">
                  <!-- <a href="category" class="catagary_name">
                <i class="fa-solid fa-tag"></i> dessers
              </a> -->

                  <a href="blog/<?php echo $val['blog_url']; ?>" class="short_desc">
                    <?php
                    echo $val['blog_name'];
                    ?>
                    <!-- Flour Freedom: Exploring Gluten-Free Flour Alternatives in 80+ Recipes -->
                  </a>


                </div>
              </div>
          <?php }
          } ?>



        </div>


        <a href="blog" class="view_blog">VIEW ALL BLOG</a>


      </div>
    </section>
  <?php
  }
  ?>


  <!-- ==================================================================================================================================================== -->
