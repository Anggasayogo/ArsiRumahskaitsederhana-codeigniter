
<div class="card">
  <!-- Card header -->
  <div class="card-header">
    <h3 class="mb-0">Si-Rs</h3>
    <div class="row">
      <div class="col-md-6">
        <p class="text-sm mb-0">
         <?php if($this->session->flashdata('message')){ ?>
          <div class="alert alert-primary" role="alert">
            <?= $this->session->flashdata('message'); ?>
          </div>
        <?php }else{ null; }?>
      </p>
    </div>
    <div class="col-md-6" style="display: block;">
      <a href="<?= base_url('Sirs/tambah') ?>" class="fa fa-plus btn btn-info btn-sm float-right"></a>
    </div> 
  </div>
</div>
<div class="table-responsive py-4">
  <table class="table table-striped table-hover dt-responsive display nowrape" id="puskesmas">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th>kode Baru</th>
        <th>Pkm</th>
        <th>Provinsi</th>
        <th>Kabupaten</th>
        <th>Kode pkm</th>
        <th>Nama pkm</th>
        <th>Type</th>
        <th>Kriteria</th>
        <th>Kriteria dirjen yankes</th>
        <th>Dokter umum</th>
        <th>Dokter gigi</th>
        <th>Perawat</th>
        <th>Bidan</th>
        <th>Gizi</th>
        <th>Farmasi</th>
        <th>Keslink</th>
        <th>Kesmas</th>
        <th>Atlm</th>
        <th>Jumlah</th>
        <th>Tanpa dokter dating</th>
        <th>Stunting</th>
        <th>Aki&akb</th>
        <th>Nakes tidak lengkap</th>
        <th>Tanpa dokter datain koreksi desk</th>       
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

    </tbody>
  </table>
</div>
</div>

<script type="text/javascript">
  var table;
  $(document).ready(function() {

    //datatables
    table = $('#puskesmas').DataTable({
      "dom": 'Bfrtipl',
      "buttons": [
      {extend : 'excel',
      title : 'Data User'},
      {extend : 'pdf',
      title : 'Data User',
      orientation: 'landscape'},
      {extend : 'print',
      title : 'Data User'}
      ],

      initComplete: function () {
        var btns = $('.dt-button');
        btns.addClass('btn btn-outline-primary btn-sm');
        btns.removeClass('dt-button');
      },
      "processing": true,
      "serverSide": true,
      "order": [],

      "ajax": {
        "url": "<?php echo site_url('Sirs/datatable_sirs')?>",
        "type": "POST"
      },


      "columnDefs": [{
        "targets": [0],
        "orderable": false,
      }, ],



    });

    $('#puskesmas tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = table.row( tr );

      if ( row.child.isShown() ) {
        // This row is already open - close it
        row.child.hide();
        tr.removeClass('shown');
      }
      else {
        // Open this row
        row.child( format(row.data()) ).show();
        tr.addClass('shown');
      }
    } );

  });

</script>