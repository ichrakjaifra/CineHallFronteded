document.addEventListener("DOMContentLoaded", function () {
  let token = localStorage.getItem("token");
  if (token) {
      fetchFilms();
  } else {
      window.location.href = "/login";
  }
});

function fetchFilms() {
  const conn = new XMLHttpRequest();
  let token = localStorage.getItem("token");
  console.log("Retrieved token:", token);

  conn.open("GET", "http://localhost:8000/api/film", true);
  conn.setRequestHeader("Authorization", "Bearer " + token);

  conn.onload = function () {
      if (conn.status === 200) {
          const films = JSON.parse(conn.responseText);
          displayFilms(films);
      } else {
          console.error("Error fetching films:", conn.statusText);
      }
  };

  conn.onerror = function () {
      console.error("Request failed");
  };

  conn.send();
}

function displayFilms(films) {
  const container = document.getElementById("films-container");
  if (!container) return;

  container.innerHTML = "";

  films.forEach((film) => {
      const filmCard = `
          <div class="film-card bg-white rounded-xl overflow-hidden shadow-lg">
              <img class="w-full h-64 object-cover" src="http://localhost:8000${film.image}" alt="${film.title}">
              <div class="p-4">
                  <h3 class="font-bold text-xl mb-2">${film.title}</h3>
                  <div class="flex items-center justify-between mb-3">
                      <span class="bg-primary/10 text-primary text-xs px-3 py-1 rounded-full">${film.genre}</span>
                      <span class="text-sm text-gray-600">${film.duration} min</span>
                  </div>
                  <div class="flex items-center mb-4">
                      <div class="rating text-accent">
                          ★★★★★
                      </div>
                      <span class="ml-2 text-sm text-gray-600">(2.3k reviews)</span>
                  </div>
                  <a href='http://localhost:8001/films/${film.id}'>
                      <button class="w-full bg-primary hover:bg-secondary text-white py-2 px-4 rounded-lg transition">
                          Voir détails
                      </button>
                  </a>
              </div>
          </div>
      `;
      container.innerHTML += filmCard;
  });
}

const detailButtons = document.querySelectorAll(".view-details");
detailButtons.forEach((btn) => {
    btn.addEventListener("click", () => {
        const filmId = btn.getAttribute("data-id");
        viewFilmDetails(filmId);
    });
});

function viewFilmDetails(filmId) {
    window.location.href = `/films/${filmId}`;
}