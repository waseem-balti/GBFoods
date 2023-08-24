const navIconEl = document.querySelector('.NaviCons');
const navCloseEl = document.querySelector('.NaviGo');
const navList = document.querySelector('.NaviList');
const navBgOverlayEl = document.querySelector('.NaviBG__Oly');

const navOpen = () => {
  document.body.style = 'visibility: visible; height: 100vh; width: 100vw; overflow: hidden; z-index:1001; background-color: rgba(5, 50, 90, 0.3);'
  navBgOverlayEl.classList.add('active');
  navList.classList.add('show');
}

const navClose = () => {
  navList.classList.remove('show');
  navBgOverlayEl.classList.remove('active');
  document.body.style = 'visibility: visible; height: initial; width: 100%; overflow-x: hidden;';
}

navIconEl.addEventListener('click', navOpen);
navCloseEl.addEventListener('click', navClose);
navBgOverlayEl.addEventListener('click', navClose);

AOS.init({
  offset: 200,
  delay: 100,
  duration: 400,
  easing: 'ease',
  once: false,
  achorPlacement: 'top-bottom'
})