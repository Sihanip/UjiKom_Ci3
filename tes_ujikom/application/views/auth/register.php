<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="https://cdn-healthcare.hellohealthgroup.com/2022/07/1658823479_62dfa337a1dc22.95310852.jpg" />
    <title>SEHATIN - REGISTER</title>
    <link rel="stylesheet" href="<?= base_url('assets/tailwind') ?>/public/assets/css/tailwind.output.css" />
    <link href="<?= base_url('assets/tailwind') ?>/dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/tailwind') ?>/public/user/input.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="<?= base_url('assets/tailwind') ?>/public/assets/js/init-alpine.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>


<body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50">
        <div class="flex-1 h-full max-w-5xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class="object-cover w-full h-full" src="<?= base_url('assets/tailwind') ?>/public/assets/img/login-office.jpeg" alt="Office" />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h1 class="mb-4 text-xl font-semibold text-gray-700">
                            Create Account
                        </h1>
                        <form class="space-y-6 md:space-y-6" class="user" method="POST" action="" autocomplete="off">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                <div>
                                    <label for="nama" class="block my-2 text-sm font-medium text-gray-900">Username</label>
                                    <input type="text" name="nama" id="nama" value="<?= set_value('nama');  ?>" class=" bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-pink-500 focus:border-purple-500 block w-full p-2.5" placeholder="Kaosan" required>
                                </div>

                                <div>
                                    <label for="email" class="block my-2 text-sm font-medium text-gray-900">Email</label>
                                    <input type="email" name="email" id="email" value="<?= set_value('email');  ?>" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-pink-500 focus:border-purple-500 block w-full p-2.5" placeholder="name@company.com" required autocomplete="off">
                                </div>
                                
                                <div>
                                    <label for="password1" class="block my-2 text-sm font-medium text-gray-900">Password</label>
                                    <input type="password" name="password1" id="password1" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-pink-500 focus:border-purple-500 block w-full p-2.5" required>
                                </div>

                                <div>
                                    <label for="password2" class="block my-2 text-sm font-medium text-gray-900">Konfirmasi Password</label>
                                    <input type="password" name="password2" id="password2" name="password2" autocomplete="off" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-pink-500 focus:border-purple-500 block w-full p-2.5" required>
                                </div>

                                <div class="relative max-w-sm">
                                    <div class="absolute inset-y-14 left-0 flex items-center pl-3.5 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <label for="tanggal" class="block my-2 text-sm font-medium text-gray-900">Tanggal Lahir</label>
                                    <input datepicker datepicker-autohide type="text" name="tanggal" id="tanggal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-pink-500 focus:border-purple-500 block w-full pl-10 p-2.5" placeholder="Select date" autocomplete="off" require>
                                </div>

                                <div>
                                    <label for="alamat" class="block my-2 text-sm font-medium text-gray-900">Alamat</label>
                                    <input type="text" name="alamat" id="alamat" placeholder="Jl. In Aja Dulu" value="<?= set_value('alamat');  ?>" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-pink-500 focus:border-purple-500 block w-full p-2.5" autocomplete="off" required>
                                </div>

                                <div>
                                    <label for="kabupaten" class="block my-2 text-sm font-medium text-gray-900">Kota/Kabupaten</label>
                                    <input type="text" name="kabupaten" id="kabupaten" value="<?= set_value('kabupaten');  ?>"  placeholder="Kota Kenangan" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-pink-500 focus:border-purple-500 block w-full p-2.5" autocomplete="off" required>
                                </div>

                                <div class="mt-4 text-sm">
                                    <span class="text-gray-700">
                                        Jenis Kelamin
                                    </span>
                                    <div class="mt-2 flex">
                                        <label class="inline-flex items-center text-gray-600">
                                            <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple" name="accountType" value="Laki" />
                                            <span class="ml-2">Laki-laki</span>
                                        </label>
                                        <label class="inline-flex items-center ml-6 text-gray-600">
                                            <input type="radio" class="text-gray-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple" name="accountType" value="Perempuan" />
                                            <span class="ml-2">Perempuan</span>
                                        </label>
                                    </div>
                                </div>

                                <div>
                                    <label for="notelp" class="block my-2 text-sm font-medium text-gray-900">No. Telp</label>
                                    <input type="number" name="notelp" id="notelp" autocomplete="off" value="<?= set_value('notelp');  ?>" placeholder="0812345678" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-pink-500 focus:border-purple-500 block w-full p-2.5" required>
                                </div>

                                <div>
                                    <label for="paypal" class="block my-2 text-sm font-medium text-gray-900">Paypal</label>
                                    <input type="number" name="paypal" id="paypal" autocomplete="off" value="<?= set_value('paypal');  ?>" placeholder="564312" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-pink-500 focus:border-purple-500 block w-full p-2.5" required>
                                </div>

                            </div>
                            <button type="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Register
                            </button>
                        </form>

                        <hr class="my-8" />

                        <p class="mt-4">
                            <a class="text-sm font-medium text-purple-600 hover:underline" href="<?= base_url('auth'); ?>">
                                Sudah punya Akun? Login
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/datepicker.min.js"></script>

</body>

</html>