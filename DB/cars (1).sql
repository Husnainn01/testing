-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2023 at 08:42 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cars`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `zip` text DEFAULT NULL,
  `website` text DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `linkedin` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `pinterest` text DEFAULT NULL,
  `youtube` text DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `banner` text DEFAULT NULL,
  `password` text NOT NULL,
  `token` text NOT NULL,
  `status` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `country`, `address`, `state`, `city`, `zip`, `website`, `facebook`, `twitter`, `linkedin`, `instagram`, `pinterest`, `youtube`, `photo`, `banner`, `password`, `token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Morshedul Arefin', 'admin@gmail.com', '+8801912721070', 'Bangladesh', 'Khulna', 'Khulna', 'Khulna', '9100', 'https://www.arefindev.com', 'https://www.facebook.com/groups/arefindev', NULL, 'https://www.linkedin.com/in/arefindev', NULL, NULL, 'https://www.youtube.com/channel/UCcfYd3bm-e_sLUK29abXb-A', '9ead0b550b7e8cb1fe5351e7893bea6c.jpg', 'bb9c875809f781b550ea063b73cda6f0.jpg', '$2y$10$cRpBV7BbNu0LwmS6LDXvlO/D8pQVo6GE3A3DnSZDTtn1zCfO31I7i', '', 'Active', NULL, '2022-09-11 01:00:34'),
(2, 'sabeel', 'sabeel@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'path/to/photo.jpg', NULL, '$2y$10$cRpBV7BbNu0LwmS6LDXvlO/D8pQVo6GE3A3DnSZDTtn1zCfO31I7i', 'e6TBapyPAOLNeQJSp7hgvot0wv5eeNPQP2sSdosr', 'Active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amenity_name` text NOT NULL,
  `amenity_slug` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `amenity_name`, `amenity_slug`, `created_at`, `updated_at`) VALUES
(1, 'Bluetooth', 'bluetooth', '2021-07-06 13:16:34', '2022-09-09 23:17:38'),
(2, 'Backup Camera', 'backup-camera', '2021-07-06 13:16:42', '2022-09-09 23:17:52'),
(3, 'Sunroof Availability', 'sunroof-availability', '2021-07-06 13:16:52', '2022-09-09 23:18:47'),
(4, 'Air Conditioning', 'air-conditioning', '2021-07-06 13:17:05', '2022-03-04 21:16:09'),
(5, 'USB Ports', 'usb-ports', '2021-07-06 13:18:07', '2022-09-09 23:19:20'),
(6, 'Speech Voice Recognition', 'speech-voice-recognition', '2021-07-06 13:18:25', '2022-09-09 23:19:45'),
(7, 'Blind Spot Monitoring', 'blind-spot-monitoring', '2021-07-06 13:18:43', '2022-09-09 23:20:07'),
(8, 'Cross Traffic Alert', 'cross-traffic-alert', '2021-07-06 13:18:52', '2022-09-09 23:20:28'),
(12, '360⁰ View Camera', '360-degree-view-camera', '2022-09-10 22:36:34', '2022-09-10 22:36:41');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_slug` varchar(255) DEFAULT NULL,
  `post_content` text NOT NULL,
  `post_content_short` text NOT NULL,
  `post_photo` varchar(255) NOT NULL,
  `comment_show` text NOT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `category_id`, `post_title`, `post_slug`, `post_content`, `post_content_short`, `post_photo`, `comment_show`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 8, 'Debitis consequuntur sea eu ex agam', 'debitis-consequuntur-sea-eu-ex-agam', '<p>Lorem ipsum dolor sit amet, ea qui tation adversarium definitionem, eu labitur denique est. Ad duo quando recusabo petentium. Mea elit affert oportere ex. Ut error affert accusam pri. Sit no causae vidisse invenire, bonorum inermis nec ex.</p>\r\n<p>Eam sint reformidans ex, ex doming iracundia his. Sint modus pro ne, vix ut omnis scripta corpora. Sea graecis suavitate te. Eum tantas possim torquatos ei. An qui falli sadipscing suscipiantur. At congue forensibus constituto his, erat vidit veniam vis eu, dico soleat possim nec ei.</p>\r\n<p>Cu modo adipisci sea. At clita doctus sit. Pri ex solet deterruisset, falli harum fuisset qui ei, an commune delicata patrioque sit. Fabulas adversarium no sea, at quis disputando pri, meis epicurei eloquentiam vix ad. An consulatu sententiae posidonium his, te elaboraret cotidieque eos, sed an illud recteque.</p>\r\n<p>Eu per altera aliquam consulatu, ea pro nulla doctus. Sea porro everti an, nostrud ceteros nam no. Ei quando qualisque his, alterum ocurreret nec eu, dolorum deseruisse ad mel. Nam vidit omnis ad, pro eu veniam efficiendi, sea an iriure vivendo appetere. Usu ad latine vocibus voluptatum.</p>\r\n<p>Et bonorum consetetur mediocritatem qui, cu est omnis persequeris, mea te doctus incorrupte. Vix et tale justo. Vel te lorem sapientem interesset. Ne ius tantas saperet officiis, volutpat adolescens ut sea, an animal consectetuer vis. Nonumy ornatus constituam vis ne, cum ne vidisse patrioque.</p>', 'Lorem ipsum dolor sit amet, ea qui tation adversarium definitionem, eu labitur denique est. Ad duo quando recusabo petentium.', '0dad7ff384e8dee92414a9e824423bac.jpg', 'Yes', 'Debitis consequuntur sea eu ex agam', 'Debitis consequuntur sea eu ex agam', '2021-07-24 17:30:14', '2022-09-10 07:13:03'),
(2, 4, 'An qui falli sadipscing susci piantur at congue', 'an-qui-falli-sadipscing-susci-piantur-at-congue', '<p>Lorem ipsum dolor sit amet, ea qui tation adversarium definitionem, eu labitur denique est. Ad duo quando recusabo petentium. Mea elit affert oportere ex. Ut error affert accusam pri. Sit no causae vidisse invenire, bonorum inermis nec ex.</p>\r\n<p>Eam sint reformidans ex, ex doming iracundia his. Sint modus pro ne, vix ut omnis scripta corpora. Sea graecis suavitate te. Eum tantas possim torquatos ei. An qui falli sadipscing suscipiantur. At congue forensibus constituto his, erat vidit veniam vis eu, dico soleat possim nec ei.</p>\r\n<p>Cu modo adipisci sea. At clita doctus sit. Pri ex solet deterruisset, falli harum fuisset qui ei, an commune delicata patrioque sit. Fabulas adversarium no sea, at quis disputando pri, meis epicurei eloquentiam vix ad. An consulatu sententiae posidonium his, te elaboraret cotidieque eos, sed an illud recteque.</p>\r\n<p>Eu per altera aliquam consulatu, ea pro nulla doctus. Sea porro everti an, nostrud ceteros nam no. Ei quando qualisque his, alterum ocurreret nec eu, dolorum deseruisse ad mel. Nam vidit omnis ad, pro eu veniam efficiendi, sea an iriure vivendo appetere. Usu ad latine vocibus voluptatum.</p>\r\n<p>Et bonorum consetetur mediocritatem qui, cu est omnis persequeris, mea te doctus incorrupte. Vix et tale justo. Vel te lorem sapientem interesset. Ne ius tantas saperet officiis, volutpat adolescens ut sea, an animal consectetuer vis. Nonumy ornatus constituam vis ne, cum ne vidisse patrioque.</p>', 'Lorem ipsum dolor sit amet, ea qui tation adversarium definitionem, eu labitur denique est. Ad duo quando recusabo petentium.', '8fab9f3f622ff6d09db3c031365c3a6a.jpg', 'Yes', 'An qui falli sadipscing susci piantur at congue', 'An qui falli sadipscing susci piantur at congue', '2021-07-24 17:30:56', '2022-09-10 07:06:49'),
(3, 1, 'Libris impetus molestiae te eu ius ludus', 'libris-impetus-molestiae-te-eu-ius-ludus', '<p>Lorem ipsum dolor sit amet, ea qui tation adversarium definitionem, eu labitur denique est. Ad duo quando recusabo petentium. Mea elit affert oportere ex. Ut error affert accusam pri. Sit no causae vidisse invenire, bonorum inermis nec ex.</p>\r\n<p>Eam sint reformidans ex, ex doming iracundia his. Sint modus pro ne, vix ut omnis scripta corpora. Sea graecis suavitate te. Eum tantas possim torquatos ei. An qui falli sadipscing suscipiantur. At congue forensibus constituto his, erat vidit veniam vis eu, dico soleat possim nec ei.</p>\r\n<p>Cu modo adipisci sea. At clita doctus sit. Pri ex solet deterruisset, falli harum fuisset qui ei, an commune delicata patrioque sit. Fabulas adversarium no sea, at quis disputando pri, meis epicurei eloquentiam vix ad. An consulatu sententiae posidonium his, te elaboraret cotidieque eos, sed an illud recteque.</p>\r\n<p>Eu per altera aliquam consulatu, ea pro nulla doctus. Sea porro everti an, nostrud ceteros nam no. Ei quando qualisque his, alterum ocurreret nec eu, dolorum deseruisse ad mel. Nam vidit omnis ad, pro eu veniam efficiendi, sea an iriure vivendo appetere. Usu ad latine vocibus voluptatum.</p>\r\n<p>Et bonorum consetetur mediocritatem qui, cu est omnis persequeris, mea te doctus incorrupte. Vix et tale justo. Vel te lorem sapientem interesset. Ne ius tantas saperet officiis, volutpat adolescens ut sea, an animal consectetuer vis. Nonumy ornatus constituam vis ne, cum ne vidisse patrioque.</p>', 'Lorem ipsum dolor sit amet, ea qui tation adversarium definitionem, eu labitur denique est. Ad duo quando recusabo petentium.', '86271ff53e1bb67f55fe87d3e2bf5172.jpg', 'Yes', 'Libris impetus molestiae te eu ius ludus', 'Libris impetus molestiae te eu ius ludus', '2021-07-24 17:31:31', '2022-09-10 07:11:05');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Motor Sport', 'Motor Sport', 'Motor Sport', 'Motor Sport', '2020-11-19 10:00:01', '2022-09-10 07:03:27'),
(4, 'Buying Guide', 'buying-guide', 'Buying Guide', 'Buying Guide', '2020-11-28 00:07:59', '2022-09-10 07:05:44'),
(8, 'Driving License', 'driving-license', 'Driving License', 'Driving License', '2021-07-24 17:39:05', '2022-09-10 07:03:42');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` int(11) NOT NULL,
  `person_name` text NOT NULL,
  `person_email` text NOT NULL,
  `person_comment` text NOT NULL,
  `comment_status` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `symbol` text NOT NULL,
  `value` text NOT NULL,
  `is_default` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `symbol`, `value`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'USD', '$', '1', 'Yes', NULL, '2022-03-10 04:19:38'),
(2, 'INR', '₹', '76.67', 'No', NULL, '2022-03-09 05:19:58'),
(8, 'BDT', '৳', '84.5', 'No', '2022-03-10 04:19:34', '2022-03-10 04:19:34'),
(9, 'NGN', '₦', '415.84', 'No', '2022-03-12 19:16:21', '2022-03-12 19:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `dynamic_pages`
--

CREATE TABLE `dynamic_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dynamic_page_name` text NOT NULL,
  `dynamic_page_slug` text DEFAULT NULL,
  `dynamic_page_content` text DEFAULT NULL,
  `dynamic_page_banner` text NOT NULL,
  `seo_title` text DEFAULT NULL,
  `seo_meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `et_subject` text NOT NULL,
  `et_content` text NOT NULL,
  `et_name` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `et_subject`, `et_content`, `et_name`, `created_at`, `updated_at`) VALUES
