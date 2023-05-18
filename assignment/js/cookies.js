function setCookie(cname, cvalue) {
    document.cookie = cname + "=" + cvalue + ";";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var splitCookies = decodedCookie.split(';');
    for(var i = 0; i <splitCookies.length; i++) {
        var c = splitCookies[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
            }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
    }
    return "";
}