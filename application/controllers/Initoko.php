<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Initoko extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model');
	}

	public function index()
	{
		$this->load->view('home-head');
		$this->load->view('home-header');
		$this->load->view('home');
		$this->load->view('home-footer');
		$this->load->view('home-foot');
	}

	public function profile()
	{
		$this->load->view('Head-profile');
		$this->load->view('profile');
	}

	public function shop()
	{
		$this->load->view('home-head');
		$this->load->view('home-header');
		$this->load->view('Shop');
		$this->load->view('home-footer');
		$this->load->view('home-foot');
	}

	public function product($product_id)
	{
		$product = $this->model->getDataId($product_id);
		$data['id'] = $product->produk_id;
		$data['nama'] = $product->nama;
		$data['harga'] = $product->harga;
		$data['desc'] = $product->desc;
		$data['img'] = $product->img;

		$this->load->view('home-head');
		$this->load->view('home-header');
		$this->load->view('Detail-product', $data);
		$this->load->view('home-footer');
		$this->load->view('home-foot');
	}

	public function cart()
	{
		$this->load->view('home-head');
		$this->load->view('home-header');
		$this->load->view('Cart');
		$this->load->view('home-footer');
		$this->load->view('home-foot');
	}

	public function get_provinsi()
	{
		$provinces = $this->rajaongkir->province();
		$this->output->set_content_type('application/json')->set_output($provinces);
	}

	public function get_kota($id_provinsi)
	{
		$kota = $this->rajaongkir->city($id_provinsi);
		$this->output->set_content_type('application/json')->set_output($kota);
	}

	public function get_kotaId($id_provinsi, $id_kota)
	{
		$kotaId = $this->rajaongkir->city($id_provinsi, $id_kota);
		$this->output->set_content_type('application/json')->set_output($kotaId);
	}

	public function get_biaya($asal, $tujuan, $berat, $kurir)
	{
		$ongkir = $this->rajaongkir->cost($asal, $tujuan, $berat, $kurir);
		$this->output->set_content_type('application/json')->set_output($ongkir);
	}

	public function add_to_cart($product_id)
	{
		$product = $this->model->getDataId($product_id);
		$data = array(
			'id'      => $product->produk_id,
			'img'     => $product->img,
			'qty'     => 1,
			'price'   => $product->harga,
			'name'    => $product->nama,
			'berat'	  => $product->berat,
			'options' => array('Size' => 'L', 'Color' => 'Red')
		);
	
		$this->cart->insert($data);
		echo  "<script type='text/javascript'>";
    	echo "window.close();";
    	echo "</script>";
	}

	public function about()
	{
		$this->load->view('home-head');
		$this->load->view('home-header');
		$this->load->view('About');
		$this->load->view('home-footer');
		$this->load->view('home-foot');
	}

	public function contact()
	{
		$this->load->view('home-head');
		$this->load->view('home-header');
		$this->load->view('Contact');
		$this->load->view('home-footer');
		$this->load->view('home-foot');
	}

	public function info()
	{
		$this->load->view('info');
	}

	public function tes()
	{
		$this->load->view('tes');
	}

	public function checkout($id)
	{
		$product = $this->model->getOrder($id);
		$data['id_pesanan'] = $product->id_pesanan;
		$data['total'] = $product->total;

		$this->load->view('Checkout', $data);
	}

	public function editOrder($id)
	{
		$product = $this->model->editOrder($id);
		
		redirect('/Initoko/info?info=sukses');
	}

	public function konfirmasiOrder($id)
	{
		$product = $this->model->konfirmasiOrder($id);
		
		redirect('/Admin/show_order_dibayar');
	}

	public function terkirimOrder($id)
	{
		$product = $this->model->orderTerkirim($id);
		
		redirect('/Admin/show_order_dikirim');
	}

	public function add_order()
	{
		$int = (int) filter_var(set_value('service'), FILTER_SANITIZE_NUMBER_INT);
		$data_order = array(
			'id_user' => set_value('id_user') ,
			'nama' => set_value('nama') ,
			'nohp' => set_value('nohp') ,
			'provinsi' => set_value('prov') , 
			'kabupaten' => set_value('kot') ,
			'alamat' => set_value('alamat') ,
			'kodepos' => set_value('kodepos') ,
			'alamat' => set_value('alamat') ,
			'berat' => set_value('berat') ,
			'kurir' => set_value('kurir') ,
			'paket_kurir' => set_value('service') ,
			'total' => $this->cart->total() + $int,
			'status' => 'Belum Dibayar' ,
			'tanggal' => date('Y-m-d H:i:s')
		 );

		if ($this->session->userdata('id')) {
			$proses_order = $this->model->add_order($data_order);

			$this->cart->destroy();
			redirect('/Initoko/checkout/' . $proses_order);
			//redirect('/Initoko/info?info=sukses');
		}
		
		else {
			redirect('/login');
		}
	}

	public function hapusOrder($id)
	{
		$product = $this->model->hapusOrder($id);
		
		redirect('/Initoko/show_order_user');
	}

	public function show_order_user()
	{
		$this->load->view('Head-profile');
		$this->load->view('show_order_user');
	}

	public function show_detail_order_user()
	{
		$this->load->view('Head-profile');
		$this->load->view('order_detail_user');
	}
}
