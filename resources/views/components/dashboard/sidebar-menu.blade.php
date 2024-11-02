@php
  function isMenuVisible($menu) {
      if (array_key_exists('module', $menu) && !empty($menu['module'])) {
          if (!Module::isModuleEnabled($menu['module'])) return false;
      }
      
      if (array_key_exists('can', $menu) && !empty($menu['can'])) {
          return auth()->user()->can($menu['can']);
      }

      return true;
  }

  function isSubmenuVisible($submenu) {
      return !array_key_exists('can', $submenu) || empty($submenu['can']) || auth()->user()->can($submenu['can']);
  }
@endphp

@foreach ($menus as $menu)
  @if (isMenuVisible($menu))
    @if (array_key_exists('menu-title', $menu))
      <li class="menu-title">
        <i class="ri-more-fill"></i>
        <span>{{ $menu['menu-title'] }}</span>
      </li>
    @else
      <li class="nav-item">
        @if (array_key_exists('submenu', $menu))
          @php
            $menuList = array_column($menu['submenu'], 'url');
            $isActive = in_array(\Request::path(), $menuList);
          @endphp

          <a class="nav-link menu-link @if ($isActive) collapsed active @endif"
             data-bs-toggle="collapse" role="button" aria-expanded="false" 
             aria-controls="{{ str()->slug($menu['text']) }}" 
             href="#{{ str()->slug($menu['text']) }}">
            <i class="{{ $menu['icon'] }}"></i><span data-key="t-customers">{{ $menu['text'] }}</span>
          </a>

          <div class="menu-dropdown @if ($isActive) show @endif collapse" 
               id="{{ str()->slug($menu['text']) }}">
            <ul class="nav nav-sm flex-column">
              @foreach ($menu['submenu'] as $subMenu)
                @if (isSubmenuVisible($subMenu))
                  <li class="nav-item">
                    <a href="{{ url($subMenu['url']) }}"
                       class="nav-link @if (\Request::is($subMenu['url']) || \Request::is($subMenu['url'] . '/*')) active @endif">
                      {{ $subMenu['text'] }}
                    </a>
                  </li>
                @endif
              @endforeach
            </ul>
          </div>
        @else
          <a href="{{ url($menu['url']) ?? '#' }}" 
             class="nav-link @if (\Request::is($menu['url']) || \Request::is($menu['url'] . '/*')) active @endif">
            <i class="{{ $menu['icon'] }}"></i><span data-key="t-customers">{{ $menu['text'] }}</span>
          </a>
        @endif
      </li>
    @endif
  @endif
@endforeach
