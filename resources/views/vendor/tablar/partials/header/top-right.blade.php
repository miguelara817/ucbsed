<div class="nav-item dropdown">
    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
       aria-label="Open user menu">
                        {{-- <span class="avatar avatar-sm"
                              style="background-image: url({{asset('assets/avatars/000m.jpg')}})"></span> --}}
        <div class="d-none d-xl-block ps-2">
            <div class="p-1">{{Auth()->user()->name}} {{Auth()->user()->apellido}}</div>
            {{-- <div>{{Auth()->user()->role}}</div> --}}
            @if (empty(Auth()->user()->cargo->cargo))
                <div></div>
            @else
                <div class="p-1">{{Auth()->user()->cargo->cargo}}</div>
            @endif
            
            {{-- <div><strong>Contrato:</strong> {{Auth()->user()->contrato->tipo_contrato}}</div> --}}
            {{-- <div class="mt-1 small text-muted">Software Engineer</div> --}}
        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

        @php( $logout_url = View::getSection('logout_url') ?? config('tablar.logout_url', 'logout') )
        @php( $profile_url = View::getSection('profile_url') ?? config('tablar.profile_url', 'logout') )
        @php( $setting_url = View::getSection('setting_url') ?? config('tablar.setting_url', 'home') )

        @if (config('tablar.use_route_url', true))
            @php( $profile_url = $profile_url ? route($profile_url) : '' )
            @php( $logout_url = $logout_url ? route($logout_url) : '' )
            @php( $setting_url = $setting_url ? route($setting_url) : '' )
        @else
            @php( $profile_url = $profile_url ? url($profile_url) : '' )
            @php( $logout_url = $logout_url ? url($logout_url) : '' )
            @php( $setting_url = $setting_url ? url($setting_url) : '' )
        @endif

        {{-- <a href="#" class="dropdown-item">Estado</a> --}}
        {{-- <a href="{{$profile_url}}" class="dropdown-item">Perfil</a> --}}

        {{-- <a href="#" class="dropdown-item">Feedback</a> --}}
        
        {{-- <div class="dropdown-divider"></div> --}}
        {{-- <a href="{{$setting_url}}" class="dropdown-item">Configuración</a> --}}
        <a class="dropdown-item"
           href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-fw fa-power-off text-red"></i>
            {{-- {{ __('tablar::tablar.log_out') }} --}}
            {{ __('Cerrar sesión') }}
        </a>

        <form id="logout-form" action="{{ $logout_url }}" method="POST" style="display: none;">
            @if(config('tablar.logout_method'))
                {{ method_field(config('tablar.logout_method')) }}
            @endif
            {{ csrf_field() }}
        </form>

    </div>
</div>
