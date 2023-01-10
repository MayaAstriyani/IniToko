<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {
	public function checkCredential()
	{
		$email = set_value('email');
		$password = set_value('password');

		$user_data = $this->db	->where('email', $email)
							  	->where('password', $password)
						   	  	->limit(1)
								->get('user');
		if ($user_data->num_rows() > 0) {
			return $user_data->row();
		} else {
			return array();
		}	
	}

	public function register($data_user)
	{
		$this->db->insert('user', $data_user);
	}

	public function getUser()
	{
		$user_data = $this->db	->where('email', $email)
							  	->where('password', $password)
								->limit(1)
								->get('user');
		if ($user_data->num_rows() > 0) {
			return $user_data->row();
		} else {
			return array();
		}	
	}

	public function getAllUser()
	{
		$user_data = $this->db	->where('jabatan', 'Member')
								->get('user');
		if ($user_data->num_rows() > 0) {
			return $user_data->result_array();
		} else {
			return array();
		}	
	}

	public function getAllAdmin()
	{
		$user_data = $this->db	->where('jabatan', 'Admin')
								->get('user');
		if ($user_data->num_rows() > 0) {
			return $user_data->result_array();
		} else {
			return array();
		}	
	}

	public function getAllProduk()
	{
		$produk_data = $this->db->get('produk');
		if ($produk_data->num_rows() > 0) {
			return $produk_data->result_array();
		} else {
			return array();
		}	
	}

	public function getAllOrder()
	{
		$produk_data = $this->db->get('orders');
		if ($produk_data->num_rows() > 0) {
			return $produk_data->result_array();
		} else {
			return array();
		}	
	}

	public function getOrderLimit($num)
	{
		$produk_data = $this->db->limit($num)
								->order_by('tanggal', 'desc')
								->get('orders');
		if ($produk_data->num_rows() > 0) {
			return $produk_data->result_array();
		} else {
			return array();
		}	
	}

	public function getOrderDibayar()
	{
		$produk_data = $this->db->where('status', "Dibayar")
								->get('orders');
		if ($produk_data->num_rows() > 0) {
			return $produk_data->result_array();
		} else {
			return array();
		}	
	}

	public function getOrderDikonfirmasi()
	{
		$produk_data = $this->db->where('status', "Dikonfirmasi")
								->get('orders');
		if ($produk_data->num_rows() > 0) {
			return $produk_data->result_array();
		} else {
			return array();
		}	
	}

	public function getOrderDikirim()
	{
		$produk_data = $this->db->where('status', "Sedang Dikirim")
								->get('orders');
		if ($produk_data->num_rows() > 0) {
			return $produk_data->result_array();
		} else {
			return array();
		}	
	}

	public function getOrderTerkirim()
	{
		$produk_data = $this->db->where('status', "Terkirim")
								->get('orders');
		if ($produk_data->num_rows() > 0) {
			return $produk_data->result_array();
		} else {
			return array();
		}	
	}

	public function getOrderUser($id)
	{
		$produk_data = $this->db->where('id_user', $id)
								->get('orders');
		if ($produk_data->num_rows() > 0) {
			return $produk_data->result_array();
		} else {
			return array();
		}	
	}

	public function getOrderIdUser($id)
	{
		$produk_data = $this->db->where('Id_pesanan', $id)
								->get('orders');
		if ($produk_data->num_rows() > 0) {
			return $produk_data->result_array();
		} else {
			return array();
		}	
	}

	public function getOrderDetailUser($id)
	{
		$produk_data = $this->db->where('id_pesanan', $id)
								->get('ordered_items');
		if ($produk_data->num_rows() > 0) {
			return $produk_data->result_array();
		} else {
			return array();
		}	
	}

	public function getOrderBelumDibayar()
	{
		$produk_data = $this->db->where('status', "Belum Dibayar")
								->get('orders');
		if ($produk_data->num_rows() > 0) {
			return $produk_data->result_array();
		} else {
			return array();
		}	
	}

	public function getOrder($id)
	{
		$produk_data = $this->db->where('id_pesanan', $id)
								->limit(1)
								->get('orders');
		if ($produk_data->num_rows() > 0) {
			return $produk_data->row();
		} else {
			return array();
		}	
	}

	public function getDataId($product_id)
	{
		 $data = $this->db ->where('produk_id', $product_id)
						   ->limit(1)
						   ->get('produk');
		if ($data->num_rows() > 0) {
			return $data->row();
		} else {
			return array();
		}
	}

	public function getProdukId($product_id)
	{
		 $data = $this->db ->where('produk_id', $product_id)
						   ->limit(1)
						   ->get('produk');
		if ($data->num_rows() > 0) {
			return $data->result_array();
		} else {
			return array();
		}
	}

	public function add_product($data_barang)
	{
		$this->db->insert('produk', $data_barang);
	}

	public function hapusData($id)
	{
		$this->db->query("DELETE from tabel where produk_id = '".$id."'");
	}

	public function editData($id)
	{
		$data = $this->db->query('select * from tabel where produk_id = "'.$id.'"');
		return $data->result_array();
	}

	public function getAllVisitor()
	{
		$visitor_data = $this->db->get('visitor');
		if ($visitor_data->num_rows() > 0) {
			return $visitor_data->result_array();
		} else {
			return array();
		}	
	}

	public function add_order($data_order)
	{
		$this->db->insert('orders', $data_order);

		$id_pesanan = $this->db->insert_id();

		foreach ($this->cart->contents() as $item) {
			$data_ordered_items = array(
				'id_pesanan' 	=> $id_pesanan,
				'id_produk'		=> $item['id'],
				'qty'			=> $item['qty']
			);

			$this->db->insert('ordered_items', $data_ordered_items);
		}

		return $id_pesanan;
	}

	public function hapusOrder($id)
	{
		$this->db->query("DELETE FROM orders WHERE id_pesanan = '".$id."'");
		$this->db->query("DELETE FROM ordered_items WHERE id_pesanan = '".$id."'");
	}

	public function editOrder($id)
	{
		$total = "";
		$data = $this->db ->where('id_pesanan', $id)
						   ->get('orders');
		foreach ($data->result_array() as $d) {
			$total = $d['total'];	
		}
		$data_order = $this->db->query('UPDATE orders SET status = "Dibayar" WHERE id_pesanan = "'.$id.'"');
		$data_pembayaran = array(
			'id_pesanan'			=> $id,
			'tanggal_pembayaran'	=> date('Y-m-d H:i:s'),
			'total_pembayaran'		=> $total
		);

		$this->db->insert('pembayaran', $data_pembayaran);
	}

	public function konfirmasiOrder($id)
	{
		$data = $this->db->query('UPDATE orders SET status = "Dikonfirmasi" WHERE id_pesanan = "'.$id.'"');
	}

	public function inputResi($id, $nomorResi)
	{
		$this->db->query('UPDATE orders SET status = "Sedang Dikirim" WHERE id_pesanan = "'.$id.'"');
		$data = $this->db->query('UPDATE orders SET resi = "'.$nomorResi.'" WHERE id_pesanan = "'.$id.'"');
	}

	public function orderTerkirim($id)
	{
		$data = $this->db->query('UPDATE orders SET status = "Terkirim" WHERE id_pesanan = "'.$id.'"');
	}

	public function getTotalPenghasilanHariIni()
	{
		$data = $this->db->where('tanggal_pembayaran', date('Y-m-d'))
						->get('pembayaran');
		if ($data->num_rows() > 0) {
			return $data->result_array();
		} else {
			return array();
		}	
	}

	public function getOrderHariIni()
	{
		$data = $this->db->where('tanggal', date('Y-m-d'))
						->get('orders');
		if ($data->num_rows() > 0) {
			return $data->result_array();
		} else {
			return array();
		}	
	}
}