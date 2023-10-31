const cookieVal = document.querySelector(".cookies"),
  accept_cookies = document.querySelectorAll(".allow");

const executeCodes = () => {
  if (document.cookie.includes("stuHub")) return;
  cookieVal.classList.add("show");

  accept_cookies.forEach((allow) => {
    allow.addEventListener("click", () => {
      cookieVal.classList.remove("show");
	  
      if (allow.id == "acceptBtn") {
        //set cookies for 1 month
        document.cookie = "cookies" + 60 * 60 * 24 * 30;
      }
    });
  });
};

//function will be called on webpage load
window.addEventListener("load", executeCodes);
