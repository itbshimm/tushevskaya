-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 20 2022 г., 23:45
-- Версия сервера: 5.7.21-20-beget-5.7.21-20-1-log
-- Версия PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `f92282nf_nit`
--

-- --------------------------------------------------------

--
-- Структура таблицы `applications`
--
-- Создание: Мар 20 2022 г., 19:46
-- Последнее обновление: Мар 20 2022 г., 20:44
--

DROP TABLE IF EXISTS `applications`;
CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `brends`
--
-- Создание: Мар 19 2022 г., 19:10
-- Последнее обновление: Мар 20 2022 г., 11:03
--

DROP TABLE IF EXISTS `brends`;
CREATE TABLE `brends` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `brends`
--

INSERT INTO `brends` (`id`, `name`) VALUES
(11, 'Apple'),
(12, 'Lenovo'),
(15, 'Intel'),
(16, 'HP'),
(17, 'Cisco'),
(18, 'FlySky');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--
-- Создание: Мар 19 2022 г., 19:10
-- Последнее обновление: Мар 20 2022 г., 11:16
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(16, 'Системные блоки'),
(17, 'Серверы'),
(21, ' Датчики для телеметрии'),
(23, 'Сетевое оборудование, WI-FI');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--
-- Создание: Мар 19 2022 г., 19:10
-- Последнее обновление: Мар 20 2022 г., 11:15
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brend_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `category_id`, `brend_id`) VALUES
(1, 'Системный блок Lenovo H50-05', 'Системный блок Lenovo H50-05, процессор 4 ядра AMD A4-7210 with AMD Radeon graphics R3, оперативная память DDR3 4Gb (1x4Gb), встроенная графика AMD Radeon R3 512Mb, жесткий диск 500Gb, оптический привод DVD-RW, внешний блок питания, операционная система Windows 7 Professional x64\r\nСтоимость: 7990 руб.', '16ca4f986ceb5caac62ae99729012220.jpg', 16, 12),
(2, 'Маршрутизатор Cisco 2911/K9 v05', 'Маршрутизатор Cisco 2911/K9 v05 обеспечивает высокопроизводительную интеграцию сервисов передачи голоса, видео, данных, обеспечения безопасности, беспроводной связи и мобильных сервисов\r\nСерия маршрутизаторов с интегрированными сервисами ISR Cisco ISR 2900 series\r\nМодульная конструкция функционал которой наращивается установкой модулей расширения\r\nОперационная система IOS 15.1(4)M3 fc1\r\nПостоянные лицензии ipbaseK9 и securityK9\r\nБлок питания PWR-2911-AC от сети 220В\r\nСобран в Чехии\r\nСтоимость: 9990 руб.', '586b75ffc1bbf770fb6704f0e3601b9d.jpg', 23, 17),
(3, 'Датчик температуры FlySky для системы телеметрии', 'Датчик температуры FlySky для системы телеметрии. Диапазон измеряемых температур от -40 до 250 градусов Цельсия. Вес 6 гр, Напряжение питания 4-6,5 В.\r\nСтоимость: 1990 руб.', 'b908ce1fd2c55c677965b8b416a58697.jpg', 21, 18),
(4, 'Датчик напряжения для телеметрии', 'Датчик телеметрии для измерения температуры батареи или двигателя для авиамоделей.\r\nСтоимость: 990 руб.', '0c06180ba50d03db6b2e8e5268a2703c.jpg', 21, 18),
(5, 'Системный блок HP Pavilion Gaming TG01-2013ur ', 'PN 42V04EA\r\nМодель CPU Intel Core i5 11400F\r\nТактовая частота CPU 2.6 ГГц\r\nКоличество ядер процессора - 6 ядер\r\nОбъём 16384 Мб\r\nОбъем диска SSD 512 Гб\r\nГрафический чипсет NVidia GeForce RTX 3060 Ti\r\nОбъем видеопамяти 8192 Мб\r\nОперационная система Microsoft Windows 10 Home\r\nСтоимость 250000 руб.', 'a6449684393caebaf0c532ac44960606.jpg', 16, 16),
(6, 'Сервер Xserve G4', 'Два процессора PowerPC G4 1.0 ГГц с 256 Кбайт кэша второго уровня и 2 Мбайта внешнего кэша третьего уровня каждый;\r\n2 Гбайта ОЗУ DDR266(установлен максимальный поддерживаемый объем, в оригинальной комплектации было 512 Мбайт) ;\r\nжесткий диск 60 Гбайт с поддержкой горячей замены;\r\nдва гигабитных сетевых адаптера (один установлен на системной плате, другой выполнен в виде платы расширения PCI64).', '50bc2010bf222c832c0df32cb5515e90.jpg', 17, 11),
(10, 'Сетевая карта Intel EXPI9301CT', 'Интерфейс подключения PCI-E\r\nСкорость передачи данных - 1 Гбит/c\r\nКоличество портов - 1\r\nЧип Intel 82574L\r\nФункции и особенности: Wake-on-LAN, низкопрофильная планка (Low Profile), Jumbo Frame, TCP Checksum Offload\r\nПоддержка ОС: Windows 2000/2003 Server/2008 Server/XP/Vista/7/8 Linux, FreeBSD, Novell Netware 6.5, DOS\r\nДополнительная информация: tCP Segmentation; поддержка 802.1p; координация прерываний\r\nСрок службы 12 мес.\r\nСтоимость: 8510 руб.', '7ec691a941f45791adafb094ba1b465a.jpg', 23, 15),
(11, 'Компьютерный корпус HP Pro 3500 Intel Core i5-3470', 'Системный блок HP Pro 3500, процессор Intel Core i5-3470 (3.60GHz), оперативная память DDR3 8Gb (2x4Gb), жесткий диск HDD 500Gb, встроенная графика Intel HD 2500, оптический привод DVD-RW, блок питания ATX 300W, операционная система Windows 10 Professional x64 лицензия\r\nСтоимость: 11990 руб.', '32e1900582abc80c446aed9cc2ac21be.jpg', 16, 16),
(12, 'Сервер Cisco UCSB-B200-M4', 'Процессоры семейства 1 или 2 Intel® Xeon® processor E5-2600 v4 и v3\r\nЧипсет Intel C610 серии\r\nПамять	До 24 двойной скорости передачи данных 4 (DDR4) двойной встроенной памяти (DIMM) на скоростях 2400 и 2133 МГц\r\nАнтресольные переходники	2\r\nДва дополнительных горячих подключаемых жестких диска SAS, SATA или твердотельных накопителя (SSD)\r\nМаксимальная внутренняя память до 3,2 ТБ\r\nСтоимость: 112000 руб.', 'fa98c8898cc448858d775ac23f9316aa.jpg', 17, 17);

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--
-- Создание: Мар 19 2022 г., 19:10
-- Последнее обновление: Мар 20 2022 г., 09:18
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `review_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `user_name`, `user_email`, `review_text`) VALUES
(1, 'Михаил', 'ivanov12@gmail.ru', 'Приемлемые цены');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--
-- Создание: Мар 19 2022 г., 19:10
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_log` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `user_log`, `user_pass`) VALUES
(1, 'test', '12345test');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `brends`
--
ALTER TABLE `brends`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brend_id` (`brend_id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `brends`
--
ALTER TABLE `brends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brend_id`) REFERENCES `brends` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
