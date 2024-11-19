<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_model extends CI_Model {
	public function getClientes(){
		$this->db->select("c.*,tc.nombre as tipocliente");
		$this->db->from("clientes c");
		$this->db->join("tipo_cliente tc", "c.tipo_cliente_id = tc.id");
		$this->db->where("c.estado","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getClientes2(){
		$this->db->select("c.*,tc.nombre as tipocliente");
		$this->db->from("clientes c");
		$this->db->join("tipo_cliente tc", "c.tipo_cliente_id = tc.id");
		$this->db->where("c.estado","1");
		$this->db->where("tc.id","4");	
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getClientes3(){
		$this->db->select("c.*,tc.nombre as tipocliente");
		$this->db->from("clientes c");
		$this->db->join("tipo_cliente tc", "c.tipo_cliente_id = tc.id");
		$this->db->where("c.estado","1");
		$this->db->where("tc.id","3");	
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getCliente($id){
		$this->db->where("id",$id);
		$resultado = $this->db->get("clientes");
		return $resultado->row();

	}
	public function save($data){
		return $this->db->insert("clientes",$data);
	}
	public function update($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("clientes",$data);
	}

	public function getTipoClientes(){
		$resultados = $this->db->get("tipo_cliente");
		return $resultados->result();
	}
	
	public function getcustomers($valor){
		$this->db->select("id,nombre,ce_cod as codigo,");
		$this->db->from("clientes");
		$this->db->like("id",$valor);
		$this->db->or_like("nombre",$valor);
		$resultados = $this->db->get();
		return $resultados->result_array();
	}

	
}
