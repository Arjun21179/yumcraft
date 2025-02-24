// alert("test");

var base_url = document.getElementById("base_url").value;

// console.log(base_url);

// jquery validation
// xxxxxxxxxxxx All forms validation here Form xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// xxxxxxxxxxxx All forms validation here Form xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// xxxxxxxxxxxx All forms validation here Form xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// validation contact us form
// insert contact form

// ----------validation page
$(document).ready(function() {
    // ------ Contact Us Form Validation ---------------------------------------------------->
    // Contact form validation
    $("#contact_us_form_validation").validate({
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
            },
            // subject: {
            //     required: true
            // },
            // message: {
            //     required: true,
            // }
        },

        messages: {
            name: {
                required: "*Name is required.",
            },
            email: {
                required: "*Email is required.",
                email: "Please enter a valid email address",
            },
            // subject: {
            //     required: "Please select a subject."
            // },
            // message: {
            //     required: "*Message is required.",
            // },
        },
    });

    // ------ Subscriber Form Validation Recipes ---------------------------------------------------->
    // subscriber form validation
    $("#subscriber_form_frontend_recipes").validate({
        rules: {
            email: {
                required: true,
            },
            // receiving_ads_permission: {
            //     required: true,
            // }
        },
        messages: {
            email: {
                required: "*Email is required.",
                email: "Please enter a valid email address",
            },
            // receiving_ads_permission: {
            //     required: "*Please accept",
            // },
        },
    });

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // ------ Blog Subscriber Form Validation Blog ---------------------------------------------------->
    // subscriber form validation
    $("#subscriber_form_frontend_blog").validate({
        rules: {
            email: {
                required: true,
            },
            receiving_ads_permission: {
                required: true,
            },
        },
        messages: {
            email: {
                required: "*Email is required.",
                email: "Please enter a valid email address",
            },
            receiving_ads_permission: {
                required: "*Please accept",
            },
        },
    });

    // // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // // subscriber_newsletter_form

    // $("#subscriber_newsletter_form").validate({
    //     rules: {
    //         name: {
    //             required: true,
    //         },
    //         email: {
    //             required: true,
    //             email: true
    //         },
    //         city: {
    //             required: true,
    //         },
    //         state: {
    //             required: true,
    //         },
    //         country: {
    //             required: true,
    //         },

    //     },
    //     messages: {
    //         name: {
    //             required: "*Please Enter Name",
    //         },
    //         email: {
    //             required: "*Please Enter Email.",
    //             email: "*Please enter a valid email address"
    //         },
    //         city: {
    //             required: "*Please Enter City",
    //         },
    //         state: {
    //             required: "*Please Enter State",
    //         },
    //         country: {
    //             required: "*Please Enter Country",
    //         },
    //     }
    // });

    // $('#subscribe_newsletter_form_btn').click(function(e) {
    //     e.preventDefault();

    //     if ($('#subscriber_newsletter_form').valid()) {
    //         console.log("valid");

    //         $.ajax({
    //             url: base_url + 'subscriber_newsletter_insert',
    //             type: 'post',
    //             data: new FormData(document.getElementById('subscriber_newsletter_form')),
    //             contentType: false,
    //             processData: false,
    //             success: function(response) {
    //                 // console.log(response);

    //                 Swal.fire({
    //                     title: "Thank you!",
    //                     text: "We will get back to you shortly.",
    //                     icon: "success",
    //                     confirmButtonText: "OK"
    //                 }).then(function() {
    //                     // Reset the form fields
    //                     document.getElementById('subscriber_newsletter_form').reset();
    //                 });

    //             },
    //             error: function() {
    //                 // console.log('error');

    //                 Swal.fire({
    //                     title: "Something wrong",
    //                     text: "Please try again.",
    //                     icon: "error"
    //                 });
    //             }

    //         });
    //     }

    // });

    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // ------ Recipes rating Form Validation Recipes ---------------------------------------------------->
    // rating and comment form validation
    $("#ratingReplyForm_recipes").validate({
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            mob_no: {
                required: true,
            },
            // message: {
            //     required: true,
            // },
        },
        messages: {
            name: {
                required: "*Please fill in your name",
            },
            email: {
                required: "*Email is required",
                email: "*Please enter a valid email address",
            },
            mob_no: {
                required: "*Please enter mobile number",
            },
            // message: {
            //     required: "*Please enter your comment"
            // }
        },
    });

    // -------------------------------------->
    //  recipes comment & rating insert comment form also rating
    $("#postCommentRecipe-btn").click(function(e) {
        e.preventDefault();
        if ($("#ratingReplyForm_recipes").valid()) {
            console.log("valid");
            $.ajax({
                url: base_url + "rating-lead",
                type: "post",
                data: new FormData(document.getElementById("ratingReplyForm_recipes")),
                contentType: false,
                processData: false,
                success: function(response) {
                    // console.log(response);
                    if (response.result == 1) {
                        // sweet alert
                        Swal.fire({
                            title: "Thank you!",
                            text: "We will get back to you shortly.",
                            icon: "success",
                        }).then(function() {
                            // Reset the form fields
                            document.getElementById("ratingReplyForm_recipes").reset();
                        });
                    } else {
                        Swal.fire({
                            title: "Something wrong",
                            text: "Please try again.",
                            icon: "error",
                        });
                    }
                },
                error: function() {
                    console.log("error");
                    Swal.fire({
                        title: "Something wrong",
                        text: "Please try again.",
                        icon: "error",
                    });
                },
            });
        } else {
            console.log("Invalid");
        }
    });
});