(1, 'Contact Form Message', '<p>A person has messaged you. Please see it below:&nbsp;<br><br><b>Visitor Message:</b></p><p>Visitor Name: <br>[[visitor_name]]</p><p>Visitor Email: <br>[[visitor_email]]</p><p>Visitor Phone: <br>[[visitor_phone]]</p><p>Visitor Message: <br>[[visitor_message]]</p>', 'Contact Page Message', NULL, '2021-06-26 19:40:48'),
(2, 'New Comment Posted', '<p>You have received a new comment from a person. His detail is here:</p><p><strong>Person Name:</strong>&nbsp;[[person_name]]</p><p><strong>Person Email:&nbsp;</strong>[[person_email]]</p><p><strong>Person Message:</strong></p><p>[[person_comment]]</p><p>Go to this link to see this comment<span style=\"font-weight: bolder;\">:&nbsp;</span><a href=\"[[comment_see_url]]\" target=\"_blank\">See Comment</a></p>', 'Comment Message to Admin', NULL, '2021-07-10 12:07:17'),
(5, 'Reset Password', '<p>To reset your password, please click on the following link:</p><p><a href=\"[[reset_link]]\" target=\"_blank\">Reset Password</a><br></p>', 'Reset Password Message to Admin', NULL, '2020-11-27 19:20:59'),
(6, 'Confirm Registration', '<p>To activate your account and confirm the registration, please click on the verify link below:</p><p><a href=\"[[verification_link]]\" target=\"_blank\">Verification Link</a></p>', 'Registration Email to Customer', NULL, '2020-12-03 10:38:57'),
(7, 'Reset Password', '<p>To reset your password, please click on the following link:</p><p><a href=\"[[reset_link]]\" target=\"_blank\">Reset Password Link</a></p>', 'Reset Password Message to Customer', NULL, '2020-12-05 03:30:14'),
(8, 'Package Purchase Completed', '<p>Dear [[customer_name]],</p><p>You have successfully purchased the package.</p><p><b>Payment Detail:</b></p><p>Payment Method: [[payment_method]]<br>Package Start Date: [[package_start_date]]<br>Package End Date: [[package_end_date]]<br>Transaction Id: [[transaction_id]]<br>Paid Amount: [[paid_amount]]<br>Payment Status: [[payment_status]]<br><br>Thank you!<br>ArefinDev</p>', 'Package Purchase Completed Email to Customer', NULL, '2021-07-08 19:28:15'),
(9, 'Listing Page Message', '<p>Dear [[agent_name]],</p>\n\n<p>You have received a message from a visitor.</p>\n\n<p><strong>Listing Name: </strong><br />\n[[listing_name]]<br />\n<br />\n<strong>Listing URL: </strong><br />\n[[listing_url]]<br />\n<br />\n<strong>Name: </strong><br />\n[[name]]<br />\n<br />\n<strong>Email: </strong><br />\n[[email]]<br />\n<br />\n<strong>Phone: </strong><br />\n[[phone]]<br />\n<br />\n<strong>Message: </strong><br />\n[[message]]</p>', 'Listing Page Message to Agent', NULL, '2022-06-13 18:39:42'),
(10, 'Listing Page Report', '<p>Hi,</p>\n\n<p>A visitor has reported to a listing.</p>\n\n<p><strong>Listing Name: </strong><br />\n[[listing_name]]<br />\n<br />\n<strong>Listing URL: </strong><br />\n[[listing_url]]<br />\n<br />\n<strong>Name: </strong><br />\n[[name]]<br />\n<br />\n<strong>Email: </strong><br />\n[[email]]<br />\n<br />\n<strong>Phone: </strong><br />\n[[phone]]<br />\n<br />\n<strong>Message: </strong><br />\n[[message]]</p>', 'Listing Page Report to Admin', NULL, '2022-06-13 18:40:08');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faq_title` text NOT NULL,
  `faq_content` text NOT NULL,
  `faq_order` smallint(6) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `faq_title`, `faq_content`, `faq_order`, `created_at`, `updated_at`) VALUES
(1, 'Where are the posting guidelines?', '<p>Lorem ipsum dolor sit amet, eu vim elitr clita, quot putent feugait cu per. Tamquam voluptua persequeris ad cum, at his cibo scaevola. Cibo justo equidem cu nam. An meliore admodum vis, quot aliquip bonorum ei quo. Mea nemore feugiat verterem cu, modus vulputate mea id.</p>', 3, '2020-11-23 11:09:14', '2022-09-10 10:49:44'),
(2, 'Where can I find credits in my profile?', '<p>Lorem ipsum dolor sit amet, eu vim elitr clita, quot putent feugait cu per. Tamquam voluptua persequeris ad cum, at his cibo scaevola. Cibo justo equidem cu nam. An meliore admodum vis, quot aliquip bonorum ei quo. Mea nemore feugiat verterem cu, modus vulputate mea id.</p>', 2, '2020-11-23 11:09:31', '2022-09-10 10:49:18'),
(3, 'How do I search for cars?', '<p>Lorem ipsum dolor sit amet, eu vim elitr clita, quot putent feugait cu per. Tamquam voluptua persequeris ad cum, at his cibo scaevola. Cibo justo equidem cu nam. An meliore admodum vis, quot aliquip bonorum ei quo. Mea nemore feugiat verterem cu, modus vulputate mea id.</p>', 1, '2020-11-23 11:09:45', '2022-09-10 10:48:42'),
(5, 'If I find a car I like, what should I do?', '<p>Lorem ipsum dolor sit amet, eu vim elitr clita, quot putent feugait cu per. Tamquam voluptua persequeris ad cum, at his cibo scaevola. Cibo justo equidem cu nam. An meliore admodum vis, quot aliquip bonorum ei quo. Mea nemore feugiat verterem cu, modus vulputate mea id.</p>', 0, '2022-09-10 10:50:46', '2022-09-10 10:50:46');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` text NOT NULL,
  `favicon` text NOT NULL,
  `top_phone` text DEFAULT NULL,
  `top_email` text DEFAULT NULL,
  `footer_column_1_heading` text NOT NULL,
  `footer_column_1_total_item` text NOT NULL,
  `footer_column_2_heading` text NOT NULL,
  `footer_column_2_total_item` text NOT NULL,
  `footer_column_3_heading` text NOT NULL,
  `footer_column_4_heading` text NOT NULL,
  `footer_address` text NOT NULL,
  `footer_email` text NOT NULL,
  `footer_phone` text NOT NULL,
  `footer_copyright` text NOT NULL,
  `google_analytic_tracking_id` text NOT NULL,
  `google_analytic_status` text NOT NULL,
  `tawk_live_chat_property_id` text NOT NULL,
  `tawk_live_chat_status` text NOT NULL,
  `cookie_consent_message` text NOT NULL,
  `cookie_consent_button_text` text NOT NULL,
  `cookie_consent_text_color` text NOT NULL,
  `cookie_consent_bg_color` text NOT NULL,
  `cookie_consent_button_text_color` text NOT NULL,
  `cookie_consent_button_bg_color` text NOT NULL,
  `cookie_consent_status` text NOT NULL,
  `google_recaptcha_site_key` text NOT NULL,
  `google_recaptcha_status` text NOT NULL,
  `theme_color` text NOT NULL,
  `customer_listing_option` text NOT NULL,
  `layout_direction` text NOT NULL,
  `paypal_environment` text NOT NULL,
  `paypal_client_id` text NOT NULL,
  `paypal_secret_key` text NOT NULL,
  `paypal_status` text NOT NULL,
  `stripe_public_key` text NOT NULL,
  `stripe_secret_key` text NOT NULL,
  `stripe_status` text NOT NULL,
  `razorpay_key_id` text NOT NULL,
  `razorpay_key_secret` text NOT NULL,
  `razorpay_status` text NOT NULL,
  `flutterwave_country` text NOT NULL,
  `flutterwave_public_key` text NOT NULL,
  `flutterwave_secret_key` text NOT NULL,
  `flutterwave_status` text NOT NULL,
  `mollie_api_key` text NOT NULL,
  `mollie_status` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `logo`, `favicon`, `top_phone`, `top_email`, `footer_column_1_heading`, `footer_column_1_total_item`, `footer_column_2_heading`, `footer_column_2_total_item`, `footer_column_3_heading`, `footer_column_4_heading`, `footer_address`, `footer_email`, `footer_phone`, `footer_copyright`, `google_analytic_tracking_id`, `google_analytic_status`, `tawk_live_chat_property_id`, `tawk_live_chat_status`, `cookie_consent_message`, `cookie_consent_button_text`, `cookie_consent_text_color`, `cookie_consent_bg_color`, `cookie_consent_button_text_color`, `cookie_consent_button_bg_color`, `cookie_consent_status`, `google_recaptcha_site_key`, `google_recaptcha_status`, `theme_color`, `customer_listing_option`, `layout_direction`, `paypal_environment`, `paypal_client_id`, `paypal_secret_key`, `paypal_status`, `stripe_public_key`, `stripe_secret_key`, `stripe_status`, `razorpay_key_id`, `razorpay_key_secret`, `razorpay_status`, `flutterwave_country`, `flutterwave_public_key`, `flutterwave_secret_key`, `flutterwave_status`, `mollie_api_key`, `mollie_status`, `created_at`, `updated_at`) VALUES
(1, '76679dc95722d23daefbecd026754446.png', 'c1171d7cd44a7f181fb14af3e3545026.png', '123-342-3471', 'contact@arefindev.com', 'Categories', '5', 'Locations', '5', 'Footer Menu', 'Contact', 'ABC Steet, NewYork.', 'contact@yourwebsite.com', '123-456-7878', 'Copyright 2022. ArefinDev. All Rights Reserved.', 'UA-84213520-6', 'Hide', '60f260f6d6e7610a49abaef3', 'Hide', 'This website uses cookies to ensure you get the best experience on our website.', 'ACCEPT', 'F8FFED', '50BF20', '000000', 'FFFFFF', 'Show', '6Lcf1V0bAAAAAIN5nY_O2MXq0hUuTiKTt_XOYM-_', 'Hide', 'F6552C', 'On', 'ltr', 'sandbox', 'AewyWGlfCXJVrnkUP60N6iCaDxQmCGyny7QP8ZXA9N1xrc1nHhg-7gpf8_xBdihkxNe4c1j6ess JapanyQFU', 'EP8A3weVRoKg8Yqr2YpBH547K84B1NSzbX_WNntHGkkR2BFYuw21v7U0YCgufKUOskgkjOe-IPw-hGln', 'Show', 'pk_test_51JffTyGD31Py00wTwqZ2Sz2y5jULGFtUVnsFkJ3pWhRGECG5gkJpseJx4WAfNcUYXEo0dX6f046rrsRhkawEAikJ00E8QnpubW', 'sk_test_51JffTyGD31Py00wTTh3LTkKirpsAxsbWGwBONgjMXvPYR8oXI3rXhX9GyEVhndXCVsdJmjruwBlflS1fizakR9Xm00k7am6TAX', 'Show', 'rzp_test_fMHrzXegENYrbM', '18J4uJojTQIItKkYx8scHTlC', 'Show', 'NG', 'FLWPUBK_TEST-30dcb79e11906ad01d5f709580779e94-X', 'FLWSECK_TEST-949a9866cf40a09399d047de0d17ca1b-X', 'Show', 'test_pT7cjqV5GVE4NcKDUrhx8hSFjaAmQk', 'Show', NULL, '2023-06-26 12:58:39');

-- --------------------------------------------------------

--
-- Table structure for table `home_advertisements`
--

CREATE TABLE `home_advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `above_brand_1` text DEFAULT NULL,
  `above_brand_1_url` text DEFAULT NULL,
  `above_brand_2` text DEFAULT NULL,
  `above_brand_2_url` text DEFAULT NULL,
  `above_brand_status` text NOT NULL,
  `above_featured_listing_1` text DEFAULT NULL,
  `above_featured_listing_1_url` text DEFAULT NULL,
  `above_featured_listing_2` text DEFAULT NULL,
  `above_featured_listing_2_url` text DEFAULT NULL,
  `above_featured_listing_status` text NOT NULL,
  `above_location_1` text DEFAULT NULL,
  `above_location_1_url` text DEFAULT NULL,
  `above_location_2` text DEFAULT NULL,
  `above_location_2_url` text DEFAULT NULL,
  `above_location_status` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_advertisements`
--

