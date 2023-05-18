function onStartup() {
    var test = document.cookie;
    console.log("Found Theme Cookies: " + getCookie("Theme"));
    var globalStyleStart = document.querySelector(':root');
    
    if (getCookie("Theme") == "Light") { setLight(); console.log("found light"); }
    
    else {if (getCookie("Theme") == "Dark") { setDark(); console.log("found dark"); }
    else { console.log("No valid cookies found"); setLight();  }
    }
    ready();
   
    }
    function ready() {
    var main = document.body;
    main.style.display = "block";
}