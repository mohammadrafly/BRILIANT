<?= $this->extend('dashboard/layouts/template') ?>

<?= $this->section('content') ?>

        <div class="profile-page tx-13">
          <div class="row">
            <div class="col-12 grid-margin">
					<div class="row profile-body">
						<!-- left wrapper start -->
						<div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
							<div class="card rounded">
								<div class="card-body">
									<div class="d-flex align-items-center justify-content-between mb-2">
										<h6 class="card-title mb-0">Detail Examps</h6>
									</div>
                                    <div class="mt-3">
										<label class="tx-11 font-weight-bold mb-0 text-uppercase">Mata Pelajaran:</label>
										<p class="text-muted"><?= $content[0]->name ?></p>
									</div>
									<div class="mt-3">
										<label class="tx-11 font-weight-bold mb-0 text-uppercase">Mulai:</label>
										<p class="text-muted"><?= $content[0]->start_time ?></p>
									</div>
									<div class="mt-3">
										<label class="tx-11 font-weight-bold mb-0 text-uppercase">Berakhir:</label>
										<p class="text-muted"><?= $content[0]->end_time ?></p>
									</div>
									<div class="mt-3">
										<label class="tx-11 font-weight-bold mb-0 text-uppercase">Token:</label>
										<p class="text-muted"><?= $content[0]->kode ?></p>
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
											<h4 class="card-title"></h4>
											<form class="cmxform" method="POST" action="<?= base_url('dashboard/tutor/examp/on-progres/'.$content[0]->id_course.'/'.$content[0]->id_mapel) ?>">
												<fieldset>
													<div class="form-group">
														<label for="kode">Token</label>
														<input id="kode" class="form-control" name="kode" type="text">
													</div>
													<input class="btn btn-primary" type="submit" value="Submit">
												</fieldset>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- right wrapper end -->
					</div>
        </div>

<?= $this->endSection() ?>