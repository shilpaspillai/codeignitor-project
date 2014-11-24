<?php
class login extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        
    }
    function getCompanyCountry()
    {
        if(isset($_GET['cname']))
        {
           $this->load->model('company_model','company');
           echo $this->company->getCompanyCountry($_GET['cname']);
        }
        else {
            echo 'NO Company Found';
        }
    }
    function getUserEmail()
    {
        if(isset($_GET['cemail']))
        {
            $this->load->model('user_model');
            echo $this->user_model->getUserEmail($_GET['cemail']);
        }
    }
     function  check_User()
    {
     $username=$this->input->post('username');
     $password=$this->input->post('password');
     $this->load->model('user_model');
     $qry=$this->user_model->validate($username,$password);
      if($qry['status'])
                            {
                              switch ($qry['mode'])
                               {
                                case 'admin':$this->load->helper('form');
                                             $this->load->view('newCompany');
                                             break;
                                case 'user':$this->load->helper('form');
                                            $this->load->view('user_page'); 
                                             break;
                                  default :$this->session->set_flashdata("alert_err", "Enter a valid user name and password");
                                           $this->load->helper('form');
                                           $this->load->view('loginForm');
                                            break;
     
                                }
    
//        $qry=$this->user_model->validate_user($username, $password);
                            if($qry['status'])
                            {
                              switch ($qry['mode'])
                               {
                                case 'admin':redirect('login/show_Adminpage','refresh');
                                             break;
                                case 'user':redirect('login/show_Userpage','refresh');
                                             break;
                                default :$this->session->set_flashdata("alert_err", "Enter a valid user name and password");
                                          redirect('admin/index','refresh');
                                          break;
                                }
                            }
                            else
                            {
                            $this->session->set_flashdata("alert_er", "Enter a valid user name"); 
                            redirect('admin/index','refresh');
                            }
                            }
    
 } 
 function show_Adminpage()
 {  
    $this->load->helper('form');
    $this->load->model('company_model');
   $data['groups']=$this->company_model->getAllgroups();
    $this->load->view('newCompany',$data);
 }
 function show_Userpage()
 {
   $this->load->helper('form');
   $this->load->view('userPage');   
 }
 function editUserData()
 {
$usremail=$this->input->post('p_email');
$company=$this->input->post('cname_br');
$this->load->model('user_model');
$data['userdata']=$this->user_model->readData($usremail);
$data['companydata']=$this->user_model->readCompanyData($company);
$this->load->helper('form');
$this->load->view('editdetails',$data);
 }
 function updateUserData()
 {
$fname=$this->input->post('finame');
$sname=$this->input->post('siname');
$wemail=$this->input->post('w_email');
$pemail=$this->input->post('p_email');
$pfn=$this->input->post('profession');
$link=$this->input->post('linkedin');
$twit=$this->input->post('twitter');
$face=$this->input->post('facebook');
$h_ad1=$this->input->post('home_ad1');
$h_ad2=$this->input->post('home_ad2');
$city=$this->input->post('city');
$cpcode=$this->input->post('c_pcode');
$country=$this->input->post('country');
$telenum=$this->input->post('tele_num');
$mobnum=$this->input->post('mob_num');
$cnamebr=$this->input->post('cname_br');
$ind=$this->input->post('industry');
$ad1=$this->input->post('address1');
$ad2=$this->input->post('address2');
$comcity=$this->input->post('com_city');
$counpcode=$this->input->post('coun_pcode');
$ccountry=$this->input->post('c_country');
$ctele=$this->input->post('c_tele');
$cfax=$this->input->post('c_fax');
$cemail=$this->input->post('c_email');
$cweb=$this->input->post('c_web');
$lnprofile=$this->input->post('ln_profile');
$twprofile=$this->input->post('tw_profile');
$fbprofile=$this->input->post('fb_profile');
 
$this->load->model('user_model');
 $ret=$this->user_model->updateData($fname,$sname,$wemail,$pemail,$pfn,$link,$twit,$face,$h_ad1,$h_ad2,$city,$cpcode,$country,$telenum,$mobnum,$cnamebr,$ind,$ad1,$ad2,$comcity,$counpcode,$ccountry,$ctele,$cfax,$cemail,$cweb,$lnprofile,$twprofile,$fbprofile);
   if($ret)
   {
      $this->load->helper('form');
     $this->load->view('loginForm');
   }
   else
       {
        $this->load->helper('form');
       $this->load->view('editdetails');
       }
     
 }

 function getDetail()
 {
     $fname=$this->input->post('firstname');
     $sname=$this->input->post('surname');
     $cname=$this->input->post('company');
     $newcompany=$this->input->post('newcompany');
     $usrpf=$this->input->post('usrprofession');
     $usremail=$this->input->post('usremail');
     $pasword=$this->input->post('usrpassword');
  
$this->load->model('user_model');
$result=$this->user_model->userData($fname,$sname,$cname,$newcompany,$usrpf,$usremail,$pasword);
 if($result)
   {
  $this->load->model('user_model');
  $data['groupd']=$this->user_model->readCompanyData($cname);
             if($data['groupd'])
             {
  $data['group']=$this->user_model->readData($usremail);
  $data['groupnew']=$newcompany;
  $this->load->helper('form');
  $this->load->view('userPage',$data);
             }
 else
    {
  $data['group']=$this->user_model->readData($usremail);
  $data['groupnew']=$newcompany;
  $this->load->helper('form');
  $this->load->view('userPage',$data);
    }
  }
 else
  {
  $this->session->set_flashdata("alert_userer","user data not entered successfully!!!");
  redirect('admin/index','refresh');
  }
 }
  
}
?>
