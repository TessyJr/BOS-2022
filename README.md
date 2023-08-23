# Set Up
## 1. Konfigurasi file .env

**Konfigurasi Database**

![carbon](https://user-images.githubusercontent.com/83326741/179490870-a49bc6e6-995f-47d7-9de0-1f0da7f9ac66.png)

**Konfigurasi Mailer**

![carbon (2)](https://user-images.githubusercontent.com/83326741/179495092-33221653-a6a1-4499-a8d4-317b3ae33151.png)

**Note :** Google Less Secure Apps tidak di support lagi oleh Google oleh karena itu kita tidak bisa menggunakan password email secara langsung melainkan harus di generate melalui google Apps password. sebelum membuat Apps Password Google 2 step authentication harus di aktifkan terlebih dahulu.

![Screenshot 2022-07-18 171650](https://user-images.githubusercontent.com/83326741/179491406-4e35a288-fbad-45b3-857d-ee919bb11df7.png)

**Menjalankan scheduler**
`php artisan schedule:work`
    
Didalam project ini terdapat scheduler yang melakukan daily check up untuk memastikan apakah tanggal hari ini >= Hari-H yang menandakan countdown sudah mencapai 0. maka website ini akan mengirimkan pesan ke semua email yang ada di tabel database blast_emails

**Note** : Cara mengubah pengaturan scheduler dapat dibaca dari dokumentasi berikut https://laravel.com/docs/9.x/scheduling


**Tambahan :**
- Tanggal countdown dapat diubah melalui file .env pada variabel LAUNCH_COUNTDOWN

**TODO :**
- Mengubah isi pesan email yang akan di blast
