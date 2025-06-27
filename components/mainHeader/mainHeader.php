<nav class="navbar">
  <div class="nav__toggle" id="navToggle">
    <div>
      <i class="fa-solid fa-bars" style="color: #ffffff;"></i>
    </div>
  </div>

  <ul class="nav__list" id="navList">
    <li><a href="/hnd/public/index.php">Home</a></li>
    <li><a href="/hnd/public/iamMalcom.php">I'm Malcom</a></li>
    <li><a href="/hnd/public/gallery/index.php">Gallery</a></li>
    <li><a href="/hnd/public/my-packages/index.php">My Packages</a></li>
    <li><a href="/hnd/public/book-your-day/index.php">Book Your Day</a></li>
  </ul>
</nav>

<script>

  //Nav btn

  const toggleBtn = document.getElementById('navToggle');
  const navList = document.getElementById('navList');

  toggleBtn.addEventListener('click', () => {
    navList.classList.add('show');
    toggleBtn.classList.add('hide');
  });

  const navLinks = navList.querySelectorAll('a');
  navLinks.forEach(link => {
    link.addEventListener('click', () => {
      navList.classList.remove('show');
      toggleBtn.classList.remove('hide');
    });
  });
</script>

