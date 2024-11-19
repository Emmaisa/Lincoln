<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anexos extends CI_Controller {

	
	public function __construct(){
		parent::__construct();
		$this->load->model("Ventas_model");
		$this->load->model("Tools_model");
		$this->load->model("Clientes_model");

	}

	public function index(){
		$idcliente = $this->input->post("idcustomer");


		if ($this->input->post("revisar")) {
			$id = $idcliente;
			$ventas = $this->Tools_model->getVentas($id);
			$clientes = $this->Clientes_model->getCliente($id);

		}
		
		else{ 

			$ventas = 0;
			$clientes = 0;

			}

		$data = array(
			
			"ventas" => $ventas,
			"clientes" => $clientes,			
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/tools/add1",$data);
		$this->load->view("layouts/footer");
	}

	public function getcustomer(){
		$valor = $this->input->post("valor");
		$clientes = $this->Tools_model->getcustomers($valor);
		echo json_encode($clientes);
	}

	public function anexoscde($idventa){
		$data = array(
			"venta" => $this->Ventas_model->getVenta($idventa),
			"detalles" =>$this->Ventas_model->getDetalle($idventa),
			"detalles1" =>$this->Ventas_model->getDetalle1($idventa),			
		);
		$this->load->view("admin/tools/anexo",$data);

	}

	public function fuente(){
		
		$this->load->view("admin/tools/makefont");

	}

}