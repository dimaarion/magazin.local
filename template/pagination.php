<nav aria-label="...">
    <ul class="pagination justify-content-center">
        <li class="page-item disabled">
            <span class="page-link">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                </svg>
            </span>
        </li>
        <?php for ($i = 0, $j = 1; $i < floor($controller->pagination(count($x), $controller->limit)); $i++, $j++) :  ?>
            <li class="page-item <?php echo $controller->twocorrectthird($controller->twocorrectthird($controller->id, '', 1, $controller->id), $j, 'active', ''); ?>"><a class="page-link" href="/<?php echo $controller->paginationPage($controller, $i, $j); ?>"><?php echo $j ?></a></li>
        <?php endfor; ?>
        <li class="page-item ">
            <a class="page-link " href="<?php echo $controller->paginationPlus($controller, 1, floor($controller->pagination(count($x), $controller->limit))); ?>">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                </svg>
            </a>
        </li>
    </ul>
</nav>