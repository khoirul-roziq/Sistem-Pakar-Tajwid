<div class="navbar navbar-fixed">
    <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark teal lighten-1">
        <div class="nav-wrapper">

            @if (Auth::user()->role == 'guest')
                <ul class="navbar-list left">
                    <li><a href="{{ url('home') }}"><i class="material-icons left">developer_board</i><b>Sistem Pakar Tajwid</b></a></li>
                    <li><a href="{{ url('materi') }}"><i class="material-icons left">dashboard</i><b>Dashboard</b></a></li>
                    <li><a href="{{ url('materi') }}"><i class="material-icons left">book</i><b>Materi</b></a></li>
                
                </ul>
            @endif

            <ul class="navbar-list right">
                
                <li>
                    <a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);"
                        data-target="profile-dropdown">
                        <i class="material-icons left">account_circle</i>
                        <span style="font-weight: bold">{{ Auth::user()->name }}</span>
                    </a>
                </li>
                <li class="hide-on-med-and-down"><a class="waves-effect waves-block waves-light toggle-fullscreen"
                        href="javascript:void(0);"><i class="material-icons">settings_overscan</i></a></li>
            </ul>


            <!-- profile-dropdown-->
            <ul class="dropdown-content" id="profile-dropdown">
                <li><span class="grey-text text-darken-1 center">
                        @if (Auth::user()->role == 'admin')
                            <small>Role</small> <b>Administrator</b>
                        @else
                            <small>Role</small> <b>Tamu</b>
                        @endif
                    </span></li>
                <li class="divider"></li>
                <li><a class="grey-text text-darken-1" href="{{ route('profile.index') }}"><i
                            class="material-icons">person_outline</i> Profil</a></li>
                <li><a class="grey-text text-darken-1" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="material-icons">keyboard_tab</i> Keluar</a></li>
                <form action="
        {{ route('logout') }}" id="logout-form" method="post">
                    @csrf
                </form>
            </ul>
        </div>

    </nav>
</div>
