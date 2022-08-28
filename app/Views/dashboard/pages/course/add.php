<?= $this->extend('dashboard/layouts/template') ?>

<?= $this->section('content') ?>

                    <div class="col-lg-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title"><?= $title ?></h4>
								<form class="cmxform" method="POST" action="<?= base_url('dashboard/master/mapel/add/proced') ?>">
									<fieldset>
                                        <div class="form-group">
											<label for="name">Mata Pelajaran</label>
											<input name="name" id="defaultconfig" class="form-control" maxlength="100" placeholder="This textarea has a limit of 100 chars.">
										</div>
										<input class="btn btn-primary" type="submit" value="Submit">
									</fieldset>
								</form>
							</div>
						</div>
					</div>

<?= $this->endSection() ?>