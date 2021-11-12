<div class="mx-8 my-4 text-base">
    <div class="inline-block">
        <p class="ml-6">Nom : <?= $member->name ?></p>
        <p class="ml-6"> Status : <?= $member->status()->name ?></p>
        <p class="ml-6">Role : <?= $member->role()->name ?></p>
        <?php if (count($captainTeam) > 0): ?>
            <p class="ml-6">Capitaine de :
                <?php foreach ($captainTeam as $team): ?>
                    <?= $team->name ?>
                <?php endforeach ?>
            </p>
        <?php endif ?>
        <?php if (count($member->teams()) > 0): ?>
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
        <p class="ml-6"><a href=edit-profile-<?=$member->id?>>Edit</a></p>
    </div>
</div>

