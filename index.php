<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carnet d'Adresses Professionnel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <script>
        tailwind.config = {
            theme: {
            extend: {
                colors: {
                    primary: '#3498db',
                    secondary: '#2c3e50',
                    accent: '#e74c3c',
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 min-h-screen font-sans flex flex-col">
    <header class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center mb-4 md:mb-0">
                    <i class="fas fa-address-book text-4xl text-primary mr-4"></i>
                    <div>
                        <h1 class="text-3xl font-bold text-secondary">Carnet d'Adresses</h1>
                        <p class="text-sm text-gray-600">Gérez vos contacts professionnels</p>
                    </div>
                </div>
                <nav>
                    <ul class="flex space-x-6">
                        <li><a href="#" class="text-gray-600 hover:text-primary transition duration-300 ease-in-out">Accueil</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-primary transition duration-300 ease-in-out">Contacts</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-primary transition duration-300 ease-in-out">Groupes</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-primary transition duration-300 ease-in-out">Paramètres</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main class="flex-grow">
        <div class="container mx-auto px-4 py-8">
            <div class="bg-white rounded-lg shadow-2xl p-8 mb-8 animate-fade-in" style="animation-delay: 0.2s;">
                <div class="flex flex-col md:flex-row justify-between items-center mb-6">
                    <div class="relative w-full md:w-1/2 mb-4 md:mb-0">
                        <input type="text" id="searchInput" placeholder="Rechercher des contacts..." class="w-full px-4 py-3 pl-12 rounded-full border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-300 ease-in-out">
                        <i class="fas fa-search absolute left-4 top-4 text-gray-400"></i>
                    </div>

                    <button id="addContactBtn" class="bg-primary hover:bg-primary-dark text-white font-semibold py-3 px-6 rounded-full shadow transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                        <i class="fas fa-plus mr-2"></i>Ajouter un Contact
                    </button>
                </div>

                <div class="overflow-x-auto custom-scrollbar">
                    <table id="contactsTable" class="w-full">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th class="py-4 px-6 text-left rounded-tl-lg">Nom</th>
                                <th class="py-4 px-6 text-left">Téléphone</th>
                                <th class="py-4 px-6 text-left">Email</th>
                                <th class="py-4 px-6 text-left">Adresse</th>
                                <th class="py-4 px-6 text-left rounded-tr-lg">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Contacts -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-secondary text-white py-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-between">
                <div class="w-full md:w-1/3 mb-6 md:mb-0">
                    <h3 class="text-xl font-semibold mb-4">À propos</h3>
                    <p class="text-gray-300">Carnet d'Adresses Professionnel est votre solution pour gérer efficacement vos contacts d'affaires.</p>
                </div>
                <div class="w-full md:w-1/3 mb-6 md:mb-0">
                    <h3 class="text-xl font-semibold mb-4">Liens rapides</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-primary transition duration-300 ease-in-out">Accueil</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-primary transition duration-300 ease-in-out">Contacts</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-primary transition duration-300 ease-in-out">Groupes</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-primary transition duration-300 ease-in-out">Paramètres</a></li>
                    </ul>
                </div>
                <div class="w-full md:w-1/3">
                    <h3 class="text-xl font-semibold mb-4">Nous contacter</h3>
                    <p class="text-gray-300 mb-2">Email: contact@carnetadresses.com</p>
                    <p class="text-gray-300 mb-4">Téléphone: +212 6 23 45 67 89</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-primary transition duration-300 ease-in-out"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-300 hover:text-primary transition duration-300 ease-in-out"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-300 hover:text-primary transition duration-300 ease-in-out"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-700 text-center">
                <p class="text-gray-300">&copy; 2024 Carnet d'Adresses Professionnel. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <div id="contactModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-lg p-8 max-w-md w-full animate-fade-in">
            <h2 id="modalTitle" class="text-3xl font-bold mb-6 text-secondary">Ajouter un Contact</h2>
            <form id="contactForm">
                <input type="hidden" id="contactId">
                <div class="mb-6">
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Nom</label>
                    <input type="text" id="name" name="name" required class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-300 ease-in-out">
                </div>
                <div class="mb-6">
                    <label for="phone" class="block text-gray-700 font-semibold mb-2">Téléphone</label>
                    <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-300 ease-in-out">
                </div>
                <div class="mb-6">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-300 ease-in-out">
                </div>
                <div class="mb-6">
                    <label for="address" class="block text-gray-700 font-semibold mb-2">Adresse</label>
                    <textarea id="address" name="address" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-300 ease-in-out"></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="cancelBtn" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-3 px-6 rounded-lg mr-4 transition duration-300 ease-in-out">Annuler</button>
                    <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-semibold py-3 px-6 rounded-lg transition duration-300 ease-in-out">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    <script src="app.js"></script>
</body>
</html>