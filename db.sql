/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 5.6.21 : Database - spkdosen
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`spkdosen` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `spkdosen`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `foto` text,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

/*Table structure for table `dosen` */

DROP TABLE IF EXISTS `dosen`;

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nidn` varchar(10) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `temp_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(1) NOT NULL,
  `id_jur` int(11) NOT NULL,
  `no_sk` varchar(30) NOT NULL,
  `pend_tertinggi` varchar(3) NOT NULL,
  `jabatan_akademik` varchar(2) NOT NULL,
  `id_golongan` varchar(4) NOT NULL,
  `lokasi` varchar(2) NOT NULL,
  `foto` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  PRIMARY KEY (`id_dosen`),
  KEY `id_jur` (`id_jur`),
  CONSTRAINT `id_jur` FOREIGN KEY (`id_jur`) REFERENCES `jurusan` (`id_jur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dosen` */

insert  into `dosen`(`id_dosen`,`nip`,`nidn`,`nama`,`temp_lahir`,`tgl_lahir`,`jk`,`id_jur`,`no_sk`,`pend_tertinggi`,`jabatan_akademik`,`id_golongan`,`lokasi`,`foto`,`username`,`password`,`level`) values (1,'12','12','zaza','malang','2017-10-04','L',1,'1212','SD','1','1','Q','SDS','zaza','zaza','1');

/*Table structure for table `fakultas` */

DROP TABLE IF EXISTS `fakultas`;

CREATE TABLE `fakultas` (
  `id_fak` int(30) NOT NULL,
  `nama_fak` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_fak`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fakultas` */

insert  into `fakultas`(`id_fak`,`nama_fak`) values (1,'SAINTEK'),(2,'PSIKOLOGI');

/*Table structure for table `jurusan` */

DROP TABLE IF EXISTS `jurusan`;

CREATE TABLE `jurusan` (
  `id_jur` int(30) NOT NULL,
  `nama_jur` varchar(50) DEFAULT NULL,
  `id_fak` int(30) DEFAULT NULL,
  PRIMARY KEY (`id_jur`),
  KEY `id_fak` (`id_fak`),
  CONSTRAINT `id_fak` FOREIGN KEY (`id_fak`) REFERENCES `fakultas` (`id_fak`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `jurusan` */

insert  into `jurusan`(`id_jur`,`nama_jur`,`id_fak`) values (1,'Teknik Informatika',1),(2,'Matematika',1),(3,'Psikologi',2);

/*Table structure for table `pendidikan` */

DROP TABLE IF EXISTS `pendidikan`;

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT,
  `id_dosen` int(11) DEFAULT NULL,
  `unsur` int(50) DEFAULT NULL,
  `sub` int(50) DEFAULT NULL,
  `uraian` int(50) DEFAULT NULL,
  `tempat` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id_pendidikan`),
  KEY `id_dosenpend` (`id_dosen`),
  KEY `fk_unsur1` (`unsur`),
  KEY `fk_sub1` (`sub`),
  KEY `fk_uraian1` (`uraian`),
  CONSTRAINT `fk_sub1` FOREIGN KEY (`sub`) REFERENCES `sub_kegiatan` (`id_sub`),
  CONSTRAINT `fk_unsur1` FOREIGN KEY (`unsur`) REFERENCES `unsur_kegiatan` (`id_unsur`),
  CONSTRAINT `fk_uraian1` FOREIGN KEY (`uraian`) REFERENCES `uraian_kegiatan` (`id_uraian`),
  CONSTRAINT `id_dosenpend` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `pendidikan` */

insert  into `pendidikan`(`id_pendidikan`,`id_dosen`,`unsur`,`sub`,`uraian`,`tempat`,`tanggal`) values (1,NULL,NULL,NULL,NULL,NULL,NULL),(2,1,1,1,1,'gasek','0000-00-00'),(3,1,1,1,1,'tt','0000-00-00'),(4,1,3,13,40,'malang','2017-10-03'),(5,1,1,1,2,'fh','0000-00-00'),(6,1,1,1,2,'d','2017-10-13'),(7,1,1,1,1,'dds','0000-00-00'),(8,1,1,2,10,'45dru6','0000-00-00'),(9,1,1,1,1,'UNIV','2017-11-03'),(10,1,1,1,1,'UIN','2017-11-17');

/*Table structure for table `penelitian` */

DROP TABLE IF EXISTS `penelitian`;

CREATE TABLE `penelitian` (
  `id_penelitian` int(11) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `unsur` int(50) DEFAULT NULL,
  `sub` int(50) DEFAULT NULL,
  `uraian` int(50) DEFAULT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `link` text,
  `lampiran` text,
  PRIMARY KEY (`id_penelitian`),
  KEY `id_dosenpene` (`id_dosen`),
  KEY `fk_unsur3` (`unsur`),
  KEY `fk_sub3` (`sub`),
  KEY `fk_uraian3` (`uraian`),
  CONSTRAINT `fk_sub3` FOREIGN KEY (`sub`) REFERENCES `sub_kegiatan` (`id_sub`),
  CONSTRAINT `fk_unsur3` FOREIGN KEY (`unsur`) REFERENCES `unsur_kegiatan` (`id_unsur`),
  CONSTRAINT `fk_uraian3` FOREIGN KEY (`uraian`) REFERENCES `uraian_kegiatan` (`id_uraian`),
  CONSTRAINT `id_dosenpene` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `penelitian` */

insert  into `penelitian`(`id_penelitian`,`id_dosen`,`unsur`,`sub`,`uraian`,`judul`,`link`,`lampiran`) values (0,1,3,NULL,NULL,0,'gdxsg',NULL),(1,1,1,1,2,NULL,NULL,NULL);

/*Table structure for table `pengabdian` */

DROP TABLE IF EXISTS `pengabdian`;

CREATE TABLE `pengabdian` (
  `id_pengabdian` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `unsur` varchar(50) DEFAULT NULL,
  `sub` varchar(50) DEFAULT NULL,
  `uraian` varchar(50) DEFAULT NULL,
  `kegiatan` text,
  `bentuk` varchar(50) DEFAULT NULL,
  `tempat` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `lampiran` text,
  PRIMARY KEY (`id_pengabdian`),
  KEY `id_dosenpeng` (`id_dosen`),
  CONSTRAINT `id_dosenpeng` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pengabdian` */

/*Table structure for table `pengajaran` */

DROP TABLE IF EXISTS `pengajaran`;

CREATE TABLE `pengajaran` (
  `id_pengajaran` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `unsur` varchar(30) DEFAULT NULL,
  `sub` varchar(30) DEFAULT NULL,
  `uraian` varchar(30) DEFAULT NULL,
  `mk` varchar(30) DEFAULT NULL,
  `sks` int(11) DEFAULT NULL,
  `smt` varchar(30) DEFAULT NULL,
  `tahun_aka` varchar(30) DEFAULT NULL,
  `tempat` varchar(30) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `lampiran` text,
  PRIMARY KEY (`id_pengajaran`),
  KEY `id_dosenpengaj` (`id_dosen`),
  CONSTRAINT `id_dosenpengaj` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pengajaran` */

/*Table structure for table `penunjang` */

DROP TABLE IF EXISTS `penunjang`;

CREATE TABLE `penunjang` (
  `id_penunjang` int(11) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `unsur` varchar(50) DEFAULT NULL,
  `sub` varchar(50) DEFAULT NULL,
  `uraian` varchar(50) DEFAULT NULL,
  `kegiatan` varchar(50) DEFAULT NULL,
  `tingkat` varchar(50) DEFAULT NULL,
  `tempat` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `lampiran` text,
  PRIMARY KEY (`id_penunjang`),
  KEY `id_dosenpenun` (`id_dosen`),
  CONSTRAINT `id_dosenpenun` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `penunjang` */

/*Table structure for table `sub_kegiatan` */

DROP TABLE IF EXISTS `sub_kegiatan`;

CREATE TABLE `sub_kegiatan` (
  `id_sub` int(11) NOT NULL AUTO_INCREMENT,
  `id_unsur` int(11) DEFAULT NULL,
  `nama_sub` text,
  PRIMARY KEY (`id_sub`),
  KEY `fk_unsur` (`id_unsur`),
  CONSTRAINT `fk_unsur` FOREIGN KEY (`id_unsur`) REFERENCES `unsur_kegiatan` (`id_unsur`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

/*Data for the table `sub_kegiatan` */

insert  into `sub_kegiatan`(`id_sub`,`id_unsur`,`nama_sub`) values (1,1,'Pendidikan'),(2,2,'Melaksanakan perkuliahan/tutorial/perkuliahan/praktikum dan membimbing, menguji serta menyelenggarakan pendidikan di laboratorium, praktik keguruan, bengkel/studio/kebun percobaan/teknologi pengajaran dan praktik lapangan (Setiap semester)'),(3,2,'Membimbing seminar mahasiswa (Setiap mahasiswa)'),(4,2,'Membimbing KKN, Praktik Kerja Nyata, Praktik Kerja Lapangan (Setiap semester)'),(5,2,'Membimbing dan ikut membimbing dalam menghasilkan disertasi, tesis, skripsi dan laporan akhir studi yang sesuai bidang penugasannya'),(6,2,'Bertugas sebagai penguji pada ujian akhir/Profesi*** (setiap mahasiswa)'),(7,2,'Membina kegiatan mahasiswa di bidang akademik dan kemahasiswaan, termasuk dalam kegiatan ini adalah membimbing mahasiswa menghasilkan produk saintifik (setiap semester)'),(8,2,'Mengembangkan program kuliah yang mempunyai nilai keharuan metode atau substansi (setiap produk)'),(9,2,'Mengembangkan bahan pengajaran/bahan kuliah yang mempunyai nilai kebaharuan (setiap produk)'),(10,2,'Menyampaikan orasi ilmiah di tingkat perguruan tinggi'),(11,2,'Menduduki jabatan pimpinan perguruan tinggi (Setiap semester)'),(12,2,'Membimibing dosen yang mempunyai jabatan akademik lebih rendah setiap semester (bagi dosen Lektor Kepala ke atas)'),(13,2,'Melaksanakan kegiatan detasering dan pencangkokan di luar institusi tempat bekerja setiap semester (bagi dosen Lektor kepala ke atas)'),(14,2,'Melaksanakan pengembangan diri untuk meningkatkan kompetensi'),(15,3,'Menghasilkan karya ilmiah sesuai dengan bidang ilmunya '),(16,3,'Hasil penelitian atau hasil pemikiran yang didesiminasikan'),(17,3,'Hasil penelitian atau pemikiran atau kerjasama industri yang tidak dipublikasikan (tersimpan dalam perpustakaan)'),(18,3,'Menerjemahkan/menyadur buku ilmiah yang diterbitkan (ber ISBN)'),(19,3,'Mengedit/menyunting karya ilmiah dalam bentuk buku yang diterbitkan (ber ISBN)'),(20,3,'Membuat rancangan dan karya teknologi/seni yang dipatenkan secara nasional atau internasional'),(21,3,'Membuat rancangan dan karya teknologi yang tidak dipatenkan: rancangan dan karya seni monumental/seni pertunjukkan: karya sastra'),(22,3,'Membuat rancangan dan karya seni/seni pertunjukan yang tidak mendapatkan HKI*)'),(23,4,'Menduduki jabatan pimpinan pada lembaga pemerintahan/pejabat negara yang harus dibebaskan dari jabatan organiknya tiap semester'),(24,4,'Melaksanakan pengembangan hasil pendidikan , dan penelitian yang dapat dimanfaatkan oleh masyarakat/industri setiap program'),(25,4,'Memberi latihan/penyuluhan/penataran/ceramah pada masyarakat,terjadwal/terprogram'),(26,4,'Memberi pelayanan kepada masyarakat atau kegiatan lain yang menunjang pelaksanaan tugas pemerintahan dan pembangunan'),(27,4,'Membuat/menulis karya pengabdian pada masyarakat yang tidak dipublikasikan, tiap karya'),(28,5,'Menjadi anggota dalam suatu Panitia/Badan pada perguruan tinggi'),(29,5,'Menjadi anggota panitia/badan pada lembaga pemerintah'),(30,5,'Menjadi anggota organisasi profesi'),(31,5,'Mewakili Perguruan Tinggi/Lembaga Pemerintah duduk dalam Panitia Antar Lembaga, tiap kepanitiaan'),(32,5,'Menjadi anggota delegasi Nasional ke pertemuan Internasional'),(33,5,'Berperan aktif dalam pengelolaan jurnal ilmiah(per tahun)'),(34,5,'Berperan serta aktif pertemuan ilmiah'),(35,5,'Mendapat tanda jasa/penghargaan'),(36,5,'Menulis buku pelajaran SLTA/ke bawah yang diterbitkan dan diedarkan secara nasional'),(37,5,'Mempunyai prestasi di bidang olahraga/Humaniora'),(38,5,'Keanggotaan dalam tim penilai jabatan akademik dosen (tiap semester)');

/*Table structure for table `unsur_kegiatan` */

DROP TABLE IF EXISTS `unsur_kegiatan`;

CREATE TABLE `unsur_kegiatan` (
  `id_unsur` int(10) NOT NULL AUTO_INCREMENT,
  `nama_unsur` varchar(100) NOT NULL,
  `kategori` varchar(29) NOT NULL,
  PRIMARY KEY (`id_unsur`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `unsur_kegiatan` */

insert  into `unsur_kegiatan`(`id_unsur`,`nama_unsur`,`kategori`) values (1,'Unsur Pendidikan',''),(2,'Unsur Pelaksanaan Pendidikan',''),(3,'Unsur Penelitian\r\n',''),(4,'Unsur Pengabdian',''),(5,'Unsur Penunjang',''),(6,'unsur lainnya','');

/*Table structure for table `uraian_kegiatan` */

DROP TABLE IF EXISTS `uraian_kegiatan`;

CREATE TABLE `uraian_kegiatan` (
  `id_uraian` int(11) NOT NULL AUTO_INCREMENT,
  `id_sub` int(11) DEFAULT NULL,
  `nama_uraian` text,
  `angka_kredit` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_uraian`),
  KEY `sub_uraian` (`id_sub`),
  CONSTRAINT `fk_keg` FOREIGN KEY (`id_sub`) REFERENCES `sub_kegiatan` (`id_sub`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=latin1;

/*Data for the table `uraian_kegiatan` */

insert  into `uraian_kegiatan`(`id_uraian`,`id_sub`,`nama_uraian`,`angka_kredit`) values (1,1,'Mengikuti pendidikan formal dan memperoleh gelar/sebutan/ijazah(Doktor/sederajat)',200),(2,1,'Mengikuti pendidikan formal dan memperoleh gelar/sebutan/ijazah(Magister/sederajat)',150),(3,1,'Mengikuti diklat prajabatan golongan III',3),(4,2,'Asisten Ahli beban mengajar 10 sks pertama',1),(5,2,'Asisten Ahli beban mengajar 2 sks pertama',0),(6,2,'Lektor/Lektor Kepala/Profesor untuk beban mengajar 10 sks pertama',1),(7,2,'Lektor/Lektor Kepala/Profesor untuk beban mengajar 2 sks pertama',1),(8,2,'Kegiatan pelaksanaan pendidikan untuk pendidikan dokter klinis (a.Melakukan pengajaran untuk peserta pendidikan dokter melalui tindakan medik spesialistik)',4),(9,2,'Kegiatan pelaksanaan pendidikan untuk pendidikan dokter klinis (b. Melakukan pengajaran Konsultasi spesialis kepada peserta pendidikan dokter)',2),(10,2,'Kegiatan pelaksanaan pendidikan untuk pendidikan dokter klinis (c. Melakukan pemeriksaan luar dengan pembimbingan terhadap peserta pendidikan dokter)',2),(11,2,'Kegiatan pelaksanaan pendidikan untuk pendidikan dokter klinis (d. Melakukan pemeriksaan dalam dengan pembimbingan terhadap peserta pendidikan dokter)',3),(12,2,'Kegiatan pelaksanaan pendidikan untuk pendidikan dokter klinis (e. Menjadi saksi ahli dengan pembimbingan terhadap peserta pendidikan dokter)',1),(13,3,'Membimbing seminar Mahasiswa (setiap mahasiswa)',1),(14,4,'Membimbing KKN, Praktik Kerja Nyata, Praktik Kerja Lapangan (setiap semester)',1),(15,5,'1.Pembimbing Utama per orang (setiap mahasiswa) a.Disertasi',8),(16,5,'1.Pembimbing Utama per orang (setiap mahasiswa) b.Tesis',3),(17,5,'1.Pembimbing Utama per orang (setiap mahasiswa) c.Skripsi',1),(18,5,'1.Pembimbing Utama per orang (setiap mahasiswa) d.Laporan akhir studi',1),(19,5,'Pembimbing Pendamping/Pembantu per orang (Setiap mahasiswa) a.Disertasi',6),(20,5,'Pembimbing Pendamping/Pembantu per orang (Setiap mahasiswa) a.Tesis',2),(21,5,'Pembimbing Pendamping/Pembantu per orang (Setiap mahasiswa) c.Skripsi',1),(22,5,'Pembimbing Pendamping/Pembantu per orang (Setiap mahasiswa) d.Laporan akhir studi',1),(23,6,'Bertugas sebagau penguji pada ujian akhir/Profesi*** (setiap mahasiswa) 1.Ketua Penguji',1),(24,6,'Bertugas sebagau penguji pada ujian akhir/Profesi*** (setiap mahasiswa) 2.Anggota Penguji',1),(25,7,'Membina kegiatan mahasiswa di bidang akademik dan kemahasiswaan, termasuk dalam kegiatan ini adalah membimbing mahasiswa menghasilkan produk saintifik (Setiap semester)',2),(26,8,'Mengembangkan program kuliah yang mempunyai nilai kebaharuan metode atau substansi (Setiap produk)',2),(27,9,'1.Buku ajar',20),(28,9,'2.Diktat, Modul, Petunjuk praktikum,Model, Alat bantu, Audio visual, Naskah tutorial, Job sheet praktikum terkait dengan mata kuliah yang diampu',5),(29,10,'Menyampaikan orasi ilmiah di tingkat perguruan tinggi',5),(30,11,'1. Rektor',6),(31,11,'2.wakil Rektor/dekan/direktur program pasca sarjana/ketua lembaga',5),(32,11,'3. Ketua sekolah tinggi/pembantu dekan/asisten direktur program pasca sarjana/ direktur politeknik/koordinator kopertis',4),(33,11,'4.Pembantu ketua sekolah tinggi/pembantu direktur politeknik',4),(34,11,'5.Direktur akademi',4),(35,11,'6.Pembantu direktur politeknik, ketua jurusan/bagian pada universitas/institut/sekolah tinggi',3),(36,11,'7.Pembantu direktur akadmei/ketua jurusan/jetua prodi pada universitas/politeknik/akademi,sekretaris jurusan/bagian pada universitas/institut/sekolah tinggi',3),(37,11,'8.Sekretaris jurusan pada politeknik/akademi dan kepala laboratorium (bengkel) universitas/institut/sekolah tinggi/politeknik/akademik',3),(38,12,'1.Pembimbing pencangkokan',2),(39,12,'2. Reguler',1),(40,13,'1.Detasering',5),(41,13,'2.Pencangkokan',4),(42,14,'1.Lamanya lebih dari 960 jam',15),(43,14,'2.Lamanya antara 641-960 jam',9),(44,14,'3.Lamanya antara 481-640 jam',6),(45,14,'4.Lamanya antara 161-480 jam',3),(46,14,'5.Lamanya antara 81-160 jam',2),(47,14,'6.Lamanya antara 30-80 jam',1),(48,14,'7.Lamanya antara 10-30 jam',1),(49,3,'Hasil penelitian atau hasil pemikiran yang dipublikasikan dalam bentuk buku 1)Buku referensi',40),(50,3,'Hasil penelitian atau hasil pemikiran yang dipublikasikan dalam bentuk buku 2)Monograf',20),(51,3,'Hasil penelitian atau hasil pemikiran dalam buku yang dipublikasikan dan berisi berbagai tulisan dari berbagai penulisa (book chapter) 1)Internasional',15),(52,15,'Hasil penelitian atau hasil pemikiran dalam buku yang dipublikasikan dan berisi berbagai tulisan dari berbagai penulisa (book chapter) 2)Nasional',10),(53,15,'Hasil penelitian atau hasil pemikiran yang dipublikasikan 1) Jurnal internasional berputasi(terindek pada database internasional bereputasi dan berfaktor dampak)',40),(54,15,'Hasil penelitian atau hasil pemikiran yang dipublikasikan 2)Jurnal internasioanl terindek pada database internasional bereputasi',30),(55,15,'Hasil penelitian atau hasil pemikiran yang dipublikasikan 3)Jurnal internasional terindeks pada database internasional di luar kategori 2)',20),(56,15,'Hasil penelitian atau hasil pemikiran yang dipublikasikan 4)Jurnal Nasional terakreditasi',25),(57,15,'Hasil penelitian atau hasil pemikiran yang dipublikasikan 5)A.Jurnal Nasional berbahasa Indonesia terindek pad DOAJ',15),(58,15,'Hasil penelitian atau hasil pemikiran yang dipublikasikan 5)B.Jurnal Nasional berbahasa Inggris atau bahasa resmi (PBB) terindek pada DOAJ',20),(59,15,'Hasil penelitian atau hasil pemikiran yang dipublikasikan 5)B.Jurnal Nasional berbahasa Inggris atau bahasa resmi (PBB) terindek pada DOAJ',20),(60,15,'Hasil penelitian atau hasil pemikiran yang dipublikasikan 6)Jurnal Nasional',10),(61,15,'Hasil penelitian atau hasil pemikiran yang dipublikasikan 7)Jurnal ilmiah yang ditulis dalam Bahasa Resmi PBB namun tidak memenuhi syarat-syarat sebagai jurnal ilmiah internasional',10),(62,16,'Dipresentasikan secara oral dan dimuat dalam prosiding yang dipublikasikan (ber ISSN/ISBN) 1.Internasional',15),(63,16,'Dipresentasikan secara oral dan dimuat dalam prosiding yang dipublikasikan (ber ISSN/ISBN) 1.Nasional',10),(64,16,'Disajikan dalam bentuk poster dan dimuat dalam prosiding yang dipublikasikan 1)Internasional',15),(65,16,'Disajikan dalam bentuk poster dan dimuat dalam prosiding yang dipublikasikan 2)Nasional',10),(66,16,'Disajikan dalam seminar/simposium/lokakarya, tetapi tidak dimuat dalam prosiding yang dipublikasikan 1)Internasional',5),(67,16,'Disajikan dalam seminar/simposium/lokakarya, tetapi tidak dimuat dalam prosiding yang dipublikasikan 2)Nasional',3),(68,16,'Hasil penelitian/pemikiran yang tidak disajikan dalam seminar/simposium/lokakarya, tetapi dimuat dalam prosiding 1)Internasional',10),(69,16,'Hasil penelitian/pemikiran yang tidak disajikan dalam seminar/simposium/lokakarya, tetapi dimuat dalam prosiding 1)Nasional',5),(70,16,'Hasil penelitian/pemikiran yang disajikan dalam koran/majalah populer/umum',1),(71,17,'Hasil penelitian atau pemikiran atau kerjasama industri yang tidak dipublikasikan (tersimpan dalam perpustakaan)',2),(72,18,'Menerjemahkan/menyadur buku ilmiah yang diterbitkan (ber ISBN)',15),(73,19,'Mengedit/menyunting karya ilmiah dalam bentuk buku yang diterbitkan (ber ISBN)',10),(74,20,'Membuat rancangan dan karya teknologi/seni yang dipatenkan secara nasional atau internasional 1)Internasional (paling sedikit diakui oleh 4 Negara)',60),(75,20,'Membuat rancangan dan karya teknologi/seni yang dipatenkan secara nasional atau internasional 2)Nasional',40),(76,21,'Membuat rancangan dan karya teknologi yang tidak dipatenkan: rancangan dan karya seni monumental/seni pertunjukkan: karya sastra a)Tingkat Internasional',20),(77,21,'Membuat rancangan dan karay teknologi yang tidak dipatenkan: rancangan dan karya seni monumental/seni pertunjukkan: karya sastra b) Tingkat Nasional',15),(78,21,'Membuat rancangan dan karay teknologi yang tidak dipatenkan: rancangan dan karya seni monumental/seni pertunjukkan: karya sastra c)Tingkat lokal',10),(79,22,'Membuat rancangan dan karya seni/seni pertunjukan yang tidak mendapatkan HKI*)',0),(80,23,'Menduduki jabatan pimpinan pada lembaga pemerintahan/pejabat negara yang harus dibebaskan dari jabatan organiknya tiap semester',6),(81,24,'Melaksanakan pengembangan hasil pendidikan , dan penelitian yang dapat dimanfaatkan oleh masyarakat/industri setiap program',30),(82,25,'1.Dalam satu semester atau lebih (Tingkat internasional tiap program)',4),(83,25,'1.Dalam satu semester atau lebih b. Tingkat nasional, tiap program',3),(84,25,'1.Dalam satu semester atau lebih c.Tingkat Lokal, tiap program',2),(85,25,'2.Kurang dari satu semester dan minimal satu bulan a.Tingkat Internasional : tiap program',3),(86,25,'2.Kurang dari satu semester dan minimal satu bulan b.Tingkat Nasional, tiap program',2),(87,25,'2.Kurang dari satu semester dan minimal satu bulan c.Tingkat Lokal,tiap program',1),(88,25,'2.Kurang dari satu semester dan minimal satu bulan d.Insidental, tiap kegiatan/program',1),(89,26,'Berdasarkan bidang keahlian,tiap program',2),(90,26,'Berdasarkan penugasan lembaga perguruan tinggi, tiap program',1),(91,26,'Berdasarkan fungsi/jabatan tiap program',1),(92,27,'Membuat/menulis karya pengabdian pada masyarakat yang tidak dipublikasikan, tiap karya',3),(93,28,'Sebagai Ketua/Wakil Ketua merangkap Anggota, tiap tahun',3),(94,28,'Sebagai Anggota, tiap tahun',2),(95,29,'Panitia Pusat sebagai (Ketua/Wakil ketua, tiap kepanitiaan)',3),(96,29,'Panitia Pusat sebagai (Anggota, tiap kepanitiaan)',2),(97,29,'Panitia Daerah, sebagai (Ketua/Wakil Ketua, tiap kepanitiaan)',2),(98,29,'Panitia Daerah, sebagai (Anggota, tiap kepanitiaan) ',1),(99,30,'Tingkat Internasional, sebagai (Pengurus, tiap periode jabatan**)',2),(100,30,'Tingkat Internasional, sebagai: Anggota atas permintaan, tiap periode jabatan*',1),(101,30,'Tingkat Internasional, sebagai (Anggota, tiap periode jabatan*)',1),(102,30,'Tingkat Nasional, sebagai (Pengurus, tiap periode jabatan)',2),(103,30,'Tingkat Nasional, sebagai (Anggota, atas permintaan, tiap periode jabatan',1),(104,30,'Tingkat Nasional, sebagai (Anggota, tiap periode jabatan)',1),(105,31,'Mewakili Perguruan Tinggi/Lembaga Pemerintah duduk dalam Panitia Antar Lembaga, tiap kepanitiaan',1),(106,32,'Sebagai Ketua delegasi Nasional ke pertemuan Internasional',3),(107,32,'Sebagai Anggota, tiap kegiatan',2),(108,33,'Editor/dewan penyunting/dewan redaksi jurnal ilmiah internasional',4),(109,33,'Editor/dewan penyunting/dewan redaksi jurnal ilmiah nasional',2),(110,34,'Tingkat Internasional/Nasional/Regional sebagai (Ketua, tiap kegiatan)',3),(111,35,'Tingkat Internasional/Nasional/Regional sebagai(Anggota/peserta, tiap kegiatan)',2),(112,35,'Di lingkungan Perguruan Tinggi sebagai (Ketua, tiap kegiatan)',2),(113,35,'Di lingkungan Perguruan Tinggi sebagai (Anggota/peserta,tiap kegiatan',1),(114,36,'Penghargaan/tanda jasa Satya lencana 30 tahun',3),(115,36,'Penghargaan/tanda jasa Satya lencana 20 tahun',2),(116,36,'Penghargaan/tanda jasa Satya lencana 10 tahun',1),(117,36,'Tingkat Internasional, tiap tanda jasa/penghargaan',5),(118,36,'Tingkat Nasional, tiap tanda jasa/penghargaan',3),(119,36,'Tingkat Daerah/Lokal, tiap tanda jasa/penghargaan',1),(120,37,'Buku SMTA atau setingkat,tiap buku',5),(121,37,'Buku SMTP atau setingkat,tiap buku',5),(122,37,'Buku SD atau setingkat, tiap buku',5),(123,38,'Tingkat Internasinal,tiap piagam/medali',5),(124,38,'Tingkat Nasional,tiap piagam/medali',3),(125,38,'Tingkat Daerah/Lokal,tiap piagam/medali',1);

/*Table structure for table `uraian_kegiatandemo` */

DROP TABLE IF EXISTS `uraian_kegiatandemo`;

CREATE TABLE `uraian_kegiatandemo` (
  `id_uraian` int(11) NOT NULL AUTO_INCREMENT,
  `id_sub` int(11) DEFAULT NULL,
  `nama_uraian` text,
  `angka_kredit` double DEFAULT NULL,
  PRIMARY KEY (`id_uraian`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=latin1;

/*Data for the table `uraian_kegiatandemo` */

insert  into `uraian_kegiatandemo`(`id_uraian`,`id_sub`,`nama_uraian`,`angka_kredit`) values (1,1,'Mengikuti pendidikan formal dan memperoleh gelar/sebutan/ijazah(Doktor/sederajat)',200),(2,1,'Mengikuti pendidikan formal dan memperoleh gelar/sebutan/ijazah(Magister/sederajat)',150),(3,1,'Mengikuti diklat prajabatan golongan III',3),(4,2,'Asisten Ahli beban mengajar 10 sks pertama',0.5),(5,2,'Asisten Ahli beban mengajar 2 sks pertama',0.25),(6,2,'Lektor/Lektor Kepala/Profesor untuk beban mengajar 10 sks pertama',1),(7,2,'Lektor/Lektor Kepala/Profesor untuk beban mengajar 2 sks pertama',0.5),(8,2,'Kegiatan pelaksanaan pendidikan untuk pendidikan dokter klinis (a.Melakukan pengajaran untuk peserta pendidikan dokter melalui tindakan medik spesialistik)',4),(9,2,'Kegiatan pelaksanaan pendidikan untuk pendidikan dokter klinis (b. Melakukan pengajaran Konsultasi spesialis kepada peserta pendidikan dokter)',2),(10,2,'Kegiatan pelaksanaan pendidikan untuk pendidikan dokter klinis (c. Melakukan pemeriksaan luar dengan pembimbingan terhadap peserta pendidikan dokter)',2),(11,2,'Kegiatan pelaksanaan pendidikan untuk pendidikan dokter klinis (d. Melakukan pemeriksaan dalam dengan pembimbingan terhadap peserta pendidikan dokter)',3),(12,2,'Kegiatan pelaksanaan pendidikan untuk pendidikan dokter klinis (e. Menjadi saksi ahli dengan pembimbingan terhadap peserta pendidikan dokter)',1),(13,3,'Membimbing seminar Mahasiswa (setiap mahasiswa)',1),(14,4,'Membimbing KKN, Praktik Kerja Nyata, Praktik Kerja Lapangan (setiap semester)',1),(15,5,'1.Pembimbing Utama per orang (setiap mahasiswa) a.Disertasi',8),(16,5,'1.Pembimbing Utama per orang (setiap mahasiswa) b.Tesis',3),(17,5,'1.Pembimbing Utama per orang (setiap mahasiswa) c.Skripsi',1),(18,5,'1.Pembimbing Utama per orang (setiap mahasiswa) d.Laporan akhir studi',1),(19,5,'Pembimbing Pendamping/Pembantu per orang (Setiap mahasiswa) a.Disertasi',6),(20,5,'Pembimbing Pendamping/Pembantu per orang (Setiap mahasiswa) a.Tesis',2),(21,5,'Pembimbing Pendamping/Pembantu per orang (Setiap mahasiswa) c.Skripsi',0.5),(22,5,'Pembimbing Pendamping/Pembantu per orang (Setiap mahasiswa) d.Laporan akhir studi',0.5),(23,6,'Bertugas sebagau penguji pada ujian akhir/Profesi*** (setiap mahasiswa) 1.Ketua Penguji',1),(24,6,'Bertugas sebagau penguji pada ujian akhir/Profesi*** (setiap mahasiswa) 2.Anggota Penguji',0.5),(25,7,'Membina kegiatan mahasiswa di bidang akademik dan kemahasiswaan, termasuk dalam kegiatan ini adalah membimbing mahasiswa menghasilkan produk saintifik (Setiap semester)',2),(26,8,'Mengembangkan program kuliah yang mempunyai nilai kebaharuan metode atau substansi (Setiap produk)',2),(27,9,'1.Buku ajar',20),(28,9,'2.Diktat, Modul, Petunjuk praktikum,Model, Alat bantu, Audio visual, Naskah tutorial, Job sheet praktikum terkait dengan mata kuliah yang diampu',5),(29,10,'Menyampaikan orasi ilmiah di tingkat perguruan tinggi',5),(30,11,'1. Rektor',6),(31,11,'2.wakil Rektor/dekan/direktur program pasca sarjana/ketua lembaga',5),(32,11,'3. Ketua sekolah tinggi/pembantu dekan/asisten direktur program pasca sarjana/ direktur politeknik/koordinator kopertis',4),(33,11,'4.Pembantu ketua sekolah tinggi/pembantu direktur politeknik',4),(34,11,'5.Direktur akademi',4),(35,11,'6.Pembantu direktur politeknik, ketua jurusan/bagian pada universitas/institut/sekolah tinggi',3),(36,11,'7.Pembantu direktur akadmei/ketua jurusan/jetua prodi pada universitas/politeknik/akademi,sekretaris jurusan/bagian pada universitas/institut/sekolah tinggi',3),(37,11,'8.Sekretaris jurusan pada politeknik/akademi dan kepala laboratorium (bengkel) universitas/institut/sekolah tinggi/politeknik/akademik',3),(38,12,'1.Pembimbing pencangkokan',2),(39,12,'2. Reguler',1),(40,13,'1.Detasering',5),(41,13,'2.Pencangkokan',4),(42,14,'1.Lamanya lebih dari 960 jam',15),(43,14,'2.Lamanya antara 641-960 jam',9),(44,14,'3.Lamanya antara 481-640 jam',6),(45,14,'4.Lamanya antara 161-480 jam',3),(46,14,'5.Lamanya antara 81-160 jam',2),(47,14,'6.Lamanya antara 30-80 jam',1),(48,14,'7.Lamanya antara 10-30 jam',0.5),(49,15,'Hasil penelitian atau hasil pemikiran yang dipublikasikan dalam bentuk buku 1)Buku referensi',40),(50,15,'Hasil penelitian atau hasil pemikiran yang dipublikasikan dalam bentuk buku 2)Monograf',20),(51,15,'Hasil penelitian atau hasil pemikiran dalam buku yang dipublikasikan dan berisi berbagai tulisan dari berbagai penulisa (book chapter) 1)Internasional',15),(52,15,'Hasil penelitian atau hasil pemikiran dalam buku yang dipublikasikan dan berisi berbagai tulisan dari berbagai penulisa (book chapter) 2)Nasional',10),(53,15,'Hasil penelitian atau hasil pemikiran yang dipublikasikan 1) Jurnal internasional berputasi(terindek pada database internasional bereputasi dan berfaktor dampak)',40),(54,15,'Hasil penelitian atau hasil pemikiran yang dipublikasikan 2)Jurnal internasioanl terindek pada database internasional bereputasi',30),(55,15,'Hasil penelitian atau hasil pemikiran yang dipublikasikan 3)Jurnal internasional terindeks pada database internasional di luar kategori 2)',20),(56,15,'Hasil penelitian atau hasil pemikiran yang dipublikasikan 4)Jurnal Nasional terakreditasi',25),(57,15,'Hasil penelitian atau hasil pemikiran yang dipublikasikan 5)A.Jurnal Nasional berbahasa Indonesia terindek pad DOAJ',15),(58,15,'Hasil penelitian atau hasil pemikiran yang dipublikasikan 5)B.Jurnal Nasional berbahasa Inggris atau bahasa resmi (PBB) terindek pada DOAJ',20),(59,15,'Hasil penelitian atau hasil pemikiran yang dipublikasikan 5)B.Jurnal Nasional berbahasa Inggris atau bahasa resmi (PBB) terindek pada DOAJ',20),(60,15,'Hasil penelitian atau hasil pemikiran yang dipublikasikan 6)Jurnal Nasional',10),(61,15,'Hasil penelitian atau hasil pemikiran yang dipublikasikan 7)Jurnal ilmiah yang ditulis dalam Bahasa Resmi PBB namun tidak memenuhi syarat-syarat sebagai jurnal ilmiah internasional',10),(62,16,'Dipresentasikan secara oral dan dimuat dalam prosiding yang dipublikasikan (ber ISSN/ISBN) 1.Internasional',15),(63,16,'Dipresentasikan secara oral dan dimuat dalam prosiding yang dipublikasikan (ber ISSN/ISBN) 1.Nasional',10),(64,16,'Disajikan dalam bentuk poster dan dimuat dalam prosiding yang dipublikasikan 1)Internasional',15),(65,16,'Disajikan dalam bentuk poster dan dimuat dalam prosiding yang dipublikasikan 2)Nasional',10),(66,16,'Disajikan dalam seminar/simposium/lokakarya, tetapi tidak dimuat dalam prosiding yang dipublikasikan 1)Internasional',5),(67,16,'Disajikan dalam seminar/simposium/lokakarya, tetapi tidak dimuat dalam prosiding yang dipublikasikan 2)Nasional',3),(68,16,'Hasil penelitian/pemikiran yang tidak disajikan dalam seminar/simposium/lokakarya, tetapi dimuat dalam prosiding 1)Internasional',10),(69,16,'Hasil penelitian/pemikiran yang tidak disajikan dalam seminar/simposium/lokakarya, tetapi dimuat dalam prosiding 1)Nasional',5),(70,16,'Hasil penelitian/pemikiran yang disajikan dalam koran/majalah populer/umum',1),(71,17,'Hasil penelitian atau pemikiran atau kerjasama industri yang tidak dipublikasikan (tersimpan dalam perpustakaan)',2),(72,18,'Menerjemahkan/menyadur buku ilmiah yang diterbitkan (ber ISBN)',15),(73,19,'Mengedit/menyunting karya ilmiah dalam bentuk buku yang diterbitkan (ber ISBN)',10),(74,20,'Membuat rancangan dan karya teknologi/seni yang dipatenkan secara nasional atau internasional 1)Internasional (paling sedikit diakui oleh 4 Negara)',60),(75,20,'Membuat rancangan dan karya teknologi/seni yang dipatenkan secara nasional atau internasional 2)Nasional',40),(76,21,'Membuat rancangan dan karya teknologi yang tidak dipatenkan: rancangan dan karya seni monumental/seni pertunjukkan: karya sastra a)Tingkat Internasional',20),(77,21,'Membuat rancangan dan karay teknologi yang tidak dipatenkan: rancangan dan karya seni monumental/seni pertunjukkan: karya sastra b) Tingkat Nasional',15),(78,21,'Membuat rancangan dan karay teknologi yang tidak dipatenkan: rancangan dan karya seni monumental/seni pertunjukkan: karya sastra c)Tingkat lokal',10),(79,22,'Membuat rancangan dan karya seni/seni pertunjukan yang tidak mendapatkan HKI*)',0),(80,23,'Menduduki jabatan pimpinan pada lembaga pemerintahan/pejabat negara yang harus dibebaskan dari jabatan organiknya tiap semester',5.5),(81,24,'Melaksanakan pengembangan hasil pendidikan , dan penelitian yang dapat dimanfaatkan oleh masyarakat/industri setiap program',30),(82,25,'1.Dalam satu semester atau lebih (Tingkat internasional tiap program)',4),(83,25,'1.Dalam satu semester atau lebih b. Tingkat nasional, tiap program',3),(84,25,'1.Dalam satu semester atau lebih c.Tingkat Lokal, tiap program',2),(85,25,'2.Kurang dari satu semester dan minimal satu bulan a.Tingkat Internasional : tiap program',3),(86,25,'2.Kurang dari satu semester dan minimal satu bulan b.Tingkat Nasional, tiap program',2),(87,25,'2.Kurang dari satu semester dan minimal satu bulan c.Tingkat Lokal,tiap program',1),(88,25,'2.Kurang dari satu semester dan minimal satu bulan d.Insidental, tiap kegiatan/program',1),(89,26,'Berdasarkan bidang keahlian,tiap program',1.5),(90,26,'Berdasarkan penugasan lembaga perguruan tinggi, tiap program',1),(91,26,'Berdasarkan fungsi/jabatan tiap program',0.5),(92,27,'Membuat/menulis karya pengabdian pada masyarakat yang tidak dipublikasikan, tiap karya',3),(93,28,'Sebagai Ketua/Wakil Ketua merangkap Anggota, tiap tahun',3),(94,28,'Sebagai Anggota, tiap tahun',2),(95,29,'Panitia Pusat sebagai (Ketua/Wakil ketua, tiap kepanitiaan)',3),(96,29,'Panitia Pusat sebagai (Anggota, tiap kepanitiaan)',2),(97,29,'Panitia Daerah, sebagai (Ketua/Wakil Ketua, tiap kepanitiaan)',2),(98,29,'Panitia Daerah, sebagai (Anggota, tiap kepanitiaan) ',1),(99,30,'Tingkat Internasional, sebagai (Pengurus, tiap periode jabatan**)',2),(100,30,'Tingkat Internasional, sebagai: Anggota atas permintaan, tiap periode jabatan*',1),(101,30,'Tingkat Internasional, sebagai (Anggota, tiap periode jabatan*)',0.5),(102,30,'Tingkat Nasional, sebagai (Pengurus, tiap periode jabatan)',1.5),(103,30,'Tingkat Nasional, sebagai (Anggota, atas permintaan, tiap periode jabatan',1),(104,30,'Tingkat Nasional, sebagai (Anggota, tiap periode jabatan)',1),(105,31,'Mewakili Perguruan Tinggi/Lembaga Pemerintah duduk dalam Panitia Antar Lembaga, tiap kepanitiaan',1),(106,32,'Sebagai Ketua delegasi Nasional ke pertemuan Internasional',3),(107,32,'Sebagai Anggota, tiap kegiatan',2),(108,33,'Editor/dewan penyunting/dewan redaksi jurnal ilmiah internasional',4),(109,33,'Editor/dewan penyunting/dewan redaksi jurnal ilmiah nasional',2),(110,34,'Tingkat Internasional/Nasional/Regional sebagai (Ketua, tiap kegiatan)',3),(111,35,'Tingkat Internasional/Nasional/Regional sebagai(Anggota/peserta, tiap kegiatan)',2),(112,35,'Di lingkungan Perguruan Tinggi sebagai (Ketua, tiap kegiatan)',2),(113,35,'Di lingkungan Perguruan Tinggi sebagai (Anggota/peserta,tiap kegiatan',1),(114,36,'Penghargaan/tanda jasa Satya lencana 30 tahun',3),(115,36,'Penghargaan/tanda jasa Satya lencana 20 tahun',2),(116,36,'Penghargaan/tanda jasa Satya lencana 10 tahun',1),(117,36,'Tingkat Internasional, tiap tanda jasa/penghargaan',5),(118,36,'Tingkat Nasional, tiap tanda jasa/penghargaan',3),(119,36,'Tingkat Daerah/Lokal, tiap tanda jasa/penghargaan',1),(120,37,'Buku SMTA atau setingkat,tiap buku',5),(121,37,'Buku SMTP atau setingkat,tiap buku',5),(122,37,'Buku SD atau setingkat, tiap buku',5),(123,38,'Tingkat Internasinal,tiap piagam/medali',5),(124,38,'Tingkat Nasional,tiap piagam/medali',3),(125,38,'Tingkat Daerah/Lokal,tiap piagam/medali',1),(126,39,'Keanggotaan dalam tim penilai jabatan akademik dosen (tiap semester)',1);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` varchar(30) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
