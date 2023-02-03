<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard.index')}}"><i class="icon-speedometer"></i> {{ __('dashboard.dashboard') }}
                </a>
            </li>



            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>
                    {{ __('dashboard.categories') }}</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                             <a class="nav-link" href="{{ route('dashboard.category.create') }}"><i
                                    class="icon-user-follow"></i>{{ __('dashboard.add category') }}</a>
                         <a class="nav-link" href="{{ route('dashboard.category.index') }}"><i
                                class="icon-people"></i>
                            {{ __('dashboard.categories') }}</a>
                    </li>
                </ul>
            </li>


            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>
                    {{ __('dashboard.Products') }}</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.Products.create') }}"><i
                                class="icon-user-follow"></i>{{ __('dashboard.add Product') }}</a>
                        <a class="nav-link" href="{{ route('dashboard.Products.index') }}"><i
                                class="icon-people"></i>
                            {{ __('dashboard.Products') }}</a>
                    </li>
                </ul>
            </li>

            {{-- <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>
                    {{ __('dashboard.Packages') }}</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.Packages.create') }}"><i
                                class="icon-user-follow"></i>{{ __('dashboard.add Package') }}</a>
                        <a class="nav-link" href="{{ route('dashboard.Packages.index') }}"><i
                                class="icon-people"></i>
                            {{ __('dashboard.Packages') }}</a>
                    </li>
                </ul>
            </li> --}}


                 <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>
                        {{ __('dashboard.users') }}</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.users.create') }}"><i
                                    class="icon-user-follow"></i>{{ __('dashboard.add user') }}</a>
                            <a class="nav-link" href="{{ route('dashboard.users.index') }}"><i
                                    class="icon-people"></i>
                                {{ __('dashboard.users') }}</a>
                        </li>
                    </ul>
                </li>





                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.settings') }}"><i class="icon-people"></i>
                        {{ trans('dashboard.settings') }}</a>
                </li>
         </ul>
    </nav>
</div>
