-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2016 at 04:30 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `civil`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `a_id` int(8) NOT NULL,
  `full_name` varchar(80) NOT NULL,
  `address` varchar(50) NOT NULL,
  `telephone` varchar(12) DEFAULT NULL,
  `dob` date NOT NULL,
  `gender` int(1) NOT NULL,
  `civil_status` int(1) NOT NULL,
  `no_of_children` int(2) DEFAULT NULL,
  `citizenship` int(1) NOT NULL,
  `nic` varchar(15) NOT NULL,
  `nic_issue_date` date NOT NULL,
  `district` varchar(15) NOT NULL,
  `grama_n` varchar(20) NOT NULL,
  `police_area` varchar(20) NOT NULL,
  `occupation` varchar(25) NOT NULL,
  `avg_income` varchar(15) NOT NULL,
  `tax_payer` int(1) NOT NULL,
  `tax_no` varchar(15) DEFAULT NULL,
  `offence` int(1) NOT NULL,
  `stolen_trans` int(1) NOT NULL,
  `guns_in_poss` int(1) NOT NULL,
  `official_weapon` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`a_id`, `full_name`, `address`, `telephone`, `dob`, `gender`, `civil_status`, `no_of_children`, `citizenship`, `nic`, `nic_issue_date`, `district`, `grama_n`, `police_area`, `occupation`, `avg_income`, `tax_payer`, `tax_no`, `offence`, `stolen_trans`, `guns_in_poss`, `official_weapon`) VALUES
