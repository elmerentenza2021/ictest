<h2><?= esc($title) ?></h2>

<?php if (! empty($items) && is_array($items)) : ?>

    <?php foreach ($items as $item): ?>

        <h3><?= esc($item['title']) ?></h3>

        <div class="main">
            <?= esc($item['name']) ?>
        </div>
        <!-- <p><a href="/news/<?= esc($item['slug'], 'url') ?>">View article</a></p> -->

    <?php endforeach; ?>

<?php else : ?>

    <h3>No Contacts</h3>

    <p>Unable to find any contacts for you.</p>

<?php endif ?>