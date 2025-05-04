<?php if ($pager->hasPreviousPage()) : ?>
    <li class="page-item">
        <a class="page-link" href="<?= $pager->getPreviousPage() ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
        </a>
    </li>
<?php endif; ?>

<?php foreach ($pager->links() as $link): ?>
    <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
        <a class="page-link" href="<?= $link['uri'] ?>"><?= $link['title'] ?></a>
    </li>
<?php endforeach; ?>

<?php if ($pager->hasNextPage()) : ?>
    <li class="page-item">
        <a class="page-link" href="<?= $pager->getNextPage() ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
        </a>
    </li>
<?php endif; ?>
