<!-- Top Bar -->
<header class="bg-white shadow-sm border-b border-gray-200">
    <div class="flex items-center justify-between px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex items-center space-x-4">
            <!-- Mobile Menu Button -->
            <button id="mobileMenuBtn" class="lg:hidden p-2 rounded-lg hover:bg-gray-100">
                <i class="fas fa-bars text-gray-600"></i>
            </button>

            <!-- Breadcrumb -->
            <nav class="hidden sm:flex" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li class="text-gray-400">/</li>
                    <li class="text-gray-700 font-medium">
                        {{ $breadcrumb ?? 'Dashboard' }}
                    </li>
                </ol>
            </nav>
        </div>

        <!-- Header Actions -->
        <div class="flex items-center space-x-4">
            <!-- Quick Actions -->
            <div class="hidden sm:flex items-center space-x-2">
                <a href="{{ route('admin.pengguna.create') }}"
                   class="px-3 py-2 bg-green-600 text-white text-sm rounded-lg hover:bg-green-700 transition-colors">
                    <i class="fas fa-plus mr-1"></i>
                    Pengguna Baru
                </a>
            </div>

            <!-- Notifications -->
            <div class="relative">
                <button class="p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg relative">
                    <i class="fas fa-bell"></i>
                    @if (($notificationCount ?? 0) > 0)
                        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                    @endif
                </button>
            </div>

            <!-- User Menu -->
            <div class="relative">
                <button class="flex items-center space-x-2 p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg">
                    <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                        <span class="text-white font-medium text-sm">
                            {{ strtoupper(substr(Auth::user()->full_name, 0, 1)) }}
                        </span>
                    </div>
                    <span class="hidden sm:block text-sm font-medium">{{ Auth::user()->full_name }}</span>
                    <i class="fas fa-chevron-down text-xs"></i>
                </button>
            </div>
        </div>
    </div>
</header>
