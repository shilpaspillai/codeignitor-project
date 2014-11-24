<?php
 class user_model extends CI_Model{
     

     function validate($username,$password)
        {
        //function for inserting users
         $this->db->from('user_details');
         $this->db->select('*');
         $this->db->where('w_email',$username);
         $login=$this->db->get()->result();
         if(is_array($login) && count($login) == 1)
          {
           $this->details = $login[0];
           if($login[0]->role == 1)
           $this->set_session();
           return array('status'=>true,'mode'=>'admin');
           }
              else if($login[0]->role==2)
                        {
                        $this->set_session();
                        return array('status'=>true,'mode'=>'user');
                        }
                    else
                     {
                     return array('status'=>false,'mode'=>'admin','msg'=>'incorrect username or password');
                     }
        }
          function set_session() {
            		 $this->session->set_userdata( array(
			'id' => $this->details->id,
		        'w_email' => $this->details->w_email,
                         'entry_role' => $this->details->role,
              	         'isLoggedIn' => true
			)
		);
	}
        function role_Check()
        {
          if(($this->session->userdata['entry_role'])==1)
           {
             return true;
           }
           else
           {
             return false;
           }
        }
        function userData($fname,$sname,$cname,$newcompany,$usrpf,$usremail,$pasword)
        {
          $qry="select p_email from user_details where p_email='$usremail'";
          $qr=mysql_query($qry);
          if(mysql_num_rows($qr)>0)
         {   
         $error=true;
         redirect('admin/index',refresh);
         }
         else
        {
           if(($newcompany == NULL)||($newcompany == ""))
           {

        $qry="insert into user_details(firstname,surname,company_name,profession,p_email,password,newcompany)values('$fname','$sname','$cname','$usrpf','$usremail','$pasword','$newcompany')";}
       else{
           $qry="insert into user_details(firstname,surname,company_name,profession,p_email,password)values('$fname','$sname','$newcompany','$usrpf','$usremail','$pasword')";}
        }
        $qr=mysql_query($qry);   
       if($qr)
       {
       return true;
       }
       else
      {
      return false;    
      }
      }
       
     
    function getUserEmail($cemail)
    {
         $this->db->from('user_details') ; 
         $this->db->where('p_email',$cemail);
               $q=$this->db->get();
                if($q->num_rows()>0)
                {  return "EMAIL-ID already exisit!!!";
                }
                   else
                     {
                    return "";
                     }
     }
     function readCompanyData($cname)
     {
      
         $this->db->from('company_details');
         $this->db->where('company_name',$cname);
         $q=$this->db->get();
         return ($q->num_rows()>0)? $q->row():FALSE;
       
     }
     function readData($usremail)
     {
       $this->db->from('user_details');
       $this->db->where('p_email',$usremail);
       $this->db->limit(1);
       $q=$this->db->get();       
       return ($q->num_rows()>0)?$q->row():FALSE;
     }
     
     
    function updateData($fname,$sname,$wemail,$pemail,$pfn,$link,$twit,$face,$h_ad1,$h_ad2,$city,$cpcode,$country,$telenum,$mobnum,$cnamebr,$ind,$ad1,$ad2,$comcity,$counpcode,$ccountry,$ctele,$cfax,$cemail,$cweb,$lnprofile,$twprofile,$fbprofile)
     {
    $qry="insert into user_details(firstname,surname,w_email,p_email,profession,linkedin,twitter,facebook,haddress1,haddress2,city,postcode,country,telephone,mobile,company_name,industry_sector,adress1,adress2,c_city,c_postcode,c_country,c_telephone,c_fax,c_email,c_website,ln_com_profile,tw_com_profile,fb_com_profile)values('$fname','$sname','$wemail','$pemail','$pfn','$link','$twit','$face','$h_ad1','$h_ad2','$city','$cpcode','$country',$telenum,$mobnum,'$cnamebr','$ind','$ad1','$ad2','$comcity','$counpcode','$ccountry',$ctele,'$cfax','$cemail','$cweb','$lnprofile','$twprofile','$fbprofile')";
    if($qry)
    return true;
    else 
    return false;    
    }
       
 }       
    
       
 
     
?>
  
      
       