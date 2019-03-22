<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()  {
		parent::__construct();
		if(!empty($this->session->userdata('username'))) {
            $data['username'] = $this->session->userdata('username');
            $data['level'] = $this->session->userdata('level');
        } else {
			redirect("login");
		}
	}

	public function index()
	{
		$data['view'] = 'admin/v_home';
		$data['inpage'] = 'home';
		$data['page'] = 'admin/v_admin_intro';
		$this->load->view('index',$data);
	}

	public function data_buku() {
		$sqlResult = $this->db_model->read("*","buku");

		$sqlRows = array();
		$i=1;

		foreach($sqlResult as $a) {
			$edit = "<a href='".base_url("admin/buku_form/".$a->id_buku)."' class='btn btn-warning'>Sunting</a>";
			$delete = "<a href='".base_url("admin/delete_buku/")."' class='btn btn-danger' id='delete'>Hapus</a>";
			$sqlRows[] = array($a->id_buku,$a->judul,$a->noisbn,$a->penulis,$a->penerbit,$a->tahun,$a->stok,$a->harga_jual,$a->ppn,$a->diskon,$edit." ".$delete);
		}

		$data['rows'] = $sqlRows;

		$data['view'] = 'admin/v_home';
		$data['inpage'] = 'data_buku';
		$data['page'] = 'admin/v_table';
		$data['success'] = $this->session->flashdata("success");
		$data['error'] = $this->session->flashdata("error");
		$this->load->view('index',$data);
	}

	public function data_transaksi() {

 $join = array(
					array(
						"table"=>"kasir",
						"fkey" => "kasir.id_kasir=penjualan.id_kasir"
						),
					array(
						"table"=>"buku",
						"fkey" => "buku.id_buku=penjualan.id_buku"
						)
					);

		$sqlResult = $this->db_model->read("*","penjualan","","",$join);

		$sqlRows = array();
		$i=1;

		foreach($sqlResult as $a) {
			$edit = "<a href='".base_url("admin/transaksi_form/".$a->id_penjualan)."' class='btn btn-warning'>Sunting</a>";
			$delete = "<a href='".base_url("admin/delete_transaksi/")."' class='btn btn-danger' id='delete'>Hapus</a>";
			$sqlRows[] = array($a->id_penjualan,$a->judul,$a->nama,$a->jumlah,$a->total,$a->tanggal,$edit." ".$delete);
		}

		$data['rows'] = $sqlRows;
		$data['view'] = 'admin/v_home';
		$data['inpage'] = 'data_transaksi';
		$data['page'] = 'admin/v_table';
		$data['success'] = $this->session->flashdata("success");
		$data['error'] = $this->session->flashdata("error");
		$this->load->view('index',$data);
	}
	public function data_distributor() {
		$sqlResult = $this->db_model->read("*","distributor");

		$sqlRows = array();
		$i=1;

		foreach($sqlResult as $a) {
			$edit = "<a href='".base_url("admin/distributor_form/".$a->id_distributor)."' class='btn btn-warning'>Sunting</a>";
			$delete = "<a href='".base_url("admin/delete_distributor/")."' class='btn btn-danger' id='delete'>Hapus</a>";
			$sqlRows[] = array($a->id_distributor,$a->nama_distributor,$a->alamat,$a->telepon,$edit." ".$delete);
		}

		$data['rows'] = $sqlRows;
		$data['view'] = 'admin/v_home';
		$data['inpage'] = 'data_distributor';
		$data['page'] = 'admin/v_table';
		$data['success'] = $this->session->flashdata("success");
		$data['error'] = $this->session->flashdata("error");
		$this->load->view('index',$data);
	}
	public function data_pemasok() {

		$join = array(
					array(
						"table"=>"distributor",
						"fkey" => "distributor.id_distributor=pasok.id_distributor"
						),
					array(
						"table"=>"buku",
						"fkey" => "buku.id_buku=pasok.id_buku"
						)
					);

		$sqlResult = $this->db_model->read("*","pasok","","",$join);

		$sqlRows = array();
		$i=1;

		foreach($sqlResult as $a) {
			$edit = "<a href='".base_url("admin/pemasok_form/".$a->id_pasok)."' class='btn btn-warning'>Sunting</a>";
			$delete = "<a href='".base_url("admin/delete_pemasok/")."' class='btn btn-danger' id='delete'>Hapus</a>";
			$sqlRows[] = array($a->id_pasok,$a->nama_distributor,$a->judul,$a->jumlah,$a->tanggal,$edit." ".$delete);
		}

		$data['rows'] = $sqlRows;
		$data['view'] = 'admin/v_home';
		$data['inpage'] = 'data_pemasok';
		$data['page'] = 'admin/v_table';
		$data['success'] = $this->session->flashdata("success");
		$data['error'] = $this->session->flashdata("error");
		$this->load->view('index',$data);
	}
	public function data_kasir() {

		$sqlResult = $this->db_model->read("*","kasir");

		$sqlRows = array();
		$i=1;

		foreach($sqlResult as $a) {
			$edit = "<a href='".base_url("admin/kasir_form/".$a->id_kasir)."' class='btn btn-warning'>Sunting</a>";
			$delete = "<a href='".base_url("admin/delete_kasir/")."' class='btn btn-danger' id='delete'>Hapus</a>";
			$sqlRows[] = array($a->id_kasir,$a->nama,$a->alamat,$a->telepon,$a->status,$a->username,$a->akses,$edit." ".$delete);
		}

		$data['rows'] = $sqlRows;

		$data['view'] = 'admin/v_home';
		$data['inpage'] = 'data_kasir';
		$data['page'] = 'admin/v_table';
		$data['success'] = $this->session->flashdata("success");
		$data['error'] = $this->session->flashdata("error");
		$this->load->view('index',$data);
	}

	public function buku_form($id="") {
		$data['view'] = 'admin/v_book_form';
		$data['type'] = empty($id)?'add':'edit';

		if(!empty($id)) {
			$sqlResult = $this->db_model->read("*","buku",array("id_buku"=>$id));
			$data['details'] = $sqlResult[0];
		}

		$this->load->view('index',$data);
	}

	public function distributor_form($id="") {
		$data['view'] = 'admin/v_distributor_form';
		$data['type'] = empty($id)?'add':'edit';

		if(!empty($id)) {
			$sqlResult = $this->db_model->read("*","distributor",array("id_distributor"=>$id));
			$data['details'] = $sqlResult[0];
		}

		$this->load->view('index',$data);
	}

	public function pemasok_form($id="") {
		$data['view'] = 'admin/v_pemasok_form';
		$data['type'] = empty($id)?'add':'edit';

		if(!empty($id)) {
			$join = array(
			array(
				"table"=>"distributor",
				"fkey" => "distributor.id_distributor=pasok.id_distributor"
				),
			array(
				"table"=>"buku",
				"fkey" => "buku.id_buku=pasok.id_buku"
				)
			);

			$sqlResult = $this->db_model->read("*","pasok",array("id_pasok"=>$id),"",$join);
			

			$data['details'] = $sqlResult[0];
			
		}

		$data_distrib = $this->db_model->read("*","distributor");
		$data_dist=array();

		foreach($data_distrib as $a) {
			$data_dist += array($a->id_distributor => $a->nama_distributor);
		}

		$data_books = $this->db_model->read("*","buku");
		$data_buku=array();

		foreach($data_books as $a) {
			$data_buku += array($a->id_buku => $a->judul);
		}

		$data['distributor_options'] = $data_dist;
		$data['buku_options'] = $data_buku;

		$this->load->view('index',$data);
	}

	public function kasir_form($id="") {
		$data['view'] = 'admin/v_kasir_form';
		$data['type'] = empty($id)?'add':'edit';

		if(!empty($id)) {
			$sqlResult = $this->db_model->read("*","kasir",array("id_kasir"=>$id));
			$data['details'] = $sqlResult[0];
		}

		$this->load->view('index',$data);
	}

	public function transaksi_form($id="") {
		if(!empty($id)) {
			$sqlResult = $this->db_model->read("*","penjualan",array("id_penjualan"=>$id));
			$data['details'] = $sqlResult[0];
			
		}

		$data_books = $this->db_model->read("*","buku");
		$data_buku=array();

		foreach($data_books as $a) {
			$data_buku += array($a->id_buku => $a->judul);
		}

		$data_kasirs = $this->db_model->read("*","kasir");
		$data_kasir=array();

		foreach($data_kasirs as $a) {
			$data_kasir += array($a->id_kasir => $a->nama);
		}

		$data['kasir_options'] = $data_kasir;
		$data['buku_options'] = $data_buku;
		$data['view'] = 'admin/v_transaksi_form';
		$data['type'] = empty($id)?'add':'edit';
		$this->load->view('index',$data);
	}

	/*Report Generation Goes Here.
	*/




	/* CRUD Section Goes Here.
		ID: CRUD Berada di Bagian Ini.
	*/

	function buku_crud($id="") {
		$input = $this->input->post(NULL, TRUE);
		$data = array(
			"judul"=>$input['judul'],
			"noisbn"=>$input['noisbn'],
			"penulis"=>$input['penulis'],
			"penerbit"=>$input['penerbit'],
			"tahun"=>$input['tahun'],
			"stok"=>$input['stok'],
			"harga_pokok"=>$input['harga_pokok'],
			"harga_jual"=>$input['harga_jual'],
			"ppn"=>$input['ppn'],
			"diskon"=>$input['diskon']);

		if(empty($id)) {
			$this->db_model->create("buku",$data);
			$this->session->set_flashdata("success", "Berhasil menambahkan buku!");
		} else {
			$this->db_model->update("buku",array("id_buku"=>$id),$data);
			$this->session->set_flashdata("success", "Berhasil mengubah data buku!");
		}
		redirect("admin/data_buku");
	}

	function kasir_crud($id="") {
		$input = $this->input->post(NULL, TRUE);
		$data = array(
			"nama"=>$input['nama'],
			"alamat"=>$input['alamat'],
			"telepon"=>$input['telepon'],
			"status"=>$input['status'],
			"username"=>$input['username'],
			"password"=>$this->isPass($input['password']),
			"akses"=>$input['akses']);

		if(empty($id)) {
			$this->db_model->create("kasir",$data);
			$this->session->set_flashdata("success", "Berhasil menambahkan kasir!");
		} else {
			$this->db_model->update("kasir",array("id_kasir"=>$id),$data);
			$this->session->set_flashdata("success", "Berhasil mengubah data kasir!");
		}
		redirect("admin/data_kasir");
	}

	function isPass($s) {
		if(strlen($s)<32) return md5($s); else return $s; 
	}

	function distributor_crud($id="") {
		$input = $this->input->post(NULL, TRUE);
		$data = array(
			"nama_distributor"=>$input['nama_distributor'],
			"alamat"=>$input['alamat'],
			"telepon"=>$input['telepon']);

		if(empty($id)) {
			$this->db_model->create("distributor",$data);
			$this->session->set_flashdata("success", "Berhasil menambahkan distributor!");
		} else {
			$this->db_model->update("distributor",array("id_distributor"=>$id),$data);
			$this->session->set_flashdata("success", "Berhasil mengubah data distributor!");
		}
		redirect("admin/data_distributor");
	}

	function pasok_crud($id="") {
		$input = $this->input->post(NULL, TRUE);
		$data = array(
			"id_distributor"=>$input['id_distributor'],
			"id_buku"=>$input['id_buku'],
			"jumlah"=>$input['jumlah'],
			"tanggal"=>$input['tanggal']);

		if(empty($id)) {
			$this->db_model->create("pasok",$data);
			$this->session->set_flashdata("success", "Berhasil menambahkan pasokan!");
		} else {
			$this->db_model->update("pasok",array("id_pasok"=>$id),$data);
			$this->session->set_flashdata("success", "Berhasil mengubah data pasokan!");
		}
		redirect("admin/data_pemasok");
	}

	function transaksi_crud($id="") {
		$input = $this->input->post(NULL, TRUE);
		$data = array(
			"id_buku"=>$input['id_buku'],
			"id_kasir"=>$input['id_kasir'],
			"jumlah"=>$input['jumlah'],
			"total"=>$input['total'],
			"tanggal"=>$input['tanggal']);

		if(empty($id)) {
			$this->db_model->create("penjualan",$data);
			$this->session->set_flashdata("success", "Berhasil menambahkan transaksi!");
		} else {
			$this->db_model->update("penjualan",array("id_penjualan"=>$id),$data);
			$this->session->set_flashdata("success", "Berhasil mengubah data transaksi!");
		}
		redirect("admin/data_transaksi");
	}

	function delete_buku($id) {
		$this->db_model->delete("buku", array("id_buku"=>$id));
		$this->session->set_flashdata("success", "Berhasil menghapus buku!");
		redirect("admin/data_buku");
	}

	function delete_transaksi($id) {
		$this->db_model->delete("penjualan", array("id_penjualan"=>$id));
		$this->session->set_flashdata("success", "Berhasil menghapus transaksi!");
		redirect("admin/data_transaksi");
	}

	function delete_distributor($id) {
		$this->db_model->delete("distributor", array("id_distributor"=>$id));
		$this->session->set_flashdata("success", "Berhasil menghapus distributor!");
		redirect("admin/data_distributor");
	}

	function delete_pemasok($id) {
		$this->db_model->delete("pasok", array("id_pasok"=>$id));
		$this->session->set_flashdata("success", "Berhasil menghapus pasokan!");
		redirect("admin/data_pemasok");
	}

	function delete_kasir($id) {
		$this->db_model->delete("kasir", array("id_kasir"=>$id));
		$this->session->set_flashdata("success", "Berhasil menghapus kasir!");
		redirect("admin/data_kasir");
	}
}
