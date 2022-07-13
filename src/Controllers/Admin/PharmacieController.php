<?php 

namespace App\Controllers\Admin;

use App\Models\Pharmacie;
use App\Models\Medicament;
use App\Controllers\Controller;

class PharmacieController extends Controller 
{
     public function index()
     {
          $this->isAdmin();

          $pharmacie = (new Pharmacie($this->getDB()))->all();
          
          return $this->view('admin/pharmacie/index', compact('pharmacie'));
     }

     public function create()
     {
          $this->isAdmin();

          $medicaments = (new Medicament($this->getDB()))->all();
          
          return $this->view('admin/pharmacie/form', compact('medicaments'));
     }

     public function createPharmacie()
     {
          $this->isAdmin();

          $pharmacie = new Pharmacie($this->getDB());
          $medicaments = array_pop($_POST);
          $result = $pharmacie->create($_POST, $medicaments);
          
          if($result) {
               return header('Location: /pharmacie/admin/pharmacies');
          }
     }

     public function edit(int $id)
     {
          $this->isAdmin();

          $pharmacie = (new Pharmacie($this->getDB()))->findById($id);
          $medicaments = (new Medicament($this->getDB()))->all();
          
          return $this->view('admin/pharmacie/form', compact('pharmacie', 'medicaments'));
     }

     public function update(int $id)
     {
          $this->isAdmin();

          $pharmacie = new Pharmacie($this->getDB());

          $medicaments = array_pop($_POST);
          $result = $pharmacie->update($id, $_POST, $medicaments);
          
          if($result) {
               return header('Location: /pharmacie/admin/pharmacies');
          }
     }

     public function destroy(int $id)
     {
          $this->isAdmin();
          
          $pharmacie = new Pharmacie($this->getDB());
          $result = $pharmacie->destroy($id);

          if($result) {
               return header('Location: /pharmacie/admin/pharmacies');
          }
     }
}