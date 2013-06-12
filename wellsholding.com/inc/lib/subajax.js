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

function GetSubSubCat(subcatId)
{
   
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request")
		return
	}
	var url="../inc/Sub-SubCat.php?subcatid="+subcatId+"&sw=gsubcat"
	url=url+"&sid="+Math.random()
		 
	xmlHttp.onreadystatechange=ndlevelsubcat
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}


function ndlevelsubcat() 
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
		var Response = xmlHttp.responseText
		 
		var SubCats = Response
		if(SubCats == '0'){
			NoElement(document.fr.subcatid2)
			
		}
		else{
			CreateDropDown2(document.form1, SubCats)
		}
		
	}
}
/*     ........................................*/


