<?= $this->extend('dashboard/layouts/template') ?>

<?= $this->section('content') ?>

<div class="profile-page tx-13">
          <div class="row">
            <div class="col-12 grid-margin">
							<div class="profile-header">
								<div class="cover">
									<div class="gray-shade"></div>
									<figure>
										<img src="https://via.placeholder.com/1148x272" class="img-fluid" alt="profile cover">
									</figure>
									<div class="cover-body d-flex justify-content-between align-items-center">
										<div>
											<?php if (session()->get('avatar') === null): ?>
											<img class="profile-pic" src="https://via.placeholder.com/100x100" alt="profile">
											<?php else: ?>
											<img class="profile-pic" src="<?= base_url('profile/'.session()->get('avatar'))?>" alt="profile">
											<?php endif ?>
										</div>
									</div>
								</div>
            	</div>
            </div>
					</div>
					<div class="row profile-body">
						<!-- left wrapper start -->
						<div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
							<div class="card rounded">
								<div class="card-body">
									<div class="d-flex align-items-center justify-content-between mb-2">
										<h6 class="card-title mb-0">About</h6>
									</div>
									<p><?= $content['bio'] ?></p>
									<div class="mt-3">
										<label class="tx-11 font-weight-bold mb-0 text-uppercase">Nama:</label>
										<p class="text-muted"><?= $content['name'] ?></p>
									</div>
									
									<div class="mt-3">
										<label class="tx-11 font-weight-bold mb-0 text-uppercase">Joined:</label>
										<p class="text-muted"><?= session()->get('created_at') ?></p>
									</div>
									<div class="mt-3">
										<label class="tx-11 font-weight-bold mb-0 text-uppercase">Lives:</label>
										<p class="text-muted"><?= $content['address'] ?></p>
									</div>
									<div class="mt-3">
										<label class="tx-11 font-weight-bold mb-0 text-uppercase">Email:</label>
										<p class="text-muted"><?= session()->get('email') ?></p>
									</div>
								</div>
							</div>
						</div>
						<!-- left wrapper end -->
						<!-- middle wrapper start -->
						<div class="col-md-8 col-xl-8 middle-wrapper">
							<?= $this->include('dashboard/partials/message') ?>
							<div class="row">
								<div class="col-md-12 grid-margin">
									<div class="card">
										<div class="card-body">
											<h4 class="card-title">Data Diri Pengguna</h4>
											<form class="cmxform" method="POST" action="<?= base_url('dashboard/profile/update') ?>">
												<fieldset>
													<input value="<?= $content['id'] ?>" hidden name="id">
													<div class="form-group">
														<label for="name">Name</label>
														<input id="name" value="<?= $content['name'] ?>" class="form-control" name="name" type="text">
													</div>
													<div class="form-group">
														<label for="address">Alamat</label>
														<input id="address" value="<?= $content['address'] ?>" class="form-control" name="address" type="text">
													</div>
													<div class="form-group">
														<label for="phone_number">Phone Number</label>
														<input id="phone_number" value="<?= $content['phone_number'] ?>" class="form-control" name="phone_number" type="number" id="defaultconfig-2" maxlength="13">
													</div>
													<div class="form-group">
														<label for="bio">Bio</label>
														<textarea name="bio" id="maxlength-textarea" class="form-control" maxlength="100" rows="8" placeholder="This textarea has a limit of 100 chars."><?= $content['bio'] ?></textarea>
													</div>
													<div class="form-group">
														<label for="dob">Tanggal Lahir</label>
														<div class="input-group date datepicker" id="datePickerExample">
														<input value="<?php echo $content['dob'] ?>" type="text" name="dob" class="form-control"><span class="input-group-addon"><i data-feather="calendar"></i></span>
														</div>
													</div>
													<input class="btn btn-primary" type="submit" value="Submit">
												</fieldset>
											</form>
										</div>
									</div>
									<br>
									<?php if (session()->get('role') === 'tutor'):?>
									<div class="card">
										<div class="card-body">
											<h4 class="card-title">Data Diri Tutor</h4>
											<form class="cmxform" method="POST" action="<?= base_url('dashboard/profile/update/tutor') ?>" enctype="multipart/form-data">
												<fieldset>
													<input value="<?= $tutor['id'] ?>" name="id" hidden>
													<div class="form-group">
														<label for="profesi">Profesi</label>
														<input id="profesi" value="<?= $tutor['profession'] ?>" class="form-control" name="profession" type="text" id="defaultconfig-2" maxlength="100">
													</div>
													<div class="form-group">
														<?php if ($tutor['cv'] === null): ?>
														<label for="cv">Ijazah</label>
														<?php else: ?>
														<label for="cv">Ijazah | <a href="<?= base_url('profile/'.$tutor['cv'])?>" download="Ijazah.pdf">Download Ijazah</a></label>
														<embed src="<?= base_url('profile/'.$tutor['cv'])?>" width="800px" height="800px" />
														<?php endif ?>
														<input name="cv" type="file" id="myDropify" class="form-control"/>
													</div>
													<div class="form-group">
														<label for="nik">NIK</label>
														<input id="nik" value="<?= $tutor['nik'] ?>" class="form-control" name="nik" type="number" id="defaultconfig" maxlength="16">
													</div>
													<div class="form-group">
														<label for="mapel">Mata Pelajaran</label>
														<select name="mapel" class="js-example-basic-single w-100">
															<?php foreach($mapel as $row): ?>
															<option value="<?= $row['id'] ?>" selected><?= $row['name'] ?></option>
															<?php endforeach ?>
														</select>
													</div>
													<div class="form-group">
														<label for="harga">Harga</label>
														<input value="<?php echo $tutor['harga'] ?>" type="number" name="harga" class="form-control">
													</div>
													<input class="btn btn-primary" type="submit" value="Submit">
												</fieldset>
											</form>
										</div>
									</div>
									<?php else: ?>
									<?php endif ?>
								</div>
							</div>
						</div>
						<!-- right wrapper end -->
					</div>
        </div>
		<script>
			$('#OpenImgUpload').click(function(){ $('#imgupload').trigger('click'); });
		</script>

<?= $this->endSection() ?>