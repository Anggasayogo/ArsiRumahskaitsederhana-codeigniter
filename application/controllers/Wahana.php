<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wahana extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Wahana_model');
		if(!$this->session->userdata('username')){
			redirect('Auth');
		}
	}

	public function index()
	{
		$this->template->load('template','wahana/index');
	}

	public function datatable_wahana()
    {
        $list = $this->Wahana_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->kode_baru;
            $row[] = $field->pkm;
            $row[] = $field->nama_provinsi;
            $row[] = $field->kabupaten;
            $row[] = $field->wahana_rs;
            $row[] = $field->status_pks;
            $row[] = $field->jenis_wahana;
            $row[] = $field->periode_mulai;
            $row[] = $field->status_wahana;
            $row[] = $field->angkatan;
            $row[] = $field->unit_penempatan;
            $row[] = $field->pendaping_aktif;
            $row[] = $field->kapasitas_wahana;
            //$row[] = $field->id;
            $row[] = '
            <a class="fa fa-edit btn btn-warning btn-sm" href="'.base_url('Wahana/').'v_ubah/'.$field->id.'"></a>
            <a class="fa fa-trash btn btn-danger btn-sm" onclick="return confirm("Apakah Anda Yakin Ingin Menghapus Data!")" href="'.base_url('Wahana/').'act_hapus/'.$field->id.'"></a>
            ';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Wahana_model->count_all(),
            "recordsFiltered" => $this->Wahana_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }


    public function v_tambah()
    {
        $data['provinsi'] = $this->Wahana_model->getProvinsi();
        $this->template->load('template','wahana/tambah',$data);
    }

    public function act_tambah()
    {
        $this->Wahana_model->tambahData();
    }

    public function act_hapus($id)
    {
      $this->db->delete('wahana_rs',['id' => $id]);
      $this->session->set_flashdata('message','Data Berhasil Dihapus');
      redirect('wahana');
    }

    public function v_ubah($id)
    {
      $data['provinsi'] = $this->Wahana_model->getProvinsi();
      $data['whana'] = $this->Wahana_model->getDetail($id);
      $this->template->load('template','wahana/ubah',$data);
    }

    public function act_ubah()
    {
       $id = $this->input->post('id');
       $this->Wahana_model->ubahdetaildata($id);
    }


}