<nav x-data="{ open: false }" class="bg-white/90 shadow-sm">
    <div class="max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center gap-3">
            <div class="flex items-center gap-4">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                    <div class="flex items-center justify-center bg-transparent">
                        @if (file_exists(public_path('build/images/logo-cotecnova.png')))
                            <img src="{{ asset('build/images/logo-cotecnova.png') }}" alt="COTECNOVA" class="h-8 w-auto max-w-[120px] object-contain" />
                        @else
                            <span class="text-sm font-black text-[#14532d]">C</span>
                        @endif
                    </div>
                </a>

                <div class="hidden md:flex items-center gap-2 bg-[#f0fdf4] rounded-full p-1 border border-[#dcfce7]">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 rounded-full px-3 py-2 text-sm font-semibold text-[#14532d] bg-white shadow-sm"><i class="fa-solid fa-gauge-high"></i> Dashboard</a>
                    <a href="#" class="inline-flex items-center gap-2 rounded-full px-3 py-2 text-sm font-medium text-slate-600 hover:text-[#14532d]"><i class="fa-solid fa-book-open-reader"></i> Libros</a>
                    <a href="#" class="inline-flex items-center gap-2 rounded-full px-3 py-2 text-sm font-medium text-slate-600 hover:text-[#14532d]"><i class="fa-solid fa-hand-holding-hand"></i> Préstamos</a>
                    <a href="#" class="inline-flex items-center gap-2 rounded-full px-3 py-2 text-sm font-medium text-slate-600 hover:text-[#14532d]"><i class="fa-solid fa-chart-column"></i> Reportes</a>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <div class="relative block" x-data="{ openUser: false }" @click.outside="openUser = false">
                    <button type="button" @click="openUser = !openUser" class="flex items-center gap-3 rounded-full border border-[#dcfce7] bg-[#f0fdf4] px-2 py-1.5 text-left shadow-sm hover:bg-[#ecfdf5] focus:outline-none">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-[#14532d] text-xs font-bold text-white">{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</span>
                        <div class="leading-tight">
                            <div class="text-sm font-semibold text-[#14532d]">{{ Auth::user()->name }}</div>
                            <div class="text-[10px] uppercase tracking-[0.18em] text-slate-500">Usuario</div>
                        </div>
                        <i class="fa-solid fa-chevron-down text-[10px] text-[#14532d]"></i>
                    </button>

                    <div x-show="openUser" x-transition class="absolute right-0 z-50 mt-2 w-56 rounded-xl border border-slate-200 bg-white p-2 shadow-xl" style="display:none;">
                        <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 rounded-lg px-3 py-2 text-sm font-medium text-slate-700 hover:bg-green-50 hover:text-[#14532d]">
                            <i class="fa-solid fa-user"></i> Perfil
                        </a>
                        <a href="#" class="flex items-center gap-2 rounded-lg px-3 py-2 text-sm font-medium text-slate-700 hover:bg-green-50 hover:text-[#14532d]">
                            <i class="fa-solid fa-gear"></i> Configuración
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="mt-1">
                            @csrf
                            <button type="submit" class="flex w-full items-center gap-2 rounded-lg px-3 py-2 text-sm font-medium text-slate-700 hover:bg-red-50 hover:text-red-600">
                                <i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión
                            </button>
                        </form>
                    </div>
                </div>

                <button @click="open = ! open" class="inline-flex items-center justify-center rounded-full border border-green-200 bg-white p-2 text-[#14532d] shadow-sm sm:hidden">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden border-t border-green-100 bg-white sm:hidden">
        <div class="max-w-[1500px] mx-auto px-4 py-3 space-y-2">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2 rounded-lg px-3 py-2 text-sm font-medium text-[#14532d] bg-green-50"><i class="fa-solid fa-gauge-high"></i> Dashboard</a>
            <a href="#" class="flex items-center gap-2 rounded-lg px-3 py-2 text-sm font-medium text-slate-700"><i class="fa-solid fa-book-open-reader"></i> Libros</a>
            <a href="#" class="flex items-center gap-2 rounded-lg px-3 py-2 text-sm font-medium text-slate-700"><i class="fa-solid fa-hand-holding-hand"></i> Préstamos</a>
            <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 rounded-lg px-3 py-2 text-sm font-medium text-slate-700"><i class="fa-solid fa-user"></i> Perfil</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex w-full items-center gap-2 rounded-lg px-3 py-2 text-sm font-medium text-slate-700"><i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión</button>
            </form>
        </div>
    </div>
</nav>
