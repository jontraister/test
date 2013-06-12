<? ob_start(); session_start();?>
<? include('sess.php');?>
<? include('admin_header.php');?>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
        
        
        
        <tr>
          <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="15" align="center" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="15" align="center" valign="top"> <table width="90%" border="0" cellspacing="0" cellpadding="3">
                           <tr>
                              <td colspan="3">&nbsp;</td>
                              </tr>
                            <tr>
                              <td width="157" align="left" class="menulink"><a href="category.php?act=add" >Add New Category</a></td>
                              <td width="573"><? if($_GET['id'] == "ad")
						  			echo '<div  class="ok"  >Category is added successfully. </div>';
									if($_GET['id'] == "up")
						  			echo '<div class="ok"  >Category is updated successfully.</div>';
									if($_GET['id'] == "catex")
						  			echo '<div  class="ok" >Please first delete subcategories of this category.</div>';									if($_GET['id'] == "delt")
						  			echo '<div  class="ok"   >Category is deleted successfully.</div>';
									 
						  										
								?></td>
                              <td width="144"   align="right" class="viewall"> <a href="category.php?act=li"  >View All Category</a></td>
                            </tr>
                             <tr>
                              <td width="157" align="left">  </td>
                              <td width="573">&nbsp;</td>
                              <td align="right" >&nbsp; </td>
                            </tr>
                            <tr >
                              <td colspan="3">                              </td>
                            </tr>
                            <? 
						switch($Act)
						{
						case "add":
						 
					 
									
						?>
                            <tr>
                              <td colspan="3" valign="top">
                              <fieldset>
                             <legend class="lableheading">Add New Category </legend>
                             <table width="100%" border="0" align="center" cellpadding="10" cellspacing="0">
                        <form action="../inc/Category.php?sw=add" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                    <tr>
                                      <td align="right" class="lable"> Category Name : </td>
                                      <td align="left" valign="top"><input type="text" name="name" id="name"onblur="ValidateEmpty(this,'cn')"  class="normalinput"   />                                      </td>
                                      </tr>
                                    
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td align="left" valign="top"><input type="submit" class="button"  onclick="return validateReg(form1)" value="Add Category"/></td>
                                      </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <script type="text/javascript">
function validateReg(form)
{
	 
        if(isEmpty(form.name, "Please Enter Category name")) return false
		
}
                          </script>
                                  </form>
                              </table>
                              </fieldset>
                              </td>
                            </tr>
                            <?
					  
					   break;
				       case "li":
						 ?>
                            <tr>
                              <td colspan="3" align="left"> <fieldset>
                                  <legend class="lableheading">List Of Category </legend>
                                  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
                                  <? 
                        //  $RS = GetAllCategories();
							 $strSQL = "SELECT * FROM ".PRE."category";
	                   
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
                                    <td width="7%" class="head">No</td>
                                    <td width="69%" class="head">Category  Name</td>
                                    <td width="9%" class="head">&nbsp;</td>
                                    <td width="15%" class="head">&nbsp;</td>
                                  </tr>
                                  <? 	
									while($ROW = GetRow($RS))
									{  	
										$i++;
										$css = $css == "row1" ? "row3" : "row1";
										$id = $ROW['id'];
										
										$image=$ROW['image'];	
										 										
								 ?>
                                  <tr>
                                    <td class="<?=$css?>"><?=$i?></td>
                                    <td class="<?=$css?>"><?=$ROW['name']?></td>
                                    <td class="<?=$css?>">&nbsp;</td>
                                    <td class="<?=$css?>"><a href="category.php?act=edit&amp;id=<?=$ROW['id']?>"><img src="../adminicons/edit.gif" alt="Edit" width="16" height="16" border="0" /></a>&nbsp; &nbsp;<a href="../inc/Category.php?sw=del&id=<?=$ROW['id']?>"> <img src="../adminicons/del.gif" alt="Delete" width="16" height="16" border="0" onclick="return Confirm()" /></a></td>
                                  </tr>
                                  <? 
									}//end while
									?>
                                    <tr>
                                    <td colspan="4"  >
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
						 $RS = GetCategoryById($id);
						 if(Records($RS))
						 {
						 	$ROW = GetRow($RS);
						?>
                            <tr>
                              <td colspan="3" align="left"><fieldset>
                                  <legend class="lableheading">Update Category </legend><table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" >
                                  <form id="form2" name="form1" method="post" enctype="multipart/form-data" action="../inc/Category.php?sw=edit">
                                    
                                    <tr>
                                      <td width="251" class="lable">
                                      <input name="id" type="hidden" id="id" value="<?=$id?>" />
                                          </td>
                                      <td width="369">&nbsp;</td>
                                      <td width="231" rowspan="5" align="left" valign="top"><span class="<?=$css?>"><br />
                                      </span></td>
                                    </tr>
                                    <tr>
                                      <td align="right" class="lable"> Category Name : </td>
                                      <td><input name="name" type="text" id="name"onblur="ValidateEmpty(this,'cn')" value="<?=$ROW['name']?>" />                                      </td>
                                    </tr>
                                    
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td><input name="input" type="submit" class="button"  onclick="return validateReg(form1)" value="Update category"/></td>
                                      <td width="1">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <script type="text/javascript">
function validateReg(form)
{
	 if(isEmpty(form.name, "Please Enter Category name")) return false

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
                            
                             
                          </table>                   </td>
                  </tr>
                </table>                   </td>
                    </tr>
              </table>                 </td>
              </tr>
          </table></td>
        </tr>
      </table>
      <?php include('footer.php')?>