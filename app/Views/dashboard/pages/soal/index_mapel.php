<?= $this->extend('dashboard/layouts/template') ?>

<?= $this->section('content') ?>

          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <input name="ids" value="<?= $id ?>" hidden >
                        <a href="<?= base_url('dashboard/master/soal/mapel/add/'.$id) ?>">
                            <button class="btn btn-primary">
                              <i data-feather="plus"></i> Tambah Soal
                            </button>
                          </a>
              <div class="card-body">
                <h6 class="card-title"><?= $title ?> | <?= $mapel['name'] ?></h6>
                <?= $this->include('dashboard/partials/message') ?>
                <div class="table-responsive">
                  <table id="test" class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Pertanyaan</th>
                        <th>Pilihan</th>
                        <th>Kunci Jawaban</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1; 
                      foreach($content as $row): ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->pertanyaan ?></td>
                        <td><?= $row->pilihan ?></td>
                        <td><?= $row->correct_answer ?></td>
                        <td>
                          <a href="<?= base_url('dashboard/master/soal/mapel/edit/'.$row->id.'/'.$id) ?>">
                            <button class="btn btn-primary btn-icon">
                              <i data-feather="edit"></i>
                            </button>
                          </a>
                          <a href="<?= base_url('dashboard/master/soal/mapel/delete/'.$row->id.'/'.$id) ?>">
                            <button class="btn btn-danger btn-icon">
                              <i data-feather="trash"></i>
                            </button>
                          </a>
                        </td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
		      </div>

<?= $this->endSection() ?>