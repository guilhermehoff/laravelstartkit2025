<footer class="bg-white mt-10">
    <div class="mx-auto max-w-7xl overflow-hidden px-6 py-6 sm:py-6 lg:px-8">
      <nav class="-mb-6 columns-2 sm:flex sm:justify-center sm:space-x-12" aria-label="Footer">
        <div class="pb-6">
          <a href="{{ route('dashboard') }}" class="text-sm leading-6 text-gray-600 hover:text-gray-900">Home</a>
        </div>
        <div class="pb-6">
          <a href="{{ route('admin.settings') }}" class="text-sm leading-6 text-gray-600 hover:text-gray-900">Geral</a>
        </div>
        <div class="pb-6">
          <a href="{{ route('admin.user') }}" class="text-sm leading-6 text-gray-600 hover:text-gray-900">Usuários</a>
        </div>
      </nav>

      <p class="mt-10 text-center text-xs leading-5 text-gray-500">&copy; {{ date('Y') }} {{ $site->name }}, Todos os direitos reservados.</p>
    </div>
  </footer>
