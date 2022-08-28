<?= $this->extend('landingpage/layouts/template') ?>

<?= $this->section('content') ?>

<?= $this->include('landingpage/partials/breadcrumbs') ?>

    <section class="w-100" data-aos="fade-up">
		<div class="d-flex flex-wrap justify-content-center w-100 p-5" data-aos="zoom-in" data-aos-delay="100">
			<?php foreach ($content as $row) : ?>
				<?php if ($row->is_verified === 'yes'): ?>
				<div class="w-25 h-full m-3">
					<div class="card shadow rounded w-100 flex flex-col p-3">
						<div class="mx-auto w-50">
							<img src="<?= base_url('assets/landingpage/img/illust_1.png'); ?>" class="img-fluid" />
						</div>
						<div class="d-flex flex-row ms-2 mb-2">
							<span>Nama : </span>
							<span class="ms-2 text-capitalize text-bold"><?= $row->name; ?></span>
						</div>
						<div class="d-flex flex-row ms-2 mb-2">
							<span>Status : </span>
							<span class="ms-2 text-capitalize text-bold">
							<?= $row->is_verified == 'yes' ? 'Telah Terverifikasi' : 'Tidak Terverifikasi'; ?>
							</span>
						</div>
						<div class="d-flex flex-row ms-2 mb-2">
							<span>Mapel : </span>
							<span class="ms-2 text-capitalize text-bold"><?= $row->mapel_name ?></span>
						</div>
						<div class="d-flex flex-row ms-2 mb-2">
							<span>Pekerjaan : </span>
							<span class="ms-2 text-capitalize text-bold"><?= $row->profession ?></span>
						</div>
						<div class="d-flex flex-row ms-2 mb-2">
							<span>NIK : </span>
							<span class="ms-2 text-capitalize text-bold"><?= $row->nik ?></span>
						</div>
						<div class="d-flex flex-row ms-2 mb-2">
							<span>Harga : </span>
                            <?php if($row->harga != NULL): ?>
                                <span class="ms-2 text-capitalize text-bold"><?= number_to_currency($row->harga, 'IDR', 'en_US', 2);?></span>
                            <?php else: ?>
                                <span class="ms-2 text-capitalize text-bold">Rp. 0</span>
                            <?php endif?>
						</div>
						<div class="my-3 w-100">
						<?php if(session()->get('id')): ?>
							<?php if($row->is_verified === 'yes') : ?>
							<form method="POST" action="<?= base_url('dashboard/bimbel/transaksi/'.$row->id_token) ?>">
								<input value="<?= $row->harga; ?>" name="total" hidden>
								<input value="<?= $row->mapel; ?>" name="mapel" hidden>
								<button type="submit" class="btn btn-outline-primary justify-content-center d-flex align-items-center">
									<span class="me-3">Pilih</span>
									<i class="fas fa-arrow-right"></i>
								</button>
							</form>
							<?php endif; ?>
						<?php else: ?>
							<a href="<?= base_url('login') ?>" class="btn btn-outline-primary justify-content-center d-flex align-items-center">
									<span class="me-3">Pilih</span>
									<i class="fas fa-arrow-right"></i>
							</a>
						<?php endif ?>
						</div>
					</div>
				</div>
				<?php else: ?>
					<div class="w-full h-full m-3 text-dark">
						<div>Tidak ada data :(</div>
						<br>
						<a href="<?= base_url('dashboard/siswa/bimbel'); ?>" class="btn btn-outline-primary justify-content-center d-flex align-items-center">
								<span class="me-3">Kembali</span>
								<i class="fas fa-arrow-left"></i>
						</a>
					</div>
				<?php endif ?>
			<?php endforeach ?>
		</div>
	</section><!-- End Courses Section -->

<?= $this->endSection() ?>