<?php
//Business/AutoService
declare(strict_types=1);

namespace Business;

use Data\AutoDAO;
use Entities\Auto;

class AutoService {
    public function getAutoLijst() : array {
        $autoDAO = new AutoDAO();
        $lijst = $autoDAO->getAutoLijst();
        return $lijst;
    }
    public function getConsoleById(int $console_id) : array {
        $autoDAO = new AutoDAO();
        $lijst = $autoDAO->getAutoById($console_id);
        return $lijst;
    }
    public function voegAutoToe(Auto $auto) : Auto {
        $autoDAO = new AutoDAO();
        $autoDAO->createAuto($auto);
        return $auto;
    }
}