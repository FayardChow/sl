-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2018-03-14 14:43:25
-- 服务器版本： 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 5.6.33-3+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sl`
--

-- --------------------------------------------------------

--
-- 表的结构 `user_list`
--

CREATE TABLE `user_list` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL COMMENT '用户名',
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '申请时间',
  `pass` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否通过',
  `checked` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否审核',
  `msg` text COMMENT '回复信息'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `user_list`
--

INSERT INTO `user_list` (`id`, `name`, `time`, `pass`, `checked`, `msg`) VALUES
(1, 'spliter', '2018-03-13 15:42:29', 0, 1, NULL),
(2, '6546', '2018-03-13 15:55:18', 0, 1, NULL),
(3, 'fsdf', '2018-03-13 16:00:33', 0, 1, NULL),
(4, 'fdsf', '2018-03-13 16:01:31', 0, 1, NULL),
(5, 'sdafsdaf', '2018-03-13 20:01:10', 0, 1, NULL),
(6, 'ertyu', '2018-03-13 20:01:35', 1, 1, NULL),
(7, 'sdafsdaf', '2018-03-13 20:03:02', 0, 1, NULL),
(8, 'fdsf', '2018-03-13 20:09:46', 0, 1, NULL),
(9, 'fdsf', '2018-03-13 20:28:26', 0, 1, NULL),
(10, '12345', '2018-03-13 20:30:05', 1, 1, NULL),
(11, 'dsfdfs', '2018-03-13 20:30:15', 0, 1, NULL),
(12, 'ferwerew', '2018-03-13 20:30:18', 1, 1, NULL),
(13, 'gtbg', '2018-03-13 20:31:25', 0, 1, NULL),
(14, 'hgfhgj', '2018-03-13 20:32:09', 1, 1, NULL),
(15, 'fsdfsdfs', '2018-03-13 20:32:16', 1, 1, NULL),
(16, 'fsdfsdf', '2018-03-13 20:32:52', 1, 1, NULL),
(17, 'fsdfdgfbg', '2018-03-13 20:32:58', 0, 1, NULL),
(18, 'jkyjfty', '2018-03-13 20:33:07', 1, 1, NULL),
(19, 'fsdfkjhskhf', '2018-03-13 20:33:16', 1, 1, NULL),
(20, 'fdsfsdfdsf', '2018-03-13 22:32:18', 0, 1, NULL),
(21, 'fsdfsdafa', '2018-03-13 22:42:02', 1, 1, NULL),
(22, 'fasfwere', '2018-03-13 22:42:20', 1, 1, NULL),
(23, 'htghygyjt', '2018-03-13 22:45:47', 1, 1, NULL),
(24, 'dfetgreggfdk', '2018-03-13 22:46:39', 0, 1, NULL),
(25, 'fsdfdsf', '2018-03-13 22:47:55', 1, 1, NULL),
(26, 'fsdfjlsdjfj', '2018-03-13 22:48:02', 0, 1, NULL),
(27, 'fsdjfljsdkf', '2018-03-13 22:48:10', 1, 1, NULL),
(28, 'dfjlsdjf', '2018-03-13 22:54:53', 1, 1, NULL),
(29, 'jdfjsdfjjsdf', '2018-03-13 22:55:00', 1, 1, NULL),
(30, 'jdfhsdfhdshf', '2018-03-13 22:55:12', 0, 1, NULL),
(31, 'fsdfjkhsakdjfh', '2018-03-13 22:55:27', 0, 1, NULL),
(32, '123456', '2018-03-14 13:24:23', 0, 1, NULL),
(33, '258369', '2018-03-14 13:26:36', 1, 1, NULL),
(34, 'dfsdfdsf', '2018-03-14 13:53:21', 0, 1, NULL),
(35, '258369147', '2018-03-14 13:56:25', 0, 1, NULL),
(36, 'dfdgfdggfh', '2018-03-14 14:02:52', 0, 1, NULL),
(37, '258369147258963', '2018-03-14 14:05:08', 0, 1, NULL),
(38, '258369147258963', '2018-03-14 14:16:44', 0, 1, NULL),
(39, '2584', '2018-03-14 14:18:03', 0, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_list`
--
ALTER TABLE `user_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `user_list`
--
ALTER TABLE `user_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
