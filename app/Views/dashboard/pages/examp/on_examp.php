<?= $this->extend('dashboard/layouts/template') ?>

<?= $this->section('content') ?>

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Examps</h6>
                <div id="accordion" class="accordion" role="tablist">
                  <div class="card">
                    <form method="POST" action="<?= base_url('dashboard/tutor/examp/sumbit') ?>">
                        <?php 
                        $no = 1;
                        foreach ($content as $i => $row): ?>  
                            <input value="<?= $id_course ?>" name="id_course" hidden> 
                            <input value="<?= session()->get('id_token') ?>" name="id_user[]" hidden>
                            <div class="card-header" role="tab" id="headingOne">
                                <h6 class="mb-0">
                                    <a data-toggle="collapse" href="#collapse<?= $i; ?>" aria-expanded="true" aria-controls="collapse<?= $i; ?>">
                                    <?= $no++ ?>. <?= $row->pertanyaan ?>
                                    </a>
                                    <input value="<?= $row->pertanyaan ?>" name="pertanyaan[]" hidden>
                                    <input value="<?= $row->correct_answer ?>" name="correct_answer[]" hidden>
                                </h6>
                            </div>
                            <div id="collapse<?= $i; ?>" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                <?php $pecah = explode(',',$row->pilihan) ?>
                                    <label for="exampleFormControlSelect1">Pilih Jawaban</label>
                                        <select name="answer[]" class="form-control" id="exampleFormControlSelect1">
                                            <?php 
                                            $alpha = 'A';
                                            foreach($pecah as $row): ?>
                                            <option value="<?= $row ?>"><?= $alpha++ ?>. <?= $row ?></option>
                                            <?php endforeach ?>
                                        </select>
                                </div>
                            </div>
                        <?php endforeach ?>
                        <br>
                        <button class="btn btn-primary" type="submit">Submit Exam</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

                
<?= $this->endSection() ?>