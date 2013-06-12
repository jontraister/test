<? ob_start(); session_start();?>
<? include('sess.php');?>
<? include('admin_header.php');?>
<script type="text/javascript" src="../inc/lib/ajax.js"></script>
<script type="text/javascript" src="../inc/lib/category.js"></script>
<script type="text/javascript" >
function Navigate()
 {

var str = document.getElementById('catid1').value;

location.href='images.php?typeI='+str;
 }
 </script>

      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="left"><? if($_GET['id'] == "ad")
						  			echo '<div  class="ok" >Image is added successfully.</div>';
									if($_GET['id'] == "up")
						  			echo '<div class="ok"  >Image is updated successfully.</div>';
									if($_GET['id'] == "catex")
									
						  			echo '<div  class="ok" >Please first delete product of this Image.</div>';									if($_GET['id'] == "delt")
						  			echo '<div  class="ok" >Image is deletedsuccessfully.</div>';
									 
						  										
								?> &nbsp;</td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
               
              <td width="79%"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="15" align="center" valign="top">
                    
                   <table width="90%" border="0" cellspacing="0" cellpadding="3">
                            
                            <tr>
                              <td width="223" class="menulink"><a href="images.php?act=add">Add Images</a></td>
                              <td width="446"></td>
                              <td width="205" class="viewall" ><a href="images.php?act=li">View All Images</a></td>
                            </tr>
                            <tr>
                              <td colspan="3" ></td>
                            </tr>
                            <tr >
                              <td colspan="3">                             </td>
                            </tr>
                            <? 
						switch($Act)
						{
						case "add":
								 		
						?>
                            <tr>
                              <td colspan="3"><table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" class="grid">
                                  <form action="../inc/Image.php?sw=add" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                    <tr>
                                      <td colspan="4" class="head">Add Image</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td align="left">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <!--<tr>
                                      <td>&nbsp;</td>
                                      <td align="left" class="lable">Select Category</td>
                                    <?
									$RS = GetAllCategories();
									?>
                                      <td align="left">
                                      <select name="category" id="category">
                                      <option value="" selected="selected">Plesae Select Category</option>
                        			<?
									while($ROW = GetRow($RS))
									{
									$id = $ROW['id'];
									$name = $ROW['name'];
									?>
                                     <option value="<?=$id?>">
                                     <?=$name?>
                                     </option>
                                     <?
									}
									?>
                                    </select>
                                        </td>
                                      <td>&nbsp;</td>
                                    </tr>-->
                                    <tr>
                                      <td width="25">&nbsp;</td>
                                      <td width="176" align="left" class="lable"> Image Name </td>
                                      <td width="217" align="left"><input type="text" name="name" id="name" />                                      </td>
                                      <td width="82">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td align="left" class="lable">Image</td>
                                      <td colspan="2" align="left"><input type="file" name="image" id="image" />
                                      <span class="ok">For Best Quality: 750px X 500px</span></td>
                                    </tr>
                                    <!--<tr>
                                      <td height="77">&nbsp;</td>
                                      <td align="left" class="lable">Discription</td>
                                      <td colspan="2" align="left"><textarea name="des" cols="35" rows="4" id="des" ></textarea></td>
                                    </tr>-->
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td align="left"><input name="Submit" type="submit" class="button"  onclick="return validateReg(form1)" value="Add Image"/></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <script type="text/javascript">
function validateReg(form)
{
 if(isEmpty(form.catid, "Please Select Category name")) return false
	   if(isEmpty(form.name, "Please Enter Image name")) return false
		 if(isEmpty(form.image, "Please Slect Image")) return false
		  
	
}
                          </script>
                                  </form>
                              </table></td>
                            </tr>
                            <?
					  
					   break;
				       case "li":
						 ?>
                            <tr>
                              <td colspan="3" align="center" id="subcats"><table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" class="grid">
                              
                              
                              
                                <!--<tr  >
                                    <td colspan="4" >
                                    <select name="catid1" id="catid1" onBlur="ValidateEmpty(this,'cat')" onChange="Navigate()">
                                    <option value='0'  selected="selected">Select Page</option>
                                          
                                         
                                      </select></td>
                                  </tr>-->
                                   <tr>
                                    <td width="51" class="head">No</td>
<!--                                    <td width="97" class="head">Category</td>
-->                                   <td width="97" class="head">Name</td>
                                    <td width="194" class="head">Image</td>
                                    <td width="68" class="head">Actions</td>
                                  </tr>
                                  
                                 
                                  <?
                           
						  ///  $RS = GetAllSubCategories();
						  
						  
						
						
							 $strSQL = "SELECT * FROM ".PRE."image order by category,id";
						 
					    $ResultPerPage = 10;
					    $LinksPerPage = 10;
						  
					    $Paging = new PagedResults($ResultPerPage, $LinksPerPage);
  						$RS = $Paging -> RunPagging($strSQL );
					  
					   echo  '<div class="ok"  >Total '.$Paging->GetTotalRecords().' Records Found</div>';
							if(Records($RS))
							{
						 ?>
                                
                                  <? 	
									while($ROW = GetRow($RS))
									{  	
										$i++;
										$css = 'row1';
										$pic=$ROW['pic'];
										$category=$ROW['category'];
										$q = Run("SELECT * from ".PRE."category where id = '$category'");
										$qr = GetRow($q);
										
								 ?>
                                 
                                  <tr>
                                    <td class="<?=$css?>" align="left"><?=$i?></td>
<!--                                    <td class="<?=$css?>"><?=$qr['name']?></td>
-->                                    <td class="<?=$css?>"><?=$ROW['name']?></td>
                                    <td class="<?=$css?>">
                                    <img type="image"  name="img" id="img" src="../pics/images/thumb/<?=$pic?>"  height="60" width="100"/> </td>
                                    <td class="<?=$css?>"><a href="images.php?act=edit&amp;id=<?=$ROW['id']?>&amp;catid=<?=$ROW['category']?>"><img src="../adminicons/edit.gif" alt="Edit" width="14" height="15" border="0" /></a>&nbsp;&nbsp;<a href="../inc/Image.php?sw=del&amp;id=<?=$ROW['id']?>"><img src="../adminicons/del.gif" alt="Delete" width="17" height="18" border="0" onClick="return Confirm()" /></a></td>
                                  </tr>
                                  <? 
									}//end while
								?>
                                  <tr>
                                    <td colspan="5"  >
                                     <div id="pagging">
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
                                    <td colspan="5" class="error"> No image exists in selected gallery.</td>
                                  </tr>
                                <? 
							}//end else
							?>
                              </table></td>
                            </tr>
                            <?
						 break;
						  case "edit":
						 $id = $_GET['id'];
						 $RS1 = GetimageById($id);
						 if(Records($RS1))
						 {
						 	$ROW1 = GetRow($RS1);
							$CatId = $ROW1['category'];
							$pic=$ROW1['pic'];
						?>
                            <tr>
                              <td colspan="3" align="center"><table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" class="grid">
                                  <form action="../inc/Image.php?sw=edit" method="post" enctype="multipart/form-data" name="form2" id="form2">
                                    <tr>
                                      <td colspan="4" class="head">Update Image</td>
                                    </tr>
                                    <tr>
                                      <td width="32" class="lable">&nbsp;</td>
                                      <td width="198" class="lable"><input name="id" type="hidden" id="id" value="<?=$id?>" />
                                          <input type="hidden" name="oldpic" id="oldpic"  value="<?=$ROW1["pic"]?>" /></td>
                                      <td colspan="2"><img src="../pics/images/thumb/<?=$pic?>" alt=""  name="img2" width="150" height="100" id="img" /></td>
                                    </tr>
                                    <!--<tr>
                                      <td>&nbsp;</td>
                                      <td class="lable">Select Category</td>
                                      
                                      <td width="443" align="left">
                                      <? $RS2 = GetAllCategories();?>
                                              
							    <select name="category" id="category" onblur="ValidateEmpty(this,'cat')">
                                                  <option value="" selected="selected">Plesae Select Category</option>
													<?
												  while($ROW2 = GetRow($RS2))
													{
														$id = $ROW2['id'];
														$name = $ROW2['name'];
														$sel = $CatId == $id ? "selected" : "";
													?>
													<option value="<?=$id?>" <?=$sel?>>
													<?=$name?>
													</option>
													<?
														}
											?>
									  </select>                                      </td>
                                      <td width="157" rowspan="2" valign="top"></td>
                                    </tr>-->
                                    <tr>
                                      <td class="lable">&nbsp;</td>
                                      <td class="lable" valign="top"> Image Name </td>
                                      <td valign="top"><input name="name" type="text" id="name"  value="<?=$ROW1['name']?>" /></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td class="lable">Image</td>
                                      <td colspan="2" align="left"><input type="file" name="image" id="image" /></td>
                                    </tr>
                                    <!--<tr>
                                      <td height="77">&nbsp;</td>
                                      <td class="lable">Discription</td>
                                      <td colspan="2" align="left"><textarea name="des" cols="35" rows="4" id="des"  ><?=$ROW1['des']?>
                          </textarea></td>
                                    </tr>-->
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td align="left"><input name="input" type="submit" class="button"  onclick="return validateRegg(form2)" value="Update Image"/></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <script type="text/javascript">
function validateRegg(form)
{
	
	   if(isEmpty(form.name, "Please Enter Category name")) return false
		 
		  if(isEmpty(form.des, "Please Enter Detail")) return false
	
	
}
                              </script>
                                  </form>
                              </table></td>
                            </tr>
                            <?
						}
						 break;
						}//end switch
					   ?>
                            <tr>
                              <td colspan="3"></td>
                            </tr>
                        </table>              </td>
                  </tr>
                </table>                 </td>
            </tr>
          </table></td>
        </tr>
      </table>
      <?php include('footer.php')?>