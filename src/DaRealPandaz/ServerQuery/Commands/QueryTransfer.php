<?php

/** @author DaRealPandaz */
namespace DaRealPandaz\ServerQuery\Commands;

use linmquery\PMQuery;
use libmquery\PMQueryException;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;

class QueryTransfer extends Command {

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        parent::__construct($name, $description, $usageMessage, $aliases);
        $this->setPermission("drp.query.cmd");
        $this->setUsage("/querytransfer <string:ip> <int:port>");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if($sender->hasPermission($this->getPermission())) {
            if(isset($args[0])) {
                if(isset($args[1])) {
                    if(is_numeric($args[1])) {
                        try{
            $online = PMQuery::query($this->ip, $this->port)['Players'];
            $this->online = $online;
        } catch (PmQueryException $e){
            $this->online = -9999;
        }
    }if($this->online !== -9999){
$sender->transfer($args[0], $args[1]);
                    }else{
$sender->sendMessage(TextFormat::colorize("&cThe server you've requested is currently offline."));
                      
                 }
                    }else {
                        $sender->sendMessage($this->getUsage());
                    }
                }else {
                    $sender->sendMessage($this->getUsage());
                }
            }else {
                $sender->sendMessage($this->getUsage());
            }
    }
}
                        
                   /*     if($query) {
                            if(!$query->isWhitelisted()){
                            $sender->transfer($args[0], $args[1]);
                         //   $sender->sendMessage(TextFormat::GREEN.$query->getIp().":".$query->getPort()." is currently online with ".$query->getPlayerCount()." players online.");
                        }else {
                                $sender->sendMessage(TextFormat::colorize("&cThis server is currently in maintenance. Please try again later."));
                            }
                        }else{
                            $sender->sendMessage(TextFormat::RED."The server you requested is currently offline.");
                        }
                    }else {
                        $sender->sendMessage($this->getUsage());
                    }
                }else {
                    $sender->sendMessage($this->getUsage());
                }
            }else {
                $sender->sendMessage($this->getUsage());
            }
        }
    }

}
