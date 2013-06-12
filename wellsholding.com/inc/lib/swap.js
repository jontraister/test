// JavaScript Document
function SwapImage(Img, ImgSrc)
{
	Img.src = ImgSrc
}

function Toggle(ShowEle, HideEle)
{
	document.getElementById(ShowEle).className = "show"
	document.getElementById(HideEle).className = "hide"
}
function Show(ShowEle)
{
	document.getElementById(ShowEle).className = "show"
}
function Hide(HideEle)
{
	document.getElementById(HideEle).className = "hide"
}
function ShowBox(ShowEle)
{
	document.getElementById(ShowEle).className = "show bdr"
}

function ToggleDisableEnable(EnableEle, DisableEle)
{
	var EnableElement = document.getElementById(EnableEle);
	var DisableElement = document.getElementById(DisableEle);
	var EnableEleType = EnableElement.type
	var DisableEleType = DisableElement.type
	
	/******** Enabling ***********/
	switch(EnableEleType)
	{
		
		case "radio":
			EnableElement.checked = true	
		break;
		case "text":
			EnableElement.value = ''
			EnableElement.readonly = false
		break;
	}
	/** END ****** Enabling ***********/
	/******** Disabling ***********/
	switch(DisableEleType)
	{
		
		case "radio":
			DisableElement.checked = false
		break;
		case "text":
			DisableElement.value = ''
			DisableElement.readonly = true
		break;
	}
	/** END ****** Disabling ***********/
	
	
}
 