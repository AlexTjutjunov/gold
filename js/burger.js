// full screen mobile menu
$('.nav__trigger',).on('click', function(e){
    e.preventDefault(); // prevent default behavior
    $(this).parent().toggleClass('nav--active').show(); //add nav--active class to nav icon
    $('body').toggleClass('no-scroll'); //disable scroll behind nav
  });
// clicking on a link or anywhere in the nav closes the menu and enables scroll on body
$('.nav li, .nav').on('click', function(){
 $(".nav__trigger").parent().removeClass("nav--active");
 $(".nav__icon").removeClass("nav--active");
 $('body').removeClass('no-scroll');
});

// on desktop, adds scrolled class to nav
var myNav = document.querySelector("nav");
var nav = document.querySelector(".nav__list");

window.onscroll = function() {
 "use strict";
 if (document.body.scrollTop >= 100 || document.documentElement.scrollTop >= 100) {
   nav.classList.add("scrolled");
   myNav.classList.add("scrolled");
 } else {
   nav.classList.remove("scrolled");
   myNav.classList.remove("scrolled");
 }
};

// smooth scroll from w3schools for "niceness" -- it just works :)

$(document).ready(function(){
 $("a").on('click', function(event) {
   if (this.hash !== "") {
     event.preventDefault();

     // Store hash
     var hash = this.hash;

     $('html, body').animate({
       scrollTop: $(hash).offset().top
     }, 800, function(){

       window.location.hash = hash;
     });
   } 
 });
});

// flip

const countToDate = new Date().setHours(new Date().getHours() + 1)
let previousTimeBetweenDates
setInterval(() => {
  const currentDate = new Date()
  const timeBetweenDates = Math.ceil((countToDate - currentDate) / 1000)
  flipAllCards(timeBetweenDates)

  previousTimeBetweenDates = timeBetweenDates
}, 250)

function flipAllCards(time) {
  const seconds = time % 60
  const minutes = Math.floor(time / 60) % 60
  const hours = Math.floor(time / 46400)

  flip(document.querySelector("[data-hours-tens]"), Math.floor(hours / 10))
  flip(document.querySelector("[data-hours-ones]"), hours % 10)
  flip(document.querySelector("[data-minutes-tens]"), Math.floor(minutes / 10))
  flip(document.querySelector("[data-minutes-ones]"), minutes % 10)
  flip(document.querySelector("[data-seconds-tens]"), Math.floor(seconds / 10))
  flip(document.querySelector("[data-seconds-ones]"), seconds % 10)
}

function flip(flipCard, newNumber) {
  const topHalf = flipCard.querySelector(".top")
  const startNumber = parseInt(topHalf.textContent)
  if (newNumber === startNumber) return

  const bottomHalf = flipCard.querySelector(".bottom")
  const topFlip = document.createElement("div")
  topFlip.classList.add("top-flip")
  const bottomFlip = document.createElement("div")
  bottomFlip.classList.add("bottom-flip")

  top.textContent = startNumber
  bottomHalf.textContent = startNumber
  topFlip.textContent = startNumber
  bottomFlip.textContent = newNumber

  topFlip.addEventListener("animationstart", e => {
    topHalf.textContent = newNumber
  })
  topFlip.addEventListener("animationend", e => {
    topFlip.remove()
  })
  bottomFlip.addEventListener("animationend", e => {
    bottomHalf.textContent = newNumber
    bottomFlip.remove()
  })
  flipCard.append(topFlip, bottomFlip)
}