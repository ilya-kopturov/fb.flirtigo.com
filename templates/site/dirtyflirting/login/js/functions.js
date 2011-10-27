function checkAll()
{
	var cbs = document.forms["mailbox"].elements;
	if(cbs)
	{
		if(cbs.length)
		{
			for (var i=0; i<cbs.length; i++)
			{
				cbs[i].checked = document.forms["mailbox"].elements["selectAll"].checked;
			}
		}
		else
		{
			cbs.checked = document.forms["mailbox"].elements["selectAll"].checked;
		}
	}
}

function bookmarksite(title,url)
{
	if (window.sidebar)
		window.sidebar.addPanel(title, url, "");
	else if(window.opera && window.print)
	{
		var elem = document.createElement('a');
		elem.setAttribute('href',url);
		elem.setAttribute('title',title);
		elem.setAttribute('rel','sidebar');
		elem.click();
	}
	else if(document.all)
		window.external.AddFavorite(url, title);
}

function preaload(url, page)
{
	if(document.images)
	{
		if(page == 'index')
		{
			pic1 = new Image(16, 16);
			pic1.src = url + "background.gif";

			pic2 = new Image(780, 254);
			pic2.src = url + "home_header_flash.jpg";

			pic3 = new Image(205, 82);
			pic3.src = url + "stats_background.jpg";

			pic4 = new Image(575, 82);
			pic4.src = url + "home_featured_flash.jpg";

			pic4 = new Image(248, 170);
			pic4.src = url + "home_quicksearch.gif";

			pic5 = new Image(320, 170);
			pic5.src = url + "home_freejoin.jpg";

			pic6 = new Image(205, 170);
			pic6.src = url + "home_login.gif";

			pic7 = new Image(67, 25);
			pic7.src = url + "home_checkin.gif";

			pic8 = new Image(37, 25);
			pic8.src = url + "home_go.gif";
		}
	}
}

function checkfields(form_name)
{
	if(document[form_name].country.value < 1){
		alert("Please select COUNTRY!");
		return false;
	}
	else if(document[form_name].country.value == 1 && document[form_name].state.value < 1) {
		alert("Please select STATE!");
		return false;
	}

	return true;
}

function mouseOver(picid, url)
{
	str = document.getElementById(picid).src;

	if(picid == "mp" && str.indexOf("dirtyflirting_mostpopular_inactive.gif") >= 0){
		document.getElementById(picid).src = url + "public/images/dirtyflirting_mostpopular_on.gif";
	}else if(picid == "f" && str.indexOf("dirtyflirting_featured_inactive.gif") >= 0){
		document.getElementById(picid).src = url + "public/images/dirtyflirting_featured_on.gif";
	}
}

function mouseOut(picid, url)
{
	str = document.getElementById(picid).src;

	if(picid == "mp" && str.indexOf("dirtyflirting_mostpopular_on.gif") >= 0){
		document.getElementById(picid).src = url + "public/images/dirtyflirting_mostpopular_inactive.gif";
	}else if(picid == "f" && str.indexOf("dirtyflirting_featured_on.gif") >= 0){
		document.getElementById(picid).src = url + "public/images/dirtyflirting_featured_inactive.gif";
	}
}

function mouseClick(picid, url, type)
{
	if(picid == "mp"){
		document.getElementById("mp").src = url + "public/images/dirtyflirting_mostpopular_active.gif";
		document.getElementById("f").src  = url + "public/images/dirtyflirting_featured_inactive.gif";
		featuredPopular("mostpopular"+type+".php");
	}else if(picid == "f"){
		document.getElementById("mp").src = url + "public/images/dirtyflirting_mostpopular_inactive.gif";
		document.getElementById("f").src  = url + "public/images/dirtyflirting_featured_active.gif";
		featuredPopular("featured"+type+".php");
	}
}

function mem_mouseOver(picid, url)
{
	str = document.getElementById(picid).src;

	if(picid == "mp" && str.indexOf("dirtyflirting_mostpopular_inactive.gif") >= 0){
		document.getElementById(picid).src = url + "public/images/dirtyflirting_mostpopular_on.gif";
	}else if(picid == "f" && str.indexOf("dirtyflirting_featured_inactive.gif") >= 0){
		document.getElementById(picid).src = url + "public/images/dirtyflirting_featured_on.gif";
	}
}

function mem_mouseOut(picid, url)
{
	str = document.getElementById(picid).src;

	if(picid == "mp" && str.indexOf("dirtyflirting_mostpopular_on.gif") >= 0){
		document.getElementById(picid).src = url + "public/images/dirtyflirting_mostpopular_inactive.gif";
	}else if(picid == "f" && str.indexOf("dirtyflirting_featured_on.gif") >= 0){
		document.getElementById(picid).src = url + "public/images/dirtyflirting_featured_inactive.gif";
	}
}

function mem_mouseClick(picid, url, type)
{
	if(picid == "mp"){
		document.getElementById("mp").src = url + "public/images/dirtyflirting_mostpopular_active.gif";
		document.getElementById("f").src  = url + "public/images/dirtyflirting_featured_inactive.gif";
		featuredPopular("mem_mostpopular"+type+".php");
	}else if(picid == "f"){
		document.getElementById("mp").src = url + "public/images/dirtyflirting_mostpopular_inactive.gif";
		document.getElementById("f").src  = url + "public/images/dirtyflirting_featured_active.gif";
		featuredPopular("mem_featured"+type+".php");
	}
}

function menu_mouseover(picid, url)
{
	document.getElementById(picid).src = url;
}

function menu_mouseout(picid, url)
{
	document.getElementById(picid).src = url;
}


function checkcity(form_name)
{
	return true;
	if(!document[form_name].city.value){
		alert("Please enter City!");
		return false;
	}

	return true;
}

function clipboard(copyfrom)
{
	Copied = profilelink.createTextRange();
	Copied.execCommand("Copy");
}

function searchcouple(form_name,looking_value)
{
	if(looking_value == 2){
		document[form_name].p_age_from.disabled=false;
		document[form_name].p_age_to.disabled=false;
		document[form_name].p_height.disabled=false;
		document[form_name].p_weight.disabled=false;
		document[form_name].p_bodytype.disabled=false;
		document[form_name].p_haircolor.disabled=false;
		document[form_name].p_eyecolor.disabled=false;
		document[form_name].p_smoking.disabled=false;
		document[form_name].p_drinking.disabled=false;
		document[form_name].p_ethnicity.disabled=false;
	} else {
		document[form_name].p_age_from.disabled=true;
		document[form_name].p_age_to.disabled=true;
		document[form_name].p_height.disabled=true;
		document[form_name].p_weight.disabled=true;
		document[form_name].p_bodytype.disabled=true;
		document[form_name].p_haircolor.disabled=true;
		document[form_name].p_eyecolor.disabled=true;
		document[form_name].p_smoking.disabled=true;
		document[form_name].p_drinking.disabled=true;
		document[form_name].p_ethnicity.disabled=true;
	}
}