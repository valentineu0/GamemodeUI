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
use pocketmine\utils\TextFormat as qc;

class main extends PluginBase {
  public function onEnable(){

  }
  public function onCommand(CommandSender $q, Command $cmd, string $label, array $args): bool {
    if ($cmd->getName() === "gamemodeui" or "gmui") { 
    if ($q instanceof Player ){
      if ($q->hasPermission("gmui.cmd") or $q->isOp()) {
      $this->gm($q);
      }else{
        $q->sendMessage("§8» §cYou do not have sufficient privileges to use this command.");
        }
      }else{
        $q->sendMessage("§8» §fUse this command in game.");
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
            $q->sendPopup("§8» §fYour game mode is already §6Survival§f.");
            return false;
          }
          
             $q->sendPopup("§8» §fYour game mode has been changed to §6Survival§f.");
               $q->setGamemode(0);
         break;
       
       case 1: 
         $gm = $q->getGamemode();
            if ($gm === 2) {
            $q->sendPopup("§8» §fYour game mode is already §6Adventure§f.");
            return false;
          }
         $q->sendPopup("§8» §fYour game mode has been changed to §6Adventure§f.");
         $q->setGamemode(2);
         
         break;
         
       case 2: 
         $gm = $q->getGamemode();
          if ($gm === 1) {
            $q->sendPopup("§8» §fYour game mode is already §6Creative§f.");
            return false;
          }
         $q->sendPopup("§8» §fYour game mode has been changed to §6Creative§f.");
         $q->setGamemode(1);
         
         break;
         
        case 3:
          $gm = $q->getGamemode();
            if ($gm === 3) {
            $q->sendPopup("§8» §fYour game mode is already §6Spectator§f.");
            return false;
          }
          $q->sendPopup("§8» §fYour game mode has been changed to §6Spectator§f.");
          $q->setGamemode(3);
         
         break;
       }
     });
   $gm = $q->getGamemode();
     $arr = ['Survival', 'Creative', 'Adventure',  'Spectator'];
     $gm = $arr[$gm];
     $form->setTitle("GamemodeUI");
     $form->setContent("Choose your game mode.\nYour current game mode: §6$gm");
     $form->addButton("Survival",0,"textures/blocks/cobblestone");
     $form->addButton("Adventure",0,"textures/blocks/brick");
     $form->addButton("Creative",0,"textures/blocks/bedrock");
     $form->addButton("Spectator",0,"textures/blocks/noteblock");
     $form->sendToPlayer($q);
   
   }
  }
