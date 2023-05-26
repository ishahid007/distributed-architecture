-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 26, 2023 at 11:12 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `deadline` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `title`, `description`, `deadline`, `created_at`, `updated_at`) VALUES
(1, 'Function SolveMeFirst to compute the sum of two integers', '<p></p><div><div><div><p>Complete the function <em><b>solveMeFirst</b></em>&nbsp;to compute the sum of two integers.</p><p><strong>Example</strong><br><br></p><p>Return .</p><p><strong>Function Description</strong></p><p>Complete the <em>solveMeFirst</em>&nbsp;function in the editor below.</p><p><em>solveMeFirst</em>&nbsp;has the following parameters:</p><ul><li><em>int a</em>: the first value</li><li><em>int b</em>: the second value</li></ul><p>Returns<br>- <em>int</em>: the sum of &nbsp;and </p></div></div></div><div><div><p><strong>Constraints</strong></p></div><div><div><p></p></div></div></div><div><div><p><strong>Sample Input</strong></p></div><div><div><pre><code>a = 2\r\nb = 3\r\n</code></pre></div></div></div><div><div><p><strong>Sample Output</strong></p></div><div><div><pre><code>5\r\n</code></pre></div></div></div><div><div><p><strong>Explanation</strong></p></div><div><div>2 + 3 = 5</div></div></div><p></p>', '2023-06-08 00:00:00', '2023-05-25 17:52:03', '2023-05-26 10:39:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
