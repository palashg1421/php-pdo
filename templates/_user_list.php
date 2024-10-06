<?php
  $response = $this->app->read('', $data);
  if ($data['layout'] === 'grid') include '_layout_grid.php';
  else include '_layout_list.php';

  $pagination = $this->app->getPagination();
  if ($pagination['total_page'] > 1):
?>
    <div class="pull-right">
      <ul class="pagination">
        <?php for ($i = 1; $i <= $pagination['total_page']; $i++): ?>
          <li class="<?php if ($i == 1) echo 'active'; ?>">
            <a href="javascript:void(0);" data-offset="<?php echo ($i - 1) * LIMIT; ?>">
              <?php echo $i; ?>
            </a>
          </li>
        <?php endfor; ?>
      </ul>
    </div>
<?php endif; ?>