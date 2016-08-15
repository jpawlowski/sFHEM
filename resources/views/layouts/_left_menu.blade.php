<ul id="menu" class="page-sidebar-menu">
@if(Sentinel::getUser()->inRole('admin'))
    <li>
        <a href="{{ URL::to('admin') }}">
            <i class="livicon" data-name="admin" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
               data-loop="true"></i>
            <span class="title">Administration</span>
        </a>
    </li>
@endif
</ul>