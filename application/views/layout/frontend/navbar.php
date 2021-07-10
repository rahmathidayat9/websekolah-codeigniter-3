<div class="clever-main-menu">
    <div class="classy-nav-container breakpoint-off">
        <!-- Menu -->
        <nav class="classy-navbar justify-content-between" id="cleverNav">

            <!-- Logo -->
            <a class="nav-brand" href="" alt="">
                <img src="<?= base_url('assets/img/background/logo-codeigniter.png') ?>" width="45">
                SMK-TSM
            </a>

            <!-- Navbar Toggler -->
            <div class="classy-navbar-toggler">
                <span class="navbarToggler"><span></span><span></span><span></span></span>
            </div>

            <!-- Menu -->
            <div class="classy-menu">

                <!-- Close Button -->
                <div class="classycloseIcon">
                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                </div>

                <!-- Nav Start -->
                <div class="classynav">
                    <ul>
                        <li><a class="<?= $this->uri->segment(1) == 'Home' ? 'text-primary' : ''  ?>" href="<?= base_url('Home') ?>">Home</a></li>

                        <li><a class="<?= $this->uri->segment(2) == 'about' ? 'text-primary' : ''  ?>" href="<?= base_url('Home/about') ?>">About</a></li>

                        <li><a class="<?= $this->uri->segment(2) == 'contact' ? 'text-primary' : ''  ?>" href="<?= base_url('Home/contact') ?>">Contact</a></li>

                        <li><a class="<?= $this->uri->segment(1) == 'Blog' ? 'text-primary' : ''  ?>" href="<?= base_url('Blog') ?>">Blog</a></li>

                        <li><a class="<?= $this->uri->segment(1) == 'Pengumuman' ? 'text-primary' : ''  ?>" href="<?= base_url('Pengumuman') ?>">Pengumuman</a></li>
                        
                        <li><a class="<?= $this->uri->segment(1) == 'Agenda' ? 'text-primary' : ''  ?>" href="<?= base_url('Agenda') ?>">Agenda</a></li>
                    </ul>
                    <!-- Search Button -->
                    <div class="search-area">
                        <form action="<?= base_url('Blog/search_blog') ?>" method="post">
                            <input type="text" class="text-dark" name="keyword" id="search" placeholder="Cari">
                            <?= get_csrf() ?>
                            <button type="submit" name="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>

                    <?php if ($this->session->userdata('id_user')): ?>
                    <!-- Register / Login -->
                    <div class="login-state d-flex align-items-center">
                        <div class="user-name mr-30">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="userName" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?= user()->username ?>        
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userName">
                                    <a class="dropdown-item" href="<?= base_url('admin/Dashboard') ?>">Dashboard</a>
                                    <a class="dropdown-item" href="<?= base_url('auth/Login/out') ?>">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                    <!-- Register / Login -->
                    <div class="register-login-area">
                        <a href="<?= base_url('auth/Login') ?>" class="btn active"><i class="fa-fw fa fa-sign-in faa-horizontal animated"></i> LOGIN</a>
                    </div>
                    <?php endif; ?>

                </div>
                <!-- Nav End -->
            </div>
        </nav>
    </div>
</div>
</header>
<!-- ##### Header Area End ##### -->