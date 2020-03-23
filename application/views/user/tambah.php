
<div class="card">
  <!-- Card header -->
  <div class="card-header">
    <h3 class="mb-0">Tambah Data</h3>
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
    <form method="post" action="" >
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" placeholder="Input Username">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Input Email">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Input Password">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="password_conf" class="form-control" placeholder="Password Confirmation">
          </div>
        </div>
      </div>
      <button class="btn btn-primary float-right">Submit!</button>
    </form>
  </div>
</div>
</div>
