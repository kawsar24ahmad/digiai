<aside
  :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full'"
  class="sidebar fixed left-0 top-0 z-[9999] flex h-screen w-[290px] flex-col overflow-y-hidden border-r border-gray-200 bg-white px-5 dark:border-gray-800 dark:bg-black lg:static lg:translate-x-0 transition-all duration-300"
>
  <!-- Logo Section -->
  <div
    :class="sidebarToggle ? 'justify-center' : 'justify-center'"
    class="flex items-center gap-2 pt-8 pb-7"
  >
    <a href="{{ url('/') }}" class="flex items-center ">
      <div class="text-2xl font-bold flex items-center gap-2">
    <span class="text-green-500"><i class="fa-solid fa-robot"></i></span>

    <span x-show="!sidebarToggle" x-transition
          class="text-gray-800 dark:text-white">
        Digi AI
    </span>
</div>


    </a>
  </div>

  <!-- Navigation -->
  <div class="flex flex-col overflow-y-auto no-scrollbar duration-300 ease-linear">
    <nav x-data="{ selected: $persist('Dashboard') }">
      <div>
        <h3 class="mb-4 text-xs uppercase text-gray-400 tracking-wide">
          <span :class="sidebarToggle ? 'lg:hidden' : ''">Menu</span>
          <svg
            :class="sidebarToggle ? 'lg:block hidden' : 'hidden'"
            class="mx-auto fill-current"
            width="24"
            height="24"
            viewBox="0 0 24 24"
          >
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M5.999 10.245a1.75 1.75 0 1 1 0 3.51 1.75 1.75 0 0 1 0-3.51zm12 0a1.75 1.75 0 1 1 0 3.51 1.75 1.75 0 0 1 0-3.51zM11.999 10.245a1.75 1.75 0 1 1 0 3.51 1.75 1.75 0 0 1 0-3.51z"
            />
          </svg>
        </h3>

        <ul class="flex flex-col gap-4 mb-6">
          <!-- Dashboard with submenu -->
          <li>
            <a
              href="#"
              @click.prevent="selected = selected === 'Dashboard' ? '' : 'Dashboard'"
              :class="[
                'group flex items-center justify-between rounded-md px-4 py-2 transition-colors duration-200',
                selected === 'Dashboard' || '{{ request()->is("ecommerce") ? "Dashboard" : "" }}' === 'Dashboard'
                  ? 'bg-blue-100 text-blue-600 dark:bg-blue-700 dark:text-white font-semibold'
                  : 'text-black dark:text-white hover:text-blue-600 dark:hover:text-blue-400'
              ]"
            >
              <div class="flex items-center gap-2">
                <i
                  class="fa-solid fa-gauge-high text-base"
                  :class="[
                    selected === 'Dashboard' || '{{ request()->is("ecommerce") ? "Dashboard" : "" }}' === 'Dashboard'
                      ? 'text-blue-600 dark:text-white'
                      : 'text-black dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400'
                  ]"
                ></i>
                <span :class="sidebarToggle ? 'lg:hidden' : ''">Dashboard</span>
              </div>
              <i
                class="fa-solid fa-chevron-down text-sm transition-transform"
                :class="[
                  selected === 'Dashboard' ? 'rotate-180' : '',
                  sidebarToggle ? 'lg:hidden' : ''
                ]"
              ></i>
            </a>

            <div :class="selected === 'Dashboard' ? 'block' : 'hidden'" class="pl-9 mt-2">
              <ul :class="sidebarToggle ? 'lg:hidden' : ''" class="flex flex-col gap-1">
                <li>
                  <a
                    href="{{ url('/ecommerce') }}"
                    class="block rounded-md px-3 py-1 text-sm transition
                      hover:text-blue-600 dark:hover:text-blue-400
                      {{ Request::is('ecommerce') ? 'text-blue-600 dark:text-white font-semibold' : 'text-black dark:text-white' }}"
                  >
                    eCommerce
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <!-- Home -->
          <li>
            <a
              href="{{ url('/') }}"
              class="group flex items-center justify-between rounded-md px-4 py-2 transition-colors duration-200
                {{ Request::is('/')
                  ? 'bg-blue-100 text-blue-600 dark:bg-blue-700 dark:text-white font-semibold'
                  : 'text-black dark:text-white hover:text-blue-600 dark:hover:text-blue-400' }}"
            >
              <div class="flex items-center gap-2">
                <i
                  class="fa-solid fa-house text-base
                    {{ Request::is('/')
                      ? 'text-blue-600 dark:text-white'
                      : 'text-black dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400' }}"
                ></i>
                <span :class="sidebarToggle ? 'lg:hidden' : ''">Home</span>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</aside>
