<?php

namespace LobbySystem\EventListener;

use LobbySystem\Main;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\Config;

class PlayerJoinListener implements Listener {

    private $plugin;

    public function __construct(Main $plugin)
    {
        $this->plugin = $plugin;
    }

    public function onJoin(PlayerJoinEvent $event){

        $player = $event->getPlayer();
        $name = $player->getDisplayName();
        $message = new Config($this->plugin->getDataFolder() . "messages.yml", Config::YAML);
        $str = str_replace("{PLAYER}", $name, $message->get("joinmessage"));
        $event->setJoinMessage($str);

    }

}
