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
               
               $("#company").change(function(){
                    console.log('12');
                     if($(this).val() == "other")
                       { $("#slide").show();
                        console.log('bc');
                       }
                     else
                       {
                       $("#slide").hide(); 
                       }
                   
                   $.ajax({
                       url:'<?php echo site_url('login/getCompanyCountry'); ?>',
                       data:'cname='+$("#company").val(),
                       success:function(data)
                       {
                        $("#message").html(data);
                       }
                   });
                  });
               $("#usremail").change(function(){
              $.ajax({
               url:'<?php echo site_url('login/getUserEmail'); ?>',
               data:'cemail='+$("#usremail").val(),
               success:function(data)
              {
              $("#email-message").html(data);
              }
             });
              });
        
               $("form[name=newuser]").submit(function(event){
               var valid = true;
               console.log('abc');
              
               
           
            $("input[required]").each(function(){
                if($(this).val()== '')
                {
                 valid=false;
                 $(this).addClass('input-error');
                   $('.msgalert').show();
                }
                else
                {
                 valid = true;
                 $(this).removeClass('input-error');   
                }
            
            });
            $("input[type=email]").each(function(){
                var eml=$(this).val();
                var em=/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
               if(em.test(eml)){   
                  console.log("valid email");
                  valid=true;
                  $(this).removeClass('input-error');
                }
                else
                {
                   console.log("invalid email id");
                    valid=false;
                    $(this).addClass('input-error');
                     $('.msgalert').show();
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
                      <div class="col-md-6 col-md-offset-1">
                       <?php $attributes=array('name' => 'newuser','novalidate' => '');
                        echo form_open('login/getDetail',$attributes)?>
                                 <div class="container">
                                <div class="form-group">            
                              <label class="col-sm-4" for="firstname">First Name:</label>
                               <input class="form-control" required type="text" name="firstname" id="firstname">
                             </div>
                                  <div class="form-group">   
                                     <label class="col-sm-6" for="surname">  Surname:</label>
                                       <input class="form-control" required type="text" name="surname" id="surname">
                                  </div>
                          
                                        <div class="form-group">
                                          <label class="col-sm-6" for="company">Company:</label>
                                          <select class="form-control" required name="company" id="company">
                                          <option selected=""></option>
                                           <?php
                                             foreach ($groups as $row)
                                             {
                                                 echo '<option value="'.$row->company_name.'">'.$row->company_name.'</option>';     
                                             }
                                             ?>
                                 <option value="other">Other</option>
                                            </select>  </div>
                                     
                                     <div id="slide" style="display:none"><div class="form-group">
                                    <label class="col-sm-6" for="newcompany">New Company Name:</label>
                                   <input class="form-control" required type="text" name="newcompany" id="newcompany">
                                   </div></div>    
                               <div class="form-group">  
                                  <label class="col-sm-6" for="usrprofession">Profession:</label>
                                  <input class="form-control" required type="text" name="usrprofession" id="usrprofession">
                               </div>
                               
                            <div class="form-group">  
                                <?php if(isset($error))
                                {
                                    echo '<p style="color:red">email id already exist</p>';
                                }
                                 ?>
                              
                             <label class="col-sm-6" for="usremail">Email:</label>
                            <input class="form-control" type="email" name="usremail" id="usremail">
                            </div>
                     <div class="form-group"> 
                     <label class="col-sm-6" for="usrpassword">Password:</label>
                    <input class="form-control" required type="password" name="usrpassword" id="usrpassword">
                     </div>
                  <button  name="submit" class="btn btn-success">Save</button></div>
                     </div> </div>
                  <div class="alert alert-success" id="message"></div>
                  <div class="alert alert-success" id="email-message"></div>
         </body>
</html>
