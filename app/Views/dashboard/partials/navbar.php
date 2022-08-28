<nav class="navbar">
				<a href="#" class="sidebar-toggler">
					<i data-feather="menu"></i>
				</a>
				<div class="navbar-content">
					<ul class="navbar-nav">
						<li class="nav-item dropdown nav-profile">
							<a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img src="https://via.placeholder.com/30x30" alt="profile">
							</a>
							<div class="dropdown-menu" aria-labelledby="profileDropdown">
								<div class="dropdown-header d-flex flex-column align-items-center">
									<div class="figure mb-3">
										<img src="https://via.placeholder.com/80x80" alt="">
									</div>
									<div class="info text-center">
                                        <p class="email text-muted mb-3"><?= session()->get('role') ?></p>
										<p class="email text-muted mb-3"><?= session()->get('email') ?></p>
									</div>
								</div>
								<div class="dropdown-body">
									<ul class="profile-nav p-0 pt-3">
										<?php
										if (session()->get('role') === 'unset'): ?>
										<li class="nav-item">
											<a href="<?= base_url('logout') ?>" class="nav-link">
												<i data-feather="log-out"></i>
												<span>Log Out</span>
											</a>
										</li>
										<?php else: ?>
										<li class="nav-item">
											<a href="<?= base_url('logout') ?>" class="nav-link">
												<i data-feather="log-out"></i>
												<span>Log Out</span>
											</a>
										</li>
										<?php endif ?>
									</ul>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</nav>