<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="<?= base_url('dashboard') ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
             <span class="logo-mini">SA</span>
            <!-- logo for regular state and mobile devices -->
             <span class="logo-lg">Software Architecture</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">

            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>


            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- end to messages here -->
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?= base_url('upload/student.png') ?>"
                                 class="user-image" alt="User Image">
                            <span class="hidden-xs"><?= $this->session->userdata('name') ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?= base_url('upload/student.png') ?>"
                                     class="img-circle" alt="User Image">
                                <p>
                                    <?= $this->session->userdata('name') ?>
                                    <?php if ($this->session->userdata('created_at')): ?>
                                        <small>Member
                                            Since <?= date('M , Y', strtotime($this->session->userdata('created_at'))) ?></small>
                                    <?php endif; ?>
                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                
                                <div class="pull-left">
                                    <a href="<?= base_url('logout') ?>"
                                       class="btn btn-default btn-flat">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= base_url('upload/student.png') ?>"
                         class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?= $this->session->userdata('name') ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <!-- dashboard -->
                <li class="<?= (($this->uri->segment('2') == '/') || ($this->uri->segment('1') == 'dashboard')) ? 'active' : '' ?>">
                    <a href="<?= base_url('dashboard') ?>">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <!--assignments-->

                <li class="<?= ($this->uri->segment('1') == 'assignments') ? 'active' : '' ?>">
                    <a href="<?= base_url('assignments') ?>">
                        <i class="fa fa-book"></i>
                        <span>Assignments</span>
                    </a>
                </li>


                <!--logout-->

                <li>
                    <a href="<?= base_url('logout') ?>">
                        <i class="fa fa-power-off"></i>
                        <span>Logout</span>
                    </a>
                </li>

                
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
			
