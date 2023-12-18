const scrollDown = document.querySelector('aside');


setTimeout(() => {
  const showScroll = document.querySelector('aside');

  showScroll.style.visibility = 'visible';

}, 3200);

window.addEventListener('wheel', handleScroll);

function handleScroll(event) {
  scrollDown.style.visibility = "hidden";
  console.log(scrollY);


  if (scrollY > 0) {
    setTimeout(() => {
      const article1 = document.querySelector('#article1');
      article1.style.opacity = 1;
    }, 500);

  }

  if (scrollY > 150 && scrollY < 250) {
    setTimeout(() => {
      const article2 = document.querySelector('#article2');
      article2.style.opacity = 1;
    }, 500);
  }

  if (scrollY > 251 && scrollY < 400) {
    setTimeout(() => {
      const article3 = document.querySelector('#article3');
      article3.style.opacity = 1;
    }, 500);
  }
  if (scrollY > 401 && scrollY < 600) {
    setTimeout(() => {
      const article4 = document.querySelector('#article4');
      article4.style.opacity = 1;
    }, 500);
  }

}


// var scrollPos = 0;
// var oldDeltaY = scrollY;
// window.addEventListener('wheel', scrollCount);
// function scrollCount (event, scrollPos, oldDeltaY) {

// if (scrollY > oldDeltaY) {
//   scrollPos++;
// }
// else {
//   scrollPos = scrollPos -1;
// }
//   return scrollPos;
// }
// console.log(scrollPos);