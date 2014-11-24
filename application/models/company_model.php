<?php
class company_model extends CI_Model{
    
    function insert_data($cname, $ind,$ad1,$ad2,$comcity,$counpcode,$ccountry,$ctele,$cfax,$cemail,$cweb,$lnprofile,$twprofile,$fbprofile)
    {
        $qry="insert into company_details(company_name,industry,adress1,adress2,city,c_pcode,country,tele,fax,g_email,website,ln_com_profile,tw_com_profile,fb_com_profile)values('$cname','$ind','$ad1','$ad2','$comcity','$counpcode','$ccountry',$ctele,'$cfax','$cemail','$cweb','$lnprofile','$twprofile','$fbprofile')";
       $res=mysql_query($qry);
       if($res)
       {
           return true;
       }
       else
       {
        return false;
             }
    }
    function getCompanyCountry($cname)
    {
      $this->db->from('company_details'); 
      $this->db->where('company_name',$cname);
      $q=$this->db->get();
      if($q->num_rows()>0)
          return $q->row()->country;
      else 
          return "No Company found";
      
    }
    function getAllgroups()
    {
        $this->db->from('countries');
        $this->db->select('country_name');
        $res=$this->db->get()->result();
        return $res;
    }
     function getAllCompany()
    {
        $this->db->from('company_details');
        $this->db->select('company_name');
        $res=$this->db->get()->result();
        return $res;
    }
}
?>