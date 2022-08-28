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
                        <th>Jenis Kelamin</th>
                        <th>Tanngal Lahir</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Permintaan Role</th>
                        <th>Tanggal Daftar</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1; 
                      foreach($content as $row): ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->email ?></td>
                        <td><?= $row->name ?></td>
                        <td><?= $row->sex ?></td>
                        <td><?= $row->dob ?></td>
                        <td><?= $row->address ?></td>
                        <td>
                          <?php if ($row->is_verified === 'yes'): ?>
                            <span class="badge badge-success">Verified<span>
                          <?php elseif ($row->is_verified === 'no'): ?>
                            <span class="badge badge-danger">Reject<span>
                          <?php elseif ($row->is_verified === 'pending'): ?>
                            <span class="badge badge-warning">Pending<span>
                          <?php endif ?>
                        </td>
                        <td><?= $row->wannabe ?></td>
                        <td><?= $row->created_at ?></td>
                        <td>
                          <a href="<?= base_url('dashboard/user/unverified/'.$row->id_token) ?>">
                            <button class="btn btn-primary btn-icon">
                              <i data-feather="check-square"></i>
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