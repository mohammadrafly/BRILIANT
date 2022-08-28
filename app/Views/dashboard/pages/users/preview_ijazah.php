<?= $this->extend('dashboard/layouts/template') ?>

<?= $this->section('content') ?>

					<div class="col-lg-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title"><?= $title ?></h4>
                                <?php foreach($content as $row): ?>
                                    <?php if ($row->cv === null): ?>
									    <label for="cv">Ijazah</label>
								    <?php else: ?>
									    <embed src="<?= base_url('profile/'.$row->cv)?>" width="800px" height="800px" />
                                        <br>
                                        <a class="btn btn-primary" href="<?= base_url('profile/'.$row->cv)?>" download="Ijazah_<?= $row->name ?>.pdf">Download Ijazah</a>
									<?php endif ?>
                                <?php endforeach ?>
							</div>
						</div>
					</div>

<?= $this->endSection() ?>