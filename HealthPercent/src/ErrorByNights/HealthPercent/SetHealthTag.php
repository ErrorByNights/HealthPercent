<?php

namespace ErrorByNights\HealthPercent;

use pocketmine\scheduler\Task;
use pocketmine\Server;
use pocketmine\utils\TextFormat as E;

class SetHealthTag extends Task
{

    public function __construct(Percent $percent)
    {
        $this->percent = $percent;
    }

    /**
     * @param int $currentTick
     */
    public function onRun(int $currentTick)
    {
        foreach (Server::getInstance()->getOnlinePlayers() as $player) {
            $player->setScoreTag(E::BOLD . E::RED . $this->percent->getPercent($player) . E::DARK_RED . ' ❤');
        }
    }
}