function checkRating_recipes(id) {
    // console.log(id);

    var form = document.getElementById("ratingReplyForm_recipes");

    var input = form.querySelector("#rating_recipes");

    input.value = id;
}

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// ------ Blog rating Form Validation Blog ---------------------------------------------------->
// rating and comment form validation
$("#ratingReplyForm").validate({
    rules: {
        name: {
            required: true,
        },
        email: {
            required: true,
            email: true,
        },
        profile: {
            required: true,
        },
    },
    messages: {
        name: {
            required: "*Please fill name",
        },
        email: {
            required: "*Email is required.",
            email: "*Please enter a valid email address",
        },
        profile: {
            required: "*Please upload profile",
        },
    },
});

// -------------------------------------->
// insert comment form also rating
$("#postComment-btn").click(function(e) {
    e.preventDefault();
    if ($("#ratingReplyForm").valid()) {
        // console.log('valid');

        $.ajax({
            url: base_url + "rating-lead",
            type: "post",
            data: new FormData(document.getElementById("ratingReplyForm")),
            contentType: false,
            processData: false,
            success: function(response) {
                // console.log(response);
                // return;

                if (response.result == 1) {
                    // sweet alert
                    Swal.fire({
                        title: "Thank you!",
                        text: "We will get back to you shortly.",
                        icon: "success",
                    }).then(function() {
                        // Reset the form fields
                        document.getElementById("ratingReplyForm").reset();
                    });
                } else {
                    Swal.fire({
                        title: "Something wrong",
                        text: "Please try again.",
                        icon: "error",
                    });
                }
            },
            error: function() {
                console.log("error");
                Swal.fire({
                    title: "Something wrong",
                    text: "Please try again.",
                    icon: "error",
                });
            },
        });
    } else {
        console.log("Fill The Data");
    }
});

function checkRating(id) {
    // console.log(id);

    var form = document.getElementById("ratingReplyForm");

    var input = form.querySelector("#rating");

    input.value = id;
}

// xxxxxxxxxxxx Contact Us Form xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// ---------------------------->
// insert contact form
document.addEventListener("DOMContentLoaded", function() {
    var button = document.getElementById("contactus_form_btn");
    if (button) {
        button.addEventListener("click", function(event) {
            event.preventDefault();

            if ($("#contact_us_form_validation").valid()) {
                // alert("hello");
                // return;

                $.ajax({
                    url: base_url + "contact_insert",
                    type: "post",
                    data: new FormData(
                        document.getElementById("contact_us_form_validation")
                    ),
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // console.log(response);
                        // return;

                        if (response.result == 1) {
                            // sweet alert
                            Swal.fire({
                                title: "Thank you!",
                                text: "We will get back to you shortly.",
                                icon: "success",
                            }).then(function() {
                                // Reset the form fields
                                document.getElementById("contact_us_form_validation").reset();
                            });
                        } else {
                            Swal.fire({
                                title: "Something wrong",
                                text: "Please try again.",
                                icon: "error",
                            });
                        }
                    },
                    error: function() {
                        console.log("error");
                        Swal.fire({
                            title: "Something wrong",
                            text: "Please try again.",
                            icon: "error",
                        });
                    },
                });
            }
        });
    }
});

// xxxxxxxxxxxx  Recipe subscriber insert Forms xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// insert subscriber form
// ---------------------------->
// insert subscriber form

document.addEventListener("DOMContentLoaded", function() {
    var button = document.getElementById("subscriber_btn_frontend_recipes");
    if (button) {
        button.addEventListener("click", function(event) {
            event.preventDefault();

            if ($("#subscriber_form_frontend_recipes").valid()) {
                // alert("test 1 ");
                // return;

                $.ajax({
                    url: base_url + "subscriber_insert_for_recipe_blog",
                    type: "post",
                    data: new FormData(
                        document.getElementById("subscriber_form_frontend_recipes")
                    ),
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // console.log(response);
                        // return;

                        if (response.result == 1) {
                            // sweet alert
                            Swal.fire({
                                title: "Thank you!",
                                text: "We will get back to you shortly.",
                                icon: "success",
                            }).then(function() {
                                // Reset the form fields
                                document
                                    .getElementById("subscriber_form_frontend_recipes")
                                    .reset();
                            });
                        } else {
                            Swal.fire({
                                title: "Something wrong",
                                text: "Please try again.",
                                icon: "error",
                            });
                        }
                    },
                    error: function() {
                        console.log("error");
                        Swal.fire({
                            title: "Something wrong",
                            text: "Please try again.",
                            icon: "error",
                        });
                    },
                });
            }
        });
    }
});

