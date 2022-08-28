<?= $this->extend('dashboard/layouts/template') ?>

<?= $this->section('content') ?>

          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title"><?= $title ?></h6>
                <?= $this->include('dashboard/partials/message') ?>
                <div class="table-responsive">
                  <table id="test" class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Mata Pelajaran</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Berakhir</th>
                        <th>Status</th>
                        <th>Kode</th>
                        <th>Score</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1; 
                      foreach($content as $row): ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->name ?></td>
                        <td><?= $row->start_time ?></td>
                        <td><?= $row->end_time ?></td>
                        <td>
                            <?php if ($row->status === 'undone'): ?>
                            <span class="badge badge-warning">Undone<span>
                            <?php elseif ($row->status === 'on-progres'): ?>
                                <span class="badge badge-primary">On-progres<span>
                            <?php elseif ($row->status === 'done'): ?>
                                <span class="badge badge-success">Done<span>
                            <?php endif ?>
                        </td>
                        <td><?= $row->kode ?></td>
                        <td>
                            <?php if ($row->score >= '75'): ?>
                                <span class="badge badge-success"><?= $row->score ?>/Lulus<span>
                            <?php elseif ($row->score >= '74'): ?>
                                <span class="badge badge-warning"><?= $row->score ?>/Tidak Lulus<span>
                            <?php elseif ($row->score >= '0'): ?>
                                <span class="badge badge-danger"><?= $row->score ?>/Tidak Lulus<span>
                            <?php endif ?>
                        </td>
                        <td>
                        <?php if ($row->status === 'done'): ?>
                            <button class="btn btn-success btn-icon">
                              <i data-feather="check"></i>
                            </button>
                        <?php else: ?>
                          <a href="<?= base_url('dashboard/tutor/'.$row->id_course) ?>">
                            <button class="btn btn-primary btn-icon">
                              <i data-feather="edit"></i>
                            </button>
                          </a>
                        <?php endif ?>
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