# 🎓 Sistem Manajemen Tugas/Proyek

> Nama: **Nur Rahiman**  
> NIM: **D0223308**  
> Mata Kuliah  
> Tahun Ajaran 2024/2025

---

## 🧑‍🏫 Role dan Fitur-fiturnya

### Role & Akses:
- **Admin**: Kelola data user & role
- **Dosen (Lecturer)**: Buat tugas, lihat progres siswa
- **Mahasiswa (Student)**: Lihat & selesaikan tugas, atur kalender pribadi

### Modul:
- **Tugas (Task)**:
  - CRUD tugas oleh dosen
  - Lihat tugas & tandai selesai oleh mahasiswa
- **Kalender**:
  - Jadwal pribadi mahasiswa & pengingat
- **Role Management**:
  - Sistem role berbasis middleware (`admin`, `lecturer`, `student`)
- **Autentikasi**:
  - Login, register, proteksi route

---

## 🗃️ Tabel-tabel Database

### Tabel 1: `users`
| Field             | Tipe Data           | Keterangan             |
|------------------|---------------------|------------------------|
| id               | bigIncrements       | Primary key            |
| name             | string              | Nama pengguna          |
| email            | string              | Email unik             |
| email_verified_at| timestamp           | Verifikasi email       |
| password         | string              | Password hash          |
| remember_token   | string (nullable)   | Token login            |
| created_at       | timestamp           |                        |
| updated_at       | timestamp           |                        |

---

### Tabel 2: `roles`
| Field     | Tipe Data     | Keterangan               |
|-----------|---------------|--------------------------|
| id        | bigIncrements | Primary key              |
| name      | string        | Nama peran               |
| created_at| timestamp     |                          |
| updated_at| timestamp     |                          |

---

### Tabel 3: `role_user`
| Field     | Tipe Data           | Keterangan                    |
|-----------|---------------------|-------------------------------|
| user_id   | unsignedBigInteger  | Foreign key ke `users.id`     |
| role_id   | unsignedBigInteger  | Foreign key ke `roles.id`     |
| created_at| timestamp           |                               |
| updated_at| timestamp           |                               |

---

### Tabel 4: `tasks`
| Field       | Tipe Data           | Keterangan                              |
|-------------|---------------------|-----------------------------------------|
| id          | bigIncrements       | Primary key                             |
| title       | string              | Judul tugas                             |
| description | text                | Deskripsi tugas                         |
| due_date    | date                | Deadline tugas                          |
| created_by  | unsignedBigInteger  | Foreign key ke `users.id` (guru)        |
| created_at  | timestamp           |                                         |
| updated_at  | timestamp           |                                         |

---

### Tabel 5: `task_user`
| Field        | Tipe Data           | Keterangan                             |
|--------------|---------------------|----------------------------------------|
| task_id      | unsignedBigInteger  | Foreign key ke `tasks.id`              |
| user_id      | unsignedBigInteger  | Foreign key ke `users.id` (siswa)      |
| is_completed | boolean             | Status selesai atau belum              |
| completed_at | timestamp (nullable)| Waktu penyelesaian                     |
| created_at   | timestamp           |                                        |
| updated_at   | timestamp           |                                        |

---

### Tabel 6: `lalender`
| Field      | Tipe Data           | Keterangan                             |
|------------|---------------------|----------------------------------------|
| id         | bigIncrements       | Primary key                            |
| user_id    | unsignedBigInteger  | Foreign key ke `users.id`              |
| title      | string              | Judul kegiatan                         |
| notes      | text (nullable)     | Catatan tambahan                       |
| start_time | datetime            | Waktu mulai                            |
| end_time   | datetime            | Waktu selesai                          |
| created_at | timestamp           |                                        |
| updated_at | timestamp           |                                        |

---

## 🔗 Relasi Tabel

| Tabel 1 | Relasi       | Tabel 2 | Keterangan                                           |
|---------|--------------|---------|------------------------------------------------------|
| users   | many-to-many | roles   | Melalui `role_user`                                 |
| users   | one-to-many  | tasks   | Guru membuat banyak tugas (`created_by`)            |
| users   | many-to-many | tasks   | Siswa menerima banyak tugas (melalui `task_user`)   |
| users   | one-to-many  | kalender | Tiap user punya banyak jadwal pribadi             |

---

> Dokumen ini disusun sebagai dokumentasi awal proyek Laravel berbasis manajemen tugas pelajar.
"# Project_ProManage" 
