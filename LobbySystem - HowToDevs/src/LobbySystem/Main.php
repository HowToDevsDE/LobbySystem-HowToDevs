<?php

namespace LobbySystem;

use LobbySystem\EventListener\PlayerJoinListener;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener {

    const PREFIX = TextFormat::GOLD . "LobbySystem§8 | §r";

    public function onEnable()
    {
        Server::getInstance()->getPluginManager()->registerEvents($this, $this);
        $message = new Config($this->getDataFolder() . "messages.yml", Config::YAML);
        $this->registerEvents();
        $this->registerTasks();
        $this->registerCommands();
    }


    public function registerEvents(){
        Server::getInstance()->getPluginManager()->registerEvents(new PlayerJoinListener($this), $this);
    }

    public function registerTasks(){
        //Todo
    }

    public function registerCommands(){
        //Todo
    }

}
