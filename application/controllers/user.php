<?php
	class User extends  CI_Controller{
		function __construct(){
			parent::__construct();
		}
		
		function index (){
			echo "Hello Word of CI";
		}
		
		function nama($nama='',$status=''){
			echo 'Nama User : ';
			echo '<br>';
			echo $nama;
			echo '<br>';
			echo $status;
			echo '<br>';
		}
	}
	
?>