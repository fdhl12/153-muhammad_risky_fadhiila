<nav class="bg-white border-b fixed top-0 w-full z-10"   x-data="{ isOpen: false}">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 ">
      <div class="relative flex h-16 justify-between">
        <div class="absolute inset-y-0 right-0 flex items-center sm:hidden ">
          <!-- Mobile menu button-->
          <button type="button" type="button" @click="isOpen = !isOpen"
           class="relative inline-flex items-center justify-center rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!--
              Icon when menu is closed.
  
              Menu open: "hidden", Menu closed: "block"
            -->
            <svg :class="{'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!--
              Icon when menu is open.
  
              Menu open: "block", Menu closed: "hidden"
            -->
            <svg :class="{'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
          <div class="flex flex-shrink-0">
            @auth
                @if(Auth::user()->role === 'admin')
            <x-nav-link href="/home" class="flex items-center space-x-4">
            <img class="h-12 w-auto" src="{{ asset('./images/logo1.png') }}" alt="Logo">
            <p class="text-xl text-orange-500">kestory</p>
            </x-nav-link>
                @elseif(Auth::user()->role === 'user')
            <x-nav-link href="/home" class="flex items-center space-x-4">
              <img class="h-12 w-auto" src="{{ asset('images/logo1.png') }}" alt="Logo">
              <p class="text-xl text-orange-500">kestory</p>
              </x-nav-link>
              @endauth
                @else 
              <x-nav-link href="/" class="flex items-center space-x-4">
                <img class="h-12 w-auto" src="{{ asset('./images/logo1.png') }}" alt="Logo">
                <p class="text-xl text-orange-500">kestory</p>
              </x-nav-link>
              @endif
              

          </div>
          <div class="hidden sm:ml-6 sm:block">
           


            @auth
                @if(Auth::user()->role === 'admin')
                <div class="flex space-x-4 ">
                    <x-nav-link href="{{ route('admin.dashboard') }}" :active="request()-> is('admin')">Admin Dashboard</x-nav-link>
                </div>
            @else
            <div class="flex space-x-4 ">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                  <x-nav-link href="/categories" :active="request()-> is('categories')">Category</x-nav-link>
                  <x-nav-link href="{{ route('contents.mystories') }}" :active="request()-> is('mystories')">My Story</x-nav-link>
                  <x-nav-link href="{{ route('contents.create') }}" :active="request()-> is('write')">Write</x-nav-link>
              </div>
              @endif
            @endauth
            
          </div>
          <!-- component -->
<!-- This is an example component -->
<div class="hidden pt-2 relative mx-auto text-gray-600 xl:block">
  
