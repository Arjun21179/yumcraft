





// first banner carousal in landing page

$(".wel_banner").slick({
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
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: false,
      },
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
      },
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
      },
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ],
});


// =================================================================================================================================================




// Get the modal
var modal = document.getElementById("myModal");

// Function to open the modal
function openModal() {
  modal.style.display = "block";
}

// Function to close the modal
function closeModal() {
  modal.style.display = "none";
}

// Close the modal if the user clicks outside of it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// ==================================================================================================================================================

const navSlide = () => {
  const burger = document.querySelector('.burger');
  const nav = document.querySelector('.nav-links');
  const navLinks = document.querySelectorAll('.nav-links li');
  
  //Toggle Nav
  burger.addEventListener('click',() => {
    nav.classList.toggle('nav-active');
    
    //Animate Links
    navLinks.forEach((link, index)=>{
      if(link.style.animation){
        link.style.animation = ''
      }else{
            link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.5}s`;
      }
    });
    
    //burger animation
    burger.classList.toggle('toggle');
    
  });

}

navSlide();


// =========================================================================================================================================.===========


// back to top

$(document).ready(function () {
  $(window).scroll(function () {
      if ($(this).scrollTop() > 50) {
          $('#back-to-top').fadeIn();
      } else {
          $('#back-to-top').fadeOut();
      }
  });
  // scroll body to 0px on click
  $('#back-to-top').click(function () {
      $('body,html').animate({
          scrollTop: 0
      }, 400);
      return false;
  });
});



// ================================================================================================================================================





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