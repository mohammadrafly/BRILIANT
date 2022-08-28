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
                        <th>Token Transaksi</th>
                        <th>Active</th>
                        <th>Status</th>
                        <th>Bukti Pembayaran</th>
                        <th>Discount</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1; 
                      foreach($content as $row): ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['token_transaksi'] ?></td>
                        <td>
                          <?php if ($row['is_active'] === 'active'): ?>
                            <span class="badge badge-success">Active<span>
                          <?php elseif ($row['is_active'] === 'inactive'): ?>
                            <span class="badge badge-warning">Inactive<span>
                          <?php endif ?>
                        </td>
                        <td>
                          <?php if ($row['status'] === 'pending'): ?>
                            <span class="badge badge-warning">Pending<span>
                          <?php elseif ($row['status'] === 'verified'): ?>
                            <span class="badge badge-success">Verified<span>
                          <?php elseif ($row['status'] === 'unverified'): ?>
                            <span class="badge badge-warning">Unverified<span>
                          <?php elseif ($row['status'] === 'blocked'): ?>
                            <span class="badge badge-danger">Blocked<span>
                          <?php endif ?>
                        </td>
                        <td><img data-enlargeable width="100" style="cursor: zoom-in" src="<?= base_url('bukti_pembayaran/'.$row['receipt']) ?>" width="100px"/></td>
                        <td><?= $row['discount'] ?></td>
                        <td><?= $row['total'] ?></td>
                        <td><?= $row['created_at'] ?></td>
                        <td>
                          <a href="<?= base_url('dashboard/transaksi/verifying/'.$row['id']) ?>">
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