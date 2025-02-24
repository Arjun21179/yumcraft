<div class="main_card_effect">
    <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
    <div class="row">
        <div class="col-xl-9">
            <div class="card" style="height:auto;">
                <div class="card-body">

                    <!-- table tag -->


                    <h4 class="mt-0 header-title">Contact List</h4>

                    <div class="row mt-4">
                        <div class="col-lg-6">
                            <button class="btn-danger btn-lg m-b-15" id="delete_contactus_data_button"> Delete Data </button>
                        </div>


                        <div class="col-lg-6 text-right">
                            <a href="excel_download_contact">
                                <button class="btn btn-info m-b-5 btn-lg">
                                    Excel
                                </button>
                            </a>
                        </div>
                    </div>


                    <div class="table-responsive">
                        <table id="contact_list" class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th scope="col"><input type="checkbox" id="masterCheckbox"></th>
                                    <th scope="col">Sr No</th>
                                    <th scope="col">Name </th>
                                    <th scope="col">Email Id</th>
                                    <!-- <th scope="col">Mobile No </th> -->
                                    <th scope="col">Subject </th>
                                    <th scope="col">Message </th>
                                    <th scope="col">Updates Permission </th>
                                    <th scope="col">Date </th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($contact_desending)) {
                                    $i = 0;
                                    foreach ($contact_desending as $val) {
                                        $i = $i + 1;
                                ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="childCheckbox" name="active_checkbox[]" value="<?php echo $val['contact_id']; ?>">
                                            </td>

                                            <td class="sr-no">
                                                <?php echo $i; ?>
                                            </td>
                                            <td>
                                                <div>
                                                    <?php echo $val['contact_name']; ?>
                                                </div>
                                            </td>

                                            <td>
                                                <div>
                                                    <?php echo $val['contact_email']; ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <?php echo $val['subject']; ?>
                                                </div>
                                            </td>

                                            <td>
                                                <div>
                                                    <?php echo $val['contact_msg']; ?>
                                                    <!-- class="summernote" -->
                                                </div>
                                            </td>

                                            <td>
                                                <div>
                                                    <?php
                                                    if ($val['permission'] == 1) {
                                                        echo "Yes";
                                                    } else {
                                                        echo "No";
                                                    }
                                                    ?>
                                                </div>
                                            </td>

                                            <td>
                                                <div>
                                                    <?php echo date('d-m-Y', strtotime($val['timestamp'])); ?>
                                                </div>
                                            </td>

                                            <td>
                                                <div>
                                                    <!-- <a href="<?php echo base_url(); ?>edit_subscriber_view/">
                                                        <i class="mdi mdi-pencil" style="font-size:18px;"></i>
                                                    </a> -->

                                                    <a onclick="contact_delete(<?php echo $val['contact_id']; ?>,this)">
                                                        <i class="mdi mdi-delete" style="font-size:18px;cursor:pointer;"></i>
                                                    </a>

                                                    <!-- <a data-toggle="modal"
                                                        data-target="#add_contactus_modal<?php echo $val['contact_id'] ?>">
                                                        <i class="mdi mdi-eye" style="font-size:18px;cursor:pointer;"></i>
                                                    </a> -->


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