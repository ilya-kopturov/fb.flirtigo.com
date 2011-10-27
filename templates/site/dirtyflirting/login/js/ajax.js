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

/*
 * Bogdan, am modificat functiile astea pt ca imi generau erori de js
 */
function stateChanged(response){
/*
	if(XMLHttp.readyState == 4){
		if(XMLHttp.status == 200){
			document.getElementById("fm_write").innerHTML = XMLHttp.responseText;
		}
	}
*/
	$('#fm_write').html(response);
}

function featuredPopular(page){
/*
	XMLHttp = GetXMLHttpObject();
	XMLHttp.onreadystatechange=stateChanged;
	XMLHttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
	XMLHttp.open("GET",page,true);
	XMLHttp.send(null);
*/
	$.get(page, stateChanged);
}


function writeHTML(XMLHttp, id){
			document.getElementById(id).innerHTML = XMLHttp.responseText;
}

function ajaxcall(page, dofunc, id){
	XMLHttp = GetXMLHttpObject();
	XMLHttp.onreadystatechange=function(){
		if(XMLHttp.readyState == 4){
			if(XMLHttp.status == 200){
				dofunc(XMLHttp, id);
			}
		}
	}
	XMLHttp.open("GET",page,true);
	XMLHttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
	XMLHttp.send(null);
}