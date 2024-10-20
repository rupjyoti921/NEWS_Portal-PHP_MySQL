-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2022 at 08:02 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newsportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladdimage`
--

CREATE TABLE `tbladdimage` (
  `id` int(255) NOT NULL,
  `post_id` int(255) DEFAULT NULL,
  `post_images` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladdimage`
--

INSERT INTO `tbladdimage` (`id`, `post_id`, `post_images`) VALUES
(9, 27, '02f1866828c812bfe77552f0981d3a53.jpg'),
(10, 33, 'cce9aab8fdbea3c8a680845229db5531.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `AdminUserName` varchar(255) DEFAULT NULL,
  `AdminPassword` varchar(255) DEFAULT NULL,
  `AdminEmailId` varchar(255) DEFAULT NULL,
  `userType` int(11) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `AdminUserName`, `AdminPassword`, `AdminEmailId`, `userType`, `CreationDate`, `UpdationDate`) VALUES
(1, 'admin', 'f925916e2754e5e03f75dd58a5733251', 'phpgurukulofficial@gmail.com', 1, '2021-05-26 18:30:00', '2021-11-11 16:23:15'),
(5, 'sub-admin', '202cb962ac59075b964b07152d234b70', 'subadmin@gmail.com', 0, '2022-07-24 16:47:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Description`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(3, 'Sports', 'Related to sports news', '2021-06-05 18:30:00', '2021-06-13 18:30:00', 1),
(5, 'Entertainment', 'Entertainment related  News', '2021-06-13 18:30:00', '2021-06-13 18:30:00', 1),
(6, 'Politics', 'Politics', '2021-06-21 18:30:00', '0000-00-00 00:00:00', 1),
(7, 'Business', 'Business', '2021-06-21 18:30:00', '0000-00-00 00:00:00', 1),
(8, 'COVID-19', 'COVID-19', '2021-11-07 18:17:28', '2022-07-16 15:56:52', 1),
(9, 'Education', 'Nothing', '2022-07-01 19:35:07', NULL, 1),
(10, 'Weather', 'weather', '2022-07-07 18:04:32', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcomments`
--

CREATE TABLE `tblcomments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(255) DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `comment` mediumtext DEFAULT NULL,
  `posting_date` timestamp NULL DEFAULT current_timestamp(),
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcomments`
--

INSERT INTO `tblcomments` (`id`, `post_id`, `user_id`, `name`, `email`, `comment`, `posting_date`, `status`) VALUES
(12, 30, 1, 'Rahul Barman', 'rahul@gmail.com', 'woww nice', '2022-07-24 18:29:02', 0),
(13, 28, 1, 'Rahul Barman', 'rahul@gmail.com', 'good good well doneeee', '2022-07-24 18:29:50', 0),
(14, 35, 1, 'Rahul Barman', 'rahul@gmail.com', 'he will win yahhhhh', '2022-07-24 18:31:14', 1),
(19, 35, 1, 'Rahul Barman', 'rahul@gmail.com', 'testing comment ,testing comment', '2022-07-24 18:33:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `Description` longtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `PageTitle`, `Description`, `PostingDate`, `UpdationDate`) VALUES
(1, 'aboutus', 'About RDJR News Portal', '<p style=\"margin:0in;margin-bottom:.0001pt;text-align:justify;line-height:24.0pt;\r\nvertical-align:baseline\"><span style=\"font-size:10.5pt;color:#2E2E2E;\r\nmso-bidi-font-weight:bold\">RDJRNEWS.COM is the online arm of CNN RDJR NEWS (formerly\r\nknown as RDJR NEWS) with hard news as its core offering and interactivity as\r\nits key component. Along with a plethora of mobile- and multimedia-enabled\r\ncontent, RDJR NEWS is a multi-platform offering that, for the first time,\r\nprovides viewers/users an opportunity to contribute to the news process and\r\ninteract with editors and reporters. Manned 24x7, RDJRNEWS.COM is powered not\r\njust by RDJR NEWS journalists but also by RDJRs team of over 1,000 news\r\nprofessionals.</span><span style=\"font-size:10.5pt;color:#2E2E2E\"><o:p></o:p></span></p>\r\n\r\n<p style=\"margin: 0in 0in 0.0001pt; line-height: 24pt; vertical-align: baseline; outline-style: initial; outline-width: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit;\"><span style=\"font-size:10.5pt;color:#2E2E2E;mso-bidi-font-weight:\r\nbold\">RDJR NEWS will serve robust and high quality news from every corner of\r\nIndia and relevant global news from RDJR, the worlds news leader, on the same\r\nplatform with an aim to provide the discerning viewers with a complete\r\ncommitment to the needs and aspirations of the Indian viewer, while RDJR\r\nInternational will continue to deliver global news to Indian viewers.</span><span style=\"font-size:10.5pt;color:#2E2E2E\"><o:p></o:p></span></p>', '2021-06-29 18:30:00', '2022-07-24 20:22:19'),
(2, 'contactus', 'Contact Details', '<p><br></p><p><b>Address :&nbsp; </b>Guwahati, Assam,&nbsp;India</p><p><b>Phone Number : </b>+91 -012345xxxxx</p><p><b>Email -id : </b>blank@gmail.com</p>', '2021-06-29 18:30:00', '2022-07-24 20:26:58');

-- --------------------------------------------------------

--
-- Table structure for table `tblposts2`
--

CREATE TABLE `tblposts2` (
  `id` int(11) NOT NULL,
  `PostTitle` longtext CHARACTER SET utf8 DEFAULT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `SubCategoryId` int(11) DEFAULT NULL,
  `PostDetails` longtext CHARACTER SET utf8 DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL,
  `PostUrl` mediumtext DEFAULT NULL,
  `PostImage` varchar(255) DEFAULT NULL,
  `PostLocation` varchar(40) DEFAULT NULL,
  `viewCounter` int(255) NOT NULL,
  `postedBy_idName` varchar(15) DEFAULT NULL,
  `lastUpdatedBy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblposts2`
--

INSERT INTO `tblposts2` (`id`, `PostTitle`, `CategoryId`, `SubCategoryId`, `PostDetails`, `PostingDate`, `UpdationDate`, `Is_Active`, `PostUrl`, `PostImage`, `PostLocation`, `viewCounter`, `postedBy_idName`, `lastUpdatedBy`) VALUES
(21, 'Former India Pacers Astute Observation On Virat Kohli, Explains The Dark Side of Being In Fab Four', 3, 4, '<p id=\"0\" class=\"story_para_0\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">Former&nbsp;<a href=\"https://www.news18.com/india/\" style=\"margin: 0px; padding: 0px; outline-style: initial; outline-width: 0px; color: rgb(225, 38, 28); border-bottom: 1px dotted rgb(225, 38, 28);\">India</a>&nbsp;captain&nbsp;<a href=\"https://www.news18.com/topics/virat-kohli/\" style=\"margin: 0px; padding: 0px; outline-style: initial; outline-width: 0px; color: rgb(225, 38, 28); border-bottom: 1px dotted rgb(225, 38, 28);\">Virat Kohli</a>&nbsp;looked in his elements in the one-off Test match against England, especially in the second innings. He came at the crease with the score reading 43/2 and then started hitting his trademark drives until he was out on a jaffa off Ben Stokes for 20. Earlier also he was out for 11 runs in the first innings. As usual, Kohli was getting starts but was not able to convert them into good scores. If Kohli wants to break his Test century drought, which now extends to more than 2.5 years, he would have to play the Bangladesh series in November. It is a long time from here with full focus on T20Is exclusively.</p>', '2022-07-07 16:15:12', '2022-07-24 19:49:17', 1, 'Former-India-Pacers-Astute-Observation-On-Virat-Kohli,-Explains-The-Dark-Side-of-Being-In-Fab-Four', 'd3e1d95af233760701198e8a7e3355b3.jpg', 'exclusive', 6, 'admin', 'admin'),
(22, 'Thor Love and Thunder Review: Chris Hemsworth Turns Supporting Hero as Christian Bale Steals the Show and he know', 5, 3, '<p id=\"0\" class=\"story_para_0\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">Hollywood star Chris Hemsworth reprises his role as Thor while his ‘Love’ Natalie Portman debuts as Mighty Thor, but it’s Christian Bale who steals the ‘Thunder’. Thor returns for his fourth solo adventure with Thor: Love and Thunder, helmed by Taika Waititi. The film follows the events of Avengers: Endgame — with Thor recovering from Loki’s (Tom Hiddleston) death, disbanding of the Avengers and finding purpose in life as he travels through the galaxy with the Guardians of the Galaxy. However, the God of Thunder’s run with the Guardians ends when he realises that a God butcher, formally known as Gorr the Butcher, is out taking down Gods from different worlds.</p><p id=\"1\" class=\"story_para_1\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">Avenging the death of his daughter, Gorr seeks revenge from the Gods. His newest target is Thor. The God of Thunder gets a sniff of his plans and heads to Asgard situated on Earth to protect his people. However, to his surprise, there’s a new Thor in town — Mighty Thor (Natalie Portman). Struggling with her own battle with cancer, she puts others first, protecting everyone while he was away with the Guardians. The lady Thor (oops, sorry, she hates being called that) aka Dr. Jane Foster wields the Mjolnir, leaving him surprised. Soon, Mighty Thor, Thor and Valkyrie unite to fight the Gorr. The film follows their journey to the menacing MCU villain and their battle with him.</p>', '2022-07-07 16:58:50', '2022-07-24 08:11:56', 1, 'Thor-Love-and-Thunder-Review:-Chris-Hemsworth-Turns-Supporting-Hero-as-Christian-Bale-Steals-the-Show-and-he-know', 'ce94bb4ea27b077e5ad66c8a5eb3a585.png', 'exclusive', 9, 'admin', 'admin'),
(23, 'Exclusive | Buzz That Top Pak Generals Not on Same Page, Key Monthly Meet Not Held in 114 Days: Sources', 6, 8, '<p id=\"0\" class=\"story_para_0\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">Fissures may have developed in the Pakistan army, top sources indicated to News18 on Thursday. After the regime change in the country, the army too is witnessing some changes in the structure of the institution. And, surprisingly, it’s been three months and 20 days since General Qamar Javed Bajwa last summoned a monthly Corps Commanders’ Conference (CCC). The previous meeting was held on March 15.</p><p id=\"1\" class=\"story_para_1\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">The matter has evoked speculation because the CCC is usually held on a monthly basis. Meanwhile, two Formation Commanders’ Conferences have been organised since April 2022 though this is customarily an annual event.</p><p id=\"2\" class=\"story_para_2\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">The CCC is the only forum where comprehensive briefing on important global and regional developments, internal and external security situations, as well as progress on borders and LoC management, happen regularly.</p><p id=\"3\" class=\"story_para_3\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">Some reports have suggested that the Pakistan army’s top generals are “not on the same page\" and there are reports of split opinion among the top military leadership over the recent regime change and the current political and economic conditions of the country.</p>', '2022-07-07 17:01:51', '2022-07-24 20:29:48', 1, 'Exclusive-|-Buzz-That-Top-Pak-Generals-Not-on-Same-Page,-Key-Monthly-Meet-Not-Held-in-114-Days:-Sources', '14e2d4bf089c3830640220bb629d57fc.jpg', 'exclusive', 8, 'admin', 'admin'),
(24, 'After A Gap of Two Years, Army Set to Restart Recruitment Rallies from August under Agnipath Scheme', 6, 7, '<p id=\"0\" class=\"story_para_0\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">After a break of two years, the Army is set to restart its recruitment rallies for soldiers under the newly launched Agnipath scheme from next month.</p><p id=\"1\" class=\"story_para_1\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">As per a zone-wise schedule released by the Army on Thursday for the recruiting year 2022-23, the rallies will begin from August 12 and go on till December across the country, covering all districts. This will also include rallies to recruit women Agniveers.</p><p id=\"2\" class=\"story_para_2\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">The Army will recruit women Agniveers only in the Corps of Military Police (CMP). The plans are to induct 1,700 women into the CMP in a phased manner.</p><p id=\"3\" class=\"story_para_3\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">While announcing the Agnipath scheme last month, the government had said that recruitment rallies would commence in 90 days and 46,000 soldiers would be recruited under the scheme this year, of which 40,000 vacancies will be for the Army and 3,000 for the IAF and Navy each. The vacancies for Agniveers will grow over the next few years.</p>', '2022-07-07 17:09:49', '2022-07-25 05:37:54', 1, 'After-A-Gap-of-Two-Years,-Army-Set-to-Restart-Recruitment-Rallies-from-August-under-Agnipath-Scheme', '164fd6a8c348a757af42f63817e2d7f4.jpg', 'breaking', 5, '16', 'admin'),
(27, 'Prepare Yourself to be Future Workforce Not for Degrees: PM Modi at Shiksha Sangam', 9, 11, '<p id=\"0\" class=\"story_para_0\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">While inaugurating&nbsp;a three-day seminar on NEP 2020 at&nbsp;<a href=\"https://www.news18.com/topics/banaras-hindu-university/\" style=\"margin: 0px; padding: 0px; outline-style: initial; outline-width: 0px; color: rgb(225, 38, 28); border-bottom: 1px dotted rgb(225, 38, 28);\">Banaras Hindu University (BHU)</a>,&nbsp;Prime Minister Narendra Modi said the youth must be prepared not only for degrees, but&nbsp;also contribute to the nation&nbsp;and become significant human resources needed to take the country forward.</p><p id=\"1\" class=\"story_para_1\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">He added that the&nbsp;foundational aim behind the policy is to bring education out from the limits of narrow thought-process&nbsp;and to integrate it with the modern ideas of the 21st century.&nbsp;He added that NEP 2020&nbsp;will as a roadmap to guide the education system in the country and it will not be just another document.</p><p id=\"2\" class=\"story_para_2\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">PM Modi added that university students must get first-hand experience. He gave an example of agriculture university students who are working in the laboratory of a varsity but have not worked in the land while those working in land might not have the educational qualification. Hence, we must ensure that to bring lab to land and vice-versa.</p><div class=\"nw18-dynamic-div-5509219_2_8\" style=\"margin: 0px; padding: 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px;\"></div><p id=\"3\" class=\"story_para_3\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">Not only did India recover rapidly from the Covid pandemic, but it also became one of the fastest-growing large economies in the world. We are the world’s third-largest startup ecosystem, PM Modi added.</p>', '2022-07-07 18:16:34', '2022-07-25 05:41:33', 3, 'Prepare-Yourself-to-be-Future-Workforce-Not-for-Degrees:-PM-Modi-at-Shiksha-Sangam', '6805c4212c603430250dffb657998424jpeg', 'exclusive', 299, '16', NULL),
(28, 'West Indies vs Bangladesh 3rd ODI live streaming: When and where to watch ', 3, 4, '<p style=\"padding: 0px 0px 20px; border: 0px; outline-style: initial; outline-width: 0px; font-size: 16px; vertical-align: baseline; color: rgb(62, 62, 62); font-family: &quot;Droid Serif&quot;, serif; line-height: 28px;\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline-style: initial; outline-width: 0px; vertical-align: baseline; font-weight: 700;\">West Indies vs Bangladesh live streaming:</span>&nbsp;Having won the series already, Bangladesh will walk into the third and final ODI against West Indies with the intention to make it 3-0. West Indies on the other hand, won all Tests and T20Is that were played between the two teams and would want to finish the ODI series with a win. Bangladesh humbled the hosts in their last meeting as the bowlers dismissed the Windies at 108 before the batters chased it with nine wickets in hand and 176 balls to spare.</p><p style=\"padding: 0px 0px 20px; border: 0px; outline-style: initial; outline-width: 0px; font-size: 16px; vertical-align: baseline; color: rgb(62, 62, 62); font-family: &quot;Droid Serif&quot;, serif; line-height: 28px;\">” At the beginning of the series, I said that this is a format that we are proud about, and we have performed well in the past,” Bangladesh captain Tamim Iqbal had said after the second ODI.</p>', '2022-07-16 18:40:09', '2022-07-24 18:29:49', 1, 'West-Indies-vs-Bangladesh-3rd-ODI-live-streaming:-When-and-where-to-watch-', 'cce9aab8fdbea3c8a680845229db5531.jpg', 'exclusive', 32, 'admin', 'admin'),
(29, 'Sri Lanka Crisis Very Serious : Jaishankar at All-party Meet on Fears If Such Situation Could Arise in India', 6, 8, '<p id=\"0\" class=\"story_para_0\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">External Affairs Minister S Jaishankar on Tuesday said Sri Lanka is facing “a very serious crisis\" that makes&nbsp;<a href=\"https://www.news18.com/india/\" style=\"margin: 0px; padding: 0px; outline-style: initial; outline-width: 0px; color: rgb(225, 38, 28); border-bottom: 1px dotted rgb(225, 38, 28);\">India</a>&nbsp;naturally worried. He made the remark during an all-party meeting held in Delhi on the unfolding situation in the island nation and dismissed suggestions about such a situation arising in India.</p><p id=\"1\" class=\"story_para_1\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">Jaishankar and Parliamentary Affairs Minister Pralhad Joshi were among the senior members of the government at the briefing, which was also attended by opposition leaders such as - Congress leaders P Chidambaram and Manickam Tagore, NCP’s Sharad Pawar and TR Baalu and MM Abdulla of the DMK.</p><p id=\"2\" class=\"story_para_2\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">“The reason we took the initiative to request you all to join an all-party meeting was…this is a very serious crisis and what we are seeing in Sri Lanka is in many ways an unprecedented situation,\" Jaishankar, who made the initial remarks, said, adding, “It is a matter which pertains to a very close neighbor and given the near proximity, we naturally worry about the consequences, the spillover it has for us.\"</p><div class=\"nw18-dynamic-div-5585917_2_17\" style=\"margin: 0px; padding: 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px;\"></div><p id=\"3\" class=\"story_para_3\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">The government said there are “very strong\" lessons of fiscal prudence, responsible governance and not having “a culture of freebies\" to be drawn from it. “The ball is in the court of Sri Lanka and the International Monetary Fund (IMF), and they are holding discussions. They need an agreement, then we (India) will see what supportive role we can play,\" Jaishankar said after the meeting.</p>', '2022-07-19 19:46:06', '2022-07-24 20:28:32', 1, 'Sri-Lanka-Crisis-Very-Serious-:-Jaishankar-at-All-party-Meet-on-Fears-If-Such-Situation-Could-Arise-in-India', '83f22659c7d95ec4c92a97abf319ca6e.jpg', 'latest', 103, 'admin', NULL),
(30, 'India Tour of England 2022: A Series to Remember for Newbies, a Hard-hitting Lesson for the Giants', 3, 4, '<p id=\"0\" class=\"story_para_0\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">The recently concluded UK tour was a testament to India’s supremacy on foreign soil. Defeating England in their backyard has always been a tough nut to crack but in the last 12 months, the world has seen a dominant Indian side that has the calibre of doing wonders on overseas conditions.</p><p id=\"1\" class=\"story_para_1\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">Had the 5-match Test series not been postponed due to Covid-19,&nbsp;<a href=\"https://www.news18.com/india/\" style=\"margin: 0px; padding: 0px; outline-style: initial; outline-width: 0px; color: rgb(225, 38, 28); border-bottom: 1px dotted rgb(225, 38, 28);\">India</a>&nbsp;would have most likely clinched their first series win since 2007. Moreover, with the zeal that the team had last year, the scoreline could have read 3-1 if the Nottingham Test wasn’t washed out. Drawing the series 2-2 after almost a year seemed like a consolation price that India received after letting the rescheduled game at Edgbaston go off their grip.</p><p id=\"2\" class=\"story_para_2\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\"><strong style=\"margin: 0px; padding: 0px; outline-style: initial; outline-width: 0px;\">Also Read |&nbsp;<a href=\"https://www.news18.com/cricketnext/news/the-future-belongs-to-rishabh-pant-and-we-have-all-got-front-row-seats-5577457.html\" style=\"margin: 0px; padding: 0px; outline-style: initial; outline-width: 0px; color: rgb(225, 38, 28); border-bottom: 1px dotted rgb(225, 38, 28);\">The Future Belongs to Rishabh Pant and We Have All Got Front-row Seats!</a></strong></p><p id=\"3\" class=\"story_para_3\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">Speaking of the zeal, the visitors possessed it back with the return of Rohit Sharma in the white-ball fixtures. They not only won a second consecutive T20I series in England but also claimed only the third ODI series win here.</p>', '2022-07-21 05:56:35', '2022-07-24 19:49:09', 1, 'India-Tour-of-England-2022:-A-Series-to-Remember-for-Newbies,-a-Hard-hitting-Lesson-for-the-Giants', 'dfb7ddf80a748a853ed3cf3c0fdc7562.png', 'latest', 61, 'admin', NULL),
(31, 'Jadavpur University Pro-VC Found Hanging at His Residence', 9, 12, '<p id=\"0\" class=\"story_para_0\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">Samantak Das, the Pro-Vice Chancellor of Kolkata’s prestigious Jadavpur University, was found hanging at his residence in south Kolkata on Wednesday afternoon, apparently having committed suicide, police said.</p><p id=\"1\" class=\"story_para_1\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">Police sources said that his body was recovered hanging from the ceiling fan of his residence and the medium of hanging was a belt. No suicide note was recovered from near the body.</p><p id=\"2\" class=\"story_para_2\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">“Although preliminary findings hint that the reason of his death was suicide, nothing cannot be confirmed officially unless the post-mortem report comes. We have sent the body for post-mortem and expect to get the report by Thursday,\" an investigating official said.</p><p id=\"3\" class=\"story_para_3\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">Das completed his graduation and postgraduation in English literature from Jadavpur University only. Previously, he was associated with the English department of Visva Bharati University in Santiniketan.</p>', '2022-07-21 05:59:24', '2022-07-24 17:03:07', 1, 'Jadavpur-University-Pro-VC-Found-Hanging-at-His-Residence', 'bdb4018c7432356f2cc1d877c82327fc.png', 'latest', 2, 'admin', NULL),
(32, 'No Salaries for Five Months, SSA Teachers in Meghalaya Hit Streets', 9, 11, '<p id=\"0\" class=\"story_para_0\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">Deprived of their salaries for five months, several hundreds of the SSA teachers in Meghalaya under the umbrella of the Meghalaya SSA Schools’ Association (MSSASA) are on the street as they sit for an indefinite protest at Shillong. The All&nbsp;<a href=\"https://www.news18.com/india/\" style=\"margin: 0px; padding: 0px; outline-style: initial; outline-width: 0px; color: rgb(225, 38, 28); border-bottom: 1px dotted rgb(225, 38, 28);\">India</a>&nbsp;Trinamool Congress Vice President and legislator George B Lyngdoh led the AITC Meghalaya delegation to visit the teachers.</p><p id=\"1\" class=\"story_para_1\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">Talking to reporters, Lyngdoh said, “We have to get to the root of the issue. We have to talk to the central government in this case. It seems that we have to get a response from the central government as to what is happening in Meghalaya that the teachers are being deprived of their salaries for six months.”</p><p id=\"2\" class=\"story_para_2\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">Asserting that the state government is playing with the rights of the teachers, the AITC leader alleged there is a lack of coordination among the Ministers and their respective departments.</p><p id=\"3\" class=\"story_para_3\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">“It seems that the Government is talking in Different tones, in the Assembly they are talking differently, and to the teachers if they go to one table they say something, if they go to another table they are saying something. There is no teamwork and there is no cohesiveness amongst the Government,” Lyngdoh said.</p>', '2022-07-21 06:02:23', '2022-07-24 12:27:26', 1, 'No-Salaries-for-Five-Months,-SSA-Teachers-in-Meghalaya-Hit-Streets', 'a8de1217f4f84303aa8956be0e272be3.png', 'latest', 1, 'admin', NULL),
(33, 'Rishabh Pant And Dinesh Karthik Would be the Two I Pick Ahead of Ishan Kishan in T20 WC Squad: Ricky Ponting', 3, 4, '<p id=\"0\" class=\"story_para_0\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">Former Australia captain Ricky Ponting feels that&nbsp;<a href=\"https://www.news18.com/india/\" style=\"margin: 0px; padding: 0px; outline-style: initial; outline-width: 0px; color: rgb(225, 38, 28); border-bottom: 1px dotted rgb(225, 38, 28);\">India</a>&nbsp;should pick both Rishabh Pant and Dinesh Karthik in the squad for the 2022 T20&nbsp;<a href=\"https://www.news18.com/world/\" style=\"margin: 0px; padding: 0px; outline-style: initial; outline-width: 0px; color: rgb(225, 38, 28); border-bottom: 1px dotted rgb(225, 38, 28);\">World</a>&nbsp;Cup squad. The Men in Blue are going through a transitional phase as they have yet not finalized the players for the upcoming mega ICC tournament. In the third ODI against England, Pant silenced his white-ball critics. The southpaw slammed a majestic century to help India clinch the ODI series. However, Pant’s numbers in T20Is are not that good which still put him under the scanner.</p><p id=\"1\" class=\"story_para_1\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">On the other hand, Karthik returned to the Indian team this year after a sensational IPL season with Royal Challengers Bangalore. The 37-year-old scored 330 runs at a strike rate of 183.33. The veteran wicketkeeper also performed well in the South Africa T20Is to justify his place in the team.</p>', '2022-07-21 06:07:13', '2022-07-24 18:19:46', 1, 'Rishabh-Pant-And-Dinesh-Karthik-Would-be-the-Two-I-Pick-Ahead-of-Ishan-Kishan-in-T20-WC-Squad:-Ricky-Ponting', '99f0272e71e9017741c674e8d64dae44.png', 'exclusive', 8, 'admin', 'admin'),
(34, 'Contractor Suicide Case: Ex-K taka Min Eshwarappa Gets Clean Chit as No Evidence Found Against Him', 6, 7, '<p id=\"0\" class=\"story_para_0\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">Udupi Police on Wednesday gave a clean chit to BJP leader and former Karnataka minister KS Eshwarappa in a case where his name had appeared in the alleged suicide of contractor Santosh Patil. The police have filed a B-Report (closure report) in the suicide case and said that “no evidence\" was found to support the claim that the 73-year-old leader had any role in the case.</p><p id=\"1\" class=\"story_para_1\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">Eshwarappa, who was the state Rural Development and Panchayat Raj Minister, resigned from the post on April 15 as he got embroiled in a controversy over the death of the contractor who accused him of bribery.</p><p id=\"2\" class=\"story_para_2\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">The Shivamogga MLA said he knew from the day when the incident happened that he will be absolved of the charges. “Today, the police have come up with a B-Report in the (contractor) Santosh Patil suicide. I have come out clean in the report. Police have&nbsp;said that I have no role in it, which is a matter of joy for me,\" Eshwarappa told reporters, adding, “I had said the same day when the incident happened that there is not even one per cent connection between me and the suicide of the contractor and, I will overcome this.\"</p><div class=\"nw18-dynamic-div-5592997_2_13\" style=\"margin: 0px; padding: 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px;\"></div><p id=\"3\" class=\"story_para_3\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">When asked whether he would be made a minister in the Karnataka cabinet again, Eshwarappa said it is left to the BJP high command and seniors in the party, and that he would stick to their decision.</p>', '2022-07-21 06:20:15', '2022-07-24 19:52:37', 3, 'Contractor-Suicide-Case:-Ex-K-taka-Min-Eshwarappa-Gets-Clean-Chit-as-No-Evidence-Found-Against-Him', '901fa8a91edf75a4958378eb6ca4ea18.png', 'breaking', 6, '16', NULL),
(35, 'Gujarat Polls: Free Electricity As Poll Plank, AAP Chief Arvind Kejriwal Visits State Twice in a Month', 6, 7, '<p id=\"0\" class=\"story_para_0\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">Aam Aadmi Party head Arvind Kejriwal is scheduled to hold a town hall meeting and a press conference on Thursday in Surat city of Gujarat where the Assembly polls are due this year.</p><p id=\"1\" class=\"story_para_1\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">The Delhi chief minister arrived here late Wednesday night and said that in the next few weeks, his party would share with the people of Gujarat its agenda on what it plans to do for them if voted to power in the state.</p><p id=\"1\" class=\"story_para_1\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">This is his second visit to the state so far this month. “I visited Gujarat several times in the recent past, and the people of the state have given a lot of love. The people of Gujarat are fed up with 27 years of the BJP rule and want a change,\" Kejriwal said after landing at the Surat airport.<br></p>', '2022-07-21 06:23:45', '2022-07-24 19:52:29', 3, 'Gujarat-Polls:-Free-Electricity-As-Poll-Plank,-AAP-Chief-Arvind-Kejriwal-Visits-State-Twice-in-a-Month', '5ef34ec7265cc5349bb7bc9babd3a7b7.png', 'breaking', 41, '16', NULL),
(36, 'TMC Roadmap for 2024, Stand on V-P Elections: All Eyes on Mamatas Martyrs Day Speech Today', 6, 7, '<p id=\"0\" class=\"story_para_0\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">Marking the Trinamool Congress Martyrs’ Day on Thursday, West Bengal Chief Minister&nbsp;<a href=\"https://www.news18.com/topics/mamata-banerjee/\" style=\"margin: 0px; padding: 0px; outline-style: initial; outline-width: 0px; color: rgb(225, 38, 28); border-bottom: 1px dotted rgb(225, 38, 28);\">Mamata Banerjee</a>&nbsp;has extended an invitation to all political parties to experience the event.</p><p id=\"1\" class=\"story_para_1\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">The TMC observes July 21 as Martyrs’ Day every year in remembrance of the 13 persons who were killed in police firing during a rally in Kolkata organised by the West Bengal Youth Congress under the leadership of Mamata Banerjee in 1993.</p><p id=\"2\" class=\"story_para_2\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">The party has been marking the day virtually for the last two years due to the Covid-19 situation. The physical observance this year, headlined by a rally to be addressed by Mamata Banerjee, is an important halfway point for the party ahead of the 2024 Lok Sabha elections. It also marks a show of strength following the announcement of West Bengal Governor Jagdeep Dhankhar, who has been at loggerheads with the state government, as the NDA’s vice-presidential candidate.</p><p id=\"3\" class=\"story_para_3\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">“July 21 is a historical day for us. Last year after winning (Assembly elections), we did not celebrate. There will be a huge crowd, so I request all of you to come in a systematic manner. I have instructed all leaders to be with people,” she said on the eve of the program.</p>', '2022-07-21 06:25:29', '2022-07-24 18:19:41', 3, 'TMC-Roadmap-for-2024,-Stand-on-V-P-Elections:-All-Eyes-on-Mamatas-Martyrs-Day-Speech-Today', 'fb25c2d8d4057907fcba0fa10f564b40.png', 'breaking', 3, '16', NULL),
(37, 'Vice Presidential Election: NDA Nominates Bengal Guv Jagdeep Dhankhar As Its Candidate', 6, 7, '<p id=\"0\" class=\"story_para_0\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">The Bharatiya Janata Party (BJP)-led NDA on Saturday announced West Bengal Jagdeep Dhankhar as its candidate for the vice presidential election. Prime Minister&nbsp;<a href=\"https://www.news18.com/topics/narendra-modi/\" style=\"margin: 0px; padding: 0px; outline-style: initial; outline-width: 0px; color: rgb(225, 38, 28); border-bottom: 1px dotted rgb(225, 38, 28);\">Narendra Modi</a>&nbsp;voiced hope that Dhankhar will “guide the proceedings of the Rajya Sabha with the aim of furthering national progress.\"</p><p id=\"1\" class=\"story_para_1\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">BJP chief JP Nadda announced the candidature of 71-year-old Dhankhar, following a meeting of the party’s parliamentary board. Prime Minister Modi, senior Union ministers Amit Shah, Rajnath Singh, and Madhya Pradesh Chief Minister Shivraj Singh Chouhan attended the meeting to pick the party’s candidate for the vice presidential poll.</p><p id=\"2\" class=\"story_para_2\" style=\"margin-bottom: 15px; padding: 15px 0px 0px; outline-style: initial; outline-width: 0px; font-family: &quot;PT Serif&quot;, serif; font-size: 18px; line-height: 26px;\">Modi tweeted, “Shri Jagdeep Dhankhar Ji has excellent knowledge of our Constitution. He is also well-versed with legislative affairs. I am sure that he will be an outstanding Chair in the Rajya Sabha &amp; guide the proceedings of the House with the aim of furthering national progress.\"</p>', '2022-07-21 06:27:18', '2022-07-25 05:40:56', 3, 'Vice-Presidential-Election:-NDA-Nominates-Bengal-Guv-Jagdeep-Dhankhar-As-Its-Candidate', '6202e23a35874fde3646ffd4133b5d5e.png', 'breaking', 2, '16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblreporter`
--

CREATE TABLE `tblreporter` (
  `id` int(10) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `email_add` varchar(100) NOT NULL,
  `rep_pass` varchar(255) NOT NULL,
  `rep_status` int(2) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblreporter`
--

INSERT INTO `tblreporter` (`id`, `first_name`, `last_name`, `gender`, `phone_no`, `email_add`, `rep_pass`, `rep_status`, `reg_date`) VALUES
(16, 'Rupjyoti', 'Barman', 'male', '9101171366', 'reporter@gmail.com', '202cb962ac59075b964b07152d234b70', 1, '2022-07-19 07:33:45');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubcategory`
--

CREATE TABLE `tblsubcategory` (
  `SubCategoryId` int(11) NOT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `Subcategory` varchar(255) DEFAULT NULL,
  `SubCatDescription` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubcategory`
--

INSERT INTO `tblsubcategory` (`SubCategoryId`, `CategoryId`, `Subcategory`, `SubCatDescription`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(3, 5, 'Bollywood ', 'Bollywood masala', '2021-06-21 18:30:00', '2021-11-07 17:59:57', 1),
(4, 3, 'Cricket', 'Cricket\r\n\r\n', '2021-06-29 18:30:00', '2021-11-07 17:59:57', 1),
(5, 3, 'Football', 'Football', '2021-06-29 18:30:00', '2021-11-07 17:59:57', 1),
(6, 5, 'Television', 'TeleVision', '2021-06-30 18:30:00', '2021-11-07 17:59:57', 1),
(7, 6, 'National', 'National', '2021-06-30 18:30:00', '2021-11-07 17:59:57', 1),
(8, 6, 'International', 'International', '2021-06-30 18:30:00', '2021-11-07 17:59:57', 1),
(9, 7, 'India', 'India', '2021-06-30 18:30:00', '2021-11-07 17:59:57', 1),
(10, 8, 'Vaccination', 'Vaccination in india', '2021-11-07 18:18:25', '2022-07-18 08:05:06', 1),
(11, 9, 'School', 'School related news', '2022-07-01 19:35:47', NULL, 1),
(12, 9, 'College', 'College related news', '2022-07-01 19:36:16', NULL, 1),
(13, 10, 'india', 'weather in india', '2022-07-07 18:05:04', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(10) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `email_add` varchar(50) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `reg_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `first_name`, `last_name`, `gender`, `phone_no`, `email_add`, `user_pass`, `reg_date`) VALUES
(1, 'Rahul', 'Barman', 'male', '9101171366', 'rahul@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-07-24 18:54:34'),
(2, 'Dimple', 'Choudhary', 'female', '9101171366', 'dimple@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-07-24 18:54:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladdimage`
--
ALTER TABLE `tbladdimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomments`
--
ALTER TABLE `tblcomments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postIdFK` (`post_id`),
  ADD KEY `userIDfk` (`user_id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblposts2`
--
ALTER TABLE `tblposts2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catIdFK` (`CategoryId`),
  ADD KEY `subCatIdFK` (`SubCategoryId`);

--
-- Indexes for table `tblreporter`
--
ALTER TABLE `tblreporter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_add` (`email_add`),
  ADD UNIQUE KEY `phone_no` (`phone_no`);

--
-- Indexes for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD PRIMARY KEY (`SubCategoryId`),
  ADD KEY `catid` (`CategoryId`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_add` (`email_add`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladdimage`
--
ALTER TABLE `tbladdimage`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblcomments`
--
ALTER TABLE `tblcomments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblposts2`
--
ALTER TABLE `tblposts2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tblreporter`
--
ALTER TABLE `tblreporter`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `SubCategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcomments`
--
ALTER TABLE `tblcomments`
  ADD CONSTRAINT `userIDfk` FOREIGN KEY (`user_id`) REFERENCES `tbluser` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD CONSTRAINT `catid` FOREIGN KEY (`CategoryId`) REFERENCES `tblcategory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
