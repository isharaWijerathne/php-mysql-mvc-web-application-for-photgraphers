<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Hi Malcolm</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <li class="nav-item">
          <a class="nav-link" href="<?php echo "../../admin/picture-category/create-new.php";?>" >Picture Category Management</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Picture Album Management
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo "../../admin/picture-album/create-new.php";?>">Create New Picture Album</a></li>
            <li><a class="dropdown-item" href="<?php echo "../../admin/picture-album/view-album-list.php";?>">View Picture Album</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Package Management
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo "../../admin/package/create-new-package.php";?>">Create New Package</a></li>
            <li><a class="dropdown-item" href="<?php echo "../../admin/package/package-details.php";?>">Package Details</a></li>
            
          </ul>
        </li>
       
      </ul>
      
    </div>
  </div>
</nav>