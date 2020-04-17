<?php 

class M_data extends CI_Model
{
	private $_table = "tb_barang";

	function tampil_data(){
		return $this->db->get('tb_barang')->result();
	}

	function generate_kode (){
		return $this->db->query("SELECT BRG_Baru() as Kode_barang")->row();
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function delete($Kode_barang)
    {
        return $this->db->delete($this->_table, array("Kode_barang" => $Kode_barang));
    }

	public function get_barang_keyword($keyword){
			$this->db->select('*');
			$this->db->from('tb_barang');
			$this->db->like('Nama_barang',$keyword);
			$this->db->or_like('Merk',$keyword);
			return $this->db->get()->result();
	}
}
?>
