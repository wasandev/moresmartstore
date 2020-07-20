// Navbar Toggle
document.addEventListener('DOMContentLoaded', function () {

    // Get all "navbar-burger" elements
    var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
    var $footerSigns = Array.prototype.slice.call(document.querySelectorAll('.footer-sign'), 0);
    var $sidebarSigns = Array.prototype.slice.call(document.querySelectorAll('.sidebar-sign'), 0);
    var $pageSigns = Array.prototype.slice.call(document.querySelectorAll('.page-sign'), 0);

    // Check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {

      // Add a click event on each of them
      $navbarBurgers.forEach(function ($el) {
        $el.addEventListener('click', function () {

          // Get the "main-nav" element
          var $target = document.getElementById('main-nav');

          // Toggle the class on "main-nav"
          $target.classList.toggle('hidden');

        });
      });
    }

    if ($footerSigns.length > 0) {

        // Add a click event on each of them
        $footerSigns.forEach(function ($el) {
          $el.addEventListener('click', function () {

            // Get the "main-nav" element
            var $target = document.getElementById('footer-nav');

            // Toggle the class on "main-nav"
            $target.classList.toggle('hidden');

          });
        });
    }
    if ($sidebarSigns.length > 0) {

        // Add a click event on each of them
        $sidebarSigns.forEach(function ($el) {
          $el.addEventListener('click', function () {

            // Get the "main-nav" element
            var $target = document.getElementById('sidebar-nav');

            // Toggle the class on "main-nav"
            $target.classList.toggle('hidden');

          });
        });
    }
    if ($pageSigns.length > 0) {

        // Add a click event on each of them
        $pageSigns.forEach(function ($el) {
          $el.addEventListener('click', function () {

            // Get the "main-nav" element
            var $target = document.getElementById('pages-nav');

            // Toggle the class on "main-nav"
            $target.classList.toggle('hidden');

          });
        });
    }
  });
