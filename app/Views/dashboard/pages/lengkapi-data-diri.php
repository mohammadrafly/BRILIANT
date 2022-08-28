<?= $this->extend('dashboard/layouts/template') ?>

<?= $this->section('content') ?>

                    <div class="col-lg-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Lengkapi Data Diri</h4>
								<form class="cmxform" method="POST" action="<?= base_url('dashboard/lengkapi-data-diri/proced') ?>">
									<fieldset>
										<input value="<?= $content['id'] ?>" name="id" hidden>
										<div class="form-group">
											<label for="name">Nama Lengkap</label>
											<?php if ($content === null): ?>
											<input name="name" id="defaultconfig" maxlength="100" class="form-control" type="text">
											<?php else: ?>
											<input value="<?= $content['name'] ?>" name="name" id="defaultconfig" maxlength="100" class="form-control" type="text">
											<?php endif ?>
										</div>
										<div class="form-group">
											<label for="address">Alamat</label>
											<?php if ($content === null): ?>
											<textarea name="address" id="maxlength-textarea" class="form-control" maxlength="100" rows="8" placeholder="This textarea has a limit of 100 chars."></textarea>
											<?php else: ?>
											<textarea name="address" id="maxlength-textarea" class="form-control" maxlength="100" rows="8" placeholder="This textarea has a limit of 100 chars."><?= $content['address'] ?></textarea>
											<?php endif ?>
										</div>
										<div class="form-group">
											<label>Jenis Kelamin</label>
											<select name="sex" class="js-example-basic-single w-100">
											<?php if ($content === null): ?>
												<option value="laki-laki">Laki-laki</option>
												<option value="perempuan">Perempuan</option>
											<?php else: ?>
												<?php if ($content['sex'] === NULL): ?>
												<option value="laki-laki">Laki-laki</option>
												<option value="perempuan">Perempuan</option>
												<?php else: ?>
												<option selected value="<?= $content['sex'] ?>"><?= $content['sex'] ?></option>
												<option value="laki-laki">Laki-laki</option>
												<option value="perempuan">Perempuan</option>
												<?php endif ?>
											<?php endif ?>
											</select>
										</div>
										<div class="form-group">
											<label for="phone_number">Nomor HP</label>
											<?php if ($content === null): ?>
											<input name="phone_number" id="defaultconfig-2" maxlength="13" class="form-control" type="number">
											<?php else: ?>
											<input value="<?= $content['phone_number'] ?>" name="phone_number" id="defaultconfig-2" maxlength="13" class="form-control" type="number">
											<?php endif ?>
										</div>
										<div class="form-group">
											<label for="bio">Bio</label>
											<?php if ($content === null): ?>
											<textarea name="bio" id="maxlength-textarea" class="form-control" maxlength="100" rows="8" placeholder="This textarea has a limit of 100 chars."></textarea>
											<?php else: ?>
											<textarea name="bio" id="maxlength-textarea" class="form-control" maxlength="100" rows="8" placeholder="This textarea has a limit of 100 chars."><?= $content['bio'] ?></textarea>
											<?php endif ?>
										</div>
										<div class="form-group">
											<label for="dob">Tanggal Lahir</label>
											<div class="input-group date datepicker" id="datePickerExample">
											<?php if ($content === null): ?>
												<input type="text" name="dob" class="form-control"><span class="input-group-addon"><i data-feather="calendar"></i></span>
											<?php else: ?>
												<input value="<?php echo $content['dob'] ?>" type="text" name="dob" class="form-control"><span class="input-group-addon"><i data-feather="calendar"></i></span>
											<?php endif ?>
											</div>
										</div>
										<div class="form-group">
											<label>Daftar Sebagai:</label>
											<select name="wannabe" class="js-example-basic-single w-100">
											<?php if ($content === null): ?>
												<option value="tutor">Tutor</option>
												<option value="siswa">Siswa</option>
											<?php else: ?>
												<?php if ($content['wannabe'] === NULL): ?>
												<option value="tutor">Tutor</option>
												<option value="siswa">Siswa</option>
												<?php else: ?>
												<option selected value="<?= $content['wannabe'] ?>"><?= $content['wannabe'] ?></option>
												<option value="tutor">Tutor</option>
												<option value="siswa">Siswa</option>
												<?php endif ?>
											<?php endif ?>
											</select>
										</div>
										<input class="btn btn-primary" type="submit" value="Submit">
									</fieldset>
								</form>
							</div>
						</div>
					</div>

<?= $this->endSection() ?>