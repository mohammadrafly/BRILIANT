<?= $this->extend('dashboard/layouts/template') ?>

<?= $this->section('content') ?>

          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                          <a href="<?= base_url('dashboard/user/add') ?>">
                            <button class="btn btn-primary">
                              <i data-feather="plus"></i> Tambah User
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
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Dibuat Tanggal</th>
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
                        <td><?= $row->role ?></td>
                        <td>
                          <?php if ($row->is_verified === 'yes'): ?>
                            <span class="badge badge-success">Verified<span>
                          <?php elseif ($row->is_verified === 'no'): ?>
                            <span class="badge badge-danger">Reject<span>
                          <?php elseif ($row->is_verified === 'pending'): ?>
                            <span class="badge badge-warning">Pending<span>
                          <?php endif ?>
                        </td>
                        <td><?= $row->created_at ?></td>
                        <td>
                          <a href="<?= base_url('dashboard/user/edit/'.$row->id_token) ?>">
                            <button class="btn btn-primary btn-icon">
                              <i data-feather="edit"></i>
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