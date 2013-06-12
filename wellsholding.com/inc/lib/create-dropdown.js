// JavaScript Document
/************************ Create Drop Down *******************************/
function CreateDropDown(form, Options)
{
	var DropDown = form.subcatid;
	Opts = Options.split('|')						// Splits Texts and Values
	MakeEmptyDropDown(DropDown)						// Clears all Existing Options
	if(Opts.length > 1)								// If There is no any Option
	{
		var Option = CreatOption("Select Sub Category", form.subcatid.value, true)
		DropDown.options.add(Option)
		DropDown.disabled = false;
		for(var i=0; i < (Opts.length-1); i++)
		{
			SubCat = Opts[i].split("=");
			Option = CreatOption(SubCat[0], SubCat[1], false)
	 		DropDown.options.add(Option)
		}
	}
	else
	{
		NoElement(DropDown)
	}
}
/*** END **************** Create Drop Down *******************************/
function MakeEmptyDropDown(DropDown)
{
	var i
	for(i=DropDown.options.length-1;i>=0;i--)
	{
		DropDown.remove(i);
	}
}
function NoElement(DropDown)
{
	var Option = CreatOption("No Sub Category", "", true)
	DropDown.options.add(Option)
	DropDown.disabled = true;
}
function CreatOption(Text, Value, Flag)
{
	var option = document.createElement("option");	// First Element
	option.text = Text
	option.value = Value
	if(Flag) 
		option.selected = "selected"
	return option;
}
/****************************************************************************************/






/************************ Create Drop Down *******************************/
function CreateDropDown2(form, Options)
{
	var DropDown = form.subcatid2;
	Opts = Options.split('|')						// Splits Texts and Values
	MakeEmptyDropDown2(DropDown)						// Clears all Existing Options
	if(Opts.length > 1)								// If There is no any Option
	{
		var Option = CreatOption2("Select Sub Category", form.subcatid2.value, true)
		DropDown.options.add(Option)
		DropDown.disabled = false;
		for(var i=0; i < (Opts.length-1); i++)
		{
			SubCat = Opts[i].split("=");
			Option = CreatOption2(SubCat[0], SubCat[1], false)
	 		DropDown.options.add(Option)
		}
	}
	else
	{
		NoElement2(DropDown)
	}
}
/*** END **************** Create Drop Down *******************************/
function MakeEmptyDropDown2(DropDown)
{
	var i
	for(i=DropDown.options.length-1;i>=0;i--)
	{
		DropDown.remove(i);
	}
}
function NoElement2(DropDown)
{
	var Option = CreatOption("No Sub Category", "", true)
	DropDown.options.add(Option)
	DropDown.disabled = true;
}
function CreatOption2(Text, Value, Flag)
{
	var option = document.createElement("option");	// First Element
	option.text = Text
	option.value = Value
	if(Flag) 
		option.selected = "selected"
	return option;
}
/****************************************************************************************/