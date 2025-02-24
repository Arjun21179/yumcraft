// first banner carousal

$(".banner").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    // infinite: false,
    fade: true,
    autoplay: true,
    autoplaySpeed: 4000,
    infinite: true,
    speed: 420,
    arrows: false,
    // prevArrow:
    //   '<button class="slick-arrow slick-prev"><img src="asset/imgs/left_arrow.png"></button>',
    // nextArrow:
    //   '<button class="slick-arrow slick-next"><img src="asset/imgs/right_arrow.png"></button>',
    responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: true,
            },
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
            },
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
            },
        },
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ],
});





//   =============================================================================================================================================



// youtube videos carousal

$(".main_youtube_videos").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: true,
    // infinite: false,
    speed: 300,
    autoplay: true,
    arrows: false,
    // prevArrow:
    //   '<button class="slick-arrow slick-prev"><img src="assets/images/left.svg"></button>',
    // nextArrow:
    //   '<button class="slick-arrow slick-next"><img src="assets/images/right.svg"></button>',
    responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: true,
            },
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,

            },
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,

            },
        },
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ],
});







//   ======================================================================================================================================================





// home page catagories

$(".main_racepies").slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    dots: false,
    // infinite: false,
    speed: 250,
    autoplay: true,
    arrows: true,
    prevArrow: '<button class="slick-arrow slick-prev"><img src="assets/images/left.svg"></button>',
    nextArrow: '<button class="slick-arrow slick-next"><img src="assets/images/right.svg"></button>',
    responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                // dots: true,
                arrows: true,
            },
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                // dots: true,
                arrows: true,
            },
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                // dots: true,
                arrows: true,
            },
        },
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ],
});



//   ======================================================================================================================================================


// allergy free recips section

// $(".findrecipe_for").slick({
//   slidesToShow: 5,
//   slidesToScroll: 1,
//   dots: true,
//   infinite: false,
//   speed: 250,
//   autoplay: true,
//   // arrows: true,
//   // prevArrow:
//   //   '<button class="slick-arrow slick-prev"><img src="assets/images/left.svg"></button>',
//   // nextArrow:
//   //  '<button class="slick-arrow slick-next"><img src="assets/images/right.svg"></button>',
//   responsive: [
//     {
//       breakpoint: 1024,
//       settings: {
//         slidesToShow: 1,
//         slidesToScroll: 1,
//         infinite: true,
//         dots: false,
//       },
//     },
//     {
//       breakpoint: 600,
//       settings: {
//         slidesToShow: 1,
//         slidesToScroll: 1,
//         dots: false,
//       },
//     },
//     {
//       breakpoint: 480,
//       settings: {
//         slidesToShow: 1,
//         slidesToScroll: 1,
//         dots: false,
//       },
//     },
//     // You can unslick at a given breakpoint now by adding:
//     // settings: "unslick"
//     // instead of a settings object
//   ],
// });













//   ======================================================================================================================================================


// Delights section slider

$(".simple_delight").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: true,
    // infinite: false,
    speed: 250,
    autoplay: true,
    arrows: false,
    // prevArrow:
    //   '<button class="slick-arrow slick-prev"><img src="assets/images/left.svg"></button>',
    // nextArrow:
    //  '<button class="slick-arrow slick-next"><img src="assets/images/right.svg"></button>',
    responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                // dots: false,
            },
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                // dots: false,
            },
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                // dots: false,
            },
        },
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ],
});





//   ======================================================================================================================================================





// detail page slider (you may also like)

$(".col_alsolike").slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    dots: true,
    // infinite: false,
    speed: 300,
    autoplay: true,
    arrows: false,
    // prevArrow:
    //   '<button class="slick-arrow slick-prev"><img src="assets/images/left.svg"></button>',
    // nextArrow:
    //   '<button class="slick-arrow slick-next"><img src="assets/images/right.svg"></button>',
    responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: true,
            },
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,

            },
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,

            },
        },
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ],
});








