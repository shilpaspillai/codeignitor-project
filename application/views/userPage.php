<!doctype html>
<html>
    <head>
           <link href="<?php echo base_url('resources/css/bootstrap.min.css'); ?>" rel="stylesheet">
           <link href="<?php echo base_url('resources/css/bootstrap-theme.min.css'); ?>" rel="stylesheet">
           <link href="<?php echo base_url('resources/js/bootstrap.min.js'); ?>" rel="stylesheet">
            <script src="<?php echo base_url('resources/jquery.min.js');?>"></script>
     
    </head>
    <body>
            <?php echo form_open('login/editUserData')?>
                <div class="row">
                <div class="col-md-3 col-md-offset-1">    
                    <div class="header"> <h2> Personal details </h2> </div>
            <div class="s_box1">
            <div class="form-group">
                          <label class="col-sm-6" for="finame">First Name:</label>
                          <input class="form-control" style="cursor:text;" required readonly type="text" name="fname" id="finame" value="<?php echo (isset($groupd) && $groupd)? $group->firstname:''; ?>">
                     </div>
             
                    <div class="form-group">
                      <label class="col-sm-6" for="siname"> Surname:</label>
                      <input class="form-control" style="cursor:text;" required readonly type="text" name="sname" id="sname" value="<?php echo (isset($group) && $group)? $group->surname:'';?>">
                     </div>
             
                     <div class="form-group">
                           <label class="col-sm-6" for="w_email">Work Email Address</label>
                           <input  class="form-control" style="cursor:text;" readonly type="email" name="w_email" id="w_email">
                     </div>
                      <div class="form-group"> 
                           <label class="col-sm-6" for="p_email">Personal Email Address</label>
                           <input type="email" class="form-control" style="cursor:text;"  readonly name="p_email" id="p_email" value="<?php echo (isset($group) && $group)? $group->p_email:'';?>">
                       </div>
                       <div class="form-group">
                            <label class="col-sm-6" for="profession">profession</label>
                            <input required class="form-control" style="cursor:text;" readonly type="text" name="profession" id="profession" value="<?php echo(isset($group) && $group)? $group->profession:'';?>">
                          </div>
                         <div class="form-group"> 
                                 <label class="col-sm-6" for="linkedin"> LinkedIn:</label>
                                 <input   class="form-control" style="cursor:text;" readonly type="url" name="linkedin" id="linkedin">
                         </div>
                            <div class="form-group"> 
                                    <label class="col-sm-6" for="twitter">Twitter:</label>
                                    <input class="form-control" style="cursor:text;" readonly type="url" name="twitter" id="twitter">
                             </div>
                              <div class="form-group">
                                  <label class="col-sm-6" for="facebook"> Facebook:</label> 
                                  <input class="form-control" style="cursor:text;" readonly type="url" name="facebook" id="facebook">
                              </div>
                              <div class="form-group"> 
                                    <label class="col-sm-6" for="home_ad1">  Home Address 1:</label> 
                                    <input class="form-control" style="cursor:text;" required readonly type="text" name="home_ad1" id="home_ad1">
                               </div>
                               <div class="form-group"> 
                                  <label class="col-sm-6" for="home_ad2">  Home Address 2:</label>
                                  <input  class="form-control" style="cursor:text;" required readonly type="text" name="home_ad2" id="home_ad2">
                               </div>
                              <div class="form-group">
                                  <label class="col-sm-6" for="city">City</label>
                                  <input class="form-control" style="cursor:text;" required readonly type="text" name="city" id="city">
                              </div>
                              <div class="form-group">
                                          <label class="col-sm-6" for="c_pcode"> Country/postcode:</label>   
                                          <input class="form-control" style="cursor:text;"  required readonly type="text" name="c_pcode" id="c_pcode">
                              </div>
                             <div class="form-group">  
                               <label class="col-sm-6" for="c_pcode"> Country:</label>     
                               <input class="form-control" style="cursor:text;"  required readonly type="text" name="country" id="country">
                             </div>
                             <div class="form-group">  
                                  <label class="col-sm-6" for="tele_num">  Telephone:</label>     
                                  <input class="form-control" style="cursor:text;" readonly type="number" name="tele_num" id="tele_num">
                             </div>
                              <div class="form-group"> 
                                  <label class="col-sm-6" for="mob_num">Mobile:</label>    
                                    <input class="form-control" style="cursor:text;" readonly type="number" name="mob_num" id="mob_num">
                             </div>
                </div>
                </div>
              <div class="col-md-6">    
                  <div class="header">     
                <h2> company details </h2></div>
                <div class="s_box2">
                  <div class="form-group">
                         <label class="col-sm-6" for="cname_br"> Company Name/Branch:</label>    
                         <input class="form-control" style="cursor:text;" required  readonly type="text" name="cname_br" id="cname_br" value="<?php echo (isset($group) && $group)? $group->company_name:'';?>">
                    </div>
                             <div class="form-group"> 
                                  <label class="col-sm-6" for="industry"> Industry Sector:</label> 
                                  <input class="form-control" style="cursor:text;" required readonly  type="text" name="industry" id="industry" value="<?php echo (isset($groupd) && $groupd)? $groupd->industry:'';?>">
                             </div>
                                   <div class="form-group">
                                       <label class="col-sm-6" for="address1"> Address 1:</label>                 
                                       <input class="form-control" style="cursor:text;"  required readonly type="text" name="address1" id="address1" value="<?php echo (isset($groupd) && $groupd)? $groupd->adress1:'';?>">
                                   </div>
                                  <div class="form-group"> 
                                       <label class="col-sm-6" for="address2"> Address 2:</label>                            
                                      <input class="form-control" style="cursor:text;" required readonly type="text" name="address2" id="address2" value="<?php echo (isset($groupd) && $groupd)? $groupd->adress2:'';?>">
                                  </div>
                                 <div class="form-group">
                                    <label class="col-sm-6" for="com_city">    City  :</label>                     
                                     <input class="form-control" style="cursor:text;" required readonly type="text" name="com_city" id="com_city" value="<?php echo (isset($groupd) && $groupd)? $groupd->city:'';?>">
                                 </div>
                                 <div class="form-group">
                                     <label class="col-sm-6" for="coun_pcode">Country/postcode :</label>                       
                                     <input class="form-control" style="cursor:text;"  required readonly type="text" name="coun_pcode" id="coun_pcode" value="<?php echo (isset($groupd) && $groupd)? $groupd->c_pcode:'';?>">
                                 </div>
                               <div class="form-group">
                                  <label class="col-sm-6" for="c_country">  country:</label>                   
                                  <input class="form-control" style="cursor:text;" required readonly type="text" name="c_country" id="c_country" value="<?php echo (isset($groupd) && $groupd)? $groupd->country:'';?>">
                               </div>
                              <div class="form-group">
                                    <label class="col-sm-6" for="c_tele">Telephone:</label>                 
                                    <input  class="form-control" style="cursor:text;" readonly type="number" name="c_tele" id="c_tele" value="<?php echo (isset($groupd) && $groupd)? $groupd->tele:'';?>">
                              </div>
                               <div class="form-group"> 
                                  <label class="col-sm-6" for="c_fax">Fax:</label>                         
                                  <input class="form-control" style="cursor:text;" readonly type="url" name="c_fax" id="c_fax" value="<?php echo (isset($groupd) && $groupd)? $groupd->fax:'';?>">
                               </div>
                                  <div class="form-group">
                                    <label class="col-sm-6" for="c_email"> General Email:</label>                          
                                    <input class="form-control" style="cursor:text;" readonly type="email" name="c_email" id="c_email" value="<?php echo (isset($groupd) && $groupd)? $groupd->g_email:'';?>">
                                  </div>
                              <div class="form-group"> 
                                  <label class="col-sm-6" for="c_web">  Website:</label>                   
                                  <input class="form-control" style="cursor:text;" readonly type="url" name="c_web" id="c_web" value="<?php echo (isset($groupd) && $groupd)? $groupd->website:'';?>">
                              </div>
                              <div class="form-group"> 
                                  <label class="col-sm-6" for="ln_profile">  LinkedIn Company Profile:</label>   
                                  <input class="form-control" style="cursor:text;" readonly type="url" name="ln_profile" id="ln_profile" value="<?php echo (isset($groupd) && $groupd)? $groupd->ln_com_profile:'';?>">
                              </div>
                                 <div class="form-group"> 
                                     <label class="col-sm-6" for="tw_profile">  Twitter Company Profile :</label>       
                                     <input class="form-control" style="cursor:text;" readonly type="url" name="tw_profile" id="tw_profile" value="<?php echo (isset($groupd) && $groupd)? $groupd->tw_com_profile:'';?>">
                                 </div>
                             <div class="form-group"> 
                                  <label class="col-sm-6" for="fb_profile">  Facebook Company Profile  :</label>    
                                  <input class="form-control" style="cursor:text;" readonly type="url" name="fb_profile" id="fb_profile" value="<?php echo (isset($groupd) && $groupd)? $groupd->fb_com_profile:'';?>">
                             </div>
                    <button  name="Edit details" class="btn btn-success">Edit details</button>
                
              </div></div>
            </div>
               
           
                    <div class="msgbox" style="display: none;">
                    enter all fields!!!
                  </div>
   </body>
</html>