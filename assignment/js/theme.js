function themeToggle() {
    var globalStyle = document.querySelector(':root');

    if (getCookie("Theme") == "Dark") { setLight(); console.log("Cookies confirmed dark, set light."); }

    else { setDark(); console.log("Cookies unconfirmed dark, set dark.");}
}

function setDark() {
var globalStyle = document.querySelector(':root');
    globalStyle.style.setProperty('--primary-color', '#00afaa'); 
    globalStyle.style.setProperty('--secondary-color', '#013b39'); 
    globalStyle.style.setProperty('--background-color', '#062b2a'); 
    globalStyle.style.setProperty('--primary-text-color', 'black'); 
    globalStyle.style.setProperty('--secondary-text-color', '#99c7c5'); 
    setCookie("Theme", "Dark");
    console.log("Cookies Set: " + getCookie("Theme"));  
}

function setLight() {
var globalStyle = document.querySelector(':root');
    globalStyle.style.setProperty('--primary-color', '#cfdfe6');
    globalStyle.style.setProperty('--secondary-color', '#166c87');
    globalStyle.style.setProperty('--background-color', '#ebf2f5');
    globalStyle.style.setProperty('--primary-text-color', '#263838'); 
    globalStyle.style.setProperty('--secondary-text-color', '#bedce6'); 
    setCookie("Theme", "Light");
    console.log("Cookies Set: " + getCookie("Theme"));
}