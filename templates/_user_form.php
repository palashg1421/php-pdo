<?php
$mode = 'create';
$id = '';
$name = '';
$phone = '';
$email = '';
$city = '';
if (isset($post['uid']) && !empty($post['uid'])) {
  $response = $this->app->read($post['uid']);
  if ($response) {
    $mode = 'edit';
    $name = $response['user_name'];
    $phone = $response['user_phone'];
    $email = $response['user_email'];
    $id = $response['user_id'];
  }
}
?>
<form class="form-horizontal" action="" method="post" id="userForm">
  <input type="hidden" value="<?php echo $mode; ?>" name="mode" />
  <input type="hidden" value="<?php echo $id; ?>" name="uid" />
  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Name:</label>
    <div class="col-sm-10">
      <input
        type="text"
        id="name"
        name="user_name"
        class="form-control"
        placeholder="Enter your name"
        value="<?php echo $name; ?>"
      >
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="phone">Phone:</label>
    <div class="col-sm-10">
      <input
        type="text"
        id="phone"
        name="user_phone"
        class="form-control"
        placeholder="Enter your phone"
        value="<?php echo $phone; ?>"
      >
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10">
      <input
        type="text"
        id="email"
        name="user_email"
        class="form-control"
        placeholder="Enter your email"
        value="<?php echo $email; ?>"
      >
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary" name="submit">
        <?php if ($mode === 'create') echo 'Add';
        else echo 'Update'; ?>
      </button>
    </div>
  </div>
</form>