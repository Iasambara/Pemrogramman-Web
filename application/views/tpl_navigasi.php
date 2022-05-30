<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">

			
			<li class="<?php echo ($this->uri->segment(1) == 'beranda') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('beranda'); ?>">
							 Beranda
						</a>
			</li>
			
			<li class="<?php echo ($this->uri->segment(1) == 'profil') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('profil'); ?>">
							 Profil BKK
						</a>
			</li>

			<li class="<?php echo ($this->uri->segment(1) == 'berita') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('berita'); ?>">
							 Info BKK
						</a>
			</li>

			<li class="<?php echo ($this->uri->segment(1) == 'regis') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('regis'); ?>">
							 Registrasi Peserta
						</a>
			</li>

			<li class="<?php echo ($this->uri->segment(1) == 'alumni') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('alumni'); ?>">
							Telusur Alumni
						</a>
			</li>
			
			<li class="<?php echo ($this->uri->segment(1) == 'lulusan') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('lulusan'); ?>">
							 Alumni
						</a>
			</li>
			
          </ul>
        </div>