<? ob_start(); session_start();?>
<? include('sess.php');?>
<? include('admin_header.php');?>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="15" align="center" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td height="15" align="center" valign="top"><table width="90%" border="0" cellspacing="0" cellpadding="3">
                                <tr>
                                  <td colspan="3">&nbsp;</td>
                                </tr>
                                <tr>
                                  <!--                              <td width="209" align="left" class="menulink"><a href="benners.php?act=add" >Add New Banner </a></td>
-->
                                  <td width="725"><? if($_GET['id'] == "ad")
						  			echo '<div  class="ok"  >Image is added successfully. </div>';
									if($_GET['id'] == "up")
						  			echo '<div class="ok"  >Image is updated successfully.</div>';
									if($_GET['id'] == "catex")
						  			echo '<div  class="ok" >First delete Image of this Benner .</div>';									if($_GET['id'] == "delt")
						  			echo '<div  class="ok">Image is deleted successfully.</div>';
									 
						  										
								?></td>
                                  <td width="147"   align="right" class="viewall"><a href="benners.php?act=li" >View All Images</a></td>
                                </tr>
                                <tr>
                                  <td width="725" align="left"></td>
                                  <td width="147">&nbsp;</td>
                                  <td width="2" align="right" >&nbsp;</td>
                                </tr>
                                <tr >
                                  <td colspan="3"></td>
                                </tr>
                                <? 
						switch($Act)
						{
						case "add":
						 
					 
									
						?>
                                <tr>
                                  <td colspan="3" valign="top"><fieldset>
                                    <legend class="lableheading">Add New Gallery</legend>
                                    <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
                                      <form action="../inc/Benners.php?sw=add" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                        <tr>
                                          <td width="236" class="lable">&nbsp;</td>
                                          <td width="519">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td align="right" class="lable">Title : </td>
                                          <td align="left"><input type="text" name="title" id="title"  class="normalinput"   /></td>
                                        </tr>
                                        <tr>
                                          <td align="right" class="lable">Upload Image:</td>
                                          <td align="left"  ><input name="image" type="file" id="image" /></td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;</td>
                                          <td align="left"><input type="submit" class="button"  onclick="return validateReg(form1)" value="Add Image"/></td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                        </tr>
                                        <script type="text/javascript">
function validateReg(form)
{
	 if(isEmpty(form.title, "Please Enter Title")) return false
	 if(isEmpty(form.image, "Please Upload Image")) return false
}
                          </script>
                                      </form>
                                    </table>
                                    </fieldset></td>
                                </tr>
                                <?
					  
					   break;
				       case "li":
						 ?>
                                <tr>
                                  <td colspan="3" align="left"><fieldset>
                                    <legend class="lableheading">List Of Images</legend>
                                    <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
                                      <? 
                        //  $RS = GetAllCategories();
							 $strSQL = "SELECT * FROM ".PRE."benners order by id Asc";
	                   
					    $ResultPerPage = 10;
					    $LinksPerPage = 10;
						  
					    $Paging = new PagedResults($ResultPerPage, $LinksPerPage);
  						$RS = $Paging -> RunPagging($strSQL );
					  
					   echo  '<div class="ok2"  >Total '.$Paging->GetTotalRecords().' Records Found</div>';
							if(Records($RS))
							{	
								$i = 0;
						?>
                                      <tr>
                                        <td width="12%" class="head">No</td>
                                        <td width="10%" class="head" valign="top">Title</td>
                                        <td width="63%" align="center" class="head">Image</td>
                                        <td width="15%" align="center" class="head">Actions</td>
                                      </tr>
                                      <? 	
									while($ROW = GetRow($RS))
									{  	
										$i++;
										$css = $css == "row1" ? "row3" : "row1";
										$id = $ROW['id'];
										
										$pic=$ROW['image'];										
								 ?>
                                      <tr>
                                        <td class="<?=$css?>"><?=$i?></td>
                                        <td class="<?=$css?>" valign="top"><?=$ROW['title']?></td>
                                        <td align="center" class="<?=$css?>"><img src="../pics/banner/<?=$pic?>"  name="img2" width="550" height="100" id="img2" /></td>
                                        <td align="center" class="<?=$css?>"><a href="benners.php?act=edit&id=<?=$ROW['id']?>"><img src="../adminicons/edit.gif" alt="Edit" width="16" height="16" border="0" /></a>&nbsp; &nbsp;<!--<a href="../inc/Benners.php?sw=del&id=<?=$ROW['id']?>"> <img src="../adminicons/del.gif" alt="Delete" width="16" height="16" border="0" onclick="return Confirm()" /></a>--></td>
                                      </tr>
                                      <? 
									}//end while
									?>
                                      <tr>
                                        <td colspan="4"  ><div id="pagging">
                                            <?php
							$Paging -> DisplayPaging($Paging->InfoArray);
							?>
                                          </div></td>
                                      </tr>
                                      <?
									
								
							}//end if
							else 
							{
							?>
                                      <tr>
                                        <td colspan="4" class="error"> Sorry No Record Found</td>
                                      </tr>
                                      <? 
							}//end else
							?>
                                    </table>
                                    </fieldset></td>
                                </tr>
                                <?
						 break;
						 case "edit":
						 $id = $_GET['id'];
						 $RS = GetBennersById($id);
						 if(Records($RS))
						 {
						 	$ROW = GetRow($RS);
							if($ROW['image']=="")
							{
							$pic="nopic.jpg";
							}
							else
							$pic=$ROW['image'];
						?>
                                <tr>
                                  <td colspan="3" align="left"><fieldset>
                                    <legend class="lableheading">Update Gallery </legend>
                                    <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" >
                                      <form id="form2" name="form1" method="post" enctype="multipart/form-data" action="../inc/Benners.php?sw=edit">
                                        <tr>
                                          <td width="202" class="lable"><input name="id" type="hidden" id="id" value="<?=$id?>" />
                                            <input type="hidden" name="oldpic" id="oldpic"  value="<?=$ROW["image"]?>" />
                                          </td>
                                          <td width="443">&nbsp;</td>
                                          <td width="214" rowspan="26" valign="top"><span class="lable">Current image:</span><span class="<?=$css?>"><br />
                                            <img src="../pics/banner/<?=$pic?>" alt=""  name="img2" width="150" height="100" id="img" /></span></td>
                                        </tr>
                                        <tr>
                                          <td align="right" class="lable">Title : </td>
                                          <td align="left"><input name="title" type="text" id="title" value="<?=$ROW['title']?>" /></td>
                                        </tr>
                                        <tr>
                                          <td align="right" class="lable">Update Image :</td>
                                          <td align="left"><input type="file" name="image" id="image" /></td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;</td>
                                          <td align="left"><input name="input" type="submit" class="button"  onclick="return validateReg(form1)" value="Update Image"/></td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td width="1">&nbsp;</td>
                                        </tr>
                                        <script type="text/javascript">
function validateReg(form)
{		
	 if(isEmpty(form.title, "Please Enter Title")) return false
}
                              </script>
                                      </form>
                                    </table>
                                    </fieldset></td>
                                </tr>
                                <?
						}
						 break;
						}//end switch
					   ?>
                              </table></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <?php include('footer.php')?>

