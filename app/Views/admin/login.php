<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Laporan Kampusku</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full space-y-8 p-8">
        <div class="text-center">
            <div class="mx-auto h-20 w-20 bg-blue-600 rounded-full flex items-center justify-center mb-4">
                <i class="fas fa-shield-alt text-white text-3xl"></i>
            </div>
            <h2 class="text-3xl font-bold text-gray-900">Admin Login</h2>
            <p class="mt-2 text-sm text-gray-600">Masuk ke Panel Administrator</p>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-8">
            <form id="adminLoginForm" class="space-y-6">
                <div>
                    <label for="login_identifier" class="block text-sm font-medium text-gray-700">
                        NPM atau Email
                    </label>
                    <div class="mt-1 relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <input id="login_identifier" name="login_identifier" type="text" required
                               class="pl-10 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Masukkan NPM atau Email">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        Password
                    </label>
                    <div class="mt-1 relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input id="password" name="password" type="password" required
                               class="pl-10 block w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Masukkan Password">
                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <i class="fas fa-eye text-gray-400"></i>
                        </button>
                    </div>
                </div>

                <input type="hidden" name="is_admin" value="1">

                <div>
                    <button type="submit" id="loginBtn"
                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <i class="fas fa-sign-in-alt"></i>
                        </span>
                        <span id="loginText">Masuk</span>
                        <span id="loginSpinner" class="hidden">
                            <i class="fas fa-spinner fa-spin"></i>
                        </span>
                    </button>
                </div>

                <div class="text-center">
                    <a href="<?= base_url('login') ?>" class="text-sm text-blue-600 hover:text-blue-500">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali ke Login User
                    </a>
                </div>
            </form>
        </div>

        <!-- Alert Container -->
        <div id="alertContainer" class="hidden fixed top-4 right-4 z-50 max-w-sm">
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded shadow-lg">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm" id="alertMessage"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('adminLoginForm');
            const loginBtn = document.getElementById('loginBtn');
            const loginText = document.getElementById('loginText');
            const loginSpinner = document.getElementById('loginSpinner');
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            const alertContainer = document.getElementById('alertContainer');
            const alertMessage = document.getElementById('alertMessage');

            // Toggle password visibility
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                const icon = this.querySelector('i');
                icon.classList.toggle('fa-eye');
                icon.classList.toggle('fa-eye-slash');
            });

            // Form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                // Show loading state
                loginBtn.disabled = true;
                loginText.classList.add('hidden');
                loginSpinner.classList.remove('hidden');

                const formData = new FormData(form);

                fetch('<?= base_url('login') ?>', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Redirect to admin dashboard
                        window.location.href = data.redirect || '<?= base_url('admin/dashboard') ?>';
                    } else {
                        // Show error message
                        showAlert(data.message);

                        // Reset button state
                        loginBtn.disabled = false;
                        loginText.classList.remove('hidden');
                        loginSpinner.classList.add('hidden');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showAlert('Terjadi kesalahan. Silakan coba lagi.');

                    // Reset button state
                    loginBtn.disabled = false;
                    loginText.classList.remove('hidden');
                    loginSpinner.classList.add('hidden');
                });
            });

            function showAlert(message) {
                alertMessage.textContent = message;
                alertContainer.classList.remove('hidden');

                // Auto hide after 5 seconds
                setTimeout(() => {
                    alertContainer.classList.add('hidden');
                }, 5000);
            }
        });
    </script>
</body>
</html>