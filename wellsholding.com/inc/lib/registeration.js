// JavaScript Document
var xmlHttp
function ValidateUserName(uname)
{
	if(uname == "")
		return false
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request")
		return
	}
	var url="inc/Company.php?sw=validateusername-ajax&uname="+uname
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=validateusername
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}
function validateusername() 
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
		var Response = xmlHttp.responseText
		if(Response == '')
		{
			document.getElementById("isnewuser").value = 'yes'
		}
		else
		{
			
			document.getElementById("isnewuser").value = 'no'
		}
		document.getElementById("usernamemsg").innerHTML = Response
		EndWait()
		
	}
	else
	{
		
		StartWait()
	}
}
function ValidateEmail(email)
{
	if(email == "")
		return false
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request")
		return
	}
	var url="inc/Company.php?sw=validateemail-ajax&email="+email
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=validateemail
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}
function validateemail() 
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
		var Response = xmlHttp.responseText
		if(Response == '')
		{
			document.getElementById("isnewemail").value = 'yes'
		}
		else
		{
			document.getElementById("isnewemail").value = 'no'
			
		}
		document.getElementById("emailmsg").innerHTML = Response
		EndWait()
	}
	else
	{
		
		StartWait()
	}
}
function ValidateServiceName(servicename)
{
	if(servicename == "")
		return false
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request")
		return
	}
	var url="inc/Company.php?sw=validateservicename-ajax&servicename="+servicename
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=validateservicename
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}
function validateservicename() 
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
		var Response = xmlHttp.responseText
		if(Response == '')
		{
			document.getElementById("isnewservice").value = 'yes'
		}
		else
		{
			
			document.getElementById("isnewservice").value = 'no'
		}
		document.getElementById("servicenamemsg").innerHTML = Response
		EndWait()
	}
	else
	{
		StartWait()
	}
}