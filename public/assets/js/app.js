$(document).ready(function() {

  // var header = $(".desktop-header");
  // var headerHeight = header.outerHeight();
  // var scrollPosition = 0;
  // var isAnimating = false;

  // $(window).scroll(function() {
  //     var currentPosition = $(this).scrollTop();

  //     // Check if scrolling down
  //     if (currentPosition > scrollPosition) {
  //         // Check if header is not fixed and not animating
  //         if (!header.hasClass("fixed") && !isAnimating) {
  //             // Check if scrolled beyond header height
  //             if (currentPosition > headerHeight) {
  //                 isAnimating = true;
  //                 header.addClass("fixed").css("top", -headerHeight);
  //                 header.animate({ top: 0 }, 300, "swing", function() {
  //                     isAnimating = false;
  //                 });
  //             }
  //         }
  //     } else {
  //         // Scrolling up
  //         if (header.hasClass("fixed") && !isAnimating) {
  //             // Check if scrolled back to initial position
  //             if (currentPosition <= headerHeight) {
  //                 isAnimating = true;
  //                 header.removeClass("fixed").css("top", -headerHeight);
  //                 header.animate({ top: 0 }, 300, "swing", function() {
  //                     isAnimating = false;
  //                 });
  //             }
  //         }
  //     }

  //     scrollPosition = currentPosition;
  // });

 


  $('#overlay').hide();

    // Check if the dialog box has been shown before
    if (!localStorage.getItem('dialogShown')) {
      // Show the dialog box
      $('#dialog-box').show();
      $('#overlay').show();
      // Store the information that the dialog box has been shown
      localStorage.setItem('dialogShown', true);
    }

    // Close the dialog box when the 'Close' button is clicked
    $('#close-dialog').click(function() {
      $('#dialog-box').hide();
      $('#overlay').hide();
    });
  

    $('#content').hide();
    $('#officesrow').click(function(){
        $('.rotate').toggleClass("down");
        $('#content').toggle(1000);
    });
 
    $('#mob-inner-item').hide();
    $('#help').click(function(){
        $('.rotate').toggleClass("down");
        $('#mob-inner-item').toggle(1000);
    });
    $('#Japan-content').hide();
    $('#aboutss').click(function(){
        $('.rotate').toggleClass("down");
        $('#Japan-content').toggle(1000);
    });

    


  var $mobileNav = $('.navigation');
  var $mobileNavToggle = $('.mobile-nav-toggle');

  function toggleMobileNav() {
    $mobileNav.toggleClass('open');
    $('body').toggleClass('mobile-nav-open');
  }

  $mobileNavToggle.on('click', toggleMobileNav);




   // Hide all accordion content initially
   $(".accordion-content").hide();

   // Add click event to accordion toggle
   $(".accordion-toggle").click(function() {
     // Toggle the active class on the clicked accordion toggle
     $(this).toggleClass("active");
 
     // Toggle the visibility of the accordion content within the same tab section
     $(this).next(".accordion-content").slideToggle();
   });

   $('.innercontent').hide();
   $(".accordianitem").click(function() {
    $(this).find(".innercontent").slideToggle();
});
   




 


$('#currencyitem').click(function(){
  console.log("running");
  $('#currencybox').removeClass("hide");
});

$('#faqitem').click(function() {

  console.log("runnings");
});



  

  var toggleState = false;

  function toggleSwitch() {
    var toggle = document.querySelector(".toggle");
    
    if (toggleState) {
      toggle.classList.remove("on");
    } else {
      toggle.classList.add("on");
    }
    
    toggleState = !toggleState;
  }
  function toggleSwitchtwo() {
    var toggle = document.querySelector(".toggletwo");
    
    if (toggleState) {
      toggle.classList.remove("on");
    } else {
      toggle.classList.add("on");
    }
    
    toggleState = !toggleState;
  }

 
})