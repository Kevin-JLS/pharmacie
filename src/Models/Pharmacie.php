<?php 

namespace App\Models;

use DateTime;

class Pharmacie extends Model
{
     protected $table = 'pharmacies';

     public function getExcerpt(): string
     {
          return substr($this->content, 0, 200) . '...';
     }

     public function getButton(): string
     {
          return <<<HTML
          <a href="/pharmacie/liste/$this->id" class="btn btn-primary">Voir la fiche complète</a>
HTML;
     }

     public function getMedicaments()
     {
          return $this->query("
               SELECT m.* FROM medicaments m
               INNER JOIN phar_med pm ON pm.medicament_id = m.id
               WHERE pm.pharmacie_id = ?
          ", [$this->id]);
     }

     public function create(array $data, ?array $relations = null)
     {
          parent::create($data);

          $id = $this->db->getPDO()->lastInsertId();

          foreach ($relations as $medicamentId) {
               $stmt = $this->db->getPDO()->prepare("INSERT phar_med (pharmacie_id, medicament_id) VALUES (?, ?)");
               $stmt->execute([$id, $medicamentId]);
          }

          return true;
     }

     public function update(int $id, array $data, ?array $relations = null)
     {
          parent::update($id, $data);

          $stmt = $this->db->getPDO()->prepare("DELETE FROM phar_med WHERE pharmacie_id = ?");
          $result = $stmt->execute([$id]);

          foreach ($relations as $medicamentId) {
               $stmt = $this->db->getPDO()->prepare("INSERT phar_med (pharmacie_id, medicament_id) VALUES (?, ?)");
               $stmt->execute([$id, $medicamentId]);
          }

          if($result) {
               return true;
          }     
     }
}