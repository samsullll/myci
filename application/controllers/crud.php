<?php 
class Crud extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
		$this->load->model('m_user');
		$this->load->library('session');
		$this->load->library('form_validation');
		if($this->m_user->isNotLogin()) redirect(site_url('login'));
	}

	function index(){
		$data['title'] = "Dashboard";
        
		$data['tb_barang'] = $this->m_data->tampil_data();
		$this->load->view('v_list',$data);
	}

	function tambah(){
		$data['Kode_barang']=$this->m_data->generate_kode();
		$this->load->view('v_tambah', $data);
	}

	public function tambah_aksi(){
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$config = array
		(
			array(
				'field' => 'Nama_barang',
				'label' => 'Nama Barang',
				'rules' => 'trim|required|min_length[5]|max_length[50]'
			),
			array(
				'field' => 'Merk',
				'label' => 'Merk',
				'rules' => 'trim|required|min_length[5]|max_length[50]'
			),
			array(
				'field' => 'Harga',
				'label' => 'Harga',
				'rules' => 'required|alpha_numeric'
			)
		);
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == TRUE){
			$Kode_barang = $this->input->post('Kode_barang');
			$Nama_barang = $this->input->post('Nama_barang');
			$Merk = $this->input->post('Merk');
			$Harga = $this->input->post('Harga');

			$data = array(
				'Kode_barang' => $Kode_barang,
				'Nama_barang' => $Nama_barang,
				'Merk' => $Merk,
				'Harga' =>$Harga
				);
			$this->m_data->input_data($data,'tb_barang');
		    $data['tb_barang'] = $this->m_data->tampil_data();
   		    $this->load->view("v_list",$data);
		}
		else{
			$data['Kode_barang']=$this->m_data->generate_kode();
			$this->load->view('v_tambah', $data);
		}
		
	}

	function edit($Kode_barang){
		$where = array('Kode_barang' => $Kode_barang);
		$data['tb_barang'] = $this->m_data->edit_data($where,'tb_barang')->result();
		$this->load->view('v_update',$data);
	}

	function update(){
	$Kode_barang = $this->input->post('Kode_barang');
	$Nama_barang = $this->input->post('Nama_barang');
	$Merk = $this->input->post('Merk');
	$Harga = $this->input->post('Harga');

	$data = array(
				'Kode_barang' => $Kode_barang,
				'Nama_barang' => $Nama_barang,
				'Merk' => $Merk,
				'Harga' =>$Harga
				);

	$where = array(
			'Kode_barang' => $Kode_barang
		);
	$this->m_data->update_data($where,$data,'tb_barang');

	$data['tb_barang'] = $this->m_data->tampil_data();
    $this->load->view("v_list",$data);
	}

	function hapus($Kode_barang){
		$where = array('Kode_barang' => $Kode_barang);
		$this->m_data->hapus_data($where,'tb_barang');
		
		$data['tb_barang'] = $this->m_data->tampil_data();
    	$this->load->view("v_list",$data);
	}

	public function delete($Kode_barang=null)
    {
        if (!isset($Kode_barang)) show_404();
        if ($this->m_data->delete($Kode_barang)) {
            redirect(site_url('crud'));
        }
    }

	public function pencarian(){
			$keyword = $this->input->post('keyword');
			$data['tb_barang']=$this->m_data->get_barang_keyword($keyword);
			$this->load->view('v_search',$data);
	}
}
?>