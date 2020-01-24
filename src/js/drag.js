{
  const luciferDrag = lucifer => {
    let timeOnFire = 0;
    lucifer.ondragstart = () => {
      getImage(document.querySelector(`.image-cta`));
      lucifer.style.opacity = 0;

      const timer = setInterval(() => {
        timeOnFire ++;
        getTimeOnFire(timeOnFire);
      }, 350);

      lucifer.ondragend = () => {
        lucifer.style.opacity = 1;
        clearInterval(timer);
      };
    };
  };

  const getTimeOnFire = time => {
    switch (time) {
    case 1:
      getImage(document.querySelector(`.image-1`));
      break;
    case 2:
      getImage(document.querySelector(`.image-2`));
      break;
    case 3:
      getImage(document.querySelector(`.image-3`));
      break;
    case 4:
      getImage(document.querySelector(`.image-8`));
      break;
    case 5:
      getImage(document.querySelector(`.image-6`));
      break;
    case 6:
      getImage(document.querySelector(`.image-7`));
      break;
    case 7:
      getImage(document.querySelector(`.image-4`));
      break;
    case 8:
      getImage(document.querySelector(`.image-5`));
      getImage(document.querySelector(`.line--present`));
      document.querySelector(`.lucifer`).style.visibility = 'hidden';
      document.querySelector(`.image-final`).style.opacity = 1;
      break;
    default:
      break;
    }
  };

  const getImage = image => {
    let time = 0;
    image.style.opacity = 1;

    setInterval(() => {
      time ++;
      fadeImage(time, image);
    }, 30);
  };

  const fadeImage = (time, image) => {
    if (time >= 100) {
      clearInterval(time);
    } else {
      image.style.opacity -= time / 100;
      time --;
    }
  };

  const init = () => {
    const lucifer = document.querySelector(`.lucifer`);

    if (lucifer) {
      luciferDrag(lucifer);
    }
  };
  init();
}
