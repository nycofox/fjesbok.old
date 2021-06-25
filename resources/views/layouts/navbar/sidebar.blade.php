<!-- Sidebar -->
<div id="sidebar" class="sidebar sidebar-fixed expandable sidebar-light" data-backdrop="true" data-dismiss="true" data-swipe="true">
    <div class="sidebar-inner">

        <div class="ace-scroll flex-grow-1 mt-1px" data-ace-scroll="{}">

            <!-- optional `nav` tag -->
            <nav class="pt-3" aria-label="Main">
                <ul class="nav flex-column has-active-border">
                    <li class="nav-item-caption">
                        <span class="fadeable pl-3">MAIN</span>
                        <span class="fadeinable mt-n2 text-125">…</span>
                        <!--
                                 OR something like the following (with `.hideable` text)
                             -->
                        <!--
                                 <div class="hideable">
                                     <span class="pl-3">MAIN</span>
                                 </div>
                                 <span class="fadeinable mt-n2 text-125">&hellip;</span>
                             -->
                    </li>
                    <li class="nav-item @if(Route::is('admin.dashboard')) active @endif">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <i class="nav-icon fa fa-home"></i>
                            <span class="nav-text fadeable">Home</span>
                        </a>
                    </li>

                    <li class="nav-item @if(Route::is('admin.users.*')) active @endif">
                        <a class="nav-link" href="#">
                            <i class="nav-icon fa fa-users"></i>
                            <span class="nav-text fadeable">Friends</span>
                        </a>
                    </li>
                    <li class="nav-item-caption">
                        <span class="fadeable pl-3">ENTERTAINMENT</span>
                        <span class="fadeinable mt-n2 text-125">…</span>
                        <!--
                                 OR something like the following (with `.hideable` text)
                             -->
                        <!--
                                 <div class="hideable">
                                     <span class="pl-3">MAIN</span>
                                 </div>
                                 <span class="fadeinable mt-n2 text-125">&hellip;</span>
                             -->
                    </li>

                    <li class="nav-item @if(Route::is('webcomics.*')) active @endif">
                        <a class="nav-link" href="{{ route('webcomics.index') }}">
                            <i class="nav-icon fa fa-book-reader"></i>
                            <span class="nav-text fadeable">Webcomics</span>
                        </a>
                    </li>
                </ul>
            </nav>

        </div><!-- /.ace-scroll -->



    </div>
</div>
