<nav class="bg-white bg-opacity-70 backdrop-blur-sm px-6 py-2.5 fixed w-1/2 z-20 top-10 left-0 right-0 mx-auto rounded-full border border-gray-200" id="main-navbar">
  <div class="container flex flex-wrap items-center justify-between mx-auto">
  <a href="/" class="flex items-center space-x-4">
    <img src="{{url('/assets/images/support_agent.svg')}}">
    <span class="text-lg font-semibold text-accent">i-Ticket</span>
  </a>
  <div class="flex space-x-2">
      <a href="/track" class="btn capitalize px-6 {{ (request()->is('track*')) ? 'btn-accent rounded-full' : 'btn-ghost bg-base-200' }}">Track</a>
      <a href="/" class="btn capitalize px-6 {{ (request()->is('/')) ? 'btn-accent rounded-full' : 'btn-ghost bg-base-200' }}">Form</a>
  </div>
  </div>
</nav>
