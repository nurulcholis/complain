<?php defined('BASEPATH') OR
exit('No direct script access allowed');

//class Home extends MY_Controller{
	class Main extends CI_Controller{
	public function __construct(){
		parent:: __construct();
		$this->load->model("model_solusi");
		$this->load->model("model_login");
		$this->load->model("model_admin");
		$this->load->model("model_user");
	}

	public function index(){
		$data['pelanggan'] = $this->model_complain->selectAll(
			['c.id_pelanggan','c.no_ktp','c.nama','c.alamat']
		);
		$data['ve']='user/form-complain';
		$data['inok']='';
		$data['topik']= $this->model_admin->viewtopik();
		$data['sol']=$this->model_solusi->getsol();
		$this->load->view('dashboard',$data);
	}

	//function cari
	function tampilcari(){
		$sl=$this->model_solusi->getsol();
		if(isset($_POST['submit'])){

		$c=$_POST['cari'];

		$hs=$this->model_solusi->carisolusi($c)->result();
			if(isset($hs)){
				$data['rec']=$hs;
			}else{	$data['rec']=null;}
		}else{
		$data['rec']=$sl->result();
		}
		$data['sol']=$sl;
		$data['ve']='user/view-solusi';
		$this->load->view('dashboard',$data);
	}

	public function register_admin(){
		$data['ve']='admin/register';
		$data['sol']=$this->model_solusi->getsol();
		$this->load->view('dashboard',$data);
	}

	public function register_user(){
			$data['ve']='user/register';
			$data['sol']=$this->model_solusi->getsol();
			$this->load->view('user-login',$data);
	}

	public function regisAdmin(){
		if(isset($_GET['submit'])){
		$nm=$_GET['nm'];
		$kd=$_GET['nip'];
		$unm=$_GET['username'];
		$pass=$_GET['password'];
		$data=array('password'=>$pass,
		'nama'=>$nm,
		'nip'=>$kd,
		'username'=>$unm);
		$this->model_login->post($data);
		$this->session->set_flashdata('pesandaftarlogin','<tr><td><marquee scrolldelay="0.5">Buat Akun BERHASIL, Silakan Melakukan Login Untuk Mulai Menggunakan E-Rigister. . . !</marquee></td></tr>');
		redirect('admin_login');
		}else{
			$data['con']='regisAdmin/reg_log';
			$this->load->view('dashboard',$data);

		}
	}

	public function regisUser(){
		if(isset($_GET['submit'])){
		$nm=$_GET['nm'];
		$kd=$_GET['no_ktp'];
		$unm=$_GET['id_pelanggan'];
		$pass=$_GET['password'];
		$almt=$_GET['alamat'];

		$data=array('password'=>$pass,
		'nama'=>$nm,
		'no_ktp'=>$kd,
		'id_pelanggan'=>$unm,
		'alamat'=>$almt);

		$this->model_user->post($data);
		$this->session->set_flashdata('pesandaftarlogin','<tr><td><marquee scrolldelay="0.5">Buat Akun BERHASIL, Silakan Melakukan Login Untuk Mulai Menggunakan E-Rigister. . . !</marquee></td></tr>');
		redirect('user_login');
		}else{
			$data['con']='regisUser/reg_log';
			$this->load->view('dashboard',$data);

		}
	}

}

