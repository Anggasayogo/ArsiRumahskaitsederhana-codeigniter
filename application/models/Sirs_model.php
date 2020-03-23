<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Sirs_model extends CI_Model{

    public $table = 'sirs';
    public $column_order = array(null,'kode_baru','pkm','nama_provinsi','kabupaten','kode_pkm','nama_pkm','type','kriteria','kriteria_dirjen_yankes','dokter_umum','dokter_gigi','perawat','bidan','gizi','farmasi','keslink','kesmas','atlm','jumlah','tanpa_dokter_dating','stunting','aki_dan_akb','nakes_tidak_lengkap','tanpa_dokter_datain_koreksi_desk','id'); 
    public $column_search = array('kode_baru','pkm','nama_provinsi','kabupaten','kode_pkm','nama_pkm','type','kriteria','kriteria_dirjen_yankes','dokter_umum','dokter_gigi','perawat','bidan','gizi','farmasi','keslink','kesmas','atlm','jumlah','tanpa_dokter_dating','stunting','aki_dan_akb','nakes_tidak_lengkap','tanpa_dokter_datain_koreksi_desk','id'); 
    public $order = array('id' => 'desc'); // default order


    private function _get_datatables_query()
    {
        
        $this->db->from($this->table);
        $this->db->join('provinsi','sirs.id_provinsi = provinsi.id_provinsi');
        $i = 0;

        foreach ($this->column_search as $item) 
        {
            if ($_POST['search']['value'])
            {

                if ($i === 0)
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

    public function getDetailData($id)
    {
        return $this->db->get_where('sirs',['id' => $id])->row_array();
    }
    
    public function allprovinsi()
    {
        return $this->db->get('provinsi')->result_array();
    }

    public function tambahDataSirs($data)
    {
        $this->db->insert('sirs',$data);
        $this->session->set_flashdata('message','Data Berhasil Ditambahkan');
        redirect('Sirs');
    }

    public function ubahdata($id)
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

        $this->db->update('sirs',$data,['id' => $id]);
        $this->session->set_flashdata('message','Data Dengan id'.$id.'Succes Diubah');
        redirect('Sirs');
    }

}