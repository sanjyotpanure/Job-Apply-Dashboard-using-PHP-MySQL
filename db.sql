-- phpMyAdmin version: 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- PHP Version: 7.3.21

--
-- Database: `projects`
--

-- --------------------------------------------------------

--
-- Table structure for table 'jobregistration'
--

CREATE TABLE `jobregistration` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `refer` varchar(50) NOT NULL,
  `planguage` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
  
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

