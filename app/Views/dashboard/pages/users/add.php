<?= $this->extend('dashboard/layouts/template') ?>

<?= $this->section('content') ?>

					<div class="col-lg-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title"><?= $title ?></h4>
								<form class="cmxform" method="POST" action="<?= base_url('dashboard/user/save') ?>">
									<fieldset>
										<div class="form-group">
											<label for="email">Email</label>
											<input name="email" type="email" class="form-control">
										</div>
										<div class="form-group">
											<label for="password">Password</label>
											<input name="password" type="password" class="form-control">
										</div>
                                        <div class="form-group">
											<label for="password">Konfirmasi Password</label>
											<input name="password_conf" type="password" class="form-control">
										</div>
                                        <div class="form-group">
											<label>Pilih Role</label>
											<select name="role" class="js-example-basic-single w-100">
                                                <option value="unset">UNSET</option>
                                                <option value="siswa">SISWA</option>
                                                <option value="tutor">TUTOR</option>
                                                <option value="admin">ADMIN</option>
											</select>
										</div>
                                        <div class="form-group">
											<label>Verifikasi?</label>
											<select name="is_verified" class="js-example-basic-single w-100">
                                                <option value="yes">YES</option>
                                                <option value="no">NO</option>
                                                <option value="pending">PENDING</option>
											</select>
										</div>
										<input class="btn btn-primary" type="submit" value="Submit">
									</fieldset>
								</form>
							</div>
						</div>
					</div>

<?= $this->endSection() ?>