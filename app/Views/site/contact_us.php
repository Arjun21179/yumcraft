<section class="detail_page1">
  <div class="container">
    <div class="main_details_divs">
      <div class="last_details_one">




        <!-- <section class="contact_sec"> -->

        <div class="container">

          <h2 class="contact_heading">We're Here to Help! </h2>
          <p class="contact_discover">Have Questions or Need Support? Reach Out to yumcraft Today!</p>

          <p class="discover">Whether you have a question about our recipes, need guidance on managing food allergies, or want to share your experience, we’re here to listen. At yumcraft, our mission is to support you on your allergen-free journey.</p>

          <a href="contact" id="contact_us_form">Contact Us Now</a>


          <form id="contact_us_form_validation" method="post" class="contact_form">

            <h1>Get in Touch</h1>
            <div class='field'>
              <label for=""> Name </label>
              <input type="text" name="name" id="name" value="">
            </div>

            <div class='field'>
              <label for=""> Email Id
              </label>
              <input type="text" name="email" id="email" value="">
            </div>

            <!-- <div class='field'>
                            <label for=""> Mobile No </label>
                            <input type="text" name="mob_no" id="mob_no" value="">
                        </div> -->

            <div class='field'>
              <label for=""> Subject </label>
              <select name="subject" id="subject">
                <option value="" selected disabled>Select The Option</option>
                <option value="general inquiry">General Inquiry</option>
                <option value="recipe question">Recipe Question</option>
                <option value="consultation request">Consultation Request</option>
                <option value="feedback">Feedback</option>
              </select>
            </div>

            <div class='field'>
              <label for=""> Message </label>
              <textarea name="message" id="message" row="2"></textarea>
            </div>

            <div class='field checkbox_input'>
              <input type="checkbox" id="checkbox" name="permission" value="1">
              <label for="vehicle1"> I would like to receive updates and tips from yumcraft.</label><br>
            </div>

            <button id="contactus_form_btn">Send Message</button>

          </form>

        </div>


       


      </div>







      <div class="last_details_two details_two">




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
                      <img src="<?php echo base_url(); ?>uploads/recipes_img/<?php echo $val['re_images']; ?>" alt="">

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
                        <img src="<?php echo base_url(); ?>uploads/blog_img/<?php echo $val['blog_img']; ?>" alt="">
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