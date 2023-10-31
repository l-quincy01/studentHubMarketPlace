document.addEventListener('DOMContentLoaded', function(){
    const settingsWrapper = document.getElementById('settings-wrapper');
    const settingsBtn = document.getElementById('Settings');
    const closeSettings = document.getElementById('close-settings');

    settingsBtn.addEventListener('click', function(){
        settingsWrapper.classList.add('active');
    });
    closeSettings.addEventListener('click', function(){
        settingsWrapper.classList.remove('active');
    });


    const themeRadios = document.querySelectorAll('input[type="radio"][name="theme"]');
    const applyTheme = document.getElementById('applyTheme');
    const nav = document.querySelector('nav');
    const navLinks = document.querySelectorAll('nav li a');
    const footer = document.querySelector('footer');
    const footerContent = document.querySelector('.footer-content');
    const rSideBar = document.querySelector('#right-sidebar');
    const lSideBar = document.querySelector('#left-sidebar');

    let selectedTheme = '';
    // Function to apply the selected theme
    function applyThemeColor() {
        if (selectedTheme) {

            // Apply the selected theme class
            nav.classList.add(`${selectedTheme}`);
            footer.classList.add(`${selectedTheme}`);
            rSideBar.classList.add(`${selectedTheme}`);
            lSideBar.classList.add(`${selectedTheme}`);
            footerContent.classList.add(`${selectedTheme}`);
            // Apply the style for "Dark Mode" (theme5) to nav li a elements
            if (selectedTheme === 'theme2') {
                navLinks.forEach((link) => {
                    link.style.color = 'white';
                });
            } else {
                // Remove the style for "Dark Mode" from nav li a elements
                navLinks.forEach((link) => {
                    link.style.color = ''; // This will remove the inline style
                });
                // Remove all theme classes and styles
                nav.classList.remove('theme2');
                footer.classList.remove('theme2');
                rSideBar.classList.remove('theme2');
                lSideBar.classList.remove('theme2');
                footerContent.classList.remove('theme2');
            }
        }
    }

    // Function to set the selected theme in local storage
    function setSelectedTheme(theme) {
        localStorage.setItem('selectedTheme', theme);
    }
    
    // Function to get the selected theme from local storage
    function getSelectedTheme() {
        return localStorage.getItem('selectedTheme');
    }
    
    // Apply the saved theme or a default theme on page load
    window.addEventListener('load', function () {
        const savedTheme = getSelectedTheme();
        if (savedTheme) {
        selectedTheme = savedTheme;
        applyThemeColor();
        }
    });
  
    // Event listener for the "Submit" button
    applyTheme.addEventListener('click', function () {
        // Get the selected theme
        selectedTheme = document.querySelector('input[type="radio"][name="theme"]:checked').id;
        // Apply the theme
        applyThemeColor();
        // Save the selected theme in local storage
        setSelectedTheme(selectedTheme);
    });
  

    // Event listener for radio button change
    themeRadios.forEach((radio) => {
        radio.addEventListener('change', (event) => {
            selectedTheme = event.target.id;
        });
    });
    applyTheme.addEventListener('click', function(event) {
        // Apply the selected theme when the submit button is clicked
        applyThemeColor();
    });



    //////user location using navigator.geolocation

    const locationPopup = document.getElementById("locationPopup");
const allowLocation = document.getElementById("allowLocation");
const denyLocation = document.getElementById("denyLocation");

// Check if geolocation is available
if ("geolocation" in navigator) {
    // Location request popup
    locationPopup.style.display = "block";

    allowLocation.addEventListener("click", function () {
        // Request the user's location
        navigator.geolocation.getCurrentPosition(
            function (position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;

                alert(`Latitude: ${latitude}, Longitude: ${longitude}`);

                locationPopup.style.display = "none";
            },
            function (error) {
                // Handle errors (e.g., user denied location access)
                alert(`Error: ${error.message}`);
                locationPopup.style.display = "none";
            }
        );
    });

    // Denied location
    denyLocation.addEventListener("click", function () {
        alert("You denied location access.");
        locationPopup.style.display = "none";
    });
} else {
    // Geolocation is not available
    alert("Geolocation is not available.");
}



    //open and close left-sidebar
    const leftSidebar = document.getElementById("left-sidebar");
    const leftSideBarMenu = document.getElementById("leftSideBarMenu");
    const menuImg = leftSideBarMenu.querySelector("img");

    leftSideBarMenu.addEventListener("click", function() {
        leftSidebar.classList.toggle("close");
        leftSideBarMenu.classList.toggle("close");

        // Toggle the image source between menuClose.png and menuOpen.png
        if (menuImg.src.includes("menuClose.png")) {
            menuImg.src = "Images/icons/menuOpen.png";
        } else {
            menuImg.src = "Images/icons/menuClose.png";
        }
    });

    const eventsBtn = document.querySelector('#eventsBtn');
    const eventsTab = document.querySelector('#events_reminder');
    eventsBtn.addEventListener('click', function(){
        eventsTab.classList.toggle("active");
        
    });


    const dropDownMenu = document.getElementById("dropDownMenu");
  
    dropDownMenu.addEventListener("click", function() {
      this.classList.toggle("active");
    });
  
    // Close the dropdown menu when clicking outside of it
    document.addEventListener("click", function(event) {
      if (!event.target.closest("#dropDownMenu")) {
        dropDownMenu.classList.remove("active");
      }
    });
  
    // Close the dropdown menu when resizing to a larger screen
    window.addEventListener("resize", function() {
      if (window.innerWidth >= 1120) {
        dropDownMenu.classList.remove("active");
      }
    });

    const marketplace = document.getElementById('addListing');
    marketplace.addEventListener('click', function(){
        window.location.href = 'addProduct.php';
    });

    let currentSlide = 0; // Track the current slide index

    // Function to show the next slide
    function nextSlide() {
        const slides = document.querySelectorAll('.slide');
        slides[currentSlide].classList.remove('active');
        currentSlide = (currentSlide + 1) % slides.length;
        slides[currentSlide].classList.add('active');
    }

    // Function to show the previous slide
    function prevSlide() {
        const slides = document.querySelectorAll('.slide');
        slides[currentSlide].classList.remove('active');
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        slides[currentSlide].classList.add('active');
    }

    // Function to automatically transition to the next slide
    function autoSlide() {
        nextSlide();
        setTimeout(autoSlide, 5000); // Change slide every 5 seconds (5000 milliseconds)
    }

    // Initially, show the first slide and start the automatic slideshow
    document.querySelector('.slide').classList.add('active');
    autoSlide(); // Start the automatic slideshow
    
});


//Navigator Object Properties
console.log("Browser Online: " + navigator.onLine);
console.log("Browser Code Name: " + navigator.appCodeName);
console.log("Browser Name: " + navigator.appName);
console.log("Cookies Enabled: " + navigator.cookieEnabled);
console.log("Browser Language: " + navigator.language);

//Navigator Object Methods
console.log("Java Enabled: " + navigator.javaEnabled());
