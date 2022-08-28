<?= $this->extend('dashboard/layouts/template') ?>

<?= $this->section('content') ?>

                    <div class="col-md-6 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title"><?= $title ?> | <?= $content['email'] ?></h4>
                                <form method="POST" action="<?= base_url('dashboard/user/unverified/proced') ?>">
                                    <input value="<?= $content['id'] ?>" name="id" hidden>
                                    <input value="<?= $content['id_token'] ?>" name="id_token" hidden>
                                    <div class="form-group">
                                        <label>Verifikasi</label>
                                        <select name="is_verified" class="js-example-basic-single w-100">
                                            <?php if ($content['is_verified'] === 'pending'): ?>
                                                <option value="<?= $content['is_verified'] ?>" selected>Pending</option>
                                            <?php elseif ($content['is_verified'] === 'yes'): ?>
                                                <option value="<?= $content['is_verified'] ?>" selected>Verified</option>
                                            <?php elseif ($content['is_verified'] === 'no'): ?>
                                                <option value="<?= $content['is_verified'] ?>" selected>Rejected</option>
                                            <?php endif ?>
                                            <option value="yes">Verified</option>
                                            <option value="no">Reject</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select name="role" class="js-example-basic-single w-100">
                                            <?php if ($content['role'] === 'unset'): ?>
                                                <option value="<?= $content['role'] ?>" selected>Unset</option>
                                            <?php elseif ($content['role'] === 'tutor'): ?>
                                                <option value="<?= $content['role'] ?>" selected>Tutor</option>
                                            <?php elseif ($content['role'] === 'siswa'): ?>
                                                <option value="<?= $content['role'] ?>" selected>Siswa</option>
                                            <?php endif ?>
                                            <option value="tutor">Tutor</option>
                                            <option value="siswa">Siswa</option>
                                        </select>
                                    </div>
                                    <input class="btn btn-primary" type="submit" value="Submit">
                                </form>
							</div>
						</div>
					</div>

<?= $this->endSection() ?>