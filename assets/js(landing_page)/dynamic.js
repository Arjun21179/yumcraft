// alert("test");



$(document).ready(function() {


    // console.log('test_console');

    $("#landing_page_form").validate({

        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            // city: {
            //     required: true,
            // },
            // state: {
            //     required: true,
            // },
            // country: {
            //     required: true,
            // },

        },
        messages: {
            name: {
                required: "*Please Enter Name",
            },
            email: {
                required: "*Please Enter Email.",
                email: "*Please enter a valid email address"
            }
            // city: {
            //     required: "*Please Enter City",
            // },
            // state: {
            //     required: "*Please Enter State",
            // },
            // country: {
            //     required: "*Please Enter Country",
            // },
        }
    });

});




// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// insert Form
document.addEventListener('DOMContentLoaded', function() {

    var button = document.getElementById('landing_form_btn');

    if (button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();

            if ($("#landing_page_form").valid()) {
                // console.log('valid');
                // return;

                $.ajax({
                    url: "sendEmail_logic",
                    type: 'post',
                    data: new FormData(document.getElementById('landing_page_form')),
                    contentType: false,
                    processData: false,
                    success: function(response) {

                        // console.log(response);
                        // return;

                        if (response == 1) {
                            // remove the input values

                            // console.log('test_console');
                            // return;


                            // sweet alert 
                            Swal.fire({
                                title: "Thank you!",
                                text: "We will get back to you shortly.",
                                icon: "success"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Reset the form after the user clicks "OK"
                                    document.getElementById('landing_page_form').reset();
                                }
                            });


                            return;

                            // base url logic
                            let baseUrl = window.location.protocol + "//" + window.location.hostname;

                            // console.log(baseUrl);
                            // return;
                            window.location.href = baseUrl + '/thank-you.php';


                        } else {
                            Swal.fire({
                                title: "Something wrong",
                                text: "Please try again.",
                                icon: "error"
                            });
                        }


                    },
                    error: function() {
                        console.log('error');
                    }
                });
            }
        })
    }

});