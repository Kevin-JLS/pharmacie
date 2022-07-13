<h1><?= $params['pharmacie']->title ?? 'Créer un nouvel article' ?></h1>

<form action="<?= isset($params['pharmacie']) ? "/pharmacie/admin/pharmacies/edit/{$params['pharmacie']->id}" : "/pharmacie/admin/pharmacies/create" ?>" method="post">
     <div class="form-group">
          <label for="title">Nom de la pharmacie</label>
          <input type="text" class="form-control" name="title" value="<?= $params['pharmacie']->title ?? '' ?>" id="title">
     </div>
     <div class="form-group">
          <label for="content">Description courte</label>
          <textarea name="content" id="content" rows="4" class="form-control"><?= $params['pharmacie']->content ?? '' ?></textarea>
     </div>
     <div class="form-group">
          <label for="tel">Téléphone</label>
          <input name="tel" id="tel" class="form-control" value="<?= $params['pharmacie']->tel ?? '' ?>"></input>
     </div>
     <div class="form-group">
          <label for="address">Adresse</label>
          <input name="address" id="address" class="form-control" value="<?= $params['pharmacie']->address ?? '' ?>"></input>
     </div>

     <div class="form-group">
          <label for="medicaments">Médicaments de la pharmacie</label>
          <select class="form-select" multiple name="medicaments[]" id="medicaments">
               <?php foreach ($params['medicaments'] as $medicament) : ?>
                    <option 
                         value="<?= $medicament->id ?>"
                         <?php if(isset($params['pharmacie'])) : ?>
                              <?php foreach($params['pharmacie']->getMedicaments() as $pharmacieMedicaments) {
                                   echo ($medicament->id === $pharmacieMedicaments->id) ? 'selected' : '';
                              }?>
                         <?php endif ?>
                    >   
                         <?= $medicament->name ?>            
                    </option>
               <?php endforeach ?>
          </select>
     </div>

     <button class="btn btn-primary my-3"><?= isset($params['pharmacie']) ? 'Enregistrer les modifications' : 'Enregistrer la pharmacie' ?></button>
</form>
