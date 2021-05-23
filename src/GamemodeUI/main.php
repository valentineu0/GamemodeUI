<?php

/*
*                              _          _ 
*                             | |        | |
*  __ _ _ __ ___  __ _ _ __ __| | ___  __| |
* / _` | '__/ _ \/ _` | '__/ _` |/ _ \/ _` |
*| (_| | | |  __/ (_| | | | (_| |  __/ (_| |
* \__, |_|  \___|\__,_|_|  \__,_|\___|\__,_|
*    | |                                    
*    |_|                                    
*
*@ github.com/qreardedisback/GamemodeUI
*@ GamemodeUI by qreardedisback & HardSiamang655
*/
namespace qrearded\GamemodeUI;                                         

use pocketmine\{Player, Server};
use pocketmine\command\{Command, CommandSender, ConsoleCommandSender};
use jojoe77777\FormAPI\{SimpleForm, CustomForm, ModalForm};
use pocketmine\plugin\PluginBase;

class main extends PluginBase {

  public function onCommand(CommandSender $q, Command $cmd, string $label, array $args): bool {
    if ($cmd->getName() === "gamemodeui" or "gmui") { 
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
          $gm = $q->getGamemode();
          if ($gm === 0) {
            $q->sendPopup("§8» §fYour game mode is already §aSurvival§f.");
            return false;
          }
          
             $q->sendPopup("§8» §fYour game mode has been changed to §aSurvival§f.");
               $q->setGamemode(0);
         break;
       
       case 1: 
         $gm = $q->getGamemode();
            if ($gm === 2) {
            $q->sendPopup("§8» §fYour game mode is already §aAdventure§f.");
            return false;
          }
         $q->sendPopup("§8» §fYour game mode has been changed to §aAdventure§f.");
         $q->setGamemode(2);
         
         break;
         
       case 2: 
         $gm = $q->getGamemode();
          if ($gm === 1) {
            $q->sendPopup("§8» §fYour game mode is already §aCreative§f.");
            return false;
          }
         $q->sendPopup("§8» §fYour game mode has been changed to §aCreative§f.");
         $q->setGamemode(1);
         
         break;
         
        case 3:
          $gm = $q->getGamemode();
            if ($gm === 3) {
            $q->sendPopup("§8» §fYour game mode is already §aSpectator§f.");
            return false;
          }
          $q->sendPopup("§8» §fYour game mode has been changed to §aSpectator§f.");
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
     $form->setContent("Choose your game mode.\nYour current game mode: §a$gm");
     $form->addButton("Survival",0,"textures/blocks/dirt");
     $form->addButton("Adventure",0,"textures/items/bow_pulling_2");
     $form->addButton("Creative",0,"textures/blocks/diamond_block");
     $form->addButton("Spectator",0,"textures/items/feather");
     $form->sendToPlayer($q);
   
   }
  }
