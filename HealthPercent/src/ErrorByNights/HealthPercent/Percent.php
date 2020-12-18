<?php

declare(strict_types=1);

namespace ErrorByNights\HealthPercent;

use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;

class Percent extends PluginBase implements Listener
{
    public function onEnable()
    {
        $this->getServer()->getPLuginManager()->registerEvents($this, $this);
        $this->getScheduler()->scheduleRepeatingTask(new SetHealthTag ($this), 20/*You can set it to 10 if you want better accurate system*/);
        $this->getLogger()->warning('Player HealthPercent plugin by ErrorByNight enabled.');
    }

    /**
     * @param Player $player
     * @return string
     */
    public function getPercent(Player $player)
    {
        if (($HP = $player->getHealth()) == ($MAXHP = $player->getMaxHealth() <= 20)) {
            $newHP = $HP * 5;
            return "$newHP %";
        } else {
            return '100 %';
        }
    }
}
