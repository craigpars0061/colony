<?php
namespace App\Models; use Illuminate\Database\Eloquent\Model; class Map extends Model { protected $guarded=[]; public function tiles(){ return $this->hasMany(Tile::class); } }
