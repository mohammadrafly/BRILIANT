<?= $this->extend('dashboard/layouts/template') ?>

<?= $this->section('content') ?>

          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                          <a href="<?= base_url('dashboard/master/mapel/add') ?>">
                            <button class="btn btn-primary">
                              <i data-feather="plus"></i> Tambah Mata Pelajaran
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
                        <th>Mata Pelajaran</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1; 
                      foreach($content as $row): ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['name'] ?></td>
                        <td>
                          <a href="<?= base_url('dashboard/master/mapel/edit/'.$row['id']) ?>">
                            <button class="btn btn-primary btn-icon">
                              <i data-feather="edit"></i>
                            </button>
                          </a>
                          <a href="<?= base_url('dashboard/master/mapel/delete/'.$row['id']) ?>">
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