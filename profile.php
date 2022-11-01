<?php
//membuat object dari class pegawai
$id = $_SESSION['MEMBER']['id'];
$model = new Member();
//memanggil fungsi untuk menampilkan data pegawai
$member = $model->getMember($id);
/*
foreach ($data_pegawai as $row) {
    print $row['nip'] . "\t";
    print $row['nama'] . "\t";
    print $row['alamat'] . "\n";
}
*/
?>

<section class="vh-100" style="background-color: #E6E6FA;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row">
            <div class="col-md-4 gradient-custom text-center text-white">
              <br />
              <img src="images/member/<?= $member['foto'] ?>"
                alt="Avatar" class="img-fluid mt-4 mb-1 ml-4"
                style="width: 250px;">
              <h5><?= $member['nama'] ?></h5>
              <i class="far fa-edit mb-5"></i>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h6>Profile Member</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Fullname</h6>
                    <p class="text-muted"><?= $member['fullname'] ?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Email</h6>
                    <p class="text-muted"><?= $member['email'] ?></p>
                  </div>
                </div>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Username</h6>
                    <p class="text-muted"><?= $member['username'] ?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Role</h6>
                    <p class="text-muted"><?= $member['role'] ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>