<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {

	private $permisos;
	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Ventas_model");
		$this->load->model("Clientes_model");
		$this->load->model("Productos_model");
		$this->load->model("Bancos_model");
	}

	public function index(){
		$data  = array(
			'ventas' => $this->Ventas_model->getVentas(),
			'permisos' => $this->permisos,
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
		$data = array(
			"tipocomprobantes" => $this->Ventas_model->getComprobantes(),
			'permisos' => $this->permisos,
			"tipopagos" => $this->Ventas_model->getFormapago(),
			"clientes" => $this->Clientes_model->getClientes()

		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/ventas/add",$data);
		$this->load->view("layouts/footer");
	}

	public function add2(){
		$data = array(
			"tipocomprobantes" => $this->Ventas_model->getComprobantes(),
			'permisos' => $this->permisos,
			"tipopagos" => $this->Ventas_model->getFormapago(),
			"clientes" => $this->Clientes_model->getClientes2()

		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/ventas/add2",$data);
		$this->load->view("layouts/footer");
	}

	public function add3(){
		$data = array(
			"tipocomprobantes" => $this->Ventas_model->getComprobantes(),
			'permisos' => $this->permisos,
			"tipopagos" => $this->Ventas_model->getFormapago(),
			"clientes" => $this->Clientes_model->getClientes3()

		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/ventas/add3",$data);
		$this->load->view("layouts/footer");
	}


	public function getproductos(){
		$valor = $this->input->post("valor");
		$clientes = $this->Ventas_model->getproductos($valor);
		echo json_encode($clientes);
	}

	public function getcotizados(){
		$valor = $this->input->post("valor");
		$clientes = $this->Ventas_model->getcotizados($valor);
		echo json_encode($clientes);
	}


	public function getproductos2(){
		$valor = $this->input->post("valor");
		$clientes = $this->Ventas_model->getproductos2($valor);
		echo json_encode($clientes);
	}

	public function getproductos3(){
		$valor = $this->input->post("valor");
		$clientes = $this->Ventas_model->getproductos3($valor);
		echo json_encode($clientes);
	}
	
	public function store(){

		$fecha = $this->input->post("fecha");
		$hora = $this->input->post("hora");
		$subtotal = $this->input->post("subtotal");
		$igv = $this->input->post("igv");
		$descuento = $this->input->post("descuento");
		$total = $this->input->post("total");
		$comentario = $this->input->post("comentario");
		$idcomprobante = $this->input->post("idcomprobante");
		//$numero = $this->Ventas_model->getComprobante2($idcomprobante);
		$idcliente = $this->input->post("idcliente");
		$idusuario = $this->session->userdata("id");
		$numero = $this->input->post("numero");
		$serie = $this->input->post("serie");
		$idproductos = $this->input->post("idproductos");
		$precios = $this->input->post("precios");
		$cantidades = $this->input->post("cantidades");
		$importes = $this->input->post("importes");
		$idpago = $this->input->post("tipopago");

		$data = array(

			'fecha' => $fecha,
			'hora' => $hora,
			'subtotal' => $subtotal,
			'igv' => $igv,
			'descuento' => $descuento,
			'total' => $total,
			'tipo_comprobante_id' => $idcomprobante,
			'cliente_id' => $idcliente,
			'usuario_id' => $idusuario,
			'num_documento' => $numero,
			'serie' => $serie,
			'tpago_id' => $idpago,
			'comentario' => $comentario,
			'estado' => "0",
		);

		if ($this->Ventas_model->save($data)) {
			$idventa = $this->Ventas_model->lastID();
			$this->updateComprobante($idcomprobante);
			$this->save_detalle($idproductos,$idventa,$precios,$cantidades,$importes);
			$this->save_mov($total,$idventa,$numero,$fecha,$idpago);
			redirect(base_url()."movimientos/ventas");

		}else{
			redirect(base_url()."movimientos/ventas/add");
		}
	}

	protected function updateComprobante($idcomprobante){
		$comprobanteActual = $this->Ventas_model->getComprobante($idcomprobante);
		$data  = array(
			'cantidad' => $comprobanteActual->cantidad + 1, 
		);
		$this->Ventas_model->updateComprobante($idcomprobante,$data);
	}

	protected function save_detalle($productos,$idventa,$precios,$cantidades,$importes){
		for ($i=0; $i < count($productos); $i++) { 
			$data  = array(
				'producto_id' => $productos[$i], 
				'venta_id' => $idventa,
				'precio' => $precios[$i],
				'cantidad' => $cantidades[$i],
				'importe'=> $importes[$i],
			);

			$this->Ventas_model->save_detalle($data);
			$this->updateProducto($productos[$i],$cantidades[$i]);

		}
	}

	protected function save_mov($total,$idventa,$numero,$fecha,$idpago){
		$data  = array(
				'fecha_mov' => $fecha,
				'importe_mov' => $total,
				'concepto' => $numero,
				'tipo' => "C",
				'tp_id' => $idpago,
				'ref_mov'=> $idventa,
				'estado' => "0",
			);

		$this->Ventas_model->save_mov($data);

		}
 
	protected function updateProducto($idproducto,$cantidad){
		$productoActual = $this->Productos_model->getProducto($idproducto);
		$data = array(
			'stock' => $productoActual->stock - $cantidad, 
		);
		$this->Productos_model->update($idproducto,$data);
	}

	

	public function view(){
		$idventa = $this->input->post("id");
		$data = array(
			"venta" => $this->Ventas_model->getVenta($idventa),
			"venta1" => $this->Ventas_model->getVenta_ch($idventa),
			"detalles" =>$this->Ventas_model->getDetalle($idventa),
			"detalles1" =>$this->Ventas_model->getDetalle1($idventa)
		);
		$this->load->view("admin/ventas/view",$data);
	}


	public function impri(){
		$idventa = $this->input->post("id");
		$data = array(
			"venta" => $this->Ventas_model->getVenta($idventa),
			"detalles" =>$this->Ventas_model->getDetalle($idventa),
			"detalles1" =>$this->Ventas_model->getDetalle1($idventa),
			"exentos" =>$this->Ventas_model->getTotalex($idventa),
			"gravados" =>$this->Ventas_model->getTotalgra($idventa)
			
		);
		
		setlocale(LC_ALL,"es_ES");
		$hora= date ("h:i:s");
		$fecha= date ("d/m/Y");
		$cajero= $this->session->userdata("id");

		$data1 = array(
				'hora_mov' => $hora,
				'cajero_id' => $cajero,
				'estado'=> "1",
			);	
		$this->Ventas_model->update_mov($idventa,$data1);
		$this->update_vstatus($idventa);
		$this->load->view("admin/ventas/impri",$data);

	}

	public function ticket(){
		$idventa = $this->input->post("id");
		$data = array(
			"venta" => $this->Ventas_model->getVenta($idventa),
			"detalles" =>$this->Ventas_model->getDetalle($idventa),
			"detalles1" =>$this->Ventas_model->getDetalle1($idventa),
			"exentos" =>$this->Ventas_model->getTotalex($idventa),
			"gravados" =>$this->Ventas_model->getTotalgra($idventa)
			
		);
		
		setlocale(LC_ALL,"es_ES");
		$hora= date ("h:i:s");
		$fecha= date ("d/m/Y");
		$cajero= $this->session->userdata("id");

		$data1 = array(
				'hora_mov' => $hora,
				'cajero_id' => $cajero,
				'estado'=> "1",
			);	
		$this->Ventas_model->update_mov($idventa,$data1);
		$this->update_vstatus($idventa);
		$this->load->view("admin/ventas/ticket",$data);

	}

	protected function update_vstatus($idventa){
		$data = array(
			'estado' => "1", 
		);
		$this->Ventas_model->update_vstatus($idventa,$data);
	}

	public function fact1(){
		$idventa = $this->input->post("id");
		$data = array(
			"venta" => $this->Ventas_model->getVenta($idventa),
			"detalles" =>$this->Ventas_model->getDetalle($idventa),
			"detalles1" =>$this->Ventas_model->getDetalle1($idventa),
			"exentos" =>$this->Ventas_model->getTotalex($idventa),
			"gravados" =>$this->Ventas_model->getTotalgra($idventa)
		);

		setlocale(LC_ALL,"es_ES");
		$hora= date ("h:i:s");
		$fecha= date ("d/m/Y");
		$cajero= $this->session->userdata("id");

		$data1 = array(
				'hora_mov' => $hora,
				'cajero_id' => $cajero,
				'estado'=> "1",
			);	
		$this->Ventas_model->update_mov($idventa,$data1);
		$this->update_vstatus($idventa);
		$this->load->view("admin/ventas/fact1",$data);
	}

	public function fact2(){
		$idventa = $this->input->post("id");
		$data = array(
			"venta" => $this->Ventas_model->getVenta($idventa),
			"detalles" =>$this->Ventas_model->getDetalle($idventa),
			"detalles1" =>$this->Ventas_model->getDetalle1($idventa),
			"exentos" =>$this->Ventas_model->getTotalex($idventa),
			"gravados" =>$this->Ventas_model->getTotalgra($idventa)
		);
		setlocale(LC_ALL,"es_ES");
		$hora= date ("h:i:s");
		$fecha= date ("d/m/Y");
		$cajero= $this->session->userdata("id");

		$data1 = array(
				'hora_mov' => $hora,
				'cajero_id' => $cajero,
				'estado'=> "1",
			);	
		$this->Ventas_model->update_mov($idventa,$data1);
		$this->update_vstatus($idventa);
		$this->load->view("admin/ventas/fact2",$data);

	}



}
