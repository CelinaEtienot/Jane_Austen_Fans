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
    const response = await fetch(`https://api.themoviedb.org/3/movie/${id}?api_key=${apiKey}`, options);
    const movie = await response.json();
    displayMovieData(movie);
  } catch (error) {
    console.error('Error fetching movie data:', error);
  }
}

function displayMovieData(movie) {
  const movieDetails = document.getElementById('movieDetails');
  movieDetails.innerHTML = `
    <h2>${movie.title}</h2>
    <p><strong>Release Date:</strong> ${movie.release_date}</p>
    <p><strong>Overview:</strong> ${movie.overview}</p>
    <img src="https://image.tmdb.org/t/p/w500/${movie.poster_path}" alt="${movie.title} poster">
  `;
}