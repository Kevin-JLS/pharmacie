<h1>Administration des articles</h1>

<?php if(isset($_GET['success'])) : ?>
     <div class="alert alert-success">Bravo, vous êtes connectés</div>
<?php endif ?>

<a href="/pharmacie/admin/pharmacies/create" class="btn btn-success my-3">Créer un article</a>

<table class="table">
     <thead>
          <tr>
               <th scope="col">#</th>
               <th scope="col">Titre</th>
               <th scope="col">Actions</th>
          </tr>
     </thead>
     <tbody>
          <?php foreach($params['pharmacie'] as $pharmacie) : ?>
               <tr>
                    <th scope="row"><?= $pharmacie->id ?></th>
                    <td><?= $pharmacie->title ?></td>
                    <td>
                         <a href="/pharmacie/admin/pharmacies/edit/<?= $pharmacie->id ?>" class="btn btn-warning">Modifier</a>
                         <form action="/pharmacie/admin/pharmacies/delete/<?= $pharmacie->id ?>" method="post" class="d-inline">
                              <button type="submit" class="btn btn-danger">Supprimer</button>
                         </form>
                    </td>
               </tr>
          <?php endforeach ?>
     </tbody>
</table>