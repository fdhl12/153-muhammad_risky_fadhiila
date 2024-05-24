<nav class="bg-white border-b"  x-data="{ isOpen: false}">
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
            <x-nav-link href="/" class="flex items-center space-x-4">
            <img class="h-12 w-auto" src="{{ asset('./images/logo1.png') }}" alt="Logo">
            <p class="text-xl text-orange-500">kestory</p>
            </x-nav-link>
          </div>
          <div class="hidden sm:ml-6 sm:block">
            <div class="flex space-x-4 ">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <x-nav-link href="/categories" :active="request()-> is('categories')">Category</x-nav-link>
                <x-nav-link href="/community" :active="request()-> is('community')">Community</x-nav-link>
                <x-nav-link href="/write" :active="request()-> is('write')">Write</x-nav-link>
            </div>
          </div>
          <!-- component -->
<!-- This is an example component -->
     <div class="hidden pt-2 relative mx-auto text-gray-600 xl:block">
        <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
          type="search" name="search" placeholder="Search">
        <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
          <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
            viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
            width="512px" height="512px">
            <path
              d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
          </svg>
        </button>
      </div>
        </div>
        <div class="absolute inset-y-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
          <!-- Profile dropdown -->
          <div class="relative ml-3">
            @if (Auth::check())
            <!-- Tampilkan navbar untuk pengguna yang sudah login -->
            <div class="hidden xl:block">
              
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <p class="text-xl text-orange-500">{{ $authUser->name }}</p>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            @else
            <!-- Tampilkan navbar untuk pengguna yang belum login -->
            {{-- <a class="{{request()->is('login') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium" href="{{ route('login') }}">Login</a> --}}
            <x-nav-link href="/login" :active="request()-> is('login')">Login</x-nav-link>
            <x-nav-link href="/register" :active="request()-> is('register')">Register</x-nav-link>
            @endif
        </div>
          @if (Auth::check())
            <div class="hidden sm:ml-6 sm:block">
              <button type="button" @click="isOpen = !isOpen" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="sr-only">Open user menu</span>
                <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            </button>
            <div x-show="isOpen" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                <x-nav-link href="#" class="block px-4 py-2 text-sm text-gray-700 hover:text-orange-500" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</x-nav-link>
                <x-nav-link href="#" class="block px-4 py-2 text-sm text-gray-700 hover:text-orange-500" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</x-nav-link>
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
      <div class="space-y-1 px-2 pb-3 pt-2">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <x-nav-link href="/categories" class="block px-4 py-2 text-xl text-gray-700 hover:text-orange-500">Category</x-nav-link>
        <x-nav-link href="/community" class="block px-4 py-2 text-xl text-gray-700 hover:text-orange-500">Community</x-nav-link>
        <x-nav-link href="/write" class="block px-4 py-2 text-xl text-gray-700 hover:text-orange-500">Write</x-nav-link>
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
      <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
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
          class="absolute left-0 mt-2 w-40 rounded-md bg-white shadow-md"
      >
          <a href="#" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
              New Task
          </a>

          <a href="#" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
              Edit Task
          </a>

          <a href="#" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
              <span class="text-red-600">Delete Task</span>
          </a>
      </div>
  </div>
</div>
          @endif
      </div>
    </div>
  </nav>