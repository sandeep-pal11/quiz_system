-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2025 at 05:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(80) NOT NULL,
  `password` varchar(40) NOT NULL,
  `role` varchar(30) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(5, 'atulpatil3737@gmail.com', '123456', 'admin', '2025-12-05', '2025-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `creator` varchar(30) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `creator`, `created_at`, `updated_at`) VALUES
(10, 'Coding', 'atulpatil3737@gmail.com', '2025-12-05', '2025-12-05'),
(11, 'Aptitude & Reasoning', 'atulpatil3737@gmail.com', '2025-12-05', '2025-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `mcqs`
--

CREATE TABLE `mcqs` (
  `id` int(30) NOT NULL,
  `question` varchar(500) NOT NULL,
  `a` varchar(300) NOT NULL,
  `b` varchar(300) NOT NULL,
  `c` varchar(300) NOT NULL,
  `d` varchar(300) NOT NULL,
  `correct_ans` varchar(20) NOT NULL,
  `admin_id` int(10) NOT NULL,
  `quiz_id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  `right_answer` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mcqs`
--

INSERT INTO `mcqs` (`id`, `question`, `a`, `b`, `c`, `d`, `correct_ans`, `admin_id`, `quiz_id`, `category_id`, `updated_at`, `created_at`, `right_answer`) VALUES
(52, 'What is the correct way to create a set in Python?', '{}', '[]', 'set()', '()', 'c', 5, 32, 10, '2025-12-05', '2025-12-05', NULL),
(53, 'What is output of the following?\r\nprint(type(lambda x: x))', 'function', 'lambda', '<class \'function\'>', '<class \'lambda\'>', 'c', 5, 32, 10, '2025-12-05', '2025-12-05', NULL),
(54, 'Which of the following is immutable?', 'List', 'Dictionary', 'Tuple', 'Set', 'c', 5, 32, 10, '2025-12-05', '2025-12-05', NULL),
(55, 'What will be the output of the following code?\r\nx = [1, 2, 3]\r\ny = x\r\ny.append(4)\r\nprint(x)', '[1, 2, 3]', '[4, 3, 2, 1]', '[1, 2, 3, 4]', 'Error', 'c', 5, 32, 10, '2025-12-05', '2025-12-05', NULL),
(56, 'What does *args represent in a function?', 'Optional keyword arguments', 'List of default values', 'Variable number of positional arguments', 'List of default values', 'c', 5, 32, 10, '2025-12-05', '2025-12-05', NULL),
(57, 'What will range(5) return?', '[0, 1, 2, 3, 4, 5]', '[1, 2, 3, 4, 5]', 'range object', '(0, 1, 2, 3, 4)', 'c', 5, 32, 10, '2025-12-05', '2025-12-05', NULL),
(58, 'Which module is used for working with JSON data?', 'os', 'pickle', 'json', 'csv', 'c', 5, 32, 10, '2025-12-05', '2025-12-05', NULL),
(59, 'What will be printed?\r\nprint(bool([]))', 'True', 'None', 'False', '0', 'c', 5, 32, 10, '2025-12-05', '2025-12-05', NULL),
(60, 'Which method is used to add an item to a list?', '.push()', '.insert()', '.append()', '.add()', 'c', 5, 32, 10, '2025-12-05', '2025-12-05', NULL),
(61, 'Which one is not a valid Python loop?', 'for', 'while', 'do-while', 'Both A & B', 'c', 5, 32, 10, '2025-12-05', '2025-12-05', NULL),
(62, 'Which of the following is used to handle exceptions in PHP?', 'throw...catch', 'try...catch', 'error...catch', 'try...error', 'b', 5, 33, 10, '2025-12-05', '2025-12-05', NULL),
(63, 'What will be the output?\r\n$a = \"5\";\r\n$b = 5;\r\necho ($a === $b);', 'True', 'False', '1', 'Error', 'b', 5, 33, 10, '2025-12-05', '2025-12-05', NULL),
(64, 'Which function is used to remove the last element from an array?', 'array_shift()', 'array_pop()', 'array_push()', 'unset()', 'b', 5, 33, 10, '2025-12-05', '2025-12-05', NULL),
(65, 'Which of the following is true about sessions?', 'Data stored on the browser', 'Data stored on the server', 'Temporary cookie storage', 'It cannot store user info', 'b', 5, 33, 10, '2025-12-05', '2025-12-05', NULL),
(66, 'Which of the following retrieves the number of affected rows in MySQLi?', 'mysqli_num_rows()', 'mysqli_affected_rows()', 'mysqli_count_rows()', 'affected_rows()', 'b', 5, 33, 10, '2025-12-05', '2025-12-05', NULL),
(67, 'What does final keyword do in a class method?', 'Makes it execute twice', 'Blocks overriding in child class', 'Blocks calling from objects', 'Makes method static', 'b', 5, 33, 10, '2025-12-05', '2025-12-05', NULL),
(68, 'What is the purpose of isset() function?', 'Checks only variable existence', 'Checks if variable exists AND is not null', 'Checks if variable type is string', 'Creates a variable if missing', 'b', 5, 33, 10, '2025-12-05', '2025-12-05', NULL),
(69, 'What will be the output?\r\nfunction test($x = 10){\r\n    return $x * 2;\r\n}\r\necho test();', '10', '20', 'Error', 'NULL', 'b', 5, 33, 10, '2025-12-05', '2025-12-05', NULL),
(70, 'Which of the following is used for secure database connection in PHP?', 'MySQL', 'PDO', 'mysqli_*', 'SQL Secure', 'b', 5, 33, 10, '2025-12-05', '2025-12-05', NULL),
(71, 'What will be printed?\r\n$arr = [1, 2, 3, 4];\r\necho count($arr, 1);', '5', '4', '8', '6', 'b', 5, 33, 10, '2025-12-05', '2025-12-05', NULL),
(72, 'Number Series\r\n4, 9, 16, 25, ?', '37', '35', '38', '39', 'a', 5, 34, 11, '2025-12-05', '2025-12-05', NULL),
(73, 'Analogy\r\nChair : Sitting :: Bed : ?', 'Sleeping', 'Writing', 'Standing', 'Eating', 'a', 5, 34, 11, '2025-12-05', '2025-12-05', NULL),
(74, 'Odd One Out', '8', '27', '64', '125', 'a', 5, 34, 11, '2025-12-05', '2025-12-05', NULL),
(75, 'Direction Sense\r\nA girl walks 7m north, then 24m east. What is the shortest distance to reach the starting point?', '25m', '30m', '26m', '24m', 'a', 5, 34, 11, '2025-12-05', '2025-12-05', NULL),
(76, 'Logical Series\r\n5, 11, 23, 47, ?', '95', '83', '99', '94', 'a', 5, 34, 11, '2025-12-05', '2025-12-05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mcq_records`
--

CREATE TABLE `mcq_records` (
  `id` int(30) NOT NULL,
  `record_id` int(40) NOT NULL,
  `user_id` int(10) NOT NULL,
  `mcq_id` int(10) NOT NULL,
  `select_answer` varchar(50) NOT NULL,
  `is_correct` int(10) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(11) NOT NULL,
  `name` varchar(400) NOT NULL,
  `category_id` int(30) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `name`, `category_id`, `updated_at`, `created_at`) VALUES
(32, 'Python Basics to Advanced Quiz', 10, '2025-12-05', '2025-12-05'),
(33, 'PHP Basics to Advanced Quiz', 10, '2025-12-05', '2025-12-05'),
(34, 'Aptitude & Reasoning Skill Test', 11, '2025-12-05', '2025-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(20) NOT NULL,
  `quiz_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `status` int(20) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `quiz_id`, `user_id`, `status`, `updated_at`, `created_at`) VALUES
(55, 32, 17, 1, '2025-12-05', '2025-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `active` int(10) NOT NULL DEFAULT 1,
  `updated_at` date DEFAULT NULL,
  `correct_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mcqs`
--
ALTER TABLE `mcqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mcq_records`
--
ALTER TABLE `mcq_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mcqs`
--
ALTER TABLE `mcqs`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `mcq_records`
--
ALTER TABLE `mcq_records`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