INSERT INTO `home_advertisements` (`id`, `above_brand_1`, `above_brand_1_url`, `above_brand_2`, `above_brand_2_url`, `above_brand_status`, `above_featured_listing_1`, `above_featured_listing_1_url`, `above_featured_listing_2`, `above_featured_listing_2_url`, `above_featured_listing_status`, `above_location_1`, `above_location_1_url`, `above_location_2`, `above_location_2_url`, `above_location_status`, `created_at`, `updated_at`) VALUES
(1, '9516c8ac61ba1d38c165964a5ea61ddd.jpg', NULL, 'c3259913b2b89a49fd34c1e79c9591e7.jpg', NULL, 'Hide', '88af78bc0de0dfa13187c778e0dfee63.jpg', NULL, '1491dc71d825138f2ca04c0388d90b85.jpg', NULL, 'Hide', '972c0d5c409fb55fe69aef9bf534581c.jpg', NULL, '682c274a3dcb67099eb4cd377fe1aecb.jpg', NULL, 'Hide', NULL, '2022-09-10 21:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_name` text NOT NULL,
  `listing_slug` text DEFAULT NULL,
  `listing_description` text NOT NULL,
  `listing_address` text DEFAULT NULL,
  `listing_phone` text DEFAULT NULL,
  `listing_email` text DEFAULT NULL,
  `listing_website` text DEFAULT NULL,
  `listing_map` text DEFAULT NULL,
  `listing_price` text NOT NULL,
  `listing_exterior_color` text DEFAULT NULL,
  `listing_interior_color` text DEFAULT NULL,
  `listing_cylinder` text DEFAULT NULL,
  `steering` text DEFAULT NULL,
  `listing_fuel_type` text DEFAULT NULL,
  `listing_transmission` text DEFAULT NULL,
  `listing_engine_capacity` text DEFAULT NULL,
  `listing_vin` text DEFAULT NULL,
  `listing_body` text DEFAULT NULL,
  `listing_seat` text DEFAULT NULL,
  `listing_wheel` text DEFAULT NULL,
  `listing_door` text DEFAULT NULL,
  `listing_mileage` text DEFAULT NULL,
  `listing_model_year` text DEFAULT NULL,
  `listing_type` text NOT NULL,
  `listing_oh_monday` text DEFAULT NULL,
  `listing_oh_tuesday` text DEFAULT NULL,
  `listing_oh_wednesday` text DEFAULT NULL,
  `listing_oh_thursday` text DEFAULT NULL,
  `listing_oh_friday` text DEFAULT NULL,
  `listing_oh_saturday` text DEFAULT NULL,
  `listing_oh_sunday` text DEFAULT NULL,
  `listing_featured_photo` text NOT NULL,
  `listing_brand_id` int(11) NOT NULL,
  `listing_location_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `seo_title` text DEFAULT NULL,
  `seo_meta_description` text DEFAULT NULL,
  `listing_status` text NOT NULL,
  `is_featured` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `listing_name`, `listing_slug`, `listing_description`, `listing_address`, `listing_phone`, `listing_email`, `listing_website`, `listing_map`, `listing_price`, `listing_exterior_color`, `listing_interior_color`, `listing_cylinder`, `steering`, `listing_fuel_type`, `listing_transmission`, `listing_engine_capacity`, `listing_vin`, `listing_body`, `listing_seat`, `listing_wheel`, `listing_door`, `listing_mileage`, `listing_model_year`, `listing_type`, `listing_oh_monday`, `listing_oh_tuesday`, `listing_oh_wednesday`, `listing_oh_thursday`, `listing_oh_friday`, `listing_oh_saturday`, `listing_oh_sunday`, `listing_featured_photo`, `listing_brand_id`, `listing_location_id`, `user_id`, `admin_id`, `seo_title`, `seo_meta_description`, `listing_status`, `is_featured`, `created_at`, `updated_at`) VALUES
(3, '2022 Toyota 4Runner Limited 2', '2022-toyota-4runner-limited', '<p>Lorem ipsum dolor sit amet, nibh saperet te pri, at nam diceret disputationi. Quo an consul impedit, usu possim evertitur dissentiet ei, ridens minimum nominavi et vix. An per mutat adipisci. Ut pericula dissentias sed, est ea modus gloriatur. Aliquip persius has cu, oportere adversarium mei an, justo fabulas in vix.</p>\r\n<p>Nec in rebum primis causae. Affert iisque ex pri, vis utinam vivendo definitionem ad, nostrum omnesque per et. Omnium antiopam cotidieque cu sit. Id pri placerat voluptatum, vero dicunt dissentiunt eum et, adhuc iisque vis no. Eu suavitate contentiones definitionem mel, ex vide insolens ocurreret eam. Et dico blandit mea. Sea tollit vidisse mandamus te, qui movet efficiendi ex.</p>\r\n<p>Doming aliquid te pro. Mei et quodsi ornatus praesent, summo debet vis eu, dolor soleat nostrud sea eu. Cu altera possim sanctus est. Ea iriure repudiandae per, no eam legendos consectetuer. Mel at justo doming voluptatum. Mel mentitum fabellas deserunt no, et duo amet unum appetere.</p>\r\n<p>Quo id nemore dignissim persequeris, unum melius option ei vix, oratio vidisse eam ei. Altera neglegentur cum te. Latine probatus cum cu. Vim dicta sonet intellegebat ne, ei mazim decore eleifend nam, no malis soleat usu. Est ei tale praesent, ad nibh iudicabit has.</p>', '333 East Broadway Avenue\r\nMaryville, TN 37804', '(606) 862-0015', NULL, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3237.7024268769424!2d-83.97154938525155!3d35.75811813335977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x885e9fd3fccccd2b%3A0x4b27a99931ed8fd8!2s333%20E%20Broadway%20Ave%2C%20Maryville%2C%20TN%2037804%2C%20USA!5e0!3m2!1sen!2sbd!4v1625719037629!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '50627', 'Midnight Black Metallic', 'Black Graphite', '4', 'left_steering', 'Electric', 'Automatic', '1500 cc', 'JHSD8923849', 'SUV', '4', '4', '4', '30000 km', '2022', 'New Car', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '5244eaad7aa66e19f458f166b13366a8.jpg', 1, 3, 0, 1, '2022 Toyota 4Runner Limited', NULL, 'Active', 'Yes', '2021-07-07 22:44:22', '2023-06-25 15:20:41'),
(5, '2022 Nissan Frontier PRO 4X', '2022-nissan-frontier-pro-4x', '<p>Lorem ipsum dolor sit amet, suscipit dissentiunt usu at, eu nam veri vidit signiferumque. Ad mea erat fabellas, et facete everti eum, tation consul ea ius. Autem feugiat maiorum id sea. Est omnis mediocrem assentior ea. Nam ubique possit verterem ea, cum facer scriptorem an.</p>\r\n<p>Equidem legendos duo ei, et legimus offendit mei. Mea amet tibique explicari ne. Nam blandit patrioque comprehensam an, sed in errem omnes partem. No quo impedit percipit comprehensam, ei dolores intellegam pro, et sed quaeque temporibus referrentur. Quodsi causae dissentias in pri, idque ridens cum an. Vis in facilisi conclusionemque, eu est erant affert veritus. Id qui quodsi iriure quaestio, omittam praesent ne sea, postulant consetetur definitiones an nec.</p>\r\n<p>Probo animal interpretaris ea mea. Mea ad nostrud urbanitas inciderint, sea no noluisse incorrupte. His democritum vituperatoribus no, ad cum offendit rationibus vituperatoribus, eos te quodsi interesset. Regione bonorum no quo. Lobortis torquatos constituto ne per, ferri facete ea duo. Usu molestie complectitur eu, euismod forensibus moderatius sed no.</p>', '2 Bridge St Old Saybrook, CT 06475', '(860) 395-2000', 'info@saybrook.com', NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2998.1644726412524!2d-72.35277188518384!3d41.283524779273854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e62268e8620931%3A0x88b1bc148a89e421!2s2%20Bridge%20St%2C%20Old%20Saybrook%2C%20CT%2006475%2C%20USA!5e0!3m2!1sen!2sbd!4v1625913163080!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '18000', 'Silver', 'Light Black', '6', 'right_steering', 'Hybrid', 'Automatic', '2200 CC', 'JHD89238494', 'SUV', 'Memory Seat', '4', '4', '15000 KM', '2022', 'New Car', '24 Hours Open', '24 Hours Open', '24 Hours Open', '24 Hours Open', '24 Hours Open', '24 Hours Open', '24 Hours Open', '34481dd4588dac0ca090e3786c60a8e4.jpg', 3, 3, 3, 0, '2022 Nissan Frontier PRO 4X', NULL, 'Active', 'Yes', '2021-07-10 04:37:48', '2022-09-11 04:58:18'),
(6, '2019 Nissan Murano S', '2019-nissan-murano-s', '<p>Lorem ipsum dolor sit amet, per mollis aeterno nostrud in, nam timeam fastidii eu. Commodo nonumes vim eu. Quo indoctum voluptatibus delicatissimi no. Eu cum dico melius. Cum impetus scribentur ad.</p>\r\n<p>Ut alterum dissentiunt eam, nobis audire verterem ut vel. Vidisse persius mea no. Melius imperdiet his at. Ex has zril convenire, cu eos eros dolor, omittam adversarium suscipiantur mea ea.</p>\r\n<p>Est odio quaeque legimus ad. Eu sumo diam fabellas vim. In mea graece suscipiantur, omnis dolorem expetenda in usu, suas oportere theophrastus ei pro. Amet facer eripuit cu his, mea at quis maluisset, ferri perfecto constituam at mea. Nostro eleifend in pri.</p>', '1619 Constitution Dr Iuka, MS 38852', '(662) 423-6836', NULL, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3275.2685692563628!2d-88.20734968527874!3d34.82433938409503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x887d9fa0f88eab05%3A0x5ef40a6f791abf32!2s1619%20Constitution%20Dr%2C%20Iuka%2C%20MS%2038852%2C%20USA!5e0!3m2!1sen!2sbd!4v1626071441294!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '24900', 'Black', 'Silver', '8', '', 'Gasoline', 'Automatic', '1800 CC', 'JDKK2837823', 'SUV', 'Third Row Seating', '4', '5', '12000 KM', '2019', 'Used Car', '10:00 AM - 5:00 PM', '10:00 AM - 5:00 PM', '10:00 AM - 5:00 PM', '10:00 AM - 5:00 PM', '10:00 AM - 5:00 PM', '10:00 AM - 5:00 PM', 'Closed', '2bf25c0c094e8963d3bb24109cf2beed.jpg', 3, 2, 4, 0, '2019 Nissan Murano S', NULL, 'Active', 'Yes', '2021-07-12 00:34:12', '2022-09-11 05:14:10'),
(7, '2020 BMW M340 i', '2020-bmw-m340-i', '<p>Lorem ipsum dolor sit amet, per mollis aeterno nostrud in, nam timeam fastidii eu. Commodo nonumes vim eu. Quo indoctum voluptatibus delicatissimi no. Eu cum dico melius. Cum impetus scribentur ad.</p>\r\n<p>Ut alterum dissentiunt eam, nobis audire verterem ut vel. Vidisse persius mea no. Melius imperdiet his at. Ex has zril convenire, cu eos eros dolor, omittam adversarium suscipiantur mea ea.</p>\r\n<p>Est odio quaeque legimus ad. Eu sumo diam fabellas vim. In mea graece suscipiantur, omnis dolorem expetenda in usu, suas oportere theophrastus ei pro. Amet facer eripuit cu his, mea at quis maluisset, ferri perfecto constituam at mea. Nostro eleifend in pri.</p>', '3780 Ash Avenue\r\nSt Louis, MO 63101', '(731) 689-7423', 'info@fitness57.com', NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12467.067058237182!2d-90.20114767193759!3d38.63124633618563!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87d8b318a560484b%3A0x4d6bff75e2320bd4!2sSt.%20Louis%2C%20MO%2063101%2C%20USA!5e0!3m2!1sen!2sbd!4v1627142211618!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '50800', 'Silver', 'Light Blue', '8', '', 'Hybrid', 'Automatic', '3000 CC', 'UURI89328478', 'SUV', '8', '4', '6', '12000 KM', '2020', 'Used Car', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', 'de51e0ec9808b68b5cad2aa3ae33c739.jpg', 2, 3, 0, 1, '2020 BMW M340 i', NULL, 'Active', 'Yes', '2021-07-12 11:57:14', '2022-09-11 06:08:04'),
(8, '2022 Toyota GR86 Base', '2022-toyota-gr86-base', '<p>Lorem ipsum dolor sit amet, per mollis aeterno nostrud in, nam timeam fastidii eu. Commodo nonumes vim eu. Quo indoctum voluptatibus delicatissimi no. Eu cum dico melius. Cum impetus scribentur ad.</p>\r\n<p>Ut alterum dissentiunt eam, nobis audire verterem ut vel. Vidisse persius mea no. Melius imperdiet his at. Ex has zril convenire, cu eos eros dolor, omittam adversarium suscipiantur mea ea.</p>\r\n<p>Est odio quaeque legimus ad. Eu sumo diam fabellas vim. In mea graece suscipiantur, omnis dolorem expetenda in usu, suas oportere theophrastus ei pro. Amet facer eripuit cu his, mea at quis maluisset, ferri perfecto constituam at mea. Nostro eleifend in pri.</p>', '1375 Stanley Avenue\r\nLynbrook, NY 11563', '(731) 607-3076', 'contact@duanewright.com', NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24214.094270888058!2d-73.69071312302569!3d40.657181234407346!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2649434a75c9b%3A0x2a440e4b0a258756!2sLynbrook%2C%20NY%2011563%2C%20USA!5e0!3m2!1sen!2sbd!4v1627142848579!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '37970', 'Silver', 'Light Blue', '6', '', 'Electric', 'Automatic', '1400 CC', 'HHDG9832847', 'SUV', '4', '4', '2', '34000 KM', '2022', 'New Car', '10 AM - 9 PM', '10 AM - 9 PM', '10 AM - 9 PM', '10 AM - 9 PM', '10 AM - 9 PM', '10 AM - 9 PM', 'Closed', '650e83ddbafb95b1436ad9eed6662c49.jpg', 1, 5, 0, 1, '2022 Toyota GR86 Base', NULL, 'Active', 'Yes', '2021-07-12 12:00:04', '2022-09-11 06:34:15'),
(10, '2020 Jaguar F-PACE SVR', '2020-jaguar-f-pace-svr', '<p>Lorem ipsum dolor sit amet, suscipit dissentiunt usu at, eu nam veri vidit signiferumque. Ad mea erat fabellas, et facete everti eum, tation consul ea ius. Autem feugiat maiorum id sea. Est omnis mediocrem assentior ea. Nam ubique possit verterem ea, cum facer scriptorem an.</p>\r\n<p>Equidem legendos duo ei, et legimus offendit mei. Mea amet tibique explicari ne. Nam blandit patrioque comprehensam an, sed in errem omnes partem. No quo impedit percipit comprehensam, ei dolores intellegam pro, et sed quaeque temporibus referrentur. Quodsi causae dissentias in pri, idque ridens cum an. Vis in facilisi conclusionemque, eu est erant affert veritus. Id qui quodsi iriure quaestio, omittam praesent ne sea, postulant consetetur definitiones an nec.</p>\r\n<p>Probo animal interpretaris ea mea. Mea ad nostrud urbanitas inciderint, sea no noluisse incorrupte. His democritum vituperatoribus no, ad cum offendit rationibus vituperatoribus, eos te quodsi interesset. Regione bonorum no quo. Lobortis torquatos constituto ne per, ferri facete ea duo. Usu molestie complectitur eu, euismod forensibus moderatius sed no.</p>', '3661 Pinewood Avenue\r\nMenominee, MI 49858', '123-343-4444', 'chicagomedicalcenter@gmail.com', NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d45041.29338642683!2d-87.66000203029316!3d45.124697659298626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4d52a1080e88c5fd%3A0x4ab429fd11be80ec!2sMenominee%2C%20MI%2049858%2C%20USA!5e0!3m2!1sen!2sbd!4v1627143440252!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '75900', 'Red', 'Silver', '5', '', '4', NULL, '2000 CC', 'GGGS7238423', 'SUV', '4', '6', '6', NULL, '2020', 'New Car', '24 Hours Open', '24 Hours Open', '24 Hours Open', '24 Hours Open', '24 Hours Open', '24 Hours Open', '24 Hours Open', 'eaf92a57244c0b2406a3f73e4714b6c2.jpg', 14, 2, 3, 0, '2020 Jaguar F-PACE SVR', NULL, 'Active', 'No', '2021-07-19 08:43:27', '2022-09-11 08:04:25'),
(12, '2022 Mazda MX-5 Miata Grand Touring', '2022-mazda-mx-5-miata-grand-touring', '<p>Lorem ipsum dolor sit amet, nibh saperet te pri, at nam diceret disputationi. Quo an consul impedit, usu possim evertitur dissentiet ei, ridens minimum nominavi et vix. An per mutat adipisci. Ut pericula dissentias sed, est ea modus gloriatur. Aliquip persius has cu, oportere adversarium mei an, justo fabulas in vix.</p>\r\n<p>Nec in rebum primis causae. Affert iisque ex pri, vis utinam vivendo definitionem ad, nostrum omnesque per et. Omnium antiopam cotidieque cu sit. Id pri placerat voluptatum, vero dicunt dissentiunt eum et, adhuc iisque vis no. Eu suavitate contentiones definitionem mel, ex vide insolens ocurreret eam. Et dico blandit mea. Sea tollit vidisse mandamus te, qui movet efficiendi ex.</p>\r\n<p>Doming aliquid te pro. Mei et quodsi ornatus praesent, summo debet vis eu, dolor soleat nostrud sea eu. Cu altera possim sanctus est. Ea iriure repudiandae per, no eam legendos consectetuer. Mel at justo doming voluptatum. Mel mentitum fabellas deserunt no, et duo amet unum appetere.</p>\r\n<p>Quo id nemore dignissim persequeris, unum melius option ei vix, oratio vidisse eam ei. Altera neglegentur cum te. Latine probatus cum cu. Vim dicta sonet intellegebat ne, ei mazim decore eleifend nam, no malis soleat usu. Est ei tale praesent, ad nibh iudicabit has.</p>', '333 East Broadway Avenue\r\nMaryville, TN 37804', '(606) 862-0015', NULL, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3237.7024268769424!2d-83.97154938525155!3d35.75811813335977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x885e9fd3fccccd2b%3A0x4b27a99931ed8fd8!2s333%20E%20Broadway%20Ave%2C%20Maryville%2C%20TN%2037804%2C%20USA!5e0!3m2!1sen!2sbd!4v1625719037629!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '32450', 'Blue', 'Deep Black', '6', '', 'Electric', 'Automatic', '2000 CC', 'OPHD893478234', 'SUV', '2', '4', '2', '30000 KM', '2022', 'Used Car', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '657e270e48cebafa381b724042c03f63.jpg', 6, 3, 0, 1, '2022 Mazda MX-5 Miata Grand Touring', NULL, 'Active', 'Yes', '2022-06-14 08:11:50', '2022-09-11 08:38:49'),
(13, '2015 Mazda Mazda5 Sport', '2015-mazda-mazda5-sport', '<p>Lorem ipsum dolor sit amet, nibh saperet te pri, at nam diceret disputationi. Quo an consul impedit, usu possim evertitur dissentiet ei, ridens minimum nominavi et vix. An per mutat adipisci. Ut pericula dissentias sed, est ea modus gloriatur. Aliquip persius has cu, oportere adversarium mei an, justo fabulas in vix.</p>\r\n<p>Nec in rebum primis causae. Affert iisque ex pri, vis utinam vivendo definitionem ad, nostrum omnesque per et. Omnium antiopam cotidieque cu sit. Id pri placerat voluptatum, vero dicunt dissentiunt eum et, adhuc iisque vis no. Eu suavitate contentiones definitionem mel, ex vide insolens ocurreret eam. Et dico blandit mea. Sea tollit vidisse mandamus te, qui movet efficiendi ex.</p>\r\n<p>Doming aliquid te pro. Mei et quodsi ornatus praesent, summo debet vis eu, dolor soleat nostrud sea eu. Cu altera possim sanctus est. Ea iriure repudiandae per, no eam legendos consectetuer. Mel at justo doming voluptatum. Mel mentitum fabellas deserunt no, et duo amet unum appetere.</p>\r\n<p>Quo id nemore dignissim persequeris, unum melius option ei vix, oratio vidisse eam ei. Altera neglegentur cum te. Latine probatus cum cu. Vim dicta sonet intellegebat ne, ei mazim decore eleifend nam, no malis soleat usu. Est ei tale praesent, ad nibh iudicabit has.</p>', '333 East Broadway Avenue\r\nMaryville, TN 37804', '(606) 862-0015', NULL, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3237.7024268769424!2d-83.97154938525155!3d35.75811813335977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x885e9fd3fccccd2b%3A0x4b27a99931ed8fd8!2s333%20E%20Broadway%20Ave%2C%20Maryville%2C%20TN%2037804%2C%20USA!5e0!3m2!1sen!2sbd!4v1625719037629!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '11960', 'Silver', 'Black', '6', '', 'Electric', 'Automatic', '1200 CC', 'HHD8923477', 'SUV', '4', '4', '4', '12000 KM', '2015', 'New Car', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '3bb970bc46e0a47b20bd0efeda35d14d.jpg', 6, 1, 0, 1, '2015 Mazda Mazda5 Sport', NULL, 'Active', 'Yes', '2022-06-14 08:15:25', '2022-09-11 08:44:27'),
(14, '2019 Lamborghini Urus Base', '2019-lamborghini-urus-base', '<p>Lorem ipsum dolor sit amet, nibh saperet te pri, at nam diceret disputationi. Quo an consul impedit, usu possim evertitur dissentiet ei, ridens minimum nominavi et vix. An per mutat adipisci. Ut pericula dissentias sed, est ea modus gloriatur. Aliquip persius has cu, oportere adversarium mei an, justo fabulas in vix.</p>\r\n<p>Nec in rebum primis causae. Affert iisque ex pri, vis utinam vivendo definitionem ad, nostrum omnesque per et. Omnium antiopam cotidieque cu sit. Id pri placerat voluptatum, vero dicunt dissentiunt eum et, adhuc iisque vis no. Eu suavitate contentiones definitionem mel, ex vide insolens ocurreret eam. Et dico blandit mea. Sea tollit vidisse mandamus te, qui movet efficiendi ex.</p>\r\n<p>Doming aliquid te pro. Mei et quodsi ornatus praesent, summo debet vis eu, dolor soleat nostrud sea eu. Cu altera possim sanctus est. Ea iriure repudiandae per, no eam legendos consectetuer. Mel at justo doming voluptatum. Mel mentitum fabellas deserunt no, et duo amet unum appetere.</p>\r\n<p>Quo id nemore dignissim persequeris, unum melius option ei vix, oratio vidisse eam ei. Altera neglegentur cum te. Latine probatus cum cu. Vim dicta sonet intellegebat ne, ei mazim decore eleifend nam, no malis soleat usu. Est ei tale praesent, ad nibh iudicabit has.</p>', '333 East Broadway Avenue\r\nMaryville, TN 37804', '(606) 862-0015', NULL, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3237.7024268769424!2d-83.97154938525155!3d35.75811813335977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x885e9fd3fccccd2b%3A0x4b27a99931ed8fd8!2s333%20E%20Broadway%20Ave%2C%20Maryville%2C%20TN%2037804%2C%20USA!5e0!3m2!1sen!2sbd!4v1625719037629!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '242990', 'Black', 'Black', '8', '', 'Electric', 'Automatic', '4000 CC', 'GGD98234923', 'SUV', '6', '4', '6', '34000 KM', '2019', 'New Car', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', 'c05257ca738dd4b947f291f6096c5b5e.jpg', 7, 4, 0, 1, '2019 Lamborghini Urus Base', NULL, 'Active', 'Yes', '2022-06-14 08:19:15', '2022-09-11 09:26:11'),
(15, '2019 VW e-golf SEL Premium', '2019-vw-e-golf-sel-premium', '<p>Lorem ipsum dolor sit amet, nibh saperet te pri, at nam diceret disputationi. Quo an consul impedit, usu possim evertitur dissentiet ei, ridens minimum nominavi et vix. An per mutat adipisci. Ut pericula dissentias sed, est ea modus gloriatur. Aliquip persius has cu, oportere adversarium mei an, justo fabulas in vix.</p>\r\n<p>Nec in rebum primis causae. Affert iisque ex pri, vis utinam vivendo definitionem ad, nostrum omnesque per et. Omnium antiopam cotidieque cu sit. Id pri placerat voluptatum, vero dicunt dissentiunt eum et, adhuc iisque vis no. Eu suavitate contentiones definitionem mel, ex vide insolens ocurreret eam. Et dico blandit mea. Sea tollit vidisse mandamus te, qui movet efficiendi ex.</p>\r\n<p>Doming aliquid te pro. Mei et quodsi ornatus praesent, summo debet vis eu, dolor soleat nostrud sea eu. Cu altera possim sanctus est. Ea iriure repudiandae per, no eam legendos consectetuer. Mel at justo doming voluptatum. Mel mentitum fabellas deserunt no, et duo amet unum appetere.</p>\r\n<p>Quo id nemore dignissim persequeris, unum melius option ei vix, oratio vidisse eam ei. Altera neglegentur cum te. Latine probatus cum cu. Vim dicta sonet intellegebat ne, ei mazim decore eleifend nam, no malis soleat usu. Est ei tale praesent, ad nibh iudicabit has.</p>', '333 East Broadway Avenue\r\nMaryville, TN 37804', '(606) 862-0015', NULL, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3237.7024268769424!2d-83.97154938525155!3d35.75811813335977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x885e9fd3fccccd2b%3A0x4b27a99931ed8fd8!2s333%20E%20Broadway%20Ave%2C%20Maryville%2C%20TN%2037804%2C%20USA!5e0!3m2!1sen!2sbd!4v1625719037629!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '29990', 'White', 'Black', '4', '', 'Electric', 'Automatic', '1400 CC', 'AIHS783247923', 'SUV', '4', '4', '6', '12000 KM', '2019', 'Used Car', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '7d29e4eb6fd995ec98f8465e927f1006.jpg', 8, 7, 0, 1, '2019 VW e-golf SEL Premium', NULL, 'Active', 'Yes', '2022-06-14 08:42:08', '2022-09-11 09:37:21');

-- --------------------------------------------------------

--
-- Table structure for table `listing_additional_features`
--

CREATE TABLE `listing_additional_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` int(11) NOT NULL,
  `additional_feature_name` text NOT NULL,
  `additional_feature_value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_additional_features`
--

INSERT INTO `listing_additional_features` (`id`, `listing_id`, `additional_feature_name`, `additional_feature_value`, `created_at`, `updated_at`) VALUES
(11, 5, 'Masks required', 'Yes', NULL, NULL),
(12, 5, 'Payment Methods', 'All major payment method are allowed', NULL, NULL),
(13, 6, 'Credit Card', 'Does not accept', NULL, NULL),
(23, 7, 'Credit Card Accepted', 'Yes', '2022-09-11 06:11:20', '2022-09-11 06:11:20'),
(24, 7, 'Valid Papers Required', 'Yes', '2022-09-11 06:11:20', '2022-09-11 06:11:20'),
(25, 13, 'Credit Card Allowed?', 'Yes', '2022-09-11 08:45:44', '2022-09-11 08:45:44'),
(26, 13, 'Installment Available?', 'No', '2022-09-11 08:45:44', '2022-09-11 08:45:44'),
(27, 14, 'Credit Card Accepted?', 'Yes', '2022-09-11 09:28:15', '2022-09-11 09:28:15'),
(28, 15, 'Credit Card Accepted?', 'Yes', '2022-09-11 09:38:13', '2022-09-11 09:38:13'),
(30, 15, 'Installment Possible?', 'No', '2022-09-11 09:38:35', '2022-09-11 09:38:35'),
(31, 3, 'Credit Card Accepted?', 'Yes', '2022-09-11 09:38:57', '2022-09-11 09:38:57'),
(32, 3, 'Installment Possible?', 'No', '2022-09-11 09:38:57', '2022-09-11 09:38:57'),
(33, 10, 'Installment Possible?', 'No', '2022-09-11 09:40:05', '2022-09-11 09:40:05'),
(34, 10, 'Credit Card Accepted?', 'Yes', '2022-09-11 09:40:35', '2022-09-11 09:40:35'),
(35, 12, 'Credit Card Accepted?', 'Yes', '2022-09-11 09:40:52', '2022-09-11 09:40:52'),
(36, 12, 'Installment Possible?', 'No', '2022-09-11 09:40:52', '2022-09-11 09:40:52'),
(37, 14, 'Installment Possible?', 'Yes', '2022-09-11 09:41:12', '2022-09-11 09:41:12'),
(38, 8, 'Credit Card Accepted?', 'Yes', '2022-09-11 09:41:34', '2022-09-11 09:41:34'),
(39, 8, 'Installment Possible?', 'No', '2022-09-11 09:41:34', '2022-09-11 09:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `listing_amenities`
--

CREATE TABLE `listing_amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` int(11) NOT NULL,
  `amenity_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_amenities`
--

INSERT INTO `listing_amenities` (`id`, `listing_id`, `amenity_id`, `created_at`, `updated_at`) VALUES
(13, 3, 1, NULL, NULL),
(14, 3, 2, NULL, NULL),
(15, 3, 7, NULL, NULL),
(19, 5, 1, NULL, NULL),
(20, 5, 2, NULL, NULL),
(21, 6, 3, NULL, NULL),
(22, 6, 5, NULL, NULL),
(23, 6, 7, NULL, NULL),
(27, 7, 1, '2021-07-24 10:00:12', '2021-07-24 10:00:12'),
(28, 7, 2, '2021-07-24 10:00:12', '2021-07-24 10:00:12'),
(29, 7, 3, '2021-07-24 10:00:12', '2021-07-24 10:00:12'),
(30, 7, 6, '2021-07-24 10:00:12', '2021-07-24 10:00:12'),
(31, 7, 7, '2021-07-24 10:00:12', '2021-07-24 10:00:12'),
(32, 7, 8, '2021-07-24 10:00:12', '2021-07-24 10:00:12'),
(33, 8, 1, '2021-07-24 10:09:58', '2021-07-24 10:09:58'),
(34, 8, 2, '2021-07-24 10:09:58', '2021-07-24 10:09:58'),
(35, 8, 3, '2021-07-24 10:09:58', '2021-07-24 10:09:58'),
(36, 8, 7, '2021-07-24 10:09:58', '2021-07-24 10:09:58'),
(37, 8, 8, '2021-07-24 10:09:58', '2021-07-24 10:09:58'),
(38, 10, 1, '2021-07-24 10:20:22', '2021-07-24 10:20:22'),
(39, 10, 5, '2021-07-24 10:20:23', '2021-07-24 10:20:23'),
(40, 10, 6, '2021-07-24 10:20:23', '2021-07-24 10:20:23'),
(41, 10, 7, '2021-07-24 10:20:23', '2021-07-24 10:20:23'),
(42, 12, 1, '2022-06-14 08:11:50', '2022-06-14 08:11:50'),
(43, 12, 2, '2022-06-14 08:11:50', '2022-06-14 08:11:50'),
(45, 12, 5, '2022-06-14 08:11:50', '2022-06-14 08:11:50'),
(46, 12, 7, '2022-06-14 08:11:50', '2022-06-14 08:11:50'),
(48, 13, 2, '2022-06-14 08:15:25', '2022-06-14 08:15:25'),
(49, 13, 4, '2022-06-14 08:15:25', '2022-06-14 08:15:25'),
(50, 13, 5, '2022-06-14 08:15:25', '2022-06-14 08:15:25'),
(51, 13, 6, '2022-06-14 08:15:25', '2022-06-14 08:15:25'),
(52, 13, 8, '2022-06-14 08:15:25', '2022-06-14 08:15:25'),
(53, 14, 1, '2022-06-14 08:19:15', '2022-06-14 08:19:15'),
(54, 14, 2, '2022-06-14 08:19:15', '2022-06-14 08:19:15'),
(55, 14, 3, '2022-06-14 08:19:15', '2022-06-14 08:19:15'),
(56, 14, 4, '2022-06-14 08:19:15', '2022-06-14 08:19:15'),
(57, 14, 5, '2022-06-14 08:19:15', '2022-06-14 08:19:15'),
(58, 14, 6, '2022-06-14 08:19:15', '2022-06-14 08:19:15'),
(59, 15, 1, '2022-06-14 08:42:08', '2022-06-14 08:42:08'),
(61, 15, 5, '2022-06-14 08:42:08', '2022-06-14 08:42:08'),
(62, 15, 6, '2022-06-14 08:42:08', '2022-06-14 08:42:08'),
(63, 15, 7, '2022-06-14 08:42:08', '2022-06-14 08:42:08'),
(64, 15, 8, '2022-06-14 08:42:08', '2022-06-14 08:42:08'),
(65, 5, 6, '2022-09-11 05:04:08', '2022-09-11 05:04:08'),
(66, 5, 7, '2022-09-11 05:04:08', '2022-09-11 05:04:08'),
(67, 5, 8, '2022-09-11 05:04:08', '2022-09-11 05:04:08'),
(68, 5, 12, '2022-09-11 05:04:08', '2022-09-11 05:04:08'),
(69, 6, 1, '2022-09-11 05:16:22', '2022-09-11 05:16:22'),
(70, 6, 2, '2022-09-11 05:16:22', '2022-09-11 05:16:22'),
(71, 6, 4, '2022-09-11 05:16:22', '2022-09-11 05:16:22'),
(72, 6, 6, '2022-09-11 05:16:22', '2022-09-11 05:16:22'),
(73, 7, 4, '2022-09-11 06:08:33', '2022-09-11 06:08:33'),
(74, 12, 3, '2022-09-11 08:38:49', '2022-09-11 08:38:49'),
(75, 12, 6, '2022-09-11 08:38:49', '2022-09-11 08:38:49'),
(76, 12, 12, '2022-09-11 08:38:49', '2022-09-11 08:38:49'),
(77, 14, 7, '2022-09-11 09:26:23', '2022-09-11 09:26:23'),
(78, 14, 8, '2022-09-11 09:26:23', '2022-09-11 09:26:23'),
(79, 14, 12, '2022-09-11 09:26:23', '2022-09-11 09:26:23'),
(80, 15, 4, '2022-09-11 09:37:41', '2022-09-11 09:37:41'),
(81, 15, 12, '2022-09-11 09:37:41', '2022-09-11 09:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `listing_brands`
--

CREATE TABLE `listing_brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_brand_name` text NOT NULL,
  `listing_brand_slug` text DEFAULT NULL,
  `listing_brand_photo` text NOT NULL,
  `seo_title` text DEFAULT NULL,
  `seo_meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_brands`
--

INSERT INTO `listing_brands` (`id`, `listing_brand_name`, `listing_brand_slug`, `listing_brand_photo`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Toyota', 'toyota', '3fa4918a87203c2b8a4f1f773bc08d74.jpg', 'Toyota', NULL, '2021-07-06 13:39:30', '2022-09-09 23:12:24'),
(2, 'BMW', 'bmw', '13d509467d021397f17e943cb68b750c.jpg', 'BMW', NULL, '2021-07-06 13:39:42', '2022-09-09 22:24:36'),
(3, 'Nissan', 'nissan', 'a4f80e32fdb1db3fa0d0310fe7de62b9.jpg', 'Nissan', NULL, '2021-07-06 13:40:29', '2022-09-09 23:13:55'),
(6, 'Mazda', 'mazda', '2bc74c80d17eebacf1de098186e028b0.jpg', 'Mazda', NULL, '2021-07-11 23:00:44', '2022-09-09 22:17:03'),
(7, 'Lamborghini', 'lamborghini', '25aab7366ea773e85be7b731e25d5d75.jpg', 'Lamborghini', NULL, '2021-07-11 23:03:44', '2022-09-11 09:08:14'),
(8, 'Volkswagen', 'volkswagen', 'abf8e2d9e822fc23acd219246c658e2c.jpg', 'Volkswagen', NULL, '2021-07-11 23:50:49', '2022-09-09 23:15:06'),
(13, 'Porsche', 'porsche', 'bdef15bf04bb381858b82f34216035a3.jpg', 'Porsche', NULL, '2022-06-16 04:52:26', '2022-09-09 23:10:02'),
(14, 'Jaguar', 'jaguar', 'ecda20d11a98085670055e0935530a27.jpg', 'Jaguar', NULL, '2022-06-16 04:59:13', '2022-09-09 23:11:14');

-- --------------------------------------------------------

--
-- Table structure for table `listing_locations`
--

CREATE TABLE `listing_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_location_name` text NOT NULL,
  `listing_location_slug` text DEFAULT NULL,
  `listing_location_photo` text NOT NULL,
  `seo_title` text DEFAULT NULL,
  `seo_meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_locations`
--

INSERT INTO `listing_locations` (`id`, `listing_location_name`, `listing_location_slug`, `listing_location_photo`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'San Diego', 'san-diego', 'eb44f9a13791129efbf73b6557bb6301.jpg', 'San Diego', NULL, '2021-07-06 20:02:02', '2022-09-11 09:55:22'),
(2, 'Chicago', 'chicago', '7f2a3cc598783d96c6cb38822f297c4e.jpg', 'Chicago', NULL, '2021-07-06 20:02:42', '2022-09-11 09:49:24'),
(3, 'Los Angeles', 'los-angeles', 'c9aaf9f4f384a986e92630aee5a729c3.jpg', 'Los Angeles', NULL, '2021-07-06 20:02:54', '2022-09-11 09:57:15'),
(4, 'NewYork', 'newyork', 'da979a83a7ee727dd73f0fc30bbb4ee0.jpg', 'NewYork', NULL, '2021-07-06 20:03:07', '2022-09-11 09:49:33'),
(5, 'Boston', 'boston', 'be19037990394911430d0994c988ad15.jpg', 'Boston', NULL, '2021-07-06 20:03:18', '2022-09-11 09:59:33'),
(7, 'Colorado', 'colorado', '8c252c3932d5514d03df53ef2bf2f578.jpg', 'Colorado', NULL, '2021-07-12 09:39:50', '2022-09-11 10:03:14'),
(8, 'Portland', 'portland', '13ec36fb7431b072dd2d0dedcb9a0327.jpg', 'Portland', NULL, '2022-06-16 06:22:27', '2022-09-11 10:07:00'),
(9, 'Oakland', 'oakland', '76729b551dd233ab8e1e4d4ccfa894d3.jpg', 'Oakland', NULL, '2022-06-16 06:25:28', '2022-09-11 10:08:48');

-- --------------------------------------------------------

--
-- Table structure for table `listing_photos`
--

CREATE TABLE `listing_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` int(11) NOT NULL,
  `photo` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_photos`
--

INSERT INTO `listing_photos` (`id`, `listing_id`, `photo`, `created_at`, `updated_at`) VALUES
(81, 15, '159b8d3252179b42a50399ad7e81a383.jpg', '2022-06-14 08:42:08', '2022-06-14 08:42:08'),
(82, 15, 'd6d29ed704282f9f51725134845b4d7d.jpg', '2022-06-14 08:42:08', '2022-06-14 08:42:08'),
(83, 15, '53f53a220848b76ea91e9970cbdd709d.jpg', '2022-06-14 08:42:08', '2022-06-14 08:42:08'),
(84, 3, 'b1cc20004be93df5d0fa9cb85defaae2.jpg', '2022-09-09 23:54:56', '2022-09-09 23:54:56'),
(85, 3, 'f264e5614e11102dab514b6208c55711.jpg', '2022-09-09 23:54:56', '2022-09-09 23:54:56'),
(86, 3, 'cb6fc696641488cb51604e41e5255d1b.jpg', '2022-09-09 23:54:56', '2022-09-09 23:54:56'),
(87, 5, '7264110e09271723bf7442de251ed3de.jpg', '2022-09-11 05:02:58', '2022-09-11 05:02:58'),
(88, 5, 'b97ea802892bae72d3ba0db9f5eda231.jpg', '2022-09-11 05:02:58', '2022-09-11 05:02:58'),
(89, 5, '71c29f7fc069e0330d624fc824bc0029.jpg', '2022-09-11 05:02:58', '2022-09-11 05:02:58'),
(90, 5, '87a1266731e5ee228bc95f72012efe6c.jpg', '2022-09-11 05:02:58', '2022-09-11 05:02:58'),
(91, 5, 'a090812b2322cf0cc66c0e4bcef78e0e.jpg', '2022-09-11 05:02:58', '2022-09-11 05:02:58'),
(92, 5, 'b038c75a4ebe1f4e8bbd6013c1e9e043.jpg', '2022-09-11 05:02:58', '2022-09-11 05:02:58'),
(93, 6, 'dd30139fc64b96abb338d9c83043f3a6.jpg', '2022-09-11 05:14:48', '2022-09-11 05:14:48'),
(94, 6, 'faefc591e66135b901b71cb64c39fa83.jpg', '2022-09-11 05:14:48', '2022-09-11 05:14:48'),
(95, 6, 'f9b1a3cf75a53582d0840c1a9eb0275b.jpg', '2022-09-11 05:14:48', '2022-09-11 05:14:48'),
(96, 7, '1c540373fde2b6728ac2ab8facc52fc6.jpg', '2022-09-11 06:09:45', '2022-09-11 06:09:45'),
(97, 7, 'ad9deef9eaae167b942f0d711fca5865.jpg', '2022-09-11 06:09:45', '2022-09-11 06:09:45'),
(98, 7, 'e399aeb0e8fdafdf0c5f49b1f1de6694.jpg', '2022-09-11 06:09:45', '2022-09-11 06:09:45'),
(99, 8, '2ed7f9e6b4d0d62fa4c6b5dd284cdb8e.jpg', '2022-09-11 06:35:05', '2022-09-11 06:35:05'),
(100, 8, '0ec136eba95456f39a01b51ab50fe42e.jpg', '2022-09-11 06:35:05', '2022-09-11 06:35:05'),
(101, 8, 'f22d3ab98ba7c6f927ad4369987fa28e.jpg', '2022-09-11 06:35:05', '2022-09-11 06:35:05'),
(102, 10, '9aeaf1b56eeacbf2d63c1cc0d3dbb654.jpg', '2022-09-11 08:04:10', '2022-09-11 08:04:10'),
(103, 10, 'd3f503b277b6806907766d3a9b24db7b.jpg', '2022-09-11 08:04:10', '2022-09-11 08:04:10'),
(104, 10, '2c21c5669c67e72a92651469d79dc2e7.jpg', '2022-09-11 08:04:10', '2022-09-11 08:04:10'),
(105, 12, 'e24ae54b748ea03cad102a9c53de4b4f.jpg', '2022-09-11 08:37:02', '2022-09-11 08:37:02'),
(106, 12, '5686839adb8884af40d8bb2cec66952e.jpg', '2022-09-11 08:37:02', '2022-09-11 08:37:02'),
(107, 12, 'e09b85c46b64550258d1e106019c1588.jpg', '2022-09-11 08:37:02', '2022-09-11 08:37:02'),
(108, 13, '2f7851292074666cc02f2c2f4e67a794.jpg', '2022-09-11 08:43:18', '2022-09-11 08:43:18'),
(109, 13, '9704007af58c2384e15210901812eb71.jpg', '2022-09-11 08:43:18', '2022-09-11 08:43:18'),
(110, 13, 'face1ff2ee5b27dbabb2c3501f9ab8f1.jpg', '2022-09-11 08:43:18', '2022-09-11 08:43:18'),
(111, 14, 'e573f79709af2d6d27226f66a6c55ce8.jpg', '2022-09-11 09:27:57', '2022-09-11 09:27:57'),
(112, 14, '30d24bbfc102357b2ccfc03c1a5baeb4.jpg', '2022-09-11 09:27:57', '2022-09-11 09:27:57'),
(113, 14, '7f568be688984a59d494d499d42d94d8.jpg', '2022-09-11 09:27:57', '2022-09-11 09:27:57'),
(114, 15, '6c78d1c66851985554ea6c7d847dcc5e.jpg', '2022-09-11 09:37:08', '2022-09-11 09:37:08'),
(115, 15, 'a0bcc5429bef70ab55cc2f7010c0ee2f.jpg', '2022-09-11 09:37:08', '2022-09-11 09:37:08'),
(116, 15, 'd75e81b3de80577f4266a11a7ff563c8.jpg', '2022-09-11 09:37:08', '2022-09-11 09:37:08');

-- --------------------------------------------------------

--
-- Table structure for table `listing_social_items`
--

CREATE TABLE `listing_social_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` int(11) NOT NULL,
  `social_icon` text NOT NULL,
  `social_url` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_social_items`
--

INSERT INTO `listing_social_items` (`id`, `listing_id`, `social_icon`, `social_url`, `created_at`, `updated_at`) VALUES
(10, 3, 'Facebook', '#', NULL, NULL),
(11, 3, 'Twitter', '#', NULL, NULL),
(12, 3, 'LinkedIn', '#', NULL, NULL),
(15, 5, 'Facebook', '#', NULL, NULL),
(16, 5, 'Twitter', '#', NULL, NULL),
(17, 6, 'Facebook', '#', NULL, NULL),
(18, 6, 'Twitter', '#', NULL, NULL),
(19, 6, 'YouTube', '#', NULL, NULL),
(20, 6, 'Instagram', '#', NULL, NULL),
(24, 7, 'Facebook', '#', '2021-07-24 10:00:12', '2021-07-24 10:00:12'),
(25, 7, 'Twitter', '#', '2021-07-24 10:00:12', '2021-07-24 10:00:12'),
(26, 7, 'LinkedIn', '#', '2021-07-24 10:00:12', '2021-07-24 10:00:12'),
(27, 8, 'Facebook', '#', '2021-07-24 10:09:59', '2021-07-24 10:09:59'),
(28, 8, 'Twitter', '#', '2021-07-24 10:09:59', '2021-07-24 10:09:59'),
(29, 8, 'Pinterest', '#', '2021-07-24 10:09:59', '2021-07-24 10:09:59'),
(30, 10, 'Facebook', '#', '2021-07-24 10:20:23', '2021-07-24 10:20:23'),
(31, 10, 'YouTube', '#', '2021-07-24 10:20:23', '2021-07-24 10:20:23'),
(32, 10, 'GooglePlus', '#', '2021-07-24 10:20:23', '2021-07-24 10:20:23'),
(33, 10, 'LinkedIn', '#', '2021-07-24 10:20:23', '2021-07-24 10:20:23'),
(34, 12, 'Facebook', '#', '2022-06-14 08:11:51', '2022-06-14 08:11:51'),
(35, 12, 'YouTube', '#', '2022-06-14 08:11:51', '2022-06-14 08:11:51'),
(36, 12, 'Twitter', '#', '2022-06-14 08:11:51', '2022-06-14 08:11:51'),
(37, 13, 'Facebook', '#', '2022-06-14 08:15:25', '2022-06-14 08:15:25'),
(38, 13, 'Twitter', '#', '2022-06-14 08:15:25', '2022-06-14 08:15:25'),
(39, 13, 'LinkedIn', '#', '2022-06-14 08:15:25', '2022-06-14 08:15:25'),
(40, 13, 'YouTube', '#', '2022-06-14 08:15:25', '2022-06-14 08:15:25'),
(41, 14, 'Twitter', '#', '2022-06-14 08:19:15', '2022-06-14 08:19:15'),
(42, 14, 'LinkedIn', '#', '2022-06-14 08:19:15', '2022-06-14 08:19:15'),
(43, 14, 'YouTube', '#', '2022-06-14 08:19:15', '2022-06-14 08:19:15'),
(44, 15, 'LinkedIn', '#', '2022-06-14 08:42:08', '2022-06-14 08:42:08'),
(45, 15, 'YouTube', '#', '2022-06-14 08:42:08', '2022-06-14 08:42:08'),
(46, 15, 'Twitter', '#', '2022-06-14 08:42:08', '2022-06-14 08:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `listing_videos`
--

CREATE TABLE `listing_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` int(11) NOT NULL,
  `youtube_video_id` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_videos`
--

INSERT INTO `listing_videos` (`id`, `listing_id`, `youtube_video_id`, `created_at`, `updated_at`) VALUES
(53, 3, '8a3klIS-kzw', '2022-09-11 04:39:22', '2022-09-11 04:39:22'),
(54, 3, 'nVmEIlRyNbc', '2022-09-11 04:39:22', '2022-09-11 04:39:22'),
(55, 3, 'QoK4VJRsHzc', '2022-09-11 04:39:22', '2022-09-11 04:39:22'),
(56, 5, 'oSFhdNi-qGc', '2022-09-11 05:04:08', '2022-09-11 05:04:08'),
(57, 5, 'hySAyK8-JW4', '2022-09-11 05:04:08', '2022-09-11 05:04:08'),
(58, 5, 'Padg3QDYxjI', '2022-09-11 05:04:08', '2022-09-11 05:04:08'),
(59, 6, 'k7yU3CmUeqQ', '2022-09-11 05:16:02', '2022-09-11 05:16:02'),
(60, 6, 'u-GWH60nFNI', '2022-09-11 05:16:02', '2022-09-11 05:16:02'),
(61, 6, 'Frtm-IMIMhk', '2022-09-11 05:16:02', '2022-09-11 05:16:02'),
(62, 7, 'G1hbsk7_Ihk', '2022-09-11 06:10:27', '2022-09-11 06:10:27'),
(63, 7, 's5Ti50KrarU', '2022-09-11 06:10:27', '2022-09-11 06:10:27'),
(64, 7, '2Y6GyyHWlBY', '2022-09-11 06:10:27', '2022-09-11 06:10:27'),
(65, 8, 'Bzj4IQhYhAg', '2022-09-11 06:35:50', '2022-09-11 06:35:50'),
(66, 8, 'u42n5bVbYgA', '2022-09-11 06:35:50', '2022-09-11 06:35:50'),
(67, 8, 'VYKz2xIJbZs', '2022-09-11 06:35:50', '2022-09-11 06:35:50'),
(68, 10, 'D1JVxeVoKFM', '2022-09-11 08:04:10', '2022-09-11 08:04:10'),
(69, 10, 'UDpH-EaCUWg', '2022-09-11 08:04:10', '2022-09-11 08:04:10'),
(70, 10, 'uYq31yUCX0g', '2022-09-11 08:04:10', '2022-09-11 08:04:10'),
(71, 12, '2idhRGvkU0s', '2022-09-11 08:35:00', '2022-09-11 08:35:00'),
(72, 12, 'sh3rPmYxO-Q', '2022-09-11 08:35:00', '2022-09-11 08:35:00'),
(73, 12, 'Bxey5z2mt9k', '2022-09-11 08:35:00', '2022-09-11 08:35:00'),
(74, 13, '7PYZMoQQqsU', '2022-09-11 08:43:18', '2022-09-11 08:43:18'),
(75, 13, 'CrE0Qt-i1vM', '2022-09-11 08:43:18', '2022-09-11 08:43:18'),
(76, 13, 'uScUBMGPBcU', '2022-09-11 08:43:18', '2022-09-11 08:43:18'),
(77, 14, '9lVdn9sG1FU', '2022-09-11 09:27:57', '2022-09-11 09:27:57'),
(78, 14, 'dQrGGHM8xRo', '2022-09-11 09:27:57', '2022-09-11 09:27:57'),
(79, 14, 'cQvQaZ4ML0E', '2022-09-11 09:27:57', '2022-09-11 09:27:57'),
(80, 15, 'bhZDpefiWIQ', '2022-09-11 09:37:08', '2022-09-11 09:37:08'),
(81, 15, 'BC3PheAPDOE', '2022-09-11 09:37:08', '2022-09-11 09:37:08'),
(82, 15, 'B3i7T1VIfuQ', '2022-09-11 09:37:08', '2022-09-11 09:37:08');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_10_05_052517_create_admins_table', 1),
(5, '2020_11_18_041627_create_categories_table', 1),
(6, '2020_11_18_041747_create_blogs_table', 1),
(8, '2020_11_20_052802_create_general_settings_table', 3),
(11, '2020_11_20_161634_create_page_about_items_table', 4),
(14, '2020_11_21_052123_create_page_blog_items_table', 5),
(18, '2020_11_21_052416_create_page_faq_items_table', 5),
(20, '2020_11_21_052449_create_page_contact_items_table', 5),
(22, '2020_11_21_052522_create_page_term_items_table', 5),
(23, '2020_11_21_052537_create_page_privacy_items_table', 5),
(24, '2020_11_21_121719_create_page_home_items_table', 6),
(25, '2020_11_22_034318_create_page_other_items_table', 7),
(35, '2020_11_23_065919_create_testimonials_table', 15),
(36, '2020_11_23_145620_create_team_members_table', 16),
(37, '2020_11_23_170012_create_faqs_table', 17),
(38, '2020_11_24_155819_create_email_templates_table', 18),
(39, '2020_11_25_003858_create_social_media_items_table', 19),
(40, '2020_11_25_014512_create_subscribers_table', 20),
(48, '2020_12_03_124013_create_customers_table', 27),
(49, '2020_12_06_054145_create_orders_table', 28),
(68, '2021_05_27_120318_create_page_refund_items_table', 29),
(69, '2021_06_14_033116_create_products_table', 29),
(70, '2021_06_14_033648_create_product_categories_table', 29),
(71, '2021_06_14_033937_create_product_tags_table', 29),
(72, '2021_06_14_034232_create_product_photos_table', 29),
(73, '2021_06_19_133943_create_product_videos_table', 30),
(74, '2021_06_20_103527_create_features_table', 31),
(75, '2021_06_24_042127_create_order_details_table', 32),
(76, '2021_06_25_115914_create_customer_products_table', 33),
(77, '2021_07_06_091800_create_page_pricing_items_table', 34),
(78, '2021_07_06_092303_create_page_property_category_items_table', 35),
(79, '2021_07_06_092326_create_page_property_location_items_table', 35),
(80, '2021_07_06_092346_create_page_property_items_table', 35),
(81, '2020_11_28_085244_create_comments_table', 36),
(83, '2020_11_22_051017_create_dynamic_pages_table', 37),
(84, '2021_07_06_155753_create_property_brands_table', 37),
(85, '2021_07_06_155812_create_property_locations_table', 37),
(86, '2021_07_06_155829_create_properties_table', 37),
(92, '2021_07_06_160817_create_property_amenities_table', 38),
(93, '2021_07_06_160837_create_property_photos_table', 38),
(94, '2021_07_06_160854_create_property_videos_table', 38),
(95, '2021_07_06_160938_create_property_social_items_table', 38),
(96, '2021_07_06_161021_create_property_additional_features_table', 38),
(97, '2021_07_06_185302_create_amenities_table', 38),
(98, '2021_07_08_064744_create_packages_table', 39),
(99, '2021_07_08_163838_create_package_purchases_table', 40);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_type` text NOT NULL,
  `package_name` text NOT NULL,
  `package_price` text DEFAULT NULL,
  `valid_days` text NOT NULL,
  `total_listings` text NOT NULL,
  `total_amenities` text NOT NULL,
  `total_photos` text NOT NULL,
  `total_videos` text NOT NULL,
  `total_social_items` text NOT NULL,
  `total_additional_features` text NOT NULL,
  `allow_featured` text NOT NULL,
  `package_order` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_type`, `package_name`, `package_price`, `valid_days`, `total_listings`, `total_amenities`, `total_photos`, `total_videos`, `total_social_items`, `total_additional_features`, `allow_featured`, `package_order`, `created_at`, `updated_at`) VALUES
