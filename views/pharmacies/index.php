<h1>Liste des pharmacies</h1>

<div class="row">
     <?php foreach ($params['pharmacies'] as $pharmacie) : ?>
          <div class="col-4">
               <div class="card mb-3">
                    <div class="card-body">
                         <h5><?= $pharmacie->title ?></h5>
                         <?= $pharmacie->getButton() ?>
                    </div>
               </div>
          </div>      
     <?php endforeach ?>
</div>
