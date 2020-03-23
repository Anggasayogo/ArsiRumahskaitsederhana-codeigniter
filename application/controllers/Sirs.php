<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Sirs extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sirs_model');
		if(!$this->session->userdata('username')){
			redirect('Auth');
		}
	}

	public function index(){

		$this->template->load('template','si-rs/index');
	}
    
     public function datatable_sirs()
    {
        $list = $this->Sirs_model->get_datatables();
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
            $row[] = $field->kode_pkm;
            $row[] = $field->nama_pkm;
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
            $row[] = $field->tanpa_dokter_dating;
            $row[] = $field->stunting;
            $row[] = $field->aki_dan_akb;
            $row[] = $field->nakes_tidak_lengkap;
            $row[] = $field->tanpa_dokter_datain_koreksi_desk;
            $row[] = '
            <a class="fa fa-edit btn btn-warning btn-sm" href="'.base_url('Sirs/').'ubah/'.$field->id.'"></a>
            <a class="fa fa-trash btn btn-danger btn-sm" onclick="return confirm("Apakah Anda Yakin Ingin Menghapus Data!")" href="'.base_url('Sirs/').'hapus/'.$field->id.'"></a>
            ';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Sirs_model->count_all(),
            "recordsFiltered" => $this->Sirs_model->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }
    

    public function ubah($id)
    {
        $data['data'] = $this->Sirs_model->getDetailData($id);
        $data['provinsi'] = $this->Sirs_model->allprovinsi();
        $this->template->load('template','si-rs/ubah',$data);
    }

    public function action_ubah()
    {
        $id = $this->input->post('id');
        $this->Sirs_model->ubahdata($id);
    }

    public function tambah()
    {
        $data['provinsi'] = $this->Sirs_model->allprovinsi();
        $this->template->load('template','si-rs/tambah',$data);
    }

    public function action_tambah()
    {
        $data = [
            'kode_baru' => $this->input->post('kode_baru'),
            'pkm' => $this->input->post('pkm'),
            'id_provinsi' => $this->input->post('id_provinsi'),
            'kabupaten' => $this->input->post('kabupaten'),
            'kode_pkm' => $this->input->post('kode_pkm'),
            'nama_pkm' => $this->input->post('nama_pkm'),
            'type' => $this->input->post('type'),
            'kriteria' => $this->input->post('kriteria'),
            'kriteria_dirjen_yankes' => $this->input->post('kriteria_dirjen_yankes'),
            'dokter_umum' => $this->input->post('dokter_umum'),
            'dokter_gigi' => $this->input->post('dokter_gigi'),
            'perawat' => $this->input->post('perawat'),
            'bidan' => $this->input->post('bidan'),
            'gizi' => $this->input->post('gizi'),
            'farmasi' => $this->input->post('farmasi'),
            'keslink' => $this->input->post('kesling'),
            'kesmas' => $this->input->post('kesmas'),
            'atlm' => $this->input->post('atlm'),
            'jumlah' => $this->input->post('jumlah'),
            'tanpa_dokter_dating' => $this->input->post('tanpa_dokter_dating'),
            'stunting' => $this->input->post('stunting'),
            'aki_dan_akb' => $this->input->post('aki_dan_akb'),
            'nakes_tidak_lengkap' => $this->input->post('nakes_tidak_lengkap'),
            'tanpa_dokter_datain_koreksi_desk' => $this->input->post('tnpa_dktr_datain_koreksi_desk')

        ];

        $this->Sirs_model->tambahDataSirs($data);
    }

    public function hapus($id)
    {
        $this->db->delete('sirs',['id' => $id]);
        $this->session->set_flashdata('message','Data Berhasil Dihapus!');
        redirect('Sirs');
    }




}