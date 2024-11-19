<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Ventas_model");
	}

	public function index(){
		$fechainicio = $this->input->post("fechainicio");
		$fechafin = $this->input->post("fechafin");
		if ($this->input->post("buscar")) {
			$ventas = $this->Ventas_model->getVentasbyDate($fechainicio,$fechafin);
		}
		else{
			$ventas = $this->Ventas_model->getVentas();
		}
		$data = array(
			"ventas" => $ventas,
			"fechainicio" => $fechainicio,
			"fechafin" => $fechafin
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/reportes/ventas",$data);
		$this->load->view("layouts/footer");
	}

		public function view(){
		$idventa = $this->input->post("id");
		$data = array(
			"venta" => $this->Ventas_model->getVenta($idventa),
			"detalles" =>$this->Ventas_model->getDetalle($idventa),
			"detalles1" =>$this->Ventas_model->getDetalle1($idventa)
		);
		$this->load->view("admin/reportes/view",$data);
	}

}