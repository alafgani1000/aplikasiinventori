<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Supplier
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Supplier</a></li>
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
            <h4 class="modal-title">Form Data Supplier</h4>
          </div>
          <div class="modal-body">
              <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <span id="message">None</span>
              </div>
              <div class="form-group">
                <label for="nama_supplier">Nama</label>
                <input type="text" class="form-control" name="nama_supplier" id="nama_supplier" placeholder="Enter Nama">
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
            <h4 class="modal-title">Form Edit Data Supplier</h4>
          </div>
          <div class="modal-body">
              <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <span id="message-update">None</span>
              </div>
              <div class="form-group">
                <label for="e_nama_supplier">Nama Supplier</label>
                <input type="hidden" class="form-control" name="e_id_supplier" id="e_id_supplier" placeholder="Enter id">
                <input type="text" class="form-control" name="e_nama_supplier" id="e_nama_supplier" placeholder="Enter Nama">
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
                <label for="e_no_hp">Nomor Telp</label>
                <input type="text" class="form-control" id="e_no_hp" nama="e_no_hp" placeholder="Enter nomor telepon">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="button" id="updateSupplier" class="btn btn-primary">Update changes</button>
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
              <h3 class="box-title">Data Supplier</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id Supplier</th>
                  <th>Nama Supplier</th>
                  <th>Alamat</th>
                  <th>Nomor Hp</th>
                  <th>Email</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody id="datatest">
                <?php 
                    $select = mysqli_query($conn, "select * from supplier");
                    while($data = mysqli_fetch_object($select)){
                      echo "<tr>".
                            "<td>".$data->id_supllier."</td>".
                            "<td>".$data->nama_supplier."</td>".
                            "<td>".$data->alamat."</td>".
                            "<td>".$data->no_hp."</td>".
                            "<td>".$data->email."</td>".
                            "<td>
                              <div class='btn-group'>
                              <button type='button' class='btn btn-success btn-sm' onclick='objsupplier.editData($data->id_supllier)' data-toggle='modal' data-target='#modal-default1'><i class='fa fa-edit'></i></button>
                              <button type='button' class='btn btn-danger btn-sm btnDelete' onclick='objsupplier.deleteData($data->id_supllier)'><i class='fa fa-trash'></i></button>
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

<script>
  let btnKirim = document.getElementById('buttonKirim');
  let btnRefresh = document.getElementById('btnRefresh');
  let updateSupplier = document.getElementById('updateSupplier');
  let objsupplier = {
      "id_supplier"   :"", 
      "nama_supplier" :"",
      "alamat"        :"",
      "nohp"          :"",
      "email"         :"",
      "getData": ()=>{
        let xmlHttp = new XMLHttpRequest();
        let url = "modul/supplier/index_process.php";
        xmlHttp.onreadystatechange = function() {
        if(xmlHttp.readyState == 4) { 
            let resJson = JSON.parse(xmlHttp.responseText);
            let dataCustomer = "";
            for(let dataJson = 0; dataJson < resJson.length; dataJson++)
            {
            dataCustomer += "<tr>"+
                                    "<td>"+ resJson[dataJson].id_supllier +"</td>"+ 
                                    "<td>"+ resJson[dataJson].nama_supplier +"</td>"+
                                    "<td>"+ resJson[dataJson].alamat +"</td>"+
                                    "<td>"+ resJson[dataJson].no_hp +"</td>"+
                                    "<td>"+ resJson[dataJson].email +"</td>"+
                                    "<td><div class='btn-group'>"+
                                    "<button type='button' class='btn btn-success btn-sm' onclick='objsupplier.editData("+ resJson[dataJson].id_supllier +")' data-toggle='modal' data-target='#modal-default1'><i class='fa fa-edit'></i></button>"+
                                    "<button type='button' class='btn btn-danger btn-sm btnDelete' onclick='objsupplier.deleteData("+ resJson[dataJson].id_supllier +")'><i class='fa fa-trash'></i></button>"+
                                    "</div></td>"+
                                "</tr>";
            }
            
            document.getElementById("datatest").innerHTML = dataCustomer;
        }
        }
        xmlHttp.open("GET",url,true);
        xmlHttp.send();
      },
      "sendData": ()=>{
         this.nama_supplier = document.getElementById("nama_supplier").value;
         this.alamat        = document.getElementById("alamat").value;
         this.nohp          = document.getElementById("no_hp").value;
         this.email         = document.getElementById("email").value;

         let xmlHttp = new XMLHttpRequest();
         let url = "modul/supplier/create_process.php"; 
         let param = "create=supplier" + "&namasupplier=" + this.nama_supplier + "&alamat=" + this.alamat + "&nohp=" + this.nohp + "&email=" + this.email;
         xmlHttp.onreadystatechange = function() {
           if(xmlHttp.readyState == 4)
           {
              let response = xmlHttp.responseText;
              document.getElementById("message").innerHTML = response;
           }
         }

         xmlHttp.open("POST", url, true);
         xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xmlHttp.send(param);
      },
      "deleteData": (id)=>{
        let xmlHttp = new XMLHttpRequest();
        let supplier = "supplier";
        let url = "modul/supplier/delete_process.php";
        let param = "delete=" + supplier + "&id=" + id;

        xmlHttp.onreadystatechange = function()
        {
          let res = xmlHttp.responseText;
          document.getElementById("message-delete").innerHTML = "<div class='alert alert-warning alert-dismissible'>"+
              "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"+
              "<span >"+ res +"</span>"+
          "</div>"; 
        }

        objsupplier.getData();

        xmlHttp.open("POST",url, true);
        xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlHttp.send(param);
      },
      "editData": (id)=>{
        let xmlHttp = new XMLHttpRequest();
        let url = "modul/supplier/edit_process.php?op=getdata&id=" + id;
        xmlHttp.onreadystatechange = function() 
        {
        if(xmlHttp.readyState == 4)
        {
            let res = xmlHttp.responseText;
            let resJson = JSON.parse(res);
            document.getElementById("e_nama_supplier").value = resJson.nama_supplier;
            document.getElementById("e_email").value = resJson.email;
            document.getElementById("e_alamat").value = resJson.alamat;
            document.getElementById("e_no_hp").value = resJson.no_hp;
            document.getElementById("e_id_supplier").value = resJson.id_supllier;
        }
        }
        xmlHttp.open("GET",url,true);
        xmlHttp.send(null);
      },
      "updateData": ()=>{
        this.id_supplier = document.getElementById("e_id_supplier").value;
        this.nama_supplier = document.getElementById("e_nama_supplier").value;
        this.email = document.getElementById("e_email").value;
        this.alamat = document.getElementById("e_alamat").value;
        this.nohp = document.getElementById("e_no_hp").value;
        let supplier = "supplier";
        let xmlHttp = new XMLHttpRequest();
        let url = "modul/supplier/update_process.php";
        let param = "create=" + supplier + "&namaSupplier=" +  this.nama_supplier + "&email=" + this.email + "&alamat=" + this.alamat + "&noHp=" + this.nohp + "&id=" + this.id_supplier ;

        xmlHttp.onreadystatechange = function() 
        {
        let res = xmlHttp.responseText;
        document.getElementById("message-update").innerHTML = res;
        getDataCustomer(); 
        }
        xmlHttp.open("POST",url,true);
        xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlHttp.send(param);
      }
      
  }

  // kirim data and refreshdata
  btnKirim.addEventListener('click', objsupplier.sendData);
  btnKirim.addEventListener('click', objsupplier.getData);

  // refresh data dengan tombol refresh  
  btnRefresh.addEventListener('click', objsupplier.getData);

  updateSupplier.addEventListener('click', objsupplier.updateData);
  updateSupplier.addEventListener('click', objsupplier.getData);

</script>