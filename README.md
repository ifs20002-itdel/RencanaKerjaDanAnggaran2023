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

Sesuai dengan silabus bahwa pada TA.2021-2022 mata kuliah Pengembangan Aplikasi
Berbasis Web ini memiliki proyek.
Proyek ini merupakan Proyek 2 Proyek 2, merupakan proyek dengan skop lebih besar dimana pada proyek ini mahasiswa diminta untuk mengerjakan pembuatan aplikasi web. Pada proyek kedua ini akan dilakukan kolaborasi proyek antar mata kuliah di program studi Informatika.

## Kelompok 1

Anggota Kelompok

<ol>
    <li>11S19035 - Rahmad Joko Susilo Situmorang</li>
    <li>11S20002 - Yoel Ganda Aprilco Napitupulu</li>
    <li>11S20016 - Nanchy Monika Siadari</li>
    <li>11S20020 - Roosen Gabriel Manurung</li>
    <li>11S20023 - Natanael Jansudin Siregar</li>
    <li>11S20030 - Vistar Tiop Raja Gukguk</li>
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

```bash
php artisan migrate
```

5. Seperti biasa, untuk menjalankan server

```bash
php artisan serve
```

## Fitur

<ul>
    <li>Register & Login (validation, otentikasi, otorisasi)</li>
    <li>Web Page (routing, controller, model, view)</li>
    <li>Implementasi Theme Frontend/Backend</li>
    <li>Database Connection dan CRUD Data (dalam form, table, text)</li>
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
