<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Customer
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Customer</a></li>
        <li class="active">Data</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <!-- modals -->
    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Form Data Customer</h4>
          </div>
          <div class="modal-body">
              <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <span id="message">None</span>
              </div>
              <div class="form-group">
                <label for="nama_customer">Nama</label>
                <input type="text" class="form-control" name="nama_customer" id="nama_customer" placeholder="Enter Nama">
              </div>
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Enter ..."></textarea>
              </div>
              <div class="form-group">
                <label for="no_hp">Nomor Telp</label>
                <input type="text" class="form-control" id="no_hp" nama="no_hp" placeholder="Enter nomor telepon">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="button" id="buttonKirim" class="btn btn-primary" >Save changes</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <div class="modal fade" id="modal-default1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Form Data Customer</h4>
          </div>
          <div class="modal-body">
              <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <span id="message-update">None</span>
              </div>
              <div class="form-group">
                <label for="e_nama_customer">Nama</label>
                <input type="hidden" class="form-control" name="e_id_customer" id="e_id_customer" placeholder="Enter id">
                <input type="text" class="form-control" name="e_nama_customer" id="e_nama_customer" placeholder="Enter Nama">
              </div>
              <div class="form-group">
                <label for="e_email">Email address</label>
                <input type="email" class="form-control" id="e_email" name="e_email" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" rows="3" name="e_alamat" id="e_alamat" placeholder="Enter ..."></textarea>
              </div>
              <div class="form-group">
                <label for="no_hp">Nomor Telp</label>
                <input type="text" class="form-control" id="e_no_hp" nama="e_no_hp" placeholder="Enter nomor telepon">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="button" id="updateCustomer" class="btn btn-primary">Update changes</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-default">
            <div class="box-body">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                Tambah Data
              </button>
              <button type="button" id="btnRefresh" class="btn btn-success">
                Refresh
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12" id="message-delete">
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Customer</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id Customer</th>
                  <th>Nama Customer</th>
                  <th>Alamat</th>
                  <th>Email</th>
                  <th>Nomor HP</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody id="datatest">
                <?php 
                    $select = mysqli_query($conn, "select * from customer");
                    while($data = mysqli_fetch_object($select)){
                      echo "<tr>".
                            "<td>".$data->id_customer."</td>".
                            "<td>".$data->nama_customer."</td>".
                            "<td>".$data->alamat."</td>".
                            "<td>".$data->email."</td>".
                            "<td>".$data->no_hp."</td>".
                            "<td>
                              <div class='btn-group'>
                              <button type='button' class='btn btn-success btn-sm' onclick='editdata($data->id_customer)' data-toggle='modal' data-target='#modal-default1'><i class='fa fa-edit'></i></button>
                              <button type='button' class='btn btn-danger btn-sm' onclick='deleteDataCustomer($data->id_customer)'><i class='fa fa-trash'></i></button>
                              </div>
                            </td>".
                            "</tr>";
                    }
                ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  <script src="modul/script/customer-script.js"></script>