<!-- =============================================================================================================================== -->

<section class="detail_page1">
  <div class="container">
    <div class="main_details_divs">




      <div class="last_details_one">
        <?php if (!empty($currentRecipe)) {

        ?>
          <div class="col-2">
            <div class="tag_text third_tag">
              <h1 class="dish_name">
                <!-- Kashmiri Veg Biryani: Vegan Recipe Rice, No Onion-Garlic
                Allergy-Free Delight -->
                <?php
                if (!empty($currentRecipe->re_title)) {
                  echo $currentRecipe->re_title;
                }
                ?>
              </h1>
            <?php } ?>



            <span class="dish_name1">
              <?php
              if (!empty($currentRecipe->re_shortdescription)) {
                echo $currentRecipe->re_shortdescription;
              }
              ?>
            </span>


            <?php
            if (!empty($category_data_list)) {
              $i = 0;
              foreach ($category_data_list as $val) {
                // if($i<=4)
                // {
            ?>
                <a href="recipe/<?php echo $val['c_url']; ?>">
                  <i class="fa-solid fa-tag"></i>
                  <!-- kids lunch box special -->
                  <?php echo $val['c_name']; ?>
                </a>
            <?php
                // }else{
                //   break;
                // }
                // $i++;
              }
            }
            ?>

            <!-- 
              <a href="category.html">
                <i class="fa-solid fa-tag"></i> snacks
              </a> -->

            <h4>
              <i>
                <!-- February 1, 2004 -->
                <?php
                if (!empty($currentRecipe->publish_data)) {
                  echo date('F j, Y', strtotime($currentRecipe->publish_data));
                }
                ?>


              </i>
              <!-- <i class="fa-regular fa-clock"></i>
                <i> 2 Min Read</i> -->
            </h4>
            </div>


            <div class="details">
              <a href="javascript:void(0);" class="jump_to" onclick="scrollToRecipe()">JUMP TO RECIPE ></a>
            </div>


            <!-- Description section------------- -->
            <div class="detail_sideimg">
              <!-- <img src="assets/images/biryani_banner.webp" alt="" /> -->
              <img src="<?php echo base_url(); ?>uploads/recipes_img/<?php echo (!empty($currentRecipe->re_images)) ? $currentRecipe->re_images : ''; ?>" alt="<?php echo (!empty($currentRecipe->img_alt)) ? $currentRecipe->img_alt : ''; ?>">

            </div>
          </div>
          <!-- 
          <a href="#jump_rec" class="jump_rec"><img src="assets/images/down_arrow.svg" alt="" /> Jump To
            Recipe</a> -->


          <div class="recipe_description">
            <?php
            if (!empty($currentRecipe->re_description)) {
              echo $currentRecipe->re_description;
            }
            ?>
          </div>



          <!-- <div class="detail_iframe"> -->
          <!-- <iframe src="https://www.youtube.com/embed/nJwtU8IhnFA?si=kpsl1BMh0EHoY3jv" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->

          <!-- <?php
                if (!empty($currentRecipe->video_url)) {

                ?>
              <iframe src="<?php echo $currentRecipe->video_url; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

            <?php
                }
            ?>

          </div> -->




          <div class="views_fouricons">
            <div class="views" id="test">
              <!-- <div class="post_likes">
                <i class="fa-regular fa-comment"></i>
                <a href="">0</a>
              </div>

              <div class="post_likes">
                <i class="fa-regular fa-eye"></i>

                <a href="">322</a>
              </div>

              <div class="post_likes">
                <i class="fa-regular fa-heart"></i>

                <a href="">0</a>
              </div> -->
            </div>

            <!-- <div class="four_icons">
              <a href="https://www.facebook.com/yumcraft">
                <img src="assets/images/facebook_black.svg" alt="" />
              </a>

              <a href="">
                <img src="assets/images/twitter_black.svg" alt="" />
              </a>

              <a href="">
                <img src="assets/images/linkedin_black.svg" alt="" />
              </a>

              <a href="">
                <img src="assets/images/pinterest_black.svg" alt="" />
              </a>
            </div> -->
          </div>






          <div class="border"></div>



          <!-- 

          <div class="Gain gain1">
    <h2>FAQ</h2>

    <div class="imgcontaint">
      <div class="accordions">
        <button class="accordion"> Are all recipes on yumcraft suitable for people with food allergies?</button>
        <div class="panel">
          <ul>
            <li>
              <p>
                Yes, all our recipes are carefully crafted to be allergy-friendly, ensuring they are safe for
                individuals with various food allergies.
              </p>
            </li>

          </ul>
        </div>

        <button class="accordion">How do you ensure the safety of your allergy-free recipes?</button>
        <div class="panel">
          <ul>
            <li>
              <p>
                Our recipes undergo rigorous testing and review to ensure they are free from common allergens. We also
                provide detailed ingredient lists and substitution options to accommodate different dietary needs.

              </p>
            </li>

          </ul>
        </div>

        <button class="accordion">
          Can I find recipes for specific food allergies on yumcraft?

        </button>
        <div class="panel">
          <ul>

            <li>
              <p>
                Absolutely! We offer a wide range of recipes tailored to specific food allergies, including gluten-free,
                nut-free, dairy-free, soy-free, and more. You can easily filter recipes based on your dietary
                requirements.

              </p>
            </li>
          </ul>
        </div>


      </div>

      <div class="imagee">
        <img src="asset/imgs/image 18.png" alt="" />
      </div>
    </div>
 
