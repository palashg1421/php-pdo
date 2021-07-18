<div class="table-responsive">
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if($response):
                    foreach ($response as $result):
            ?>
                <tr>
                    <td><?php echo $result['user_name']; ?></td>
                    <td><?php echo $result['user_phone']; ?></td>
                    <td><?php echo $result['user_email'];?></td>
                    <td>
                        <?php
                            $house      = $result['ua_house'];
                            $locality   = $result['ua_locality'];
                            $landmark   = $result['ua_landmark'];
                            $city       = $result['ua_city'];
                            $state      = $result['ua_state'];
                            $pin        = $result['ua_post_code'];
                            if($result['ua_has_full_address'])
                                echo "$house - $locality,$landmark,<br>$city, $state - $pin";
                            else
                                echo '-';
                        ?>
                    </td>
                    <td class='text-center'>
                        <button class="btn btn-primary openUserModel" data-toggle="modal" data-target="#userModal" data-uid="<?php echo $result['user_id']; ?>">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </button>
                        <button class="btn btn-danger delete-user-btn" data-uid="<?php echo $result['user_id']; ?>">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>
                    </td>
                </tr>
            <?php endforeach; else: ?>
                <tr>
                    <td colspan="5">
                        <div class="text-center alert alert-danger">
                            <?php echo Util::get_messages('NO_RECORD_FOUND') ?>
                        </div>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>