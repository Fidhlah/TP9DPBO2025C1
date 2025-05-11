# TP9DPBO2025C1 - JANJI
Saya Muhammad Hafidh Fadhilah dengan NIM 2305672 mengerjakan Tugas Praktikum 9 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

# Desain Program
![image](https://github.com/user-attachments/assets/ade4635a-ef89-448a-8205-60604a3f95a1)
Kolom:
- `id`: Primary key auto-increment
- `nim`: Nomor Induk Mahasiswa
- `nama`: Nama mahasiswa
- `tempat`: Tempat lahir
- `tl`: Tanggal lahir
- `gender`: Jenis kelamin (Laki-laki/Perempuan)
- `email`: Alamat email
- `telp`: Nomor telepon

# Penjelasan Alur Program
### Saat Aplikasi Dimuat Pertama Kali
1. Pengguna mengakses `code/index.php`
2. `code/index.php` mengikutsertakan file `TampilMahasiswa.php`
3. Kelas `TampilMahasiswa` membuat instance dari presenter `ProsesMahasiswa`
4. Tampilan default menampilkan tabel daftar mahasiswa dan form tambah dengan memanggil metode `tampil()`

### Menambahkan Mahasiswa Baru
1. Pengguna mengisi form dan klik tombol "Tambah"
2. Form dikirim ke `index.php?aksi=create`
3. `code/index.php` memproses data POST
4. Membuat instance baru dari presenter `ProsesMahasiswa`
5. Memanggil `addMahasiswa()` yang menggunakan `TabelMahasiswa` untuk menyimpan data ke database
6. Redirect kembali ke `code/index.php`

### Mengedit Data Mahasiswa
1. Pengguna klik tombol "Edit"
2. Dialihkan ke `index.php?aksi=edit&id=X`
3. `code/index.php` memanggil `tampilForm()` dengan ID yang sesuai
4. Form terisi data mahasiswa melalui presenter `ProsesMahasiswa`
5. Pengguna mengubah data dan mengirim form ke `index.php?aksi=update`
6. `updateMahasiswa()` dipanggil untuk menyimpan perubahan
7. Redirect kembali ke `code/index.php`

### Menghapus Data Mahasiswa
1. Pengguna klik tombol "Hapus"
2. Muncul dialog konfirmasi
3. Dialihkan ke `index.php?aksi=delete&id=X`
4. `deleteMahasiswa()` dipanggil untuk menghapus data
5. Redirect kembali ke `code/index.php`

## Arsitektur (MVP)

### Model
- `DB.class.php`: Mengatur koneksi ke basis data
- `Mahasiswa.class.php`: Model data mahasiswa
- `TabelMahasiswa.class.php`: Operasi database untuk mahasiswa

### View
- `TampilMahasiswa.php`: Logika tampilan
- `KontrakView.php`: Interface untuk view

### Presenter
- `ProsesMahasiswa.php`: Presenter utama
- `KontrakPresenter.php`: Interface untuk presenter


# Dokumentasi
https://github.com/user-attachments/assets/8f709152-711e-426e-8a97-42666c2e0e54

