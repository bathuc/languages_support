<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MENU</li>
    <?php $url = URL::current();?>
    <li {{ strpos($url, 'dashboard') ? 'class=active' : '' }} ><a href="{{ route('admin.dashboard') }}"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
    <li {{ strpos($url, 'words') ? 'class=active' : '' }}><a href="{{ route('admin.words') }}"><i class="fa fa-link"></i> <span>Words</span></a></li>
    <li {{ strpos($url, 'phrases') ? 'class=active' : '' }}><a href="{{ route('admin.phrases') }}"><i class="fa fa-link"></i> <span>Phrases</span></a></li>
</ul>