<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores_model extends CI_Model {
	public function getProveedores(){
		$this->db->select("c.*,tc.nombre as tipoproveedor");
		$this->db->from("proveedores c");
		$this->db->join("tipo_proveedor tc", "c.tipo_proveedor_id = tc.id");
		$this->db->where("c.estado","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getProveedors2(){
		$this->db->select("c.*,tc.nombre as tipoproveedor");
		$this->db->from("proveedores c");
		$this->db->join("tipo_proveedor tc", "c.tipo_proveedor = tc.id");
		$this->db->where("c.estado","1");
		$this->db->where("tc.id","4");	
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getProveedors3(){
		$this->db->select("c.*,tc.nombre as tipoproveedor");
		$this->db->from("proveedores c");
		$this->db->join("tipo_proveedor tc", "c.tipo_proveedor = tc.id");
		$this->db->where("c.estado","1");
		$this->db->where("tc.id","3");	
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getProveedor($id){
		$this->db->where("id",$id);
		$resultado = $this->db->get("proveedores");
		return $resultado->row();

	}
	public function save($data){
		return $this->db->insert("proveedores",$data);
	}
	public function update($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("proveedores",$data);
	}

	public function getTipoProveedors(){
		$resultados = $this->db->get("tipo_proveedor");
		return $resultados->result();
	}
	
	public function getcustomers($valor){
		$this->db->select("id,nombre,ce_cod as codigo,");
		$this->db->from("proveedores");
		$this->db->like("id",$valor);
		$this->db->or_like("nombre",$valor);
		$resultados = $this->db->get();
		return $resultados->result_array();
	}

	
}
