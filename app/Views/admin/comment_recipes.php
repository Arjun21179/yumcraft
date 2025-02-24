<div class="main_card_effect">
    <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
    <div class="row">
        <div class="col-xl-9">
            <div class="card" style="height:auto;">
                <div class="card-body">

                    <!-- table tag -->


                    <h4 class="mt-0 header-title">Recipe Comment List</h4>

                    <div class="row">
                        <div class="col-lg-6">
                            <button class="btn-danger btn-lg" id="delete_commentsreicpe_data_button"> Delete Data </button>
                        </div>
                    </div>

                    <div class="table-responsive" style="margin-top:40px;">
                        <table id="comment_list" class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th scope="col"><input type="checkbox" id="masterCheckbox"></th>
                                    <th scope="col">Sr No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Rating</th>
                                    <th scope="col"> Users Comment</th>
                                    <th scope="col">Publish Date</th>
                                    <th scope="col">Comment Hide/Show</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($comment_recipe_data)) {
                                    $i = 0;
                                    foreach ($comment_recipe_data as $val) {
                                        $i = $i + 1;
                                ?>

                                        <tr>
                                            <td>
                                                <input type="checkbox" class="childCheckbox" name="active_checkox[]" value="<?php echo $val['lead_id']; ?>">
                                            </td>

                                            <td class="sr-no">
                                                <?php echo $i; ?>
                                            </td>

                                            <td>
                                                <?php echo $val['name']; ?>
                                            </td>

                                            <td>
                                                <?php echo $val['email']; ?>
                                            </td>

                                            <td>
                                                <?php
                                                // if (!empty($recipe_details)) {
                                                //     foreach ($recipe_details as $recipe_val) {
                                                //         if ($recipe_val['re_id'] == $val['rel_id']) {
                                                //             echo $recipe_val['re_title'];
                                                //         }
                                                //     }
                                                // }
                                                ?>
                                                <?php if (!empty($val['rating'])) : ?>
                                                    <div class="fill_rating">
                                                        <?php for ($ifill = 0; $ifill < $val['rating']; $ifill++) { ?>
                                                            <i class="fa-solid fa-star"></i>
                                                        <?php } ?>
                                                        <?php for ($nofill = $val['rating']; $nofill < 5; $nofill++) { ?>
                                                            <i class="fa-regular fa-star"></i>
                                                        <?php } ?>
                                                    </div>
                                                <?php endif; ?>

                                            </td>


                                            <td>
                                                <?php echo $val['message']; ?>
                                            </td>


                                            <td>
                                                <?php echo date('d-m-Y', strtotime($val['timestamp'])); ?>
                                            </td>


                                            <td>
                                                <?php if ($val['active'] == 0) { ?>
                                                    <a onclick="comment_recipe_active(<?php echo $val['lead_id']; ?>,this)" class="check_deactive" style="cursor:pointer;">
                                                        <i class="fas fa-toggle-off" aria-hidden="true" style="margin-top:8px;font-size:20px;margin-left:20px;"></i>
                                                    </a>
                                                <?php } else { ?>
                                                    <a onclick="comment_recipe_deactive(<?php echo $val['lead_id']; ?>,this)" class="check_deactive" style="cursor:pointer;">
                                                        <i class="fas fa-toggle-on" aria-hidden="true" style="margin-top:8px;font-size:20px;margin-left:20px;"></i>
                                                    </a>
                                                <?php } ?>
                                            </td>


                                            <td>
                                                <div>
                                                    <a href="recipe/<?php
                                                                if (!empty($recipe_details)) {
                                                                    foreach ($recipe_details as $recipe_val) {
                                                                        if ($recipe_val['re_id'] == $val['rel_id']) {
                                                                            echo $recipe_val['re_titleurl'];
                                                                        }
                                                                    }
                                                                }
                                                                ?>" target="_blank"><i class="fa-solid fa-eye" style="color:black;margin-top:8px;"></i></a>



                                                    <a onclick="comments_recipe_delete(<?php echo $val['lead_id']; ?>,this)">
                                                        <i class="mdi mdi-delete" style="font-size:18px;cursor:pointer;margin-left:8px;"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- table tag -->

                </div>
            </div>
        </div>
        <!-- end col -->

    </div>
    <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->

    <!-- end row -->
</div>