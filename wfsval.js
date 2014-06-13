function setStyle(str, type) {
    switch (type) {
        case 0: // Normal
            str.style.border = '1px solid #000000'; 
            str.style.background = '#fff';
            break;
        case 1: // Ok
            str.style.border = '1px solid #8cac5e'; 
            str.style.background = '#ffffff url("tick.png") no-repeat right';
            break;
        case 2: // Error
            str.style.border = '1px solid #ff0000'; 
            str.style.background = '#ffffff url("cross.png") no-repeat right';
            break;
        case 3: // Blank
            str.style.border = '0';
            str.style.background = '#fff';
            break;
        default:
            str.style.border = '1px solid #000000'; 
            str.style.background = '#fff';
    }
}

function valField(fid, stype) {
    setStyle(fid, 0);
    
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            fid.innerHTML = xmlhttp.responseText;
            if (xmlhttp.responseText == "Fail") {
                setStyle(fid, 2);
            } else {
                setStyle(fid, 1);
            }
        }
    }
    
    xmlhttp.open("GET", "checkfield.php?q="+fid.value+"&s="+stype, true);
    xmlhttp.send();
}

var counter = 1;
var limit = 5;

function addField(divName) {
    if (counter == limit) {
        alert("Input limit reached");
    } 
    else {
        var newdiv = document.createElement('div');   
        newdiv.innerHTML =  "<input type='text' name='myInputs[]'>";
        document.getElementById(divName).appendChild(newdiv);
        counter++;
    }
}

function toggleField(divId, tName) {
    var i;
    var radios;
    radios = document.getElementById("cemp").getElementsByTagName("input");
    
    
    for (i = 0; i < radios.length; i++) {
        if (radios[i].value == '1' && radios[i].checked == true) {
            document.getElementById(tName).style = "display: block";
        } 
        else if (radios[i].value == '0' && radios[i].checked == true) {
            document.getElementById(tName).style = "display: none";
        }
            
    }
}
    
