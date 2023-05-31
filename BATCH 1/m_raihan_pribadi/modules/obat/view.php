<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Data Obat

    <a class="btn btn-primary btn-social pull-right" href="?module=form_obat&form=add" title="Tambah Data" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Tambah
    </a>
  </h1>

</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">

    <?php  
    if (empty($_GET['alert'])) {
      echo "";
    } 
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data obat baru berhasil disimpan.
            </div>";
    }
    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data obat berhasil diubah.
            </div>";
    }
    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data obat berhasil dihapus.
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Kode Obat</th>
                <th class="center">Nama Obat</th>
                <th class="center">Harga Beli</th>
                <th class="center">Harga Jual</th>
                <th class="center">Stok</th>
                <th class="center">Satuan</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $no = 1;
            $query = mysqli_query($mysqli, "SELECT kode_obat,nama_obat,harga_beli,harga_jual,satuan,stok FROM is_obat ORDER BY kode_obat DESC")
                                            or die('Ada kesalahan pada query tampil Data Obat: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) { 
              $harga_beli = format_rupiah($data['harga_beli']);
              $harga_jual = format_rupiah($data['harga_jual']);
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='80' class='center'>$data[kode_obat]</td>
                      <td width='180'>$data[nama_obat]</td>
                      <td width='100' align='right'>Rp. $harga_beli</td>
                      <td width='100' align='right'>Rp. $harga_jual</td>
                      <td width='80' align='right'>$data[stok]</td>
                      <td width='80' class='center'>$data[satuan]</td>
                      <td class='center' width='80'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_obat&form=edit&id=$data[kode_obat]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="modules/obat/proses.php?act=delete&id=<?php echo $data['kode_obat'];?>" onclick="return confirm('Anda yakin ingin menghapus obat <?php echo $data['nama_obat']; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                          </a>
            <?php
              echo "    </div>
                      </td>
                    </tr>";
              $no++;
            }
            ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>