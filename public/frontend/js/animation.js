let aim = document.getElementById("image"),
room,
overflow;

window.addEventListener("load", setEdge);
window.addEventListener("resize", setEdge);

window.addEventListener("scroll", function () {
let ratio = (this.pageYOffset || this.scrollY) / overflow;

aim.style.setProperty("--epoch", ratio);
});

function setEdge() {
room = window.innerHeight;
overflow = document.body.scrollHeight - room;

aim.style.setProperty("--maximum", room - aim.height + "px");
}

$(document).ready(function () {
//   scroll function
$(window).scroll(function () {
  var car = $(".car");
  var carrier = $(".carrier");
  var carrier2 = $(".carrier2");
  var car3 = $(".car3");
  var image = $("#image");
  var scroll = $(window).scrollTop();

  // only car rotate
  if (scroll <= 800) {
    car.removeClass("rotate");
  } else if (scroll >= 2000) {
    car.addClass("rotate");
  } else if (scroll >= 1400) {
    car.removeClass("rotate");
  } else if (scroll >= 800) {
    car.addClass("rotate");
  }

  // window.innerHeight < 1000px
  if (window.innerHeight < 1000) {
    // car finish
    if (scroll >= 8220) {
      car.addClass("finish");
    } else {
      car.removeClass("finish");
    }

    // career display
    if (scroll > 8220) {
      carrier.addClass("d-none");
    } else if (scroll < 2312) {
      carrier2.removeClass("d-none");
      carrier.addClass("d-none");
    } else {
      carrier2.addClass("d-none");
      carrier.removeClass("d-none");
    }
    // image display
    if (scroll >= 5040) {
      image.removeClass("d-none");
    } else if (scroll >= 3150) {
      image.addClass("d-none");
    } else {
      image.removeClass("d-none");
    }

    // image rotate
    if (scroll >= 7036) {
      image.removeClass("rotate");
    } else if (scroll >= 6860) {
      image.addClass("rotate");
    } else if (scroll >= 6660) {
      image.removeClass("rotate");
    } else if (scroll >= 6048) {
      image.addClass("rotate");
    } else if (scroll >= 2750) {
      image.removeClass("rotate");
    } else if (scroll >= 2400) {
      image.addClass("rotate");
    } else {
      image.removeClass("rotate");
    }
    // image display
    if (scroll >= 5040) {
      car3.addClass("d-none");
    } else {
      car3.removeClass("d-none");
    }
  } else {
    // car finish
    if (scroll >= 7840) {
      car.addClass("finish");
    } else {
      car.removeClass("finish");
    }

    // career display
    if (scroll > 7840) {
      carrier.addClass("d-none");
    } else if (scroll < 2220) {
      carrier2.removeClass("d-none");
      carrier.addClass("d-none");
    } else {
      carrier2.addClass("d-none");
      carrier.removeClass("d-none");
    }
    // image display
    if (scroll >= 4820) {
      image.removeClass("d-none");
    } else if (scroll >= 3150) {
      image.addClass("d-none");
    } else {
      image.removeClass("d-none");
    }

    // image rotate
    if (scroll >= 6820) {
      image.removeClass("rotate");
    } else if (scroll >= 6610) {
      image.addClass("rotate");
    } else if (scroll >= 6400) {
      image.removeClass("rotate");
    } else if (scroll >= 5780) {
      image.addClass("rotate");
    } else if (scroll >= 2620) {
      image.removeClass("rotate");
    } else if (scroll >= 2400) {
      image.addClass("rotate");
    } else {
      image.removeClass("rotate");
    }
    // image display
    if (scroll >= 4820) {
      car3.addClass("d-none");
    } else {
      car3.removeClass("d-none");
    }
  }
  if (window.innerWidth <= 1200) {
    if (window.innerHeight < 1000) {
      // image display
      if (scroll >= 5040) {
        image.removeClass("d-none");
      } else if (scroll >= 3280) {
        image.addClass("d-none");
      } else {
        image.removeClass("d-none");
      }

      // car finish
      if (scroll >= 8120) {
        car.addClass("finish");
      } else {
        car.removeClass("finish");
      }

      // career display
      if (scroll > 8120) {
        carrier.addClass("d-none");
      } else if (scroll < 2220) {
        carrier2.removeClass("d-none");
        carrier.addClass("d-none");
      } else {
        carrier2.addClass("d-none");
        carrier.removeClass("d-none");
      }
    } else if (window.innerHeight < 800) {
      // image display
      if (scroll >= 5040) {
        image.removeClass("d-none");
      } else if (scroll >= 3280) {
        image.addClass("d-none");
      } else {
        image.removeClass("d-none");
      }

      // car finish
      if (scroll >= 8300) {
        car.addClass("finish");
      } else {
        car.removeClass("finish");
      }

      // career display
      if (scroll > 8300) {
        carrier.addClass("d-none");
      } else if (scroll < 2220) {
        carrier2.removeClass("d-none");
        carrier.addClass("d-none");
      } else {
        carrier2.addClass("d-none");
        carrier.removeClass("d-none");
      }
    }
  }
  if (window.innerWidth <= 992) {
    if (window.innerHeight < 1000) {
      // car finish
      if (scroll >= 7860) {
        car.addClass("finish");
      } else {
        car.removeClass("finish");
      }
      // image display
      if (scroll >= 4820) {
        car3.addClass("d-none");
      } else {
        car3.removeClass("d-none");
      }
      // only car rotate
      if (scroll <= 800) {
        car.removeClass("rotate");
      } else if (scroll >= 1860) {
        car.addClass("rotate");
      } else if (scroll >= 1400) {
        car.removeClass("rotate");
      } else if (scroll >= 800) {
        car.addClass("rotate");
      }
      // career display
      if (scroll > 7860) {
        carrier.addClass("d-none");
      } else if (scroll < 1900) {
        carrier2.removeClass("d-none");
        carrier.addClass("d-none");
      } else {
        carrier2.addClass("d-none");
        carrier.removeClass("d-none");
      }
      // image rotate
      if (scroll >= 6620) {
        image.removeClass("rotate");
      } else if (scroll >= 6480) {
        image.addClass("rotate");
      } else if (scroll >= 6250) {
        image.removeClass("rotate");
      } else if (scroll >= 5780) {
        image.addClass("rotate");
      } else if (scroll >= 2700) {
        image.removeClass("rotate");
      } else if (scroll >= 2060) {
        image.addClass("rotate");
      } else {
        image.removeClass("rotate");
      }
      // image display
      if (scroll >= 4820) {
        image.removeClass("d-none");
      } else if (scroll >= 3280) {
        image.addClass("d-none");
      } else {
        image.removeClass("d-none");
      }
    }
    if (window.innerHeight < 800) {
      // car finish
      if (scroll >= 8100) {
        car.addClass("finish");
      } else {
        car.removeClass("finish");
      }
      // image display
      if (scroll >= 4974) {
        car3.addClass("d-none");
      } else {
        car3.removeClass("d-none");
      }
      // only car rotate
      if (scroll <= 800) {
        car.removeClass("rotate");
      } else if (scroll >= 1860) {
        car.addClass("rotate");
      } else if (scroll >= 1400) {
        car.removeClass("rotate");
      } else if (scroll >= 800) {
        car.addClass("rotate");
      }
      // image rotate
      if (scroll >= 6800) {
        image.removeClass("rotate");
      } else if (scroll >= 6600) {
        image.addClass("rotate");
      } else if (scroll >= 6250) {
        image.removeClass("rotate");
      } else if (scroll >= 5780) {
        image.addClass("rotate");
      } else if (scroll >= 2700) {
        image.removeClass("rotate");
      } else if (scroll >= 2060) {
        image.addClass("rotate");
      } else {
        image.removeClass("rotate");
      }
      // image display
      if (scroll >= 4974) {
        image.removeClass("d-none");
      } else if (scroll >= 3280) {
        image.addClass("d-none");
      } else {
        image.removeClass("d-none");
      }
      // career display
      if (scroll > 8100) {
        carrier.addClass("d-none");
      } else if (scroll < 1950) {
        carrier2.removeClass("d-none");
        carrier.addClass("d-none");
      } else {
        carrier2.addClass("d-none");
        carrier.removeClass("d-none");
      }
    }
  }
});

// AOS
AOS.init();
});