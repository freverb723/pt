-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 
-- サーバのバージョン： 10.4.6-MariaDB
-- PHP のバージョン: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `re`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `app`
--

CREATE TABLE `app` (
  `app_ID` int(11) NOT NULL,
  `timeid` int(11) NOT NULL,
  `sub` varchar(1) NOT NULL DEFAULT 'T',
  `holiday_id` int(11) NOT NULL,
  `sentday` date NOT NULL DEFAULT current_timestamp(),
  `swrk` time DEFAULT NULL,
  `sbrk` time DEFAULT NULL,
  `ebrk` time DEFAULT NULL,
  `ewrk` time DEFAULT NULL,
  `reason` varchar(255) NOT NULL,
  `signed_ID` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `app`
--

INSERT INTO `app` (`app_ID`, `timeid`, `sub`, `holiday_id`, `sentday`, `swrk`, `sbrk`, `ebrk`, `ewrk`, `reason`, `signed_ID`) VALUES
(1, 9, 'T', 0, '2019-09-27', '08:45:58', '12:08:24', '11:59:00', '18:05:32', 'clicked a wrong button', 8),
(2, 5, 'T', 0, '2019-09-27', '08:47:06', '12:06:38', '12:58:05', '17:10:20', 'forgot to punch out', 1),
(10, 12, 'T', 0, '2019-10-10', '08:00:00', '12:00:00', '13:00:00', '17:00:00', 'aaa', 0),
(11, 24, 'H', 11, '2019-10-16', NULL, NULL, NULL, NULL, 'aaa', 5),
(12, 25, 'H', 11, '2019-10-16', NULL, NULL, NULL, NULL, 'aaa', 0),
(13, 26, 'H', 11, '2019-10-16', NULL, NULL, NULL, NULL, 'aaa', 5),
(14, 27, 'T', 0, '2019-10-18', '08:00:00', '12:00:00', '12:59:23', '17:03:08', 'testtest', 5),
(15, 13, 'T', 0, '2019-10-22', '07:59:23', '12:05:50', '12:59:23', '17:03:07', 'aaaaa', 0),
(16, 63, 'H', 11, '2019-10-25', NULL, NULL, NULL, NULL, 'attend wedding of my cousin', 8),
(17, 18, 'T', 0, '2019-10-25', '12:47:06', '12:00:00', '13:00:00', '17:10:20', 'aaaa', 0),
(18, 65, 'H', 4, '2019-10-25', NULL, NULL, NULL, NULL, 'aaa', 8);

-- --------------------------------------------------------

--
-- テーブルの構造 `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `comment`
--

INSERT INTO `comment` (`comment_id`, `stud_id`, `emp_id`, `comment`) VALUES
(1, 3, 6, 'testtesttest1'),
(2, 4, 5, 'testtesttest2'),
(3, 1, 5, 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups');

-- --------------------------------------------------------

--
-- テーブルの構造 `emp`
--

CREATE TABLE `emp` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(30) NOT NULL,
  `emp_email` varchar(50) NOT NULL,
  `emp_phone` varchar(15) NOT NULL DEFAULT '09XX-XXX-XXXX',
  `emp_birth` date DEFAULT NULL,
  `emp_pic` varchar(100) NOT NULL DEFAULT 'avatar.jpg',
  `emp_pass` varchar(50) NOT NULL,
  `emp_status` varchar(2) NOT NULL DEFAULT 'RT'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `emp`
--

INSERT INTO `emp` (`emp_id`, `emp_name`, `emp_email`, `emp_phone`, `emp_birth`, `emp_pic`, `emp_pass`, `emp_status`) VALUES
(1, 'test1_RT', 'test1@test.com', '0910-123-3454', NULL, '1.jpg', 'test1', 'RT'),
(2, 'test2_RT', 'test2@test.com', '09XX-XXX-XXXX', NULL, '2.jpg', 'test2', 'RT'),
(3, 'test3_MG', 'test3@test.com', '09XX-XXX-XXXX', NULL, '3.jpg', 'test3', 'MG'),
(4, 'test4_MT', 'richardreal.rr@gmail.com', '09XX-XXX-XXXX', '2019-10-01', '4.jpg', 'test4', 'MT'),
(5, 'Andrea Glea', 'Andrea@andrea.com', '0900-000-0000', '2019-10-21', '5.jpg', 'andrea', 'RT'),
(7, 'test6_RT', 'test6@test.com', '0924-264-7654', '2002-09-05', 'avatar.jpg', 'test6', 'RT'),
(8, 'Natsumi Shingu', 'natsumishingu@gmail.com', '0915-463-5451', '1988-05-10', '8.jpg', 'efudepth129', 'SM'),
(9, 'Muzan Kibutsuji', 'muzan@demon.jp', '0900-000-0000', '0998-07-26', '9.jpg', 'muzan', 'MG');

-- --------------------------------------------------------

--
-- テーブルの構造 `emp_data`
--

CREATE TABLE `emp_data` (
  `emp_id` int(11) NOT NULL,
  `license` int(1) NOT NULL DEFAULT 0,
  `toeic` int(4) NOT NULL,
  `ielts` float NOT NULL,
  `JLPT` varchar(2) NOT NULL,
  `demo_lesson1` float DEFAULT NULL,
  `demo_lesson2` float DEFAULT NULL,
  `demo_lesson3` float DEFAULT NULL,
  `stud_evaluation` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `emp_data`
--

INSERT INTO `emp_data` (`emp_id`, `license`, `toeic`, `ielts`, `JLPT`, `demo_lesson1`, `demo_lesson2`, `demo_lesson3`, `stud_evaluation`) VALUES
(5, 0, 875, 8, 'N5', 8.125, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `evaluation`
--

CREATE TABLE `evaluation` (
  `eva_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `level` int(1) NOT NULL,
  `item` int(2) NOT NULL,
  `point` int(2) NOT NULL,
  `pro` varchar(45) NOT NULL,
  `con` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `evaluation`
--

INSERT INTO `evaluation` (`eva_id`, `emp_id`, `date`, `level`, `item`, `point`, `pro`, `con`) VALUES
(1, 5, '2019-10-16', 1, 1, 8, 'propropropropropropropropropropropropropropro', 'conconconconconconconconconconconconconcoconc'),
(2, 5, '2019-10-16', 1, 2, 8, 'propropro', 'conconcon'),
(3, 5, '2019-10-16', 1, 3, 9, 'propropro', 'conconcon'),
(4, 5, '2019-10-16', 1, 4, 8, 'propropro', 'conconcon'),
(5, 5, '2019-10-16', 1, 5, 7, 'propropro', 'conconcon'),
(6, 5, '2019-10-16', 1, 6, 8, 'propropro', 'conconcon'),
(7, 5, '2019-10-16', 1, 7, 8, 'propropro', 'conconcon'),
(8, 5, '2019-10-16', 1, 8, 9, 'propropro', 'conconcon'),
(9, 5, '2019-10-16', 2, 1, 6, 'propropro', 'conconcon'),
(10, 5, '2019-10-16', 2, 2, 9, 'propropro', 'conconcon'),
(11, 5, '2019-10-16', 2, 3, 9, 'propropro', 'conconcon'),
(12, 5, '2019-10-16', 2, 4, 8, 'propropro', 'conconcon'),
(13, 5, '2019-10-16', 2, 5, 7, 'propropro', 'conconcon'),
(14, 5, '2019-10-16', 2, 6, 8, 'propropro', 'conconcon'),
(15, 5, '2019-10-16', 2, 7, 9, 'propropro', 'conconcon'),
(16, 5, '2019-10-16', 2, 8, 8, 'propropro', 'conconcon');

-- --------------------------------------------------------

--
-- テーブルの構造 `holiday_data`
--

CREATE TABLE `holiday_data` (
  `holiday_id` int(11) NOT NULL,
  `holiday_date` date NOT NULL,
  `holiday_name` varchar(30) NOT NULL,
  `holiday_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `holiday_data`
--

INSERT INTO `holiday_data` (`holiday_id`, `holiday_date`, `holiday_name`, `holiday_type`) VALUES
(1, '2019-11-01', 'All Saints\' Day', 'Special'),
(2, '2019-11-02', 'All Souls Day', 'Special'),
(3, '2019-11-30', 'Andres Bonifacio Day', 'Regular'),
(4, '2019-12-24', 'Christmas Eve', 'Special '),
(5, '2019-12-25', 'Christmas Day', 'Regular'),
(6, '2019-12-30', 'Jose Rizal Day', 'Regular'),
(7, '2019-12-31', 'New Year\'s Eve', 'Special'),
(8, '2020-01-01', 'New Year\'s Day', 'Regular'),
(9, '2020-01-25', 'Chinese Lunar New Year\'s Day', 'Special'),
(10, '2020-01-21', 'Sinulog Procession', 'Special'),
(11, '2019-08-26', 'National Heroes Day', 'Regular'),
(12, '2019-09-09', 'Osmena Day', 'Special');

-- --------------------------------------------------------

--
-- テーブルの構造 `jp`
--

CREATE TABLE `jp` (
  `jp_id` int(11) NOT NULL,
  `eng` varchar(50) NOT NULL,
  `jp` varchar(50) NOT NULL,
  `breakdown` varchar(255) NOT NULL,
  `category` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `jp`
--

INSERT INTO `jp` (`jp_id`, `eng`, `jp`, `breakdown`, `category`) VALUES
(1, 'Good morning', 'ohayo gozaimasu', '\"ohayo\" is commonly used between friends/families. Japanese feel it\'s rude if you use \"ohayo\" in business scene. gozaimasu\" is a be verb which makes it polite.', 'greeting'),
(2, 'Hello/Hi/Good afternoon', 'konnichiwa', 'the literal meaning is konnichi(today) wa(subject marker). You can use anytime as long as daytime. ', 'greeting'),
(3, 'Good evening', 'kombanwa', 'komban(this evening) wa(subject marker). you can use it from the evening to night time.', 'greeting'),
(4, 'Good bye', 'Sayounara', 'you also can use byebye(informal) ', ''),
(5, 'See you tomorrow/See you next time/See you around', 'Mata Ashita/Mata Kondo/Mata sonouchi', 'the literal meaning is mata(again) ashita(tomorrow).\r\nsonouchi doesn\'t mention when is the next, so it\'s also used when you will not meet someone anymore. ', 'greeting'),
(6, 'See you', 'Otsukaresama desu', 'you can use it to thank someone for one\'s effort when people finish doing something(studying/working/events) on the day and go home.', 'greeting'),
(7, 'For example/Let\'s say', 'Tatoeba', 'It\'s a short form of Tatoereba(if I make an example,)\r\nTatoeru(verb): liken/compare', ''),
(8, 'Break time', 'Yasumi jikan', 'Yasumi(rest/break) jikan(time)', ''),
(9, 'Do you understand?', 'Wakarimasu ka?', 'wakaru(understand) + masu(polite) + ka(making question)', 'class'),
(10, 'this', 'kore', 'This is a pen(kore wa pen desu)\r\nThis is the Ayala Mall(Kore ga Ayala Mall desu)\r\nPlease read this(kore o yonde kudasai)\r\nHello, this is Mae.(Moshimoshi, Mae desuga..)', ''),
(11, 'that', 'Are (subject/object)', 'That is my apartment(Are ga watashi no apart desu)\r\nThat was amazing.(Are wa sugokatta desu)\r\n', ''),
(12, 'this', 'Kono(attributive adjctive)', 'This book is difficult.(Kono hon wa muzukashii)\r\n', ''),
(13, 'that', 'Ano(attributive adjective)', 'That person is really talkative.(Ano hito wa honto ni oshaberi desu)', ''),
(14, 'Really/Sure/For real', 'honto ni', 'honto means real. ni means \"to\" or \"-ly\".', ''),
(15, 'Well/ Let me see..', 'Eetto..', '', ''),
(16, 'Seriously', 'maji de', '\"maji\" means real or serious. almost the same meaning of Really, but informal way. sometimes it contains critical feeling.', ''),
(17, 'difficult', 'muzukashii', 'easy: Kantan/Yasashii\r\nYasashii also means kind/gentle', ''),
(18, 'easy', 'Kantan', 'kantan is actually a noun form(ease) but we commonly use it.\r\nThis question is easy.(Kono mondai wa kantan desu)', ''),
(19, 'is am are/was were', 'desu/deshita or masu/mashita', 'the last letter \"ta\" of verbs is a postposition, normally means past tense.\r\nDo you understand?(Wakarimasu ka?)\r\nDid you understand?(Wakarimashita ka?)\r\nI can do it.(dekimasu)\r\nI could do it.(dekimashita)', ''),
(20, 'go/went', 'Ikimashu/Ikimashita', 'I go to SM City today.(watashi wa kyou SM City ni ikimasu)\r\nI went to Mactan yesterday.(Watashi wa kinou Mactan ni ikimashita) \r\n\"ni\" means \"to\"', ''),
(21, 'be Sleepy/ was sleepy', 'nemui/ nemukatta', 'I\'m sleepy.(Nemui desu)\r\nI was so sleepy this afternoon.(gogo sugoi nemukatta desu)\r\n\r\n\"nemui deshita\" is not correct.', ''),
(22, 'be tired/ was tired', 'tsukarete masu/tsukare mashita', 'Japanese word \"tired\" belong a verb group.\r\ntsukareru/tsukareta is also ok.\r\nTo use past tense is more natural even if it\'s present situation.\r\nI\'m very tired.(Totemo tsukareta)', ''),
(23, 'once more', 'mou ikkai', 'mou means the rest to a goal.\r\na little more.(mou chotto)\r\n-kai means \"how many times\" or \"a floor of a building\"\r\nikkai: once/the first floor\r\nnikai: twice/the second floor\r\nsankai: three times/the third floor\r\nyonkai: four times/the forth floor', ''),
(24, 'Good job/Well done', 'Yoku dekimashita', 'yoku means well. dekimashita means \"could do it\".', ''),
(25, 'be close/ was close', 'oshii/ oshikatta desu', 'you can use when it was almost correct', ''),
(26, 'OK/alright', 'daijoubu desu', 'you can say \"Daijobu desu ka?\" when you want to ask someone if s/he is okay.', ''),
(27, 'please wait a second', 'chotto matte kudasai', 'chotto means a little.\r\nmatte: root word is matsu(wait)\r\nkudasai makes it polite', ''),
(28, 'homework/assignment', 'shukudai/kadai', 'both are the same meaning but \"shukudai\" is more particular meaning to do at home.', ''),
(29, 'It\'s correct', 'Seikai desu', 'seikai means \"a correct ansqwer\"', 'class'),
(30, 'It\'s not collect', 'Fuseikai desu', 'fu- is a preposition which makes opposite meaning like un-, in-.\r\nkanou able/possible\r\nfukano unable/impossible ', ''),
(31, 'It\'s wrong', 'Machigai desu/Chigai masu', 'machigai: mistake(noun)\r\nChigau: be wrong/be different(verb)\r\n', ''),
(32, 'Do you have a question so far?', 'koko made de shitsumon wa arimasu ka?', 'koko(here) made(til/to) shitsumon(a question) wa(subject marker) arimasu(have) ka(making question)', ''),
(33, 'anything/whatever', 'dore demo/nan demo', 'dore(which)\r\nnani/nan (what)\r\ndemo(even though)', ''),
(34, 'meaning of the word', 'tango no imi', 'tango: word\r\nno: of\r\nimi: meaning', ''),
(35, 'Let\'s look (it) up in a dictionary', 'jisho de shirabe mashou', 'jisho : dectionary\r\nshiraberu : look up/search for/ check / examine\r\n-(si)masho : Let\'s\r\n\r\nBenkyo simashou : Let\'s study', ''),
(36, 'eraser', 'keshigomu', 'erase/turn off/clear: kesu(verb)\r\ngomu: rubber\r\n', 'class'),
(37, 'pencil', 'empitsu', 'en(lead) + hitsu(writing brush) = empitsu\r\n', ''),
(38, 'red', 'aka/akai', 'aka(noun)\r\nakai(adjective)', ''),
(39, 'blue', 'ao/aoi', 'ao(noun)\r\naoi(adjective)', ''),
(40, 'while', 'shiro/shiroi', 'shiro(noun)\r\nshiroi(adjective)', ''),
(41, 'black', 'kuro/kuroi', 'kuro(black)\r\nkuroi(adjective)', ''),
(42, 'practice/practiced', 'renshu si masu/renshu si mashita', 'renshu(noun)\r\nrenshu suru(verb)', ''),
(43, 'Thank you', 'Arigato gozaimasu', 'Thanks (Arigato)\r\ngozaimasu is a polite expression', ''),
(44, 'Excuse me/Sorry', 'su(m)imasen/Gomen nasai', 'Japanese people often mix up these phrases when they want someone to pay attention.', ''),
(45, 'review', 'fukushu suru', '\"shu\" means leaning something\r\nLet\'s review: fukushu simasho\r\nreview(noun): fukushu', ''),
(46, 'What is this?', 'Kore wa nan desu ka?', 'kore(this) wa(subject marker) nan(what) desu(be:polite) ka(making a question)', ''),
(47, 'near/far', 'chikai/tooi', '', ''),
(48, 'big/small', 'ookii/chiisai', '', ''),
(49, 'long/short', 'nagai/mijikai', '', ''),
(50, 'expensive/cheap', 'takai/yasui', '', ''),
(51, 'high/low', 'takai/hikui', '', ''),
(52, 'fat/thin', 'futoi/hosoi', '', ''),
(53, 'many(more)/a few(a little)', 'ooi/sukunai', '', ''),
(54, 'strong/weak', 'tsuyoi/yowai(power), koi/usui(taste)', '', ''),
(55, 'noisy/quiet', 'urusai/shizuka', '', ''),
(56, 'beautiful/clean', 'kirei', '', ''),
(57, 'be lazy/cut', 'saboru', 'this verb comes from \"sabotage\" but the meaning in japan is \"slowdown/skip/neglect.\"', ''),
(58, 'hot/cold', 'atsui/samui(sabui)', '', ''),
(59, 'early(fast)/late(slow)', 'hayai/osoi', '', ''),
(60, 'feel bad/don\'t feel well', 'choshi ga warui/choshi ga yokunai/shindoi', 'yoi/warui: good/bad\r\n-nai: not\r\nshindoi : this is informal expression but children always use this when they don\'t feel well or got tired.', ''),
(61, 'later', 'ato de', 'ato means behind.\r\nLet\'s do it later(Ato de shimasho)', ''),
(62, 'what', 'nani', 'what time: nan ji\r\nwhat color: nani iro\r\nwhat animal: donna dobutsu\r\nwhat music: donnna ongaku\r\nwhat kinds of ***: donna shurui no ***\r\nif the choices are many or difficult to guess the image, donna *** is more natural.', ''),
(63, 'Can you here me?', 'kikoe masu ka? ', 'kiku : listen/hear\r\nYou can use this not only on the situation you speak but also the one you want to check the volume of a listening material.', ''),
(64, 'Do you have ***?', '*** motte masu ka?', 'motsu(verb): have', ''),
(65, 'after school', 'houkago', '', ''),
(66, 'weekend', 'shumatsu', 'shu: week\r\nkonshu: this week\r\nsenshu:last week\r\nisshukan: for 1wk\r\nnishukan: for 2wks\r\nsanshukan: for 3wks\r\nisshukan mae: before 1wk\r\nnishukan go: 2wks later', ''),
(67, 'What did you have for breakfast?', 'asa gohan wa nani o tabe mashita ka?', 'asa: morning\r\ngohan: rice/food/meal\r\nwa:subject marker\r\nnani: what\r\no: object marker\r\ntaberu: eat\r\ntabemashita: ate\r\nka: making a question', ''),
(68, 'forget/forgot', 'wasureru/wasure mashita', 'forgot:wasureta also ok.\r\nI forgot my homework.\r\nshukudai o wasure mashita', ''),
(69, 'Do you remember ***?', '*** o oboetei masu ka', 'o:object marker\r\noboeru: memorize\r\noboeteiru: remember\r\nmasu: making it polite\r\nka: making a question', ''),
(70, 'diary', 'nikki', 'write in your diary: nikki o kaku', ''),
(71, 'mock exam', 'moshi/mogi shiken', 'an abbreviation of mogi(mock) shiken(exam/test)', ''),
(72, 'graduation ceremony', 'sotsugyo shiki', 'graduation: sotsugyo\r\nsiki: ceremony\r\n\r\na wedding ceremony: kekkon shiki\r\nan entrance ceremony: nyugaku shiki', ''),
(73, 'Would you say it again?', 'Mou ikkai itte kudasai', 'mou ikkai: once more again\r\nitte kudasai: please say', ''),
(74, 'I don\'t know', 'Wakari masen/Wakaranai desu', 'wakaru: understand\r\nmasu + n(not) = masen', '');

-- --------------------------------------------------------

--
-- テーブルの構造 `opinions`
--

CREATE TABLE `opinions` (
  `op_id` int(11) NOT NULL,
  `op_date` date NOT NULL DEFAULT current_timestamp(),
  `op_subject` varchar(255) NOT NULL,
  `op_content` text NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `opinions`
--

INSERT INTO `opinions` (`op_id`, `op_date`, `op_subject`, `op_content`, `comment`) VALUES
(1, '2019-10-16', 'test', 'testtest', 'sample'),
(2, '0000-00-00', 'aaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb'),
(3, '2019-10-25', 'about rooms', 'classrooms are so cold..!', '');

-- --------------------------------------------------------

--
-- テーブルの構造 `reset`
--

CREATE TABLE `reset` (
  `reset_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `reset_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `email` varchar(50) NOT NULL,
  `token` varchar(255) NOT NULL,
  `error` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `reset`
--

INSERT INTO `reset` (`reset_id`, `emp_id`, `reset_time`, `email`, `token`, `error`) VALUES
(16, 5, '2019-10-25 01:24:01', 'Andrea@andrea.com', '2de9e508922cbc385cfdb3adf5840d1d', 3),
(17, 5, '2019-10-25 03:48:31', 'Andrea@andrea.com', 'd3652c00374dec2120dadb4a660831e0', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `students`
--

CREATE TABLE `students` (
  `stud_id` int(11) NOT NULL,
  `stud_name` varchar(25) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `stud_email` varchar(50) NOT NULL,
  `stud_birth` date NOT NULL,
  `stud_gender` varchar(1) NOT NULL,
  `stud_course` varchar(10) NOT NULL DEFAULT 'General',
  `stud_v` int(1) NOT NULL,
  `stud_g` int(1) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `students`
--

INSERT INTO `students` (`stud_id`, `stud_name`, `start_date`, `end_date`, `address`, `stud_email`, `stud_birth`, `stud_gender`, `stud_course`, `stud_v`, `stud_g`, `note`) VALUES
(1, 'Kanako Saito', '2019-09-01', '2019-09-28', '306 Central Kamino, 2-23-4 Matsuoka-cho, Midoushi, Tokyo', 'student2@student2.com', '1992-02-15', 'F', 'General', 5, 3, ''),
(2, 'Daichi Umemoto', '2019-07-07', '2019-09-21', '3-2-5 Toyono-cho, Kasuga City, Gifu, Japan', 'student1@student1.com', '2002-11-08', 'M', 'General', 3, 3, ''),
(3, 'Satoko Takase', '2019-09-08', '2019-10-26', '13-23-5 Kishinobe St. Atsuharagun, Nagano', 'student3@student3.co.jp', '1968-04-23', 'F', 'General', 2, 3, 'memo'),
(4, 'Reo Matsuzaki', '2019-12-01', '2019-12-28', '7-2 Daidp, Watanomachi, Sirakawa City, Akita', 'reomatsuzaki@gmail.com', '2010-09-11', 'M', 'General', 2, 1, ''),
(5, 'Yoko Maeda', '2020-01-05', '2020-01-18', '2-23-6-1023 Yoshida Building, Takanodori, Kiyomizubara, Kyoto', 'yoko555@hotmail.com', '1982-06-17', 'F', 'General', 6, 3, ''),
(6, 'Shinichi Doi', '2020-01-05', '2020-01-25', '8-9 Miyoshi, Minato-ku, Nagoya City, Aichi ', 'shinichi0503@gmail.com', '1983-05-03', 'M', 'General', 4, 4, ''),
(7, 'Yui Momose', '2020-02-02', '2020-02-29', '3-7-6 Fujino, Sano-machi, Utayoi City, Mie', 'yuiyuimms@gmail.com', '1994-12-20', 'F', 'General', 4, 2, ''),
(8, 'Kanato Matsumura', '2020-03-28', '2020-04-18', '3-1-1 Washangari, Washangari-gun, Hokkaido', 'kana2020m@gmail.com', '2002-02-08', 'M', 'General', 4, 4, ''),
(9, 'Mirai Mano', '2019-11-10', '2019-12-21', '5-3-10 Kano HigashiOsaka City, Osaka', 'mirai@softbank.jp', '2012-04-08', 'F', 'General', 3, 2, 'memo'),
(10, 'Yuya Sasaki', '2019-10-07', '2019-10-26', '5-5-1 NishiOe-cho, Karatsu City, Saga', 'student10@student.com', '1997-08-24', 'M', 'General', 2, 3, '');

-- --------------------------------------------------------

--
-- テーブルの構造 `timerecord`
--

CREATE TABLE `timerecord` (
  `timeid` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `swrk` time DEFAULT NULL,
  `ewrk` time DEFAULT NULL,
  `sbrk` time DEFAULT NULL,
  `ebrk` time DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT '-',
  `holiday_id` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `timerecord`
--

INSERT INTO `timerecord` (`timeid`, `emp_id`, `date`, `swrk`, `ewrk`, `sbrk`, `ebrk`, `status`, `holiday_id`) VALUES
(4, 5, '2019-10-18', '14:47:06', '15:10:20', '15:06:38', '15:20:05', 'H', 12),
(5, 5, '2019-09-19', '14:47:06', '15:10:20', '15:06:38', '15:20:05', 'R', 0),
(6, 5, '2019-09-20', '08:00:00', '17:00:00', '12:00:00', '13:00:00', '-', 0),
(7, 5, '2019-09-21', '07:59:23', '17:03:07', '12:05:50', '12:59:23', '-', 0),
(8, 5, '2019-09-23', '09:00:00', '18:00:00', '12:00:00', '13:00:00', '-', 0),
(9, 5, '2019-09-24', '08:45:58', '18:05:32', '12:08:24', '11:59:00', 'A', 0),
(11, 5, '2019-10-08', '10:12:34', NULL, NULL, NULL, '-', 0),
(12, 5, '2019-10-01', '08:00:00', '17:00:00', '12:00:00', '13:00:00', 'W', 0),
(13, 5, '2019-10-02', '07:59:23', '17:03:07', '12:05:50', '12:59:23', 'W', 0),
(14, 5, '2019-10-04', '08:45:58', '12:05:32', '12:58:24', '18:02:00', 'W', 0),
(15, 5, '2019-10-06', '14:47:06', '15:10:20', '15:06:38', '15:20:05', 'R', 0),
(16, 5, '2019-10-09', '07:59:23', '12:05:32', NULL, NULL, '-', 0),
(18, 5, '2019-10-07', '12:47:06', '17:10:20', NULL, NULL, 'W', 0),
(24, 3, '2019-10-23', NULL, NULL, NULL, NULL, 'I', 0),
(26, 3, '2019-10-25', '11:47:56', NULL, NULL, NULL, 'H', 0),
(27, 3, '2019-10-01', '08:00:00', '17:03:08', '12:00:00', '12:59:23', 'A', 0),
(58, 5, '2019-10-24', '19:51:38', '19:51:48', '19:51:20', '19:51:29', '-', 0),
(63, 5, '2019-11-04', NULL, NULL, NULL, NULL, 'H', 11),
(64, 5, '2019-10-25', NULL, '11:47:26', '11:46:40', '11:47:18', '-', 0),
(65, 5, '2019-11-02', NULL, NULL, NULL, NULL, 'I', 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `app`
--
ALTER TABLE `app`
  ADD PRIMARY KEY (`app_ID`);

--
-- テーブルのインデックス `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- テーブルのインデックス `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`emp_id`);

--
-- テーブルのインデックス `emp_data`
--
ALTER TABLE `emp_data`
  ADD UNIQUE KEY `emp_id` (`emp_id`);

--
-- テーブルのインデックス `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`eva_id`);

--
-- テーブルのインデックス `holiday_data`
--
ALTER TABLE `holiday_data`
  ADD PRIMARY KEY (`holiday_id`);

--
-- テーブルのインデックス `jp`
--
ALTER TABLE `jp`
  ADD PRIMARY KEY (`jp_id`);

--
-- テーブルのインデックス `opinions`
--
ALTER TABLE `opinions`
  ADD PRIMARY KEY (`op_id`);

--
-- テーブルのインデックス `reset`
--
ALTER TABLE `reset`
  ADD PRIMARY KEY (`reset_id`);

--
-- テーブルのインデックス `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`stud_id`);

--
-- テーブルのインデックス `timerecord`
--
ALTER TABLE `timerecord`
  ADD PRIMARY KEY (`timeid`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `app`
--
ALTER TABLE `app`
  MODIFY `app_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- テーブルのAUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルのAUTO_INCREMENT `emp`
--
ALTER TABLE `emp`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- テーブルのAUTO_INCREMENT `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `eva_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- テーブルのAUTO_INCREMENT `holiday_data`
--
ALTER TABLE `holiday_data`
  MODIFY `holiday_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- テーブルのAUTO_INCREMENT `jp`
--
ALTER TABLE `jp`
  MODIFY `jp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- テーブルのAUTO_INCREMENT `opinions`
--
ALTER TABLE `opinions`
  MODIFY `op_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルのAUTO_INCREMENT `reset`
--
ALTER TABLE `reset`
  MODIFY `reset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- テーブルのAUTO_INCREMENT `students`
--
ALTER TABLE `students`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- テーブルのAUTO_INCREMENT `timerecord`
--
ALTER TABLE `timerecord`
  MODIFY `timeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
