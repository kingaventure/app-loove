class MovieManager {
    constructor() {
        this.baseUrl = '/app-loove';
        this.currentFilmSpot = null;
        this.searchTimeout = null;
        this.init();
    }

    init() {
        // Event listeners
        document.getElementById('movieSearch').addEventListener('input', (e) => this.handleSearch(e));
        window.onclick = (event) => this.handleOutsideClick(event);
    }

    openModal(filmId) {
        document.getElementById('movieModal').style.display = 'block';
        document.getElementById('movieSearch').focus();
        this.currentFilmSpot = filmId;
    }

    closeModal() {
        document.getElementById('movieModal').style.display = 'none';
        document.getElementById('searchResults').innerHTML = '';
        document.getElementById('movieSearch').value = '';
    }

    handleOutsideClick(event) {
        const modal = document.getElementById('movieModal');
        if (event.target == modal) {
            this.closeModal();
        }
    }

    handleSearch(e) {
        const searchTerm = e.target.value;
        clearTimeout(this.searchTimeout);
        
        if (searchTerm.length >= 3) {
            this.searchTimeout = setTimeout(() => {
                this.searchMovies(searchTerm);
            }, 300);
        }
    }

    displaySearchResults(data) {
        const resultsDiv = document.getElementById('searchResults');
        resultsDiv.innerHTML = '';

        if (data.error) {
            resultsDiv.innerHTML = `<div class="search-result-item">${data.error}</div>`;
            return;
        }

        data.movies.forEach(movie => {
            const movieElement = document.createElement('div');
            movieElement.className = 'search-result-item';
            movieElement.innerHTML = this.createMovieHTML(movie);
            movieElement.onclick = () => this.selectMovie(movie);
            resultsDiv.appendChild(movieElement);
        });
    }

    searchMovies(searchTerm) {
    fetch(`index.php?component=movie&action=search&query=${encodeURIComponent(searchTerm)}`)
        .then(response => response.json())
        .then(data => this.displaySearchResults(data))
        .catch(error => {
            console.error('Erreur:', error);
            document.getElementById('searchResults').innerHTML = 
                '<div class="search-result-item">Une erreur est survenue lors de la recherche</div>';
        });
}

    createMovieHTML(movie) {
        return `
            <div style="display: flex; gap: 10px; align-items: center;">
                ${movie.poster_path 
                    ? `<img src="${movie.poster_path}" style="width: 50px; height: 75px; object-fit: cover;">` 
                    : '<div style="width: 50px; height: 75px; background: #ddd;"></div>'
                }
                <div>
                    <strong>${movie.title}</strong> (${movie.release_date})
                    <p style="margin: 5px 0; font-size: 0.9em;">${movie.overview.substring(0, 100)}...</p>
                </div>
            </div>
        `;
    }

    selectMovie(movie) {
        const formData = new FormData();
        formData.append('movieId', movie.id);
        formData.append('position', this.currentFilmSpot);

        fetch(`${this.baseUrl}/index.php?component=movie&action=save`, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.error) {
                console.error('Erreur:', data.error);
                return;
            }
            const filmSpot = document.querySelector(`.film:nth-child(${this.currentFilmSpot})`);
            filmSpot.innerHTML = `<img src="${movie.poster_path}" alt="${movie.title}">`;
            filmSpot.title = movie.title;
            this.closeModal();
        })
        .catch(error => {
            console.error('Erreur:', error);
        });
}
}