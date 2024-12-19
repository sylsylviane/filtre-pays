let pays = 'France';

extraire_pays(pays);

let bouton_pays = document.querySelectorAll(".filtre__bouton button"); //
// Ajoute un écouteur d’événements pour chaque bouton de catégorie
for (const elm of bouton_pays) {
  elm.addEventListener("mousedown", function (e) {
    // Lorsqu’un bouton est cliqué, on récupère l’ID de la catégorie associée
    pays = e.target.dataset.name;
    console.log("Pays sélectionnée: ", pays);
    // Appel de la fonction pour extraire les cours de la catégorie sélectionnée
    extraire_pays(pays);
    // Lorsque le DOM est complètement chargé, on lance la récupération des cours (au cas où une catégorie serait pré-sélectionnée)
    document.addEventListener("DOMContentLoaded", extraire_pays);
    
  });
}

function extraire_pays(pays) {
  // Construction de l’URL pour appeler l’API REST en fonction de la catégorie
  fetch(
    `http://localhost/31w/wp-json/wp/v2/posts?search=${pays}&per_page=30`
  )
    // Conversion de la réponse en JSON
    .then((response) => response.json())
    .then((data) => {
      // Affiche les articles récupérés pour déboguer
      console.log("Destinations récupérés: ", data);
      afficherVoyages(data); // Appel à la fonction pour afficher les articles
    })
    .catch((error) =>
      console.error("Erreur lors de l’extraction des destinations: ", error)
    );
}

function afficherVoyages(articles) {
  const conteneurResultat = document.querySelector(".filtre__pays");
  conteneurResultat.classList.add("accordion");
  conteneurResultat.innerHTML = "";
  articles.forEach(function (element, index) {
    console.log(element);

    const template = `
         <div>
        <input
          type="checkbox"
          name="example_accordion" 
          id="section${index}"
          class="accordion__input"
        />
        <label for="section${index}" class="accordion__label">${element.title.rendered}</label>
        <div class="accordion__content">
          <p>Description</p>
          ${element.content.rendered}
        </div>
      </div> 
  `;

    conteneurResultat.insertAdjacentHTML("beforeend", template);
  });
}
