<script>
  /**
   * jQuery ready event
   */
  $().ready(function() {
    /**
     * Load user listing on page load
     */
    getUserList();
  });

  /**
   * Get user listing
   */
  function getUserList() {
    var url = '<?php echo Util::get_ajax_url(); ?>';
    var data = {
      action: 'get_user_list',
      form: $('#search-form').serializeArray()
    };
    $.ajax({
      url: url,
      data: data,
      type: 'post',
      cache: false,
      beforeSend: function() {
        $('.user-content').html(spin2x);
      },
      success: function(data) {
        $('.user-content').html(data);
      }
    });
  }

  /**
   * Load updated user listing on submiting search form
   */
  $(document).on('submit', '#search-form', function(e) {
    e.preventDefault();
    getUserList();
  });

  /**
   * Load default result on reset search form
   */
  $(document).on('click', '.reset-search', function(e) {
    $('#search-form').trigger("reset");
  });

  $(document).on('click', '.delete-user-btn', function(e) {
    var uid = $(this).data('uid');
    bootbox.confirm('Are you sure?', function(result) {
      if (result) {
        var url = '<?php echo Util::get_ajax_url(); ?>';
        var data = {
          action: 'delete_user',
          uid: uid
        };
        $.ajax({
          url: url,
          data: data,
          type: 'POST',
          cache: false,
          beforeSend: function() {},
          success: function(response) {
            if (response === '1')
              getUserList();
          }
        });
      }
    });
  });

  $(document).on('click', '.openUserModel', function(e) {
    var url = '<?php echo Util::get_ajax_url(); ?>';
    var data = {
      action: 'get_user_popup',
      uid: $(this).data('uid')
    };
    $.ajax({
      url: url,
      data: data,
      type: 'POST',
      cache: false,
      beforeSend: function() {},
      success: function(response) {
        $('#userModal .modal-body').html(response);
      }
    });
  });

  $(document).on('submit', '#userForm', function(e) {
    e.preventDefault();
    var url = '<?php echo Util::get_ajax_url(); ?>';
    var data = {
      action: 'process_user',
      form: $('#userForm').serializeArray()
    };
    $.ajax({
      url: url,
      data: data,
      type: 'POST',
      beforeSend: function() {},
      success: function(response) {
        $('#userModal').modal('toggle');
        if (response === '1')
          getUserList();
      }
    });
  });

  $(document).on('change', '#sorting', function(e) {
    jQuery('#sortBy').val(jQuery(this).val());
    getUserList();
  });

  $(document).on('change', '#layouting', function(e) {
    jQuery('#layout').val(jQuery(this).val());
    getUserList();
  });

  $(document).on('click', '.pagination li a', function(e) {
    $('#offset').val($(this).data('offset'));
    getUserList();
  });
</script>

<div class="top-filters">
  <form class="form-inline" action="/action_page.php">
    <div class="form-group">
      <select name="sorting" id="sorting" class="form-control">
        <option value="latest">Latest</option>
        <option value="earliest">Earliest</option>
      </select>
    </div>
    <div class="form-group">
      <select name="layouting" id="layouting" class="form-control">
        <option value="list">List</option>
        <option value="grid">Grid</option>
      </select>
    </div>
  </form>
</div>
<div class="content-wrapper">
  <div class="user-content"></div>
</div>