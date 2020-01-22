{

  const init = () => {
    const lucifer = document.querySelector(`.lucifer`);

    if (lucifer) {
      lucifer.ondragstart = e => {
        const lastTimestamp = Date.now();

        lucifer.ondragend = e => {
          const timeTaken = Date.now() - lastTimestamp;
          console.log(timeTaken / 1000);
        };
      };
    }
  };

  init();
}