(1, 'Nimal Herath', '155, Main Street, Higurakgoda', '0775692365', '1960-04-10', 1, 1, 4, 1, '601234567V', '1977-11-03', 'Polonnaruwa', 'Higurakgoda', 'Higurakgoda', 'Farmer', '800000', 0, '', 1, 0, 0, 0),
(2, 'Charitha Gunathilake', '130, Malkaduwawa, Kurunegala', '0772569741', '1970-11-16', 0, 1, 3, 1, '701234567V', '1987-12-12', 'Kurunegala', 'Malkaduwawa', 'Kurunegala', 'Sub Inspector Police', '1200000', 1, '125548X', 0, 0, 1, 1),
(3, 'Gihan Ekanayake', '124, Kudawewa, Anuradhapura', '0715469685', '1965-08-10', 1, 0, 0, 1, '651234567V', '1983-11-02', 'Anuradhapura', 'Kudawewa', 'Anuradhapura', 'Farmer', '600000', 0, '', 0, 1, 0, 0),
(4, 'Sanath Ekanayake', '145, Uswatakeiyawa, Mahiyanganaya', '0721234567', '1972-09-08', 1, 1, 3, 1, '721234567V', '1988-11-09', 'Badulla', 'Uswatakeiyawa', 'Mahiyanganaya', 'Farmer', '900000', 1, '789654X', 1, 0, 1, 0),
(5, 'Kamal Perera', 'NO123/1,\nMain road,\nKurunegala', '0378901234', '1980-09-05', 1, 1, 2, 1, '80719876541V', '1996-10-10', 'Kurunegala', 'Aluth Malkaduwawa', 'Kurunegala', 'Teacher', '360000', 0, '', 0, 0, 0, 0),
(6, 'Isuru Bandara', '122, Ranwala, Kegalle', '0714564565', '1979-11-10', 1, 1, 1, 1, '791234567V', '1996-12-07', 'Kegalle', 'Ranwala', 'Kegalle', 'Teaching', '360000', 0, '', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `app_id` int(9) NOT NULL,
  `a_id` int(8) NOT NULL,
  `category` varchar(1) NOT NULL,
  `authentications` int(1) NOT NULL,
  `submission_date` date NOT NULL,
  `ad_sec_approval` int(1) NOT NULL,
  `ad_sec_ap_rej_date` date NOT NULL,
  `sec_approval` int(1) NOT NULL,
  `sec_ap_rej_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`app_id`, `a_id`, `category`, `authentications`, `submission_date`, `ad_sec_approval`, `ad_sec_ap_rej_date`, `sec_approval`, `sec_ap_rej_date`) VALUES
(1, 1, '1', 1, '2016-06-02', 0, '0000-00-00', 0, '0000-00-00'),
(2, 2, '2', 0, '2016-07-20', 2, '0000-00-00', 0, '0000-00-00'),
(3, 3, '1', 1, '2016-09-19', 1, '0000-00-00', 0, '0000-00-00'),
(4, 4, '1', 1, '2016-11-16', 1, '0000-00-00', 1, '0000-00-00'),
(5, 5, '1', 1, '2016-12-01', 0, '0000-00-00', 0, '0000-00-00'),
(6, 6, '1', 1, '2016-12-05', 0, '0000-00-00', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `cutivation`
--

CREATE TABLE `cutivation` (
  `c_id` int(8) NOT NULL,
  `a_id` int(8) NOT NULL,
  `land_name` varchar(20) NOT NULL,
  `district` varchar(15) NOT NULL,
  `acres` varchar(15) NOT NULL,
  `crop` varchar(15) NOT NULL,
  `acres_culti_land` varchar(15) NOT NULL,
  `animals` varchar(70) NOT NULL,
  `loss` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cutivation`
--

INSERT INTO `cutivation` (`c_id`, `a_id`, `land_name`, `district`, `acres`, `crop`, `acres_culti_land`, `animals`, `loss`) VALUES
(1, 1, 'Uswatte', 'Polonnaruwa', '3', 'Paddy', '3', 'Elephant, Deer', '300000'),
(2, 3, 'Ambawatte', 'Anuradhapura', '3', 'Mango', '2.5', 'Monkey, Parrot', '300000'),
(3, 4, 'Millagahawatte', 'Badulla', '5', 'Paddy', '5', 'Elephant', '400000'),
(4, 5, 'Miriswatte', 'Kurunegala', '1', 'Chillie', '1', 'Boar', '120000'),
(5, 6, 'Pansalwatte', 'Kegalle', '1', 'Coconut', '1', 'Monkey', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `guns_posse`
--

CREATE TABLE `guns_posse` (
  `p_id` int(6) NOT NULL,
  `a_id` int(8) NOT NULL,
  `acq_date` date NOT NULL,
  `type_nbr` varchar(20) NOT NULL,
  `licence_no` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guns_posse`
--

INSERT INTO `guns_posse` (`p_id`, `a_id`, `acq_date`, `type_nbr`, `licence_no`) VALUES
(1, 2, '2000-11-16', 'Beretta 70S', '15546Z'),
(2, 2, '2000-05-17', 'Benelli Nova', '70046Z'),
(3, 4, '1999-05-12', '32 Calliber', '788965Z'),
(4, 4, '2003-08-18', 'Remington 308', '456985Z');

-- --------------------------------------------------------

--
-- Table structure for table `livestock`
--

CREATE TABLE `livestock` (
  `l_id` int(8) NOT NULL,
  `a_id` int(8) NOT NULL,
  `farm_name` varchar(20) NOT NULL,
  `district_ds_gs` varchar(45) NOT NULL,
  `livestock_type` varchar(15) NOT NULL,
  `farm_value` varchar(15) NOT NULL,
  `loss` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `livestock`
--

INSERT INTO `livestock` (`l_id`, `a_id`, `farm_name`, `district_ds_gs`, `livestock_type`, `farm_value`, `loss`) VALUES
(1, 2, 'CH Farm', 'Kurunegala, Malkaduwawa, Kudagama', 'Cow', '2000000', '600000');

-- --------------------------------------------------------

--
-- Table structure for table `offence`
--

CREATE TABLE `offence` (
  `o_id` int(6) NOT NULL,
  `a_id` int(8) NOT NULL,
  `year` int(4) NOT NULL,
  `court_name` varchar(25) NOT NULL,
  `offence` varchar(30) NOT NULL,
  `judgement` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offence`
--

INSERT INTO `offence` (`o_id`, `a_id`, `year`, `court_name`, `offence`, `judgement`) VALUES
(1, 1, 1990, 'Magistrate', 'Assault', '4 months'),
(2, 4, 2001, 'Magistrate', 'Assault', '1 month'),
(3, 4, 2002, 'Magistrate', 'Theft', '6 months'),
(4, 6, 2000, 'Magistrate', 'Assault', '2 months');

-- --------------------------------------------------------

--
-- Table structure for table `official_weapon`
--

CREATE TABLE `official_weapon` (
  `ow_id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL,
  `type_nbr` varchar(20) NOT NULL,
  `licence_no` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `official_weapon`
--

INSERT INTO `official_weapon` (`ow_id`, `a_id`, `type_nbr`, `licence_no`) VALUES
(1, 2, '1911 Colt 45', '1226996ZX');

-- --------------------------------------------------------

--
-- Table structure for table `stolen_transferred`
--

CREATE TABLE `stolen_transferred` (
  `t_id` int(6) NOT NULL,
  `a_id` int(8) NOT NULL,
  `transfer_date` date NOT NULL,
  `gun_parti` varchar(20) NOT NULL,
  `licence_no` varchar(15) NOT NULL,
  `transf_to` varchar(50) NOT NULL,
  `receipts` varchar(20) NOT NULL,
  `entry_made` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stolen_transferred`
--

INSERT INTO `stolen_transferred` (`t_id`, `a_id`, `transfer_date`, `gun_parti`, `licence_no`, `transf_to`, `receipts`, `entry_made`) VALUES
(1, 3, '2000-11-02', '32 Calliber', '14478Z', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `temp_guns_posse`
--

CREATE TABLE `temp_guns_posse` (
  `id` int(3) NOT NULL,
  `nic` varchar(15) NOT NULL,
  `acq_date` date NOT NULL,
  `type_nbr` varchar(20) NOT NULL,
  `licence_no` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_offence`
--

CREATE TABLE `temp_offence` (
  `id` int(3) NOT NULL,
  `nic` varchar(15) NOT NULL,
  `year` int(4) NOT NULL,
  `court_name` varchar(25) NOT NULL,
  `offence` varchar(30) NOT NULL,
  `judgement` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(15) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `user_level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `first_name`, `last_name`, `password`, `user_level`) VALUES
(1, 'Anu', 'Anu', 'Athu', 'a01610228fe998f515a72dd730294d87', 1),
(3, 'Am', 'Amal', 'Silva', '4297f44b13955235245b2497399d7a93', 2),
(4, 'AA', 'Asitha', 'Perera', '1e48c4420b7073bc11916c6c1de226bb', 3),
(5, 'Ma', 'Anushka', 'A', '81dc9bdb52d04dc20036dbd8313ed055', 4),
(6, 'admin', 'Super', 'Admin', 'a01610228fe998f515a72dd730294d87', 1),
(7, 'secretary', 'Dep', 'Secretaty', '4297f44b13955235245b2497399d7a93', 2),
(8, 'adsecretary', 'Add', 'Secretary', '1e48c4420b7073bc11916c6c1de226bb', 3),
(9, 'clerk', 'Subject', 'Clerk', '81dc9bdb52d04dc20036dbd8313ed055', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`app_id`),
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `cutivation`
--
ALTER TABLE `cutivation`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `guns_posse`
--
ALTER TABLE `guns_posse`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `livestock`
--
ALTER TABLE `livestock`
  ADD PRIMARY KEY (`l_id`),
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `offence`
--
ALTER TABLE `offence`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `official_weapon`
--
ALTER TABLE `official_weapon`
  ADD PRIMARY KEY (`ow_id`),
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `stolen_transferred`
--
ALTER TABLE `stolen_transferred`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `temp_guns_posse`
--
ALTER TABLE `temp_guns_posse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_offence`
--
ALTER TABLE `temp_offence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `a_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `app_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cutivation`
--
ALTER TABLE `cutivation`
  MODIFY `c_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `guns_posse`
--
ALTER TABLE `guns_posse`
  MODIFY `p_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `livestock`
--
ALTER TABLE `livestock`
  MODIFY `l_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `offence`
--
ALTER TABLE `offence`
  MODIFY `o_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `official_weapon`
--
ALTER TABLE `official_weapon`
  MODIFY `ow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `stolen_transferred`
--
ALTER TABLE `stolen_transferred`
  MODIFY `t_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `temp_guns_posse`
--
ALTER TABLE `temp_guns_posse`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `temp_offence`
--
ALTER TABLE `temp_offence`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `applicant` (`a_id`);

--
-- Constraints for table `cutivation`
--
ALTER TABLE `cutivation`
  ADD CONSTRAINT `cutivation_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `applicant` (`a_id`);

--
-- Constraints for table `guns_posse`
--
ALTER TABLE `guns_posse`
  ADD CONSTRAINT `guns_posse_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `applicant` (`a_id`);

--
-- Constraints for table `livestock`
--
ALTER TABLE `livestock`
  ADD CONSTRAINT `livestock_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `applicant` (`a_id`);

--
-- Constraints for table `offence`
--
ALTER TABLE `offence`
  ADD CONSTRAINT `offence_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `applicant` (`a_id`);

--
-- Constraints for table `official_weapon`
--
ALTER TABLE `official_weapon`
  ADD CONSTRAINT `official_weapon_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `applicant` (`a_id`);

--
-- Constraints for table `stolen_transferred`
--
ALTER TABLE `stolen_transferred`
  ADD CONSTRAINT `stolen_transferred_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `applicant` (`a_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