// xxxxxxxxxxxx  Blog subscriber insert Forms xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// insert subscriber form
// ---------------------------->
document.addEventListener("DOMContentLoaded", function() {
    var button = document.getElementById("subscriber_btn_frontend_blog");
    if (button) {
        button.addEventListener("click", function(event) {
            event.preventDefault();

            if ($("#subscriber_form_frontend_blog").valid()) {
                // alert("test 1 ");
                // return;

                $.ajax({
                    url: base_url + "subscriber_insert_for_recipe_blog",
                    type: "post",
                    data: new FormData(
                        document.getElementById("subscriber_form_frontend_blog")
                    ),
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // console.log(response);
                        // return;

                        if (response.result == 1) {
                            // sweet alert
                            Swal.fire({
                                title: "Thank you!",
                                text: "We will get back to you shortly.",
                                icon: "success",
                            }).then(function() {
                                // Reset the form fields
                                document
                                    .getElementById("subscriber_form_frontend_blog")
                                    .reset();
                            });
                        } else {
                            Swal.fire({
                                title: "Something wrong",
                                text: "Please try again.",
                                icon: "error",
                            });
                        }
                    },
                    error: function() {
                        console.log("error");
                        Swal.fire({
                            title: "Something wrong",
                            text: "Please try again.",
                            icon: "error",
                        });
                    },
                });
            }
        });
    }
});

// xxxXXXXXXXXXXXXXXxxx SEARCH LOGIC XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// search logic
$(document).ready(function() {
    // hide card
    $(".search_section").hide();

    $("#popup").on("input", function() {
        var search_item = $(this).val();

        // console.log(search_item);

        $.ajax({
            url: base_url + "search-data",
            method: "post",
            data: { search_item: search_item },
            dataType: "json",
            success: function(response) {
                // console.log(response);

                var resultsList = $("#searchResults");
                resultsList.empty();

                if (response.results) {
                    var i;
                    for (i = 0; i < response.results.length; i++) {
                        $(".search_section").show();

                        resultsList.append(
                            `
                                        <a href="` +
                            base_url +
                            `recipe/` +
                            response.results[i].re_titleurl +
                            `" style="color:black;">
                                            <div style="padding: 10px;cursor:pointer;">
                                            <span>` +
                            response.results[i].re_title +
                            `</span>
                                            </div>
                                        </a>
                                        `
                        );
                    }
                } else {
                    console.log("else conditioon error");
                }
            },
            error: function() {
                console.log("error");
            },
        });
    });

    // set input value for action
    $("#searchResults").on("click", "span", function() {
        // Set the value of the search input to the clicked result
        $("#popup").val($(this).text());

        // hide card
        $(".search_section").hide();
        // console.log($("#searchInput").val($(this).text()));
    });
});








// xxxxxxxx  Jump TO target  Id xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

// function scrollToRecipe() {
//     const recipeSection = document.getElementById("test");
//     if (recipeSection) {
//         recipeSection.scrollIntoView({
//             behavior: 'smooth', // Smooth scrolling effect
//             block: 'start' // Scroll to the start of the section
//         });
//     }
// }

function scrollToRecipe() {
    const recipeSection = document.getElementById("test");
    if (recipeSection) {
        // Get the position of the section and subtract an offset (e.g., 100px for fixed header)
        const offset = 100;
        const sectionPosition =
            recipeSection.getBoundingClientRect().top + window.scrollY - offset;

        // Scroll to the calculated position
        window.scrollTo({
            top: sectionPosition,
            behavior: "smooth",
        });
    }
}










// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// xxxxxxxxx  Sitemap Data Function call Automatic code xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

function call_sitemap() {
    // alert('test');
    // return;

    fetch(base_url + "sitemap.xml", {
            method: "GET",
            headers: {
                Accept: "application/xml", // Expect XML response
            },
        })
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.text(); // Since the response is XML, use response.text()
        })
        .then((data) => {
            console.log("Update Sitemap File Sucess");
            // alert('10 seconds complete');
            // console.log(data); // Log the XML data if needed
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}

// set shedule function
function scheduleFixIt(hour, minute) {
    const now = new Date();
    const nextCall = new Date();

    nextCall.setHours(hour, minute, 0, 0); // set to the target time

    // If the target time has already passed today, schedule for tomorrow
    if (now > nextCall) {
        nextCall.setDate(now.getDate() + 1);
    }

    const timeUntilNextCall = nextCall - now;

    // Set a timeout to call fixIt at the next target time
    setTimeout(function() {
        call_sitemap();

        // Schedule the fixIt function to be called every 24 hours from now
        setInterval(call_sitemap, 24 * 60 * 60 * 1000);

        // const oneWeekInMilliseconds = 10000; // 20000 milliseconds = 20 seconds
    }, timeUntilNextCall);
}

scheduleFixIt(8, 0); // 8:00 AM
scheduleFixIt(20, 0); // 8:00 Pm