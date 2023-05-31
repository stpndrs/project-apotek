<html>
<head>
    <title>Central</title>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
    <style>
        body {
            margin: 0;
        }

        .content {
            
            margin-left: 250px;
            padding: 20px;
            color: #000;
            background-color: #393535;
            min-height: 100vh;
        }

        .sidenav {
            background-color: #111;
            width: 250px;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            overflow-x: hidden;
            padding-top: 20px;
        }

        .sidenav a {
            padding: 8px 8px 8px 16px;
            text-decoration: none;
            font-size: 18px;
            color: #fff;
            display: block;
        }

        .sidenav a:hover {
            background-color: #ddd;
            color: #000;
        }

        .jenis-container {
            margin-bottom: 20px;
        }

        .jenis-container h2 {
            color: #fff;
            font-size: 18px;
            margin-bottom: 10px;
        }

        #combo-kategori {
            width: 200px;
            border-radius: 10px;
            padding: 5px;
        }

        #daftar-obat {
            background-color: #f5f5f5;
            padding: 10px;
            border-radius: 5px;
            margin-left: 0;
            margin-right: 0;
            overflow-x: auto;
        }

        #daftar-obat table {

            border-collapse: collapse;
            width: 100%;
        }

        #daftar-obat th,
        #daftar-obat td {
            padding: 8px;
            text-align: left;
            width: auto;
            
        }

        #daftar-obat th {
            background-color: #333;
            color: #fff;
        }

        #daftar-obat tr:nth-child(even) {
            background-color: #d3d3d3;
        }

        #daftar-obat tr:hover {
            background-color: #ccc;
        }

        table {
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
    </style>

    <div class="sidenav">
        <a href="index.php">Home</a>
        <a href="transaksi.php">Informasi obat</a>
        <a href="insert.php">Transaksi</a>
        <a href="#">Link</a>
    </div>

    <div class="content">
      <div class="jenis-container">
        <h2>Select a Category:</h2>
        <select name="id_jenis" id="combo-kategori">
          <!-- Opsi kategori akan ditambahkan secara dinamis oleh JavaScript -->
        </select>
      </div>

      <div id="daftar-obat">
        <form id="obat-form">
          <div class="obat-input">
            <label for="nama-obat-input">Nama Obat:</label>
            <select id="nama-obat-input" name="nama_obat"></select>
          </div>
          <div class="obat-input">
            <label for="jumlah-obat-input">Jumlah Obat:</label>
            <input type="number" id="jumlah-obat-input" name="jumlah_obat" value="1" min="1">
          </div>
          <div class="obat-input">
            <button type="button" id="tambah-button">Tambah</button>
            <button type="button" id="kurangi-button">Kurangi</button>
          </div>
        </form>

        <table id="tabel-obat" width=""></table>
      </div>

      <div id="keranjang">
        <h2>Keranjang Belanja</h2>
        <table id="tabel-keranjang" width=""></table>
        <div id="total-container">
          <span>Total:</span>
          <span id="total">0</span>
        </div>
      </div>

      <script>
        const daftarObat = [];

        function tambahObat(event) {
          event.preventDefault();

          const namaObatInput = document.getElementById('nama-obat-input').value;
          const jumlahObatInput = document.getElementById('jumlah-obat-input').value;
          const jumlahObat = parseInt(jumlahObatInput, 10);

          if (namaObatInput.trim() === '' || isNaN(jumlahObat) || jumlahObat <= 0) {
            alert('Mohon isi informasi obat dengan benar.');
            return;
          }

          const obat = {
            nama: namaObatInput,
            jumlah: jumlahObat
          };

          daftarObat.push(obat);
          tampilkanObat();
          tampilkanKeranjang();
        }

        function kurangiObat(event) {
          event.preventDefault();

          const index = parseInt(prompt('Masukkan indeks obat yang ingin dikurangi:'), 10);
          if (!isNaN(index) && index >= 0 && index < daftarObat.length) {
            daftarObat.splice(index, 1);
            tampilkanObat();
            tampilkanKeranjang();
          } else {
            alert('Indeks obat tidak valid.');
          }
        }

        function tampilkanObat() {
          const tabelObat = document.getElementById('tabel-obat');
          tabelObat.innerHTML = '';

          if (daftarObat.length > 0) {
            const headerRow = tabelObat.insertRow();
            const keys = Object.keys(daftarObat[0]);

            keys.forEach(key => {
              const headerCell = document.createElement('th');
              headerCell.textContent = key.charAt(0).toUpperCase() + key.slice(1);
              headerRow.appendChild(headerCell);
            });

            daftarObat.forEach((obat, index) => {
              const row = tabelObat.insertRow();
              keys.forEach(key => {
                const cell = row.insertCell();
                cell.textContent = obat[key];
              });
              const cell = row.insertCell();
              const deleteButton = document.createElement('button');
              deleteButton.textContent = 'Hapus';
              deleteButton.addEventListener('click', () => {
                daftarObat.splice(index, 1);
                tampilkanObat();
                tampilkanKeranjang();
              });
              cell.appendChild(deleteButton);
            });
          } else {
            const row = tabelObat.insertRow();
            const cell = row.insertCell();
            cell.textContent = 'Keranjang kosong.';
          }
        }

        function tampilkanKeranjang() {
          const tabelKeranjang = document.getElementById('tabel-keranjang');
          const totalElement = document.getElementById('total');
          tabelKeranjang.innerHTML = '';
          totalElement.textContent = '0';

          if (daftarObat.length > 0) {
            const headerRow = tabelKeranjang.insertRow();
            const keys = Object.keys(daftarObat[0]);

            keys.forEach(key => {
              const headerCell = document.createElement('th');
              headerCell.textContent = key.charAt(0).toUpperCase() + key.slice(1);
              headerRow.appendChild(headerCell);
            });
            const subtotalHeaderCell = document.createElement('th');
            subtotalHeaderCell.textContent = 'Subtotal';
            headerRow.appendChild(subtotalHeaderCell);

            let total = 0;

            daftarObat.forEach(obat => {
              const row = tabelKeranjang.insertRow();
              keys.forEach(key => {
                const cell = row.insertCell();
                cell.textContent = obat[key];
              });

              const subtotal = obat.jumlah * 100; // Ganti 100 dengan harga obat yang sesuai
              const subtotalCell = row.insertCell();
              subtotalCell.textContent = subtotal;
              total += subtotal;
            });

            totalElement.textContent = total;
          } else {
            const row = tabelKeranjang.insertRow();
            const cell = row.insertCell();
            cell.textContent = 'Keranjang kosong.';
          }
        }

        const tambahButton = document.getElementById('tambah-button');
        tambahButton.addEventListener('click', tambahObat);

        const kurangiButton = document.getElementById('kurangi-button');
        kurangiButton.addEventListener('click', kurangiObat);
      </script>
    </div>
</body>
</html>
