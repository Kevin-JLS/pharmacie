<?php 

namespace App\Models;

class Medicament extends Model
{
     protected $table = 'medicaments';

     public function getMedicaments() 
     {
          return $this->query("
               SELECT p.* FROM pharmacies p
               INNER JOIN phar_med pm ON pm.pharmacie_id = p.id
               WHERE pm.medicament_id = ?
          ", [$this->id]);
     }
}