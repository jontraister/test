<? ob_start(); 
session_start();?>
<? require_once('sess.php');?>
<? require_once('admin_header.php');?>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        
        <tr>
            <td height="350" align="center" valign="top" >
<?

 
	switch($Act)
	{
		case "li":
?>
<table width="90%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>   <fieldset><legend class="lableheading">Content Managment System</legend><table width="100%" border="0" cellpadding="3" cellspacing="0"  >
              
	<?
		$RS = GetAllPageContents();
        if(Records($RS))
		{
		?>
          <tr>
            <td width="44" height="39" align="center" class="head"><span class="lable" style="font-weight: bold">Sr.</span></td>

            <td width="472" align="left" class="head" style="font-weight: bold">Detail</td>
            <td width="198" align="left" class="head" style="font-weight: bold"> Modified At</td>
            <td width="70" class="head" style="font-weight: bold">Action</td>
          </tr>
          <?
			$i = 0;
        	while($ROW = GetRow($RS))
			{
				$i++;
				$css = $css == "row1" ? "row2" : "row1";
				$ID = $ROW['id'];
				$Heading = $ROW['heading'];
				$contents =  strlen($ROW['contents']) > 100 ? substr($ROW['contents'],0,100)." ..." : $ROW['contents'];
				 
				$LastDate = date("G:i:s, d/m/Y", $ROW['date']);
		?>
          <tr>
            <td align="left" valign="top" class="<?=$css?>">&nbsp;
                <?=$i?></td>

            <td align="left" class="<?=$css?>"><font color="#0173D6"><b><a href="contents.php?act=edit&id=<?=$ID?>"><?=$Heading?></a></b></font><br />             </td>
            <td align="left" class="<?=$css?>"><?=$LastDate?></td>
            <td align="center" class="<?=$css?>"><a href="contents.php?act=edit&id=<?=$ID?>"><img src="../adminicons/edit.gif" alt="Click to View Detail"   border="0" /></a>&nbsp;&nbsp;</td>
          </tr>
          <?
          	} // End While
		  ?>
          <?
       	} // If Num Rows
		else
		{
			?>
          <tr>
            <td colspan="5" class="error">No Page Content Found</td>
          </tr>
          <?
		}
	   ?>
        </table>
    </fieldset></td>
  </tr>
</table>

        
<?			
		break;
		case "add":
		break;
		
		case "edit":
		$Id = $_GET['id'];
		$RS = GetPageContentsById($Id);
		if(Records($RS))
		{
			$ROW = GetRow($RS);
			$ID = $ROW['id'];
			$Heading = $ROW['heading'];
			$title = $ROW['title'];
			$description = $ROW['description'];
			$Contents = $ROW['contents'];
			$Meta = $ROW['meta'];
		
?>
<table width="90%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td> <fieldset><legend class="lableheading"><?=$Heading?></legend><form name="form1" action="../inc/Contents.php?sw=edit" method="post">
	<table width="90%" border="0" cellpadding="3" cellspacing="0">
           
          <tr>
            <td >&nbsp;</td>
            <td colspan="2" align="left" class="normalinput" style="font-weight: bold" ><span class="normalinput" style="font-weight: bold">Page Heading:</span></td>
          </tr>
          <tr>
            <td >&nbsp;</td>
            <td colspan="2" align="left" style="font-weight: bold" ><input name="heading" type="text" id="heading" value="<?=$Heading?>" size="100"/></td></tr>
          <tr>
            <td width="24" >&nbsp;</td>
            <td colspan="2" align="left" class="normalinput" style="font-weight: bold" ><span class="normalinput" style="font-weight: bold">Page Title:</span></td>
            </tr>
        
          <tr>
            <td >&nbsp;</td>
            <td colspan="2" align="left"  ><input name="title" type="text" id="title" value="<?=$title?>" size="100"/></td></tr>
          <tr>
            <td >&nbsp;</td>
            <td colspan="2" align="left" class="normalinput" style="font-weight: bold"><span class="normalinput" style="font-weight: bold"><span class="normalinput" style="font-weight: bold">Page</span> Description:</span></td>
          </tr>
          <tr>
            <td >&nbsp;</td>
            <td colspan="2" align="left" style="font-weight: bold"><textarea name="description" cols="80" rows="2" id="description"><?=$description?></textarea></td></tr>
          <tr>
            <td >&nbsp;</td>
            <td colspan="2" align="left" class="normalinput" style="font-weight: bold"><span class="normalinput" style="font-weight: bold">Meta KeyWords:</span></td>
          </tr>
          <tr>
            <td >&nbsp;</td>
            <td colspan="2" align="left" style="font-weight: bold"><textarea name="meta" cols="80" rows="3" id="meta"><?=$Meta?></textarea></td></tr>
          <tr>
            <td >&nbsp;</td>
            <td colspan="2" align="left" class="normalinput" style="font-weight: bold"><span class="normalinput" style="font-weight: bold">Contents</span></td>
            </tr>
          <tr>
            <td >&nbsp;</td>
            <td width="662" align="left" class="row2">
            <? include_once("fckeditor/fckeditor.php") ;
$oFCKeditor = new FCKeditor('contents', '700', '500') ;
$oFCKeditor->BasePath = 'fckeditor/' ;
$oFCKeditor->Value =stripslashes($Contents);
$oFCKeditor->Create() ;

/*makefck('longdes', '700', '800');*/  ?>&nbsp;                      </td>
            <td width="23" align="left" >&nbsp;</td>
          </tr>
          <tr>
            <td >&nbsp;</td>
            <td align="left" >&nbsp;</td>
            <td align="left" >&nbsp;</td>
          </tr>
          <tr>
            <td >&nbsp;</td>
            <td align="left"><input type="hidden" name="id" id="id" value="<?=$ID?>"/>
              <input name="button" type="submit" class="button" id="button" value="Update" onclick="ValidateMe(form1)"/></td>
            <td align="left">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          </table>
          </form>
          <script type="text/javascript">
		  function ValidateMe(form)
		  {
          	 updateRTE('contents');
			}
          </script>
          <?php
       	} // If Num Rows
		else
		{
			?>

            <div class="error" style="margin-left:30px; text-align:left;">Invalid Page Refrence</div>

          <?php
		}
	   ?></fieldset></td>
  </tr>
</table>
<?php
		break;
	}
?>
<br />
<br /></td>
            <p> </p>
          </tr>
      </table>
      <?php include('footer.php')?>