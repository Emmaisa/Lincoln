<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Ventas_model");
		$this->load->model("Productos_model");
		$this->load->model("Categorias_model");
	}

	public function index()
	{
		$data  = array(
			'productos' => $this->Productos_model->getProductos(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/productos/list",$data);
		$this->load->view("layouts/footer");

	}
	public function add(){
		$data =array( 
			"categorias" => $this->Categorias_model->getCategorias()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/productos/add",$data);
		$this->load->view("layouts/footer");
	}

	public function store(){
		$codigo = $this->input->post("codigo");
		$nombre = $this->input->post("nombre");
		$tipo = $this->input->post("tipo");
		$descripcion = $this->input->post("descripcion");
		$costo = $this->input->post("costo");
		$precio = $this->input->post("precio");
		$precio1 = $this->input->post("precio1");
		$precio2 = $this->input->post("precio2");
		$precio3 = $this->input->post("precio3");
		$stock = $this->input->post("stock");
		$unidad = $this->input->post("unidad");
		$categoria = $this->input->post("categoria");

		$this->form_validation->set_rules("codigo","Codigo","required|is_unique[productos.codigo]");
		$this->form_validation->set_rules("nombre","Nombre","required");
		$this->form_validation->set_rules("precio","Precio","required");
		$this->form_validation->set_rules("stock","Stock","required");

		if ($this->form_validation->run()) {
			$data  = array(
				'codigo' => $codigo, 
				'nombre' => $nombre,
				'tipo' => $tipo,
				'descripcion' => $descripcion,
				'costo' => $costo,
				'precio' => $precio,
				'precio1' => $precio1,
				'precio2' => $precio2,
				'precio3' => $precio3,
				'stock' => $stock,
				'unit_med' => $unidad,
				'categoria_id' => $categoria,
				'estado' => "1"
			);

			if ($this->Productos_model->save($data)) {
				redirect(base_url()."mantenimiento/productos");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."mantenimiento/productos/add");
			}
		}
		else{
			$this->add();
		}

		
	}

	public function edit($id){
		$data =array( 
			"producto" => $this->Productos_model->getProducto($id),
			"categorias" => $this->Categorias_model->getCategorias()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/productos/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$idproducto = $this->input->post("idproducto");
		$codigo = $this->input->post("codigo");
		$nombre = $this->input->post("nombre");
		$descripcion = $this->input->post("descripcion");
		$precio = $this->input->post("precio");
		$stock = $this->input->post("stock");
		$categoria = $this->input->post("categoria");

		$productoActual = $this->Productos_model->getProducto($idproducto);

		if ($codigo == $productoActual->codigo) {
			$is_unique = '';
		}
		else{
			$is_unique = '|is_unique[productos.codigo]';
		}

		$this->form_validation->set_rules("codigo","Codigo","required".$is_unique);
		$this->form_validation->set_rules("nombre","Nombre","required");
		$this->form_validation->set_rules("precio","Precio","required");
		$this->form_validation->set_rules("stock","Stock","required");


		if ($this->form_validation->run()) {
			$data  = array(
				'codigo' => $codigo, 
				'nombre' => $nombre,
				'descripcion' => $descripcion,
				'precio' => $precio,
				'stock' => $stock,
				'categoria_id' => $categoria,
			);
			if ($this->Productos_model->update($idproducto,$data)) {
				redirect(base_url()."mantenimiento/productos");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."mantenimiento/productos/edit/".$idproducto);
			}
		}else{
			$this->edit($idproducto);
		}

		
	}
	public function delete($id){
		$data  = array(
			'estado' => "0", 
		);
		$this->Productos_model->update($id,$data);
		echo "mantenimiento/productos";
	}

	public function printbarcode(){
		$id = $this->input->post("id");
		$data = array(
			"producto" => $this->Productos_model->getBarcode($id)
		);
		$this->load->view("admin/productos/printbarcode",$data);
	}

}