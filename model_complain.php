<?php defined('BASEPATH') OR
exit('No direct script access allowed');

//class Home extends MY_Controller{
	class Model_complain extends CI_Model{

	public function post($data){
		$this->db->insert('complain',$data);
	}

	public function getall(){
		return $this->db->get('complain');
	}
	public function getallpaging($x){

		$c=$this->db->query("select * from complain  limit $x,5");
		if($c->num_rows()>0){return $c;}else{return false;}
	}

	public function selectAll($select, $where){
		$this->db->select($select);
		$this->db->from('complain c');
		$this->db->join('user_session u','u.id_pelanggan=c.id_pelanggan');
		$this->db->where($where);
		return $this->db->get()->result_array();

	}


}
