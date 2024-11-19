<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools_model extends CI_Model {

	public function getCustomers($valor){
		$this->db->select("id,nombre as label,dui");
		$this->db->from("clientes");
		$this->db->like("id",$valor);
		$this->db->or_like("nombre",$valor);
		$resultados = $this->db->get();
		return $resultados->result_array();
	}

	public function getVentas($id){
		$this->db->select("v.*,c.nombre");
		$this->db->from("ventas v");
		$this->db->join("clientes c","v.cliente_id = c.id");
		$this->db->where("v.cliente_id",$id);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else
		{ 
		return false;
		}
	}

	public function getConsolidado($id){
		$this->db->select("dt.*,p.nombre as nombre, dt.importe as total1, dt.cantidad as quantity, dt.id as idv");
		$this->db->from("detalle_venta dt");
		$this->db->join("ventas v","v.id = dt.venta_id");
		$this->db->join("clientes c","c.id = v.cliente_id");
		$this->db->join("productos p","p.id = dt.producto_id");
		$this->db->where("v.cliente_id =",$id);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else
		{
		return false;
		}
	}

	public function getConsolidado1($id){
		$this->db->select("dt.*,p.nombre as nombre, dt.importe as total, dt.id as idv");
		$this->db->select('SUM(dt.cantidad) as quantity');
		$this->db->select('SUM(dt.importe) as total1');
		$this->db->from("detalle_venta dt");
		$this->db->join("ventas v","v.id = dt.venta_id");
		$this->db->join("clientes c","c.id = v.cliente_id");
		$this->db->join("productos p","p.id = dt.producto_id");
		$this->db->where("v.cliente_id =",$id);
		$this->db->group_by("dt.producto_id");
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else
		{
		return false;
		}
	}

	public function update_dt($idv,$data){
		$this->db->where("id",$idv);
		$this->db->update("detalle_venta",$data);
	}

	//PARA GENERAR DOCUMENTOS ANEXOS A FACTURAS DE CENTROS ESCOLARES

		public function getVenta($id){
		$this->db->select("v.*,c.nombre,c.*,c.dui as documento,tc.nombre as tipocomprobante,u.nombres as usuario_v");
		$this->db->from("ventas v");
		$this->db->join("clientes c","v.cliente_id = c.id");
		$this->db->join("usuarios u","v.usuario_id = u.id");
		$this->db->join("tipo_comprobante tc","v.tipo_comprobante_id = tc.id");
		$this->db->where("v.id",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}


	public function getDetalle($id){
		$this->db->select("dt.*,p.codigo,p.nombre,p.tipo as tipo");
		$this->db->from("detalle_venta dt");
		$this->db->order_by("dt.id", "asc");
		$this->db->join("productos p","dt.producto_id = p.id");
		$this->db->where("dt.venta_id",$id);
		$this->db->where("p.tipo","G");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getDetalle1($id){
		$this->db->select("dt.*,p.codigo,p.nombre,p.tipo as tipo");
		$this->db->from("detalle_venta dt");
		$this->db->order_by("dt.id", "asc");
		$this->db->join("productos p","dt.producto_id = p.id");
		$this->db->where("dt.venta_id",$id);
		$this->db->where("p.tipo","E");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	/// FINAL DEL DETALLE
}

