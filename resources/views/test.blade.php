<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>TEST</title>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin-bottom: 20px;
        }

        table td,
        table th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        table th {
            background-color: teal;
            color: white;
            height: 2rem;
        }

        table tr:nth-child(even) td {
            background-color: #f2f2f2;
        }

        table tr:hover td {
            background-color: #ddd;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
            margin-bottom: 20px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 34px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 50%;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        table {
            /* properti CSS lainnya */
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
        }

        table.show {
            opacity: 1;
            visibility: visible;
        }

        button {
            /* properti CSS lainnya */
            transition: transform 0.3s ease-in-out;
        }

        button.active {
            transform: rotate(180deg);
        }
    </style>
</head>

<body>
    <div id="combinedValues"></div>
    <button id="switch">Switch</button>

    <table id="table-role-base" class="show">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Representasi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>001</td>
                <td>Produk A</td>
                <td>10%</td>
            </tr>

            <!-- data lainnya -->
        </tbody>
    </table>
    <div id="no-data">
        <p>Tidak ada data yang tersedia.</p>
    </div>
    <button onclick="addRow()">Tambah Baris</button>
    <button id="delete-btn">Hapus Data Terakhir</button>


    <script>
        // Tampilkan atau Sembunyikan
        const switchButton = document.getElementById("switch");
        const table = document.getElementById("table-role-base");

        const noData = document.getElementById('no-data');

        // No Data
        function toggleNoData() {
            if (table.rows.length <= 1) {
                noData.style.display = 'block';
            } else {
                noData.style.display = 'none';
            }
        }

        toggleNoData(); // panggil fungsi untuk menampilkan elemen no-data saat pertama kali memuat halaman


        switchButton.addEventListener("click", function() {
            table.classList.toggle("show");
            switchButton.classList.toggle("active");
        });

        // Hilangkan table

        table.addEventListener('transitionend', function() {
            if (!table.classList.contains('show')) {
                table.style.display = 'none';
            }
        });

        // tampilkan tabel
        switchButton.addEventListener('click', () => {
            if (table.style.display === 'none') {
                table.style.display = 'table';
                setTimeout(() => {
                    table.style.opacity = 1;
                }, 100);
            } else {
                table.style.opacity = 0;
                setTimeout(() => {
                    table.style.display = 'none';
                }, 500);
            }
        });

        function updateCombinedValues() {
            // Menampilkan gabungan representasi

            // Mendapatkan semua sel pada kolom Representasi
            const cells = table.querySelectorAll('td:nth-child(4)');

            // Membuat array untuk menyimpan nilai setiap sel
            let values = [];

            // Looping untuk mendapatkan nilai setiap sel
            cells.forEach(cell => {
                values.push(cell.innerText);
            });

            // Menggabungkan nilai sel menjadi satu string
            const combinedValues = values.join(', ');

            // Mendapatkan elemen div baru
            const combinedValuesDiv = document.getElementById('combinedValues');

            // Menampilkan nilai gabungan pada elemen div baru
            combinedValuesDiv.innerText = combinedValues;
        }

        updateCombinedValues();

        // Tambah
        function addRow() {
            var table = document.getElementById("table-role-base");
            var row = table.insertRow(-1);
            var no = table.rows.length - 1;
            var kode = "Kode " + no;
            var nama = "Nama " + no;
            var representasi = "Representasi " + no;
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            cell1.innerHTML = no;
            cell2.innerHTML = kode;
            cell3.innerHTML = nama;
            cell4.innerHTML = representasi;

            updateCombinedValues();
            toggleNoData(); // panggil fungsi untuk menampilkan atau menyembunyikan elemen no-data
        }

        // Hapus
        const deleteBtn = document.getElementById("delete-btn");
        deleteBtn.addEventListener("click", function() {
            const rows = table.getElementsByTagName("tr");
            if (rows.length > 1) {
                rows[rows.length - 1].remove();
            }
            updateCombinedValues();
            toggleNoData(); // panggil fungsi untuk menampilkan atau menyembunyikan elemen no-data
        });
    </script>


</body>

</html>
