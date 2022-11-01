<?php
//membuat object dari class pegawai
$id = $_REQUEST['id'];
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

<section class="section about position-relative">
	<div class="container">
		<div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h3>Detail <span class="alternate">Member</span></h3>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 align-self-md-center">
                <div class="image-block">
                    <img src="images/member/<?= $member['foto'] ?>" class="img-fluid" alt="member">
                </div>
            </div>
			<div class="col-lg-7 col-md-6 align-self-center">
				<div class="detail-member">
                    <div class="nama">
                        <h4><?= $member['nama'] ?></h4>
                    </div>
                    <div class="alert alert-secondary" role="alert">
                        <ul class="m-1 p-0">
                            <li>Nama Member : <?= $member['fullname'] ?></li>
                            <li>Email : <?= $member['email'] ?></li>
                            <li>Username : <?= $member['username'] ?></li>
                            <li>Role : <?= $member['role'] ?></li>
                        </ul>
                    </div>
                    <br />
                    <input type="button" value="Go Back" class="btn btn-info btn-sm" onclick="history.back(-1)" />
				</div>
			</div>
		</div>
	</div>
</section>
