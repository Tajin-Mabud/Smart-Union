-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 16, 2024 at 09:09 AM
-- Server version: 10.6.19-MariaDB-cll-lve
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zpjijdax_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(1, 'abc@gmail.com', '$2y$10$mP7fjxMvl3paGvz8TzTyGOezD5bU5Y0Jzgaa1wRbIK/wyGdpVDIaO'),
(2, 'admin@admin.com', '$2y$10$BDmHJF4p7EEhTqOXsQVpi.ZZmlS7qx31jNRLrEu5JPVre5d5xqfy6');

-- --------------------------------------------------------

--
-- Table structure for table `bata`
--

CREATE TABLE `bata` (
  `bata_id` int(11) NOT NULL,
  `serial_no` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `word_no` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bata`
--

INSERT INTO `bata` (`bata_id`, `serial_no`, `name`, `father_name`, `phone`, `address`, `word_no`, `value`, `category`) VALUES
(2, 2, 'Rakib', 'AB', '', 'DHaka', '4', '1200 Kg', 'BIDOBA'),
(3, 2, 'Rakib', 'AB', '', 'DHaka', '5', '1200 Kg', 'POTIBONDI'),
(4, 2, 'Rakib', 'AB', '', 'DHaka', '6', '1200 Kg', 'MOTHER'),
(5, 2, 'Rakib', 'AB', '', 'DHaka', '7', '1200 Kg', 'BGD'),
(6, 2, 'Rakib', 'AB', '', 'DHaka', '8', '1200 Kg', 'BOYOSKO');

-- --------------------------------------------------------

--
-- Table structure for table `blood`
--

CREATE TABLE `blood` (
  `blood_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood`
--

INSERT INTO `blood` (`blood_id`, `user_id`, `name`, `blood_group`, `phone`, `address`) VALUES
(20, 3, 'সজিব', 'B+', '01880441836', ''),
(21, 5, 'সজিব', 'B+', '018648', ''),
(22, 6, 'Sojib', 'B+', '01867678', ''),
(23, 7, 'Tajin Mabud ', 'B+', '01868908247', ''),
(24, 8, 'jahin', 'B+', '01636510230', ''),
(25, 9, 'habib', 'B+', '01845403605', ''),
(26, 10, 'sojib', 'B+', '01754287684', ''),
(27, 11, 'ঝহ', 'A-', '01888464804', ''),
(28, 12, 'Tajin', 'O+', '01868908247', '');

-- --------------------------------------------------------

--
-- Table structure for table `chairman`
--

CREATE TABLE `chairman` (
  `chairman_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chairman`
--

INSERT INTO `chairman` (`chairman_id`, `name`, `time`, `phone`, `status`) VALUES
(2, 'SOFTSOFU.COM', '2020', '01880441836', 'বর্তমান'),
(3, 'বকভুল', '২০২০-২০২৫', '010846', 'বর্তমান'),
(4, 'হব', 'ব্ব', 'ব্বব্বব', 'বর্তমান');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `name`, `phone`, `category_id`) VALUES
(1, 'SOJIB', 17533, 1),
(2, 'SOFTSOFU.COM', 1880441836, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_category`
--

CREATE TABLE `doctor_category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctor_category`
--

INSERT INTO `doctor_category` (`category_id`, `name`) VALUES
(1, 'MBBS');

-- --------------------------------------------------------

--
-- Table structure for table `dormo`
--

CREATE TABLE `dormo` (
  `dormo_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dormo`
--

INSERT INTO `dormo` (`dormo_id`, `name`, `address`, `status`) VALUES
(2, 'SOFTSOFU.COM', 'Estern Housing Block L', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `institution`
--

CREATE TABLE `institution` (
  `institution_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `createAt` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `institution`
--

INSERT INTO `institution` (`institution_id`, `name`, `createAt`, `address`, `status`) VALUES
(1, 'চারঘাট সরকারি টেকনিক্যাল স্কুল ও কলেজ', '2024-09-30', 'চারঘাট ', 'কলেজ');

-- --------------------------------------------------------

--
-- Table structure for table `mamber`
--

CREATE TABLE `mamber` (
  `mamber_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `word_no` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mamber`
--

INSERT INTO `mamber` (`mamber_id`, `name`, `time`, `word_no`, `phone`, `status`) VALUES
(2, 'SOJIB', '2020', '2', '01880441836', 'SS'),
(3, 'ZENX SOFTWARE', '2020', '2', '01715883630', 'SS'),
(4, 'SOJIB', '2020', '2', '01880441836', 'বর্তমান'),
(5, 'SOJIB', '2020', '2', '1714-769970', 'সাবেক'),
(6, 'SOJIB', '2020', '2', '01880441836', 'বর্তমান'),
(7, 'SOJIB', '2020', '2', '01880441836', 'বর্তমান'),
(8, 'SOFTSOFU.COM', '2020', 'w', '1714-769970', 'সাবেক'),
(9, 'সজিব', 'ব্ব', 'ব্ব', 'ব্ব', 'বর্তমান');

-- --------------------------------------------------------

--
-- Table structure for table `method`
--

CREATE TABLE `method` (
  `method_id` int(11) NOT NULL,
  `bkash` varchar(255) NOT NULL,
  `nogod` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `method`
--

INSERT INTO `method` (`method_id`, `bkash`, `nogod`) VALUES
(1, '01754288750', '01880441836');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `sonod_id` int(11) NOT NULL,
  `method` varchar(255) NOT NULL,
  `transaction` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_sms`
--

CREATE TABLE `payment_sms` (
  `sms_id` int(11) NOT NULL,
  `sender_id` varchar(255) NOT NULL,
  `sms_details` varchar(255) NOT NULL,
  `creatAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_sms`
--

INSERT INTO `payment_sms` (`sms_id`, `sender_id`, `sms_details`, `creatAt`) VALUES
(1, 'bkash', 'Payment Tk 20.00 to Intercloud Limited-RM4491 is successful. Balance Tk 495.40. TrxID BIQ6VZR9ZO at 26/09/2024 17:36', '2024-09-27 12:55:59'),
(2, '121', 'New offer', '2024-09-27 13:00:34'),
(3, '+8801723401222', 'সমজসজস', '2024-09-27 13:06:13'),
(4, '+8801723401222', 'জডজডজ', '2024-09-27 13:07:38'),
(5, '+8801723401222', 'হয়হসহ', '2024-09-27 13:07:39'),
(6, 'GP 10MIN7TK', 'আজকের অফার ১০মিনিট ৭টাকা ২দিন নিতে ডায়াল *১২১*৫৩১৪# https://mygp.li/aT', '2024-09-27 13:12:08'),
(7, '+8801723401222', 'জসজড', '2024-09-27 13:12:54'),
(8, 'bKash', 'ance Tk 456.40. TrxID BIR5WMUWQ3 at 27/09/2024 13:13', '2024-09-27 13:13:06'),
(9, 'bKash', 'You have received Tk 1.00 from 01760773935. Ref 1. Fee Tk 0.00. Bal', '2024-09-27 13:13:06'),
(10, 'bKash', 'ance Tk 461.40. TrxID BIR2WMZN4Q at 27/09/2024 13:21', '2024-09-27 13:21:52'),
(11, 'bKash', 'You have received Tk 3.00 from 01760773935. Ref 1. Fee Tk 0.00. Bal', '2024-09-27 13:21:52'),
(12, 'bKash', 'You have received Tk 1.00 from 01307067543. Fee Tk 0.00. Balance Tk 462.40. TrxID BIR4WNCIMM at 27/09/2024 13:49', '2024-09-27 13:49:39'),
(13, 'bKash', 'You have received Tk 1.00 from 01760773935. Ref 1. Fee Tk 0.00. Balance Tk 463.40. TrxID BIR1WNCZ4P at 27/09/2024 13:50', '2024-09-27 13:51:04'),
(14, 'GP  ', 'অবশিষ্ট জরুরি ব্যালেন্স 0.4tk মেয়াদ 08/12/2028 পর্যন্তঅবশিষ্ট জরুরি ব্যালেন্স 0.4tk মেয়াদ 08/12/2028 পর্যন্ত', '2024-09-27 14:05:59'),
(15, 'bKash', 'You have received Tk 1.00 from 01307067543. Fee Tk 0.00. Balance Tk 467.40. TrxID BIR8WNPF8K at 27/09/2024 14:07', '2024-09-27 14:07:16'),
(16, 'bkash', 'You have received Tk 100.00 from 01760773935. Ref 1. Fee Tk 0.00. Balance Tk 468.40. TrxID BIR8WO5YMQ at 27/09/2024 14:27', '2024-10-02 17:10:07'),
(19, 'bKash', 'You have received deposit from iBanking of Tk 250.00 from Eastern Bank PLC. Internet Banking. Fee Tk 0.00. Balance Tk 631.40. TrxID BIS612U760 at 28/09/2024 23:25', '2024-09-29 11:40:33'),
(20, 'bKash', 'You have received deposit from iBanking of Tk 30.00 from Eastern Bank PLC. Internet Banking. Fee Tk 0.00. Balance Tk 631.40. TrxID BIR8WO5YMQ at 28/09/2024 23:25', '2024-09-29 11:50:33'),
(21, 'bkash', 'You have received deposit from iBanking of Tk 40.00 from Eastern Bank PLC. Internet Banking. Fee Tk 0.00. Balance Tk 631.40. TrxID BIR8WO5YMQ2 at 28/09/2024 23:25', '2024-09-29 11:50:33');

-- --------------------------------------------------------

--
-- Table structure for table `socib`
--

CREATE TABLE `socib` (
  `isocib_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socib`
--

INSERT INTO `socib` (`isocib_id`, `name`, `phone`) VALUES
(2, 'SOFTSOFU.COM', '01880441836');

-- --------------------------------------------------------

--
-- Table structure for table `sonod`
--

CREATE TABLE `sonod` (
  `sonod_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sonod_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `id_card` varchar(255) NOT NULL,
  `id_card_no` int(11) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `holding_umber` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `condition_status` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `creatAt` datetime NOT NULL DEFAULT current_timestamp(),
  `present_department` varchar(255) NOT NULL,
  `present_district` varchar(255) NOT NULL,
  `present_upazila` varchar(255) NOT NULL,
  `present_postoffice` varchar(255) NOT NULL,
  `present_word_no` varchar(255) NOT NULL,
  `present_village` varchar(255) NOT NULL,
  `old_department` varchar(255) NOT NULL,
  `old_district` varchar(255) NOT NULL,
  `old_upazila` varchar(255) NOT NULL,
  `old_postoffice` varchar(255) NOT NULL,
  `old_word_no` varchar(255) NOT NULL,
  `old_village` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `transaction` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `user_image` blob NOT NULL,
  `document_type` varchar(255) NOT NULL,
  `nid_front` blob NOT NULL,
  `nid_back` blob NOT NULL,
  `birth_certificate` blob NOT NULL,
  `w_name` varchar(255) NOT NULL,
  `w_father` varchar(255) NOT NULL,
  `w_mother` varchar(255) NOT NULL,
  `w_gender` varchar(255) NOT NULL,
  `w_religion` varchar(255) NOT NULL,
  `w_resident_status` varchar(255) NOT NULL,
  `w_district` varchar(255) NOT NULL,
  `w_upazila` varchar(255) NOT NULL,
  `w_post_office` varchar(255) NOT NULL,
  `w_village` varchar(255) NOT NULL,
  `w_word_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sonod`
--

INSERT INTO `sonod` (`sonod_id`, `user_id`, `sonod_name`, `user_name`, `father_name`, `mother_name`, `id_card`, `id_card_no`, `dob`, `holding_umber`, `phone`, `email`, `gender`, `condition_status`, `status`, `creatAt`, `present_department`, `present_district`, `present_upazila`, `present_postoffice`, `present_word_no`, `present_village`, `old_department`, `old_district`, `old_upazila`, `old_postoffice`, `old_word_no`, `old_village`, `payment_method`, `transaction`, `amount`, `payment_status`, `user_image`, `document_type`, `nid_front`, `nid_back`, `birth_certificate`, `w_name`, `w_father`, `w_mother`, `w_gender`, `w_religion`, `w_resident_status`, `w_district`, `w_upazila`, `w_post_office`, `w_village`, `w_word_no`) VALUES
(47, 3, 'নাগরিকত্ব সনদ', 'bbb', 'nbb', 'bbb', 'birth_certificate', 5580, '89', 88, '999', 'mdsojibha78@gmail.com', 'পুরুষ', 'স্থায়ী', 'Pending', '2024-11-16 09:18:13', 'বরিশাল', 'পিরোজপুর', 'কাউখালী', 'hg', '4', 'gg', 'বরিশাল', 'পিরোজপুর', 'কাউখালী', 'hg', '4', 'gg', 'bkash', 'BJ183GQM8D', '30.00', 'Paid', 0x2e2e2f696d616765732f6d656469612f6d616e2d70686f746f5f363733383065663534323363342e6a7067, 'birth_certificate', '', '', 0x2e2e2f696d616765732f6d656469612f62697274685f63657274696669636174655f363733383065663534323837662e6a7067, '', '', '', '', '', '', '', '', '', '', ''),
(48, 3, 'চারিত্রিক সনদ', 'bbb', 'nbb', 'bbb', 'birth_certificate', 5580, '89', 88, '999', 'mdsojibha78@gmail.com', 'পুরুষ', 'স্থায়ী', 'Pending', '2024-11-16 09:18:13', 'বরিশাল', 'পিরোজপুর', 'কাউখালী', 'hg', '4', 'gg', 'বরিশাল', 'পিরোজপুর', 'কাউখালী', 'hg', '4', 'gg', 'bkash', 'BJ183GQM8D', '30.00', 'Paid', '', 'birth_certificate', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(49, 3, 'নাগরিকত্ব সনদ', 'bbb', 'bbb', 'bbb', 'birth_certificate', 99, '999', 999, '9', 'mdsojibha77@gmail.com', 'পুরুষ', 'স্থায়ী', 'Pending', '2024-11-16 07:41:42', 'চট্টগ্রাম', 'চাঁদপুর', 'মতলব উত্তর', 'bb', '4', 'bb', 'চট্টগ্রাম', 'চাঁদপুর', 'মতলব উত্তর', 'bb', '4', 'bb', 'bkash', 'BJ183GQM8N', '30.00', 'Paid', 0x2e2e2f696d616765732f6d656469612f6d616e2d70686f746f5f363733383463623633316339312e6a7067, 'birth_certificate', '', '', 0x2e2e2f696d616765732f6d656469612f62697274685f63657274696669636174655f363733383463623633316434332e6a7067, '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sonod_warishan`
--

CREATE TABLE `sonod_warishan` (
  `warish_id` int(11) NOT NULL,
  `sonod_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `resident_status` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `upazila` varchar(255) NOT NULL,
  `post_office` varchar(255) NOT NULL,
  `village` varchar(255) NOT NULL,
  `word_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `tax_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `father_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `word_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `holding_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `transaction` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `house` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nid` int(11) NOT NULL,
  `createAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`tax_id`, `name`, `father_name`, `phone`, `word_no`, `holding_no`, `amount`, `method`, `transaction`, `status`, `year`, `house`, `nid`, `createAt`) VALUES
(8, 'ব্বব', 'ব্বব', '889', '4', '999', '200', 'bkash', 'BJ183GQM8G', 'PAID', '2023-2024', 'পাকা ঘর', 9999, '2024-11-16 11:41:19'),
(9, 'yh', 'bh', '89', '4', '88', '200', 'bkash', 'BJ183GQM8A', 'PAID', '2025-2026', 'পাকা ঘর', 8, '2024-11-16 11:45:39'),
(10, 'hh', 'hy', '55', '4', '85', '100', 'bkash', 'BJ183GQM8H', 'PAID', '2025-2026', 'আধাপাকা ঘর', 56, '2024-11-16 12:22:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `blood` varchar(255) NOT NULL,
  `createAt` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `phone`, `email`, `password`, `blood`, `createAt`) VALUES
(3, 'সজিব', '01880441836', 'fsojib77@gmail.com', '$2y$10$0BAwX9iyhD7OQ1nVrJ6vbOcSELOIfzznYVLd/Q7GM5HCyuGwwTuoK', 'B+', '2024-09-25'),
(5, 'সজিব', '018648', 'abc@gmail.com', '$2y$10$vuy5GaIi4/dXpAmFYOKo0.hYkhbG7jZzQMR.Ji0xUp4tDRneZIIju', 'B+', '2024-10-01'),
(6, 'Sojib', '01867678', 'absjh@gmail.com', '$2y$10$wlN683R1Hj281bEtMEffx.rImEOZFcStm1QYe6wRN4hKS1rJqpAMu', 'B+', '2024-10-01'),
(7, 'Tajin Mabud ', '01868908247', 'tajinmabud096@gmail.com', '$2y$10$A0AP67Alc2/70i.jXbJsHukiQspN8at8FPuoPAGhA8RS7eKe7sZDm', 'B+', '2024-10-01'),
(8, 'jahin', '01636510230', 'jahin5@gmail.com', '$2y$10$VJK/W0FCpVGGvH4J.7srx./mxX1JUUFbHUL.kQXZbvnHGX28ePzAe', 'B+', '2024-10-01'),
(9, 'habib', '01845403605', 'mohammadhabibullah937@gmail.com', '$2y$10$BQXR6nVySHduiZPUfrP.iOKJiLQ2J58UiXTGUKRnED2kDq7MV8HNy', 'B+', '2024-10-01'),
(10, 'sojib', '01754287684', 'abvc@gmail.com', '$2y$10$FJ4lou4FORrjXwJyPlcbg.kuO3S5zhzjLP.9dPrPWvmaeY5W/V3a2', 'B+', '2024-11-16'),
(11, 'ঝহ', '01888464804', 'mmm@gmail.com', '$2y$10$iwEuoUHvEdL37k5PKEAdGe8OqRiXaESQpTAVze.PM68TDdULf6CRO', 'A-', '2024-11-16'),
(12, 'Tajin', '01868908247', 'rabbifarid.rf@gmail.com', '$2y$10$cCIYbX.HunTtQZdXeqn2vOPpU5EDYmI5b4PJ8xuxpoW5FLEZDaAmW', 'O+', '2024-11-16'),
(13, 'Bagowan Union', '01880886805', 'admin@admin.com', '$2y$10$BtkFsy.y3Zv9Xasp0JUsY.danrgn08qpG34.Q2biD2o/7cBpCu3JG', 'A+', '2024-11-16');

-- --------------------------------------------------------

--
-- Table structure for table `village_police`
--

CREATE TABLE `village_police` (
  `police_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `village_police`
--

INSERT INTO `village_police` (`police_id`, `name`, `phone`) VALUES
(3, 'ZENX SOFTWARES', '01880441836');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bata`
--
ALTER TABLE `bata`
  ADD PRIMARY KEY (`bata_id`);

--
-- Indexes for table `blood`
--
ALTER TABLE `blood`
  ADD PRIMARY KEY (`blood_id`);

--
-- Indexes for table `chairman`
--
ALTER TABLE `chairman`
  ADD PRIMARY KEY (`chairman_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `doctor_category`
--
ALTER TABLE `doctor_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `dormo`
--
ALTER TABLE `dormo`
  ADD PRIMARY KEY (`dormo_id`);

--
-- Indexes for table `institution`
--
ALTER TABLE `institution`
  ADD PRIMARY KEY (`institution_id`);

--
-- Indexes for table `mamber`
--
ALTER TABLE `mamber`
  ADD PRIMARY KEY (`mamber_id`);

--
-- Indexes for table `method`
--
ALTER TABLE `method`
  ADD PRIMARY KEY (`method_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `payment_sms`
--
ALTER TABLE `payment_sms`
  ADD PRIMARY KEY (`sms_id`);

--
-- Indexes for table `socib`
--
ALTER TABLE `socib`
  ADD PRIMARY KEY (`isocib_id`);

--
-- Indexes for table `sonod`
--
ALTER TABLE `sonod`
  ADD PRIMARY KEY (`sonod_id`);

--
-- Indexes for table `sonod_warishan`
--
ALTER TABLE `sonod_warishan`
  ADD PRIMARY KEY (`warish_id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`tax_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `village_police`
--
ALTER TABLE `village_police`
  ADD PRIMARY KEY (`police_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bata`
--
ALTER TABLE `bata`
  MODIFY `bata_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blood`
--
ALTER TABLE `blood`
  MODIFY `blood_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `chairman`
--
ALTER TABLE `chairman`
  MODIFY `chairman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctor_category`
--
ALTER TABLE `doctor_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dormo`
--
ALTER TABLE `dormo`
  MODIFY `dormo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `institution`
--
ALTER TABLE `institution`
  MODIFY `institution_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mamber`
--
ALTER TABLE `mamber`
  MODIFY `mamber_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `method`
--
ALTER TABLE `method`
  MODIFY `method_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_sms`
--
ALTER TABLE `payment_sms`
  MODIFY `sms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `socib`
--
ALTER TABLE `socib`
  MODIFY `isocib_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sonod`
--
ALTER TABLE `sonod`
  MODIFY `sonod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `sonod_warishan`
--
ALTER TABLE `sonod_warishan`
  MODIFY `warish_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `tax_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `village_police`
--
ALTER TABLE `village_police`
  MODIFY `police_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
