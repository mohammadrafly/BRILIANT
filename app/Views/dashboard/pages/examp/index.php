<?= $this->extend('dashboard/layouts/template') ?>

<?= $this->section('content') ?>

          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                          <a href="<?= base_url('dashboard/master/tutor-examp/add') ?>">
                            <button class="btn btn-primary">
                              <i data-feather="plus"></i> Tambah Jadwal
                            </button>
                          </a>
              <div class="card-body">
                <h6 class="card-title"><?= $title ?></h6>
                <?= $this->include('dashboard/partials/message') ?>
                <div class="table-responsive">
                  <table id="test" class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>ID Mapel</th>
                        <th>ID Token Tutor</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Berakhir</th>
                        <th>Status</th>
                        <th>Kode</th>
                        <th>Score</th>
                        <th>Dibuat Tanggal</th>
                        <th>Diperbarui Tanggal</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1; 
                      foreach($content as $row): ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->mapel_name ?></td>
                        <td><?= $row->user_name ?></td>
                        <td><?= $row->start_time ?></td>
                        <td><?= $row->end_time ?></td>
                        <td>
                            <?php if ($row->status_course === 'undone'): ?>
                            <span class="badge badge-warning">UNDONE<span>
                            <?php elseif ($row->status_course === 'on-progres'): ?>
                                <span class="badge badge-primary">ON-PROGRES<span>
                            <?php elseif ($row->status_course === 'done'): ?>
                                <span class="badge badge-success">DONE<span>
                            <?php endif ?>
                        </td>
                        <td><?= $row->kode ?></td>
                        <td>
                            <?php if ($row->score >= '90'): ?>
                                <span class="badge badge-success"><?= $row->score ?>/Lulus<span>
                            <?php elseif ($row->score >= '75'): ?>
                                <span class="badge badge-primary"><?= $row->score ?>/Lulus<span>
                            <?php elseif ($row->score >= '50'): ?>
                                <span class="badge badge-warning"><?= $row->score ?>/Tidak Lulus<span>
                            <?php elseif ($row->score >= '25'): ?>
                                <span class="badge badge-danger"><?= $row->score ?>/Tidak Lulus<span>
                            <?php endif ?>
                        </td>
                        <td><?= $row->created_at_course ?></td>
                        <td><?= $row->updated_at_course ?></td>
                        <td>
                          <a href="<?= base_url('dashboard/master/tutor-examp/edit/'.$row->id_course) ?>">
                            <button class="btn btn-primary btn-icon">
                              <i data-feather="edit"></i>
                            </button>
                          </a>
                          <a href="<?= base_url('dashboard/master/tutor-examp/delete/'.$row->id_course) ?>">
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