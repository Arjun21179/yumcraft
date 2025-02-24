


<script>
      // ----------------------------------------------------------------->
    // Add category success or error toaster msg
    function showToast_success_import() {
        iziToast.success({
            title: "Recipes",
            message: "Import Successfuly.",
            timeout: 3000,
            position: "topRight",
            theme: "black",
            color: "green",

        });
    }

    function showToast_error_import() {

        alert("hello");
        iziToast.error({
            title: "Failed",
            message: "To Import Recipes.",
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





<?php 

session_Start();

if(isset($_SESSION['success_import_data']))
{
    unset($_SESSION['success_import_data']);
    echo "<script> showToast_success_import() </script>";
}


if(isset($_SESSION['error_import_data']))
{
    unset($_SESSION['error_import_data']);
    echo "<script> showToast_error_import </script>";
}
?>




<div class="main_card_effect">
    <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
    <div class="row">
        <div class="col-xl-9">


            <div class="card" style="height:200px;">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Export Recipes</h4>

                    <form method='post' action='export_recipes_date_vise'>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>From</label>
                                    <input type="date" id="from" name="download_from" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>To</label>
                                    <input type="date" id="to" name="download_to" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>&nbsp</label>
                                    <input type="submit" value="Download" class="btn btn-danger btn-block waves-effect waves-light">
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>



            <div class="card" style="height:220px;">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Import Posts</h4>

                    <form action="import_recipes_data" enctype="multipart/form-data" method="post" role="form">
                        <div class="form-group">
                            <label for="exampleInputFile">File Upload</label>
                            <input type="file" name="csv_recipe_file" size="500" required />
                            <p class="help-block">Only Excel - CSV File Import.</p>
                            <p class="help-block"> <a href="download_recipes_csv_format"> Get CSV Format. </a> </p>
                        </div>
                        <div class="text-center m-t-15">
                            <button type="submit" class="btn btn-danger waves-effect waves-light" name="submit" value="submit">Upload Recipes</button>
                        </div>
                    </form>

                </div>
            </div>



        </div>
        <!-- end col -->
    </div>
    <!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->

    <!-- end row -->
</div>