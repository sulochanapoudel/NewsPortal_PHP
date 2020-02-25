<?php if($paginate['pages'] > 1): ?>
 <?php
    $path = explode('/', $_SERVER['PATH_INFO']);
    $base = $path[1];
?>
    <nav>
        <ul class="pagination">
            <?php if($paginate['pageno'] == 1): ?>
                <li class="page-item disabled">
                    <a class="page-link" href="#" >Previous</a>
                </li>
            <?php else: ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo url($base.'?page='.($paginate['pageno'] - 1)); ?>">Previous</a>
                </li>

            <?php endif; ?>

            <?php  for($i= 1; $i <= $paginate['pages']; $i++): ?>
                <li class="page-item <?php echo $i== $paginate['pageno'] ? 'active' : ''; ?>"><a class="page-link" href="<?php echo url($base.'?page='.$i); ?>"><?php echo $i; ?></a></li>
            <?php endfor; ?>

            <?php if($paginate['pages'] == $paginate['pageno']): ?>
                <li class="page-item disabled">
                    <a class="page-link" href="#" >Next</a>
                </li>
            <?php else: ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo url($base.'?page='.($paginate['pageno'] + 1)); ?>">Next</a>
                </li>

            <?php endif; ?>
        </ul>
    </nav>
<?php endif; ?>
