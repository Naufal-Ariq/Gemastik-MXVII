<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Back to Nature</title>
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js"></script>
</head>
<body class="h-full bg-gray-100 relative overflow-hidden">
  <div class="absolute inset-0 bg-cover bg-center opacity-85" style="background-image: url('{{ asset('bggarden.jpg') }}')"></div>

  <header class="absolute inset-x-0 top-0 z-50" x-data="{ isOpen: false }">
    <nav class="flex items-center justify-center lg:px-8 py-4" aria-label="Global">
      <div class="flex-1"></div>
      <div class="flex lg:hidden">
        <button @click="isOpen = !isOpen" type="button" class="inline-flex items-center justify-center rounded-md p-3 text-gray-700">
          <span class="sr-only">Open main menu</span>
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </button>
      </div>
      <div class="hidden items-center lg:flex lg:gap-x-12">
        <img class="w-40 h-40" src="{{ asset('LogoWeb.png') }}" alt="Company Logo">
      </div>
      <div class="hidden lg:flex lg:flex-1 lg:justify-end">
      </div>
    </nav>
    
    <!-- Mobile menu, show/hide based on menu open state. -->
    <div x-show="isOpen" @click.away="isOpen = false" class="lg:hidden fixed inset-0 z-50 bg-white overflow-y-auto px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10" role="dialog" aria-modal="true" x-cloak>
      <div class="flex items-start justify-between">
        <div class="-m-1.5 p-1.5">
          <img class="h-30 w-30" src="{{ asset('LogoWeb.png') }}" alt="Company Logo">
        </div>
        <button @click="isOpen = false" type="button" class="-m-2.5 rounded-md p-2.5 text-red-700">
          <span class="sr-only">Close menu</span>
          <svg class="h-8 w-10" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="mt-6 flow-root">
        <div class="-my-6 divide-y divide-gray-500/10">
          <div class="space-y-2 py-6">
            <a href="{{route('listTanaman')}}" class="block text-gray-700 hover:text-gray-900">List Tanaman</a>
          </div>
        </div>
      </div>
    </div>
  </header>

  <main class="relative z-10">
    <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56 text-center">
      <h1 class="text-4xl font-bold tracking-tight text-green-400 sm:text-6xl">Back To Nature</h1>
      <p class="mt-6 text-lg font-bold text-white">Cari macam-macam tumbuhan beserta habitatnya, dan mari mulai menanam bersama kami</p>
      <div class="mt-10 flex items-center justify-center gap-x-6">
        <a href="{{route('listTanaman')}}" class="rounded-md bg-green-500 px-28 py-4 text-sm font-semibold text-white hover:bg-green-400">Mulai Berkebun</a>
      </div>
    </div>
  </main>
</body>
</html>
