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
                              <td >&nbsp;</td>
                              <td width="573"><? if($_GET['id'] == "ad")
						  			echo '<div  class="ok"  >Category is added successfully. </div>';
									if($_GET['id'] == "up")
						  			echo '<div class="ok"  >Address is updated successfully.</div>';
									if($_GET['id'] == "catex")
						  			echo '<div  class="ok" >Please first delete subcategories of this category.</div>';									if($_GET['id'] == "delt")
						  			echo '<div  class="ok"   >Category is deleted successfully.</div>';
									 
						  										
								?></td>
                              
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
				       case "li":
						 ?>
                            <tr>
                              <td colspan="3" align="left"> <fieldset>
                                  <legend class="lableheading">Address </legend>
                                  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
                                  <? 
                        //  $RS = GetAllCategories();
							 $strSQL = "SELECT * FROM ".PRE."contact";
	                   
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
                                    <td width="6%" class="head">No</td>
                                    <td width="35%" class="head">Address</td>
                                    <td width="22%" class="head">Phone</td>
                                    <td width="23%" class="head">Enquiries</td>
                                    <td width="14%" class="head">Action</td>
                                  </tr>
                                  <? 	
									while($ROW = GetRow($RS))
									{  	
										$i++;
										$css = $css == "row1" ? "row3" : "row1";
										$id = $ROW['id'];
				   ?>
                                  <tr>
                                   <td class="<?=$css?>"><?=$i?></td>
                                   <td class="<?=$css?>"><?=$ROW['address']?></td>
                                   <td class="<?=$css?>"><?=$ROW['phone']?></td>
                                   <td class="<?=$css?>"><?=$ROW['enq']?></td>
                                   <td class="<?=$css?>"><a href="contactus.php?act=edit&amp;id=<?=$ROW['id']?>"><img src="../adminicons/edit.gif" alt="Edit" width="16" height="16" border="0" /></a></td>
                                  </tr>
                                  <? 
									}//end while
								
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
						 $RS = GetContact($id);
						 if(Records($RS))
						 {
						 	$ROW = GetRow($RS);
						?>
                            <tr>
                              <td colspan="3" align="left"><fieldset>
                                  <legend class="lableheading">Update Category </legend><table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" >
                                  <form id="form2" name="form1" method="post" enctype="multipart/form-data" action="../inc/Contactus.php?sw=edit">
                                    
                                    <tr>
                                      <td width="251" class="lable">
                                      <input name="id" type="hidden" id="id" value="<?=$id?>" />                                          </td>
                                      <td width="369">&nbsp;</td>
                                      
                                    </tr>
                                    <tr>
                                      <td align="right" class="lable" valign="top">  Address : </td>
                                      <td >
                                      <textarea name="address" cols="25" rows="8"><?=$ROW['address']?></textarea>
                                                                          </td>
                                    </tr>
                                    <tr>
                                      <td align="right" class="lable">  Phone : </td>
                                      <td><input name="phone" type="text" id="name"onblur="ValidateEmpty(this,'cn')" value="<?=$ROW['phone']?>" />                                      </td>
                                    </tr>
                                    <tr>
                                      <td align="right" class="lable">  <strong>Enquiries</strong> : </td>
                                      <td><input name="enq" type="text" id="name"onblur="ValidateEmpty(this,'cn')" value="<?=$ROW['enq']?>" />                                      </td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td><input name="input" type="submit" class="button"  onclick="return validateReg(form1)" value="Update"/></td>
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