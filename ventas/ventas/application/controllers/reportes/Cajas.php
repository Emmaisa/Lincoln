<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cajas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Ventas_model");
		$this->load->model("Cajas_model");

	}

	public function index(){

		setlocale(LC_ALL,"es_ES");
		$hora= date ("h:i:s");
		$fecha= date ("Y-m-d");
		$cajero= $this->session->userdata("id");
		$data = array(
			"movimientos" => $this->Cajas_model->getMov_day($fecha,$cajero),
			"entradas" => $this->Cajas_model->getEntradas($fecha,$cajero),
			"salidas" => $this->Cajas_model->getSalidas($fecha,$cajero),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/cajas/caja",$data);
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

	public function open_drawer(){
		setlocale(LC_ALL,"es_ES");
		$hora= date ("h:i:s a");
		$fecha= date ("d/m/Y");
		$cajero= $this->session->userdata("id");

		$data  = array(
				'fecha_mov' => $fecha,
				'importe_mov' => "0.00",
				'retiro_mov' => "0.00",
				'concepto' => "AbrirCaja",
				'tipo' => "A",
				'hora_mov' => $hora,
				'cajero_id' => $cajero,
				'estado'=> "1",
			);
		$this->Ventas_model->save_mov($data);
		$this->load->view("admin/cajas/abrir");
		
	}

}