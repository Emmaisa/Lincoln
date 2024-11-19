<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cajas_model extends CI_Model {

	public function getMov_day($fecha,$cajero){
		$this->db->select("m.*,");
		$this->db->from("mov_caja m");
		$this->db->where("m.fecha_mov =",$fecha);
		$this->db->where("m.estado","1");
		$this->db->where("m.cajero_id =",$cajero);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		else
		{
		return false;
		}
	}

	public function getEntradas($fecha,$cajero){
		 if ($fecha) {
            $this->db->select('mov_caja.*');
            $this->db->select('SUM(mov_caja.importe_mov) as entradas');
            $this->db->from("mov_caja");
            $this->db->where('mov_caja.cajero_id', $cajero);
            $this->db->where('mov_caja.fecha_mov', $fecha);
            $this->db->where("mov_caja.estado","1");
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

	public function getSalidas($fecha,$cajero){
		 if ($fecha) {
            $this->db->select('mov_caja.*');
            $this->db->select('SUM(mov_caja.retiro_mov) as salidas');
            $this->db->from("mov_caja");
            $this->db->where('mov_caja.cajero_id', $cajero);
            $this->db->where('mov_caja.fecha_mov', $fecha);
            $this->db->where("mov_caja.estado","1");
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

	


}
