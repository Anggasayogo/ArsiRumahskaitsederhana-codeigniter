
<div class="card">
  <!-- Card header -->
  <div class="card-header">
    <h3 class="mb-0">Puskesmas</h3>
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
    <form method="post" action="<?= base_url('Wahana/act_tambah') ?>" >
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Kode Baru</label>
            <input type="text" name="kode_baru" class="form-control" placeholder="Kode Baru">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Pkm</label>
            <input type="text" name="pkm" class="form-control" placeholder="Pkm">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Provinsi</label>
            <select class="form-control" name="id_provinsi">
              <?php foreach($provinsi as $key => $value ) : ?>
                <option value="<?= $key ?>"><?= $value['nama_provinsi'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Kabupaten</label>
            <input type="text" name="kabupaten" class="form-control" placeholder="Kabupaten">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Wahana Rs</label>
            <input type="text" name="wahana_rs" class="form-control" placeholder="Whana Rs">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Status Pks</label>
            <input type="number" name="status_pks" class="form-control" placeholder="Status Pks">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Jenis Wahana</label>
            <input type="text" name="jenis_wahana" class="form-control" placeholder="Jenis Wahana">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Periode Mulai</label>
            <input type="text" name="periode_mulai" class="form-control" placeholder="Periode Mulai">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Status Wahana</label>
            <input type="text" name="status_wahana" class="form-control" placeholder="Status Wahan">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Angkatan</label>
            <input type="number" name="angkatan" class="form-control" placeholder="Angkatan">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Unit Penempatan</label>
            <input type="text" name="unit_penempatan" class="form-control" placeholder="Unit Penempatan">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label>Pendamping Aktif</label>
            <input type="text" name="pendamping_aktif" class="form-control" placeholder="Pendamping Aktif">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Kpasitas Wahana</label>
            <input type="number" name="kapasitas_wahana" class="form-control" placeholder="kapasitas wahana">
          </div>
        </div>
        <div class="col-md-6">
          <button class="btn btn-primary form-control">Submit</button>
        </div>
      </div> 
    </form>
  </div>
</div>
</div>
