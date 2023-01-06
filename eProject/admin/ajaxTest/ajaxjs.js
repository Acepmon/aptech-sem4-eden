var xmlHttp = xmlHttpRequestObject();

function xmlHttpRequestObject() {
    var xmlHttp;
    if (window.XMLHttpRequest)
        xmlHttp = new XMLHttpRequest();
    else
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    return xmlHttp;
}

function pro(input) {
    if (xmlHttp) {
        try {
            if (input === 0) {
                xmlHttp.open("GET", "ajaxtxt.txt", false);
                xmlHttp.onreadystatechange = function() {
                    div = document.getElementById('div');
                    if (xmlHttp.readyState === 1) {
                        //Status 1: server connection established
                    } else if (xmlHttp.readyState === 2) {
                        //Status 2: request received
                    } else if (xmlHttp.readyState === 3) {
                        //Status 3: processing request
                    } else if (xmlHttp.readyState === 4) {

                        if (xmlHttp.status === 200) {
                            try {
                                text = xmlHttp.responseText;
                                //Status 4: request is finished and response is ready
                                div.innerHTML = text;
                            } catch (e) {
                                alert(e.toString());
                            }
                        } else {
                            alert(xmlHttp.statusText);
                        }
                    }
                };
                xmlHttp.send(null);
            }
        } catch (e) {
            alert(e.toString());
        }
    }
}
