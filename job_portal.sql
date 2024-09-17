-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2024 at 06:45 AM
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
-- Database: `job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Engineering', 1, '2024-07-12 03:24:18', '2024-07-12 03:24:18'),
(2, 'Accountant', 1, '2024-07-12 03:24:18', '2024-07-12 03:24:18'),
(3, 'Information Technology', 1, '2024-07-12 03:24:18', '2024-07-12 03:24:18'),
(4, 'Fashion designing', 1, '2024-07-12 03:24:18', '2024-07-12 03:24:18'),
(5, 'Web Developer ', 1, '2024-07-12 03:24:18', '2024-07-12 03:24:18');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `job_type_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `vacancy` int(11) NOT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `benefits` text DEFAULT NULL,
  `responsibility` text DEFAULT NULL,
  `qualifications` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `experience` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_location` varchar(255) DEFAULT NULL,
  `company_website` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `isFeatured` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `category_id`, `job_type_id`, `user_id`, `vacancy`, `salary`, `location`, `description`, `benefits`, `responsibility`, `qualifications`, `keywords`, `experience`, `company_name`, `company_location`, `company_website`, `status`, `isFeatured`, `created_at`, `updated_at`) VALUES
(48, 'PHP Developer', 5, 1, 35, 2, '40000 - 60000', 'shahrah e faisal', '<p>We are looking for a skilled PHP Laravel Web Developer to join our dynamic team. As a PHP Laravel Developer, you will be responsible for developing and maintaining web applications using the Laravel framework. You will work closely with our design and development teams to deliver high-quality, scalable, and secure applications that meet our clients\' needs.<br></p>', '<p><p>Competitive salary and performance-based bonuses.</p></p><p>Health, dental, and vision insurance.</p><p>Flexible working hours and remote work options.</p><p>Professional development opportunities, including training and certifications.</p><p>Friendly and collaborative work environment.</p><p>Opportunities to work on challenging and exciting projects.</p><p>Paid time off and holidays.</p>', '<ul style=\"color: rgb(105, 105, 105); font-family: Inter-Regular; outline: none !important;\"><li>Develop, maintain, and enhance web applications using PHP and the Laravel framework.</li><li>Collaborate with front-end developers to integrate user-facing elements with server-side logic.</li><li>Design and implement RESTful APIs for our applications.</li><li>Optimize application performance and troubleshoot issues.</li><li>Write clean, maintainable, and well-documented code.</li><li style=\"outline: none !important;\">Participate in code reviews and provide constructive feedback to other developers.</li><li>Stay up-to-date with industry trends and best practices in web development.</li><li>Work with databases like MySQL to design efficient data storage solutions.</li></ul>', '<p><ul><li>Proven experience as a PHP Developer with a strong understanding of Laravel.</li><li>Familiarity with front-end technologies such as HTML, CSS, JavaScript, and frameworks like Vue.js or React is a plus.</li><li>Experience with version control systems like Git.</li><li>Strong understanding of object-oriented programming (OOP) principles.</li><li>Familiarity with RESTful APIs and JSON.</li><li>Excellent problem-solving skills and attention to detail.</li><li>Ability to work independently and as part of a team.</li><li>Good communication skills and the ability to collaborate with both technical and non-technical team members.</li><li>A degree in Computer Science, Information Technology, or a related field is preferred but not required.</li></ul></p>', 'php , Laravel , mysql', '1', 'techitsystem', 'shahrah e faisal', 'www.techitsys.com', 1, 0, '2024-08-23 03:47:05', '2024-08-23 03:47:05'),
(49, 'Front-End Developer', 5, 5, 35, 1, '30000 - 60000', 'shahrah e faisal', '<p>We are looking for a talented Front-End Developer to create and maintain user interfaces for our web applications.<br></p>', '<p>Competitive salary.</p><p>Health and dental insurance.</p><p>Flexible working hours.</p>', '<p><ul><li>Develop responsive and interactive user interfaces using HTML, CSS, and JavaScript.</li><li>Collaborate with back-end developers to integrate UI components with APIs.</li><li>Optimize applications for maximum speed and scalability.</li></ul></p>', '<p>Proficiency in HTML, CSS, JavaScript, and front-end frameworks (e.g., React, Vue.js).</p><p>Experience with version control systems like Git.</p><p>Understanding of UX/UI design principles.</p>', 'html , css , javascript', 'Fresher', 'techitsystem', 'shahrah e faisal', 'www.techitsys.com', 1, 0, '2024-08-23 03:50:12', '2024-08-23 03:50:12'),
(50, 'Full Stack Developer', 5, 3, 35, 1, '50000', 'Gulistan Juhar', '<p>We are seeking a Full Stack Developer who can work on both front-end and back-end components of our web applications.<br></p>', '<p>Competitive salary with bonuses.</p><p>Health benefits.</p><p>Remote work options.</p>', '<p>Develop and maintain full-stack applications using PHP/Laravel, JavaScript, and SQL.</p><p>Collaborate with designers and other developers to create scalable solutions.</p><p>Ensure code quality and perform code reviews.</p>', '<p>Strong experience with PHP/Laravel and JavaScript frameworks (e.g., React, Angular).</p><p>Knowledge of databases (MySQL, PostgreSQL).</p><p>Familiarity with cloud services (AWS, Azure).</p>', 'php , Laravel , mysql', '2', 'techgroup', 'Gulistane Juhar', 'www.techgroup .com', 1, 1, '2024-08-23 03:52:03', '2024-08-23 04:33:12'),
(51, 'Back-End Developer', 5, 2, 35, 1, '60000', 'Gulistan Juhar', '<p>We need a skilled Back-End Developer to handle server-side logic and database management for our applications.<br></p>', '<p>Attractive salary package.</p><p>Health insurance.</p><p>Career growth opportunities.</p>', '<p>Develop and maintain server-side logic using PHP and Laravel.</p><p>Design and manage databases, ensuring data integrity and security.</p><p>Collaborate with front-end developers to integrate user-facing elements.</p>', '<p>Proficiency in PHP, Laravel, and MySQL.</p><p>Understanding of RESTful APIs.</p><p>Strong problem-solving abilities.</p>', 'php , Laravel , mysql, .NET', '1', 'techgroup', 'Gulistane Juhar', 'www.techgroup .com', 1, 0, '2024-08-23 03:53:52', '2024-08-23 03:53:52'),
(52, 'UI/UX Designer', 5, 4, 35, 1, '50000', 'shahrah e faisal', '<p>Join our team as a UI/UX Designer to create intuitive and visually appealing designs for our web and mobile applications.<br></p>', '<p>Competitive salary.</p><p>Health benefits.</p><p>Work-life balance with flexible hours.</p>', '<p><ul><li>Design user interfaces and experiences that meet user needs.</li><li>Conduct user research and testing to improve designs.</li><li>Collaborate with developers to ensure designs are implemented correctly.</li></ul></p>', '<p><ul><li>Strong portfolio demonstrating UI/UX design skills.</li><li>Proficiency in design tools (e.g., Sketch, Figma, Adobe XD).</li><li>Understanding of responsive design principles.</li></ul></p>', 'ui, ux , html ,css', '1', 'techitsystem', 'shahrah e faisal', 'www.techitsys.com', 1, 0, '2024-08-23 03:55:46', '2024-08-23 03:55:46'),
(53, 'DevOps Engineer', 5, 1, 35, 1, '50000', 'Gulistan Juhar', '<p>We are hiring a DevOps Engineer to manage infrastructure and automate our deployment processes.</p><p><br></p>', '<p>Competitive salary.</p><p>Health and dental insurance.</p><p>Opportunities for professional development.</p>', '<p><ul><li><font color=\"#212529\" face=\"Mont-Regular\">Automate and manage CI/CD pipelines.</font></li><li><font color=\"#212529\" face=\"Mont-Regular\">Monitor and optimize cloud infrastructure (AWS, Azure).</font></li><li><font color=\"#212529\" face=\"Mont-Regular\">Collaborate with developers to streamline deployment processes.</font></li></ul></p>', '<p><ul><li>Experience with CI/CD tools (e.g., Jenkins, GitLab).</li><li>Proficiency in cloud platforms (AWS, Azure).</li><li>Strong scripting skills (Bash, Python).</li></ul></p>', 'python, azure , AWS', '3', 'devenset', 'Gulistane Juhar', 'www.devenset .com', 1, 0, '2024-08-23 03:58:38', '2024-08-23 03:58:38'),
(54, 'Senior PHP Developer', 5, 5, 35, 1, '50000', 'Gulistan Iqbal', '<p>We are looking for a Senior PHP Developer to lead the development of robust and scalable web applications.<br></p>', '<p><ul><li>Competitive salary.</li><li>Comprehensive health benefits.</li><li>Professional growth opportunities</li></ul></p>', '<p><ul><li>Design and develop high-performance PHP applications using Laravel.</li><li>Mentor junior developers and conduct code reviews.</li><li>Collaborate with cross-functional teams to deliver projects on time.</li></ul></p>', '<p><ul><li>Extensive experience with PHP and Laravel.</li><li>Strong understanding of RESTful APIs and OOP principles.</li><li>Excellent problem-solving skills and leadership experience.</li></ul></p>', 'php , Laravel , mysql', '1', 'devenset', 'Gulistan Iqbal', 'www.devenset .com', 1, 0, '2024-08-23 04:01:37', '2024-08-23 04:01:37'),
(55, 'JavaScript Developer (React)', 5, 3, 35, 2, '70000', 'Gulistan Iqbal', '<p>We are seeking a JavaScript Developer with expertise in React to build dynamic front-end applications.<br></p>', '<p><ul><li>Competitive salary package.</li><li>Flexible work environment.</li><li>Health and dental insurance.</li></ul></p>', '<p><ul><li>Develop responsive web applications using JavaScript and React.</li><li>Optimize components for performance and scalability.</li><li>Collaborate with UX/UI designers to implement user-friendly interfaces.</li></ul></p>', '<p><ul><li>Proficiency in JavaScript, React, and Redux.</li><li>Experience with RESTful APIs and version control (e.g., Git).</li><li>Strong knowledge of front-end development best practices.</li></ul></p>', 'react , javascript , html ,css', '1', 'devenset', 'Gulistan Iqbal', 'www.devenset .com', 1, 0, '2024-08-23 04:04:02', '2024-08-23 04:04:02'),
(56, 'DevOps Specialist', 5, 1, 35, 1, '50000', 'shahrah e faisal', '<p>Join our team as a DevOps Specialist to manage and automate our cloud infrastructure and CI/CD pipelines.<br></p>', '<p><ul><li>Competitive salary.</li><li>Health and wellness benefits.</li><li>Opportunities for continuous learning and development.</li></ul></p>', '<p><ul><li>Implement and manage CI/CD pipelines using tools like Jenkins or GitLab.</li><li>Automate cloud infrastructure on AWS or Azure.</li><li>Monitor and optimize application performance and security.</li></ul></p>', '<p><ul><li>Experience with CI/CD tools and cloud platforms like AWS.</li><li>Proficient in scripting languages such as Python or Bash.</li><li>Strong understanding of containerization (e.g., Docker, Kubernetes).</li></ul></p>', 'python, bash', '4', 'techitsystem', 'shahrah e faisal', 'www.techitsys.com', 1, 0, '2024-08-23 04:05:56', '2024-08-23 04:05:56'),
(57, 'Full-Stack Web Developer', 5, 1, 35, 1, '100000', 'Gulistan Juhar', '<p>We are looking for a Full-Stack Web Developer with a strong command of both front-end and back-end technologies.</p><p><br></p>', '<p></p><ul><li>Competitive compensation.</li><li>Health benefits and paid time off.</li><li>Remote work flexibility.</li></ul><p></p>', '<p></p><ul><li>Develop and maintain web applications using PHP and JavaScript.</li><li>Work with MySQL and Laravel for back-end development.</li><li>Integrate front-end interfaces using HTML, CSS, and JavaScript frameworks.</li></ul><p></p>', '<p></p><ul><li>Strong experience with PHP/Laravel and JavaScript/React.</li><li>Proficiency in database management with MySQL.</li><li>Knowledge of front-end technologies and responsive design.</li></ul><p></p>', 'php , Laravel , mysql', '5', 'techgroup', 'Gulistane Juhar', 'www.techgroup .com', 1, 0, '2024-08-23 04:08:20', '2024-08-23 04:19:19'),
(58, 'Cybersecurity Engineer', 5, 2, 35, 1, '100000 -  200000', 'shahrah e faisal', '<p><strong>We are hiring a Cybersecurity Engineer to safeguard our web applications and data infrastructure.</strong><br></p>', '<p></p><ol><li>Competitive salary.</li><li>Health and dental coverage.</li><li>Continuous training and certification opportunities.</li></ol><p></p>', '<p></p><p></p><ul><li>Implement security measures to protect applications from threats.</li><li>Conduct vulnerability assessments and penetration testing.</li><li>Monitor network and application security using SIEM tools.</li></ul><p></p><p></p>', '<p></p><ul><li>Experience with cybersecurity tools and technologies.</li><li>Proficient in network security and application security practices.</li><li>Knowledge of SIEM, firewalls, and encryption technologies.</li></ul><p></p>', 'SIEM, firewalls', '3', 'devenset', 'shahrah e faisal', 'www.devenset .com', 1, 0, '2024-08-23 04:11:53', '2024-08-23 04:19:05'),
(59, 'Mobile App Developer (iOS/Android)', 5, 5, 35, 1, '50000', 'Gulistan Iqbal', '<p>We are looking for a Mobile App Developer with expertise in iOS and Android development.<br></p>', '<p></p><ul><li>Competitive salary.</li><li>Health insurance.</li><li>Flexible working conditions.</li></ul><p></p>', '<p></p><ul><li>Design and develop mobile applications for iOS and Android platforms.</li><li>Collaborate with UI/UX designers to create intuitive mobile interfaces.</li><li>Optimize applications for performance and responsiveness.</li></ul><p></p>', '<p></p><ul><li>Strong experience with Swift/Objective-C (iOS) or Java/Kotlin (Android).</li><li>Knowledge of RESTful APIs and mobile app architecture.</li><li>Familiarity with version control (e.g., Git).</li></ul><p></p>', 'flutter, dart , java , kotlin , swift/objective-C', '2', 'carriervibe', 'Gulistan Iqbal', 'www.carriervibe.com', 1, 1, '2024-08-23 04:14:47', '2024-08-23 04:18:48');

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `employer_id` bigint(20) UNSIGNED NOT NULL,
  `applied_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cv_path` varchar(255) DEFAULT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `job_id`, `user_id`, `employer_id`, `applied_date`, `created_at`, `updated_at`, `cv_path`, `message`) VALUES
(26, 49, 37, 35, '2024-08-23 05:03:25', '2024-08-23 05:03:25', '2024-08-23 05:03:25', 'cv_uploads/kAwgJGdGf9bcpE8CevocAjewAmz3i39Mx1JtnAIb.pdf', 'hi'),
(27, 49, 38, 35, '2024-08-23 15:19:33', '2024-08-23 15:19:33', '2024-08-23 15:19:33', 'cv_uploads/KZktabC5mSiiZDr9tavT4xLtLDv3WE6lko6tk26m.pdf', 'hello'),
(28, 49, 39, 35, '2024-08-23 15:22:45', '2024-08-23 15:22:45', '2024-08-23 15:22:45', 'cv_uploads/bEeWk42NbAsE1nNucjNpTiX3AczZXYTgzFBEmQ0E.pdf', 'hello'),
(29, 49, 40, 35, '2024-08-23 15:24:45', '2024-08-23 15:24:45', '2024-08-23 15:24:45', 'cv_uploads/HabUgv0pDpUHrxz6LkEszhaWAOHUNmWEO2CetPTh.pdf', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Full Time', 1, '2024-07-12 03:24:18', '2024-07-12 03:24:18'),
(2, 'Part Time\n', 1, '2024-07-12 03:24:18', '2024-07-12 03:24:18'),
(3, 'Freelance', 1, '2024-07-12 03:24:18', '2024-07-12 03:24:18'),
(4, 'Remote', 1, '2024-07-12 03:24:18', '2024-07-12 03:24:18'),
(5, 'Contract ', 1, '2024-07-12 03:24:18', '2024-07-12 03:24:18');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_application_id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `job_application_id`, `sender_id`, `receiver_id`, `message`, `created_at`, `updated_at`) VALUES
(5, 29, 40, 35, 'hi', '2024-08-23 22:52:52', '2024-08-23 22:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_07_12_080515_create_categories_table', 2),
(6, '2024_07_12_080610_create_job_types_table', 2),
(7, '2024_07_12_080626_create_jobs_table', 2),
(8, '2024_07_12_093035_alter_jobs_table', 3),
(9, '2024_07_12_101526_alter_jobs_table', 4),
(10, '2024_07_22_091308_create_job_applications_table', 5),
(11, '2024_07_23_105529_create_saved_jobs_table', 6),
(12, '2024_07_30_094653_alter_users_table', 7),
(13, '2024_08_04_122737_add_cv_path_and_message_to_job_applications_table', 8),
(14, '2024_08_09_063405_create_messages_table', 9),
(15, '2024_08_13_150330_create_messages_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('ali@test.com', 'kqtTZaZaZDbdWrr3EA2VhYgJRB74MKiaqturbfEOGmuC2Onv8b11rwxXxg9d', '2024-08-03 03:42:20'),
('elmer.harvey@example.com', 'TIV7ZRo9j4hdqUG6VRogs0BBvR0KDSzpQdu5z2gsenzgeRjRnHjNYfdRBaDu', '2024-08-05 07:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `saved_jobs`
--

CREATE TABLE `saved_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saved_jobs`
--

INSERT INTO `saved_jobs` (`id`, `job_id`, `user_id`, `created_at`, `updated_at`) VALUES
(21, 49, 39, '2024-08-23 15:22:24', '2024-08-23 15:22:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `role` enum('admin','user','employer') NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `designation`, `mobile`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(35, 'Fahad', 'fahad123@gmail.com', NULL, '$2y$12$KpUrPy8tjqH4cC.DdM9ApOH5gejTIGliDu229eXkHCjPzGWXuVegS', NULL, NULL, NULL, 'employer', NULL, '2024-08-23 03:44:06', '2024-08-23 03:44:06'),
(36, 'admin', 'admin@test.com', NULL, '$2y$12$omZKPc/aEoJnejrWpKWoJe7TIxGVSacUPIQzTWQ8.bgcMPFFknfgW', NULL, NULL, NULL, 'admin', NULL, '2024-08-23 04:17:56', '2024-08-23 04:17:56'),
(37, 'ALI FAROOQI', 'ali@test.com', NULL, '$2y$12$5DGpQgNLPRbZ1GmwHVTF2e/JtuPT3NjOxKGr8aXcOkApMJZ02sVGG', NULL, NULL, NULL, 'user', NULL, '2024-08-23 04:34:29', '2024-08-23 04:34:29'),
(38, 'Haider Farooqi', 'haider@test.com', NULL, '$2y$12$0JXZw7JsY76jcGvjSTDb4eyc6/O2dckY96KugOd4q4chr9m33yOzO', NULL, NULL, NULL, 'user', NULL, '2024-08-23 15:14:54', '2024-08-23 15:14:54'),
(39, 'hassan', 'hassan@test.com', NULL, '$2y$12$1QiqHaUhLRlM.nUfJpS7XOn/eAqjGAuZewqDesdCwXnbhtOAeeG3q', NULL, NULL, NULL, 'user', NULL, '2024-08-23 15:21:52', '2024-08-23 15:21:52'),
(40, 'Ikhlaq Ahmed Farooqi', 'ikhlaq@test.com', NULL, '$2y$12$44TyPZ5wkY28y6zjOkqCR.BpIu.wdnF/BK8lHnTBYAWgPUQCaQkNe', NULL, NULL, NULL, 'user', NULL, '2024-08-23 15:23:49', '2024-08-23 15:23:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_category_id_foreign` (`category_id`),
  ADD KEY `jobs_job_type_id_foreign` (`job_type_id`),
  ADD KEY `jobs_user_id_foreign` (`user_id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_applications_job_id_foreign` (`job_id`),
  ADD KEY `job_applications_user_id_foreign` (`user_id`),
  ADD KEY `job_applications_employer_id_foreign` (`employer_id`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_job_application_id_foreign` (`job_application_id`),
  ADD KEY `messages_sender_id_foreign` (`sender_id`),
  ADD KEY `messages_receiver_id_foreign` (`receiver_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `saved_jobs_job_id_foreign` (`job_id`),
  ADD KEY `saved_jobs_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobs_job_type_id_foreign` FOREIGN KEY (`job_type_id`) REFERENCES `job_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `job_applications_employer_id_foreign` FOREIGN KEY (`employer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_applications_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_job_application_id_foreign` FOREIGN KEY (`job_application_id`) REFERENCES `job_applications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  ADD CONSTRAINT `saved_jobs_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `saved_jobs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
