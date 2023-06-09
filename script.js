    var homeLink = document.querySelector('#menu-items a[href="#home"]');
    var topLink = document.querySelector('#menu-items a[href="#recipe-recommendation"]');
    var middleLink = document.querySelector('#menu-items a[href="#popular-recipes"]');
    var bottomLink = document.querySelector('#menu-items a[href="#bottom"]');

    homeLink.addEventListener('click', function(event) {
      event.preventDefault();
      scrollToSection('home');
    });

    topLink.addEventListener('click', function(event) {
      event.preventDefault();
      scrollToSection('recipe-recommendation');
    });

    middleLink.addEventListener('click', function(event) {
      event.preventDefault();
      scrollToSection('popular-recipes');
    });

    bottomLink.addEventListener('click', function(event) {
      event.preventDefault();
      scrollToSection('bottom');
    });

    // 스크롤 시 활성 메뉴 강조 표시
    window.addEventListener('scroll', function() {
      var scrollPosition = window.pageYOffset || document.documentElement.scrollTop;

      if (scrollPosition < document.getElementById('recipe-recommendation').offsetTop) {
        setActiveMenu('home');
      } else if (scrollPosition < document.getElementById('popular-recipes').offsetTop) {
        setActiveMenu('recipe-recommendation');
      } else if (scrollPosition < document.getElementById('bottom').offsetTop) {
        setActiveMenu('popular-recipes');
      } else {
        setActiveMenu('bottom');
      }
    });

    // 지정된 섹션으로 스크롤 이동
    function scrollToSection(sectionId) {
      var section = document.getElementById(sectionId);
      section.scrollIntoView({ behavior: 'smooth' });
    }

    // 활성 메뉴 강조 표시
    function setActiveMenu(menuId) {
      var activeMenu = document.querySelector('#menu-items a.active');
      if (activeMenu) {
        activeMenu.classList.remove('active');
      }
      document.querySelector('#menu-items a[href="#' + menuId + '"]').classList.add('active');
    }

    window.addEventListener('DOMContentLoaded', () => {
      const menuButton = document.getElementById('menu-button');
      const menuItems = document.getElementById('menu-items');

      menuButton.addEventListener('click', () => {
        menuItems.classList.toggle('open');
      });
    });
