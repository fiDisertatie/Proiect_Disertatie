<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">

                <li class="sidebar-item">
                    <a
                        class="sidebar-link waves-effect waves-dark"
                        href="{{ route('home.index') }}"
                        aria-expanded="false"
                    ><i class="mdi mdi-view-dashboard"></i
                        ><span class="hide-menu">Acasă</span></a
                    >
                </li>

                <li class="sidebar-item">
                    <a
                        class="sidebar-link waves-effect waves-dark"
                        href="{{ route('students.index') }}"
                        aria-expanded="false"
                    ><i class="fa fa-child"></i
                        ><span class="hide-menu">Elevi</span></a
                    >
                </li>

                <li class="sidebar-item">
                    <a
                        class="sidebar-link waves-effect waves-dark"
                        href="{{ route('teachers.index') }}"
                        aria-expanded="false"
                    ><i class="fa fa-graduation-cap"></i
                        ><span class="hide-menu">Cadre Didactice</span></a
                    >
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-file-excel"></i><span class="hide-menu">Import Date</span></a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('students.create.import') }}" class="sidebar-link"><i class="fa fa-child"></i><span class="hide-menu">Elevi</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('teachers.create.import') }}" class="sidebar-link"><i class="fa fa-graduation-cap"></i><span class="hide-menu">Cadre Didactice</span></a>
                        </li>
                    </ul>
                </li>

                @if (auth()->user()->role->role == "Admin")
                    <li class="sidebar-item">
                        <a
                            class="sidebar-link waves-effect waves-dark"
                            href="{{ route('users.index') }}"
                            aria-expanded="false"
                        ><i class="fa fa-users"></i
                            ><span class="hide-menu">Utilizatori</span></a
                        >
                    </li>
                @endif

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
