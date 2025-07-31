<?php if ($pager->getPageCount() > 1): ?>
<nav>
  <ul class="pagination justify-content-center">
    <?php if ($pager->hasPreviousPage()): ?>
      <li class="page-item">
        <a class="page-link" href="<?= $pager->getFirst() ?>" aria-label="First">&laquo;</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="<?= $pager->getPreviousPage() ?>" aria-label="Previous">&lsaquo;</a>
      </li>
    <?php endif ?>

    <?php foreach ($pager->links() as $link): ?>
      <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
        <a class="page-link" href="<?= $link['uri'] ?>"><?= $link['title'] ?></a>
      </li>
    <?php endforeach ?>

    <?php if ($pager->hasNextPage()): ?>
      <li class="page-item">
        <a class="page-link" href="<?= $pager->getNextPage() ?>" aria-label="Next">&rsaquo;</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="<?= $pager->getLast() ?>" aria-label="Last">&raquo;</a>
      </li>
    <?php endif ?>
  </ul>
</nav>
<?php endif ?>
