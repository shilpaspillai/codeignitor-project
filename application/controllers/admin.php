<?php
class admin extends CI_Controller
{
    public function __construct() {
        parent::__construct();
    }
   
   function index()
                {  
                  $this->load->helper('form');
                  $this->load->view('loginForm');
		}                   
    function memberRegister()
    {
       $this->load->model('company_model');
       $data['groups']=$this->company_model->getAllCompany();
       $this->load->helper('form');
       $this->load->view('newuser',$data);
    }
    function companyDetails()
    {
        $this->load->model('user_model');
        $data=$this->user_model->role_check();
        if($data)
        {
        $cname=$this->input->post('cname');  
        $ind=$this->input->post('industry');
        $ad1=$this->input->post('address1');
        $ad2=$this->input->post('address2');
        $comcity=$this->input->post('comcity');
        $counpcode=$this->input->post('counpcode');
        $ccountry=$this->input->post('country');
        $ctele=$this->input->post('ctele');
        $cfax=$this->input->post('cfax');
        $cemail=$this->input->post('cemail');
        $cweb=$this->input->post('cweb');
        $lnprofile=$this->input->post('lnprofile');
        $twprofile=$this->input->post('twprofile');
        $fbprofile=$this->input->post('fbprofile');
        $this->load->model('company_model');
       $qry=$this->company_model->insert_data($cname, $ind,$ad1,$ad2,$comcity,$counpcode,$ccountry,$ctele,$cfax,$cemail,$cweb,$lnprofile,$twprofile,$fbprofile);
        if($qry)
        {   
            redirect('admin/index','refresh');
        }
      else
        {
          $this->session->set_flashdata('alert_error',"new company not added successfully");
          redirect('login/show_Adminpage','refresh');
        }
       }
     else
       {  $this->session->set_flashdata('alert_err',"user not  have admin rights for adding new company");
          redirect('admin/index','refresh');    
       }
      }
}

?>




