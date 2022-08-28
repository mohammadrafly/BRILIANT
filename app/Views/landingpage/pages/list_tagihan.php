<?= $this->extend('landingpage/layouts/template') ?>

<?= $this->section('content') ?>

<?= $this->include('landingpage/partials/breadcrumbs') ?>

    <section class="section text-dark">
		<div class="container" data-aos="fade-up">
			<div class="row">
				<div class="col-12">
					<table class="table">
						<thead>
							<tr>
								<th>No</th>
								<th>Status Trasaction</th>
								<th>Harga</th>
								<th>Discount</th>
								<th>Bukti Pembayaran</th>
								<th>Nama Pengajar</th>
								<th>Mata Pelajaran</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($content as $row): ?>
								<tr>
									<td scope="row"><?= $no++ ?></td>
									<td><?= $row->status; ?></td>
									<td><?= number_to_currency($row->total, 'IDR', 'en_US', 2); ?></td>
									<td><?= number_to_currency($row->discount, 'IDR', 'en_US', 2); ?></td>
                                    <td><?= $row->receipt; ?></td>
									<td><?= $row->user_name; ?></td>
									<td><?= $row->nama_mapel; ?></td>
                                    <td>
                                        <?php if (!$row->receipt){
												echo '<button onclick="uploadReceipt('. $row->transaction_id.')" class="btn btn-primary">Upload Bukti Pembayaran</button>';
											}else{
												if($row->status === 'verified'){
													echo '<button disabled class="btn btn-success">Verified</button>';
												}else{
													echo '<button disabled class="btn btn-secondary">Menunggu Verifikasi</button>';
												}
											}
										?>
                                    </td>
                                    <div class="modal fade text-dark" id="modalUpload" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Upload Bukti Pembayaran</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="<?= base_url('dashboard/tagihan/bayar/'.$row->transaction_id) ?>" method="POST" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="upload">Bukti Pembayaran</label>
                                                            <input type="file" class="receipt" name="receipt" class="form-control">
                                                            <input value="<?= $row->id_token_udrt ?>" type="text" name="token_tutor" hidden>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Upload</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<script>
		function uploadReceipt(id) {
			$('#transaction_id').val(id);
			$('#modalUpload').modal('show');
		}
	</script>

<?= $this->endSection() ?>