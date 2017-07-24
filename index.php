<?php
/**
 * Created by PhpStorm.
 * User: bad4i
 * Date: 24.07.2017
 * Time: 20:40
 */

$CREATE = "CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$POSEV = "
INSERT INTO `menu_id` (`id`, `title`, `parent_id`) VALUES
(1, 'родитель 1', 0),
(2, 'родитель 2', 0),
(3, 'ребенок', 1),
(4, 'второй ребенок', 1);";



try {
    $pdo = new PDO('mysql:host=localhost;dbname=garbage', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $result = $pdo->exec($CREATE);  // возвращает количество затронутых строк

    var_dump($result);
} catch (PDOException $e) {
    exit($e->getMessage());
}
