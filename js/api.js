const url = 'https://imdb-top-100-movies.p.rapidapi.com/';
const lista = document.querySelector("#movies-list");
const options = {
    method: 'GET',
    headers: {
        'X-RapidAPI-Key': '70499d3174msh5c7bfbf026ccf27p114a63jsndaffe2639410',
        'X-RapidAPI-Host': 'imdb-top-100-movies.p.rapidapi.com'
    }
};

fetch(url, options)
    .then(response => response.json())
    .then(data => {
        console.log('Datos completos de la API:', data);

        // Filtrar solo las películas románticas
        const romanticMovies = data.filter(movie => {
            console.log('Película siendo evaluada:', movie);
            
            // Verificar si movie.genre es un array
            if (!Array.isArray(movie.genre)) {
                console.log('Advertencia: movie.genre no es un array:', movie.genre);
                return false;
            }
            
            // Buscar géneros románticos en el array
            return movie.genre.some(genre => 
                 genre.toLowerCase().includes('romance')
            );
        });
        
        console.log('Películas románticas filtradas:', romanticMovies);

        if (romanticMovies.length === 0) {
            console.log('No se encontraron películas románticas');
            const message = document.createElement("p");
            message.textContent = "No se encontraron películas románticas.";
            lista.append(message);
        } else {
            romanticMovies.forEach(movie => {
                console.log('Creando elemento para la película:', movie);
                const li = document.createElement("li");
                li.classList.add("card");
                li.innerHTML = `
                    <img src="${movie.image}" alt="${movie.title}">
                    <div class="card-content">
                        <h4>${movie.title}</h4>
                        <p class="description">${movie.description}</p>
                        <p class="genres">Géneros: ${movie.genre.join(', ')}</p>
                    </div>
                `;
                lista.append(li);
            });
        }
    })
    .catch(error => {
        console.error('Error en la solicitud:', error);
        console.error('Stack trace:', error.stack);
    });