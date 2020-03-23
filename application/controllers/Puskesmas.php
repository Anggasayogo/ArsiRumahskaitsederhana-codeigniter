<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Puskesmas extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Puskesmas_model','Puskesmas');
		if(!$this->session->userdata('username')){
			redirect('Auth');
		}
	}

	public function cek()
	{
   	    echo json_encode($data['cek'] = $this->Puskesmas->getAllData());
	}

	public function index(){
		$this->template->load('template','puskesmas/index');
	}
    
     public function datatable_puskesmas()
    {
        $list = $this->Puskesmas->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->kode_baru;
            $row[] = $field->pkm;
            $row[] = $field->kode_pkm_trim;
            $row[] = $field->kode_pkm_kosong;
            $row[] = $field->kode;
            $row[] = $field->nama_provinsi;
            $row[] = $field->kabupaten;
            $row[] = $field->kecamatan;
            $row[] = $field->nama;
            $row[] = $field->jenis_puskesmas;
            $row[] = $field->alamat;
            $row[] = $field->type;
            $row[] = $field->kriteria;
            $row[] = $field->kriteria_dirjen_yankes;
            $row[] = $field->dokter_umum;
            $row[] = $field->dokter_gigi;
            $row[] = $field->perawat;
            $row[] = $field->bidan;
            $row[] = $field->gizi;
            $row[] = $field->farmasi;
            $row[] = $field->keslink;
            $row[] = $field->kesmas;
            $row[] = $field->atlm;
            $row[] = $field->jumlah;
            $row[] = $field->tanpa_dokter;
            $row[] = $field->stunting;
            $row[] = $field->aki_dan_akb;
            $row[] = $field->nakes_tdk_lengkap;
            $row[] = $field->tanpa_dokter_data_koreksi_desk;
            $row[] = $field->wahana_rs;
            $row[] = $field->sudah_pks;
            $row[] = $field->jenis_wahana;
            $row[] = $field->periode_mulai;
            $row[] = $field->status_wahana;
            $row[] = $field->angkatan;
            $row[] = $field->unit_penempatan;
            $row[] = $field->pendamping_aktif;
            $row[] = $field->kapasitas;
            //$row[] = $field->id;
            $row[] = '
            <a class="fa fa-edit btn btn-warning btn-sm" href="'.base_url('Puskesmas/').'v_ubah/'.$field->id.'"></a>
            <a class="fa fa-trash btn btn-danger btn-sm" onclick="return confirm("Apakah Anda Yakin Ingin Menghapus Data!")" href="'.base_url('Puskesmas/').'act_hapus/'.$field->id.'"></a>
            ';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Puskesmas->count_all(),
            "recordsFiltered" => $this->Puskesmas->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function v_tambah()
    {
        $data['provinsi'] = $this->Puskesmas->getAllProvinsi();
        $this->template->load('template','puskesmas/tambah',$data);
    }

    public function act_tambah()
    {
        $this->Puskesmas->tambahData();    
    }

    public function v_ubah($id)
    {
        $data['provinsi'] = $this->Puskesmas->getAllProvinsi();
        $data['puskesmas'] = $this->Puskesmas->getallPuskesmas($id);
        $this->template->load('template','puskesmas/ubah',$data);
    }

    public function act_ubah(){
        $id = $this->input->post('id');
        $this->Puskesmas->UbahDataBerdasarkanId($id);
    }

    public function act_hapus($id){
        $this->db->delete('puskesmas',['id' => $id]);
        $this->session->set_flashdata('message','Data Dengan id ('.$id.') Berhasil dihapus!');
        redirect('puskesmas');
    }

}