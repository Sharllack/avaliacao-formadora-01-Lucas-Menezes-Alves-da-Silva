document.querySelector(".menu").addEventListener("click", () => {
  const menu = document.querySelector(".menuIcon");
  const exercicios = document.querySelector(".ex");

  if (exercicios.classList.contains("exerciciosAppear")) {
    exercicios.classList.add("hide");

    exercicios.addEventListener(
      "animationend",
      () => {
        exercicios.classList.remove("exerciciosAppear", "hide");
        menu.src = "./imagens/menu_24dp_E8EAED_FILL0_wght400_GRAD0_opsz24.png";
      },
      { once: true }
    );
  } else {
    exercicios.classList.add("exerciciosAppear");

    requestAnimationFrame(() => {
      requestAnimationFrame(() => {
        menu.src = "./imagens/close_24dp_E8EAED_FILL0_wght400_GRAD0_opsz24.png";
      });
    });
  }
});
