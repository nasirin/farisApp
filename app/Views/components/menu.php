<div class="page-sidebar" id="sidebar">
    <!-- Page Sidebar Header-->
    <div class="sidebar-header-wrapper">
        <input type="text" class="searchinput" />
        <i class="searchicon fa fa-search"></i>
        <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
    </div>
    <!-- /Page Sidebar Header -->
    <!-- Sidebar Menu -->
    <ul class="nav sidebar-menu">
        <!--Dashboard-->
        <li class="active">
            <a href="/">
                <i class="menu-icon glyphicon glyphicon-home"></i>
                <span class="menu-text"> Dashboard </span>
            </a>
        </li>
        <!--Databoxes-->
        <?php if (session('level') == 'admin') : ?>
            <li>
                <a href="/bonus/form">
                    <i class="menu-icon glyphicon glyphicon-edit"></i>
                    <span class="menu-text"> Form Bonus </span>
                </a>
            </li>
        <?php endif; ?>
        <!--Widgets-->
        <li>
            <a href="/bonus">
                <i class="menu-icon glyphicon glyphicon-tasks""></i>
                <span class=" menu-text"> Data Bonus </span>
            </a>
        </li>
        <li>
            <a href="/absensi">
                <i class="menu-icon glyphicon glyphicon-tasks""></i>
                <span class=" menu-text"> Absensi </span>
            </a>
        </li>
    </ul>
    <!-- /Sidebar Menu -->
</div>