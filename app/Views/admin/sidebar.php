<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-4"> 
        <?php 
          $db = \Config\Database::connect();
          $query = $db->table('dashboard')
              ->select('*')
              ->orderBy('id', 'DESC')
              ->get();
          $dashboard = $query->getRow();
            if (!empty($dashboard)) : 
              echo "<div class='mr-2'>" 
                . "<i class='{$dashboard->icon}' aria-hidden='true'></i>" 
                . " " . $dashboard->name . "</div>";
            else : 
                echo "<p>No dashboard data found.</p>";
            endif; 
         
        ?>
        
      </span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">

    <li class="nav-item" >
      <a href="<?= site_url('admin/dashboard') ?>" style="color:white"
        class="nav-link 
          <?= (current_url() == site_url('admin/dashboard')) ? 'active' : '' ?>" 
          aria-current="page"
      >
        <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
        <i class="fa fa-university mr-1" aria-hidden="true"></i> Dashboard
      </a>
    </li>

    <li>
      <a href="<?= site_url('admin/categories') ?>" style="color:white" 
        class="nav-link 
          <?= 
          (
            current_url() == site_url('admin/categories') ||
            strpos(current_url(), site_url('admin/edit/category/')) === 0 

          ) ? 'active' : '' ?>">
        <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2">
          </use>
        </svg>
        <i class="fa fa-bookmark mr-1" aria-hidden="true"></i>Categories
      </a>
    </li>
    <li>
      <a href="<?= site_url('admin/posts') ?>" style="color:white"
      class="nav-link 
        <?= 
          (
            current_url() == site_url('admin/posts') || 
            current_url() == site_url('admin/add/post') ||
            strpos(current_url(), site_url('admin/show/post/')) === 0 ||
            strpos(current_url(), site_url('admin/edit/post/')) === 0
            )
          ? 'active' : '' ?>">
        <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
        <i class="fa fa-rss mr-1" aria-hidden="true"></i> Posts
      </a>
    </li>
    <li>
      <a href="<?= site_url('admin/trashed/posts') ?>" style="color:white"
      class="nav-link 
        <?= (current_url() == site_url('admin/trashed/posts')) ? 'active' : '' ?>">
        <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
        <i class="fa fa-robot mr-1" aria-hidden="true"></i> Trashed Posts
      </a>
    </li>


    <?php  
      $userModel = model('User');
      $user = $userModel->find(session()->get('id')); 

      if ($user['role'] == 0) {
          return redirect('/');
      } else if ($user['role'] == 1) { 
          // Add code here for role 1 (if any)
      } elseif($user['role'] == 2) {
          ?>
      <li>
          <a href="<?= site_url('admin/users') ?>" style="color:white"
          class="nav-link <?= (current_url() == site_url('admin/users')) ? 'active' : '' ?>">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
              <i class="fa fa-users mr-1" aria-hidden="true"></i> Users
          </a>
      </li>
      <li>
          <a href="<?= site_url('admin/settings/dashboard') ?>" style="color:white"
          class="nav-link <?= (current_url() == site_url('admin/settings/dashboard')) ? 'active' : '' ?>">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
              <i class="fa fa-cog mr-1" aria-hidden="true"></i>Dashboard Settings
          </a>
      </li>
      <li>
          <a href="<?= site_url('admin/settings/site') ?>" style="color:white"
          class="nav-link <?= (current_url() == site_url('admin/settings/site')) ? 'active' : '' ?>">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
              <i class="fa fa-flag mr-1" aria-hidden="true"></i>Site Settings
          </a>
      </li>
      <?php
      }else{
          return redirect('/');
      }
?>



    <li>
      <a href="<?= site_url('admin/mails') ?>" style="color:white" 
        class="nav-link 
          <?= 
          (
            current_url() == site_url('admin/mails') ||
            strpos(current_url(), site_url('admin/edit/mail/')) === 0 

          ) ? 'active' : '' ?>">
        <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2">
          </use>
        </svg>
        <i class="fa fa-envelope mr-1" aria-hidden="true"></i>Mails
      </a>
    </li>

    <hr>
    <li>
      <a href="/logout" style="color:white" class="nav-link">
        <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
        <i class="fa fa-arrow-left mr-1" aria-hidden="true"></i>Logout
      </a>
    </li>


    </ul>

  </div>