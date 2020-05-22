# ParticleAPI


> use
 
 use securti\particleapi\ParticleAPI;

> api
 
 $instance = ParticleAPI::getInstance();

> particles
 
 - cricle :
 $instance->cricleParticle(float $radius, float $unit, Vector3 $center, Level $level, array $color);

 - straight :
 $instance->cricleParticle(float $unit, Vector3 $vector_1, Vector3 $vector_2, Level $level, array $color);

 - regular pentagon : 
 $instance->regularpentagonParticle(int $side, float $radius, float $unit, float $length, float $rotation, Vector3 $center, Level $level, array $color);
