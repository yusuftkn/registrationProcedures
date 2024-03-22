-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 22 Mar 2024, 13:54:08
-- Sunucu sürümü: 5.7.33
-- PHP Sürümü: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `students_grading_system`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `student_number` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `grade` int(11) NOT NULL,
  `grade2` int(11) NOT NULL,
  `gradeAverage` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `grades`
--

INSERT INTO `grades` (`id`, `student_number`, `course_name`, `semester`, `grade`, `grade2`, `gradeAverage`, `created_at`) VALUES
(1, '886', 'Mollie Dixon', '3', 71, 55, 61, '2024-03-17 00:04:41'),
(2, '196', 'Zelenia Houston', 'Aut quo laudantium ', 80, 44, 58, '2024-03-17 15:52:13'),
(3, '452', 'Aimee Holt', '1', 33, 77, 59, '2024-03-17 15:53:59'),
(9, '612', 'Elmo Riddle', 'Cum beatae culpa ex', 63, 0, 25, '2024-03-17 22:03:39'),
(11, '708', 'Rajah Davenport', 'Excepturi dolore dig', 22, 0, 9, '2024-03-17 23:09:09'),
(12, '302', 'Berk Olsen', '3', 73, 0, 29, '2024-03-18 12:36:01'),
(15, '430', 'Ezekiel Roberson', 'Odit dolorem laudant', 69, 22, 41, '2024-03-18 15:20:26'),
(16, '988', 'Unity Santana', '5', 99, 0, 40, '2024-03-18 15:20:39'),
(17, '814', 'Beck Clements', 'Consectetur unde et', 26, 0, 10, '2024-03-18 16:16:39'),
(18, '219', 'Joy Wilcox', '2', 77, 0, 31, '2024-03-18 20:27:37'),
(19, '9', 'Justina Sheppard', 'Sint occaecat sunt', 45, 35, 39, '2024-03-19 13:22:01'),
(20, '408', 'Karina Aguirre', 'Quia incididunt dolo', 74, 19, 41, '2024-03-19 14:19:15'),
(21, '498', 'Nichole Osborne', '3', 33, 74, 58, '2024-03-19 14:55:52'),
(22, '925', 'Mary Roach', '2', 67, 20, 39, '2024-03-19 22:47:53'),
(24, '496', 'Hu Ball', '3', 75, 22, 43, '2024-03-22 13:15:21'),
(26, '505', 'Moses Haynes', '3', 32, 21, 25, '2024-03-22 13:40:56'),
(27, '821', 'Felix Kss', '3', 41, 48, 45, '2024-03-22 13:42:20');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `student_number` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `student_number`, `created_at`) VALUES
(1, 'Herman', 'Wilkins', '851', '2024-03-17 22:48:09'),
(2, 'Neville', 'Nichols', '707', '2024-03-17 22:53:04'),
(3, 'TaShya', 'Short', '584', '2024-03-17 22:53:43'),
(4, 'Willa', 'Allison', '636', '2024-03-17 22:54:06'),
(5, 'Martha', 'Clarke', '85', '2024-03-17 22:55:25'),
(6, 'Blossom', 'Berger', '546', '2024-03-18 00:20:05'),
(7, 'Tate', 'Gross', '653', '2024-03-18 00:20:18'),
(9, 'Clio', 'Mann', '946', '2024-03-19 14:38:56');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`) VALUES
(1, 'yusuf', 'tekin', 'ysftkn@gmail.com', '$2y$10$j9lTDQ.UmRNNCvU.oleVdue8CQUbP8ZgvUgV0d4YXf6Jl01U8g1dC');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Tablo için AUTO_INCREMENT değeri `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
