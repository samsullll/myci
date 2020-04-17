<?php
class M_user extends CI_Model
{
  private $_table = "tb_login";

  public function doLogin(){
    $post = $this->input->post();
    $this->db->where('Username', $post["username"]);
    #$this->db->where('Password', md5($post["password"]));
    $user = $this->db->get($this->_table)->row();

    if($user){
      
      if($user->Level=='Admin') {
        $this->session->set_userdata(['user_logged' => $user]);
        return true;
      }
      else if($user->Level=='Kasir') {
        $this->session->set_userdata(['user_logged' => $user]);
        return true;
      }
    }
    return false;
  }

  public function isNotLogin(){
    return $this->session->userdata('user_logged') === null;
  }

}

 ?>