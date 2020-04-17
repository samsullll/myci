<?php
class Template{
    protected $_CI;
    function __construct(){
        $this->_CI=&get_instance();		
		$this->_CI->load->model('penelitian/m_jurnal_issn');
    }
    
    function display($template,$data=null){
        $data['_content']=$this->_CI->load->view($template,$data,true);
        $data['_header']=$this->_CI->load->view('template/header',$data,true);
        $data['_sidebar']=$this->_CI->load->view('template/sidebar',$data,true);
		
		//check if user login exist as a reviewer
		$nik = $this->_CI->session->userdata('username');
		$data_reviewer = $this->_CI->m_jurnal_issn->cariReviewer($nik);
		
		if($data_reviewer -> num_rows() > 0){
				
			$data['dt_reviewer']=$this->_CI->m_jurnal_issn->cariReviewer2($nik);	
			$data['jml_reviewer'] = $thi->_CI->count($data['dt_reviewer']);
			
			//get count review jurnal_issn taks
			$data['tasks_review_issn'] = $this->_CI->m_jurnal_issn->getTaskReviewISSN ($nik);			
            $data['_reviewer']=$this->_CI->load->view('template/reviewer',$data,true);
        }
		
        $this->_CI->load->view('/template.php',$data);
    }
}