(function () {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    if (!el) return null;
    el = el.trim();
    try {
      if (all) {
        return [...document.querySelectorAll(el)];
      } else {
        return document.querySelector(el);
      }
    } catch (e) {
      return null;
    }
  };

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all);
    if (selectEl) {
      if (all) {
        selectEl.forEach(e => e.addEventListener(type, listener));
      } else {
        selectEl.addEventListener(type, listener);
      }
    }
  };

  /**
   * Easy on scroll event listener
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener);
  };

  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = select('#navbar .scrollto', true);

  const navbarlinksActive = () => {
    let position = window.scrollY + 200;

    navbarlinks.forEach(navbarlink => {
      if (!navbarlink.hash) return;

      // ✅ FIX: remove trailing slash
      let hash = navbarlink.hash.replace(/\/$/, '');
      let section = select(hash);

      if (!section) return;

      if (
        position >= section.offsetTop &&
        position <= (section.offsetTop + section.offsetHeight)
      ) {
        navbarlink.classList.add('active');
      } else {
        navbarlink.classList.remove('active');
      }
    });
  };

  window.addEventListener('load', navbarlinksActive);
  onscroll(document, navbarlinksActive);

  /**
   * Scrolls to an element with header offset
   */
  const scrollto = (el) => {
    let header = select('#header');
    if (!header) return;

    let offset = header.offsetHeight;
    if (!header.classList.contains('fixed-top')) {
      offset += 70;
    }

    let element = select(el);
    if (!element) return;

    let elementPos = element.offsetTop;
    window.scrollTo({
      top: elementPos - offset,
      behavior: 'smooth'
    });
  };

  /**
   * Header fixed top on scroll
   */
  let selectHeader = select('#header');
  let selectTopbar = select('#topbar');

  if (selectHeader) {
    const headerScrolled = () => {
      if (window.scrollY > 100) {
        selectHeader.classList.add('header-scrolled');
        if (selectTopbar) selectTopbar.classList.add('topbar-scrolled');
      } else {
        selectHeader.classList.remove('header-scrolled');
        if (selectTopbar) selectTopbar.classList.remove('topbar-scrolled');
      }
    };
    window.addEventListener('load', headerScrolled);
    onscroll(document, headerScrolled);
  }

  /**
   * Back to top button
   */
  let backtotop = select('.back-to-top');
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active');
      } else {
        backtotop.classList.remove('active');
      }
    };
    window.addEventListener('load', toggleBacktotop);
    onscroll(document, toggleBacktotop);
  }

  /**
   * Mobile nav toggle
   */
  on('click', '.mobile-nav-toggle', function () {
    select('#navbar').classList.toggle('navbar-mobile');
    this.classList.toggle('bi-list');
  });

  /**
 * Mobile nav close button (inside UL)
 */
on('click', '.nav-close', function () {
  let navbar = select('#navbar');
  let navbarToggle = select('.mobile-nav-toggle');

  if (navbar) navbar.classList.remove('navbar-mobile');

  // Toggle icon back to list (safe way)
  if (navbarToggle) {
    navbarToggle.classList.add('bi-list');
    navbarToggle.classList.remove('bi-x');
  }
});


  /**
   * Mobile nav dropdowns activate
   */
  on('click', '.navbar .dropdown > a', function (e) {
    if (select('#navbar').classList.contains('navbar-mobile')) {
      e.preventDefault();
      this.nextElementSibling.classList.toggle('dropdown-active');
    }
  }, true);

  /**
   * Scroll with offset on links with .scrollto
   */
  on('click', '.scrollto', function (e) {
    let hash = this.hash.replace(/\/$/, '');
    if (select(hash)) {
      e.preventDefault();

      let navbar = select('#navbar');
      if (navbar.classList.contains('navbar-mobile')) {
        navbar.classList.remove('navbar-mobile');
        let navbarToggle = select('.mobile-nav-toggle');
        navbarToggle.classList.toggle('bi-list');
        navbarToggle.classList.toggle('bi-x');
      }
      scrollto(hash);
    }
  }, true);

  /**
   * Scroll on page load with hash
   */
  window.addEventListener('load', () => {
    if (window.location.hash) {
      let hash = window.location.hash.replace(/\/$/, '');
      if (select(hash)) {
        scrollto(hash);
      }
    }
  });

  /**
   * Preloader
   */
  let preloader = select('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove();
    });
  }

  /**
   * Clients Slider
   */
  new Swiper('.clients-slider', {
    speed: 400,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    breakpoints: {
      320: { slidesPerView: 2, spaceBetween: 40 },
      480: { slidesPerView: 3, spaceBetween: 60 },
      640: { slidesPerView: 4, spaceBetween: 80 },
      992: { slidesPerView: 6, spaceBetween: 120 }
    }
  });

  /**
   * Animation on scroll
   */
  window.addEventListener('load', () => {
    AOS.init({
      duration: 1000,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    });
  });

})();
