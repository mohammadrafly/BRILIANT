<?= $this->extend('dashboard/layouts/template') ?>

<?= $this->section('content') ?>

                <div class="row">
					<div class="col-xl-10 main-content pl-xl-4 pr-xl-5">
                        <?php if(session()->get('role') === 'unset'): ?>
						<h1 class="page-title">Hi! <?= session()->get('email') ?></h1>
						<p class="lead">Anda saat ini berada di tahap kedua pendaftaran, silahkan <a href="<?= base_url('dashboard/lengkapi-data-diri/'.session()->get('id_token')) ?>">lengkapi</a> data diri anda!.</p>
                        <?php else: ?>
                        <h1 class="page-title">Hi! <?= session()->get('email') ?></h1>
                        <?php endif ?>
                        <?= $this->include('dashboard/partials/message') ?>
                    </div>
                </div>

<?= $this->endSection() ?>