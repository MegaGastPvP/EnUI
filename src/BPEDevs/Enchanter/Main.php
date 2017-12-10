<?php

namespace MegaGastPvP\Enchants;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\inventory\PlayerInventory;
use onebone\economyapi\EconomyAPI;
use pocketmine\utils\TextFormat as c;
class Main extends PluginBase implements Listener{
    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    public function ae(Player $p, $en, $l, $price) {
        if(EconomyAPI::getInstance()->myMoney($p) > $price){
            EconomyAPI::getInstance()->reduceMoney($p, $price);
            $item = $p->getInventory()->getItemInHand();
            $ce = $this->getServer()->getPluginManager()->getPlugin("PiggyCustomEnchants");
            $ce->addEnchantment($item, ["$en"], [$l], true);
            $p->getInventory()->setItemInHand($item);
        }
    }
    public function onCommand(CommandSender $p, Command $cmd, string $label, array $args) : bool {
        $playermoney = EconomyAPI::getInstance()->myMoney($p);
        switch($cmd->getName()){
            case "enchanter":
                $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
                if($api === null || $api->isDisabled()){
                    
                }
                $f = $api->createSimpleForm(function (Player $p, array $data){
                $r = $data[0];
                if($r === null){
                    
                }
                switch($r){
                    case 0:
                        break;
                    case 1:
                        $command = "Mythic";
                        $this->getServer()->getCommandMap()->dispatch($p, $command);
                        break;
                    case 2:
                        $command = "rare";
                        $this->getServer()->getCommandMap()->dispatch($p, $command);
                        break;
                    case 3:
                        $command = "uncommon";
                        $this->getServer()->getCommandMap()->dispatch($p, $command);
                        break;
                    case 4:
                        $command = "common";
                        $this->getServer()->getCommandMap()->dispatch($p, $command);
                        break;
                }
                });
                $f->setTitle(c::GOLD . c::BOLD . "Enchanter " . $playermoney);
                $f->setContent(c::YELLOW . "What kind of enchant do you what");
                $f->addButton(c::AQUA . c::BOLD . "Enchants");
                $f->addButton(c::RED . "Mythical");
                $f->addButton(c::YELLOW . "Rare");
                $f->addButton(c::AQUA  . "Uncommon");
                $f->addButton(c::GREEN . "Common");
                $f->sendToPlayer($p);
                if(!$p instanceof Player){
                    
                }
                case "mythic":
                    $apii = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
                    $ff = $apii->createSimpleForm(function (Player $p, array $data){
                    $r = $data[1];
                    if($r === null){
                        
                    }
                    switch($r){
                        case 0:
                            break;
                        case 2:
                            
                    }
                    });
                    
                
        }
    }
}
