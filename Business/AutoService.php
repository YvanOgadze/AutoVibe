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
    public function getAutoById(int $auto_id) : Auto {
        $autoDAO = new AutoDAO();
        $autoData = $autoDAO->getAutoById($auto_id);
        $auto = new Auto((int)$autoData["auto_id"], (string)$autoData["merk"]);
        return $auto;
    }
    public function voegAutoToe(Auto $auto) : Auto {
        $autoDAO = new AutoDAO();
        $autoDAO->createAuto($auto);
        return $auto;
    }
}