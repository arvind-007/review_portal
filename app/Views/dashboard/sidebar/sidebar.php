<div class="flex-column flex-shrink-0 p-3 text-white bg-dark vh-100" id="sidebar">
    <span class="fs-4">Articles</span>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item" id="tab-exams">
            <a href="<?php echo base_url("dashboard") ?>" class=" nav-link text-white">
                <i class="fas fa-users"> </i>
                dashboard
            </a>
        </li>
        <li class="nav-item" id="tab-exams">
            <a href="<?php echo base_url("users") ?>" class="nav-link text-white">
                <i class="fas fa-users"> </i>
                Users
            </a>
        </li>
        <li class="nav-item" id="tab-teachers">
            <a href="<?php echo base_url("Category") ?>" class="nav-link text-white">
                <i class="fas fa-users"></i>
                Category
            </a>
        </li>
        <li class="nav-item" id="tab-students">
            <a href="<?php echo base_url("article") ?>" class="nav-link text-white">
                <i class="fas fa-newspaper"> </i>
                Articles
            </a>
        </li>
        <li class="nav-item" id="tab-exams">
            <a href="<?php echo base_url('tag') ?>" class="nav-link text-white">
                <i class="fas fa-users"> </i>
                Tags
            </a>
        </li>
    </ul>
    <hr>
</div>