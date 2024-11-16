document.addEventListener("DOMContentLoaded", () => {
  const authErrorElement = document.querySelector(".authError");
  const load = document.querySelector(".bgLoad");

  if (
    authErrorElement &&
    authErrorElement.textContent === "Login Efetuado Com Sucesso."
  ) {
    authErrorElement.style.color = "white";
    load.style.display = "block";

    setTimeout(() => {
      window.location.href = "https://login.unisuam.edu.br/login";
    }, 2000);
  }
});

$(document).ready(function () {
  $(".form").on("submit", function (event) {
    event.preventDefault();

    var formData = new FormData(this);

    $.ajax({
      url: "",
      method: "POST",
      data: formData,
      processData: false,
      contentType: false,
      dataType: "json",
      beforeSend: function () {
        $(".bgLoad").show();
      },
      success: function (response) {
        $(".bgLoad").hide();
        const authErrorElement = $(".authError");
        authErrorElement.text(response.message);

        if (response.success) {
          authErrorElement.css("color", "white");

          setTimeout(() => {
            window.location.href = "https://login.unisuam.edu.br/login";
          }, 2000);
        } else {
          authErrorElement.css("color", "red");
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error("Erro na requisição AJAX:", textStatus, errorThrown);
        $(".bgLoad").hide();
      },
    });
  });
});
