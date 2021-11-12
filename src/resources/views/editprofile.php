<div class="mx-8 my-4 text-base">
    <div class="inline-block">

        <?php if($member->id == $user->id):?>
        <form action="edit-profile-<?= $member->id ?>" method="post">
        <p class="ml-6">Nom :<input type="text" name="name">
            <button  class="px-4 py-2 rounded text-sm dark:bg-dark-3 dark:hover:bg-dark-2" type="submit">Edit</button>
        </form></p>
        <?php else: ?>
            <p class="ml-6">Nom :<?=$member->name?></p>
        <?php endif?>
        <?php if($user->isModerator()):?>
            <form action="edit-profile-<?= $member->id ?>" method="post">
                <!-- TODO : Formulaire de changement de role et status -->
            </form></p>
        <?php else: ?>
            <p class="ml-6"> Status : <?= $member->status()->name ?></p>
            <p class="ml-6">Role : <?= $member->role()->name ?></p>
        <?php endif?>
        <?php if (count($captainTeam)>0): ?>
            <p class="ml-6">Capitaine de :
                <?php foreach ($captainTeam as $team): ?>
                    <?= $team->name ?>
                <?php endforeach ?>
            </p>
        <?php endif ?>
        <?php if (count($member->teams())>0): ?>
            <p class="ml-6">Membre de :
                <?php foreach ($member->teams() as $team): ?>
                    <?php if ($team->captain()->id != $member->id): ?>
                        <?= $team->name ?>
                    <?php endif ?>
                <?php endforeach ?>
            </p>
        <?php else: ?>
            <p class="ml-6">Inscrit dans aucune équipe</p>
        <?php endif ?>
    </div>
</div>

