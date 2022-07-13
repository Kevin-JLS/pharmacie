<?php 

namespace App\Controllers;

use App\Models\Medicament;
use App\Models\Pharmacie;

class PharmacieController extends Controller
{
     public function welcome()
     {
          return $this->view('pharmacies/welcome');
     }

     public function index()
     {
          $pharmacie = new Pharmacie($this->getDB());
          $pharmacies = $pharmacie->all();

          return $this->view('pharmacies/index', compact('pharmacies'));
     }

     public function show(int $id) 
     {
          $pharmacie = new Pharmacie($this->getDB());
          $pharmacie = $pharmacie->findById($id);

          return $this->view('pharmacies/show', compact('pharmacie')); 
     }

     public function medicament(int $id)
     {
          $medicament = (new Medicament($this->getDB()))->findById($id);

          return $this->view('pharmacies/tag', compact('medicament'));
     }
}