</div>
        </div>
        <div class="hidden sm:ml-6 sm:block">
          <!-- Profile dropdown -->
          <div class="flex space-x-4 relative ml-3">
            @if (Auth::check())
            <!-- Tampilkan navbar untuk pengguna yang sudah login -->
            
            @else
            <!-- Tampilkan navbar untuk pengguna yang belum login -->
            {{-- <a class="{{request()->is('login') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" href="{{ route('login') }}">Login</a> --}}
            <x-nav-link href="/login" :active="request()-> is('login')">Login</x-nav-link>
            <x-nav-link href="/register" :active="request()-> is('register')">Register</x-nav-link>
            @endif
          </div>
        </div>
          @if (Auth::check())
            <div class="hidden sm:ml-6 sm:block">
              <div
      x-data="{
          open: false,
          toggle() {
              if (this.open) {
                  return this.close()
              }

              this.$refs.button.focus()

              this.open = true
          },
          close(focusAfter) {
              if (! this.open) return

              this.open = false

              focusAfter && focusAfter.focus()
          }
      }"
      x-on:keydown.escape.prevent.stop="close($refs.button)"
      x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
      x-id="['dropdown-button']"
      class="relative"
  >
      <!-- Button -->
      <button
          x-ref="button"
          x-on:click="toggle()"
          :aria-expanded="open"
          :aria-controls="$id('dropdown-button')"
          type="button"
          class="flex items-center gap-2 bg-white px-5 py-2.5"
      >
      <img class="h-8 w-8 rounded-full" src="{{ $authUser->photo_profile ? asset('storage/' . $authUser->photo_profile) : 'https://randomuser.me/api/portraits/women/21.jpg' }}" alt="">

      {{ Str::limit($authUser->name, 10) }}
          <!-- Heroicon: chevron-down -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
      </button>
      <!-- Panel -->
      <div
          x-ref="panel"
          x-show="open"
          x-transition.origin.top.left
          x-on:click.outside="close($refs.button)"
          :id="$id('dropdown-button')"
          style="display: none;"
          class="absolute left-0 mt-2 w-40 rounded-md bg-white shadow-md"
      >
      <x-nav-link href="{{ route('profile.show', ['username' => Auth::user()->username]) }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-orange-500" role="menuitem" tabindex="-1" id="user-menu-item-0">My Profile</x-nav-link>

      <x-nav-link href="{{ route('settings', ['username' => Auth::user()->username]) }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-orange-500" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</x-nav-link>

      <x-nav-link href="/logout" class="block px-4 py-2 text-sm text-gray-700 hover:text-orange-500" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" role="menuitem" tabindex="-1" id="user-menu-item-2">Logout</x-nav-link>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
      </div>
  </div>
          @endif
        </div>
      </div>
    </div>
  
    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="isOpen" class="sm:hidden" id="mobile-menu">
        
      <div class=" space-y-1 px-2 pb-3 pt-2">
        @if ($authUser)
        <div class="flex justify-center">
          <div
              x-data="{
                  open: false,
                  toggle() {
                      if (this.open) {
                          return this.close()
                      }
        
                      this.$refs.button.focus()
        
                      this.open = true
                  },
                  close(focusAfter) {
                      if (! this.open) return
        
                      this.open = false
        
                      focusAfter && focusAfter.focus()
                  }
              }"
              x-on:keydown.escape.prevent.stop="close($refs.button)"
              x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
              x-id="['dropdown-button']"
              class="relative w-full"
          >
              <!-- Button -->
              <button
                  x-ref="button"
                  x-on:click="toggle()"
                  :aria-expanded="open"
                  :aria-controls="$id('dropdown-button')"
                  type="button"
                  class="flex items-center gap-2 bg-white px-5 py-2.5 w-full justify-center"
              >
              <img class="h-8 w-8 rounded-full" src="{{ $authUser->photo_profile ? asset('storage/' . $authUser->photo_profile) : 'https://randomuser.me/api/portraits/women/21.jpg' }}" alt="">
        
              {{ $authUser->name }}
                  <!-- Heroicon: chevron-down -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
              </button>
        
              <!-- Panel -->
              <div
                  x-ref="panel"
                  x-show="open"
                  x-transition.origin.top.left
                  x-on:click.outside="close($refs.button)"
                  :id="$id('dropdown-button')"
                  style="display: none;"
                  class="absolute left-0 mt-2 w-full rounded-md bg-white shadow-md"
              >
              <x-nav-link href="{{ route('profile.show', ['username' => Auth::user()->username]) }}" 
                class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500" role="menuitem" tabindex="-1" id="user-menu-item-0">
                My Profile
              </x-nav-link>
        
              <x-nav-link href="{{ route('settings', ['username' => Auth::user()->username]) }}" 
                class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500" role="menuitem" tabindex="-1" id="user-menu-item-1">
                Settings
              </x-nav-link>
        
              </div>
              @endif
        
            @auth
                @if(Auth::user()->role === 'admin')
                    <x-nav-link href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-xl text-gray-700 hover:text-orange-500">Admin Dashboard</x-nav-link>
                    <x-nav-link href="/logout" class="block px-4 py-2 text-xl text-gray-700 hover:text-orange-500" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" role="menuitem" tabindex="-1" id="user-menu-item-2">Logout</x-nav-link>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
                
            @else
            
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                  <x-nav-link href="/categories" class="block px-4 py-2 text-xl text-gray-700 hover:text-orange-500">Category</x-nav-link>
                  <x-nav-link href="{{ route('contents.mystories') }}" class="block px-4 py-2 text-xl text-gray-700 hover:text-orange-500">My Story</x-nav-link>
                  <x-nav-link href="/write" class="block px-4 py-2 text-xl text-gray-700 hover:text-orange-500">Write</x-nav-link>
                  <x-nav-link href="/logout" class="block px-4 py-2 text-xl text-gray-700 hover:text-orange-500" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" role="menuitem" tabindex="-1" id="user-menu-item-2">Logout</x-nav-link>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              @endif
            @endauth
          </div>
          
  <div class="relative ml-3">

    @if (Auth::check())
    <!-- Tampilkan navbar untuk pengguna yang sudah login -->
    
    @else
    <!-- Tampilkan navbar untuk pengguna yang belum login -->
    {{-- <a class="{{request()->is('login') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" href="{{ route('login') }}">Login</a> --}}
    <x-nav-link href="/login" class="block px-4 py-2 text-xl text-gray-700 hover:text-orange-500">Login</x-nav-link>
    <x-nav-link href="/register" class="block px-4 py-2 text-xl text-gray-700 hover:text-orange-500">Register</x-nav-link>
    @endif
  </div>
</div>
      </div>
    </div>
  </nav>