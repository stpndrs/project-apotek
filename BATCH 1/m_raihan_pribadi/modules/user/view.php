<section class="content-header">
  <h1>
    <i class="fa fa-user icon-title"></i> Manajemen User

    <a class="btn btn-primary btn-social pull-right" href="?module=form_user&form=add" title="Tambah Data" data-toggle="tooltip">
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
              Data user baru berhasil disimpan.
            </div>";
    }
    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data user berhasil diubah.
            </div>";
    }
    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              User berhasil diaktifkan.
            </div>";
    }
    elseif ($_GET['alert'] == 4) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              User berhasil diblokir.
            </div>";
    }
    elseif ($_GET['alert'] == 5) {
      echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-times-circle'></i> Upload Gagal!</h4>
              Pastikan file yang diupload sudah benar.
            </div>";
    }
    elseif ($_GET['alert'] == 6) {
      echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-times-circle'></i> Upload Gagal!</h4>
              Pastikan ukuran foto tidak lebih dari 1MB.
            </div>";
    }
    elseif ($_GET['alert'] == 7) {
      echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-times-circle'></i> Upload Gagal!</h4>
              Pastikan file yang diupload bertipe *.JPG, *.JPEG, *.PNG.
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Foto</th>
                <th class="center">Username</th>
                <th class="center">Nama User</th>
                <th class="center">Hak Akses</th>
                <th class="center">Status</th>
                <th class="center"></th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $no = 1;
            $query = mysqli_query($mysqli, "SELECT * FROM is_users ORDER BY id_user DESC")
                                            or die('Ada kesalahan pada query tampil data user: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) { 
              echo "<tr>
                      <td width='50' class='center'>$no</td>";

                      if ($data['foto']=="") { ?>
                        <td class='center'><img class='img-user' src='images/user/user-default.png' width='45'></td>
                      <?php
                      } else { ?>
                        <td class='center'><img class='img-user' src='images/user/<?php echo $data['foto']; ?>' width='45'></td>
                      <?php
                      }

              echo "  <td>$data[username]</td>
                      <td>$data[nama_user]</td>
                      <td>$data[hak_akses]</td>
                      <td>$data[status]</td>

                      <td class='center' width='100'>
                          <div>";

                          if ($data['status']=='aktif') { ?>
                            <a data-toggle="tooltip" data-placement="top" title="Blokir" style="margin-right:5px" class="btn btn-warning btn-sm" href="modules/user/proses.php?act=off&id=<?php echo $data['id_user'];?>">
                                <i style="color:#fff" class="glyphicon glyphicon-off"></i>
                            </a>
            <?php
                          } 
                          else { ?>
                            <a data-toggle="tooltip" data-placement="top" title="Aktifkan" style="margin-right:5px" class="btn btn-success btn-sm" href="modules/user/proses.php?act=on&id=<?php echo $data['id_user'];?>">
                                <i style="color:#fff" class="glyphicon glyphicon-ok"></i>
                            </a>
            <?php
                          }

              echo "      <a data-toggle='tooltip' data-placement='top' title='Ubah' class='btn btn-primary btn-sm' href='?module=form_user&form=edit&id=$data[id_user]'>
                                <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                            </a>
                          </div>
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