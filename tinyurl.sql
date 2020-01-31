-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2020 at 02:39 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tinyurl`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_1`
--

CREATE TABLE `table_1` (
  `transaction_id` int(11) NOT NULL,
  `t_input_url` varchar(2084) COLLATE utf8_unicode_ci NOT NULL,
  `t_output_url` varchar(2084) COLLATE utf8_unicode_ci NOT NULL,
  `t_timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `table_1`
--

INSERT INTO `table_1` (`transaction_id`, `t_input_url`, `t_output_url`, `t_timestamp`, `user_id`) VALUES
(1, 'http://localhost/friday/oop/practice/index.php', 'https://sho.rt/ipedilo', '2020-01-30 07:35:32', 19),
(2, 'http://localhost/friday/oop/practice/index.php', 'https://sho.rt/doochsa', '2020-01-30 07:37:26', 19),
(3, 'http://localhost/friday/oop/practice/index.php', 'https://sho.rt/ohceehr', '2020-01-30 07:38:33', 19),
(4, 'http://localhost/friday/oop/practice/index.php', 'https://sho.rt/rdihndy', '2020-01-30 07:39:39', 19),
(5, 'http://localhost/friday/oop/practice/index.php', 'https://sho.rt/ohycopt', '2020-01-30 07:40:23', 19),
(6, 'http://localhost/friday/oop/practice/index.php', 'https://sho.rt/tpcdaip', '2020-01-30 07:40:31', 19),
(7, 'http://localhost/friday/oop/practice/index.php', 'https://sho.rt/optcitp', '2020-01-30 07:40:55', 19),
(8, 'http://localhost/friday/oop/practice/index.php', 'https://sho.rt/ppolopc', '2020-01-30 07:41:03', 19),
(9, 'http://localhost/friday/oop/practice/index.php', 'https://sho.rt/cslccht', '2020-01-30 07:41:17', 19),
(10, 'http://localhost/friday/oop/practice/index.php', 'https://sho.rt/pifhitp', '2020-01-30 07:41:42', 19),
(11, 'http://localhost/friday/oop/practice/index.php', 'https://sho.rt/faphlpr', '2020-01-30 07:42:41', 19),
(12, 'http://localhost/friday/oop/practice/index.php', 'https://sho.rt/cthepdr', '2020-01-30 07:43:25', 19),
(13, 'http://localhost/friday/oop/practice/index.php', 'https://sho.rt/opxttfd', '2020-01-30 07:43:37', 19),
(14, 'http://localhost/friday/oop/practice/index.php', 'https://sho.rt/faoppld', '2020-01-30 07:44:19', 19),
(15, 'http://localhost/friday/oop/practice/index.php', 'https://sho.rt/ppacooh', '2020-01-30 07:47:08', 19),
(16, 'http://localhost/friday/oop/practice/index.php', 'https://sho.rt/tpcaota', '2020-01-30 07:47:34', 19),
(17, 'http://localhost/friday/oop/practice/index.php', 'https://sho.rt/eohoptc', '2020-01-30 07:50:02', 19),
(18, 'http://localhost/friday/oop/practice/index.php', 'https://sho.rt/ocatett', '2020-01-30 08:52:03', 20),
(19, 'http://localhost/friday/oop/practice/index.php', 'https://sho.rt/ptltiey', '2020-01-30 08:52:08', 20),
(20, 'http://localhost/friday/oop/practice/index.php', 'https://sho.rt/tixpeah', '2020-01-30 08:52:12', 20),
(21, 'http://localhost/friday/oop/practice/index.php', 'https://sho.rt/ippdlce', '2020-01-30 08:52:16', 20),
(22, 'http://localhost/friday/oop/practice/index.php', 'https://sho.rt/ooytdno', '2020-01-30 11:25:54', 20),
(23, 'http://localhost/friday/oop/practice/index.php', 'https://sho.rt/ateccnh', '2020-01-30 11:26:48', 20),
(24, 'http://localhost/friday/oop/practice/index.php', 'https://sho.rt/cptooir', '2020-01-30 11:31:51', 20),
(25, 'http://localhost/friday/oop/practice/index.php', 'https://sho.rt/ttihscr', '2020-01-30 15:07:06', 21),
(26, 'http://localhost/friday/oop/practice/', 'https://sho.rt/taoipre', '2020-01-30 15:16:39', 21);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `userName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `userPassword` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `accountStamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `userName`, `userPassword`, `email`, `accountStamp`) VALUES
(1, '0', '123', 'test@test.com', '2020-01-29 23:50:48'),
(2, 'test2', 'Az12345678', 'ahmed@ahmed.fom', '2020-01-30 02:23:59'),
(3, 'usertest', 'Ab123456789', 'user@test.com', '2020-01-30 04:07:41'),
(4, 'usertest2', 'Ac12345670934', 'ayman@email.com', '2020-01-30 04:12:25'),
(5, 'testuser', 'Ac12321392138', 'test@email.com', '2020-01-30 04:13:40'),
(6, 'test3', 'Gh12323536382', 'test3@email.com', '2020-01-30 04:15:55'),
(7, 'test22', 'Ah12321309213', 'test22@test.com', '2020-01-30 04:16:35'),
(8, 'test222', 'Ac1232132132131', 'test222@emailtest.com', '2020-01-30 04:18:15'),
(9, 'Ameilia', 'Am1232132901', 'test@amy.com', '2020-01-30 04:20:16'),
(10, 'ayman_test', 'Aj12321321321321', 'ayman@test.com', '2020-01-30 04:21:57'),
(11, 'test120', 'Ak12321312321', 'test@120.com', '2020-01-30 04:23:41'),
(12, 'test130', 'Iw280932109312', 'tab@test.com', '2020-01-30 04:24:11'),
(13, 'testnew', '12345676Ac', 'new@test.com', '2020-01-30 04:38:26'),
(14, 'testnew2', 'Af12321393-12', 'new2@test.com', '2020-01-30 04:38:48'),
(15, 'testnew22', 'Jk12321932132', 'new22@test.com', '2020-01-30 04:39:02'),
(16, 'testnew222', 'dsadksaJ1289012', 'new222@test.com', '2020-01-30 04:39:20'),
(17, 'Ahmed', 'Ahmed12345', 'ahmed@email.com', '2020-01-30 07:10:37'),
(18, 'test150', 'Aj123232103221', 'test150@email.com', '2020-01-30 07:31:24'),
(19, 'test300', 'Ac12321321321', 'test300@email.com', '2020-01-30 07:35:09'),
(20, 'testfinal', 'Ra1234567', 'test@final.com', '2020-01-30 08:51:45'),
(21, 'test_user_123', 'Ko123456789', 'test_user_123@email.com', '2020-01-30 15:06:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_1`
--
ALTER TABLE `table_1`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_1`
--
ALTER TABLE `table_1`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
