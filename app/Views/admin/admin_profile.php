
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<!-- toaster message  -->


<script>

    // ----------------------------------------------------------------->
    // Add recipe success or error toaster msg
    function showToast_success_profile_update() {
        iziToast.success({
            title: "Update",
            message: "Data Successfuly.",
            timeout: 3000,
            position: "topRight",
            theme: "black",
            color: "green",

        });
    }

    function showToast_error_profile_update() {
        iziToast.error({
            title: "Failed",
            message: "To Update Data.",
            timeout: 3000,
            position: "topRight",
            theme: "black",
            color: "red",
            backgroundColor: "#ff0000",
            messageColor: "white",
            titleColor: "white",
            progressBarColor: 'black',

        });
    }

</script>

    // <!-- Delete All Records emails -->
<?php

// --------------------------------------------------------->
// add recipe success or error
session_start();
if (isset($_SESSION['success_profile_update'])) {
    unset($_SESSION['success_profile_update']);
    echo "<script> showToast_success_profile_update() </script>";
}

if (isset($_SESSION['error_profile_update'])) {
    unset($_SESSION['error_profile_update']);
    echo "<script> showToast_error_profile_update() </script>";
}


?>



<div class="card" style="width:50rem;margin-left:50px;margin-top:100px;">
    <div class="card-body">
    <h4 class="mt-0 header-title">Admin Profile Details</h4>

        <div class="p-3">
            <form action="<?php echo base_url(); ?>admin_profile_update" method="post" class="form-horizontal m-t-10">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="name" class="form-control" name="name" id="name"
                        value="<?php echo $profile['name'] ?>">
                </div>

                <div class="form-group">
                    <label for="email">Username</label>
                    <input type="email" class="form-control" name="email" id="email"
                        value="<?php echo $profile['email'] ?>">
                </div>

                <!-- <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username"
                        value="<?php 
                        // echo $profile['username'] 
                        ?>
                        ">
                </div> -->

                <div class="form-group row m-t-20">
                    <div class="col-12 text-right">
                        <input type="hidden" name="id" value="<?php echo $profile['id'] ?>">

                        <button class="btn btn-success btn-lg" type="submit">
                            Edit
                        </button>

                        <!-- <a href="admin_logout">
                            <button class="btn btn-primary">
                                logout
                            </button>
                        </a> -->

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



</body>

</html>