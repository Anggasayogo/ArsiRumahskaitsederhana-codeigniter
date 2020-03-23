<?php 

class Puskesmas_model extends CI_Model{

	public function getAllData()
	{
		$this->db->select('kode_baru, pkm, kode_pkm_trim, kode_pkm_kosong, kode, id_provinsi, kabupaten,kecamatan,nama,jenis_puskesmas,alamat,type,kriteria,kriteria_dirjen_yankes,dokter_umum,dokter_gigi,perawat,bidan,gizi,farmasi,keslink,kesmas,atlm,jumlah,tanpa_dokter,stunting,aki_dan_akb,nakes_tdk_lengkap,tanpa_dokter_data_koreksi_desk,wahana_rs,sudah_pks,jenis_wahana,periode_mulai,status_wahana,angkatan,unit_penempatan,pendamping_aktif,kapasitas,id');
		$this->db->from('puskesmas');
		$query = $this->db->get();
		return $query->result_array();
	}

	// DATATABLE USER
    public $table = 'puskesmas'; //nama tabel dari database
    public $column_order = array(null, 'kode_baru', 'pkm', 'kode_pkm_trim', 'kode_pkm_kosong', 'kode', 'nama_provinsi', 'kabupaten','kecamatan','nama','jenis_puskesmas','alamat','type','kriteria','kriteria_dirjen_yankes','dokter_umum','dokter_gigi','perawat','bidan','gizi','farmasi','keslink','kesmas','atlm','jumlah','tanpa_dokter','stunting','aki_dan_akb','nakes_tdk_lengkap','tanpa_dokter_data_koreksi_desk','wahana_rs','sudah_pks','jenis_wahana','periode_mulai','status_wahana','angkatan','unit_penempatan','pendamping_aktif','kapasitas','id'); //field yang ada di table user
    public $column_search = array('kode_baru', 'pkm', 'kode_pkm_trim', 'kode_pkm_kosong', 'kode', 'nama_provinsi', 'kabupaten','kecamatan','nama','jenis_puskesmas','alamat','type','kriteria','kriteria_dirjen_yankes','dokter_umum','dokter_gigi','perawat','bidan','gizi','farmasi','keslink','kesmas','atlm','jumlah','tanpa_dokter','stunting','aki_dan_akb','nakes_tdk_lengkap','tanpa_dokter_data_koreksi_desk','wahana_rs','sudah_pks','jenis_wahana','periode_mulai','status_wahana','angkatan','unit_penempatan','pendamping_aktif','kapasitas','id'); //field yang diizin untuk pencarian
    public $order = array('id' => 'desc'); // default order


	private function _get_datatables_query()
    {
        
        $this->db->from($this->table);
        $this->db->join('provinsi','puskesmas.id_provinsi = provinsi.id_provinsi');
        $i = 0;

        foreach ($this->column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) {
                    $this->db->group_end();
                }

            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getAllProvinsi()
    {
        return $this->db->get('provinsi')->result_array();
    }

    public function tambahData()
    {

        $data = [
            'kode_baru' => $this->input->post('kode_baru'),
            'pkm' => $this->input->post('pkm'),
            'kode_pkm_trim' => $this->input->post('kode_pkm_trim'),
            'kode_pkm_kosong' => $this->input->post('kode_pkm_kosong'),
            'kode' => $this->input->post('kode'),
            'id_provinsi' => $this->input->post('id_provinsi'),
            'kabupaten' => $this->input->post('kabupaten'),
            'kecamatan' => $this->input->post('kecamatan'),
            'nama' => $this->input->post('nama'),
            'jenis_puskesmas' => $this->input->post('jenis_puskesmas'),
            'alamat' => $this->input->post('alamat'),
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
            'tanpa_dokter' => $this->input->post('tanpa_dokter'),
            'stunting' => $this->input->post('stunting'),
            'aki_dan_akb' => $this->input->post('aki_dan_akb'),
            'nakes_tdk_lengkap' => $this->input->post('nakes_tidak_lengkap'),
        'tanpa_dokter_data_koreksi_desk' => $this->input->post('tnpa_dktr_datain_koreksi_desk'),
            'wahana_rs' => $this->input->post('wahana_rs'),
            'sudah_pks' => $this->input->post('sudah_pks'),
            'jenis_wahana' => $this->input->post('jenis_wahana'),
            'periode_mulai' => $this->input->post('periode_mulai'),
            'status_wahana' => $this->input->post('status_wahana'),
            'angkatan' => $this->input->post('angkatan'),
            'unit_penempatan' => $this->input->post('unit_penempatan'),
            'pendamping_aktif' => $this->input->post('pendamping_aktif'),
            'kapasitas' => $this->input->post('kapasitas'),

        ];

        $this->db->insert('puskesmas',$data);
        $this->session->set_flashdata('message','Data Baru Telah Ditambahkan');
        redirect('Puskesmas');
    }

    public function getallPuskesmas($id)
    {
        return $this->db->get_where('puskesmas',['id' => $id])->row_array();
    }

    public function UbahDataBerdasarkanId($id)
    {
        $data = [
            'kode_baru' => $this->input->post('kode_baru'),
            'pkm' => $this->input->post('pkm'),
            'kode_pkm_trim' => $this->input->post('kode_pkm_trim'),
            'kode_pkm_kosong' => $this->input->post('kode_pkm_kosong'),
            'kode' => $this->input->post('kode'),
            'id_provinsi' => $this->input->post('id_provinsi'),
            'kabupaten' => $this->input->post('kabupaten'),
            'kecamatan' => $this->input->post('kecamatan'),
            'nama' => $this->input->post('nama'),
            'jenis_puskesmas' => $this->input->post('jenis_puskesmas'),
            'alamat' => $this->input->post('alamat'),
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
            'tanpa_dokter' => $this->input->post('tanpa_dokter'),
            'stunting' => $this->input->post('stunting'),
            'aki_dan_akb' => $this->input->post('aki_dan_akb'),
            'nakes_tdk_lengkap' => $this->input->post('nakes_tidak_lengkap'),
        'tanpa_dokter_data_koreksi_desk' => $this->input->post('tnpa_dktr_datain_koreksi_desk'),
            'wahana_rs' => $this->input->post('wahana_rs'),
            'sudah_pks' => $this->input->post('sudah_pks'),
            'jenis_wahana' => $this->input->post('jenis_wahana'),
            'periode_mulai' => $this->input->post('periode_mulai'),
            'status_wahana' => $this->input->post('status_wahana'),
            'angkatan' => $this->input->post('angkatan'),
            'unit_penempatan' => $this->input->post('unit_penempatan'),
            'pendamping_aktif' => $this->input->post('pendamping_aktif'),
            'kapasitas' => $this->input->post('kapasitas'),

        ];
        
        $this->db->update('puskesmas',$data,['id' => $id]);
        $this->session->set_flashdata('message','Data Dengan Id ('.$id.') berhasil Diubah');
        redirect('Puskesmas');

    }

}