var xmlHttp
/************************************************/
function GetXmlHttpObject()
{
	var xmlHttp=null;
	try{
		// Firefox, Opera 8.0+, Safari
		xmlHttp=new XMLHttpRequest();
	}
	catch (e){
		// Internet Explorer
		try{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch (e){
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlHttp;
}
/*******************************/

//Sub Category function

function GetSubCat(CatId)
{
 
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request")
		return
	}
	var url="../inc/SubCat.php?catid="+CatId+"&sw=gscat"
	url=url+"&sid="+Math.random()
		 
	xmlHttp.onreadystatechange=subcat
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}
function subcat() 
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
		var Response = xmlHttp.responseText
		 
		var SubCats = Response
		if(SubCats == '0'){
			NoElement(document.form1.subcatid)
			
		}
		else{
			CreateDropDown(document.form1, SubCats)
		}
		
	}
}

function GetSubCat2(CatId)
{
	
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request")
		return
	}
	var url="../inc/SubCat.php?catid="+CatId+"&sw=gscat"
	url=url+"&sid="+Math.random()
		 
	xmlHttp.onreadystatechange=subcat2
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}
function subcat2() 
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
		var Response = xmlHttp.responseText
		
		var SubCats = Response
		if(SubCats == '0'){
			NoElement(document.fr.subcatid)
			
		}
		else{
			CreateDropDown(document.form1, SubCats)
		}
		
	}
}
/*     ........................................*/


