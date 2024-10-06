<?php
if ($response):
  foreach ($response as $result):
?>
    <div class="col-sm-4 mb-3">
      <div class="card">
        <img
          src="<?php echo Util::get_base_url() . 'assets/imgs/avatar.png' ?>"
          class="card-img-top img-responsive"
          alt="<?php echo $result['user_name']; ?>" />
        <div class="card-body">
          <h4 class="card-title">
            <?php echo $result['user_name']; ?>
          </h4>
          <div class="card-text mb-2">
            <div class="info-wrapper">
              <div class="title">Phone</div>
              <div class="value">
                <?php echo !empty($result['user_phone']) ? $result['user_phone'] : '-' ?>
              </div>
            </div>
            
            <div class="info-wrapper">
              <div class="title">Email</div>
              <div class="value">
                <a href="mailto:<?php echo !empty($result['user_email']) ? $result['user_email'] : '-' ?>">
                  <?php echo !empty($result['user_email']) ? $result['user_email'] : '-' ?>
                </a>
              </div>
            </div>
            
            <div class="info-wrapper">
              <div class="title">City</div>
              <div class="value"><?php echo !empty($result['user_city']) ? $result['user_city'] : '-' ?></div>
            </div>
          </div>
          <div class="card-action">
            <div class="btn-group">
              <a
                href="javascript:void(0);"
                class="btn btn-primary openUserModel"
                data-toggle="modal"
                data-target="#userModal"
                data-uid="<?php echo $result['user_id']; ?>">
                Edit
              </a>
              <a
                href="javascript:void(0);"
                class="btn btn-danger delete-user-btn"
                data-uid="<?php echo $result['user_id']; ?>">
                Delete
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php
  endforeach;
else:
  ?>
  <div class="text-center alert alert-danger">
    <?php echo Util::get_messages('NO_RECORD_FOUND') ?>
  </div>
<?php endif; ?>