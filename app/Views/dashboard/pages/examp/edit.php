<?= $this->extend('dashboard/layouts/template') ?>

<?= $this->section('content') ?>

                    <div class="col-lg-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title"><?= $title ?></h4>
								<form class="cmxform" method="POST" action="<?= base_url('dashboard/master/tutor-examp/update') ?>">
									<fieldset>
										<input value="<?= $content['id'] ?>" name="id" hidden>
                                        <div class="form-group">
											<label>Mata Pelajaran</label>
											<select name="id_mapel" class="js-example-basic-single w-100" disabled>
                                                <option value="<?= $content['id_mapel'] ?>"><?= $content['id_mapel']?></option>
											</select>
										</div>
										<div class="form-group">
											<label>Time Start</label>
											<div class="input-group date timepicker" id="datetimepickerExample1" data-target-input="nearest">
												<input value="<?= $content['start_time']?>" name="start_time" type="text" class="form-control datetimepicker-input" data-target="#datetimepickerExample"/>
												<div class="input-group-append" data-target="#datetimepickerExample1" data-toggle="datetimepicker">
													<div class="input-group-text"><i data-feather="clock"></i></div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label>Time End</label>
											<div class="input-group date timepicker" id="datetimepickerExample2" data-target-input="nearest">
												<input value="<?= $content['end_time']?>" name="end_time" type="text" class="form-control datetimepicker-input" data-target="#datetimepickerExample"/>
												<div class="input-group-append" data-target="#datetimepickerExample2" data-toggle="datetimepicker">
													<div class="input-group-text"><i data-feather="clock"></i></div>
												</div>
											</div>
										</div>
                                        <div class="form-group">
											<label>Tutor</label>
											<select name="id_token_tutor" class="js-example-basic-single w-100" disabled>
                                                <option value="<?= $content['id_token_tutor']?>"><?= $content['id_token_tutor'] ?></option>
											</select>
										</div>
										<input class="btn btn-primary" type="submit" value="Submit">
									</fieldset>
								</form>
							</div>
						</div>
					</div>

<?= $this->endSection() ?>