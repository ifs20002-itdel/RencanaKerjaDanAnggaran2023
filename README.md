<p align="center"></p>

<p align="center">
      <img src="public/layout/dist/img/del.png" alt="DEL-logo" width="100px" height="auto">
   </a>
</p>

<h1 align="center">
      RKA - Rencana Kerja dan Anggaran
   </a>
</h1>

<p align="center">Rencana Kerja dan Anggaran merupakan sebuah aplikasi berbasis web yang digunakan oleh Dosen/Staf IT DEL yang memiliki autoritas dengan jabatan sebagai Rektor, WR I, WR II, WR III, Dekan Fakultas, KaProdi, Unit/Upt dan beserta anggotanya, untuk menyerahkan rencana kegiatan tiap unit atau tiap organisasi per unit untuk rencana kerja yang akan berlangsung selama 1 tahun. Pengisian Rencana Kerja Anggaran biasanya akan dilakukan di bulan pertama yaitu Januari menyusul bulan selanjutnya dan berakhir di bulan Desember di setiap tahunnya. Untuk dapat menggunakan aplikasi tersebut, Dosen harus terlebih dahulu melakukan Login dengan akun masing-masing.</p>

## Introduction 🚀

Sesuai dengan silabus bahwa pada TA.2021-2022 mata kuliah Manajemen Pengembangan Perangkat Lunak memiliki proyek dengan latihan siklus kehidupan kerja dalam pengerjaan aplikasi Berbasis Web.Proyek ini merupakan Proyek lanjutan dari Proyek Matakuliah PABWE pada semester Gasal. Proyek ini merupakan proyek dengan skop lebih besar dimana pada proyek ini mahasiswa diminta untuk mengerjakan semua proses pembuatan aplikasi web. Pada proyek ini akan dilakukan kolaborasi proyek antar mata kuliah di program studi Informatika.

## Kelompok 2

Team Implementasi

<ol>
    <li>11S20020 - Roosen Gabriel Manurung (LEADER)</li>
    <li>11S20002 - Yoel Ganda Aprilco Napitupulu (FULLSTACK)</li>  
    <li>11S20034 - Kevin Willys Nathaneil Samosir (FRONT END)</li>    
</ol>
Program Studi : S1 Informatika

## Topik Project: Rencana Kerja dan Anggaran

Pada Project ini, topik kelompok kami adalah membangun suatu aplikasi yang digunakan untuk menyerahkan rencana kegiatan tiap unit atau tiap organisasi dalam stukturisasi IT Del.

## Installation ⚒️

Panduan Instalasi

1. Buka Terminal pada root directory proyek
2. ikuti perintah berikut ini

```bash
composer install
```

atau

```bash
composer update
```

3. Jalankan command berikut untuk generate key

```bash
php artisan key:generate
```

4. Buka file .env pada bagian "DB_DATABASE = RKA-DB" hidupkan server APACHE dan MySQL lalu kunjungi http://localhost/phpmyadmin/index.php. buatkan DB baru dengan nama RKA-DB.
   Lalu jalankan command berikut di terminal

Migrate Tabel Jabatan terlebih dahulu, untuk penamaan migration tabel jabatan silahkah disesuaikan dengan file masing-masing.

```bash
php artisan migrate --path=/database/migrations/2023_04_20_154000_create_jabatan_table.php
```

Migrate keseluruhan tabel

```bash
php artisan migrate
```

5. Seperti biasa, untuk menjalankan server

```bash
php artisan serve
```

## Fitur

<ul>
    <li>Login (validation, otentikasi, otorisasi)</li>
    <li>Jenis Penggunaan (CRUD)</li>
    <li>Sub Jenis Penggunaan (CRUD)</li>
    <li>Mata Anggaran (CRUD)</li>
    <li>dst</li>
    
</ul>

## ERD Database

design ERD or API

## Requirement

<ul>
    <li>Bootstrap v5.1.3</li>
    <li>dst</li>
</ul>

## Deploy

Link Deploy:

Tambahkan yang lain
