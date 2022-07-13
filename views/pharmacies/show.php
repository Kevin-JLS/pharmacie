<h1><?= $params['pharmacie']->title ?></h1>
<hr>
<span class="me-5"><b>Téléphone</b> : <?= $params['pharmacie']->tel ?></span>
<span><b>Adresse</b> : <?= $params['pharmacie']->address ?></span>
<hr>
<p><?= $params['pharmacie']->content ?></p>
<hr>
<div class="my-3">
     <?php foreach($params['pharmacie']->getMedicaments() as $medicament): ?>
          <span class="badge bg-primary"><?= $medicament->name ?></span>    
     <?php endforeach ?>
</div>
<hr>
<a href="/pharmacie/liste" class="btn btn-secondary">Revenir à la liste des pharmacies</a>