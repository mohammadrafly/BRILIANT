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
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Nama Orang Tua</th>
                        <th>Nomor Orang Tua</th>
                        <th>Nama Sekolah</th>
                        <th>Tingkat</th>
                        <th>Kelas</th>
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
                        <td><?= $row->address ?></td>
                        <td><?= $row->sex ?></td>
                        <td><?= $row->nama_orangtua ?></td>
                        <td><?= $row->nomor_orangtua ?></td>
                        <td><?= $row->nama_sekolah ?></td>
                        <td><?= $row->tingkat ?></td>
                        <td><?= $row->kelas ?></td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
		  </div>


<?= $this->endSection() ?>