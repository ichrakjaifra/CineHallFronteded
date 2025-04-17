<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films Dashboard</title>
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
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
<body class="font-sans bg-light text-dark">
    <!-- Header -->
    <header class="gradient-bg text-white shadow-xl">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <svg class="h-8 w-8 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h18M3 16h18" />
                </svg>
                <h1 class="text-2xl font-bold">Ciné<span class="text-accent">Collection</span> Dashboard</h1>
            </div>
            <button id="openModalBtn" class="px-4 py-2 bg-accent hover:bg-amber-600 text-white rounded-md font-medium transition flex items-center">
                <i class="fas fa-plus mr-2"></i> Add New Film
            </button>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <p class="text-green-600 mb-6" id="infopara"></p>
        
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Total Films Card -->
            <div class="bg-white rounded-lg shadow-md card-hover p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-primary">
                        <i class="fas fa-film text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Total Films</p>
                        <p class="text-2xl font-semibold text-dark">42</p>
                    </div>
                </div>
            </div>
            
            <!-- Tickets Sold Card -->
            <div class="bg-white rounded-lg shadow-md card-hover p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-primary">
                        <i class="fas fa-ticket-alt text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Total Tickets Sold</p>
                        <p class="text-2xl font-semibold text-dark">1,254</p>
                    </div>
                </div>
            </div>
            
            <!-- Revenue Card -->
            <div class="bg-white rounded-lg shadow-md card-hover p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-primary">
                        <i class="fas fa-euro-sign text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Total Revenue</p>
                        <p class="text-2xl font-semibold text-dark">€15,245</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Films Table Section -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-dark">Film Collection</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Genre</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Duration</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Age</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Films will be dynamically inserted here -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-dark">Inception</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Science-Fiction</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">148 min</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">12+</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <button class="text-primary hover:text-secondary mr-3">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="text-red-500 hover:text-red-700">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-dark">The Shawshank Redemption</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Drama</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">142 min</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">16+</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <button class="text-primary hover:text-secondary mr-3">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="text-red-500 hover:text-red-700">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                <div class="text-sm text-gray-500">
                    Showing <span class="font-medium">1</span> to <span class="font-medium">10</span> of <span class="font-medium">42</span> results
                </div>
                <div class="flex space-x-2">
                    <button class="px-3 py-1 rounded-md border border-gray-300 text-sm font-medium text-gray-700 hover:bg-gray-50">
                        Previous
                    </button>
                    <button class="px-3 py-1 rounded-md bg-primary text-white text-sm font-medium hover:bg-secondary">
                        1
                    </button>
                    <button class="px-3 py-1 rounded-md border border-gray-300 text-sm font-medium text-gray-700 hover:bg-gray-50">
                        2
                    </button>
                    <button class="px-3 py-1 rounded-md border border-gray-300 text-sm font-medium text-gray-700 hover:bg-gray-50">
                        Next
                    </button>
                </div>
            </div>
        </div>
    </main>

    <!-- Create Film Modal -->
    <div id="createFilmModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-semibold text-dark">Add New Film</h2>
                    <button id="closeModalBtn" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                
                <form id="createFilmForm" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title *</label>
                            <input type="text" id="title" name="title" required 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                        
                        <div>
                            <label for="genre" class="block text-sm font-medium text-gray-700 mb-1">Genre *</label>
                            <select id="genre" name="genre" required 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                <option value="">Select a genre</option>
                                <option value="Action">Action</option>
                                <option value="Adventure">Adventure</option>
                                <option value="Comedy">Comedy</option>
                                <option value="Drama">Drama</option>
                                <option value="Fantasy">Fantasy</option>
                                <option value="Horror">Horror</option>
                                <option value="Romance">Romance</option>
                                <option value="Science-Fiction">Science-Fiction</option>
                                <option value="Thriller">Thriller</option>
                                <option value="Animation">Animation</option>
                                <option value="Documentary">Documentary</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="duration" class="block text-sm font-medium text-gray-700 mb-1">Duration (minutes) *</label>
                            <input type="number" id="duration" name="duration" required min="1" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                        
                        <div>
                            <label for="minimum_age" class="block text-sm font-medium text-gray-700 mb-1">Minimum Age *</label>
                            <input type="number" id="minimum_age" name="minimum_age" required min="0" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                        
                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Image *</label>
                            <input type="file" accept="image/*" id="image" name="image" required 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                        
                        <div>
                            <label for="trailerUrl" class="block text-sm font-medium text-gray-700 mb-1">Trailer URL *</label>
                            <input type="text" id="trailerUrl" name="trailer_url" required 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                        
                        <div class="md:col-span-2">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description *</label>
                            <textarea id="description" name="description" rows="4" required 
                                      class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"></textarea>
                        </div>
                    </div>
                    
                    <div class="mt-6 flex justify-end space-x-3">
                        <button type="button" id="cancelBtn" 
                                class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 transition">
                            Cancel
                        </button>
                        <button type="submit" 
                                class="px-4 py-2 bg-accent text-white rounded-md hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-500 transition">
                            Add Film
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>