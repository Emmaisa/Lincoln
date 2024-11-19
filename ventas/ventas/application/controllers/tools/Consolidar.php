<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consolidar extends CI_Controller {

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
			$producto = $this->Tools_model->getConsolidado($id);
			$clientes = $this->Clientes_model->getCliente($id);

		}
		
		else{ 

			$producto = 0;
			$clientes = 0;

			}

		$data = array(
			"producto" => $producto,
			"clientes" => $clientes,			
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/tools/add",$data);
		$this->load->view("layouts/footer");
	}

	public function getcustomer(){
		$valor = $this->input->post("valor");
		$clientes = $this->Tools_model->getcustomers($valor);
		echo json_encode($clientes);
	}

	

}