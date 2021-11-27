<header class="header p-3 bg-white mb-3" style="height:62px">
    <!-- <button class="btn btn-outline-dark fas fa-sign-out-alt" id="btn-logout">Log Out</button> -->
    <div class="float-end ">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1"
            data-bs-toggle="dropdown" aria-expanded="false">

            <strong class="text-dark me-2"><?php echo $session->get('user_details')['name']; ?></strong>
            <img src="<?php echo $session->get('user_details')['photo']; ?>" onerror="load_default_img(this)"
                alt="<?php echo $session->get('user_details')['name']; ?>" width=" 32" height="32"
                class="rounded-circle" style="border:1px solid #ccc;">
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a href="<?php echo base_url('auth/logout') ?>" class="dropdown-item" id="btn-logout">LogOut</a></li>
        </ul>
    </div>
</header>