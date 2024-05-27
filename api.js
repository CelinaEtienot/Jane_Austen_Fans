const url = 'https://imdb-top-100-movies.p.rapidapi.com/';
const lista= document.querySelector("#movies-list");
const options = {
	method: 'GET',
	headers: {
		'X-RapidAPI-Key': '70499d3174msh5c7bfbf026ccf27p114a63jsndaffe2639410',
		'X-RapidAPI-Host': 'imdb-top-100-movies.p.rapidapi.com'
	}
};

fetch(url,options)
    .then(response => response.json())
    .then(data => {
        data.forEach(movie =>{
            const li = document.createElement("li");
            li.innerHTML = `
            <h4>${movie.title}</h4>
            <p>${movie.description}</p>
            <img src="${movie.image}">
            
            
        `;
            lista.append(li);
        })
    })

