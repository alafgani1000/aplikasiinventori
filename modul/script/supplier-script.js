let btnKirim = document.getElementById('buttonKirim');
let btnUpdate = document.getElementById('updateCustomer');
let btnRefresh = document.getElementById('btnRefresh');

function editdata(data)
{
    let xmlHttp = new XMLHttpRequest();
    let url = "modul/customer/edit_process.php?op=getdata&id=" + data;
    xmlHttp.onreadystatechange = function() 
    {
    if(xmlHttp.readyState == 4)
    {
        let res = xmlHttp.responseText;
        let resJson = JSON.parse(res);
        document.getElementById("e_nama_customer").value = resJson.nama_customer;
        document.getElementById("e_email").value = resJson.email;
        document.getElementById("e_alamat").value = resJson.alamat;
        document.getElementById("e_no_hp").value = resJson.no_hp;
        document.getElementById("e_id_customer").value = resJson.id_customer;
    }
    }
    xmlHttp.open("GET",url,true);
    xmlHttp.send(null);
}

function getDataCustomer()
{
    let xmlHttp = new XMLHttpRequest();
    let url = "modul/supplier/index_process.php";
    xmlHttp.onreadystatechange = function()
    {
    if(xmlHttp.readyState == 4)
    { 
        let resJson = JSON.parse(xmlHttp.responseText);
        let dataCustomer = "";
        for(let dataJson = 0; dataJson < resJson.length; dataJson++)
        {
        dataCustomer += "<tr>"+
                                "<td>"+ resJson[dataJson].id_supllier +"</td>"+ 
                                "<td>"+ resJson[dataJson].nama_supplier +"</td>"+
                                "<td>"+ resJson[dataJson].alamat +"</td>"+
                                "<td>"+ resJson[dataJson].email +"</td>"+
                                "<td>"+ resJson[dataJson].no_hp +"</td>"+
                                "<td><div class='btn-group'>"+
                                "<button type='button' class='btn btn-success btn-sm' onclick='editdata("+ resJson[dataJson].id_supllier +")' data-toggle='modal' data-target='#modal-default1'><i class='fa fa-edit'></i></button>"+
                                "<button type='button' class='btn btn-danger btn-sm' onclick='deleteDataCustomer("+ resJson[dataJson].id_supllier +")'><i class='fa fa-trash'></i></button>"+
                                "</div></td>"+
                            "</tr>";
        }
        
        document.getElementById("datatest").innerHTML = dataCustomer;
    }
    }
    xmlHttp.open("GET",url,true);
    xmlHttp.send();
}

function kirimdDataSupplier()
{
    let namaSupplier = document.getElementById("nama_supplier").value;
    let email = document.getElementById("email").value;
    let alamat = document.getElementById("alamat").value;
    let noHp = document.getElementById("no_hp").value;
    let customer = "customer";
    
    let xmlHttp = new XMLHttpRequest();
    let url = "modul/customer/create_process.php";
    let param = "create=" + customer + "&namaCustomer=" + namaSupplier + "&email=" + email + "&alamat=" + alamat + "&noHp=" + noHp ;
    xmlHttp.onreadystatechange = function() 
    {
        if(xmlHttp.readyState == 4)
        {
            let res = xmlHttp.responseText;
            document.getElementById("message").innerHTML = res;
            getDataCustomer();
        }
    }
    xmlHttp.open("POST",url,true);
    xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlHttp.send(param);
}

function updateDataCustomer()
{
    let e_id_customer = document.getElementById("e_id_customer").value;
    let e_nama_customer = document.getElementById("e_nama_customer").value;
    let e_email = document.getElementById("e_email").value;
    let e_alamat = document.getElementById("e_alamat").value;
    let e_no_hp = document.getElementById("e_no_hp").value;
    let customer = "customer";
    let xmlHttp = new XMLHttpRequest();
    let url = "modul/customer/update_process.php";
    let param = "create=" + customer + "&namaCustomer=" + e_nama_customer + "&email=" + e_email + "&alamat=" + e_alamat + "&noHp=" + e_no_hp + "&id=" + e_id_customer ;

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

function deleteDataCustomer(id)
{
    let xmlHttp = new XMLHttpRequest();
    let customer = "customer";
    let url = "modul/customer/delete_process.php";
    let param = "delete=" + customer + "&id=" + id;

    xmlHttp.onreadystatechange = function()
    {
    let res = xmlHttp.responseText;
    document.getElementById("message-delete").innerHTML = "<div class='alert alert-warning alert-dismissible'>"+
        "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"+
        "<span >"+ res +"</span>"+
    "</div>";
    getDataCustomer(); 
    }

    xmlHttp.open("POST",url, true);
    xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlHttp.send(param);
}

btnKirim.addEventListener('click', kirimdDataCustomer);
btnUpdate.addEventListener('click', updateDataCustomer);
btnRefresh.addEventListener('click', getDataCustomer);
