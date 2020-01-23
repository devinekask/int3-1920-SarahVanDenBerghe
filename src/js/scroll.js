{
  const mainNavLinks = document.querySelectorAll('.menu--longread ul li a');

  const handleScrollNav = () => {
    const fromTop = window.scrollY + (window.innerHeight / 2);

    mainNavLinks.forEach(link => {
      const section = document.querySelector(link.hash);

      if (section.offsetTop <= fromTop && section.offsetTop + section.offsetHeight > fromTop) {
        link.parentNode.classList.add('current');
      } else {
        link.parentNode.classList.remove('current');
      }
    });
  };

  const init = () => {
    window.addEventListener(`scroll`, handleScrollNav);
  };

  init();
}


