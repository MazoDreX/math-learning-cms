# Math Learning CMS
Sebagai Tugas Aplikasi Struktur Data

### TODO LIST
- ~~Buat soal latihan bisa ditaruh gambar~~
- ~~Buat Grafik pop up atau animasi pada soal latihan untuk hasil jawaban~~
- ~~Buat skor pada soal latihan~~ 

- Buat submit terakhir bisa memunculkan pop up skor 

#### IMPORTANT
**@vite('resources/css/app.css', 'resources/js/app.js') dipanggil secara terpisah (satu - satu) karena subbab/show.blade.php membutuhkan tailwindcss yang belum dibuild, sehingga terpaksa subbab/show.blade.php menggunaan tailwindcss CDN! (hanya show.blade.php yang menggunakan CDN, sisanya menggunakan @vite('resources/css/app.css', 'resources/js/app.js')**

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## Installation


```bash
composer install
```
```bash
npm install
```
```bash
npm install mathjax@3
mv node_modules/mathjax/es5 <path-to-server-location>/mathjax
```
## Run Development

```bash
php artisan serve
```
```bash
npm run dev
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

