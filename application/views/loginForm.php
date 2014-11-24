<!doctype html>
<html>
    <head>
       <link href="<?php echo base_url('resources/css/bootstrap.min.css'); ?>" rel="stylesheet">
           <link href="<?php echo base_url('resources/css/bootstrap-theme.min.css'); ?>" rel="stylesheet">
           <link href="<?php echo base_url('resources/js/bootstrap.min.js'); ?>" rel="stylesheet">
            <script src="<?php echo base_url('resources/jquery.min.js');?>"></script> 
              <script>
               $(document).ready(function(){
                  
                   var valid=true;
                    $("submit").click(function(){
                       $("input[required]").each(function(){
                           if($(this).val()==''){
                               console.log("error in login");
                               $(this).addClass('input-error');
                               valid=false;
                                           }
                             $("input[type=email]").each(function(){
                           if($(this).val()==''){
                               console.log("error in login");
                               $(this).addClass('input-error');
                               valid=false;
                               
                           }
                           else
                           {
                               console.log("success");
                               $(this).removeClass('input-error');
                               valid=true;
                           }
                           if(!valid)
                           {
                            event.preventDefault();   
                           }
                       });
                   });
                   
               });
               });
           </script>
           </head> 

       <body>
                  
                      <div class="admin-data">
                         <div class="row">
                       <div class="col-sd-6 col-lg-offset-3">
                          <?php if(isset($usererror))
                           {echo'<p style="color:red">enter a valid username and password.. </p>';}
                                
                               ?> 
                          <?php echo form_open('login/check_User')?>
                           <h3><?php echo $this->session->flashdata('alert_err');?></h3>
                           <div class="form-group"> 
                               <label for="username" name="username" id="username"> username:</label>
                               <input class="form-control"  type="email" name="username" id="username">
                           </div>
                           <div class="form-group"> 
                               <label for="password" name="password" id="password"> password:</label>
                               <input class="form-control" required  type="password" name="password" id="password">
                           </div>
                           <a href="<?php echo base_url('admin/memberRegister')?>"><button type="button">BECOME A MEMBER</button></a>   
                           <button type="submit">Login</button>
                       </div></div></div>
    </body>
</html>












