function loadOrderan() {
    if (localStorage.list_data && localStorage.id_data) {
        list_data = JSON.parse(localStorage.getItem('list_data'));
        var data_app = "";
        if (list_data.length > 0) {
            data_app = '<table id="myTable">';
            data_app += '<thead>' +
                '<th onclick="sortHead(0)" style="width:">ID<i class="fa fa-fw fa-sort"></i></th>' +
                '<th onclick="sortHead(1)" style="width:">Nama<i class="fa fa-fw fa-sort"></i></th>' +
                '<th onclick="sortHead(2)" style="width:">NIM<i class="fa fa-fw fa-sort"></i></th>' +
                '<th onclick="sortHead(3)" style="width:">Prodi<i class="fa fa-fw fa-sort"></i></th>' +
                '<th colspan="3" style="width:">Aksi</th>' +
                '</thead> <tbody>';
 
            for (i in list_data) {
                data_app += '<tr>';
                data_app +=
                    '<td>' + list_data[i].id_data + ' </td>' +
                    '<td>' + list_data[i].nama + ' </td>' +
                    '<td>' + list_data[i].NIM + ' </td>' +
                    '<td>' + list_data[i].prodi + ' </td>' +
                    '<td><a class="w3-tombol w3-btn w3-small w3-red w3-border w3-round-xlarge" href="javascript:void(0)" onclick="hapusData(\'' + list_data[i].id_data + '\')">Hapus</a></td>' +
                    '<td><a class="w3-tombol w3-btn w3-small w3-blue w3-border w3-round-xlarge" href="javascript:void(0)" onclick="lihatData(\'' + list_data[i].id_data + '\')">Lihat</a></td>' +
                    '<td><a class="w3-tombol w3-btn w3-small w3-green w3-border w3-round-xlarge" href="javascript:void(0)" onclick="editData(\'' + list_data[i].id_data + '\')">Edit</a></td>';
                data_app += '</tr>';
            }
 
            data_app += '</tbody></table>';
 
        }
        else {
            data_app = "Belum ada data mahasiswa";
        }
 
 
        $('#daftar-mhs').html(data_app);
        $('#daftar-mhs').hide();
        $('#daftar-mhs').fadeIn(100);
    }
}
 
function editData(id) {
 
    if (localStorage.list_data && localStorage.id_data) {
        list_data = JSON.parse(localStorage.getItem('list_data'));
        idx_data = 0;
        for (i in list_data) {
            if (list_data[i].id_data == id) {
                $("#eid_data").val(list_data[i].id_data);
                $("#enama").val(list_data[i].nama);
                $("#eNIM").val(list_data[i].NIM);
                $("#eprodi").val(list_data[i].prodi);
                list_data.splice(idx_data, 1);
            }
            idx_data++;
        }
        gantiMenu('edit-data');
 
    }
 
}
 
function lihatData(id) {
    if (localStorage.list_data && localStorage.id_data) {
        list_data = JSON.parse(localStorage.getItem('list_data'));
        idx_data = 0;
        for (i in list_data) {
            if (list_data[i].id_data == id) {
                $("#lid_data").val(list_data[i].id_data);
                $("#lnama").val(list_data[i].nama);
                $("#lNIM").val(list_data[i].NIM);
                $("#lprodi").val(list_data[i].prodi);
                list_data.splice(idx_data, 1);
            }
            idx_data++;
        }
        gantiMenu('lihat-data');
 
    }
}
 
 
function simpanData() {
 
    nama = $('#nama').val();
    NIM = $('#NIM').val();
    tanggal = $('#prodi').val();
 
    if (localStorage.list_data && localStorage.id_data) {
        list_data = JSON.parse(localStorage.getItem('list_data'));
        id_data = parseInt(localStorage.getItem('id_data'));
    }
    else {
        list_data = [];
        id_data = 0;
    }
 
    id_data++;
    list_data.push({ 'id_data': id_data, 'nama': nama, 'NIM': NIM, 'prodi': prodi });
    localStorage.setItem('list_data', JSON.stringify(list_data));
    localStorage.setItem('id_data', id_data);
    document.getElementById('form-data').reset();
    gantiMenu('daftar-mhs');
 
    return false;
}
 
function simpanEditData() {
 
    id_data = $('#eid_data').val();
    nama = $('#enama').val();
    tanggal = $('#eprodi').val();
 
    list_data.push({ 'id_data': id_data, 'nama': nama, 'NIM': NIM, 'prodi': prodi });
    localStorage.setItem('list_data', JSON.stringify(list_data));
    document.getElementById('eform-data').reset();
    gantiMenu('daftar-mhs');
 
    return false;
}
 
function hapusData(id) {
 
    if (localStorage.list_data && localStorage.id_data) {
        list_data = JSON.parse(localStorage.getItem('list_data'));
 
        idx_data = 0;
        for (i in list_data) {
            if (list_data[i].id_data == id) {
                list_data.splice(idx_data, 1);
            }
            idx_data++;
        }
 
        localStorage.setItem('list_data', JSON.stringify(list_data));
        loadOrderan();
    }
}
 
 
function gantiMenu(menu) {
    if (menu == "daftar-mhs") {
        loadOrderan();
        $('#tambah-mhs').hide();
        $('#daftar-mhs').fadeIn();
        $('#edit-data').hide();
        $('#lihat-data').hide();
    }
    else if (menu == "tambah-mhs") {
        $('#tambah-mhs').fadeIn();
        $('#daftar-mhs').hide();
        $('#edit-data').hide();
        $('#lihat-data').hide();
    } else if (menu == "edit-data") {
        $('#edit-data').fadeIn();
        $('#tambah-mhs').hide();
        $('#daftar-mhs').hide();
        $('#lihat-data').hide();
    } else if (menu == "lihat-data") {
        $('#lihat-data').fadeIn();
        $('#edit-data').hide();
        $('#tambah-mhs').hide();
        $('#daftar-mhs').hide();
    }
}