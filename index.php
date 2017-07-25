<?php
/**
 * Created by PhpStorm.
 * User: bad4i
 * Date: 24.07.2017
 * Time: 20:40
 */

$CREATE = "CREATE TABLE IF NOT EXISTS `menu` ( `id` TINYINT(4) NOT NULL AUTO_INCREMENT , 
                                `title` VARCHAR(250) NOT NULL , 
                                `parent_id` TINYINT(4) NOT NULL , 
                                PRIMARY KEY (`id`)) 
                                ENGINE = InnoDB;";

$POSEV = "
INSERT INTO `menu` (`title`, `parent_id`) VALUES
('родитель 1', 0),
('родитель 2', 0),
('ребенок', 1),
('второй ребенок', 1),
('второй ребенок второго родителя', 2),
('ребенок второго родителя', 2),
('внук', 3),
('внук', 3);";



try {
    $pdo = new PDO('mysql:host=localhost;dbname=garbage', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $result = $pdo->exec($CREATE);  // возвращает количество затронутых строк
    $result = $pdo->exec($POSEV);  // возвращает количество затронутых строк

    var_dump($result);
} catch (PDOException $e) {
    exit($e->getMessage());
}
