-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 20 2021 г., 15:25
-- Версия сервера: 5.5.53
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `workarchive`
--

-- --------------------------------------------------------

--
-- Структура таблицы `chair`
--

CREATE TABLE `chair` (
  `idchair` int(11) NOT NULL,
  `chair` varchar(40) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `chair`
--

INSERT INTO `chair` (`idchair`, `chair`) VALUES
(1, 'ИВТ');

-- --------------------------------------------------------

--
-- Структура таблицы `faculty`
--

CREATE TABLE `faculty` (
  `idfaculty` int(11) NOT NULL,
  `faculty` varchar(40) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `faculty`
--

INSERT INTO `faculty` (`idfaculty`, `faculty`) VALUES
(1, 'ФВТ'),
(2, 'ФРЭ');

-- --------------------------------------------------------

--
-- Структура таблицы `spec`
--

CREATE TABLE `spec` (
  `idspec` int(11) NOT NULL,
  `spec` varchar(40) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `spec`
--

INSERT INTO `spec` (`idspec`, `spec`) VALUES
(1, 'Программирование');

-- --------------------------------------------------------

--
-- Структура таблицы `squad`
--

CREATE TABLE `squad` (
  `idsquad` int(11) NOT NULL,
  `squad` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `idspec` int(11) NOT NULL,
  `idfaculty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `squad`
--

INSERT INTO `squad` (`idsquad`, `squad`, `idspec`, `idfaculty`) VALUES
(1, '18АА1', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `student`
--

CREATE TABLE `student` (
  `idstudent` int(11) NOT NULL,
  `student` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `mail` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `idsquad` int(11) NOT NULL,
  `phone` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `datebirth` date DEFAULT NULL,
  `sex` varchar(40) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `student`
--

INSERT INTO `student` (`idstudent`, `student`, `mail`, `idsquad`, `phone`, `datebirth`, `sex`) VALUES
(1, 'Панфилова АА', 'zxc@ya.ru', 1, '893321', '1999-03-06', 'Мужской'),
(3, 'Мандрыкина АА', NULL, 1, '234292', '1999-03-16', 'Женский');

-- --------------------------------------------------------

--
-- Структура таблицы `subject`
--

CREATE TABLE `subject` (
  `idsubject` int(11) NOT NULL,
  `subject` varchar(40) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `subject`
--

INSERT INTO `subject` (`idsubject`, `subject`) VALUES
(1, 'Программирование C++'),
(3, 'Программирование PHP'),
(4, 'Высшая математика');

-- --------------------------------------------------------

--
-- Структура таблицы `teacher`
--

CREATE TABLE `teacher` (
  `idteacher` int(11) NOT NULL,
  `teacher` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `login` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `parol` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `mail` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `idchair` int(11) NOT NULL,
  `degree` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `seniority` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `phone` varchar(40) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `teacher`
--

INSERT INTO `teacher` (`idteacher`, `teacher`, `login`, `parol`, `mail`, `idchair`, `degree`, `seniority`, `phone`) VALUES
(1, 'Максимов АВ', 'qwe', 'asd', 'asd@ya.ru', 1, '-', '1990', '854328');

-- --------------------------------------------------------

--
-- Структура таблицы `theme`
--

CREATE TABLE `theme` (
  `idtheme` int(11) NOT NULL,
  `theme` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `idstudent` int(11) NOT NULL,
  `idteacher` int(11) NOT NULL,
  `idsubject` int(11) NOT NULL,
  `result` int(11) DEFAULT NULL,
  `datetheme` date DEFAULT NULL,
  `datecheck` date DEFAULT NULL,
  `file` varchar(40) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `theme`
--

INSERT INTO `theme` (`idtheme`, `theme`, `idstudent`, `idteacher`, `idsubject`, `result`, `datetheme`, `datecheck`, `file`) VALUES
(1, 'ИС Автозаправка', 1, 1, 1, NULL, '2020-12-02', '2021-05-20', NULL),
(2, 'ИС Автосервис', 3, 1, 1, 5, '2021-02-04', '2021-05-05', NULL),
(8, '565', 3, 1, 1, 4, '2021-05-20', '2021-05-20', 'Работа.docx');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `chair`
--
ALTER TABLE `chair`
  ADD PRIMARY KEY (`idchair`);

--
-- Индексы таблицы `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`idfaculty`);

--
-- Индексы таблицы `spec`
--
ALTER TABLE `spec`
  ADD PRIMARY KEY (`idspec`);

--
-- Индексы таблицы `squad`
--
ALTER TABLE `squad`
  ADD PRIMARY KEY (`idsquad`),
  ADD KEY `R_11` (`idspec`),
  ADD KEY `R_12` (`idfaculty`);

--
-- Индексы таблицы `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`idstudent`),
  ADD KEY `R_6` (`idsquad`);

--
-- Индексы таблицы `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`idsubject`);

--
-- Индексы таблицы `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`idteacher`),
  ADD KEY `R_10` (`idchair`);

--
-- Индексы таблицы `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`idtheme`),
  ADD KEY `R_3` (`idstudent`),
  ADD KEY `R_4` (`idteacher`),
  ADD KEY `R_9` (`idsubject`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `chair`
--
ALTER TABLE `chair`
  MODIFY `idchair` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `faculty`
--
ALTER TABLE `faculty`
  MODIFY `idfaculty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `spec`
--
ALTER TABLE `spec`
  MODIFY `idspec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `squad`
--
ALTER TABLE `squad`
  MODIFY `idsquad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `student`
--
ALTER TABLE `student`
  MODIFY `idstudent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `subject`
--
ALTER TABLE `subject`
  MODIFY `idsubject` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `teacher`
--
ALTER TABLE `teacher`
  MODIFY `idteacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `theme`
--
ALTER TABLE `theme`
  MODIFY `idtheme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `squad`
--
ALTER TABLE `squad`
  ADD CONSTRAINT `R_11` FOREIGN KEY (`idspec`) REFERENCES `spec` (`idspec`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `R_12` FOREIGN KEY (`idfaculty`) REFERENCES `faculty` (`idfaculty`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `R_6` FOREIGN KEY (`idsquad`) REFERENCES `squad` (`idsquad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `R_10` FOREIGN KEY (`idchair`) REFERENCES `chair` (`idchair`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `theme`
--
ALTER TABLE `theme`
  ADD CONSTRAINT `R_3` FOREIGN KEY (`idstudent`) REFERENCES `student` (`idstudent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `R_4` FOREIGN KEY (`idteacher`) REFERENCES `teacher` (`idteacher`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `R_9` FOREIGN KEY (`idsubject`) REFERENCES `subject` (`idsubject`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
