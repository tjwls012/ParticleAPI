# ParticleAPI


use tjwls012\particleapi\ParticleAPI;


$instance = ParticleAPI::getInstance();


/*

 $radius : radius or distance from center to vertex

 $unit : particle spacing angle or coordinates

 $center, $vector_1, $vector2 : location

 $level : create level

 $color : 0 => $r, 1 => $g, 2 => $b color code

 $side : sides of the entire shape

 $length : length of the side

 $rotation : degree of rotation

*/


//CIRCLE

$instance->cricleParticle(float $radius, float $unit, Vector3 $center, Level $level, array $color);


//STRAIGHT

$instance->cricleParticle(float $unit, Vector3 $vector_1, Vector3 $vector_2, Level $level, array $color);


//REGULAR POLYGON

$instance->regularpolygonParticle(int $side, float $radius, float $unit, float $length, float $rotation, Vector3 $center, Level $level, array $color);
