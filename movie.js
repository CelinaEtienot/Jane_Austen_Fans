const apiKey = '47d50db5be45f4c684a65f9d76b5d329';
const accessToken = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI0N2Q1MGRiNWJlNDVmNGM2ODRhNjVmOWQ3NmI1ZDMyOSIsInN1YiI6IjY2NTIyOTUyNWRlYzA4YTA2YzdmMzc0NiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.cS3jR4n8ohEh7_qqzVKDIiSgOS3TalHUwGKBpCy8ysE';

document.addEventListener('DOMContentLoaded', () => {
  const movieId = getMovieIdFromFilename();

  if (movieId) {
    fetchMovieData(movieId);
  }
});

function getMovieIdFromFilename() {
  const path = window.location.pathname;
  const filename = path.substring(path.lastIndexOf('/') + 1);
  const match = filename.match(/movie-(\d+)\.html/);
  return match ? match[1] : null;
}

async function fetchMovieData(id) {
  const options = {
    method: 'GET',
    headers: {
      accept: 'application/json',
      Authorization: `Bearer ${accessToken}`
    }
  };

  try {
    const response = await fetch(`https://api.themoviedb.org/3/movie/${id}?api_key=${apiKey}&append_to_response=credits,videos,images`, options);
    const movie = await response.json();
    displayMovieData(movie);
  } catch (error) {
    console.error('Error obteniendo la información de la película:', error);
  }
}

function displayMovieData(movie) {
    console.log(movie);
    
    const movieDetails = document.getElementById('movieDetails');
    const trailer = movie.videos.results.find(video => video.type === 'Trailer' && video.site === 'YouTube');
    const trailerIframe = trailer ? `<iframe width="560" height="315" src="https://www.youtube.com/embed/${trailer.key}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>` : '<p>Trailer not available</p>';


  
    const additionalImages = movie.images.backdrops.map((image, index) => `<div class="carousel-item ${index === 0 ? 'active' : ''}">
      <img src="https://image.tmdb.org/t/p/w500/${image.file_path}" class="d-block w-100" alt="${movie.title} additional image">
     </div>
     `).join('');
  
    movieDetails.innerHTML = `
    <div class="movie-content">
    <div class="details">
      <h2>${movie.title}</h2>
      <p><strong>Fecha de estreno:</strong> ${movie.release_date}</p>
      <p><strong>Overview:</strong> ${movie.overview}</p>
      <p><strong>IMDb:</strong> <a href="https://www.imdb.com/title/${movie.imdb_id}" target="_blank">${movie.title}</a></p>
      <p><strong>Rating:</strong> ${movie.vote_average} / 10</p>
      <p><strong>Director:</strong> ${movie.credits.crew.find(person => person.job === 'Director').name}</p>
      <p><strong>Elenco:</strong> ${movie.credits.cast.slice(0, 5).map(actor => actor.name).join(', ')}</p>
    </div>
    <div class="poster">
      <img src="https://image.tmdb.org/t/p/w500/${movie.poster_path}" alt="${movie.title} poster">
    </div>
  </div>
  <div class="media-section">
    <div class="trailer">
      <p><strong>Trailer:</strong></p>
      ${trailerIframe}
    </div>
    <div class="carousel-container">
      <strong>Imágenes:</strong>
      <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
          ${additionalImages}
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>
  
    `;
}