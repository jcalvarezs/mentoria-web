<?php

class m00001_initial
{
    public function up(){
        $db = \app\core\Application:: $app->db;
        $sql = CREATE TABLE `users` (
            `id` int NOT NULL,
            `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
          
          pdo->
          $sql= ALTER TABLE `users`
            ADD PRIMARY KEY (`id`);
          
          
            $sql = ALTER TABLE `users`
            MODIFY `id` int NOT NULL AUTO_INCREMENT;


    }

    public function down(){
        $db = \app\core\Application:: $app->db;

        echo "Reverse Migration\n";
    }

}