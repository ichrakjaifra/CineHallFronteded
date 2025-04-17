<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film Preview</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2563EB',    // Bleu vif
                        secondary: '#1E40AF',  // Bleu foncé
                        accent: '#F59E0B',     // Orange
                        dark: '#1F2937',       // Gris foncé
                        light: '#F3F4F6'      // Gris clair
                    },
                    fontFamily: {
                        sans: ['Montserrat', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #2563EB 0%, #1E40AF 100%);
        }
        .film-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            transform-origin: center bottom;
        }
        .film-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .blurred-bg {
            filter: blur(8px);
            opacity: 0.3;
        }
    </style>
</head>

<body class="font-sans bg-light text-dark min-h-screen">
    <!-- Header -->
    <header class="gradient-bg text-white shadow-xl">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <svg class="h-8 w-8 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h18M3 16h18" />
                </svg>
                <h1 class="text-2xl font-bold">Ciné<span class="text-accent">Collection</span></h1>
            </div>
            <nav class="hidden md:flex space-x-8">
                <a href="#" class="font-semibold hover:text-accent transition">Accueil</a>
                <a href="#" class="font-semibold hover:text-accent transition">Films</a>
                <a href="#" class="font-semibold hover:text-accent transition">Séances</a>
                <a href="#" class="font-semibold hover:text-accent transition">Contact</a>
            </nav>
            <div class="flex items-center space-x-4">
                <button class="md:hidden text-white">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- Film Hero Section -->
        <div class="relative rounded-xl overflow-hidden mb-8 shadow-lg">
            <!-- Background Image (Blurred) -->
            <div id="film-bg" class="absolute inset-0 bg-cover bg-center blurred-bg"></div>

            <!-- Content -->
            <div class="relative z-10 p-6 md:p-8 flex flex-col md:flex-row items-start bg-white/90 backdrop-blur-sm">
                <!-- Poster -->
                <div class="flex-shrink-0 mb-6 md:mb-0 md:mr-8 w-full md:w-auto">
                    <img id="film-image" src="http://localhost:8000/storage/placeholder.jpg" alt="Film poster"
                        class="w-full md:w-80 h-auto rounded-lg shadow-lg film-card">
                </div>

                <!-- Film Info -->
                <div class="flex-1">
                    <h1 id="film-title" class="text-3xl md:text-4xl font-bold text-dark mb-2">Loading ...</h1>

                    <div class="flex flex-wrap items-center mb-6">
                        <span id="film-genre"
                            class="px-3 py-1 bg-blue-100 text-primary text-sm font-medium rounded-full mr-3 mb-2">Genre</span>
                        <div class="flex items-center mr-4 mb-2">
                            <i class="fas fa-clock text-primary mr-2"></i>
                            <span id="film-duration" class="text-gray-700">Loading ...</span>
                        </div>
                        <div class="flex items-center mb-2">
                            <i class="fas fa-star text-yellow-500 mr-2"></i>
                            <span class="text-gray-700">Loading ...</span>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h2 class="text-xl font-semibold text-dark mb-2">Synopsis</h2>
                        <p id="film-description" class="text-gray-700 leading-relaxed">
                            Loading ...
                        </p>
                    </div>

                    <div class="flex flex-wrap">
                        <a href="#showtimes"
                            class="px-6 py-3 bg-accent text-white rounded-lg hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-500 mr-3 mb-3 flex items-center transition">
                            <i class="fas fa-ticket-alt mr-2"></i> Réserver
                        </a>
                        <a href="#trailer"
                            class="px-6 py-3 bg-primary text-white rounded-lg hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-blue-500 mb-3 flex items-center transition">
                            <i class="fas fa-play mr-2"></i> Voir la bande-annonce
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Trailer Section -->
        <div id="trailer" class="bg-white rounded-xl shadow-md p-6 md:p-8 mb-8">
            <h2 class="text-2xl font-semibold text-dark mb-4">Bande-annonce</h2>
            <div class="aspect-w-16 aspect-h-9">
                <div id="film-trailer" class="w-full rounded-lg bg-black h-0 pb-[56.25%] relative overflow-hidden">
                    <!-- Placeholder will be replaced with iframe -->
                    <div class="absolute inset-0 flex items-center justify-center text-white">
                        <i class="fas fa-play-circle text-4xl opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Showtimes Section -->
        <div id="showtimes" class="bg-white rounded-xl shadow-md p-6 md:p-8 mb-8">
            <h2 class="text-2xl font-semibold text-dark mb-6">Séances disponibles</h2>

            <!-- Showtimes Grid -->
            <div id="session-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <p class="text-gray-500">Chargement...</p>
            </div>
        </div>

        <!-- Similar Films -->
        <div class="mb-8">
            <h2 class="text-2xl font-semibold text-dark mb-6">Vous pourriez aussi aimer</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                <!-- Similar films will be dynamically inserted here -->
            </div>
        </div>
    </main>

    <!-- Booking Modal -->
    <div id="booking-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-md relative">
            <button onclick="closeBookingModal()"
                class="absolute top-4 right-4 text-gray-600 hover:text-dark text-xl transition">×</button>
            <h3 class="text-xl font-semibold mb-4 text-dark">Réserver une séance</h3>
            <form id="booking-form">
                <input type="hidden" name="session_id" id="booking-session-id">

                <div class="mb-4">
                    <label for="seat" class="block mb-2 text-sm font-medium text-gray-700">Numéro de place :</label>
                    <input type="number" id="seat" name="seat" min="1"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                        required>
                </div>

                <button type="submit" 
                        class="w-full px-4 py-3 bg-accent text-white rounded-md hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-500 transition">
                    Confirmer la réservation
                </button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4 flex items-center">
                        <svg class="h-6 w-6 mr-2 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h18M3 16h18" />
                        </svg>
                        CinéCollection
                    </h3>
                    <p class="text-gray-400">La meilleure collection de films premium.</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4 text-lg">Catégories</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-accent transition">Action</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-accent transition">Comédie</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-accent transition">Drame</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-accent transition">Science-Fiction</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4 text-lg">Navigation</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-accent transition">Accueil</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-accent transition">Films</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-accent transition">Séances</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-accent transition">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4 text-lg">Newsletter</h4>
                    <p class="text-gray-400 mb-4">Abonnez-vous pour recevoir les dernières nouveautés</p>
                    <div class="flex">
                        <input type="email" placeholder="Votre email" class="px-4 py-3 w-full rounded-l-lg focus:outline-none focus:ring-2 focus:ring-accent text-dark">
                        <button class="bg-accent hover:bg-amber-600 px-4 py-3 rounded-r-lg font-medium transition">
                            S'abonner
                        </button>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400">© 2023 CinéCollection. Tous droits réservés.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-gray-400 hover:text-accent transition">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-accent transition">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-accent transition">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        const filmId = "{{ $filmId }}";

        document.addEventListener("DOMContentLoaded", function() {
            const token = localStorage.getItem("token");

            if (!token) {
                window.location.href = "/login";
                return;
            }

            fetch(`http://localhost:8000/api/film/${filmId}`, {
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(response => {
                    const film = response.film;

                    // Set film data
                    document.getElementById("film-title").textContent = film.title;
                    document.getElementById("film-image").src = `http://localhost:8000${film.image}`;
                    document.getElementById("film-bg").style.backgroundImage = `url(http://localhost:8000${film.image})`;
                    document.getElementById("film-description").textContent = film.description;
                    document.getElementById("film-genre").textContent = film.genre;
                    document.getElementById("film-duration").textContent = film.duration + " min";

                    // Set trailer
                    const rawTrailerLink = film.trailer_url;
                    const embedLink = convertYouTubeToEmbed(rawTrailerLink);
                    
                    if (embedLink) {
                        document.getElementById("film-trailer").innerHTML = `
                            <iframe class="absolute top-0 left-0 w-full h-full" 
                                src="${embedLink}" 
                                title="YouTube video player" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" 
                                allowfullscreen>
                            </iframe>
                        `;
                    } else {
                        document.getElementById("film-trailer").innerHTML = `
                            <div class="absolute inset-0 flex items-center justify-center text-white bg-gray-800">
                                <p>Bande-annonce non disponible</p>
                            </div>
                        `;
                    }

                    // Set sessions
                    const sessionContainer = document.getElementById("session-container");
                    sessionContainer.innerHTML = "";

                    if (film.session && film.session.length > 0) {
                        film.session.forEach(s => {
                            const sessionCard = `
                                <div class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition">
                                    <h3 class="font-semibold text-dark mb-3">${s.type} - ${s.language}</h3>
                                    <div class="text-gray-700 text-sm mb-1"><strong>Début:</strong> ${formatDate(s.start_date)}</div>
                                    <div class="text-gray-700 text-sm mb-4"><strong>Fin:</strong> ${formatDate(s.end_date)}</div>
                                    <button class="book-session-btn w-full px-4 py-2 bg-accent text-white rounded hover:bg-amber-600 text-sm transition" 
                                            data-session-id="${s.id}">
                                        Réserver cette séance
                                    </button>
                                </div>
                            `;
                            sessionContainer.innerHTML += sessionCard;
                        });

                        // Add event listeners to booking buttons
                        document.querySelectorAll(".book-session-btn").forEach(btn => {
                            btn.addEventListener("click", (e) => {
                                e.preventDefault();
                                const sessionId = btn.dataset.sessionId;
                                openBookingModal(sessionId);
                            });
                        });
                    } else {
                        sessionContainer.innerHTML = `
                            <div class="col-span-3 text-center py-8">
                                <p class="text-gray-500">Aucune séance disponible pour ce film.</p>
                            </div>
                        `;
                    }

                    // Similar films would be loaded here in a real implementation
                })
                .catch(error => {
                    console.error("Error fetching film:", error);
                });
        });

        function convertYouTubeToEmbed(url) {
            if (!url) return null;
            
            try {
                if (url.includes("youtu.be")) {
                    const videoId = url.split("/").pop().split("?")[0];
                    return `https://www.youtube.com/embed/${videoId}?autoplay=0&rel=0`;
                }

                if (url.includes("youtube.com/watch")) {
                    const urlObj = new URL(url);
                    const videoId = urlObj.searchParams.get("v");
                    return `https://www.youtube.com/embed/${videoId}?autoplay=0&rel=0`;
                }

                if (url.includes("youtube.com/embed")) {
                    return url.includes("?") ? `${url}&rel=0` : `${url}?rel=0`;
                }

                return null;
            } catch (error) {
                console.error("Invalid URL:", error);
                return null;
            }
        }

        function formatDate(dateString) {
            const date = new Date(dateString);
            return date.toLocaleString('fr-FR', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
        }

        function openBookingModal(sessionId) {
            document.getElementById("booking-session-id").value = sessionId;
            document.getElementById("booking-modal").classList.remove("hidden");
        }

        function closeBookingModal() {
            document.getElementById("booking-modal").classList.add("hidden");
        }

        // Handle form submission
        document.getElementById("booking-form").addEventListener("submit", function(e) {
            e.preventDefault();
            
            const token = localStorage.getItem("token");
            const sessionId = document.getElementById("booking-session-id").value;
            const seatNumber = document.getElementById("seat").value;

            // In a real implementation, you would send this data to your backend
            console.log("Booking session:", sessionId, "Seat:", seatNumber);
            
            // Show success message
            alert(`Réservation confirmée pour le siège ${seatNumber}`);
            closeBookingModal();
        });
    </script>
</body>
</html>