# 🏥 Database Schema – Sistem Informasi Rumah Sakit

Struktur database berdasarkan file migration Laravel yang tersedia:

- `rumah_sakits`
- `polikliniks`
- `pasiens`
- `dokters`
- `obats`
- `jadwal_prakteks`
- `kunjungans`
- `reseps`

---

## 1. 🏥 rumah_sakits

| Kolom            | Tipe Data         | Keterangan |
|------------------|-------------------|------------|
| id               | BIGINT (PK, AI)   | Primary key |
| kode_rs          | VARCHAR(20)       | Unique |
| nama             | VARCHAR(255)      | Nama rumah sakit |
| kelas_rs         | VARCHAR(255)      | Nullable |
| akreditasi       | VARCHAR(255)      | Nullable |
| penyelenggara    | VARCHAR(255)      | - |
| alamat           | TEXT              | - |
| kota             | VARCHAR(255)      | - |
| provinsi         | VARCHAR(255)      | - |
| kode_pos         | VARCHAR(255)      | Nullable |
| telepon          | VARCHAR(255)      | Nullable |
| email            | VARCHAR(255)      | Nullable |
| website          | VARCHAR(255)      | Nullable |
| fasilitas        | JSON              | Nullable |
| created_at       | TIMESTAMP         | - |
| updated_at       | TIMESTAMP         | - |

---

## 2. 🏥 polikliniks

| Kolom                | Tipe Data         | Keterangan |
|----------------------|-------------------|------------|
| id                   | BIGINT (PK, AI)   | - |
| rumah_sakit_id       | BIGINT (FK)       | relasi → rumah_sakits.id |
| kode_poli            | VARCHAR(20)       | Unique |
| nama_poli            | VARCHAR(255)      | - |
| kategori             | VARCHAR(255)      | Nullable |
| kapasitas_per_hari   | INTEGER           | Default 0 |
| butuh_ruang_tindakan | BOOLEAN           | Default false |
| fasilitas            | JSON              | Nullable |
| created_at           | TIMESTAMP         | - |
| updated_at           | TIMESTAMP         | - |

---

## 3. 👤 pasiens

| Kolom               | Tipe Data          | Keterangan |
|---------------------|--------------------|------------|
| id                  | BIGINT (PK, AI)    | - |
| no_rm               | VARCHAR            | Unique |
| nama                | VARCHAR            | - |
| jenis_kelamin       | ENUM(L,P)          | - |
| tanggal_lahir       | DATE               | Nullable |
| nik                 | VARCHAR(20)        | Nullable + Unique |
| no_bpjs             | VARCHAR(20)        | Nullable |
| telepon             | VARCHAR            | Nullable |
| alamat              | TEXT               | Nullable |
| kontak_darurat_nama | VARCHAR            | Nullable |
| kontak_darurat_hp   | VARCHAR            | Nullable |
| hubungan_kontak     | VARCHAR            | Nullable |
| alergi              | TEXT               | Nullable |
| riwayat_penyakit    | TEXT               | Nullable |
| catatan_khusus      | TEXT               | Nullable |
| created_at          | TIMESTAMP          | - |
| updated_at          | TIMESTAMP          | - |

---

## 4. 🧑‍⚕️ dokters

| Kolom                | Tipe Data        | Keterangan |
|----------------------|------------------|------------|
| id                   | BIGINT (PK, AI)  | - |
| kode_dokter          | VARCHAR(20)      | Unique |
| nama                 | VARCHAR          | - |
| jenis_kelamin        | ENUM(L,P)        | - |
| spesialisasi         | VARCHAR          | - |
| sub_spesialis        | VARCHAR          | Nullable |
| sip                  | VARCHAR          | Nullable |
| str                  | VARCHAR          | Nullable |
| pendidikan_terakhir  | VARCHAR          | Nullable |
| sertifikasi          | JSON             | Nullable |
| telepon              | VARCHAR          | Nullable |
| email                | VARCHAR          | Nullable |
| poliklinik_id        | BIGINT (FK)      | relasi → polikliniks.id |
| status_aktif         | BOOLEAN          | Default true |
| created_at           | TIMESTAMP        | - |
| updated_at           | TIMESTAMP        | - |

