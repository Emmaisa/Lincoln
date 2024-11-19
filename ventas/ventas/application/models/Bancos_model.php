<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bancos_model extends CI_Model {

	public function getBancos(){
		$resultados = $this->db->get("bancos");
		return $resultados->result();
	}

	public function getBanco($id){
		$this->db->where("id",$id);
		$resultado = $this->db->get("bancos");
		return $resultado->row();
	}
	
	public function save($data){
		return $this->db->insert("ch_received",$data);
	}

	public function getChventa($id){
		$this->db->where("venta_id",$id);
		$resultado = $this->db->get("ch_received");
		return $resultado->row();

	}

	public function update($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("categorias",$data);
	}
}
