// JavaScript Document
function PopUp(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

function Confirm()
{
	return window.confirm("Are you sure you want to delete this record?");	

}