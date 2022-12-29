
<?php 
include("script.php")
?>
<div class="bg-white flex">
    <div class="sm:py-2 sm:px-2 lg:px-2  "><img src="./_images/logo.png" alt="logo de la boite" width="200"></div>
    <div class="mx-auto max-w-7xl px-4 sm:py-10 sm:px-6 lg:px-8">
      <div class="text-center">
        <h2 class="text-xl font-semibold text-orange-400">Cryptomonnaies</h2>
        <p class="mt-1 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl lg:text-6xl">Comprendre la Blockchain</p>
      </div>
    </div>
  </div>
  <nav class="bg-violet-600 shadow-lg">
    <div class="max-w7xl mx-auto px-4">  
      <div class="flex justify-between">
        <div class="flex space-x-20">
          <div>
          
            <a  href = "/" class="flex items-center py-4 px-">
              <span class="font-semibold text-orange-400 hover:text-white text-lg">Accueil</span>
            </a>
          </div>
          <!-- navbar gauche -->
          <div class="hidden md:flex items-center space-x-20">
            <a class="py-4 px-2 text-orange-400 font-semibold hover:text-white transition duration-300" href ="/contact.php">Nous contacter</a>
            <a class="py-4 px-2 text-orange-400 font-semibold hover:text-white transition duration-300">Différentes cryptomonnaies</a>
            
          </div>
        </div>
        <!-- navbar droite -->
        <div class="hidden md:flex items-center space-x-3 ">
          <a  class="py-2 px-2 font-medium text-orange-400 rounded hover:bg-orange-600 hover:text-white transition duration-300" href = "/connexion.php">Se connecter</a>
          <a  class="py-2 px-2 font-medium text-orange-400  rounded hover:bg-orange-600 hover:text-white transition duration-300" href = "/inscription.php">S'inscrire</a>
        </div>
        <!-- bouton pour mobile -->
        <div class="md:hidden flex items-center">
          <button class="outline-none mobile-menu-button">
          <svg class=" w-6 h-6 text-orange-400 hover:text-white "
            x-show="!showMenu"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
        </div>
      </div>
    </div>
    <!-- mobile menu -->
    <div class="hidden mobile-menu">
      <ul class="">
        
        <li><a class="block text-sm px-2 py-4 text-orange-400 hover:bg-orange-600 transition duration-300">Nous contacter</a></li>
        <li><a  class="block text-sm px-2 py-4 text-orange-400 hover:bg-orange-600 transition duration-300">Différentes cryptomonnaies</a></li>
        <li><a  class="block text-sm px-2 py-4 text-orange-400 hover:bg-orange-600 transition duration-300">Se connecter</a></li>
        <li><a  class="block text-sm px-2 py-4 text-orange-400 hover:bg-orange-600 transition duration-300">S'inscrire</a></li>
        </ul>
    </div>
  </nav>
  


       