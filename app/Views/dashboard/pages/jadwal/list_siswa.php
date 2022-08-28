<?= $this->extend('dashboard/layouts/template') ?>

<?= $this->section('content') ?>

          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                          <a href="<?= base_url('dashboard/jadwal/list/tambah/'.$bridge) ?>">
                            <button class="btn btn-primary">
                              <i data-feather="plus"></i> Tambah Siswa
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
                        <th>ID Token</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1; 
                      foreach($content as $row): ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->id_token ?></td>
                        <td><?= $row->name ?></td>
                        <td><?= $row->email ?></td>
                        <td>
                          <a href="<?= base_url('dashboard/jadwal/list/remove/'.$row->id.'/'.$bridge.'/'.$row->id_token) ?>">
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