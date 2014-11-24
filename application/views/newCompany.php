<!doctype html>
<html>
    <head>
     <link href="<?php echo base_url('resources/css/bootstrap.min.css'); ?>" rel="stylesheet">
           <link href="<?php echo base_url('resources/css/bootstrap-theme.min.css'); ?>" rel="stylesheet">
           <link href="<?php echo base_url('resources/js/bootstrap.min.js'); ?>" rel="stylesheet">
           <link href="<?php echo base_url('resources/style.css'); ?>" rel="stylesheet">
            <script src="<?php echo base_url('resources/jquery.min.js');?>"></script>
        <script>
          $(document).ready(function(){
            $("form[name=newcompany]").submit(function(event){
             var valid=true;
                $("input[required]").each(function(){
                if($(this).val()== '')
                {
                   valid=false;
                 $(this).addClass('input-error');
                 $("#msgbox").show();
                  }
                else
                {
                 valid = true;
                 $(this).removeClass('input-error');   
                }
            });
                     $("input[type=email]").each(function(){
                      var eml =$(this).val();
                       var em =/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
                       if(em.test(eml)){
                           $(this).removeClass('has-error');
                           console.log('valid email');
                           valid=true;
                       }
                       else{
                           console.log("invalid email");
                           $(this).addClass('has-error');
                           $(this).addClass('input-error');
                           valid=false;
                            }
             });
             $("input[type=url]").each(function(){
                 var txt = $(this).val();
                   var re = /(http(s)?:\\)?([\w-]+\.)+[\w-]+[.com|.in|.org]+(\[\?%&=]*)?/;
                   if (re.test(txt)) {
                       $(this).removeClass('has-error');
                       $(this).removeClass('input-error');
                     console.log('valid url');
                     valid=true;
                                      }
                      else {
                  console.log('Please Enter Valid URL');
                  $(this).addClass('has-error');
                   $(this).addClass('input-error');
                  valid=false;
                        }
             });
             $("input[type=number]").each(function(){
                 var num = $(this).val();
                 var filter = /^[0-9-+]+$/;
                 if(filter.test(num)){
                      $(this).removeClass('has-error');
                       $(this).removeClass('input-error');
                     console.log("valid number");
                     valid=true;
                 }
                 else{
                     console.log("enter numbers only");
                      $(this).addClass('has-error');
                       $(this).addClass('input-error');
                     valid=false;
                    }

             });
            
             if(!valid)
             {
              event.preventDefault();
             }
             
          }); 
     });
     </script>
            </head>
    <body>
            <div class="row">
            <div class="col-md-6 col-md-offset-3">
              
                 <?php $attributes=array('name'=>'newcompany','novalidate'=>'');
                 echo form_open('admin/companyDetails',$attributes) ?>
                <div id="msgbox" style="display:none"> <h3>Enter all fields..</h3></div>
                      <h2>ADD NEW COMPANY </h2>
                      <h4><?php echo $this->session->flashdata('alert_error');?></h4>
                       <div class="form-group">
                        <label for="cname">  Company Name </label> 
                        <input required class="form-control" type="text" name="cname" id="cname">
                        </div>
                        <div class="form-group">
                            <label for="industry">Industry Sector</label> 
                             <input class="form-control" required type="text" name="industry" id="industry">
                            </div>
                          <div class="form-group">
                              <label for="address1"> Address 1</label>                 
                              <input required class="form-control" type="text" name="address1" id="address1">
                            </div>
                                <div class="form-group">
                                  <label for="Address2">Address 2</label> 
                                  <input required class="form-control" type="text" name="address2" id="address2">
                                 </div>
                                   <div class="form-group">
                                         <label for="comcity">City</label>                    
                                         <input required  class="form-control" type="text" name="comcity" id="comcity">
                                   </div>
                        <div class="form-group">
                         <label for="comcity"> Country/postcode</label>
                        <input required class="form-control" type="text" name="counpcode" id="counpcode">
                        </div>
                          <div class="form-group">
                              
                              <label for="ctele"> Country:</label><select required name="country"  id="country" class="form-control">
                         
                             <option selected=""></option>
                             <?php
                                             foreach ($groups as $row)
                                             {
                                                 echo '<option value="'.$row->country_name.'">'.$row->country_name.'</option>';     
                                             }
                             ?>
                        </select>
                       </div>
                        <div class="form-group">
                        <label for="ctele"> Telephone</label>
                        <input type="number" class="form-control" name="ctele" id="ctele">
                        </div>
                      <div class="form-group">
                         <label for="cfax">  Fax:</label> 
                         <input class="form-control" type="number" name="cfax" id="cfax">
                      </div>
                     <div class="form-group">  
                          <label for="cemail">  General Email</label>                
                          <input class="form-control" type="email" name="cemail" id="cemail">
                     </div>
                      <div class="form-group">
                         <label for="cweb">  Website:</label>                  
                         <input class="form-control" type="url" name="cweb" id="cweb">
                      </div>
                              <div class="form-group">   
                                  <label for="cweb">   LinkedIn Company Profile </label>     
                                  <input class="form-control" type="url" name="lnprofile" id="lnprofile">
                              </div>
                                 <div class="form-group"> 
                       <label for="twprofile"> Twitter Company Profile  </label>
                       <input type="url" class="form-control" name="twprofile" id="twprofile">
                                 </div>
                       <div class="form-group"> 
                     <label for="fbprofile"> Facebook Company Profile   </label>  
                     <input type="url" class="form-control" name="fbprofile" id="fbprofile">
                       </div>
                    <div class="button">
                    <button name="submit" id="submit" class="btn btn-success">create company</button>
                  </div>
             </div> 
            </div>   
     </body>
</html>
