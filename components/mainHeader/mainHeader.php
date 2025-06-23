<!-- <nav>
    <ul class="nav__list">
        <li>
            <a href="/hnd/public/index.php">Home</a>
        </li>
        <li>
            <a href="">I'm Malcom</a>
        </li>
        <li>
            <a href="/hnd/public/gallery/index.php">Gallery</a>
        </li>
        <li>
            <a href="/hnd/public/my-packages/index.php">My Packages</a>
        </li>
        <li>
            <a href="/hnd/public/book-your-day/index.php">Book Your Day</a>
        </li>
        <li>
            <a href="">We are hiring</a>
        </li>
    </ul>
</nav> -->

<nav class="navbar">
  <div class="nav__toggle" id="navToggle">
    <i class="fas fa-bars"></i>
  </div>

  <ul class="nav__list" id="navList">
    <li><a href="/hnd/public/index.php">Home</a></li>
    <li><a href="#">I'm Malcom</a></li>
    <li><a href="/hnd/public/gallery/index.php">Gallery</a></li>
    <li><a href="/hnd/public/my-packages/index.php">My Packages</a></li>
    <li><a href="/hnd/public/book-your-day/index.php">Book Your Day</a></li>
    <li><a href="#">We are hiring</a></li>
  </ul>
</nav>

<script>
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

