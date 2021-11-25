<header class="header p-3 bg-white mb-3" style="height:62px">
    <!-- <button class="btn btn-outline-dark fas fa-sign-out-alt" id="btn-logout">Log Out</button> -->
    <div class="float-end ">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1"
            data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?php $photo = $session->get('user_details')['photo'];
echo base_url("uploaded_img/" . ($photo ? $photo : "avatar7.png"));
?>" alt="" width=" 32" height="32" class="rounded-circle me-2">
            <strong class="text-dark"><?php echo $session->get('user_details')['name']; ?></strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a href="<?php echo base_url('auth/logout') ?>" class="dropdown-item" id="btn-logout">Sign out</a></li>
        </ul>
    </div>
</header>