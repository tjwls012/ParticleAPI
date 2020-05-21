<?php

/**
 * @name ParticleAPI
 * @main securti\particleapi\ParticleAPI
 * @author ["Securti"]
 * @version 0.1
 * @api 3.10.0
 * @description This plugin is made by Securti. :3
 */
 
 namespace securti\particleapi;
 
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\level\particle\DustParticle;

use pocketmine\math\Vector3;

use pocketmine\utils\Color;

class ParticleAPI extends PluginBase implements Listener{

  public static $instance;
  
  public static function getInstance(){
  
    return self::$instance;
  }
  public function onLoad(){
  
    self::$instance = $this;
  }
  public function onEnable(){
  
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }
  public function circleParticle($radius = 1, $unit = 15, Vector3 $center, Level $level, array $color){
  
    for($i = 0; $i < 360; $i += $unit){
    
      $s = $i *(2 * M_PI / 50);
      
      $x = $center->getX();
      $y = $center->getY();
      $z = $center->getZ();
      
      $vector = new Vector3($x + sin(deg2rad($i)) * $radius, $y, $z + cos(deg2rad($i)) * $radius);
      
      $level->addParticle(new DustParticle($vector, $color[0], $color[1], $color[2]));
    }
  }
  public function straightParticle($unit = 0.5, Vector3 $vector_1, Vector3 $vector_2, Level $level, array $color){
  
    $x = $vector_1->getX() - $vector_2->getX();
    $y = $vector_1->getY() - $vector_2->getY();
    $z = $vector_1->getZ() - $vector_2->getZ();
    
    $xz_sq = $x * $x + $z * $z;
    $xz_modulus = sqrt($xz_sq);
    
    $yaw = rad2deg(atan2(-$x, $z));
    $pitch = rad2deg(- atan2($y, $xz_modulus));
    
    $distance = $vector_1->distance($vector_2);
    
    for($i = 0; $i <= $distance; $i += $unit){
    
      $vector = $vector_1;
      
      $x1 = $vector_1->getX() - $i * (-\sin ($yaw / 180 * M_PI));
      $y1 = $vector_1->getY() - $i * (-\sin ($pitch / 180 * M_PI));
      $z1 = $vector_1->getZ() - $i * (\cos($yaw / 180 * M_PI));
      
      $vector = new Vector3($x1, $y1, $z1);
      
      $level->addParticle(new DustParticle($vector, $color[0], $color[1], $color[2]));
    }
  }
}