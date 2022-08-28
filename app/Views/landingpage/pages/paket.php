<?= $this->extend('landingpage/layouts/template') ?>

<?= $this->section('content') ?>

<?= $this->include('landingpage/partials/breadcrumbs') ?>
    <section class="w-100" data-aos="fade-up">
		<div class="d-flex flex-wrap justify-content-center w-100 p-5" data-aos="zoom-in" data-aos-delay="100">
			<?php foreach ($content as $row) : ?>
				<?php if ($row): ?>
				<div class="w-25 h-full m-3">
					<div class="card shadow rounded w-100 flex flex-col p-3">
						<div class="mx-auto w-50">
							<img src="<?= base_url('assets/landingpage/img/illust_1.png'); ?>" class="img-fluid" />
						</div>
						<div class="text-center">
							<span class="text-uppercase text-bold"><?= $row['name']; ?></span>
						</div>
						<div class="mt-5 mb-3 w-100">
							<a href="<?= base_url('dashboard/siswa/bimbel/'.$row['id']); ?>" class="btn btn-outline-primary justify-content-center d-flex align-items-center">
								<span class="me-3">Selengkapnya</span>
								<i class="fas fa-arrow-right"></i>
							</a>
						</div>
					</div>
				</div>
				<?php elseif(!$row): ?>
					<div class="w-full h-full m-3 text-dark">
						<div>Tidak ada data :(</div>
					</div>
				<?php endif ?>
			<?php endforeach; ?>
		</div>
	</section>

<?= $this->endSection() ?>