{

  const getLine = svg => {
    const path = svg.querySelector('.path');
    const pathActive = svg.querySelector('#red');
    const pathLength = path.getTotalLength();

    pathActive.style.strokeDasharray = pathLength * 1.2;
    pathActive.style.strokeDashoffset = pathLength;

    window.addEventListener(`scroll`, handleScrollLine);

  };

  const handleScrollLine = () => {

    const $svgLines = document.querySelectorAll(`.line`);

    if ($svgLines) {
      $svgLines.forEach(svg => {
        const canvasHeight = svg.clientHeight;
        const canvasContainer = svg.parentNode;
        const topY = canvasContainer.offsetTop;

        const path = svg.querySelector('.path');
        const pathActive = svg.querySelector('#red');
        const pathLength = path.getTotalLength();

        const scrollPercentage = ((document.documentElement.scrollTop - topY) + canvasHeight / 2) / canvasHeight;
        const drawLength = pathLength * scrollPercentage;
        pathActive.style.strokeDashoffset = pathLength - drawLength;
      });
    }
  };

  const init = () => {
    const $svgLines = document.querySelectorAll(`.line`);

    if ($svgLines) {
      $svgLines.forEach(svg => {
        getLine(svg);
      });
    }
  };

  init();
}
