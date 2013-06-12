<?php
	class _Uploader
	{
		var $File;
		var $FileName;	// New File Name if Random
		var $Name;		// Existing File Name
		var $Path;
		var $Widht;
		var $Height;
		var $FileType;
		var $FileSize;
		var $TempFile;
		var $Ext;
		var $OnlyName;
		var $ResizeToWidhtOnly;
		var $ResizeToHeightOnly;
		var $AllowExt = array();
		
		function _Uploader($_Path = '')
		{
			$this->File = "";
			$this->FileName = "";
			$this->Width = "500";
			$this->Height = "500";
			$this->Path = $_Path;
			$this->ResizeToWidhtOnly = 0;
			$this->ResizeToHeightOnly = 0;
		
		}
		function SetAllowedExts($Exts)
		{
			foreach($Exts as $Index => $Ext)
				array_push($this->AllowExt,strtolower($Ext));
		}
		function SetFile($File)
		{
			$this->File = $File;
			$Name = explode(".",$File['name']);
			$Ext = strtolower($Name[1]);
			$this->OnlyName = $Name[0];
			$this->FileName = time().".".$Ext;

			$this->FileType = $File['type'];
			$this->Name 	= $File['name'];
			$this->Size 	= $File['size'];
			$this->TempFile  	= $File['tmp_name'];
			$Ext = explode ('.', $this->Name);
   			$this->Ext = $Ext[count($Ext)-1];
			list($this->Width, $this->Height) = getimagesize($this->TempFile);
		}
		function GetSize()
		{
			return $this->Size;
		}
		function GetWidth()
		{
			return $this->Width;
		}
		function GetHeight()
		{
			return $this->Height;
		}
		function SetPath($_Path)
		{
			$this->Path = $_Path;
		}
		function SetName($ImageName)
		{
			$this->FileName = $ImageName.".".$this->Ext; 
		}
		function Upload()
		{
			if($this->isValidExt($this->Ext))
			{
				copy($this->File['tmp_name'],$this->Path."/".$this->FileName) or 
					die("Error: File is not uploaded");
				return true;
			}
			else
			{
				echo "Fatal Error: Invalid File Type";
				exit;
			}
		}
		function isValidExt($Ext)
		{
			if(count($this->AllowExt) < 0)
				return true;
			foreach($this->AllowExt as $Index => $ValidExt)
			{
				if(strtolower($ValidExt) == strtolower($Ext))
					return true;
			}
			return false;
		}
		/*function DeleteFile($FileName)
		{
			if(file_exists($this->Path."/".$FileName) && $FileName != '')
				unlink($this->Path."/".$FileName);
			else
				return false;
		}*/
		function DeleteFile($FileName)
		{
			if(file_exists($FileName))
				unlink($FileName);
			else
				return false;
		}
		function RestrictToHeightUpload($Height)
		{
			$this -> ResizeToHeightOnly = $Height;
			$this->UploadReSize();
		}
		function RestrictToWidthUpload($Width)
		{
			$this -> ResizeToWidthOnly = $Width;
			$this->UploadReSize();
		}
		function UploadReSize($Width='', $Height='')
		{
			
		   if($this->FileType == "image/pjpeg" || $this->FileType == "image/jpeg"){
		   		$NewImage = imagecreatefromjpeg($this->TempFile);
	   	   }
		   elseif($this->FileType == "image/x-png" || $this->FileType == "image/png"){
		   		$NewImage = imagecreatefrompng($this->TempFile);
	   	   }
		   elseif($this->FileType == "image/gif"){
		   	$NewImage = imagecreatefromgif($this->TempFile);
	   	   }

		   if($this->ResizeToHeightOnly != 0)
		   {
		   	 $Height = $this->ResizeToHeightOnly;
			 $Width = $this->Width * $this->ResizeToHeightOnly / $this->Height;
			//  echo "H. ". $Height;
		   }
		   if($this->ResizeToWidthOnly != 0)
		   {
		   	 $Width = $this->ResizeToWidthOnly;
			 $Height = $this->Height * $this->ResizeToWidthOnly / $this->Width;
		//	 echo "W ". $Width;
		   }
		   
		   $Ratio = $Width / $Height;
		   $NewWidth = $Width;
		   $NewHeight = $Height;//$Height;  
		 
		///   echo " R ". $Ratio;
	
		  /* if ($Ratio > 1)
		   {
			  $NewWidth = $Width;
			  $NewHeight = $Height;//$Height;  
		   }
		   else
		   {
				 $NewHeight = $Width;
				 $NewWidth =  $Height; 
		   }*/
		   //Resizing
		   if (function_exists(imagecreatetruecolor))
		   {
				$ReSizedImage = imagecreatetruecolor($NewWidth, $NewHeight); 
		   }
		   else
		   {
				die("Error: Please make sure you have GD library ver 2+");
		   }
		   imagecopyresized($ReSizedImage, $NewImage, 0, 0, 0, 0, $NewWidth, $NewHeight, $this->Width, $this->Height);

		  /****************** For Cropping Use Following **********************
		   imagecopyresized($ReSizedImage, $NewImage, 0, 0, 0, 0, $NewWidth, $NewHeight, $NewWidth, $NewHeight); 
	   	  /********************************************************************/
		   
		   ImageJpeg ($ReSizedImage, $this->Path."/".$this->FileName);
	   	   ImageDestroy ($ReSizedImage);
	   	   ImageDestroy ($NewImage);	  
		   return true;
	  }
	  
	function ResetUploader()
	{
		$this->File = "";
		$this->FileName = "";
		$this->Path 	= "";
		$this->FileType = "";
		$this->Name 	= "";
		$this->Size 	= "";
		$this->TempFile	= "";
   		$this->Ext 		= "";

	}
	
}	// End Class
	/*************************************************************************************/


?>