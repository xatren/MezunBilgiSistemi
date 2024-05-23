-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 23 May 2024, 14:46:28
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `internetproje`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `egitimbilgileri`
--

CREATE TABLE `egitimbilgileri` (
  `Ogrenci_NO` int(11) DEFAULT NULL,
  `AkademikEgitim` varchar(255) DEFAULT NULL,
  `Baslangic` date DEFAULT NULL,
  `Bitis` date DEFAULT NULL,
  `Ulke` varchar(255) DEFAULT NULL,
  `Sehir` varchar(255) DEFAULT NULL,
  `Universite` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `egitimbilgileri`
--

INSERT INTO `egitimbilgileri` (`Ogrenci_NO`, `AkademikEgitim`, `Baslangic`, `Bitis`, `Ulke`, `Sehir`, `Universite`) VALUES
(123122, 'DK', '2323-03-12', '2333-03-12', 'Turkey', 'Istanbul', 'KarabükÜni'),
(1, 'Yüksek Lisans', '2018-09-01', '2020-06-15', 'Türkiye', 'Ankara', 'Ankara Üniversitesi'),
(2, 'Doktora', '2017-01-15', '2019-05-20', 'Türkiye', 'İstanbul', 'İstanbul Üniversitesi'),
(3, 'Lisans', '2015-09-01', '2019-07-10', 'Türkiye', 'İzmir', 'Ege Üniversitesi'),
(4, 'Yüksek Lisans', '2016-10-01', '2018-09-05', 'Türkiye', 'Antalya', 'Akdeniz Üniversitesi'),
(5, 'Doktora', '2020-02-01', '2022-01-30', 'Türkiye', 'Bursa', 'Uludağ Üniversitesi'),
(6, 'Yüksek Lisans', '2021-02-01', '2023-02-15', 'Türkiye', 'Gaziantep', 'Gaziantep Üniversitesi'),
(7, 'Doktora', '2019-05-01', '2021-05-25', 'Türkiye', 'Mersin', 'Mersin Üniversitesi'),
(8, 'Lisans', '2016-11-01', '2020-11-10', 'Türkiye', 'Trabzon', 'Karadeniz Teknik Üniversitesi'),
(9, 'Yüksek Lisans', '2018-12-01', '2019-12-20', 'Türkiye', 'Adana', 'Çukurova Üniversitesi'),
(10, 'Doktora', '2019-06-01', '2022-06-30', 'Türkiye', 'Kayseri', 'Erciyes Üniversitesi'),
(11, 'Lisans', '2017-08-01', '2021-08-05', 'Türkiye', 'Eskişehir', 'Anadolu Üniversitesi'),
(12, 'Yüksek Lisans', '2018-03-01', '2020-03-15', 'Türkiye', 'Konya', 'Selçuk Üniversitesi'),
(13, 'Doktora', '2020-09-01', '2022-09-25', 'Türkiye', 'Denizli', 'Pamukkale Üniversitesi'),
(14, 'Lisans', '2015-04-01', '2019-04-10', 'Türkiye', 'Kocaeli', 'Kocaeli Üniversitesi'),
(15, 'Yüksek Lisans', '2018-12-01', '2020-12-20', 'Türkiye', 'Samsun', 'Ondokuz Mayıs Üniversitesi'),
(16, 'Doktora', '2017-01-15', '2020-06-15', 'ABD', 'New York', 'New York Üniversitesi'),
(17, 'Doktora', '2016-05-01', '2019-05-20', 'İngiltere', 'Londra', 'Londra Üniversitesi'),
(18, 'Doktora', '2018-07-01', '2021-07-10', 'Kanada', 'Toronto', 'Toronto Üniversitesi'),
(19, 'Doktora', '2015-09-05', '2018-09-05', 'Almanya', 'Berlin', 'Humboldt Üniversitesi'),
(20, 'Doktora', '2019-02-01', '2022-01-30', 'Fransa', 'Paris', 'Sorbonne Üniversitesi'),
(21, 'Yüksek Lisans', '2019-01-15', '2021-06-15', 'ABD', 'New York', 'Columbia Üniversitesi'),
(22, 'Yüksek Lisans', '2018-05-01', '2020-05-20', 'İngiltere', 'Oxford', 'Oxford Üniversitesi'),
(23, 'Yüksek Lisans', '2020-07-01', '2022-07-10', 'Kanada', 'Vancouver', 'British Columbia Üniversitesi'),
(24, 'Yüksek Lisans', '2017-09-05', '2019-09-05', 'Almanya', 'Münih', 'Münih Teknik Üniversitesi'),
(25, 'Yüksek Lisans', '2021-02-01', '2023-01-30', 'Fransa', 'Lyon', 'Lyon Üniversitesi'),
(26, 'Lisans', '2013-09-01', '2017-06-15', 'Türkiye', 'Ankara', 'Hacettepe Üniversitesi'),
(27, 'Lisans', '2014-09-01', '2018-05-20', 'Türkiye', 'İstanbul', 'İstanbul Üniversitesi'),
(28, 'Lisans', '2015-09-01', '2019-07-10', 'Türkiye', 'İzmir', 'Ege Üniversitesi'),
(29, 'Lisans', '2012-09-01', '2016-09-05', 'Türkiye', 'Antalya', 'Akdeniz Üniversitesi'),
(30, 'Lisans', '2011-09-01', '2015-01-30', 'Türkiye', 'Bursa', 'Uludağ Üniversitesi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `isbilgileri`
--

CREATE TABLE `isbilgileri` (
  `Ogrenci_NO` int(11) DEFAULT NULL,
  `IseGirisTarihi` date DEFAULT NULL,
  `IstenAyrilisTarihi` date DEFAULT NULL,
  `Kamu_Ozel` varchar(255) DEFAULT NULL,
  `Sektor` varchar(255) DEFAULT NULL,
  `Unvan` varchar(255) DEFAULT NULL,
  `Pozisyon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `isbilgileri`
--

INSERT INTO `isbilgileri` (`Ogrenci_NO`, `IseGirisTarihi`, `IstenAyrilisTarihi`, `Kamu_Ozel`, `Sektor`, `Unvan`, `Pozisyon`) VALUES
(123122, '2222-03-12', '2123-03-21', 'ee', 'eeqwe', 'asd', 'wqeqwe'),
(1, '2020-07-01', '2022-06-15', 'Özel', 'Bilişim', 'Yazılım Mühendisi', 'Uzman'),
(2, '2019-06-01', '2021-05-20', 'Kamu', 'Eğitim', 'Araştırma Görevlisi', 'Araştırmacı'),
(3, '2021-08-01', '2023-07-10', 'Özel', 'Sağlık', 'Doktor', 'Uzman Doktor'),
(4, '2018-10-01', '2020-09-05', 'Kamu', 'Mühendislik', 'Makine Mühendisi', 'Mühendis'),
(5, '2022-02-01', '2024-01-30', 'Özel', 'Finans', 'Finans Uzmanı', 'Uzman'),
(6, '2023-03-01', '2025-02-15', 'Özel', 'Teknoloji', 'Proje Yöneticisi', 'Yönetici'),
(7, '2021-06-01', '2023-05-25', 'Kamu', 'Sağlık', 'Hemşire', 'Uzman Hemşire'),
(8, '2020-12-01', '2022-11-10', 'Özel', 'Eğitim', 'Öğretmen', 'Sınıf Öğretmeni'),
(9, '2019-01-01', '2021-12-20', 'Kamu', 'Tarım', 'Ziraat Mühendisi', 'Mühendis'),
(10, '2022-07-01', '2024-06-30', 'Özel', 'Finans', 'Mali Müşavir', 'Uzman'),
(11, '2021-09-01', '2023-08-05', 'Kamu', 'Savunma', 'Subay', 'Teğmen'),
(12, '2020-04-01', '2022-03-15', 'Özel', 'Hizmet', 'Müşteri Temsilcisi', 'Temsilci'),
(13, '2022-10-01', '2024-09-25', 'Kamu', 'Bilim', 'Araştırma Görevlisi', 'Araştırmacı'),
(14, '2019-05-01', '2021-04-10', 'Özel', 'İnşaat', 'Mimar', 'Baş Mimar'),
(15, '2020-01-01', '2022-12-20', 'Kamu', 'Enerji', 'Elektrik Mühendisi', 'Mühendis'),
(26, '2020-07-01', NULL, 'Özel', 'Teknoloji', 'Yazılım Mühendisi', 'Uzman'),
(27, '2021-06-01', NULL, 'Kamu', 'Eğitim', 'Öğretmen', 'Uzman Öğretmen'),
(28, '2022-08-01', NULL, 'Özel', 'Finans', 'Mali Müşavir', 'Uzman'),
(29, '2019-01-01', NULL, 'Kamu', 'Sağlık', 'Doktor', 'Uzman Doktor'),
(30, '2018-07-01', NULL, 'Özel', 'Hizmet', 'Müşteri Temsilcisi', 'Uzman Temsilci'),
(16, '2021-07-01', NULL, 'Özel', 'Teknoloji', 'Araştırma Mühendisi', 'Uzman'),
(17, '2020-06-01', NULL, 'Kamu', 'Eğitim', 'Araştırma Görevlisi', 'Araştırmacı'),
(19, '2019-10-01', NULL, 'Özel', 'Sağlık', 'Biyomedikal Mühendisi', 'Uzman'),
(21, '2022-08-01', NULL, 'Özel', 'Finans', 'Finansal Analist', 'Uzman'),
(22, '2021-09-01', NULL, 'Kamu', 'Hukuk', 'Hukuk Danışmanı', 'Danışman'),
(24, '2020-12-01', NULL, 'Özel', 'Bilişim', 'Veri Bilimci', 'Uzman'),
(18, '2022-01-01', NULL, 'Özel', 'Araştırma', 'Araştırma Bilimcisi', 'Uzman'),
(20, '2023-03-01', NULL, 'Kamu', 'Akademik', 'Profesör', 'Akademisyen'),
(23, '2023-05-01', NULL, 'Özel', 'Bilişim', 'Sistem Mühendisi', 'Mühendis'),
(25, '2024-01-01', NULL, 'Kamu', 'Araştırma', 'Laboratuvar Teknisyeni', 'Teknisyen');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenciler`
--

CREATE TABLE `ogrenciler` (
  `Ogrenci_NO` int(11) NOT NULL,
  `AD` varchar(50) DEFAULT NULL,
  `Soyad` varchar(50) DEFAULT NULL,
  `Mezuniyet_Tarihi` date DEFAULT NULL,
  `CepTel` varchar(15) DEFAULT NULL,
  `Eposta` varchar(100) DEFAULT NULL,
  `EvTel` varchar(15) DEFAULT NULL,
  `EvUlke` varchar(50) DEFAULT NULL,
  `EvSehir` varchar(50) DEFAULT NULL,
  `EvAdress` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `ogrenciler`
--

INSERT INTO `ogrenciler` (`Ogrenci_NO`, `AD`, `Soyad`, `Mezuniyet_Tarihi`, `CepTel`, `Eposta`, `EvTel`, `EvUlke`, `EvSehir`, `EvAdress`) VALUES
(1, 'Ahmet', 'Yılmaz', '2020-06-15', '05321234567', 'ahmet.yilmaz@example.com', '03124567890', 'Türkiye', 'Ankara', 'Kızılay, Çankaya'),
(2, 'Ayşe', 'Kara', '2019-05-20', '05339876543', 'ayse.kara@example.com', '03124561234', 'Türkiye', 'İstanbul', 'Kadıköy, İstanbul'),
(3, 'Mehmet', 'Demir', '2021-07-10', '05345678901', 'mehmet.demir@example.com', '03127894561', 'Türkiye', 'İzmir', 'Konak, İzmir'),
(4, 'Elif', 'Çelik', '2018-09-05', '05347654321', 'elif.celik@example.com', '03121234567', 'Türkiye', 'Antalya', 'Muratpaşa, Antalya'),
(5, 'Fatma', 'Öz', '2022-01-30', '05346543210', 'fatma.oz@example.com', '0312245678', 'Türkiye', 'Bursa', 'Osmangazi, Bursa'),
(7, 'John', 'Doe', '2022-06-10', '05321234567', 'john.doe@example.com', '03124567890', 'USA', 'New York', 'Manhattan, NY'),
(8, 'Jane', 'Smith', '2021-08-15', '05339876543', 'jane.smith@example.com', '03124561234', 'UK', 'London', 'Westminster, London'),
(9, 'Alice', 'Johnson', '2020-12-20', '05345678901', 'alice.johnson@example.com', '03127894561', 'Canada', 'Toronto', 'Downtown, Toronto'),
(10, 'Bob', 'Brown', '2023-03-25', '05347654321', 'bob.brown@example.com', '03121234567', 'Germany', 'Berlin', 'Mitte, Berlin'),
(11, 'Charlie', 'Davis', '2019-11-30', '05346543210', 'charlie.davis@example.com', '0312245678', 'France', 'Paris', 'Eiffel, Paris'),
(12, 'Emily', 'Clark', '2021-04-10', '05321234567', 'emily.clark@example.com', '03124567890', 'Australia', 'Sydney', 'CBD, Sydney'),
(13, 'Daniel', 'Lewis', '2020-07-15', '05339876543', 'daniel.lewis@example.com', '03124561234', 'Italy', 'Rome', 'Centro, Rome'),
(14, 'Sophia', 'Hall', '2019-10-20', '05345678901', 'sophia.hall@example.com', '03127894561', 'Spain', 'Madrid', 'Centro, Madrid'),
(15, 'James', 'Young', '2022-02-25', '05347654321', 'james.young@example.com', '03121234567', 'Netherlands', 'Amsterdam', 'Centrum, Amsterdam'),
(16, 'Oliver', 'King', '2023-05-30', '05346543210', 'oliver.king@example.com', '0312245678', 'Sweden', 'Stockholm', 'Norrmalm, Stockholm'),
(17, 'Mustafa', 'Kurt', '2022-08-15', '05321234567', 'mustafa.kurt@example.com', '03124567890', 'Türkiye', 'Ankara', 'Bahçelievler, Çankaya'),
(18, 'Zeynep', 'Çelik', '2021-07-10', '05339876543', 'zeynep.celik@example.com', '03124561234', 'Türkiye', 'İstanbul', 'Beşiktaş, İstanbul'),
(19, 'Murat', 'Demir', '2020-09-20', '05345678901', 'murat.demir@example.com', '03127894561', 'Türkiye', 'İzmir', 'Bornova, İzmir'),
(20, 'Esra', 'Güneş', '2023-06-25', '05347654321', 'esra.gunes@example.com', '03121234567', 'Türkiye', 'Antalya', 'Konyaaltı, Antalya'),
(21, 'Emre', 'Yıldız', '2022-11-30', '05346543210', 'emre.yildiz@example.com', '0312245678', 'Türkiye', 'Bursa', 'Nilüfer, Bursa'),
(22, 'Gamze', 'Koç', '2021-04-10', '05325678901', 'gamze.koc@example.com', '03129876543', 'Türkiye', 'Gaziantep', 'Şehitkamil, Gaziantep'),
(23, 'Cem', 'Arslan', '2023-05-15', '05321234567', 'cem.arslan@example.com', '03124567890', 'Türkiye', 'Kayseri', 'Melikgazi, Kayseri'),
(24, 'Selin', 'Aydın', '2020-03-20', '05339876543', 'selin.aydin@example.com', '03124561234', 'Türkiye', 'Adana', 'Seyhan, Adana'),
(25, 'Eren', 'Şahin', '2022-12-25', '05345678901', 'eren.sahin@example.com', '03127894561', 'Türkiye', 'Trabzon', 'Ortahisar, Trabzon');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'user1', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, 'user2', '202cb962ac59075b964b07152d234b70'),
(3, 'test', '123');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ogrenciler`
--
ALTER TABLE `ogrenciler`
  ADD PRIMARY KEY (`Ogrenci_NO`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ogrenciler`
--
ALTER TABLE `ogrenciler`
  MODIFY `Ogrenci_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123123136;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
