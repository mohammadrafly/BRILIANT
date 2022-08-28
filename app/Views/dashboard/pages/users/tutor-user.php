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
                        <th>Email</th>
                        <th>Nama Lengkap</th>
                        <th>Profesi</th>
                        <th>Status Tutor</th>
                        <th>Ijazah</th>
                        <th>NIK</th>
                        <th>Mata Pelajaran</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1; 
                      foreach($content as $row): ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->email ?></td>
                        <td><?= $row->user_name ?></td>
                        <td><?= $row->profession ?></td>
                        <td>
                          <?php if ($row->is_active === 'active'): ?>
                            <span class="badge badge-success">Aktif<span>
                          <?php elseif ($row->is_active === 'inactive'): ?>
                            <span class="badge badge-danger">Tidak Aktif<span>
                          <?php endif ?>  
                        </td>
                        <td>
                            <a href="<?= base_url('dashboard/user/preview/'.$row->email) ?>" class="btn btn-primary">
                              Lihat Ijazah
                          </a>
                        </td>
                        <td><?= $row->nik ?></td>
                        <td><?= $row->mapel_name ?></td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
		      </div>

<?= $this->endSection() ?>