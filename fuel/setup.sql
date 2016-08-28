--
-- テーブルの構造 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_age` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_shusshin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_gakureki` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_shigoto` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_shumi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_access_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ;
