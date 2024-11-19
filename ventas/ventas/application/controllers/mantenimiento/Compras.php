<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compras extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//$this->load->model("Compras_model");
		$this->load->model("Compras_model");
		
	}


	public function index()
	{
		$data  = array(
			'Compras' => $this->Compras_model->getCompras(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/compras/list",$data);
		$this->load->view("layouts/footer");

	}
	
	public function store(){

		$nombre = $this->input->post("nombre");
		$dui = $this->input->post("dui");
		$nit = $this->input->post("nit");
		$nrc = $this->input->post("nrc");
		$telefono = $this->input->post("telefono");
		$direccion = $this->input->post("direccion");
		//$departamento = $this->input->post("depart");
		//$municipio = $this->input->post("municipio");
		//$giro = $this->input->post("giro");	
		//$tipoproveedor = $this->input->post("tipoproveedor");
		//$credit = $this->input->post("cred_stat");
		//$limitcred = $this->input->post("limit_cred");
		//$status = $this->input->post("status");
		
		$this->form_validation->set_rules("nombre","Nombre del Proveedor","required");
		$this->form_validation->set_rules("tipoproveedor","Tipo de Proveedor","required");
		$this->form_validation->set_rules("dui","DUI","required|is_unique[proveedor.dui]");

		if ($this->form_validation->run()) {
			$data  = array(
				'nombre' => $nombre, 
				'dui' => $dui,
				'nit' => $nit,
				'nrc' => $nrc,
				'telefono' => $telefono,
				'direccion' => $direccion,
				//'departamento' => $departamento,
				//'municipio' => $municipio,
				//'giro' => $giro,
				'tipo_proveedor_id' => $tipoproveedor,
				'estado' => "1"			
			);

			if ($this->Compras_model->save($data)) {
				redirect(base_url()."mantenimiento/Compras");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."mantenimiento/compras/add");
			}
		}
		else{
			$this->add();
		}

		
	}
	public function edit($id){
		$data  = array(
			'proveedor' => $this->Compras_model->getProveedore($id), 
			//"tipocompras" => $this->Compras_model->getTipoCompras(),
			
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/compras/edit",$data);
		$this->load->view("layouts/footer");
	}
	
	public function getcompras(){
		$valor = $this->input->post("valor");
		$idproveedor = $this->Compras_model->getcustomers($valor);
		echo json_encode($idcompras);
	}



	public function update(){
		$idproveedor = $this->input->post("idcompras");
		$nombre = $this->input->post("nombre");
		$dui = $this->input->post("dui");
		$nit = $this->input->post("nit");
		$nrc = $this->input->post("nrc");
		$telefono = $this->input->post("telefono");
		$direccion = $this->input->post("direccion");	
		$tipoproveedor = $this->input->post("tipoproveedor");
		$credit = $this->input->post("cred_stat");
		$limitcred = $this->input->post("limit_cred");
		$status = $this->input->post("status");
		$ce_cod = $this->input->post("ce_cod");

		$proveedorActual = $this->Compras_model->getProveedor($idproveedor);

		if ($dui == $proveedorActual->dui) {
			$is_unique = "";
		}else{
			$is_unique= '|is_unique[compras.dui]';
		}

		$this->form_validation->set_rules("nombre","Nombre del proveedor","required");
		$this->form_validation->set_rules("tipoproveedor","Tipo de Proveedor","required");
		$this->form_validation->set_rules("dui","DUI","required".$is_unique);

		if ($this->form_validation->run()) {
			$data = array(
				'nombre' => $nombre, 
				'dui' => $dui,
				'nit' => $nit,
				'nrc' => $nrc,
				'telefono' => $telefono,
				'direccion' => $direccion,
				//'departamento' => $departamento,
				//'municipio' => $municipio,
				//'giro' => $giro,
				'tipo_proveedor_id' => $tipoproveedor,
				'credit' => $credit,
				'limit_cred' => $limitcred,
				'estado' => $status,
				'ce_cod' => $ce_cod,
				
			);

			if ($this->Compras_model->update($idproveedor,$data)) {
				redirect(base_url()."mantenimiento/compras");
			}
			else{
				$this->session->set_flashdata("error","No se pudo actualizar la informacion");
				redirect(base_url()."mantenimiento/compras/edit/".$idcompras);
			}
		}else{
			$this->edit($idproveedor);
		}

		

	}

	public function delete($id){
		$data  = array(
			'estado' => "0", 
		);
		$this->Compras_model->update($id,$data);
		echo "mantenimiento/compras";
	}
}