</div>
 -->




          <!-- =============================================================================================================================================== -->


          <!-- extra detail page -->
          <section class="details">
            <div class="trdelniks animate__animated animate__fadeInUp">
              <div class="trdelniks-area">
                <div class="trdelniks-image">
                  <img src="<?= base_url() ?>uploads/recipes_img/<?php echo (!empty($currentRecipe->re_images)) ? $currentRecipe->re_images : '' ?>" alt="<?php echo (!empty($currentRecipe->img_alt)) ? $currentRecipe->img_alt : ''; ?>" />
                </div>
                <div class="trdelniks-content">
                  <h3>
                    <!-- Kashmiri Veg Biryani: Vegan Recipe Rice, No Onion-Garlic
                    Allergy-Free Delight -->
                    <?php
                    if (!empty($currentRecipe->re_title)) {
                      echo $currentRecipe->re_title;
                    }
                    ?>
                  </h3>
                  <!-- <p>
                    Welcome to yumcraft! Today, we bring you a delightful
                    vegan recipe rice dish inspired by the rich culinary
                    heritage of Kashmiri Pandit cuisine. This Kashmiri Veg
                    Biryani is a no-onion-garlic recipe for veg rice that
                    beautifully marries the sweet and fragrant flavours of
                    Kashmir.
                  </p> -->
                  <div class="featurecontent">
                    <div class="features">
                      <img src="assets/images/feature1.svg" />
                      <div class="features-area">
                        <h5>Serving</h5>
                        <p>
                          <!-- 4 People -->
                          <?php
                          if (!empty($currentRecipe->serving)) {
                            echo $currentRecipe->serving;
                          }
                          ?>
                        </p>
                      </div>
                    </div>
                    <div class="features">
                      <img src="assets/images/feature2.svg" />
                      <div class="features-area">
                        <h5>Prep Time</h5>
                        <p>
                          <!-- 5 hrs -->
                          <?php
                          if (!empty($currentRecipe->prep_time)) {
                            echo $currentRecipe->prep_time;
                          }
                          ?>
                        </p>
                      </div>
                    </div>
                    <div class="features">
                      <img src="assets/images/feature2.svg" />
                      <div class="features-area">
                        <h5>Cook Time</h5>
                        <p>
                          <!-- 2 hrs 30 mins -->
                          <?php
                          if (!empty($currentRecipe->cook_time)) {
                            echo $currentRecipe->cook_time;
                          }
                          ?>
                        </p>
                      </div>
                    </div>
                    <div class="features">
                      <img src="assets/images/feature2.svg" />
                      <div class="features-area">
                        <h5>Total Time</h5>
                        <p>
                          <!-- 2 hrs 30 mins -->
                          <?php
                          if (!empty($currentRecipe->total_time)) {
                            echo $currentRecipe->total_time;
                          }
                          ?>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>




              <div class="row animate__animated animate__fadeInUp">
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <!-- <div class="directions"> -->

                  <?php
                  if (!empty($currentRecipe->free_from)) {
                  ?>
                    <div class="ingredients directions free-form ul li">

                      <h5> Free From :</h5>
                      <?php
                      echo $currentRecipe->free_from;

                      ?>

                      <!-- <h6>Chocolate Sauce:</h6>
<ul>
<li>
  <i class="far fa-check-circle"></i>3 carrots, shredded
</li>
<li>
  <i class="far fa-check-circle"></i>half a head of purple
  cabbage, shredded
</li>
<li>
  <i class="far fa-check-circle"></i>sliced almonds,
  peanuts, cashews, etc
</li>
</ul> -->
                    </div>
                  <?php
                  }
                  ?>



                  <?php
                  if (!empty($currentRecipe->ingredients)) {
                  ?>
                    <div class="ingredients directions">
                      <h5>Ingredients</h5>
                      <?php
                      echo $currentRecipe->ingredients;
                      ?>
                    </div>
                  <?php
                  }
                  ?>

                  <!-- </div> -->
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                  <!-- <div class="directions"> -->


                  <?php
                  if (!empty($currentRecipe->method)) {
                  ?>
                    <div class="directions">
                      <h5>Method</h5>
                      <?php
                      echo $currentRecipe->method;

                      ?>
                    </div>
                  <?php
                  }
                  ?>


                  <?php
                  if (!empty($currentRecipe->Recipe_Notes)) {
                  ?>
                    <div class="directions">
                      <h5>Recipe Notes:</h5>
                      <?php
                      echo $currentRecipe->Recipe_Notes;
                      ?>
                    </div>
                  <?php
                  }
                  ?>

                  <!-- </div> -->
                </div>


                <?php
                if (!empty($currentRecipe->conclusion)) {
                ?>
                  <div class="conclution directions">
                    <h2>Conclusion:</h2>

                    <p>
                      <?php
                      echo $currentRecipe->conclusion;
                      ?>
                    </p>

                  </div>
                <?php
                }
                ?>

              </div>


              <div class="row1">


                <div class="col-lg-6 col-md-6 col-sm-12">
                  <?php if (!empty($currentRecipe->nutrition)) { ?>

                    <div class="nutrition">

                      <h5>Nutritional Information</h5>
                      <h6>
                        <!-- Calories<span>531</span> -->
                        <?php
                        echo $currentRecipe->nutrition;
                        ?>
                      </h6>
                      <!-- <h6>Fat<span>28G</span></h6>
                    <h6>Carbs<span>74G</span></h6>
                    <h6>Fiber<span>2G</span></h6>
                    <h6>Sugar<span>57</span></h6>
                    <h6>Protein<span>5G</span></h6> -->
                    </div>
                  <?php } ?>

                </div>



                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="video">
                    <div class="embed-responsive embed-responsive-21by9">
                      <?php if (!empty($currentRecipe->video_url)) {

                      ?>
                        <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/4B19GTbM46U?si=6uDTgm95cL6yTZvb" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->

                        <iframe width="560" height="315" src="<?php echo $currentRecipe->video_url; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                      <?php
                      }
                      ?>
                    </div>
                  </div>
                </div>
              </div>




            </div>




          </section>















          <!-- ==================================================================================================================================================== -->


          <?php if (!empty($recipes_tags)) {
          ?>
            <div class="sub_rectags">
              <?php foreach ($recipes_tags as $val) { ?>
                <!-- Allergy-Free Recipe -->
                <a href="tag/<?= $val['tag_url'] ?>"><?= $val['tag_name'] ?></a>

              <?php } ?>
            </div>
          <?php } ?>








          <!-- ---Faq Section Recipe  -->
          <?php if (!empty($faq_recipe_data_single_recipe)) { ?>
            <div class="Gain detail_faq">

              <h2>FAQ</h2>
              <?php foreach ($faq_recipe_data_single_recipe as $val) { ?>
                <div class="imgcontaint">

                  <div class="accordions">
                    <button type="button" class="accordion">
                      <!-- Are all recipes on yumcraft suitable for people with food allergies? -->
                      <?= $val['faq_recipe_question'] ?>
                    </button>
                    <div class="panel">
                      <ul>
                        <li>
                          <p>
                            <!-- Yes, all our recipes are carefully crafted to be allergy-friendly, ensuring they are safe for
                          individuals with various food allergies. -->
                            <?= $val['faq_recipe_answer'] ?>

                          </p>
                        </li>
                      </ul>
                    </div>
                  </div>

                  <div class="imagee">
                    <img src="asset/imgs/image 18.png" alt="" />
                  </div>

                </div>
              <?php } ?>

            </div>
          <?php } ?>




          <!-- =================================================================================================================================== -->

          <!-- faq script -->

          <script>
            var acc = document.getElementsByClassName("accordion");

            var i;

            for (i = 0; i < acc.length; i++) {
              acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                  panel.style.maxHeight = null;
                } else {
                  panel.style.maxHeight = panel.scrollHeight + "px";
                }
              });
            }
          </script>



          <div class="prev_next">
            <?php if (!empty($previousRecipe)) { ?>
              <a href="recipe/<?php echo $previousRecipe->re_titleurl; ?>">
                <div class="prev">
                  <i class="fa-solid fa-arrow-left"></i>
                  previous

                  <br />
                </div>
              </a>
            <?php } ?>


            <?php if (!empty($nextRecipe)) { ?>
              <a href="recipe/<?php echo $nextRecipe->re_titleurl; ?>">
                <div class="next">
                  next

                  <i class="fa-solid fa-arrow-right"></i> <br />
                </div>
              </a>
            <?php } ?>
          </div>

          <div class="vegan">
            <?php if (!empty($previousRecipe)) {
            ?>
              <a href="recipe/<?php echo $previousRecipe->re_titleurl; ?>" class="prev_rec">
                <!-- Vegan Matki Usal Recipe | Moth bean curry -->
                <?php echo $previousRecipe->re_title; ?>
              </a>
            <?php
            }
            ?>

            <!-- <p>|</p> -->
            <?php if (!empty($nextRecipe)) {
            ?>
              <a href="recipe/<?php echo $nextRecipe->re_titleurl; ?>">
                <!-- Vegan Whole Wheat Pancakes: Fluffy Delights for a Wholesome
              Breakfast -->
                <?php echo $nextRecipe->re_title; ?>
              </a>
            <?php
            }
            ?>
          </div>
















          <?php
          if (!empty($random_recipes)) {
          ?>
            <div class="main_youmay_alsolike">
              <h2>You may also like</h2>

              <div class="col_alsolike">

                <?php
                foreach ($random_recipes as $val) {
                ?>

                  <div class="related">
                    <div class="related_img">
                      <a href="recipe/<?php echo $val['re_titleurl']; ?>">
                        <!-- <img src="assets/images/related1.webp" alt="" /> -->
                        <img src="<?php echo base_url(); ?>uploads/recipes_img/<?php echo $val['re_images']; ?>" alt="<?= !empty($val['img_alt']) ? $val['img_alt'] : ''; ?>">
                      </a>
                    </div>
                    <a href="recipe/<?php echo $val['re_titleurl']; ?>" class="description">
                      <!-- 19 Plum Recipes for Drinks, Snacks, Desserts, and Full-On
                      Dinners -->
                      <?php echo $val['re_title']; ?>
                    </a>
                  </div>
                <?php
                }
                ?>

              </div>
            </div>
          <?php
          }
          ?>







          <div class="detail_last_form">
            <h2>Leave a Comment</h2>

            <div class="rating-box">
              <h3>Recipe Rating</h3>
              <div class="stars">
                <i class="fa-solid fa-star" onclick="checkRating_recipes(1);"></i>
                <i class="fa-solid fa-star" onclick="checkRating_recipes(2);"></i>
                <i class="fa-solid fa-star" onclick="checkRating_recipes(3);"></i>
                <i class="fa-solid fa-star" onclick="checkRating_recipes(4);"></i>
                <i class="fa-solid fa-star" onclick="checkRating_recipes(5);"></i>
              </div>
            </div>

            <form class="form2" id="ratingReplyForm_recipes" enctype="multipart/form-data">

              <input type="hidden" id="rating_recipes" name="rating" value="0">
              <input type="hidden" id="flag" name="flag" value="1">
              <input type="hidden" name="rel_id" value="<?php
                                                        if (!empty($currentRecipe->re_id)) {
                                                          echo $currentRecipe->re_id;
                                                        }
                                                        ?>">


              <div class="inputs">
                <div class="main_input1">
                  <!-- <h3>Name*</h3> -->
                  <input type="text" name="name" id="name" value="" placeholder="Name" />
                </div>

                <div class="main_input1">
                  <!-- <h3>Email*</h3> -->
                  <input type="email" name="email" id="email" value="" placeholder="Email" />
                </div>

                <div class="main_input1">
                  <!-- <h3>Mobile</h3> -->
                  <input type="number" name="mob_no" id="mob_no" value="" placeholder="Mobile" />
                </div>

              </div>


              <!-- <div class="website_input">
                <h3>Website</h3>
                <input type="text" name="" value=""  class="website"/>
              </div> -->


              <!-- <div class="inputs">
              <div class="main_input1">
                <h3>Website</h3>
                <input type="text" name="website" value="" />
              </div>

              <div class="main_input1">
                <h3>Profile*</h3>
                <input type="file" name="profile" value="" accept="image/*" />
              </div>

            </div> -->



              <div class="main_input">
                <!-- <h3>
                Your email address will not be published. Required fields
                are marked *
              </h3> -->
                <textarea name="message" id="message" rows="4" placeholder="Comment"></textarea>
              </div>

              <!-- <div class="checkbox1">
                  <input type="checkbox" />
                  <p>
                    Save my name, email, and website in this browser for the
                    next time I comment.
                  </p>
                </div> -->

              <button type="button" id="postCommentRecipe-btn">POST COMMENT</button>
            </form>



            <?php if (!empty($rating_comments)) : ?>
              <div class="all_comments">
                <h2><?= count($rating_comments) ?> COMMENTS</h2>
                <?php foreach ($rating_comments as $val) : ?>
                  <div class="comment">
                    <?php if (!empty($val->profile)) { ?>
                      <div class="com_profile">
                        <!-- <img src="<?php echo base_url(); ?>uploads/profile/<?php $val->profile; ?>" alt="Profile"> -->
                        <img src="<?php echo base_url(); ?>uploads/profile/profile.png" alt="Profile">

                      </div>
                    <?php } else {
                    ?>
                      <div class="com_profile">
                        <img src="<?php echo base_url(); ?>uploads/profile/profile.png" alt="Profile">
                      </div>
                    <?php

                    } ?>
                    <div class="comment_sec">
                      <div class="comment_namedate">
                        <span class="name"><?= $val->name ?></span>
                        <span class="date"><?= date('M d,Y', strtotime($val->timestamp)) ?></span>
                      </div>
                      <?php if (!empty($val->rating)) : ?>
                        <div class="fill_rating">
                          <?php for ($ifill = 0; $ifill < $val->rating; $ifill++) { ?>
                            <i class="fa-solid fa-star"></i>
                          <?php } ?>
                          <?php for ($nofill = $val->rating; $nofill < 5; $nofill++) { ?>
                            <i class="fa-regular fa-star"></i>
                          <?php } ?>
                        </div>
                      <?php endif; ?>
                      <p>
                        <?= $val->message ?>
                      </p>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>




          </div>
      </div>

      <div class="last_details_two details_two">

      


        <div class="main_author_sec">
          <?php
          if (!empty($popular_recipe_reighside)) {
          ?>
            <div class="author">
              <h3>POPULAR RECIPE</h3>
              <div class="author_details1">
                <?php
                $counter = 0;
                foreach ($popular_recipe_reighside as $index => $val) {


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
                        <img src="<?php echo base_url(); ?>uploads/recipes_img/<?php echo $val['re_images']; ?>" alt="<?= !empty($val['img_alt']) ? $val['img_alt'] : ''; ?>">
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
                            echo date('F j, Y', strtotime($val['publish_data']));
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
        </div>


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
                          <!-- <img src="assets/images/categ2.webp" alt="" /> -->

                          <span> <i class="fa-solid fa-tag"></i>
                            <!-- CURRIES  -->
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
          <?php
          }
          ?>
        </div>



      



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
                        <img src="<?php echo base_url(); ?>uploads/blog_img/<?php echo $val['blog_img']; ?>" alt="<?= !empty($val['blog_img_alt']) ? $val['blog_img_alt'] : ''; ?>">
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



<!-- =============================================================================================================================== -->