---

## 5. 💊 obats

| Kolom          | Tipe Data        | Keterangan |
|----------------|------------------|------------|
| id             | BIGINT (PK, AI)  | - |
| kode_obat      | VARCHAR(30)      | Unique |
| nama_obat      | VARCHAR          | - |
| kategori       | VARCHAR          | - |
| bentuk         | VARCHAR          | Nullable |
| satuan_dosis   | VARCHAR          | Nullable |
| aturan_default | VARCHAR          | Nullable |
| stok           | INTEGER          | Default 0 |
| stok_minimum   | INTEGER          | Default 0 |
| kadaluarsa     | DATE             | Nullable |
| harga_modal    | DECIMAL(12,2)    | Nullable |
| harga_jual     | DECIMAL(12,2)    | Nullable |
| created_at     | TIMESTAMP        | - |
| updated_at     | TIMESTAMP        | - |

---

## 6. 📅 jadwal_prakteks

| Kolom          | Tipe Data        | Keterangan |
|----------------|------------------|------------|
| id             | BIGINT (PK, AI)  | - |
| dokter_id      | BIGINT (FK)      | relasi → dokters.id |
| hari           | ENUM             | Senin–Minggu |
| jam_mulai      | TIME             | - |
| jam_selesai    | TIME             | - |
| kuota_pasien   | INTEGER          | Default 20 |
| perlu_antrian  | BOOLEAN          | Default true |
| telemedicine   | BOOLEAN          | Default false |
| created_at     | TIMESTAMP        | - |
| updated_at     | TIMESTAMP        | - |

---

## 7. 📝 kunjungans

| Kolom             | Tipe Data        | Keterangan |
|-------------------|------------------|------------|
| id                | BIGINT (PK, AI)  | - |
| pasien_id         | BIGINT (FK)      | → pasiens.id |
| dokter_id         | BIGINT (FK)      | → dokters.id |
| poliklinik_id     | BIGINT (FK)      | → polikliniks.id |
| no_antrian        | VARCHAR          | Nullable |
| waktu_kedatangan  | DATETIME         | Nullable |
| waktu_dilayani    | DATETIME         | Nullable |
| waktu_selesai     | DATETIME         | Nullable |
| keluhan           | TEXT             | Nullable |
| diagnosa_awal     | TEXT             | Nullable |
| diagnosa_akhir    | TEXT             | Nullable |
| pemeriksaan_fisik | JSON             | Nullable |
| vital_sign        | JSON             | Nullable |
| tindakan          | JSON             | Nullable |
| jenis_pembiayaan  | ENUM             | umum/bpjs/asuransi/lainnya (default: umum) |
| biaya_kunjungan   | DECIMAL(12,2)    | Default 0 |
| status            | ENUM             | menunggu/dilayani/selesai/batal |
| created_at        | TIMESTAMP        | - |
| updated_at        | TIMESTAMP        | - |

---

## 8. 💊 reseps

| Kolom        | Tipe Data        | Keterangan |
|--------------|------------------|------------|
| id           | BIGINT (PK, AI)  | - |
| kunjungan_id | BIGINT (FK)      | → kunjungans.id |
| obat_id      | BIGINT (FK)      | → obats.id |
| jumlah       | INTEGER          | Default 1 |
| dosis        | VARCHAR          | Nullable |
| frekuensi    | VARCHAR          | Nullable |
| durasi       | VARCHAR          | Nullable |
| cara_pakai   | VARCHAR          | Nullable |
| catatan      | VARCHAR          | Nullable |
| harga_satuan | DECIMAL(12,2)    | Nullable |
| subtotal     | DECIMAL(12,2)    | Nullable |
| created_at   | TIMESTAMP        | - |
| updated_at   | TIMESTAMP        | - |
