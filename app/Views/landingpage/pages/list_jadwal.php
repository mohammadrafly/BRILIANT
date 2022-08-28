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
								<th>Nama Tutor</th>
								<th>Mata Pelajaran</th>
								<th>Mulai</th>
								<th>Berakhir</th>
							</tr>
						</thead>
						<tbody>
                            <?php if ($content): ?>
                                <?php
                                $no = 1;
                                foreach ($content as $row): ?>
                                    <tr>
                                        <td scope="row"><?= $no++ ?></td>
                                        <td><?= $row->user_name; ?></td>
                                        <td><?= $row->name; ?></td>
                                        <td><?= $row->start; ?></td>
                                        <td><?= $row->end; ?></td>
                                    </tr>
                                <?php endforeach ?>
							<?php elseif ($content === null): ?>
                            <?php endif ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>

<?= $this->endSection() ?>