
<?php

namespace GamemodeUI;

use pocketmine\{Player, Server};
use pocketmine\command\{Command, CommandSender, ConsoleCommandSender};
use jojoe77777\FormAPI\{SimpleForm, CustomForm, ModalForm};
use pocketmine\plugin\PluginBase;

class main extends PluginBase {
  public function onEnable(){
  $this->getLogger()->info("» GamemodeUI v1.0.1 Active.");
  }
  public function onCommand(CommandSender $q, Command $cmd, string $label, array $args): bool {
    if ($cmd->getName() === "gamemodeui") {
    if ($q instanceof Player ){
      if ($q->hasPermission("gamemodeui.hq") or $q->isOp()) {
      $this->gm($q);
      }else{
        $q->sendMessage("§8» §cYou do not have sufficient privileges to use this command.");
        }
      }else{
        $q->sendMessage("» Use this command from within the game.");
    }
   }
    return true;
  }
  public function gm($q) {
   $form = new SimpleForm(function(Player $q, $data) {
     if ($data === null) {
    return true;
     }
       switch($data) {
         case 0:
             $q->sendPopup("§8» §fYour game mode has been changed to §bSurvival§f.");
               $q->setGamemode(0);
         break;
       
       case 1: 
         $q->sendPopup("§8» §fYour game mode has been changed to §bAdventure§f.");
         $q->setGamemode(2);
         
         break;
         
       case 2: 
         $q->sendPopup("§8» §fYour game mode has been changed to §bCreative§f.");
         $q->setGamemode(1);
         
         break;
         
        case 3:
          $q->sendPopup("§8» §fYour game mode has been changed to §bSpectator§f.");
          $q->setGamemode(3);
         
         break;
       }
     });
     $gm = $q->getGamemode();
     if ($gm === 0) {
       $gm = "Survival";
     }
     if ($gm === 2) {
       $gm = "Adventure";
     }
     if ($gm === 3) {
       $gm = "Spectator";
     }
     if ($gm === 1) {
       $gm = "Creative";
     }
     $form->setTitle("GamemodeUI");
     $form->setContent("Choose your game mode.\nYour current game mode: §b$gm");
     $form->addButton("Survival",0,"textures/blocks/dirt");
     $form->addButton("Adventure",0,"textures/items/bow_pulling_2");
     $form->addButton("Creative",0,"textures/blocks/diamond_block");
     $form->addButton("Spectator",0,"textures/items/feather");
     $form->sendToPlayer($q);
   
   }
  }
