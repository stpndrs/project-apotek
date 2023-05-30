<?php
session_start();
$current_page = basename($_SERVER['PHP_SELF']);
?>

<div id="sidebar">
    <div id="sidebar-content">
        <div id="sidebar-logo">
            <h1>Appotek</h1>
        </div>
        <br>
        <div id="sidebar-nav">
            <a href="dashboard.php">
                <div id="sidebar-dashboard" class="sidebar-item <?php if ($current_page == 'dashboard.php') echo ' active'; ?>">Dashboard</div>
            </a>
            <a href="obat.php">
                <div id="sidebar-obat" class="sidebar-item <?php if ($current_page == 'obat.php') echo ' active'; ?>">Obat</div>
            </a>
            <a href="jenis.php">
                <div id="sidebar-obat" class="sidebar-item <?php if ($current_page == 'jenis.php') echo ' active'; ?>">Jenis</div>
            </a>
            <a href="kategori.php">
                <div id="sidebar-obat" class="sidebar-item <?php if ($current_page == 'kategori.php') echo ' active'; ?>">Kategori</div>
            </a>
            <a href="rak.php">
                <div id="sidebar-obat" class="sidebar-item <?php if ($current_page == 'rak.php') echo ' active'; ?>">Rak</div>
            </a>

            <!-- <a href="laporan.php">
                <div id="sidebar-laporan" class="sidebar-item <?php if ($current_page == 'laporan.php') echo ' active'; ?>">Laporan</div>
            </a> -->
            <!-- <a href="laporan-stok.php">
                <div id="sidebar-laporan-stok" class="sidebar-item <?php if ($current_page == 'laporan-stok.php') echo ' active'; ?>">Laporan stok</div>
            </a> -->
            <a href="user.php">
                <div id="sidebar-petugas" class="sidebar-item <?php if ($current_page == 'user.php') echo ' active'; ?>">Tambah User</div>
            </a>
            <a href="karyawan.php">
                <div id="sidebar-karyawan" class="sidebar-item <?php if ($current_page == 'karyawan.php') echo ' active'; ?>">Karyawan</div>
            </a>
        </div>
    </div>
</div>

<style>
    .dropdown-content {
        display: block;
        background-color: #555;
        min-width: 0px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        transition: all 0.3s;
        height: 0px;
        overflow: hidden;
    }

    #sidebar-master-data a {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        padding: 10px 40px;
        width: 100%;
        height: 60px;
        font: 16px Arial, sans-serif;
    }

    .sidebar-master-item a:hover {
        cursor: pointer;
        background-color: #292929;
    }

    .dropdown-content a {
        color: black;
        padding: 16px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        color: white;
    }

    .sidebar-master-item .arrow {
        transition: transform 0.3s;
    }

    .sidebar-master-item.open .arrow {
        transform: rotate(180deg);
    }
</style>