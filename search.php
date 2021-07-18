<div class="search-title text-center">
    <h4>Search</h4>
    <button type="button" class="navbar-toggle search-toggle" data-toggle="collapse" data-target="#search-form">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
</div>
<hr/>
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
    <div class="form-group">
        <input type="text" class="form-control" id="name" name="city" placeholder="City">
    </div>

    <input type="hidden" class="form-control" id="sortBy" name="sortBy" value="latest" />
    <input type="hidden" class="form-control" id="layout" name="layout" value="list" />
    <input type="hidden" class="form-control" id="limit" name="limit" value="2" />
    <input type="hidden" class="form-control" id="offset" name="offset" value="0" />

    <div class="btn-group">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-search"></i>
        </button>
        <button type="submit" class="btn btn-default reset-search">
            <i class="fa fa-times"></i>
        </button>
    </div>
</form> 
