<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_user');
    $this->load->library('form_validation');
  }

  public function index()
  {
    //jika form login di submit
    if ($this->input->post()) {
      if ($this->m_user->doLogin()) redirect(site_url('crud'));
    }

    // tampilan halaman Login
    $this->load->view('v_login.php');
  }

  public function logout()
  {
    // hancurkan semua enchant_dict_add_to_session
    $this->session->sess_destroy();
    redirect(site_url('login'));
  }
}
