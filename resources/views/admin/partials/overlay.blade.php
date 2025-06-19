<!-- Overlay for mobile when sidebar is open -->
<div
  @click="sidebarToggle = false"
  :class="sidebarToggle ? 'block lg:hidden' : 'hidden'"
  class="fixed inset-0 z-40 bg-gray-900/50"
></div>
