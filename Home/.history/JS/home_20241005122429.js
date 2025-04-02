// Select the search button and search bar container
let searchBtn = document.querySelector('#search-btn');
let searchBar = document.querySelector('.search-bar-container');

// Select the login button, login form container, and the close button for the form
let formBtn = document.querySelector('#login-btn');
let loginForm = document.querySelector('.login-form-container');
let formClose = document.querySelector('#form-close');

// Select the menu button and the navbar
let menu = document.querySelector('#menu-bar');
let navbar = document.querySelector('.navbar');

let imgBtn = document.querySelectorAll('.img-btn');

// Remove active classes on scroll to close the search bar, menu, and login form
window.onscroll = () => {
    searchBtn.classList.remove('fa-times'); // Remove 'x' icon from the search button
    searchBar.classList.remove('active'); // Hide the search bar

    menu.classList.remove('fa-times'); // Remove 'x' icon from the menu button
    navbar.classList.remove('active'); // Hide the navbar menu
    loginForm.classList.remove('active'); // Hide the login form
};

// Toggle the menu and navbar visibility when the menu button is clicked
menu.addEventListener('click', () => {
    menu.classList.toggle('fa-times'); // Toggle 'x' icon for the menu button
    navbar.classList.toggle('active'); // Toggle visibility of the navbar
});

// Toggle the search bar visibility when the search button is clicked
searchBtn.addEventListener('click', () => {
    searchBtn.classList.toggle('fa-times'); // Toggle 'x' icon for the search button
    searchBar.classList.toggle('active'); // Toggle visibility of the search bar
});

// Show the login form when the login button is clicked
formBtn.addEventListener('click', () => {
    loginForm.classList.add('active'); // Show the login form
});

// Hide the login form when the close button is clicked
formClose.addEventListener('click', () => {
    loginForm.classList.remove('active'); // Hide the login form
});

// Select all elements with the class 'vid-btn'
imgBtn.forEach(btn => {
    // Add a click event listener to each 'vid-btn'
    btn.addEventListener('click', () => {
        // Find the currently active button, remove the 'active' class from it
        document.querySelector('.controls .active').classList.remove('active');

        // Add the 'active' class to the clicked button
        btn.classList.add('active');

        // Get the 'data-src' attribute value of the clicked button (video source)
        let src = btn.getAttribute('data-src');

        // Change the source of the video element with id 'video-slider' to the new video
        document.querySelector('#video-slider').src = src;
    });
});


// Initialize a new Swiper instance for the element with class "review-slider"
var swiper = new Swiper(".review-slider", {
    spaceBetween: 20, // Sets 20 pixels of space between each slide
    loop: true, // Enables continuous looping of slides
    autoplay: {
        delay: 2500, // Slides change automatically every 2500 milliseconds (2.5 seconds)
        disableOnInteraction: false, // Autoplay will not be disabled after user interaction (e.g., swiping)
    },
    breakpoints: {
        640: {
            slidesPerView: 1, // 1 slide visible for screens 640px wide or smaller
        },
        768: {
            slidesPerView: 2, // 2 slides visible for screens 768px wide or larger
        },
        1024: {
            slidesPerView: 3, // 3 slides visible for screens 1024px wide or larger
        },
    },
});
//var swiper = new Swiper(".brand-slider", {
// spaceBetween: 20, // Sets 20 pixels of space between each slide
//loop: true, // Enables continuous looping of slides
//autoplay: {
//  delay: 2500, // Slides change automatically every 2500 milliseconds (2.5 seconds)
// disableOnInteraction: false, // Autoplay will not be disabled after user interaction (e.g., swiping)
// },
//breakpoints: {
//  640: {
//       slidesPerView: 1, // 1 slide visible for screens 640px wide or smaller
//   },
//  768: {
//    slidesPerView: 2, // 2 slides visible for screens 768px wide or larger
// },
// 1024: {
//    slidesPerView: 3, // 3 slides visible for screens 1024px wide or larger
// },
//  },
//});

