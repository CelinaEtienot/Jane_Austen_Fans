const options = {
    method: 'GET',
    headers: {
      accept: 'application/json',
      Authorization: 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI0N2Q1MGRiNWJlNDVmNGM2ODRhNjVmOWQ3NmI1ZDMyOSIsInN1YiI6IjY2NTIyOTUyNWRlYzA4YTA2YzdmMzc0NiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.cS3jR4n8ohEh7_qqzVKDIiSgOS3TalHUwGKBpCy8ysE'
    }
  };
  
  fetch('https://api.themoviedb.org/3/authentication', options)
    .then(response => response.json())
    .then(response => console.log(response))
    .catch(err => console.error(err));