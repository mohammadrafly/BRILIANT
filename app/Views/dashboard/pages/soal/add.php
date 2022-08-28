<?= $this->extend('dashboard/layouts/template') ?>

<?= $this->section('content') ?>

					<div class="col-lg-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title"><?= $title ?></h4>
								<form class="cmxform" method="POST" action="<?= base_url('dashboard/master/soal/mapel/add/proced') ?>">
									<fieldset>
										<input name="id_mapel" value="<?= $id ?>" hidden> 
										<div class="form-group">
											<label for="pertanyaan">Mata Pelajaran</label>
											<input name="pertanyaan" class="form-control">
										</div>
										<div class="form-group">
											<label for="Pilihan">Pilihan Ganda (gunakan ',' untuk pemisah)</label>
											<input name="pilihan" class="form-control">
										</div>
										<div class="form-group">
											<label for="name">Kunci jawaban</label>
											<input name="correct_answer" class="form-control">
										</div>
										<input class="btn btn-primary" type="submit" value="Submit">
									</fieldset>
								</form>
							</div>
						</div>
					</div>

<?= $this->endSection() ?>