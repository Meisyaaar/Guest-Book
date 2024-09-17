import '../../public/assets/static/js/initTheme'
import '../../public/assets/static/js/components/dark'
import '../../public/assets/js/app'


// document.getElementById('filterPTK').addEventListener('change', function() {
//     let ptk = this.value;
//     fetchFilteredData(ptk);
// });

// function fetchFilteredData(ptk) {
//     console.log(`Fetching data for PTK: ${ptk}`);

//     const url = `{{ route('filter.pegawai') }}?ptk=${encodeURIComponent(ptk)}`;

//     fetch(url)
//         .then(response => response.json())
//         .then(data => {
//             console.log('Data received:', data);
//             updateTable(data);
//         })
//         .catch(error => console.error('Error fetching data:', error));
// }



document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('filterPtk').addEventListener('change', filterTableByPtk);
});

function filterTableByPtk() {
    var filter, table, tr, td, i, txtValue;
    filter = document.getElementById("filterPtk").value.toUpperCase();
    table = document.getElementById("pegawaiTable");
    tr = table.getElementsByTagName("tr");

    for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[4]; // Kolom PTK ada di posisi ke-4 (index 4)
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1 || filter === "") {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}



document.getElementById('searchInput').addEventListener('input', function() {
    var input, filter, table, tr, td, i, j, txtValue;
    input = document.getElementById('searchInput');
    filter = input.value.toLowerCase();
    table = document.getElementById('pegawaiTable');
    tr = table.getElementsByTagName('tr');

    for (i = 1; i < tr.length; i++) {
        tr[i].style.display = 'none';
        td = tr[i].getElementsByTagName('td');
        for (j = 0; j < td.length; j++) {
            if (td[j]) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toLowerCase().includes(filter)) {
                    tr[i].style.display = '';
                    break;
                }
            }
        }
    }

});

function showUpdateForm(NIP, name, email, No_telp, PTK) {
    document.getElementById('NIPtoUpdate').value = NIP;
    document.getElementById('newNIP').value = NIP;
    document.getElementById('newName').value = name;
    document.getElementById('newEmail').value = email;
    document.getElementById('newNo_telp').value = No_telp; // Perbaiki variabel
    document.getElementById('newPTK').value = PTK;

    document.getElementById('updateForm').style.display = 'block';

    // Menyembunyikan form tambah pegawai
    var formTambah = document.getElementById('tambahPegawai');
    if (formTambah) {
        formTambah.style.display = 'none';
    }
}

// Fungsi untuk menutup form update
function closeUpdateForm() {
    document.getElementById('updateForm').style.display = 'none';
    var formTambah = document.getElementById('tambahPegawai');
    if (formTambah) {
        formTambah.style.display = 'block';
    }
}

function closeTambahForm() {
    var formTambah = document.getElementById('tambahPegawai');
    if (formTambah) {
        formTambah.style.display = 'none';
    }
}

// Fungsi untuk menampilkan form tambah pegawai dan menyembunyikan form update pegawai
function showTambahForm() {
    document.getElementById('tambahPegawai').style.display = 'block';

    // Menyembunyikan form update pegawai
    var formUpdate = document.getElementById('updateForm');
    if (formUpdate) {
        formUpdate.style.display = 'none';
    }
}
