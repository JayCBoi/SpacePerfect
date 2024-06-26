<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository {

    public function getUser(string $login) {

        $pdo = $this->database->connect();

        $stmt = $pdo->prepare('SELECT * FROM users INNER JOIN users_stats ON users.id_users = users_stats.id_users_stats where users.login = :login');
        $stmt->bindParam(':login', $login, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false){
            return null;
        }

        

        return new User(
            $user['id_users'],
            $user['login'],
            $user['email'],
            $user['passwd'],
            $user['account_type'],
            $user['created_at'],
            $user['levels_cleared'],
            $user['campaign_levels_cleared'],
            $user['crashes'],
            $user['maps_built']
        );
        
    }

    public function addUser(User $user): void {

        $pdo = $this->database->connect();

        $stmt = $pdo->prepare('INSERT INTO users (login, email, passwd) VALUES (?, ?, ?)');
        $stmt->execute([
            $user->getLogin(),
            $user->getEmail(),
            $user->getPassword(),
        ]);

        $stmt = $pdo->prepare('INSERT INTO users_stats (id_users_stats) VALUES ((select id_users from users where login=?))');
        $stmt->execute([
            $user->getLogin(),
        ]);

    }

    public function updatePassword(int $userId, string $newPassword): void {

        $newPassword = password_hash($newPassword, PASSWORD_BCRYPT);

        $stmt = $this->database->connect()->prepare(
            'UPDATE users SET passwd = :newPassword WHERE id_users = :userId'
        );
        $stmt->bindParam(':newPassword', $newPassword, PDO::PARAM_STR);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

    }

    public function deleteUser(int $userId): void {

        $stmt = $this->database->connect()->prepare('DELETE FROM users WHERE id_users = :userId');
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

    }


}