//   ======================================================================================================================================================






// counter

let valueDisplays = document.querySelectorAll(".num");
let interval = 2000;

valueDisplays.forEach((valueDisplays) => {
    let startValue = 0;
    let endValue = parseInt(valueDisplays.getAttribute("data-val"));
    // console.log(endValue);

    let duration = Math.floor(interval / endValue);
    let counter = setInterval(function() {
        startValue += 1;
        valueDisplays.textContent = startValue;
        if (startValue == endValue) {
            clearInterval(counter);
        }
    }, duration);

});

// ============================================================================================================================================================


const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li');

    //Toggle Nav
    burger.addEventListener('click', () => {
        nav.classList.toggle('nav-active');

        //Animate Links
        navLinks.forEach((link, index) => {
            if (link.style.animation) {
                link.style.animation = ''
            } else {
                link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.5}s`;
            }
        });

        //burger animation
        burger.classList.toggle('toggle');

    });

}

navSlide();

//   ======================================================================================================================================================


// search bar effect
// document.getElementById("theButton").addEventListener("click", function() {
//     var text = document.getElementById("popup");
//     text.classList.toggle("hide");
//     text.classList.toggle("show");
// });

// search bar effect in mobile width

// document.getElementById("theButton1").addEventListener("click", function() {
//     var text = document.getElementById("popup1");
//     text.classList.toggle("hide1");
//     text.classList.toggle("show1");
// });




// ==========================================================================================================================================



$(document).ready(function() {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 50) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });
    // scroll body to 0px on click
    $('#back-to-top').click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 400);
        return false;
    });
});



// ==============================================================================================================


// Select all elements with the "i" tag and store them in a NodeList called "stars"
const stars = document.querySelectorAll(".stars i");

// Loop through the "stars" NodeList
stars.forEach((star, index1) => {
    // Add an event listener that runs a function when the "click" event is triggered
    star.addEventListener("click", () => {
        // Loop through the "stars" NodeList Again
        stars.forEach((star, index2) => {
            // Add the "active" class to the clicked star and any stars with a lower index
            // and remove the "active" class from any stars with a higher index
            index1 >= index2 ? star.classList.add("active") : star.classList.remove("active");
        });
    });
});


// ===================================================================================================================================



// in heade dropdowns

function toggleDropdown() {
    var dropdownContent = document.getElementById("dropdown_elements");
    if (dropdownContent.classList.contains("show")) {
        dropdownContent.classList.remove("show");
        dropdownContent.classList.add("hide");
    } else {
        dropdownContent.classList.remove("hide");
        dropdownContent.classList.add("show");
    }
}


function toggleDropdown1() {
    var dropdownContent1 = document.getElementById("dropdown_elements1");
    if (dropdownContent1.classList.contains("show1")) {
        dropdownContent1.classList.remove("show1");
        dropdownContent1.classList.add("hide1");
    } else {
        dropdownContent1.classList.remove("hide1");
        dropdownContent1.classList.add("show1");
    }
}

function toggleDropdown2() {
    var dropdownContent1 = document.getElementById("dropdown_elements2");
    if (dropdownContent1.classList.contains("show2")) {
        dropdownContent1.classList.remove("show2");
        dropdownContent1.classList.add("hide2");
    } else {
        dropdownContent1.classList.remove("hide2");
        dropdownContent1.classList.remove("vegan-dropdown");
        dropdownContent1.classList.add("show2");
    }
}

function toggleDropdown3() {
    var dropdownContent1 = document.getElementById("dropdown_elements3");
    if (dropdownContent1.classList.contains("show1")) {
        dropdownContent1.classList.remove("show1");
        dropdownContent1.classList.add("hide1");
    } else {
        dropdownContent1.classList.remove("hide1");
        dropdownContent1.classList.add("show1");
    }
}




// ================================================================================================================================================