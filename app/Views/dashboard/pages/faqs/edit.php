<?= $this->extend('dashboard/layouts/template') ?>

<?= $this->section('content') ?>

                    <div class="col-lg-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title"><?= $title ?></h4>
								<form class="cmxform" method="POST" action="<?= base_url('dashboard/faq/update') ?>">
									<fieldset>
                                        <input name="id" value="<?= $content['id'] ?>" hidden/>
                                        <div class="form-group">
											<label for="pertanyaan">Pertanyaan</label>
											<textarea name="pertanyaan" id="maxlength-textarea" class="form-control" maxlength="100" rows="8" placeholder="This textarea has a limit of 100 chars."><?= $content['pertanyaan'] ?></textarea>
										</div>
										<div class="form-group">
											<label for="jawaban">Jawaban</label>
											<textarea name="jawaban" id="maxlength-textarea" class="form-control" maxlength="100" rows="8" placeholder="This textarea has a limit of 100 chars."><?= $content['jawaban'] ?></textarea>
										</div>
										<input class="btn btn-primary" type="submit" value="Submit">
									</fieldset>
								</form>
							</div>
						</div>
					</div>

<?= $this->endSection() ?>