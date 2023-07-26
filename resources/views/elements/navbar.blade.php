<nav class="bg-white bg-opacity-70 backdrop-blur-sm pl-6 pr-4 py-2.5 fixed w-[90%] sm:w-4/5 md:w-3/5 lg:w-1/2 z-20 top-10 left-0 right-0 mx-auto rounded-full border border-gray-200" id="main-navbar">
  <div class="container flex flex-wrap items-center justify-between mx-auto">
  <a href="/" class="flex items-center space-x-4">
    <img class="w-8" src="{{url('/assets/images/support_agent.svg')}}">
    <span class="text-sm font-semibold md:text-lg text-accent">i-Ticket</span>
  </a>
  <div class="flex space-x-2">
      <a href="/track" class="btn btn-sm sm:btn-md capitalize px-4 sm:px-6 {{ (request()->is('track*')) ? 'btn-accent rounded-full' : 'btn-ghost bg-base-200' }}">Track</a>
      <a href="/" class="btn btn-sm sm:btn-md capitalize px-4 sm:px-6 {{ (request()->is('/')) ? 'btn-accent rounded-full' : 'btn-ghost bg-base-200' }}">Form</a>
  </div>
  </div>
</nav>
