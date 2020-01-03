

<?php if($result==1): ?>

    <div class='alert alert-success'>  Connexion reussie   </div>

<?php else: ?>

<div class='alert alert-danger'> Echec de la connexion: <?=$error ?> </div>

<?php endif?>