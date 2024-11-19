<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas_model extends CI_Model 
{
	public function getVentas(){
		$this->db->select("v.*,c.nombre,tc.nombre as tipocomprobante");
		$this->db->from("ventas v");
		$this->db->join("clientes c","v.cliente_id = c.id");
		$this->db->join("tipo_comprobante tc","v.tipo_comprobante_id = tc.id");
		$this->db->where("v.estado","0");
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else
		{ 
		return false;
		}
	}

	public function getVentasCash(){
		$this->db->select("v.*,c.nombre,tc.nombre as tipocomprobante");
		$this->db->from("ventas v");
		$this->db->join("clientes c","v.cliente_id = c.id");
		$this->db->join("tipo_comprobante tc","v.tipo_comprobante_id = tc.id");
		$this->db->where("v.estado","0");
		$this->db->where("v.tpago_id","1");
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else
		{
		return false;
		}
	}

	public function getVentasCheck(){
		$this->db->select("v.*,c.nombre,tc.nombre as tipocomprobante");
		$this->db->from("ventas v");
		$this->db->join("clientes c","v.cliente_id = c.id");
		$this->db->join("tipo_comprobante tc","v.tipo_comprobante_id = tc.id");
		$this->db->where("v.estado","0");
		$this->db->where("v.tpago_id","2");
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{ 
		return false;
		}
	}
	
	public function getVentasbyDate($fechainicio,$fechafin){
		$this->db->select("v.*,c.nombre,tc.nombre as tipocomprobante");
		$this->db->from("ventas v");
		$this->db->join("clientes c","v.cliente_id = c.id");
		$this->db->join("tipo_comprobante tc","v.tipo_comprobante_id = tc.id");
		$this->db->where("v.fecha >=",$fechainicio);
		$this->db->where("v.fecha <=",$fechafin);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else
		{
		return false;
		}
	}

	public function getVentasbyProd($id,$fechainicio,$fechafin){
		$this->db->select("dt.*,p.nombre as nombre, dt.importe as total, v.fecha as fecha, v.id as idventa, p.costo as costo");
		$this->db->from("detalle_venta dt");
		$this->db->join("productos p","p.id = dt.producto_id");
		$this->db->join("ventas v","v.id = dt.venta_id");
		$this->db->where("v.fecha <=",$fechafin);
		$this->db->where("v.fecha >=",$fechainicio);
		$this->db->where("dt.producto_id =",$id);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else
		{
		return false;
		}
	}

	public function getVenta($id){
		$this->db->select("v.*,c.nombre,c.*,c.dui as documento,tc.nombre as tipocomprobante,u.nombres as usuario_v, c.dui as codcde, c.ce_cod as ce_cod");
		$this->db->from("ventas v");
		$this->db->join("clientes c","v.cliente_id = c.id");
		$this->db->join("usuarios u","v.usuario_id = u.id");
		$this->db->join("tipo_comprobante tc","v.tipo_comprobante_id = tc.id");
		$this->db->where("v.id",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getVenta_ch($id){
		$this->db->select("v.*,v.id as id");
		$this->db->from("ventas v");
		$this->db->where("v.id",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getDetalle($id){
		$this->db->select("dt.*,p.codigo,p.nombre,p.tipo as tipo, p.unit_med as unidad");
		$this->db->from("detalle_venta dt");
		$this->db->order_by("dt.id", "asc");
		$this->db->join("productos p","dt.producto_id = p.id");
		$this->db->where("dt.venta_id",$id);
		$this->db->where("p.tipo","G");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getDetalle1($id){
		$this->db->select("dt.*,p.codigo,p.nombre,p.tipo as tipo,p.unit_med as unidad");
		$this->db->from("detalle_venta dt");
		$this->db->order_by("dt.id", "asc");
		$this->db->join("productos p","dt.producto_id = p.id");
		$this->db->where("dt.venta_id",$id);
		$this->db->where("p.tipo","E");
		$resultados = $this->db->get();
		return $resultados->result();
	}


	public function getProductinfo($fechainicio,$fechafin,$id){
		    $this->db->select('detalle_venta.*,ventas.fecha as fecha');
            $this->db->select('SUM(detalle_venta.cantidad) as total');
            $this->db->from("detalle_venta");
            $this->db->join("ventas","detalle_venta.venta_id = ventas.id");
            $this->db->where('detalle_venta.producto_id', $id);
            $this->db->where("ventas.fecha >=",$fechainicio);
			$this->db->where("ventas.fecha <=",$fechafin);
            $advance = $this->db->get();
            return $advance->row();        
	}

	public function getTotalex($id){
		 if ($id) {
            $this->db->select('detalle_venta.*,productos.tipo as tipo');
            $this->db->select('SUM(detalle_venta.importe) as exento');
            $this->db->from("detalle_venta");
            $this->db->join("productos","detalle_venta.producto_id = productos.id");
            $this->db->where('detalle_venta.venta_id', $id);
            $this->db->where("productos.tipo","E");
            $advance = $this->db->get();
            if ($advance->num_rows() > 0) {
                return $advance->row();
            } else {
                return FALSE;
            }
        	} else {
            return FALSE;
        }
	}

	public function getTotalgra($id){
		 if ($id) {
            $this->db->select('detalle_venta.*,productos.tipo as tipo');
            $this->db->select('SUM(detalle_venta.importe) as gravado');
            $this->db->from("detalle_venta");
            $this->db->join("productos","detalle_venta.producto_id = productos.id");
            $this->db->where('detalle_venta.venta_id', $id);
            $this->db->where("productos.tipo","G");
            $advance = $this->db->get();
            if ($advance->num_rows() > 0) {
                return $advance->row();
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
	}

	public function getComprobantes(){
		$resultados = $this->db->get("tipo_comprobante");
		return $resultados->result();
	}

	public function getFormapago(){
		$resultados = $this->db->get("tipo_pago");
		return $resultados->result();
	} 

	public function getComprobante($idcomprobante){
		$this->db->where("id",$idcomprobante);
		$resultado = $this->db->get("tipo_comprobante");
		return $resultado->row();
	}

	public function getComprobante2($idcomprobante){
		$this->db->select("cantidad");
		$this->db->from("tipo_comprobante");
		$this->db->where("id",$idcomprobante);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getcotizados($valor){
		$this->db->select("id,codigo,nombre as label,descripcion,precio as public,precio1 as tienda,precio2 as bono,precio3 as colegio,stock,");
		$this->db->from("productos");
		$this->db->like("codigo",$valor);
		$this->db->or_like("nombre",$valor);
		$resultados = $this->db->get();
		return $resultados->result_array();
	}


	public function getproductos($valor){
		$this->db->select("id,codigo,nombre as label,descripcion,precio as precio,stock,tipo");
		$this->db->from("productos");
		$this->db->like("codigo",$valor);
		$this->db->or_like("nombre",$valor);
		$resultados = $this->db->get();
		return $resultados->result_array();
	}

	public function getproductos2($valor){
		$this->db->select("id,codigo,nombre as label,descripcion,precio1 as precio,stock,tipo");
		$this->db->from("productos");
		$this->db->like("codigo",$valor);
		$this->db->or_like("nombre",$valor);
		$resultados = $this->db->get();
		return $resultados->result_array();
	}

	public function getproductos3($valor){
		$this->db->select("id,codigo,nombre as label,descripcion,precio3 as precio,stock,tipo");
		$this->db->from("productos");
		$this->db->like("codigo",$valor);
		$this->db->or_like("nombre",$valor);
		$resultados = $this->db->get();
		return $resultados->result_array();
	}

	public function save($data){
		return $this->db->insert("ventas",$data);
	}

	public function lastID(){
		return $this->db->insert_id();
	}

	public function updateComprobante($idcomprobante,$data){
		$this->db->where("id",$idcomprobante);
		$this->db->update("tipo_comprobante",$data);
	}

	public function save_detalle($data){
		$this->db->insert("detalle_venta",$data);
	}

	public function save_mov($data){
		$this->db->insert("mov_caja",$data);
	}

	public function update_mov($idventa,$data1){
		$this->db->where("ref_mov",$idventa);
		$this->db->update("mov_caja",$data1);
	}

	public function update_vstatus($id,$data){
		$this->db->where("id",$id);
		$this->db->update("ventas",$data);
	}

}
