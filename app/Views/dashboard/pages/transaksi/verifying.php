<?= $this->extend('dashboard/layouts/template') ?>

<?= $this->section('content') ?>

                    <div class="col-md-6 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title"><?= $title ?> | <?= $content['token_transaksi'] ?></h4>
                                <form method="POST" action="<?= base_url('dashboard/transaksi/verifying/proced') ?>">
                                    <input value="<?= $content['id_token_tutor'] ?>" name="token_tutor" hidden>
                                    <input value="<?= $content['id_token_siswa'] ?>" name="token_siswa" hidden>
                                    <input value="<?= $content['id'] ?>" name="id" hidden>
                                    <div class="form-group">
                                        <label>Status Verifikasi</label>
                                        <select name="status" class="js-example-basic-single w-100">
                                            <?php if ($content['status'] === 'pending'): ?>
                                                <option value="<?= $content['status'] ?>" selected>Pending</option>
                                            <?php elseif ($content['status'] === 'verified'): ?>
                                                <option value="<?= $content['status'] ?>" selected>Verified</option>
                                            <?php elseif ($content['status'] === 'unverified'): ?>
                                                <option value="<?= $content['status'] ?>" selected>Unverified</option>
                                            <?php elseif ($content['status'] === 'blocked'): ?>
                                                <option value="<?= $content['status'] ?>" selected>Blocked</option>
                                            <?php endif ?>
                                            <option value="pending">Pending</option>
                                            <option value="verified">Verified</option>
                                            <option value="unverified">Unverified</option>
                                            <option value="blocked">Blocked</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Status Aktif</label>
                                        <select name="is_active" class="js-example-basic-single w-100">
                                            <?php if ($content['is_active'] === 'active'): ?>
                                                <option value="<?= $content['is_active'] ?>" selected>Active</option>
                                            <?php elseif ($content['is_active'] === 'inactive'): ?>
                                                <option value="<?= $content['is_active'] ?>" selected>Inactive</option>
                                            <?php endif ?>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                    <input class="btn btn-primary" type="submit" value="Submit">
                                </form>
							</div>
						</div>
					</div>

<?= $this->endSection() ?>