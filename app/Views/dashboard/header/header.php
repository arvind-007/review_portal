<header class="header p-3 bg-white mb-3" style="height:62px">
    <!-- <button class="btn btn-outline-dark fas fa-sign-out-alt" id="btn-logout">Log Out</button> -->
    <div class="float-end ">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1"
            data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo base_url(); ?>/uploaded_img/avatar7.png" alt="" width="32" height="32"
                class="rounded-circle me-2">
            <strong class="text-dark"><?php
//  echo $_SESSION['user_details']['fname'] . " " . $_SESSION['user_details']['lname'];
?></strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li>
                <hr class=" dropdown-divider">
            </li>
            <li><a class="dropdown-item" id="btn-logout">Sign out</a></li>
        </ul>
    </div>
</header>