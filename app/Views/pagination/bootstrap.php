<?php

/**
 * @var \CodeIgniter\Pager\PagerRenderer $pager
 */

$pager->setSurroundCount(3);
?>


<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">

        <?php if ($pager->hasPrevious()) : ?>
            <li class="page-item">
                <a href="<?= $pager->getFirst(); ?>" class="page-link"><?= lang('Pager.first'); ?></a>
            </li>
            <li class="page-item">
                <a href="<?= $pager->getPrevious(); ?>" class="page-link"><?= lang('Pager.previous'); ?></a>
            </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link) : ?>
            <li class="page-item <?= $link['active'] ? 'active' : ''; ?>">
                <a href="<?= $link['uri']; ?>" class="page-link">
                    <?= $link['title']; ?>
                </a>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNext()) : ?>
            <li class="page-item">
                <a href="<?= $pager->getNext(); ?>" class="page-link"><?= lang('Pager.next'); ?></a>
            </li>
            <li class="page-item">
                <a href="<?= $pager->getLast(); ?>" class="page-link"><?= lang('Pager.last'); ?></a>
            </li>
        <?php endif ?>

    </ul>
</nav>
