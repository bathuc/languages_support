<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MENU</li>
    <?php $url = URL::current();?>
    <li {{ strpos($url, 'dashboard') ? 'class=active' : '' }} ><a href="{{ route('admin.dashboard') }}"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>

    @if($admin->role == config('master.ADMIN_ROLE.SUPER_ADMIN'))
        <li {{ strpos($url, 'user') ? 'class=active' : '' }}><a href="{{ route('admin.user') }}"><i class="fa fa-link"></i> <span>User</span></a></li>
    @endif

    <li {{ strpos($url, 'subject') ? 'class=active' : '' }}><a href="{{ route('admin.subject') }}"><i class="fa fa-link"></i> <span>Subject</span></a></li>
    <li {{ strpos($url, 'words') ? 'class=active' : '' }}><a href="{{ route('admin.words') }}"><i class="fa fa-link"></i> <span>Words</span></a></li>
    <li {{ strpos($url, 'phrases') ? 'class=active' : '' }}><a href="{{ route('admin.phrases') }}"><i class="fa fa-link"></i> <span>Phrases</span></a></li>
</ul>