(1, 'Free', 'Free', '0', '1', '1', '2', '2', '2', '2', '2', 'No', 1, '2021-07-08 02:42:16', '2021-07-18 22:20:20'),
(2, 'Paid', 'Standard', '10', '30', '5', '5', '5', '5', '5', '5', 'Yes', 2, '2021-07-08 02:43:07', '2021-07-19 12:34:55'),
(4, 'Paid', 'Premium', '45', '60', '20', '20', '20', '20', '20', '20', 'Yes', 3, '2021-07-08 03:31:43', '2021-07-08 04:01:58');

-- --------------------------------------------------------

--
-- Table structure for table `package_purchases`
--

CREATE TABLE `package_purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `transaction_id` text DEFAULT NULL,
  `paid_amount` text NOT NULL,
  `paid_currency` text DEFAULT NULL,
  `paid_currency_symbol` text DEFAULT NULL,
  `admin_amount` text DEFAULT NULL,
  `payment_method` text DEFAULT NULL,
  `payment_status` text NOT NULL,
  `package_start_date` text NOT NULL,
  `package_end_date` text NOT NULL,
  `currently_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_purchases`
--

INSERT INTO `package_purchases` (`id`, `user_id`, `package_id`, `transaction_id`, `paid_amount`, `paid_currency`, `paid_currency_symbol`, `admin_amount`, `payment_method`, `payment_status`, `package_start_date`, `package_end_date`, `currently_active`, `created_at`, `updated_at`) VALUES
(1, 4, 4, 'PAYID-MDV23AY53140771GK6394933', '45.00', 'USD', '$', '45', 'PayPal', 'Completed', '2021-07-12', '2028-09-10', 1, NULL, '2022-03-11 21:53:40'),
(5, 3, 2, 'txn_3Kbz8LGD31Py00wT0xK7nK6I', '766.7', 'INR', '₹', '10', 'Stripe', 'Completed', '2022-03-11', '2022-04-10', 0, '2022-03-10 21:27:18', '2022-04-14 22:31:02'),
(6, 3, 2, 'PAYID-MIVMJ7I7TU27601UC2064509', '10', 'USD', '$', '10', 'PayPal', 'Completed', '2022-03-11', '2022-04-10', 0, '2022-03-10 21:43:39', '2022-04-14 22:31:02'),
(8, 3, 2, 'pay_J6O7IQXnl8Xhd6', '845', 'BDT', '৳', '10', 'RazorPay', 'Completed', '2022-03-13', '2022-04-12', 0, '2022-03-12 19:14:05', '2022-04-14 22:31:02'),
(9, 3, 2, '3219377', '4158.4', 'NGN', '₦', '10', 'Flutterwave', 'Completed', '2022-03-13', '2022-04-12', 0, '2022-03-12 19:35:11', '2022-04-14 22:31:02'),
(10, 3, 1, '', '0', NULL, NULL, NULL, '', 'Completed', '2022-04-15', '2028-04-16', 1, '2022-04-14 22:31:02', '2022-04-14 22:31:02');

-- --------------------------------------------------------

--
-- Table structure for table `page_about_items`
--

CREATE TABLE `page_about_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `detail` text DEFAULT NULL,
  `banner` text NOT NULL,
  `status` text NOT NULL,
  `seo_title` text DEFAULT NULL,
  `seo_meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_about_items`
