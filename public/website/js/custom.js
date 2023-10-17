




// change color of navbar when scroll

var scrollTrigger = 60;

// let logoImg = document.getElementById('logo-img');

window.onscroll = function() {
  // We add pageYOffset for compatibility with IE.
  if (window.scrollY >= scrollTrigger || window.pageYOffset >= scrollTrigger) {

    document.getElementById("navbar-main").style.position='fixed';
    document.getElementById("navbar-main").style.top=0;
    document.getElementById("navbar-main").style.width='100%';
    document.getElementById("navbar-main").style.borderBottom='2px solid #ff8d04';
    
    
  } else {
    document.getElementById("navbar-main").style.position='absolute';
    document.getElementById("navbar-main").style.top='44px';
    document.getElementById("navbar-main").style.borderBottom='none';
    
  }
};