<?php
//Business/UserService.php
declare(strict_types=1);

namespace Business;

use Data\UserDAO;
use Entities\User;

class UserService {
    public function getUserLijst(): array {
        $UserDAO = new UserDAO();
        return $UserDAO->getAll();
    }
    public function getUserByName(string $username): User {
        $UserDAO = new UserDAO();
        $UserData = $UserDAO->getUserByName($username);
        $user = new User((int)$UserData["user_id"], (int)$UserData["leeftijd"], (string)$UserData["bio"], (string)$UserData["wachtwoord"]);
        return $user;
    }
    public function getUserByUserId(int $userId): User {
        $UserDAO = new UserDAO();
        $UserData = $UserDAO->getUserById($userId);
        $user = new User((int)$UserData["user_id"], (string)$UserData["username"],  (int)$UserData["leeftijd"], (string)$UserData["bio"], (string)$UserData["wachtwoord"]);
        return $user;
    }
    public function usernameReedsInGebruik(string $username): int {
        $UserDAO = new UserDAO();
        return $UserDAO->usernameReedsInGebruik($username);
        // Het resultaat is ofwel 0 ofwel 1
    }
    public function register(User $user): User {
        $UserDAO = new UserDAO();
        $UserDAO->register($user);
        return $user;
    }
    public function login(User $user): User {
        $UserDAO = new UserDAO();
        $UserDAO->login($user);
        return $user;
    }
    /* INDIEN JE DE USER WILT AANPASSEN
    public function updateProfiel(User $user): User {
        $UserDAO = new UserDAO();
        $UserDAO->updateProfiel($user);
        return $user;
    }
    */
    public function updateWachtwoord(User $user): User {
        $UserDAO = new UserDAO();
        $UserDAO->updateWachtwoord($user);
        return $user;
    }
}

//Bij deze service werk ik met een entiteit die ik meegeef, in mijn andere services zijn het gegevens die ik meegeef waarmee ik entiteiten aanmaak, 
//ik zou hier ook hetzelfde kunnen doen maar mijn DAO staat al goed