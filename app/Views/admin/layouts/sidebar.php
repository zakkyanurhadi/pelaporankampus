<!-- Sidebar -->
<aside id="sidebar" class="fixed left-0 top-0 h-full w-64 bg-gradient-to-b from-gray-900 to-gray-800 text-white z-50 sidebar-transition sidebar-mobile lg:translate-x-0 flex flex-col">
    <!-- Sidebar Header -->
    <div class="p-6 border-b border-gray-700">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                <i class="fas fa-shield-alt text-white"></i>
            </div>
            <div>
                <h1 class="text-xl font-bold">Admin Panel</h1>
                <p class="text-xs text-gray-400">Laporan Kampusku</p>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto p-4">
        <ul class="space-y-2">
            <!-- Dashboard -->
            <li>
                <a href="<?= base_url('admin/dashboard') ?>"
                   class="sidebar-item flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white <?= (url_is('admin/dashboard*')) ? 'sidebar-active bg-gray-700 text-white' : '' ?>">
                    <i class="fas fa-tachometer-alt text-lg"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- User Management -->
            <li>
                <div class="sidebar-item px-4 py-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                    Manajemen Pengguna
                </div>
                <a href="<?= base_url('admin/pengguna') ?>"
                   class="sidebar-item flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white <?= (url_is('admin/pengguna*')) ? 'sidebar-active bg-gray-700 text-white' : '' ?>">
                    <i class="fas fa-users text-lg"></i>
                    <span>Semua Pengguna</span>
                </a>
                <a href="<?= base_url('admin/pengguna/create') ?>"
                   class="sidebar-item flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white <?= (url_is('admin/pengguna/create*')) ? 'sidebar-active bg-gray-700 text-white' : '' ?>">
                    <i class="fas fa-user-plus text-lg"></i>
                    <span>Tambah Pengguna</span>
                </a>
            </li>

            <!-- Report Management -->
            <li>
                <div class="sidebar-item px-4 py-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                    Manajemen Laporan
                </div>
                <a href="<?= base_url('admin/laporan') ?>"
                   class="sidebar-item flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white <?= (url_is('admin/laporan*')) ? 'sidebar-active bg-gray-700 text-white' : '' ?>">
                    <i class="fas fa-clipboard-list text-lg"></i>
                    <span>Semua Laporan</span>
                </a>
                <a href="<?= base_url('admin/laporan/create') ?>"
                   class="sidebar-item flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white <?= (url_is('admin/laporan/create*')) ? 'sidebar-active bg-gray-700 text-white' : '' ?>">
                    <i class="fas fa-plus-circle text-lg"></i>
                    <span>Laporan Baru</span>
                </a>
            </li>

            <!-- Analytics -->
            <li>
                <div class="sidebar-item px-4 py-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                    Analitik
                </div>
                <a href="<?= base_url('admin/statistik') ?>"
                   class="sidebar-item flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white <?= (url_is('admin/statistik*')) ? 'sidebar-active bg-gray-700 text-white' : '' ?>">
                    <i class="fas fa-chart-bar text-lg"></i>
                    <span>Statistik</span>
                </a>
                <a href="<?= base_url('admin/laporan/kategori') ?>"
                   class="sidebar-item flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white <?= (url_is('admin/laporan/kategori*')) ? 'sidebar-active bg-gray-700 text-white' : '' ?>">
                    <i class="fas fa-chart-pie text-lg"></i>
                    <span>Laporan Kategori</span>
                </a>
            </li>

            <!-- System -->
            <li>
                <div class="sidebar-item px-4 py-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                    Sistem
                </div>
                <a href="<?= base_url('admin/pengaturan') ?>"
                   class="sidebar-item flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white <?= (url_is('admin/pengaturan*')) ? 'sidebar-active bg-gray-700 text-white' : '' ?>">
                    <i class="fas fa-cog text-lg"></i>
                    <span>Pengaturan</span>
                </a>
                <a href="<?= base_url('admin/aktivitas') ?>"
                   class="sidebar-item flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white <?= (url_is('admin/aktivitas*')) ? 'sidebar-active bg-gray-700 text-white' : '' ?>">
                    <i class="fas fa-history text-lg"></i>
                    <span>Aktivitas Log</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- User Profile -->
    <div class="p-4 border-t border-gray-700 flex-shrink-0">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-gray-600 rounded-full flex items-center justify-center">
                <span class="text-white font-medium text-sm">
                    <?= strtoupper(substr(session('nama'), 0, 1)) ?>
                </span>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium truncate"><?= session('nama') ?></p>
                <p class="text-xs text-gray-400">Administrator</p>
            </div>
            <form method="post" action="<?= base_url('logout') ?>" class="inline">
                <button type="submit"
                        class="text-gray-400 hover:text-white transition-colors p-1 rounded hover:bg-gray-700"
                        title="Keluar">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </form>
        </div>
    </div>
</aside>
