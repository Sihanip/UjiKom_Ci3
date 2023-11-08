<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <link rel="icon" href="https://cdn-healthcare.hellohealthgroup.com/2022/07/1658823479_62dfa337a1dc22.95310852.jpg" />
    <title>SEHATIN</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/tailwind') ?>/dist/output.css">
    <link rel="stylesheet" href="<?= base_url('assets/tailwind') ?>/public/user/input.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3A8EF6',
                        secondary: '#6C87AE',
                        banner: '#E2EDFF',
                    }
                }
            }
        }
    </script>

    <style>
        swiper-container {
            width: 100%;
            height: 100%;
        }

        swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        swiper-slide img {
            display: block;
            width: 80%;
            height: 80%;
            object-fit: cover;
            margin-bottom: 30px;
        }
    </style>

</head>

<body>

    <header>
        <nav class="bg-white fixed w-full z-20 top-0 left-0 border-b border-gray-200">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between sm:p-4 py-2 mx-auto px-3">
                <a href="<?= base_url('dashboard') ?>" class="flex items-center sm:w-auto">
                    <img src="https://cdn-healthcare.hellohealthgroup.com/2022/07/1658823479_62dfa337a1dc22.95310852.jpg" class="h-8 mr-2" alt="Logo" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap hidden sm:block text-primary">SEHATIN</span>
                </a>
                <div class="flex items-center md:order-2">
                    <?php if ($this->session->userdata('email') == null) { ?>
                        <a onclick=buka() href="<?= base_url('auth') ?>" type="button" class="text-primary sm:text-white sm:bg-primary sm:px-4 sm:py-1.5 sm:opacity-70 font-medium rounded-lg sm:hover:opacity-100 ">
                            <i class="fa-solid fa-arrow-right-to-bracket mr-2"></i>
                            <span>Login</span>
                        </a>
                    <?php } else { ?>

                        <div class="mr-3">

                            <button id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification" type="button" class="relative inline-flex items-center text-xl font-medium text-center mx-1">
                                <i class="fa-regular fa-bell text-lg cursor-pointer text-primary"></i>
                                <div class="absolute inline-flex items-center justify-center w-4 h-4 text-[8px] font-bold bg-gray-100 border border-primary rounded-full -top-1 -right-2 text-primary"><?= count($notif_terbeli) ?></div>
                            </button>

                            <!-- Dropdown menu -->
                            <div id="dropdownNotification" class="z-20 hidden w-full max-w-sm bg-white shadow-xl divide-y divide-gray-100 rounded-lg shadow" aria-labelledby="dropdownNotificationButton">
                                <div class="block px-4 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-50">
                                    Notifications
                                </div>
                                <div class="divide-y divide-gray-400">
                                    <?php foreach ($notif_terbeli as $pr) : ?>
                                        <div class="flex px-4 py-3 hover:bg-gray-100">
                                            <div class="w-full pl-3">
                                                <div class="text-gray-500 text-sm mb-1.5 ">Pesanan anda telah diterima oleh Seller</div>
                                                <div class="text-xs text-blue-600">a few moments ago</div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <a href="#" class="block py-2 text-sm font-medium text-center text-gray-900 rounded-b-lg bg-gray-50 hover:bg-gray-100">
                                    <div class="inline-flex items-center ">
                                        <svg class="w-4 h-4 mr-2 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                                            <path d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                                        </svg>
                                        View all
                                    </div>
                                </a>
                            </div>

                            <button type="button" class="relative inline-flex items-center text-xl font-medium text-center sm:mx-4 ml-1.5">
                                <a href="<?= base_url('dashboard/keranjang') ?>" class="fa-solid fa-cart-plus text-lg cursor-pointer text-primary"></a>
                                <div class="absolute inline-flex items-center justify-center w-4 h-4 text-[8px] font-bold bg-gray-100 border border-primary rounded-full -top-1 -right-2 text-primary"><?= $this->cart->total_items() ?></div>
                            </button>
                        </div>

                        <button type="button" class="flex mr-2 text-sm rounded-full md:mr-0" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                            <span class="sr-only">Open user menu</span>
                            <i class="fa-regular fa-user text-lg cursor-pointer text-primary"></i>
                        </button>

                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow" id="user-dropdown">
                            <div class="px-4 py-3">
                                <span class="block text-sm text-gray-900"><?= $user['nama']; ?></span>
                                <span class="block text-sm  text-gray-500 truncate"><?= $user['email']; ?></span>
                            </div>
                            <ul class="py-2" aria-labelledby="user-menu-button">
                                <li>
                                    <a href="<?= base_url('dashboard/account') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Account</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('dashboard/account') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Settings</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('auth/logout') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Sign out</a>
                                </li>
                            </ul>
                        </div>
                        <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 border" aria-controls="navbar-user" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                            </svg>
                        </button>
                    <?php } ?>
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                    <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-200 rounded-lg md:flex-row md:space-x-8 md:mt-0 md:border-0">
                        <li>
                            <a href="<?= base_url('dashboard') ?>" class="block py-2 pl-3 pr-4 text-white bg-primary bg-opacity-70 rounded md:bg-transparent md:text-primary sm:underline md:p-0">Home</a>
                        </li>
                        <li>
                            <a href="<?= base_url('dashboard/product') ?>" class="block py-2 pl-3 pr-4 text-gray-500 rounded hover:bg-gray-100 md:hover:bg-transparent hover:underline md:hover:text-gray-900 md:p-0">Produk</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </header>

    <main>
        <session id="jombotron">
            <article class="max-w-screen-xl mx-4 sm:mx-auto sm:pl-5 mt-20 mb-12">
                <div class="grid grid-cols-1 sm:grid-cols-2 place-items-center">
                    <div class="mb-6">
                        <p class="text-primary font-bold text-xl sm:text-2xl leading-tight mb-3">SEHATIN siap melayani keluhan masyarakat selama 24/7.</p>
                        <span class="text-sm font-normal text-secondary">Rumah sakit adalah bagian integral dari suatu organisasi sosial dan kesehatan dengan fungsi menyediakan pelayanan paripurna (komprehensif).</span>
                        <button class="flex items-center justify-center py-1.5 px-5 bg-primary text-white font-medium rounded-full mt-5 text-sm">
                            <i class="fa-solid fa-stethoscope mr-3"></i>Lihat Layanan</button>
                    </div>
                    <div class="justify-center flex">
                        <img src="<?= base_url('./assets/img/mentahan/sectionNav.svg') ?>" alt="section1 img" class="w-3/4">
                    </div>
                </div>
            </article>
        </session>

        <session id="patnerBanner">
            <article class="mb-12 bg-banner py-5 sm:py-12">
                <div class="sm:mb-4">
                    <h1 class="text-center text-lg sm:text-2xl mb-3 font-bold">Partner & Friend</h1>
                </div>
                <div class="sm:flex sm:justify-center sm:gap-4 sm:mx-4 sm:items-center sm:my-6">
                    <div class="grid grid-cols-2 place-content-around place-items-center mx-4 gap-6 sm:flex">
                        <img src="<?= base_url('./assets/img/mentahan/image 6.svg') ?>" alt="section partner img" class="w-[100px]">
                        <img src="<?= base_url('./assets/img/mentahan/image 11.svg') ?>" alt="section partner img" class="w-[100px] sm:mx-10">
                        <img src="<?= base_url('./assets/img/mentahan/image 9.svg') ?>" alt="section partner img" class="w-[100px]">
                        <img src="<?= base_url('./assets/img/mentahan/image 10.svg') ?>" alt="section partner img" class="w-[100px] sm:mx-10">
                    </div>
                    <div class="flex justify-center">
                        <img src="<?= base_url('./assets/img/mentahan/image 12.svg') ?>" alt="section partner img" class="w-[150px] mt-5">
                    </div>
                </div>
                </div>
            </article>
        </session>

        <session id="Daftar Layanan">
            <article class="mb-12">
                <div class="mx-4 max-w-screen-xl mx-4 sm:mx-auto sm:px-5">
                    <div class="mb-8 sm:mb-10 sm:flex sm:justify-between sm:items-center">
                        <h1 class="text-lg sm:text-2xl font-bold">Daftar Layanan</h1>
                        <p class="text-secondary font-normal text-sm pt-3 sm:w-1/2">Rumah sakit adalah bagian integral dari suatu organisasi sosial dan kesehatan dengan fungsi menyediakan pelayanan paripurna (komprehensif).</p>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow">
                            <img src="<?= base_url('./assets/img/mentahan/Icon (1).svg') ?>" alt="icon Card" class="w-12">
                            <p class="text-lg font-medium text-black py-2">Apotek 24 Jam</p>
                            <p class="mb-3 text-sm text-secondary">Toko tempat meramu dan menjual obat berdasarkan resep dokter serta memperdagangkan barang medis.</p>
                            <button class="flex items-center justify-center py-1.5 px-5 bg-primary text-white font-medium w-full rounded-full text-sm">
                                <i class="fa-brands fa-whatsapp mr-3"></i> <span>Selengkapnya</span>
                            </button>
                        </div>

                        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow">
                            <img src="<?= base_url('./assets/img/mentahan/Icon (2).svg') ?>" alt="icon Card" class="w-12">
                            <p class="text-lg font-medium text-black py-2">Medical Check Up</p>
                            <p class="mb-3 text-sm text-secondary">Toko tempat meramu dan menjual obat berdasarkan resep dokter serta memperdagangkan barang medis.</p>
                            <button class="flex items-center justify-center py-1.5 px-5 bg-primary text-white font-medium w-full rounded-full text-sm">
                                <i class="fa-brands fa-whatsapp mr-3"></i> <span>Selengkapnya</span>
                            </button>
                        </div>

                        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow">
                            <img src="<?= base_url('./assets/img/mentahan/Icon (3).svg') ?>" alt="icon Card" class="w-12">
                            <p class="text-lg font-medium text-black py-2">Professional Doctor</p>
                            <p class="mb-3 text-sm text-secondary">Toko tempat meramu dan menjual obat berdasarkan resep dokter serta memperdagangkan barang medis.</p>
                            <button class="flex items-center justify-center py-1.5 px-5 bg-primary text-white font-medium w-full rounded-full text-sm">
                                <i class="fa-brands fa-whatsapp mr-3"></i> <span>Selengkapnya</span>
                            </button>
                        </div>

                    </div>
                </div>
            </article>
        </session>

        <session id="Layanan">
            <article class="mb-12 mx-4 max-w-screen-xl mx-4 sm:mx-auto">
                <div class="grid sm:grid-cols-2 sm:place-items-center">
                    <div class="leftImg flex justify-center sm:mr-5">
                        <img src="<?= base_url('./assets/img/mentahan/Section (2).svg') ?>" alt="img left" class="sm:w-auto">
                    </div>
                    <div class="rightText">
                        <h3 class="text-lg font-semibold sm:text-2xl">Pelayanan terbaik dari parah Ahli Medis</h3>
                        <p class="text-sm text-secondary font-normal my-2">Rumah sakit adalah bagian integral dari suatu organisasi sosial dan kesehatan dengan fungsi menyediakan pelayanan paripurna (komprehensif).</p>
                        <button class="flex items-center justify-center py-1.5 px-5 bg-primary text-white font-medium mt-4 rounded-full">
                            <i class="fa-brands fa-whatsapp mr-3"></i> <span class="text-sm">Reservasi</span>
                        </button>
                    </div>
                </div>
            </article>
        </session>

        <session id="Layanan2">
            <article class="mb-12 mx-4 max-w-screen-xl sm:mx-auto">
                <div class="grid sm:grid-cols-2 sm:px-5 sm:place-items-center">
                    <div class="leftImg justify-center flex sm:order-last">
                        <img src="<?= base_url('./assets/img/mentahan/Section (1).svg') ?>" alt="img left" class="w-5/6 sm:w-auto">
                    </div>
                    <div class="rightText mt-4">
                        <h3 class="text-lg sm:text-2xl font-semibold">Pelayanan terbaik dari parah Ahli Medis</h3>
                        <p class="text-sm text-secondary font-normal my-2">Rumah sakit adalah bagian integral dari suatu organisasi sosial dan kesehatan dengan fungsi menyediakan pelayanan paripurna (komprehensif).</p>
                        <button class="flex items-center justify-center py-1.5 px-5 bg-primary text-white font-medium mt-4 rounded-full">
                            <i class="fa-brands fa-whatsapp mr-3"></i> <span class="text-sm">Reservasi</span>
                        </button>
                    </div>
                </div>
            </article>
        </session>

        <session id="Reservasi">
            <article class="mb-12 mx-4 bg-primary rounded-2xl sm:py-8 max-w-screen-xl sm:mx-auto">
                <div class="p-5">
                    <div class="text-white text-center">
                        <h3 class="text-lg font-semibold sm:text-2xl">Reservasi Pelayanan kami sekarang</h3>
                        <p class="opacity-80 text-sm font-normal mt-3 my-6">Rumah sakit adalah bagian integral dari suatu organisasi sosial dan kesehatan dengan fungsi menyediakan pelayanan paripurna (komprehensif).</p>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:justify-center sm:gap-4 sm:items-center">
                        <button class="flex items-center justify-center py-1.5 px-5 border border-white text-white font-medium mt-4 rounded-full">
                            <i class="fa-regular fa-calendar-days mr-3"></i> <span class="text-sm capitalize">cek jadwal dokter</span>
                        </button>
                        <button class="flex items-center justify-center py-1.5 px-5 bg-white text-primary font-medium mt-4 rounded-full">
                            <i class="fa-brands fa-whatsapp mr-3"></i> <span class="text-sm">Selengkapnya</span>
                        </button>
                    </div>
                </div>
            </article>
        </session>

        <session id="Testimoni">
            <article class="mb-12 mx-4">
                <div class="text-center sm:mb-8 max-w-screen-xl sm:py-8 sm:mx-auto">
                    <h3 class="text-lg font-semibold sm:text-2xl">Testimonial by Pasien</h3>
                    <p class="opacity-70 text-sm font-normal mt-3 my-6">Rumah sakit adalah bagian integral dari suatu organisasi sosial dan kesehatan dengan fungsi menyediakan pelayanan paripurna (komprehensif).</p>
                </div>

                <div class="w-full">
                    <swiper-container class="mySwiper" init="false" free-mode="true">
                        <swiper-slide>
                            <img src="<?= base_url('./assets/img/mentahan/Testi.svg') ?>" alt="testi1">
                        </swiper-slide>
                        <swiper-slide>
                            <img src="<?= base_url('./assets/img/mentahan/Testi.svg') ?>" alt="testi1">
                        </swiper-slide>
                        <swiper-slide>
                            <img src="<?= base_url('./assets/img/mentahan/Testi.svg') ?>" alt="testi1">
                        </swiper-slide>
                        <swiper-slide>
                            <img src="<?= base_url('./assets/img/mentahan/Testi.svg') ?>" alt="testi1">
                        </swiper-slide>
                        <swiper-slide>
                            <img src="<?= base_url('./assets/img/mentahan/Testi.svg') ?>" alt="testi1">
                        </swiper-slide>

                    </swiper-container>
                </div>
            </article>
        </session>

    </main>

    <footer class="bg-white">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                    <a href="index.php" class="flex items-center">
                        <img src="https://cdn-healthcare.hellohealthgroup.com/2022/07/1658823479_62dfa337a1dc22.95310852.jpg" class="h-8 mr-2" alt="Logo" />
                        <span class="self-center text-lg text-primary sm:text-xl font-semibold whitespace-nowrap">SEHATIN</span>
                    </a>
                </div>
                <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-primary uppercase">Alternatif Link</h2>
                        <ul class="text-secondary font-medium">
                            <li>
                                <a href="index.php" class="hover:underline">Home</a>
                            </li>
                            <li class="my-4">
                                <a href="product.php" class="hover:underline">Produk</a>
                            </li>
                            <li>
                                <a href="kategori.php" class="hover:underline">Kategori</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-primary uppercase">Ikuti Kami</h2>
                        <ul class="text-secondary font-medium">
                            <li class="mb-4">
                                <a href="https://github.com/themesberg/flowbite" class="hover:underline "><i class="fa-brands fa-instagram me-1"></i>Instagram</a>
                            </li>
                            <li>
                                <a href="https://discord.gg/4eeurUVvTy" class="hover:underline"><i class="fa-brands fa-facebook me-1"></i>Facebook</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-primary uppercase">Legal</h2>
                        <ul class="text-secondary font-medium">
                            <li class="mb-4">
                                <a href="#" class="hover:underline">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
        <div class=" bg-gray-900  p-4 py-6">
            <div class="mx-auto w-full max-w-screen-xl sm:flex sm:items-center sm:justify-between">
                <span class="text-sm text-gray-500 sm:text-center">© 2023 <a href="index.php" class="hover:underline">SEHATIN™</a>. All Rights Reserved.
                </span>
                <div class="flex mt-4 space-x-5 sm:justify-center sm:mt-0">
                    <a href="#" class="text-gray-500">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                            <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Facebook page</span>
                    </a>
                    <a href="#" class="text-gray-500">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 21 16">
                            <path d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z" />
                        </svg>
                        <span class="sr-only">Discord community</span>
                    </a>
                    <a href="#" class="text-gray-500">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 17">
                            <path fill-rule="evenodd" d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Twitter page</span>
                    </a>
                    <a href="#" class="text-gray-500">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">GitHub account</span>
                    </a>
                    <a href="#" class="text-gray-500">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Dribbble account</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>


    <!-- responsive swiper -->
    <script>
        const swiperEl = document.querySelector('swiper-container')
        Object.assign(swiperEl, {
            slidesPerView: 5,
            spaceBetween: 10,
            pagination: {
                clickable: true,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                }
            },
        });
        swiperEl.initialize();
    </script>


</body>

</html>