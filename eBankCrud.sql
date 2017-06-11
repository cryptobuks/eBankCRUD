-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 30, 2017 at 11:28 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `eBankCrud`
--

-- --------------------------------------------------------

--
-- Table structure for table `history_transaction`
--

CREATE TABLE `history_transaction` (
  `id` varchar(20) NOT NULL,
  `user_detailid` int(10) NOT NULL,
  `transact_date` date NOT NULL,
  `transact_time` varchar(5) NOT NULL,
  `transact_type` int(1) NOT NULL,
  `transact_desc` varchar(30) DEFAULT NULL,
  `transact_nominal` int(7) NOT NULL,
  `transact_status` int(1) NOT NULL,
  `transact_rek` int(10) DEFAULT NULL,
  `transact_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history_transaction`
--

INSERT INTO `history_transaction` (`id`, `user_detailid`, `transact_date`, `transact_time`, `transact_type`, `transact_desc`, `transact_nominal`, `transact_status`, `transact_rek`, `transact_name`) VALUES
('kost009-0518w1JYj-a', 1009000009, '2017-05-18', '11:39', 0, 'ini buat bayar utang konser', 10000, 1, 1009000001, 'Transfer ke Rekening CRUD'),
('kost009-0518w1JYj-b', 1009000001, '2017-05-18', '11:39', 1, 'ini buat bayar utang konser', 10000, 1, 1009000009, 'Transfer ke Rekening CRUD'),
('Tang001-05181pU9H-a', 1009000001, '2017-05-18', '10:06', 0, '', 232, 1, 121212, 'Pembayaran Internet'),
('Tang001-05181pU9H-b', 121212, '2017-05-18', '10:06', 1, '', 232, 1, 1009000001, 'Pembayaran Internet'),
('Tang001-05185wtfH-a', 1009000001, '2017-05-18', '09:57', 0, '', 21, 1, 21312, 'Pembayaran Kartu Kredit'),
('Tang001-05185wtfH-b', 21312, '2017-05-18', '09:57', 1, '', 21, 1, 1009000001, 'Pembayaran Kartu Kredit'),
('Tang001-0518A3WSH-a', 1009000001, '2017-05-18', '10:02', 0, 'asda', 121, 1, 21312312, 'Transfer ke Rekening Bank Lain'),
('Tang001-0518A3WSH-b', 21312312, '2017-05-18', '10:02', 1, 'asda', 121, 1, 1009000001, 'Transfer ke Rekening Bank Lain'),
('Tang001-0518bUrvZ-a', 1009000001, '2017-05-18', '10:01', 0, 'sas', 19921, 1, 1009000002, 'Transfer ke Rekening CRUD'),
('Tang001-0518bUrvZ-b', 1009000002, '2017-05-18', '10:01', 1, 'sas', 19921, 1, 1009000001, 'Transfer ke Rekening CRUD'),
('Tang001-0518Dx2tx-a', 1009000001, '2017-05-18', '09:55', 0, '', 21, 1, 21312, 'Pembayaran Kartu Kredit'),
('Tang001-0518Dx2tx-b', 21312, '2017-05-18', '09:55', 1, '', 21, 1, 1009000001, 'Pembayaran Kartu Kredit'),
('Tang001-0518EmDJy-a', 1009000001, '2017-05-18', '09:45', 0, 'ahay', 1231, 1, 1009000003, 'Transfer ke Rekening CRUD'),
('Tang001-0518EmDJy-b', 1009000003, '2017-05-18', '09:45', 1, 'ahay', 1231, 1, 1009000001, 'Transfer ke Rekening CRUD'),
('Tang001-0518fLSn5-a', 1009000001, '2017-05-18', '09:48', 0, 'yangluex', 1201, 1, 1009000002, 'Transfer ke Rekening CRUD'),
('Tang001-0518fLSn5-b', 1009000002, '2017-05-18', '09:48', 1, 'yangluex', 1201, 1, 1009000001, 'Transfer ke Rekening CRUD'),
('Tang001-0518MncZt-a', 1009000001, '2017-05-18', '09:44', 0, '', 7112, 1, 12312312, 'Pembayaran Internet'),
('Tang001-0518MncZt-b', 12312312, '2017-05-18', '09:44', 1, '', 7112, 1, 1009000001, 'Pembayaran Internet'),
('Tang001-0518nqaoO-a', 1009000001, '2017-05-18', '09:49', 0, 'ahay', 1029, 1, 10178201, 'Transfer ke Rekening Bank Lain'),
('Tang001-0518nqaoO-b', 10178201, '2017-05-18', '09:49', 1, 'ahay', 1029, 1, 1009000001, 'Transfer ke Rekening Bank Lain'),
('Tang001-0518OLsDC-a', 1009000001, '2017-05-18', '10:07', 0, '', 29192, 1, 100101, 'Pembayaran Telepon'),
('Tang001-0518OLsDC-b', 100101, '2017-05-18', '10:07', 1, '', 29192, 1, 1009000001, 'Pembayaran Telepon'),
('Tang001-0518q7tBv-a', 1009000001, '2017-05-18', '09:52', 0, '', 21, 1, 21312, 'Pembayaran Kartu Kredit'),
('Tang001-0518q7tBv-b', 21312, '2017-05-18', '09:52', 1, '', 21, 1, 1009000001, 'Pembayaran Kartu Kredit'),
('Tang001-0518qze9k-a', 1009000001, '2017-05-18', '10:10', 0, 'ahay', 18281, 1, 1009000002, 'Transfer ke Rekening CRUD'),
('Tang001-0518qze9k-b', 1009000002, '2017-05-18', '10:10', 1, 'ahay', 18281, 1, 1009000001, 'Transfer ke Rekening CRUD'),
('Tang001-0518symT9-a', 1009000001, '2017-05-18', '09:44', 0, '', 0, 1, NULL, ''),
('Tang001-0518symT9-b', 0, '2017-05-18', '09:44', 1, '', 0, 1, 1009000001, ''),
('Tang001-0518ZX2Uu-a', 1009000001, '2017-05-18', '09:50', 0, '', 2121, 1, 1029181, 'Pembayaran Internet'),
('Tang001-0518ZX2Uu-b', 1029181, '2017-05-18', '09:50', 1, '', 2121, 1, 1009000001, 'Pembayaran Internet'),
('Tang002-05180hTME-a', 1009000002, '2017-05-18', '11:05', 0, 'dfdf', 23, 1, 233223, 'Transfer ke Rekening Bank Lain'),
('Tang002-05180hTME-b', 233223, '2017-05-18', '11:05', 1, 'dfdf', 23, 1, 1009000002, 'Transfer ke Rekening Bank Lain'),
('Tang002-05181X91a-a', 1009000002, '2017-05-18', '10:55', 0, 'sa', 1232, 1, 1009000003, 'Transfer ke Rekening CRUD'),
('Tang002-05181X91a-b', 1009000003, '2017-05-18', '10:55', 1, 'sa', 1232, 1, 1009000002, 'Transfer ke Rekening CRUD'),
('Tang002-05183p3HJ-a', 1009000002, '2017-05-18', '10:54', 0, 'sa', 1232, 1, 1009000003, 'Transfer ke Rekening CRUD'),
('Tang002-05183p3HJ-b', 1009000003, '2017-05-18', '10:54', 1, 'sa', 1232, 1, 1009000002, 'Transfer ke Rekening CRUD'),
('Tang002-05184cLnk-a', 1009000002, '2017-05-18', '10:55', 0, 'sa', 1232, 1, 1009000003, 'Transfer ke Rekening CRUD'),
('Tang002-05184cLnk-b', 1009000003, '2017-05-18', '10:55', 1, 'sa', 1232, 1, 1009000002, 'Transfer ke Rekening CRUD'),
('Tang002-05185LJyC-a', 1009000002, '2017-05-18', '11:14', 0, 'ahay', 3232, 1, 123123, 'Transfer ke Rekening Bank Lain'),
('Tang002-05185LJyC-b', 123123, '2017-05-18', '11:14', 1, 'ahay', 3232, 1, 1009000002, 'Transfer ke Rekening Bank Lain'),
('Tang002-05186hgxF-a', 1009000002, '2017-05-18', '10:57', 0, '', 2000, 1, 1000, 'Pembayaran Telepon'),
('Tang002-05186hgxF-b', 1000, '2017-05-18', '10:57', 1, '', 2000, 1, 1009000002, 'Pembayaran Telepon'),
('Tang002-05189PTBr-a', 1009000002, '2017-05-18', '11:18', 0, 'as', 12, 1, 1009000001, 'Transfer ke Rekening CRUD'),
('Tang002-05189PTBr-b', 1009000001, '2017-05-18', '11:18', 1, 'as', 12, 1, 1009000002, 'Transfer ke Rekening CRUD'),
('Tang002-0518a979s-a', 1009000002, '2017-05-18', '11:04', 0, 'f', 3, 1, 3243, 'Transfer ke Rekening Bank Lain'),
('Tang002-0518a979s-b', 3243, '2017-05-18', '11:04', 1, 'f', 3, 1, 1009000002, 'Transfer ke Rekening Bank Lain'),
('Tang002-0518bh35B-a', 1009000002, '2017-05-18', '11:10', 0, 'as', 12312, 1, 1009000001, 'Transfer ke Rekening CRUD'),
('Tang002-0518bh35B-b', 1009000001, '2017-05-18', '11:10', 1, 'as', 12312, 1, 1009000002, 'Transfer ke Rekening CRUD'),
('Tang002-0518BH7pZ-a', 1009000002, '2017-05-18', '11:27', 0, 'jk', 89, 1, 78687, 'Transfer ke Rekening Bank Lain'),
('Tang002-0518BH7pZ-b', 78687, '2017-05-18', '11:27', 1, 'jk', 89, 1, 1009000002, 'Transfer ke Rekening Bank Lain'),
('Tang002-0518c9c60-a', 1009000002, '2017-05-18', '11:15', 0, 'ahaha', 1232, 1, 1009000003, 'Transfer ke Rekening CRUD'),
('Tang002-0518c9c60-b', 1009000003, '2017-05-18', '11:15', 1, 'ahaha', 1232, 1, 1009000002, 'Transfer ke Rekening CRUD'),
('Tang002-0518dEjyy-a', 1009000002, '2017-05-18', '11:19', 0, 'sad', 323, 1, 123123, 'Transfer ke Rekening Bank Lain'),
('Tang002-0518dEjyy-b', 123123, '2017-05-18', '11:19', 1, 'sad', 323, 1, 1009000002, 'Transfer ke Rekening Bank Lain'),
('Tang002-0518EOeOm-a', 1009000002, '2017-05-18', '11:09', 0, 'sa', 2121, 1, 1009000005, 'Transfer ke Rekening CRUD'),
('Tang002-0518EOeOm-b', 1009000005, '2017-05-18', '11:09', 1, 'sa', 2121, 1, 1009000002, 'Transfer ke Rekening CRUD'),
('Tang002-0518GT5BU-a', 1009000002, '2017-05-18', '11:11', 0, 'ahay', 3232, 1, 123123, 'Transfer ke Rekening Bank Lain'),
('Tang002-0518GT5BU-b', 123123, '2017-05-18', '11:11', 1, 'ahay', 3232, 1, 1009000002, 'Transfer ke Rekening Bank Lain'),
('Tang002-0518LgTbc-a', 1009000002, '2017-05-18', '11:02', 0, 'sdxc', 33, 1, 1009000003, 'Transfer ke Rekening CRUD'),
('Tang002-0518LgTbc-b', 1009000003, '2017-05-18', '11:02', 1, 'sdxc', 33, 1, 1009000002, 'Transfer ke Rekening CRUD'),
('Tang002-0518mMdZp-a', 1009000002, '2017-05-18', '11:29', 0, '', 678, 1, 354354345, 'Pembayaran Telepon'),
('Tang002-0518mMdZp-b', 354354345, '2017-05-18', '11:29', 1, '', 678, 1, 1009000002, 'Pembayaran Telepon'),
('Tang002-0518mQscM-a', 1009000002, '2017-05-18', '10:39', 0, '', 32, 1, 12312, 'Pembayaran Telepon'),
('Tang002-0518mQscM-b', 12312, '2017-05-18', '10:39', 1, '', 32, 1, 1009000002, 'Pembayaran Telepon'),
('Tang002-0518mw57p-a', 1009000002, '2017-05-18', '11:30', 0, '', 657, 1, 123232, 'Pembayaran Telepon'),
('Tang002-0518mw57p-b', 123232, '2017-05-18', '11:30', 1, '', 657, 1, 1009000002, 'Pembayaran Telepon'),
('Tang002-0518nbT6H-a', 1009000002, '2017-05-18', '10:55', 0, 'sa', 1232, 1, 1009000003, 'Transfer ke Rekening CRUD'),
('Tang002-0518nbT6H-b', 1009000003, '2017-05-18', '10:55', 1, 'sa', 1232, 1, 1009000002, 'Transfer ke Rekening CRUD'),
('Tang002-0518Nxp2v-a', 1009000002, '2017-05-18', '08:25', 0, 'buat konser yanglex', 200000, 1, 1009000005, 'Transfer ke Rekening CRUD'),
('Tang002-0518Nxp2v-b', 1009000005, '2017-05-18', '08:25', 1, 'buat konser yanglex', 200000, 1, 1009000002, 'Transfer ke Rekening CRUD'),
('Tang002-0518OOX9U-a', 1009000002, '2017-05-18', '11:09', 0, 'sa', 2121, 1, 1009000005, 'Transfer ke Rekening CRUD'),
('Tang002-0518OOX9U-b', 1009000005, '2017-05-18', '11:09', 1, 'sa', 2121, 1, 1009000002, 'Transfer ke Rekening CRUD'),
('Tang002-0518OWpCw-a', 1009000002, '2017-05-18', '09:03', 0, '', 2000, 1, 2000190, 'Pembayaran Kartu Kredit'),
('Tang002-0518OWpCw-b', 2000190, '2017-05-18', '09:03', 1, '', 2000, 1, 1009000002, 'Pembayaran Kartu Kredit'),
('Tang002-0518oX3he-a', 1009000002, '2017-05-18', '10:58', 0, '', 2000, 1, 1000, 'Pembayaran Telepon'),
('Tang002-0518oX3he-b', 1000, '2017-05-18', '10:58', 1, '', 2000, 1, 1009000002, 'Pembayaran Telepon'),
('Tang002-0518phnUv-a', 1009000002, '2017-05-18', '11:00', 0, 'ahay', 182618, 1, 1009000007, 'Transfer ke Rekening CRUD'),
('Tang002-0518phnUv-b', 1009000007, '2017-05-18', '11:00', 1, 'ahay', 182618, 1, 1009000002, 'Transfer ke Rekening CRUD'),
('Tang002-0518qCBeB-a', 1009000002, '2017-05-18', '11:08', 0, 'sa', 2121, 1, 1009000005, 'Transfer ke Rekening CRUD'),
('Tang002-0518qCBeB-b', 1009000005, '2017-05-18', '11:08', 1, 'sa', 2121, 1, 1009000002, 'Transfer ke Rekening CRUD'),
('Tang002-0518QFJxh-a', 1009000002, '2017-05-18', '11:19', 0, 'sad', 323, 1, 123123, 'Transfer ke Rekening Bank Lain'),
('Tang002-0518QFJxh-b', 123123, '2017-05-18', '11:19', 1, 'sad', 323, 1, 1009000002, 'Transfer ke Rekening Bank Lain'),
('Tang002-0518qTkUW-a', 1009000002, '2017-05-18', '11:10', 0, 'as', 12312, 1, 1009000001, 'Transfer ke Rekening CRUD'),
('Tang002-0518qTkUW-b', 1009000001, '2017-05-18', '11:10', 1, 'as', 12312, 1, 1009000002, 'Transfer ke Rekening CRUD'),
('Tang002-0518RH00f-a', 1009000002, '2017-05-18', '11:06', 0, 's', 6766, 1, 1009000006, 'Transfer ke Rekening CRUD'),
('Tang002-0518RH00f-b', 1009000006, '2017-05-18', '11:06', 1, 's', 6766, 1, 1009000002, 'Transfer ke Rekening CRUD'),
('Tang002-0518sfFEg-a', 1009000002, '2017-05-18', '10:43', 0, '', 23, 1, 12312, 'Pembayaran Kartu Kredit'),
('Tang002-0518sfFEg-b', 12312, '2017-05-18', '10:43', 1, '', 23, 1, 1009000002, 'Pembayaran Kartu Kredit'),
('Tang002-0518UvBks-a', 1009000002, '2017-05-18', '10:38', 0, '', 12312, 1, 21312, 'Pembayaran Kartu Kredit'),
('Tang002-0518UvBks-b', 21312, '2017-05-18', '10:38', 1, '', 12312, 1, 1009000002, 'Pembayaran Kartu Kredit'),
('Tang002-0518WaeDM-a', 1009000002, '2017-05-18', '11:26', 0, 'iuhi', 78, 1, 1009000001, 'Transfer ke Rekening CRUD'),
('Tang002-0518WaeDM-b', 1009000001, '2017-05-18', '11:26', 1, 'iuhi', 78, 1, 1009000002, 'Transfer ke Rekening CRUD'),
('Tang002-0518WBbL6-a', 1009000002, '2017-05-18', '07:29', 0, '', 21, 1, 21312, 'Pembayaran Internet'),
('Tang002-0518WBbL6-b', 21312, '2017-05-18', '07:29', 1, '', 21, 1, 1009000002, 'Pembayaran Internet'),
('Tang002-0518whVUJ-a', 1009000002, '2017-05-18', '11:22', 0, 'sas', 1232, 1, 1009000003, 'Transfer ke Rekening CRUD'),
('Tang002-0518whVUJ-b', 1009000003, '2017-05-18', '11:22', 1, 'sas', 1232, 1, 1009000002, 'Transfer ke Rekening CRUD'),
('Tang002-0518xSyu4-a', 1009000002, '2017-05-18', '11:24', 0, 'dd', 232, 1, 1009000001, 'Transfer ke Rekening CRUD'),
('Tang002-0518xSyu4-b', 1009000001, '2017-05-18', '11:24', 1, 'dd', 232, 1, 1009000002, 'Transfer ke Rekening CRUD'),
('Tang002-0518YrOKZ-a', 1009000002, '2017-05-18', '10:59', 0, '', 232, 1, 123123, 'Pembayaran Telepon'),
('Tang002-0518YrOKZ-b', 123123, '2017-05-18', '10:59', 1, '', 232, 1, 1009000002, 'Pembayaran Telepon'),
('Tang002-0518z0LsX-a', 1009000002, '2017-05-18', '09:00', 0, 'test', 2000, 1, 1009000001, 'Transfer ke Rekening CRUD'),
('Tang002-0518z0LsX-b', 1009000001, '2017-05-18', '09:00', 1, 'test', 2000, 1, 1009000002, 'Transfer ke Rekening CRUD'),
('Tang003-0515ZeFKU-a', 1009000003, '2017-05-15', '10:32', 0, '', 12312, 1, 900010281, 'Pembayaran Kartu Kredit'),
('Tang003-0515ZeFKU-b', 900010281, '2017-05-15', '10:32', 1, '', 12312, 1, 1009000003, 'Pembayaran Kartu Kredit');

-- --------------------------------------------------------

--
-- Table structure for table `list_saved_account`
--

CREATE TABLE `list_saved_account` (
  `id` int(11) NOT NULL,
  `from_account` int(10) NOT NULL,
  `target_account` int(16) NOT NULL,
  `target_type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `list_saved_account`
--

INSERT INTO `list_saved_account` (`id`, `from_account`, `target_account`, `target_type`) VALUES
(1, 1009000002, 1009000001, 1),
(2, 1009000002, 1009000003, 1),
(3, 1009000002, 231312, 2),
(4, 1009000002, 1009000001, 1),
(5, 1009000002, 900121, 2),
(6, 1009000002, 1009000002, 2),
(7, 1009000003, 1009000002, 1),
(8, 1009000002, 1411011015, 2),
(9, 1009000005, 1009000002, 1),
(10, 1009000009, 1009000001, 1);

-- --------------------------------------------------------

--
-- Table structure for table `list_saved_account_pembayaran`
--

CREATE TABLE `list_saved_account_pembayaran` (
  `id` int(10) NOT NULL,
  `from_account` int(10) NOT NULL,
  `target_account` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `list_saved_account_pembayaran`
--

INSERT INTO `list_saved_account_pembayaran` (`id`, `from_account`, `target_account`) VALUES
(1, 1009000002, 14110110),
(2, 1009000002, 1009000001),
(3, 1009000002, 121600),
(4, 1009000002, 10203040),
(5, 1009000002, 909090),
(6, 1009000003, 900010281),
(7, 1009000002, 100900001),
(8, 1009000002, 1231231231);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `userid` int(10) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `gender` varchar(7) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(55) NOT NULL,
  `city` varchar(20) NOT NULL,
  `account_created` date DEFAULT NULL,
  `card_type` varchar(10) NOT NULL,
  `balance` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`userid`, `first_name`, `last_name`, `gender`, `dob`, `phone`, `email`, `address`, `city`, `account_created`, `card_type`, `balance`) VALUES
(0, 'admin', NULL, 'L', '2017-05-09', '0', '0', '0', '0', '2017-05-01', '0', 0),
(1009000001, 'Tommy', 'Miyazaki', 'L', '2017-05-01', '081232123209', 'tommy.miyazaki@student.umn.ac.id', 'Citra raya jalan Raya citra', 'Tangerang', '2017-06-05', '1', 2937243),
(1009000002, 'M. Abdul', 'Ghani', 'L', '2017-05-23', '081515233254', 'ghaneghani@yahoo.com', 'BSD ', 'Tangerang', '2017-06-05', '2', 558849),
(1009000003, 'Yustinus', 'Widya', 'P', '1990-05-17', '02132', 'yustinus.widya@lecture.umn.ac.id', 'UMN', 'Tangerang', '2017-05-09', '1', 12232997),
(1009000004, 'Anthony', 'Nugraha', 'L', '0000-00-00', '08988832994', 'anthony.nugraha@stundent.umn.ac.id', 'Cengkareng', 'Jakarta Ba', '2017-05-18', '3', 988786),
(1009000005, 'Erwin', 'Iswandi', 'L', '1970-01-01', '0812361529', 'erwin.iswandi@student.umn.ac.id', 'Cengkareng', 'Jakarta Barat', '2017-05-18', '1', 476363),
(1009000006, 'William', 'Cendana', 'L', '2017-05-18', '087880501996', 'william.cendana@student.umn.ac.id', 'Sunter', 'Jakarta Timur', '2017-05-18', '1', 1906437),
(1009000007, 'Johannes', 'Harvey', 'L', '2017-10-27', '08125172517', 'johannes.harvei@student.umn.ac.id', 'Tangerang', 'Jakarta', '2017-05-18', '2', 282618),
(1009000009, 'Thomas', 'Kurniawan', 'L', '2017-07-19', '081232323', 'thomas.kurniawan@studen.s', 'tangerang', 'kostan', '2017-05-18', '2', 990000);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `user_account` varchar(15) NOT NULL,
  `user_password` char(40) NOT NULL,
  `user_salt` char(5) NOT NULL,
  `user_lastlogin` text,
  `user_detailid` int(10) DEFAULT NULL,
  `user_priveledge` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_account`, `user_password`, `user_salt`, `user_lastlogin`, `user_detailid`, `user_priveledge`) VALUES
('admin', '685eaf67a2410df40b10a3f44cb5c80e84ebde9b', 'uye', '23 May 2017 07:45:00 PM', 0, 1),
('anthonyNugraha', 'a91c848373cdd705f6ff0d7c760b148623b4ec23', 'zd340', '18 May 2017 09:14:02 AM', 1009000004, 0),
('erwinIswandi', '529f90b2850d8e8ec5c1e538ffaedc3a855e07f4', 'CSYNK', '18 May 2017 01:50:00 AM', 1009000005, 0),
('ghani123', 'dd64ecc2b2c24163e512f71339372cbb6b58d0d2', '123ab', '23 May 2017 07:42:58 PM', 1009000002, 0),
('harvei', '9e09a742cb58a9a9844664aec531dd90b86efc27', 'hbXNx', '18 May 2017 02:16:56 AM', 1009000007, 0),
('tommy123', '81f1a51cec9a35c5365f41007e5dbdf060f7e51a', 'abcde', '18 May 2017 09:18:22 AM', 1009000001, 0),
('wawan', 'cfef8ca32641e7247c18d97c66075bfd9a65f14b', 'QQJGA', '18 May 2017 11:45:30 AM', 1009000009, 0),
('williamCendana', '6b04f746da28a77662a2e5d24509977d12a42c01', 'y6W64', '18 May 2017 09:14:58 AM', 1009000006, 0),
('yww', '07e8129faa0a1ea2fb6aee2c5c9bf095c35b0f08', '123', '23 May 2017 07:43:18 PM', 1009000003, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history_transaction`
--
ALTER TABLE `history_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_saved_account`
--
ALTER TABLE `list_saved_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_saved_account_pembayaran`
--
ALTER TABLE `list_saved_account_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_account`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list_saved_account`
--
ALTER TABLE `list_saved_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `list_saved_account_pembayaran`
--
ALTER TABLE `list_saved_account_pembayaran`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;