<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilidad extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Ventas_model");
		$this->load->model("Productos_model");
	}

	public function index(){
		$fechainicio1 = $this->input->post("fechainicio");
		$fechafin1 = $this->input->post("fechafin");
		$idproducto = $this->input->post("idproducto");
		$producto = $this->Productos_model->getProducto($idproducto);


		if ($this->input->post("buscar")) {
			$id = $idproducto;
			$fechainicio = $fechainicio1;
			$fechafin = $fechafin1;

			$detalle = $this->Ventas_model->getVentasbyProd($id,$fechainicio,$fechafin);
			$producto = $this->Productos_model->getProducto($id);
		}
		
		else{

			$detalle = $this->Ventas_model->getVentas();
			}

		$data = array(
			"producto" => $producto,
			"detalle" => $detalle,
			"fechainicio" => $fechainicio1,
			"fechafin" => $fechafin1
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/reportes/utilidad",$data);
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