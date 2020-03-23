<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Wahana_model extends CI_Model{


    // DATATABLE USER
    public $table = 'wahana_rs';
    public $column_order = array(null,'kode_baru','pkm','nama_provinsi','kabupaten','wahana_rs','status_pks','jenis_wahana','periode_mulai','status_wahana','angkatan','unit_penempatan','pendaping_aktif','kapasitas_wahana','id'); 
    public $column_search = array('kode_baru','pkm','nama_provinsi','kabupaten','wahana_rs','status_pks','jenis_wahana','periode_mulai','status_wahana','angkatan','unit_penempatan','pendaping_aktif','kapasitas_wahana','id'); 
    public $order = array('id' => 'desc'); // default order


	private function _get_datatables_query()
    {
        
        $this->db->from($this->table);
        $this->db->join('provinsi','wahana_rs.id_provinsi = provinsi.id_provinsi');
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

    public function tambahData()
    {
        $data = [
            'kode_baru' => $this->input->post('kode_baru'),
            'pkm' => $this->input->post('pkm'),
            'id_provinsi' => $this->input->post('id_provinsi'),
            'kabupaten' => $this->input->post('kabupaten'),
            'wahana_rs' => $this->input->post('wahana_rs'),
            'status_pks' => $this->input->post('status_pks'),
            'jenis_wahana' => $this->input->post('jenis_wahana'),
            'periode_mulai' => $this->input->post('periode_mulai'),
            'status_wahana' => $this->input->post('status_wahana'),
            'angkatan' => $this->input->post('angkatan'),
            'unit_penempatan' => $this->input->post('unit_penempatan'),
            'pendaping_aktif' => $this->input->post('pendamping_aktif'),
            'kapasitas_wahana' => $this->input->post('kapasitas_wahana'),
        ];

        $this->db->insert($this->table,$data);
        $this->session->set_flashdata('message','Data Berhasil Ditambahkan');
        redirect('wahana');
    }

    public function getProvinsi()
    {
        return $this->db->get('provinsi')->result_array();
    }

    public function getDetail($id)
    {
        return $this->db->get_where($this->table,['id' => $id])->row_array();
    }
    
    public function ubahdetaildata($id)
    {
        $data = [
            'kode_baru' => $this->input->post('kode_baru'),
            'pkm' => $this->input->post('pkm'),
            'id_provinsi' => $this->input->post('id_provinsi'),
            'kabupaten' => $this->input->post('kabupaten'),
            'wahana_rs' => $this->input->post('wahana_rs'),
            'status_pks' => $this->input->post('status_pks'),
            'jenis_wahana' => $this->input->post('jenis_wahana'),
            'periode_mulai' => $this->input->post('periode_mulai'),
            'status_wahana' => $this->input->post('status_wahana'),
            'angkatan' => $this->input->post('angkatan'),
            'unit_penempatan' => $this->input->post('unit_penempatan'),
            'pendaping_aktif' => $this->input->post('pendamping_aktif'),
            'kapasitas_wahana' => $this->input->post('kapasitas_wahana'),
        ];

        $this->db->update('wahana_rs',$data,['id' => $id]);
         $this->session->set_flashdata('message','Data Berhasil Diubah');
        redirect('wahana');
    }

}