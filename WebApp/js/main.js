function poziv(page){
    var ajax;
    if (window.XMLHttpRequest){
        ajax = new XMLHttpRequest(); // FIREFOX
    }
    else if (window.ActiveXObject){
        ajax = new ActiveXObject(); // IE
    }
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200)
        {
            document.getElementById("promijeni").innerHTML = ajax.responseText;
            document.getElementById("forma").style.display = "none";
        }
        if (ajax.readyState == 4 && ajax.status == 404)
            document.getElementById("promijeni").innerHTML = "Greska: nepoznat URL";
    }
    ajax.open("GET", page, true);
    ajax.send();
}