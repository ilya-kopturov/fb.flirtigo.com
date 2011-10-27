var XMLHttp;

function GetXMLHttpObject(){
	var XMLHttp = null;
	
	try{
		// Firefox.Mozilla, Opera 8.0+, Safari
		XMLHttp = new XMLHttpRequest();
	}catch(e){
		try{
			// Internet Explorer 5.5+
			XMLHttp = new ActiveXObject("Msxml2.XMLHTTP");
		}catch(e){
			try{
				// Internet Explorer 5.5-
				XMLHttp = new ActiveXObject("Microsoft.XMLHTTP");
			}catch(e){
				window.alert("Your browser does not support AJAX!");
				return false;
			}
		}
	}
	
	return XMLHttp;
}

function stateChanged(){
	if(XMLHttp.readyState == 4){
		if(XMLHttp.status == 200){
			document.getElementById("fm_write").innerHTML = XMLHttp.responseText;
		}
	}
}

function featuredPopular(page){
	XMLHttp = GetXMLHttpObject();
	XMLHttp.onreadystatechange=stateChanged;
	XMLHttp.open("GET",page,true);
	XMLHttp.send(null);
}