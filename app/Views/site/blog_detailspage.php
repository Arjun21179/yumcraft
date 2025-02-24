<!-- =============================================================================================================================== -->

<section class="detail_page1">
  <div class="container">
    <div class="main_details_divs">
      <div class="last_details_one">
        <div class="col-2">
          <div class="tag_text third_tag">
            <p class="dish_name">
              <?= $blog->blog_name ?>
            </p>

            <a href="blog">
              <i class="fa-solid fa-tag"></i> Blogs
            </a>

            <h4>
              <i><?= date('F j, Y', strtotime($blog->blog_publish_date)) ?></i>
              <!-- -
                            <i class="fa-regular fa-clock"></i>
                            <i> 2 Min Read</i> -->
            </h4>
          </div>

        

          <div class="detail_sideimg">
            <?php if (!empty($blog->blog_img)) {
            ?>
              <img src="<?= (!empty($blog->blog_img)) ? 'uploads/blog_img/' . $blog->blog_img : 'uploads/noimage.jpg' ?>" alt="<?= !empty($blog->blog_img_alt) ? $blog->blog_img_alt : ''; ?>" />
            <?php
            }
            ?>
          </div>
        </div>

        <!-- <a href="#jump_rec" class="jump_rec"><img src="assets/images/down_arrow.svg" alt="" />
                    Jump To Recipe
                </a> -->

        <?= $blog->blog_description ?>



        <?php if (!empty($blog_tags)) : ?>
          <div class="sub_rectags">
            <?php foreach ($blog_tags as $val) : ?>
              <a href="tag/<?= $val['tag_url'] ?>"><?= $val['tag_name'] ?></a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>







        <!-- ---Faq Section Blog  -->
        <?php if(!empty($faq_blog_data_single_blog)) { ?>
          <div class="Gain detail_faq">

              <h2>FAQ</h2>
              <?php foreach($faq_blog_data_single_blog as $val) { ?>
              <div class="imgcontaint">

                <div class="accordions">

                  <button type="button" class="accordion">
                    <!-- Are all recipes on  suitable for people with food allergies? -->
                     <?= $val['faq_blog_question'] ?>
                  </button>
                  <div class="panel">
                    <ul>
                      <li>
                        <p>
                          <!-- Yes, all our recipes are carefully crafted to be allergy-friendly, ensuring they are safe for
                          individuals with various food allergies. -->
                     <?= $val['faq_blog_answer'] ?>

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








        <div class="prev_next">
          <?php if (!empty($previousBlog->blog_url)) { ?>
            <a href="blog/<?php echo $previousBlog->blog_url;  ?>">
              <div class="prev">
                <i class="fa-solid fa-arrow-left"></i>
                previous <br />
              </div>
            </a>
          <?php } ?>

          <?php if (!empty($nextBlog->blog_url)) { ?>
            <a href="blog/<?php echo $nextBlog->blog_url;  ?>">
              <div class="next">
                next
                <i class="fa-solid fa-arrow-right"></i> <br />
              </div>
            </a>
          <?php } ?>
        </div>

        <div class="vegan">
          <?php if (!empty($previousBlog->blog_url)) { ?>
            <a href="blog/<?php echo $previousBlog->blog_url;  ?>" class="prev_rec">
              <?php echo $previousBlog->blog_name;  ?></a>
            <!-- <p>|</p> -->
          <?php }
          if (!empty($nextBlog->blog_url)) { ?>
            <a href="blog/<?php echo $nextBlog->blog_url;  ?>">
              <?php echo $nextBlog->blog_name;  ?></a>
          <?php } ?>
        </div>





        <div class="border"></div>




        <?php if (!empty($random_blog)) { ?>
          <div class="main_youmay_alsolike">
            <h2>You may also like</h2>

            <div class="col_alsolike">
              <?php foreach ($random_blog as $val) : ?>
                <div class="related">
                  <div class="related_img">
                    <a href="blog/<?= $val['blog_url'] ?>">
                      <!-- <img src="assets/images/related2.webp" alt="" /> -->
                      <img src="<?= (!empty($val->blog_img)) ? 'uploads/blog_img/' . $val->blog_img : 'uploads/noimage.jpg' ?>" alt="<?= !empty($val->blog_img_alt) ? $val->blog_img_alt : ''; ?>" />
                    </a>
                  </div>
                  <a href="blog/<?= $val['blog_url'] ?>" class="description">
                    <?= $val['blog_name'] ?>
                  </a>
                </div>
              <?php endforeach; ?>
            </div>

          </div>
        <?php } ?>
        <!-- <div class="detail_form">

              <h1>Subscribe to my Newsletter</h1>
              <p>  We'll keep you posted with news and updates!</p>

              <form class='form1'>
              <div class='input'>
              <input type="text" placeholder="Email id" name="" value="">

              <button>SUBMIT</button>
              </div>
              </form>

            </div> -->






        <!-- <div class="subscript">
                    <div class="subcr_logo">
                    </div>

                    <div class="subcr_detail">
                        <h2>Subscribe to the newsletter!</h2>
                        <p>
                            Sign up to get access to my creative community and get updates about new articles, videos, workshops and
                            information about new products and exclusive offers!
                        </p>

                        <form id="subscriber_form_frontend_recipes" method="post">

                            <input type="hidden" id="flag" name="flag" value="2">
                            <input type="hidden" name="blog_id" value="<?php
                                                                        if (!empty($blog->blog_id)) {
                                                                          echo $blog->blog_id;
                                                                        }
                                                                        ?>">


                            <div class="input_field">
                                <input type="email" name="email" id="email" value="" placeholder="Your Email..." />
                            </div>

                         

                            <button id="subscriber_btn_frontend_recipes">Subscriber</button>
                        </form>
                    </div>
                </div> -->

        <!-- <div class="rating">
              <h3>How Would You Rate Biryani?</h3>

            

              <div class="rating-box">
                <div class="stars">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                </div>
              </div>

              <button>Submit Rating</button>
            </div> -->

        <div class="detail_last_form">
          <h2>Leave a Reply</h2>

          <div class="rating-box">
            <h3>Blog Rating</h3>
            <div class="stars">
              <i class="fa-solid fa-star" onclick="checkRating(1);"></i>
              <i class="fa-solid fa-star" onclick="checkRating(2);"></i>
              <i class="fa-solid fa-star" onclick="checkRating(3);"></i>
              <i class="fa-solid fa-star" onclick="checkRating(4);"></i>
              <i class="fa-solid fa-star" onclick="checkRating(5);"></i>
            </div>
          </div>

          <form class="form2" id="ratingReplyForm" enctype="multipart/form-data">
            <input type="hidden" id="rating" name="rating" value="0">
            <input type="hidden" id="flag" name="flag" value="2">
            <input type="hidden" name="rel_id" value="<?= $blog->blog_id ?>">

            <div class="inputs">
              <div class="main_input1">
                <h3>Name*</h3>
                <input type="text" name="name" value="" placeholder="Enter Your Name" />
              </div>

              <div class="main_input1">
                <h3>Email*</h3>
                <input type="email" name="email" value="" placeholder="Enter Your Email Id" />
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
                                <input type="file" name="profile" >
                            </div>

                        </div> -->

            <div class="main_input">
              <h3>
                Your email address will not be published. Required fields
                are marked *
              </h3>
              <textarea name="message" id="" rows="3" placeholder="Enter The Message"></textarea>
            </div>

            <!-- <div class="checkbox1">
                  <input type="checkbox" />
                  <p>
                    Save my name, email, and website in this browser for the
                    next time I comment.
                  </p>
                </div> -->

            <button type="button" id="postComment-btn">POST COMMENT</button>
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
            <h3>SUBSCRIBE NEWSLETTER</h3>

            <div class="author_details2 ">
              <div class="newsletter_btn">
                <a href="subscriber-newsletter">
                  Subscribe Newsletter
                </a>
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
                foreach ($category_data as $index=>$val) {

                  if($index < 3){

                ?>
                  <div class="catagary">
                    <a href="recipe/<?php echo $val['c_url']; ?>">
                      <div>

                        <span> <i class="fa-solid fa-tag"></i>
                          <?php echo $val['c_name']; ?>
                        </span>

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





<!-- ========================================================================================================================================================= -->

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