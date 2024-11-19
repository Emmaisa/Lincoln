<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Clientes_model");
	}

	public function index()
	{
		$data  = array(
			'clientes' => $this->Clientes_model->getClientes(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/clientes/list",$data);
		$this->load->view("layouts/footer");

	}
	public function add(){

		$data = array(
			"tipoclientes" => $this->Clientes_model->getTipoClientes(),
		);

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/clientes/add",$data);
		$this->load->view("layouts/footer");
	}
	public function store(){

		$nombre = $this->input->post("nombre");
		$dui = $this->input->post("dui");
		$nit = $this->input->post("nit");
		$nrc = $this->input->post("nrc");
		$telefono = $this->input->post("telefono");
		$direccion = $this->input->post("direccion");
		$departamento = $this->input->post("depart");
		$municipio = $this->input->post("municipio");
		$giro = $this->input->post("giro");	
		$tipocliente = $this->input->post("tipocliente");
		//$credit = $this->input->post("cred_stat");
		//$limitcred = $this->input->post("limit_cred");
		//$status = $this->input->post("status");
		
		$this->form_validation->set_rules("nombre","Nombre del Cliente","required");
		$this->form_validation->set_rules("tipocliente","Tipo de Cliente","required");
		$this->form_validation->set_rules("dui","DUI","required|is_unique[clientes.dui]");

		if ($this->form_validation->run()) {
			$data  = array(
				'nombre' => $nombre, 
				'dui' => $dui,
				'nit' => $nit,
				'nrc' => $nrc,
				'telefono' => $telefono,
				'direccion' => $direccion,
				'departamento' => $departamento,
				'municipio' => $municipio,
				'giro' => $giro,
				'tipo_cliente_id' => $tipocliente,
				'estado' => "1"			
			);

			if ($this->Clientes_model->save($data)) {
				redirect(base_url()."mantenimiento/clientes");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."mantenimiento/clientes/add");
			}
		}
		else{
			$this->add();
		}

		
	}
	public function edit($id){
		$data  = array(
			'cliente' => $this->Clientes_model->getCliente($id), 
			"tipoclientes" => $this->Clientes_model->getTipoClientes(),
			
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/clientes/edit",$data);
		$this->load->view("layouts/footer");
	}
	
	public function getclientes(){
		$valor = $this->input->post("valor");
		$clientes = $this->Clientes_model->getcustomers($valor);
		echo json_encode($clientes);
	}



	public function update(){
		$idcliente = $this->input->post("idcliente");
		$nombre = $this->input->post("nombre");
		$dui = $this->input->post("dui");
		$nit = $this->input->post("nit");
		$nrc = $this->input->post("nrc");
		$telefono = $this->input->post("telefono");
		$direccion = $this->input->post("direccion");
		$departamento = $this->input->post("depart");
		$municipio = $this->input->post("municipio");
		$giro = $this->input->post("giro");	
		$tipocliente = $this->input->post("tipocliente");
		$credit = $this->input->post("cred_stat");
		$limitcred = $this->input->post("limit_cred");
		$status = $this->input->post("status");
		$ce_cod = $this->input->post("ce_cod");

		$clienteActual = $this->Clientes_model->getCliente($idcliente);

		if ($dui == $clienteActual->dui) {
			$is_unique = "";
		}else{
			$is_unique= '|is_unique[clientes.dui]';
		}

		$this->form_validation->set_rules("nombre","Nombre del Cliente","required");
		$this->form_validation->set_rules("tipocliente","Tipo de Cliente","required");
		$this->form_validation->set_rules("dui","DUI","required".$is_unique);

		if ($this->form_validation->run()) {
			$data = array(
				'nombre' => $nombre, 
				'dui' => $dui,
				'nit' => $nit,
				'nrc' => $nrc,
				'telefono' => $telefono,
				'direccion' => $direccion,
				'departamento' => $departamento,
				'municipio' => $municipio,
				'giro' => $giro,
				'tipo_cliente_id' => $tipocliente,
				'credit' => $credit,
				'limit_cred' => $limitcred,
				'estado' => $status,
				'ce_cod' => $ce_cod,
				
			);

			if ($this->Clientes_model->update($idcliente,$data)) {
				redirect(base_url()."mantenimiento/clientes");
			}
			else{
				$this->session->set_flashdata("error","No se pudo actualizar la informacion");
				redirect(base_url()."mantenimiento/clientes/edit/".$idcliente);
			}
		}else{
			$this->edit($idcliente);
		}

		

	}

	public function delete($id){
		$data  = array(
			'estado' => "0", 
		);
		$this->Clientes_model->update($id,$data);
		echo "mantenimiento/clientes";
	}
}
