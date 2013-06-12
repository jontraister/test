function isEmpty(Field, Msg)
{
	if(Field.value == ""){
		alert(Msg)
		Field.focus()
		return true
	}
	return false
}
function isNotSame(Field1, Field2, Msg)
{
	if(Field1.value != Field2.value)
	{
		alert(Msg)
		Field1.focus()
		return true
	}
	return false
}
function isNotValidEmail(Email, Msg)
{
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   	if(reg.test(Email.value) == false) 
	{
      	alert(Msg)
		Email.focus()
      	return true
	}
	return false
}

function isNotNo(Field, Msg)
{
	if(isNaN(Field.value))
	{
		alert(Msg)
		Field.focus()
		return true
	}
	return false
}
function isInvalidLength(Field, Length, Msg)
{
	if(eval(Field.value.length) < eval(Length))
	{
			alert(Msg)
			Field.focus()
			return true
	}
	return false
}
	  
function Clear(Form)
{
	Form.reset
	return false
}

function isNotValidCharacters(Sec)
{
	if(! ( Sec.value == "JK904" || Sec.value == "jk904" || Sec.value == "Jk904" || Sec.value == "jK904") ) 
	{
		alert('Please Type The Correct Value You See in The Image')
		Sec.focus()
		return true 
	}	
	return false
}
/************************************************************/
function ValidateEmpty(Field, ID)
{
	var Msg = document.getElementById(ID)
	if(Field.value == "")
	{
		Msg.className = "ShowError4EmptyTextField"
		
		return false
	}
	else
	{
		Msg.className = "HideError4EmptyTextField"
		return true
	}
}
function ValidateEmail(Email, ID)
{
	var Msg = document.getElementById(ID)
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   	if(reg.test(Email.value) == false) 
	{
	    Msg.className = "ShowError4EmptyTextField"
		Msg.innerHTML = "Please Enter a Valid Email Address";
	
      	return false
	}
	else
	{
		Msg.className = "HideError4EmptyTextField"
		return true
	}
}

function MatchPasswords(Pass1, Pass2, ID)
{
	var Msg = document.getElementById(ID)
	if(Pass2.value == "")
	{
		Msg.innerHTML = "Please Enter Confirm Password";
		Msg.className = "ShowError4EmptyTextField"
		
		return false
	}
	if(Pass1.value != Pass2.value)
	{
		Msg.innerHTML = "Password and Confirm Password are not same";
		Msg.className = "ShowError4EmptyTextField"
		return false
	}
	else
	{
		Msg.className = "HideError4EmptyTextField"
		return true
	}
}

function MatchEmails(Email1, Email2, ID)
{
	var Msg = document.getElementById(ID)
	if(Email2.value == "")
	{
		Msg.innerHTML = "Please Enter a Valid Confirm Email Address";
		Msg.className = "ShowError4EmptyTextField"
		
		return false	
	}
	else if(Email1.value != Email2.value)
	{
		Msg.innerHTML = "Email and Confirm Email are not Same";
		
		Msg.className = "ShowError4EmptyTextField"
		return false
	}
	else
	{
		Msg.className = "HideError4EmptyTextField"
		return true
	}
}
function ValidateRadio(RadioFields, ID)
{
	var Msg = document.getElementById(ID)
	var nRadios = RadioFields.length
	var Marked = 0;
	for(i=0; i<nRadios; i++){
		if(RadioFields[i].checked)
			Marked++;
	}
	if(Marked == 0){
		Msg.className = "ShowError4EmptyTextField"
		return false
	}else{
		Msg.className = "HideError4EmptyTextField"
		return true
	}
}
function ValidateZipCode(Zip, ID)
{
	var Msg = document.getElementById(ID)
	var reg =  /^\d{5}([\-]\d{4})?$/;
	
   	if(reg.test(Zip.value) == false) 
	{
	    Msg.className = "ShowError4EmptyTextField"
		Msg.innerHTML = "Please Enter a Valid Zipcode";
	
      	return false
	}
	else
	{
		Msg.className = "HideError4EmptyTextField"
		return true
	}
}
function MatchFields(Field1, Field2, ID)
{
	var Msg = document.getElementById(ID)
	if(Field1.value != Field2.value)
	{
		Msg.className = "ShowError4EmptyTextField"
		return false
	}
	else
	{
		Msg.className = "HideError4EmptyTextField"
		return true
	}
}
function isNotNo(Field, Msg)
{
	var Msg = document.getElementById(ID)
	if(isNaN(Msg.value))
	{
		Msg.className = "ShowError4EmptyTextField"
		return false
	}
	else
	{
	Msg.className = "HideError4EmptyTextField"
		return true
	}
}
function ValidateCheckboxes(CheckBoxFields, ID, nChecks)
{  

	var Msg = document.getElementById(ID)
	var Marked = 0;
	
	if(nChecks == 1){
		if(CheckBoxFields.checked)
			Marked++;
	}
	else if(nChecks > 1)
	{
		for(i=0; i < nChecks; i++){
			if(CheckBoxFields[i].checked)
				Marked++;
		}
	}
	if(Marked == 0){
		Msg.className = "ShowError4EmptyTextField"
		return false
	}else{
		Msg.className = "HideError4EmptyTextField"
		return true
	}
}
function ValidateCheckBox(CheckBox, ID)
{
	var Msg = document.getElementById(ID)
	if(CheckBox.checked)
	{
		Msg.className = "HideError4EmptyTextField"
		return true
		
	}
	else
	{	Msg.className = "ShowError4EmptyTextField"
	
		return false
	}
}