--

INSERT INTO `page_about_items` (`id`, `name`, `detail`, `banner`, `status`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'About Us', '<h3>Our Mission</h3>\r\n<p style=\"text-align: left;\">Lorem ipsum dolor sit amet, ea qui tation adversarium definitionem, eu labitur denique est. Ad duo quando recusabo petentium. Mea elit affert oportere ex. Ut error affert accusam pri. Sit no causae vidisse invenire, bonorum inermis nec ex.</p>\r\n<p>Eam sint reformidans ex, ex doming iracundia his. Sint modus pro ne, vix ut omnis scripta corpora. Sea graecis suavitate te. Eum tantas possim torquatos ei. An qui falli sadipscing suscipiantur. At congue forensibus constituto his, erat vidit veniam vis eu, dico soleat possim nec ei.</p>\r\n<h3>Our Vision</h3>\r\n<p>Cu modo adipisci sea. At clita doctus sit. Pri ex solet deterruisset, falli harum fuisset qui ei, an commune delicata patrioque sit. Fabulas adversarium no sea, at quis disputando pri, meis epicurei eloquentiam vix ad. An consulatu sententiae posidonium his, te elaboraret cotidieque eos, sed an illud recteque.</p>\r\n<p>Eu per altera aliquam consulatu, ea pro nulla doctus. Sea porro everti an, nostrud ceteros nam no. Ei quando qualisque his, alterum ocurreret nec eu, dolorum deseruisse ad mel. Nam vidit omnis ad, pro eu veniam efficiendi, sea an iriure vivendo appetere. Usu ad latine vocibus voluptatum.</p>\r\n<p>Et bonorum consetetur mediocritatem qui, cu est omnis persequeris, mea te doctus incorrupte. Vix et tale justo. Vel te lorem sapientem interesset. Ne ius tantas saperet officiis, volutpat adolescens ut sea, an animal consectetuer vis. Nonumy ornatus constituam vis ne, cum ne vidisse patrioque.</p>', '53f50d2bf215f178667bbd016538ba9d.jpg', 'Show', 'About Us', 'About Us', NULL, '2022-09-10 06:59:12');

