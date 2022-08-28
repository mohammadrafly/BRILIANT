<?= $this->extend('dashboard/layouts/template') ?>

<?= $this->section('content') ?>

                    <div class="col-lg-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title"><?= $title ?></h4>
								<form class="cmxform" method="POST" action="<?= base_url('dashboard/jadwal/list/add/proced/'.$bridge) ?>">
									<fieldset>
                                        <input value="<?= $bridge ?>" name="bridge" hidden>
                                        <div class="form-group">
											<label>Pilih Tutor</label>
											<select name="id_user" class="js-example-basic-single w-100">
												<?php foreach($content as $row): ?>
                                                <option value="<?= $row->id_token ?>"><?= $row->name ?></option>
                                                <?php endforeach ?>
											</select>
										</div>
										<input class="btn btn-primary" type="submit" value="Submit">
									</fieldset>
								</form>
							</div>
						</div>
					</div>

<?= $this->endSection() ?>