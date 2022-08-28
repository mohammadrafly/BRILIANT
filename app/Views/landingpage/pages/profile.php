<?= $this->extend('landingpage/layouts/template') ?>

<?= $this->section('content') ?>

<?= $this->include('landingpage/partials/breadcrumbs') ?>
	<section class="section">
		<div class="container mt-5">
			<div class="row">
				<div class="col-12 col-sm-10 offset-sm-1 col-md-10 offset-md-2 col-lg-10 offset-lg-2 col-xl-10 offset-xl-2 mx-auto">
					<div class="card card-primary">
						<div class="card-header">
							<h4>Data diri</h4>
						</div>

						<div class="card-body">
							<form method="POST" action="<?= base_url('dashboard/siswa/profile/save') ?>">
                            <?php foreach($content as $row):?>
                                <input value="<?= $row->id_ud ?>" name="id_ud" hidden>
								<div class="form-group">
									<label for="email">Email</label>
									<input id="email" value="<?= $row->email ?>" type="email" class="form-control" name="email" disabled>
									<div class="text-danger"></div>
								</div>

								<div class="form-group">
									<label for="name">Nama Lengkap</label>
									<input id="name" value="<?= $row->name ?>" type="text" class="form-control" name="name" autofocus disabled>
									<div class="text-danger"></div>
								</div>


								<div class="form-group">
									<label for="address">Alamat</label>
									<input id="address" value="<?= $row->address ?>" type="text" class="form-control" name="address" autofocus disabled>
									<div class="text-danger"></div>
								</div>

								<div class="row">

									<div class="form-group col-6">
										<label>Jenis Kelamin</label>
										<select class="form-control selectric" name="sex" id="sex" disabled>
                                            <option value="<?= $row->sex ?>" selected><?= $row->sex ?></option>
											<option value="laki-laki">Laki-Laki</option>
											<option value="perempuan">Perempuan</option>
										</select>
										<div class="text-danger"></div>
									</div>


									<div class="form-group col-6">
										<label for="phone_number">Nomor Telepon</label>
										<input id="phone_number" value="<?= $row->phone_number ?>" type="text" class="form-control" name="phone_number" autofocus disabled>
										<div class="text-danger"></div>
									</div>
								</div>


								<div class="row">
									<div class="form-group col-6">
										<label for="parent">Nama Orangtua</label>
										<input id="parent" value="<?= $row->nama_orangtua ?>" type="text" class="form-control" name="nama_orangtua" autofocus>
										<div class="text-danger"></div>
									</div>

									<div class="form-group col-6">
										<label for="phone_number_parent">Nomor Orangtua</label>
										<input id="phone_number_parent" value="<?= $row->nomor_orangtua ?>" type="text" class="form-control" name="nomor_orangtua" autofocus>
										<div class="text-danger"></div>
									</div>
								</div>



								<div class="form-group">
									<label for="bio">Bio</label>
									<input id="bio" value="<?= $row->bio ?>" type="text" class="form-control" name="bio" autofocus disabled>
									<div class="text-danger"></div>
								</div>


								<div class="form-group">
									<label for="school">Nama Sekolah</label>
									<input id="school" value="<?= $row->nama_sekolah ?>" type="text" class="form-control" name="nama_sekolah" autofocus>
									<div class="text-danger"></div>
								</div>

								<div class="row">
									<div class="form-group col-6">
										<label>Tingkatan</label>
										<select class="form-control selectric" id="level" name="tingkat">
											<option value="SD" selected>SD</option>
										</select>
										<div class="text-danger"></div>
									</div>

									<div class="form-group col-6">
										<label for="class">Kelas</label>
										<input type="number" value="<?= $row->kelas ?>" min="1" max="6" class="form-control" name="kelas" id="class" autofocus>
										<div class="text-danger"></div>
									</div>
								</div>
                                <br>
                            <?php endforeach ?>
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-lg btn-block">
										Simpan
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    
<?= $this->endSection() ?>