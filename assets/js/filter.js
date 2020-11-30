get_Movies();

const mainContainer = document.getElementById("main-container");
var slideBar = mainContainer.innerHTML;

document.getElementById("buscar").addEventListener("click", function () {
  document.getElementById("search").classList.toggle("d-none");
});

document.getElementById("search").addEventListener("input", async function () {
  const valueSearch = document.getElementById("search").value;

  if (valueSearch == "") {
    mainContainer.innerHTML = slideBar;
    get_Movies();
  } else {
    const options = {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
    };
    const request = await fetch(`/Final_TPI/filter.php?movies=${valueSearch}`);
    const selectOptions = await request.text();
    mainContainer.innerHTML = selectOptions;

    let likesCount = document.querySelectorAll(".like-count");
    likesCount.forEach((likeBtn) =>
      likeBtn.addEventListener("click", likeOrDislike)
    );
  }
});

(() => {
  document
    .getElementById("inputGroupSelect04")
    .addEventListener("change", async (event) => {
      document.getElementById("defaultCheck1").checked = 0;
      get_Movies();
    });

  document
    .getElementById("defaultCheck1")
    .addEventListener("change", async function () {
      if (this.checked) {
        var popularity = document.getElementById("defaultCheck1").value;
        get_Movies(popularity);
      } else {
        get_Movies();
      }
    });
})();

async function get_Movies(popularity) {
  const resultMovies = document.getElementById("results-movies");
  var valueSearch = document.getElementById("search").value;
  var orderSelect = document.getElementById("inputGroupSelect04").value;

  if (popularity == undefined) {
    popularity = 0;
  }
  const options = {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
  };
  const request = await fetch(
    `/Final_TPI/filter.php?movies=${valueSearch}&orderBy=${orderSelect}&popularity=${popularity}`
  );
  const selectOptions = await request.text();
  resultMovies.innerHTML = selectOptions;

  let likesCount = document.querySelectorAll(".like-count");
  console.log(likesCount.length);
  likesCount.forEach((likeBtn) =>
    likeBtn.addEventListener("click", likeOrDislike)
  );
}

const likeOrDislike = async (event) => {
  event.preventDefault();

  let elementoNombre = event.target.tagName;
  let elementoPresionado = null;

  if (elementoNombre == "svg" || elementoNombre == "SPAN") {
    elementoPresionado = event.target.parentElement;
  } else if (elementoNombre == "path") {
    elementoPresionado = event.target.parentElement.parentElement;
  } else if (elementoNombre == "A") {
    elementoPresionado = event.target;
  }

  let datos = new FormData();
  datos.append("idPelicula", elementoPresionado.getAttribute("data-idpelicula"));
  datos.append("idUsuario", elementoPresionado.getAttribute("data-idusuario"));
  datos.append("estado", elementoPresionado.getAttribute("data-estado"));

  const options = {
    method: "POST",
    body: datos,
  };
  
  const peticion = await fetch("/Final_TPI/like.php", options);
  const response = await peticion.json();

  if (response.result == "exito") {
    let numLikes = response.numLikes;

    if (response.accion == "like") {
      let likeElements = document.querySelectorAll(`[data-idpelicula="${elementoPresionado.getAttribute("data-idpelicula")}"]`);
      likeElements.forEach(likeBtn => {
        likeBtn.setAttribute("data-estado", "like");
        likeBtn.innerHTML =  `<i class='fas fa-heart'></i> <span class="text-warning">${numLikes}</span>`;
      });  
      
    } else {
      let likeElements = document.querySelectorAll(`[data-idpelicula="${elementoPresionado.getAttribute("data-idpelicula")}"]`);
      likeElements.forEach(likeBtn => {
        likeBtn.setAttribute("data-estado", "dislike");
        likeBtn.innerHTML =  `<i class='far fa-heart'></i> <span class="text-warning">${numLikes}</span>`;
      }); 
    }
  }
};