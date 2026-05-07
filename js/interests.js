document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("showSearchForm");
  const queryInput = document.getElementById("showQuery");
  const statusNode = document.getElementById("apiStatus");
  const resultsNode = document.getElementById("apiResults");
  const quickButtons = document.querySelectorAll("[data-query]");

  if (!form || !queryInput || !statusNode || !resultsNode) {
    return;
  }

  const stripHtml = (value) => {
    const temp = document.createElement("div");
    temp.innerHTML = value || "";
    return temp.textContent || temp.innerText || "";
  };

  const renderResults = (query, items) => {
    resultsNode.innerHTML = "";

    if (!items.length) {
      statusNode.textContent = `"${query}" için sonuç bulunamadı. Farklı bir arama deneyebilirsin.`;
      resultsNode.innerHTML = `
        <article class="api-card">
          <div class="api-card-body">
            <h3>Sonuç yok</h3>
            <p>TVMaze üzerinde bu arama için içerik bulunamadı.</p>
          </div>
        </article>
      `;
      return;
    }

    statusNode.textContent = `"${query}" için ${items.length} sonuç gösteriliyor.`;

    items.forEach((item) => {
      const show = item.show;
      const summary = stripHtml(show.summary).slice(0, 180);
      const imageUrl = show.image?.original || show.image?.medium || "assets/film-radar.svg";
      const genres = Array.isArray(show.genres) && show.genres.length ? show.genres : ["Kategori yok"];
      const rating = show.rating?.average ? `${show.rating.average}/10` : "Puan yok";
      const year = show.premiered ? show.premiered.slice(0, 4) : "Tarih yok";
      const network = show.network?.name || show.webChannel?.name || "Platform bilgisi yok";

      const card = document.createElement("article");
      card.className = "api-card";
      card.innerHTML = `
        <div class="api-media">
          <img src="${imageUrl}" alt="${show.name} afişi">
        </div>
        <div class="api-card-body">
          <h3>${show.name}</h3>
          <div class="api-meta">
            <span>${year}</span>
            <span>${rating}</span>
            <span>${network}</span>
          </div>
          <p>${summary || "Bu içerik için özet bilgisi bulunamadı."}</p>
          <div class="api-meta">
            ${genres.map((genre) => `<span>${genre}</span>`).join("")}
          </div>
        </div>
      `;

      resultsNode.appendChild(card);
    });
  };

  const fetchShows = async (query) => {
    statusNode.textContent = `"${query}" için veriler yükleniyor...`;
    resultsNode.innerHTML = "";

    try {
      const response = await fetch(`https://api.tvmaze.com/search/shows?q=${encodeURIComponent(query)}`);
      if (!response.ok) {
        throw new Error("API yanıtı başarısız.");
      }

      const data = await response.json();
      renderResults(query, data.slice(0, 6));
    } catch (error) {
      statusNode.textContent = "TVMaze API verisine şu anda ulaşılamıyor.";
      resultsNode.innerHTML = `
        <article class="api-card">
          <div class="api-card-body">
            <h3>Bağlantı hatası</h3>
            <p>İnternet bağlantısını veya daha sonra yeniden denemeyi kontrol edebilirsin.</p>
          </div>
        </article>
      `;
    }
  };

  form.addEventListener("submit", (event) => {
    event.preventDefault();
    const query = queryInput.value.trim();
    if (query) {
      fetchShows(query);
    }
  });

  quickButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const query = button.dataset.query || "";
      queryInput.value = query;
      fetchShows(query);
    });
  });

  queryInput.value = "Black Mirror";
  fetchShows("Black Mirror");
});
