<form class="collapse navbar-collapse" action="" method="post" id="search-form">
  <div class="form-group">
    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="name" name="phone" placeholder="Phone">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="name" name="email" placeholder="Email">
  </div>

  <input type="hidden" class="form-control" id="sortBy" name="sortBy" value="latest" />
  <input type="hidden" class="form-control" id="layout" name="layout" value="list" />
  <input type="hidden" class="form-control" id="limit" name="limit" value="2" />
  <input type="hidden" class="form-control" id="offset" name="offset" value="0" />

  <div class="btn-group btn-block">
    <button type="submit" class="btn btn-primary">Search</button>
    <button type="submit" class="btn btn-default reset-search">Reset</button>
  </div>
</form>