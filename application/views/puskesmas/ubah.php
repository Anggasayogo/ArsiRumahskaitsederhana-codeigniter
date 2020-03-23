
<div class="card">
  <!-- Card header -->
  <div class="card-header">
    <h3 class="mb-0">Ubah Data</h3>
    <p class="text-sm mb-0">
     <?php if($this->session->flashdata('message')){ ?>
      <div class="alert alert-primary" role="alert">
        <?= $this->session->flashdata('message'); ?>
      </div>
    <?php }else{ null; }?>
  </p>
</div>
<div class="table-responsive py-4">
  <div class="container">
    <form method="post" action="<?= base_url('Puskesmas/act_ubah') ?>" >
      <input type="hidden" name="id" value="<?= $puskesmas['id'] ?>">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Kode Baru</label>
            <input type="text" name="kode_baru" class="form-control" value="<?= $puskesmas['kode_baru'] ?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Pkm</label>
            <input type="text" name="pkm" class="form-control" value="<?= $puskesmas['pkm'] ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Kode Pkm Trim</label>
            <input type="text" name="kode_pkm_trim" class="form-control" value="<?= $puskesmas['kode_pkm_trim'] ?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Kode Pkm Kosong</label>
            <input type="text" name="kode_pkm_kosong" class="form-control" value="<?= $puskesmas['kode_pkm_kosong'] ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label>Kode</label>
            <input type="text" name="kode" class="form-control" value="<?= $puskesmas['kode'] ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Provinsi</label>
            <select class="form-control" name="id_provinsi">
              <?php foreach($provinsi as $key => $value ) : ?>
              <option value="<?= $key ?>"><?= $value['nama_provinsi'] ?></option>
            <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Kabupaten</label>
            <input type="text" name="kabupaten" class="form-control" value="<?= $puskesmas['kabupaten'] ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label>Kecamatan</label>
            <input type="text" name="kecamatan" class="form-control" value="<?= $puskesmas['kecamatan'] ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Nama Puskesmas</label>
            <input type="text" name="nama" class="form-control" value="<?= $puskesmas['nama'] ?>">
          </div>
        </div>
        <div class="col-md-4">
          <label>Jenis Puskesmas</label>
          <input type="text" name="jenis_puskesmas" class="form-control" value="<?= $puskesmas['jenis_puskesmas'] ?>">
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Type</label>
            <select class="form-control" name="type">
              <option value="rawat inap">Rawat Inap</option>
              <option value="non rawat inap">Non Rawat Inap</option>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Kriteria</label>
            <input type="text" name="kriteria" class="form-control" value="<?= $puskesmas['kriteria'] ?>">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label>Alamat</label>
        <textarea class="form-control" name="alamat" placeholder="Input Alamat"><?= $puskesmas['alamat'] ?></textarea>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label>Kriteria dirjen yankes</label>
            <input type="text" name="kriteria_dirjen_yankes" class="form-control" value="<?= $puskesmas['kriteria_dirjen_yankes'] ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Dokter Umum</label>
            <input type="number" name="dokter_umum" class="form-control" value="<?= $puskesmas['dokter_umum'] ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Dokter Gigi</label>
            <input type="number" name="dokter_gigi" class="form-control" value="<?= $puskesmas['dokter_gigi'] ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label>Perawat</label>
            <input type="number" name="perawat" class="form-control" value="<?= $puskesmas['perawat'] ?>">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Bidan</label>
            <input type="number" name="bidan" class="form-control" value="<?= $puskesmas['bidan'] ?>">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Gizi</label>
            <input type="number" name="gizi" class="form-control" value="<?= $puskesmas['gizi'] ?>">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Farmasi</label>
            <input type="number" name="farmasi" class="form-control" value="<?= $puskesmas['farmasi'] ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label>Kesling</label>
            <input type="number" name="kesling" class="form-control" placeholder="Kesling">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Kesmas</label>
            <input type="number" name="kesmas" class="form-control" value="<?= $puskesmas['kesmas'] ?>">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Atlm</label>
            <input type="number" name="atlm" class="form-control" value="<?= $puskesmas['atlm'] ?>">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="<?= $puskesmas['jumlah'] ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label>Tanpa dokter</label>
            <input type="number" name="tanpa_dokter" class="form-control" value="<?= $puskesmas['tanpa_dokter'] ?>">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Stunting</label>
            <input type="number" name="stunting" class="form-control" value="<?= $puskesmas['stunting'] ?>">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>AKI&AKB</label>
            <input type="number" name="aki_dan_akb" class="form-control" placeholder="Aki Dan Akb">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Nakes Tidak Lengkap</label>
            <input type="number" name="nakes_tidak_lengkap" class="form-control" value="<?= $puskesmas['nakes_tdk_lengkap'] ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Tanpa Dokter Datain Koreksi Desk</label>
            <input type="number" name="tnpa_dktr_datain_koreksi_desk" class="form-control" value="<?= $puskesmas['tanpa_dokter_data_koreksi_desk'] ?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Wahana Rs</label>
            <input type="number" name="wahana_rs" class="form-control" value="<?= $puskesmas['wahana_rs'] ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label>Sudah Pks</label>
            <input type="number" name="sudah_pks" class="form-control" value="<?= $puskesmas['sudah_pks'] ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Jenis Wahana</label>
            <input type="number" name="jenis_wahana" class="form-control" value="<?= $puskesmas['jenis_wahana'] ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Periode Mulai</label>
            <input type="number" name="periode_mulai" class="form-control" value="<?= $puskesmas['periode_mulai'] ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label>Status Wahan</label>
            <input type="number" name="status_wahana" class="form-control" value="<?= $puskesmas['status_wahana'] ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Angkatan</label>
            <input type="number" name="angkatan" class="form-control" value="<?= $puskesmas['angkatan'] ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Unit Penempatan</label>
            <input type="number" name="unit_penempatan" class="form-control" value="<?= $puskesmas['unit_penempatan'] ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label>Pendamping Aktif</label>
            <input type="number" name="pendamping_aktif" class="form-control" value="<?= $puskesmas['pendamping_aktif'] ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Kapasitas</label>
            <input type="number" name="kapasitas" class="form-control" value="<?= $puskesmas['kapasitas'] ?>">
          </div>
        </div>
        <div class="col-md-4">
          <button class="form-control btn btn-primary" type="submit">Submit</button>
        </div>
      </div>

    </form>
  </div>
</div>
</div>
