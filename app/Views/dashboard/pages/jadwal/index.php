<?= $this->extend('dashboard/layouts/template') ?>

<?= $this->section('content') ?>

          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                          <a href="<?= base_url('dashboard/jadwal/add/'.$id_mapel['mapel']) ?>">
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
                        <th>Bridge Token</th>
                        <th>Mata Pelajaran</th>
                        <th>Mulai</th>
                        <th>Berakhir</th>
                        <th>Dibuat Pada</th>
                        <th>Diupdate Pada</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1; 
                      foreach($content as $row): ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->bridge_token ?></td>
                        <td><?= $row->name ?></td>
                        <td><?= $row->start ?></td>
                        <td><?= $row->end ?></td>
                        <td><?= $row->created_at ?></td>
                        <td><?= $row->updated_at ?></td>
                        <td>
                          <a href="<?= base_url('dashboard/jadwal/edit/'.$row->id) ?>">
                            <button class="btn btn-primary btn-icon">
                              <i data-feather="edit"></i>
                            </button>
                          </a>
                          <a href="<?= base_url('dashboard/jadwal/delete/'.$row->id) ?>">
                            <button class="btn btn-danger btn-icon">
                              <i data-feather="trash"></i>
                            </button>
                          </a>
                          <a href="<?= base_url('dashboard/jadwal/list/siswa/'.$row->bridge_token) ?>">
                            <button class="btn btn-info btn-icon">
                              <i data-feather="plus"></i>
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