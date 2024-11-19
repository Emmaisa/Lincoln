<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bancos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Bancos_model");
		$this->load->model("Ventas_model");
	}

	
	public function index(){
		$data  = array(
			'ventas' => $this->Ventas_model->getVentas(),
			'bancos' => $this->Bancos_model->getBancos(),
			'ventas1' => $this->Ventas_model->getVentasCash(), 
			'ventas2' => $this->Ventas_model->getVentasCheck(),  
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/ventas/list",$data);
		$this->load->view("layouts/footer");
	}

	public function add(){
		$idventa = $this->input->post("id");
		$data = array(
			"venta1" => $this->Ventas_model->getVenta_ch($idventa),
			'bancos' => $this->Bancos_model->getBancos(),
		);
		$this->load->view("admin/bancos/add",$data);
	}

	public function regcheck(){
		$id = $this->input->post("id");
		$bancoid = $this->input->post("banco");
		$fecha = $this->input->post("fecha");
		$numero = $this->input->post("numero");
		$valor = $this->input->post("valor");
		
			$data  = array(
				'banco_id' => $bancoid,
				'fecha' => $fecha,
				'numero' => $numero,
				'valor' => $valor, 
				'venta_id' => $id,
				'estado' => "1"
			);

			$data1 = array(
			'cheque' => $numero,
			'banco' => $this->Bancos_model->getBanco($bancoid),
			"venta" => $this->Ventas_model->getVenta($id),
			"venta1" => $this->Ventas_model->getVenta_ch($id),
			"detalles" =>$this->Ventas_model->getDetalle($id),
			"detalles1" =>$this->Ventas_model->getDetalle1($id)
			);

			if ($this->Bancos_model->save($data)) {
				$this->load->view("admin/ventas/viewch",$data1);
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."movimientos/ventas");
			}
				
	}

}
