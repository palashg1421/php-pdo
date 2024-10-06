<div class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="javascript:void(0);">PDO</a>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-menu">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse nav-menu">
      <ul class="nav navbar-nav navbar-right">
        <li class="active">
          <a href="<?php echo Util::get_base_url(); ?>">List</a>
        </li>
        <li data-toggle="modal" data-target="#userModal">
          <a href="javascript:void(0);" class="openUserModel">Add</a>
        </li>
      </ul>
    </div>
  </div>
</div>