var xmlhttp = xmlHttpRequestObject();

function xmlHttpRequestObject() {
    var xmlhttp;
    if (window.XMLHttpRequest)
        xmlhttp = new XMLHttpRequest();
    else
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    return xmlhttp;
}