-- --------------------------------------------------------

--
-- Table structure for table `page_blog_items`
--

CREATE TABLE `page_blog_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `detail` text DEFAULT NULL,
  `banner` text NOT NULL,
  `status` text NOT NULL,
  `seo_title` text DEFAULT NULL,
  `seo_meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_blog_items`
--

INSERT INTO `page_blog_items` (`id`, `name`, `detail`, `banner`, `status`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Blog', NULL, '4ea2ecf38750ca3c1efd203a3cb27b5e.jpg', 'Show', 'Blog', 'Blog Meta Description', NULL, '2022-09-10 06:59:22');

-- --------------------------------------------------------

--
-- Table structure for table `page_contact_items`
--

CREATE TABLE `page_contact_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `detail` text DEFAULT NULL,
  `banner` text NOT NULL,
  `status` text NOT NULL,
  `contact_address` text DEFAULT NULL,
  `contact_email` text DEFAULT NULL,
  `contact_phone` text DEFAULT NULL,
  `contact_map` text NOT NULL,
  `seo_title` text DEFAULT NULL,
  `seo_meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_contact_items`
--

INSERT INTO `page_contact_items` (`id`, `name`, `detail`, `banner`, `status`, `contact_address`, `contact_email`, `contact_phone`, `contact_map`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Contact Us', NULL, 'ad39adbcdc2c4085e818d495203092e1.jpg', 'Show', '3153 Foley Street\r\nMiami, FL 33176', 'Office 1: 954-648-1802\r\nOffice 2: 963-612-1782', 'sales@yourwebsite.com\r\nsupport@yourwebsite.com', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3313.3833161665298!2d-118.03745848530627!3d33.85401093559897!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80dd2c6c97f8f3ed%3A0x47b1bde165dcc056!2sOak+Dr%2C+La+Palma%2C+CA+90623%2C+USA!5e0!3m2!1sen!2sbd!4v1544238752504\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'Contact Us', 'Contact Us Meta Description', NULL, '2022-09-10 06:59:40');

-- --------------------------------------------------------

--
-- Table structure for table `page_faq_items`
--

CREATE TABLE `page_faq_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `detail` text DEFAULT NULL,
  `banner` text NOT NULL,
  `status` text NOT NULL,
  `seo_title` text DEFAULT NULL,
  `seo_meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_faq_items`
--

INSERT INTO `page_faq_items` (`id`, `name`, `detail`, `banner`, `status`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'FAQ', NULL, '7e8148c29f4fdba3b1c90617165fb953.jpg', 'Show', 'FAQ', 'FAQ Meta Description', NULL, '2022-09-10 06:59:31');

-- --------------------------------------------------------

--
-- Table structure for table `page_home_items`
--

CREATE TABLE `page_home_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seo_title` text DEFAULT NULL,
  `seo_meta_description` text DEFAULT NULL,
  `search_heading` text DEFAULT NULL,
  `search_text` text DEFAULT NULL,
  `search_background` text DEFAULT NULL,
  `brand_heading` text DEFAULT NULL,
  `brand_subheading` text DEFAULT NULL,
  `brand_total` int(11) DEFAULT NULL,
  `brand_status` text NOT NULL,
  `video_heading` text DEFAULT NULL,
  `video_text` text DEFAULT NULL,
  `video_youtube_id` text DEFAULT NULL,
  `video_background` text DEFAULT NULL,
  `video_status` text NOT NULL,
  `listing_heading` text DEFAULT NULL,
  `listing_subheading` text DEFAULT NULL,
  `listing_total` int(11) DEFAULT NULL,
  `listing_status` text NOT NULL,
  `testimonial_heading` text DEFAULT NULL,
  `testimonial_subheading` text DEFAULT NULL,
  `testimonial_background` text DEFAULT NULL,
  `testimonial_status` text NOT NULL,
  `location_heading` text DEFAULT NULL,
  `location_subheading` text DEFAULT NULL,
  `location_total` int(11) DEFAULT NULL,
  `location_status` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_home_items`
--

INSERT INTO `page_home_items` (`id`, `seo_title`, `seo_meta_description`, `search_heading`, `search_text`, `search_background`, `brand_heading`, `brand_subheading`, `brand_total`, `brand_status`, `video_heading`, `video_text`, `video_youtube_id`, `video_background`, `video_status`, `listing_heading`, `listing_subheading`, `listing_total`, `listing_status`, `testimonial_heading`, `testimonial_subheading`, `testimonial_background`, `testimonial_status`, `location_heading`, `location_subheading`, `location_total`, `location_status`, `created_at`, `updated_at`) VALUES
(1, 'CarPoint - Multi Vendor Car Listing Directory', NULL, 'Find Your Desired Car', 'You can get your desired awesome different types of cars here by name, category or brand.', '006cd0074f808a36f64b572092a49eed.jpg', 'Brands', 'Please see all the car brands from here', 8, 'Show', 'Car Listing Instruction Video', 'You can submit your car on this website. But before submission, we suggest you to view our video guideline and we are sure it will help you very much to understand the review and submission process.', 'nSESMoHgItM', '210dcd72d6c4e55a05bbf5c8e0a75da5.jpg', 'Show', 'Featured Cars', 'See all the popular cars from below', 6, 'Show', 'Testimonial', 'What our clients tell about us', '78d1c104310a2e9fa6b0dab3130cd508.jpg', 'Show', 'Locations', 'Please see all the car locations from here', 8, 'Show', NULL, '2022-09-11 10:58:36');

-- --------------------------------------------------------

--
-- Table structure for table `page_listing_brand_items`
--

CREATE TABLE `page_listing_brand_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `detail` text DEFAULT NULL,
  `banner` text NOT NULL,
  `status` text NOT NULL,
  `seo_title` text DEFAULT NULL,
  `seo_meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_listing_brand_items`
--

INSERT INTO `page_listing_brand_items` (`id`, `name`, `detail`, `banner`, `status`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Listing Brand', NULL, '0c753632e3dc3980af6fc3c30ba32a2b.jpg', 'Show', 'Listing Brand', NULL, NULL, '2022-09-10 21:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `page_listing_items`
--

CREATE TABLE `page_listing_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `detail` text DEFAULT NULL,
  `banner` text NOT NULL,
  `status` text NOT NULL,
  `seo_title` text DEFAULT NULL,
  `seo_meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_listing_items`
--

INSERT INTO `page_listing_items` (`id`, `name`, `detail`, `banner`, `status`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Listing', NULL, '17257fb19420ac1317819843235591d9.jpg', 'Show', 'Listing', NULL, NULL, '2022-09-10 07:00:24');

-- --------------------------------------------------------

--
-- Table structure for table `page_listing_location_items`
--

CREATE TABLE `page_listing_location_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `detail` text DEFAULT NULL,
  `banner` text NOT NULL,
  `status` text NOT NULL,
  `seo_title` text DEFAULT NULL,
  `seo_meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_listing_location_items`
--

INSERT INTO `page_listing_location_items` (`id`, `name`, `detail`, `banner`, `status`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Listing Location', NULL, '023f9a040e41edac2cd1a37fe130be7a.jpg', 'Show', 'Listing Location', NULL, NULL, '2022-09-10 07:00:42');

-- --------------------------------------------------------

--
-- Table structure for table `page_other_items`
--

CREATE TABLE `page_other_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `login_page_seo_title` text NOT NULL,
  `login_page_seo_meta_description` text DEFAULT NULL,
  `login_page_banner` text NOT NULL,
  `registration_page_seo_title` text DEFAULT NULL,
  `registration_page_seo_meta_description` text DEFAULT NULL,
  `registration_page_banner` text NOT NULL,
  `forget_password_page_seo_title` text DEFAULT NULL,
  `forget_password_page_seo_meta_description` text DEFAULT NULL,
  `forget_password_page_banner` text NOT NULL,
  `customer_panel_page_seo_title` text DEFAULT NULL,
  `customer_panel_page_seo_meta_description` text DEFAULT NULL,
  `customer_panel_page_banner` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_other_items`
--

INSERT INTO `page_other_items` (`id`, `login_page_seo_title`, `login_page_seo_meta_description`, `login_page_banner`, `registration_page_seo_title`, `registration_page_seo_meta_description`, `registration_page_banner`, `forget_password_page_seo_title`, `forget_password_page_seo_meta_description`, `forget_password_page_banner`, `customer_panel_page_seo_title`, `customer_panel_page_seo_meta_description`, `customer_panel_page_banner`, `created_at`, `updated_at`) VALUES
(1, 'Login', NULL, '02904c59043470e451f0cbf6e0b891d3.jpg', 'Registration', NULL, 'c15c06240e63faef21c06a891a52d721.jpg', 'Forget Password', NULL, '1ac9781bb480ed9623ca153eafe1d1c9.jpg', 'Customer Panel', NULL, '7eb1650ca5075e2b8c9d96f6ab43839e.jpg', NULL, '2022-09-10 07:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `page_pricing_items`
--

CREATE TABLE `page_pricing_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `detail` text DEFAULT NULL,
  `banner` text NOT NULL,
  `status` text NOT NULL,
  `seo_title` text DEFAULT NULL,
  `seo_meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_pricing_items`
--

INSERT INTO `page_pricing_items` (`id`, `name`, `detail`, `banner`, `status`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Pricing', NULL, '55943a0e85f9410b80defc0eb9934fac.jpg', 'Show', 'Pricing', NULL, NULL, '2022-09-10 06:59:47');

-- --------------------------------------------------------

--
-- Table structure for table `page_privacy_items`
--

CREATE TABLE `page_privacy_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `detail` text DEFAULT NULL,
  `banner` text NOT NULL,
  `status` text NOT NULL,
  `seo_title` text DEFAULT NULL,
  `seo_meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_privacy_items`
--

INSERT INTO `page_privacy_items` (`id`, `name`, `detail`, `banner`, `status`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Privacy Policy', '<p>Lorem ipsum dolor sit amet, id saperet suavitate signiferumque sea. Eu tantas invenire signiferumque per, at affert eloquentiam eos, duo no sale utroque. His ad homero verterem, ut paulo neglegentur contentiones per. Ex cum unum vocent commodo. Ut ridens principes rationibus ius, ex mea saepe docendi, cu eum unum assum accumsan.</p>\r\n<p>Ne quo possim consectetuer, splendide voluptatibus ut mea. Summo mucius regione qui et, sea soleat everti indoctum no. Brute postea ut vel, oblique propriae pertinacia et sed. No nominati adipiscing nam, accusata interpretaris no est, no tota conceptam nam. Id posidonium dissentiunt mea, an nibh menandri eum. Meis nominati cum cu.</p>\r\n<p>Eum ad delicatissimi signiferumque, mea causae delenit perfecto et. Sit primis nostrum id, an postea numquam per, id quo diceret deleniti consectetuer. Eum eu salutatus mediocritatem. Blandit ocurreret dissentiet ne quo, ex mazim numquam delenit his.</p>\r\n<p>Ea mel elit placerat. Ius nobis delicata gloriatur at. Nam fabulas salutandi at, in per officiis omittantur contentiones, omnes insolens suscipiantur sed cu. Ei modus persequeris vix. Persius legimus has an, mea dicit maiestatis adipiscing eu.</p>', '75d0d8c129db6f43989b0b498efb8097.jpg', 'Show', 'Privacy Policy', 'Privacy Policy Meta Description', NULL, '2022-09-10 07:01:04');

-- --------------------------------------------------------

--
-- Table structure for table `page_term_items`
--

CREATE TABLE `page_term_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `detail` text DEFAULT NULL,
  `banner` text NOT NULL,
  `status` text NOT NULL,
  `seo_title` text DEFAULT NULL,
  `seo_meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_term_items`
--

INSERT INTO `page_term_items` (`id`, `name`, `detail`, `banner`, `status`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Terms and Conditions', '<p>Lorem ipsum dolor sit amet, id saperet suavitate signiferumque sea. Eu tantas invenire signiferumque per, at affert eloquentiam eos, duo no sale utroque. His ad homero verterem, ut paulo neglegentur contentiones per. Ex cum unum vocent commodo. Ut ridens principes rationibus ius, ex mea saepe docendi, cu eum unum assum accumsan.</p>\r\n<p>Ne quo possim consectetuer, splendide voluptatibus ut mea. Summo mucius regione qui et, sea soleat everti indoctum no. Brute postea ut vel, oblique propriae pertinacia et sed. No nominati adipiscing nam, accusata interpretaris no est, no tota conceptam nam. Id posidonium dissentiunt mea, an nibh menandri eum. Meis nominati cum cu.</p>\r\n<p>Eum ad delicatissimi signiferumque, mea causae delenit perfecto et. Sit primis nostrum id, an postea numquam per, id quo diceret deleniti consectetuer. Eum eu salutatus mediocritatem. Blandit ocurreret dissentiet ne quo, ex mazim numquam delenit his.</p>\r\n<p>Ea mel elit placerat. Ius nobis delicata gloriatur at. Nam fabulas salutandi at, in per officiis omittantur contentiones, omnes insolens suscipiantur sed cu. Ei modus persequeris vix. Persius legimus has an, mea dicit maiestatis adipiscing eu.</p>', '3dc9f048fc748843f0d00940c6e4f262.jpg', 'Show', 'Terms and Conditions', 'Terms and Conditions Meta Description', NULL, '2022-09-10 07:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('arefin2k@gmail.com', '$2y$10$n.b82lZQRLiL4WIgRsgpeu8UpfQMmx9M1FdiQQ18rjK38i9yGD6kG', '2020-11-23 19:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `agent_type` text NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `listing_id`, `agent_id`, `agent_type`, `rating`, `review`, `created_at`, `updated_at`) VALUES
(2, 3, 3, 'Customer', 4, 'This car is just awesome. I loved it.', '2021-07-11 12:42:25', '2021-07-11 12:42:25'),
(3, 7, 3, 'Customer', 5, 'First we thought that it was not good. But it changed our mind. It is very nice to ride. ', '2021-07-22 07:35:29', '2021-07-22 07:35:29'),
(4, 6, 3, 'Customer', 1, 'This is just a racing machine. Excellent accelaration.', '2021-07-22 08:21:04', '2021-07-22 08:21:04'),
(6, 3, 6, 'Customer', 3, 'Speed and accuracy is awesome. Always recommended!', '2021-07-22 17:43:38', '2021-07-22 17:43:38'),
(8, 5, 1, 'Admin', 4, 'Speechless and very good.', '2021-07-22 22:16:53', '2021-07-22 22:39:02'),
(11, 6, 1, 'Admin', 5, 'I love all the variations of this car.', '2021-07-22 22:44:16', '2021-07-22 22:44:16'),
(12, 5, 6, 'Customer', 5, 'The security is a pleasure. ', '2021-07-23 00:24:27', '2021-07-23 00:24:27');

-- --------------------------------------------------------

--
-- Table structure for table `social_media_items`
--

CREATE TABLE `social_media_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `social_url` text NOT NULL,
  `social_icon` text NOT NULL,
  `social_order` smallint(6) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media_items`
--

INSERT INTO `social_media_items` (`id`, `social_url`, `social_icon`, `social_order`, `created_at`, `updated_at`) VALUES
(2, 'https://www.twitter.com', 'fab fa-twitter', 2, '2020-11-24 12:54:56', '2021-07-05 09:41:31'),
(4, 'https://www.facebook.com/', 'fab fa-facebook-f', 1, '2020-11-24 12:56:23', '2022-03-06 21:49:11'),
(7, 'https://www.linkedin.com', 'fab fa-linkedin-in', 3, '2021-07-05 09:41:50', '2021-07-05 09:42:09'),
(8, 'https://www.pinterest.com', 'fab fa-pinterest-p', 4, '2021-07-05 09:42:37', '2021-07-16 22:24:50');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `designation` text DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `photo` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `designation`, `comment`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'David Smith', 'CEO, XYZ Multimedia', 'Eu alii augue copiosae cum, duo ei quaeque tibique repudiare, tantas pertinax pro ad. An vis ferri singulis tractatos. Per in facer utamur qualisque, vim simul placerat ex, ex vidit omnium convenire vix. At sea inani numquam tractatos. Persius adipisci rationibus at cum, qui cu aperiam volutpat periculis. Stet docendi adipisci mei ei.', '2bd322322a29fbd968cd2845fc9f6ab9.jpg', '2022-03-13 04:53:32', '2022-03-13 10:18:27'),
(2, 'John Doe', 'Director, ABC Media', 'Iisque corrumpit voluptatum vel et, et maluisset contentiones eos. Duo tantas adversarium eu, erant labores an mea. Ei perfecto tacimates mei. Per eirmod oporteat antiopam eu, duo in mucius admodum, nibh consul detracto cu sea. Nonumy iudicabit eu eam, at sed apeirian platonem liberavisse. Magna noster disputando pri eu.', 'acfabd7132148c90fcb91c9d911c6e88.jpg', '2022-03-13 10:16:59', '2022-03-13 10:16:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `zip` text DEFAULT NULL,
  `website` text DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `linkedin` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `pinterest` text DEFAULT NULL,
  `youtube` text DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `banner` text DEFAULT NULL,
  `password` text NOT NULL,
  `token` text NOT NULL,
  `status` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `country`, `address`, `state`, `city`, `zip`, `website`, `facebook`, `twitter`, `linkedin`, `instagram`, `pinterest`, `youtube`, `photo`, `banner`, `password`, `token`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Peter Smith', 'customer@gmail.com', '111-222-4569', 'USA', '23, PK Road, NYC 45', 'CA', 'NYC', '12982', 'https://www.testwebsite.com', 'https://www.facebook.com/sabbir', 'https://www.twitter.com/sabbir', NULL, NULL, NULL, NULL, '39953cc10c2b3ca7b26a64a3d53a3527.jpg', '5913aa1901f13d57607c5308ca4c6ed8.jpg', '2053cbd28ac423a87187fc7a5c83f799', '', 'Active', '2021-07-10 02:24:24', '2022-03-08 07:53:25'),
(4, 'James Hendershot', 'customer1@gmail.com', '662-908-3879', 'United States', '1240 Tanglewood Road,', 'MS', 'Luka', '38852', 'https://www.james101.com', '#', '#', '#', '#', '#', '#', '9cccdb0438c11135c7cd17549df802fd.jpg', 'faf1e4768e32e6272ef9f7e6342bfa1e.jpg', '$2y$10$jS2sgKkluo1AZR73RPltluFnY3aQF7yxp6INXhfmOn7VrpTEWGp76', '', 'Active', '2021-07-11 20:41:06', '2022-03-08 07:52:48'),
(6, 'Samin Shikder', 'customer2@gmail.com', '662-746-8568', 'USA', '2642 Rafe Lane', 'MS', 'Yazoo City', '39194', 'http://www.samin00.com', '#', '#', '#', '#', NULL, NULL, NULL, NULL, '$2y$10$51K8otGh6RH1CLbwW2YgK.TK0BzI1dJKGdySUA53i2gvDDcMeGruq', 'dd46d3a124a85f2f910008ce2c906face1e79a2db1d446bfa8db4843a91f89f5', 'Active', '2021-07-17 00:33:56', '2022-09-10 21:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `listing_id`, `created_at`, `updated_at`) VALUES
(4, 6, 3, '2021-07-23 05:03:13', '2021-07-23 05:03:13'),
(5, 6, 5, '2021-07-23 05:03:58', '2021-07-23 05:03:58'),
(10, 3, 8, '2022-03-08 04:21:47', '2022-03-08 04:21:47'),
(11, 3, 6, '2022-03-08 04:21:51', '2022-03-08 04:21:51'),
(12, 3, 15, '2022-06-15 21:49:21', '2022-06-15 21:49:21'),
(13, 3, 13, '2022-06-15 21:51:29', '2022-06-15 21:51:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dynamic_pages`
--
ALTER TABLE `dynamic_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_advertisements`
--
ALTER TABLE `home_advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listing_additional_features`
--
ALTER TABLE `listing_additional_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listing_amenities`
--
ALTER TABLE `listing_amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listing_brands`
--
ALTER TABLE `listing_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listing_locations`
--
ALTER TABLE `listing_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listing_photos`
--
ALTER TABLE `listing_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listing_social_items`
--
ALTER TABLE `listing_social_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listing_videos`
--
ALTER TABLE `listing_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_purchases`
--
ALTER TABLE `package_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_about_items`
--
ALTER TABLE `page_about_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_blog_items`
--
ALTER TABLE `page_blog_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_contact_items`
--
ALTER TABLE `page_contact_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_faq_items`
--
ALTER TABLE `page_faq_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_home_items`
--
ALTER TABLE `page_home_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_listing_brand_items`
--
ALTER TABLE `page_listing_brand_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_listing_items`
--
ALTER TABLE `page_listing_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_listing_location_items`
--
ALTER TABLE `page_listing_location_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_other_items`
--
ALTER TABLE `page_other_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_pricing_items`
--
ALTER TABLE `page_pricing_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_privacy_items`
--
ALTER TABLE `page_privacy_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_term_items`
--
ALTER TABLE `page_term_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media_items`
--
ALTER TABLE `social_media_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dynamic_pages`
--
ALTER TABLE `dynamic_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_advertisements`
--
ALTER TABLE `home_advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `listing_additional_features`
--
ALTER TABLE `listing_additional_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `listing_amenities`
--
ALTER TABLE `listing_amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `listing_brands`
--
ALTER TABLE `listing_brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `listing_locations`
--
ALTER TABLE `listing_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `listing_photos`
--
ALTER TABLE `listing_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `listing_social_items`
--
ALTER TABLE `listing_social_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `listing_videos`
--
ALTER TABLE `listing_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `package_purchases`
--
ALTER TABLE `package_purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `page_about_items`
--
ALTER TABLE `page_about_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_blog_items`
--
ALTER TABLE `page_blog_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_contact_items`
--
ALTER TABLE `page_contact_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_faq_items`
--
ALTER TABLE `page_faq_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_home_items`
--
ALTER TABLE `page_home_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_listing_brand_items`
--
ALTER TABLE `page_listing_brand_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_listing_items`
--
ALTER TABLE `page_listing_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_listing_location_items`
--
ALTER TABLE `page_listing_location_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_other_items`
--
ALTER TABLE `page_other_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_pricing_items`
--
ALTER TABLE `page_pricing_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_privacy_items`
--
ALTER TABLE `page_privacy_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_term_items`
--
ALTER TABLE `page_term_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `social_media_items`
--
ALTER TABLE `social_media_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
