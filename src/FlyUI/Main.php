<?php
/*
made by zJustMarcel02
*/

namespace FlyUI;

use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat as tf;
use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\ConsoleCommandSender;

class Main extends PluginBase implements Listener{
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info(tf::GREEN . "FlyUI Enable");
		}
		public function onDisable(){
			$this->getLogger()->info(tf::RED . "FlyUI disabled.");
			}
			
			public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool{
				switch($cmd->getName()){
					case "flyui":
					if($sender->hasPermission("flyui.use")){
						$this->Menu($sender);
					}else{
						$sender->sendMessage(tf::red . "You dont have the permission.");
						return true;
					}
					break;
					
				}
				return true;
			}
			
			public function Menu($sender){
				$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
				$form = $api->createSimpleForm(function (Player $sender, int $data = null){
					$result = $data;
					if($result === null{
						return true;
					}
					switch($result){
						case 0:
					$sender->sendMessage(tf::GRAY . "§8[§c§lFly§f§lUI§r§8]");
					$sender->addTitle("§8[§c§lFly§f§lUI§r§8]", "§aActivated.");
					$sender->setAllowFlight(true);
					    break;
					    case 1:
					$sender->sendMessagetf::GRAY . "§8[§c§lFly§f§lUI§r§8] §8》 §7FlyMode§8: §aActivated.§r");
					$sender->addTitle("§8[§c§lFly§f§lUI§r§8] §8》", "§cDeactivated.§r");
					$sender->setAllowFlight(false);
					    break;
					    case 2:
					$sender->sendMessage(tf::GRAY . "§8[§c§lFly§f§lUI§r§8] §8》 §4Closed.");
					$sender->addTitle("§8[§c§lFly§f§lUI§r§8] §8》 §7", "§4Closed.§r");
					    break;
					}
					
					});
					$form->setTitle("§8[§c§lFly§f§lUI§r§8] §8》 §7");
					$form->setContent("§7Choose §aActivate §7or §cDeactivate§r");
					$form->addButton("§a§lActivated§r\n§7Choose this");
					$form->addButton("§c§lDeactivate§r\n§7Choose this");
					$form->addButton("§4§lClose§r\n§7Click this to §4Close.§r");
					$form->sendToPlayer($sender);
					return $form;
				}
				
				
}
	

