let toggleBtn = document.getElementById('toggle-btn');
let body = document.body;
let darkMode = localStorage.getItem('dark-mode');

const enableDarkMode = () =>{
   toggleBtn.classList.replace('fa-sun', 'fa-moon');
   body.classList.add('dark');
   localStorage.setItem('dark-mode', 'enabled');
}

const disableDarkMode = () =>{
   toggleBtn.classList.replace('fa-moon', 'fa-sun');
   body.classList.remove('dark');
   localStorage.setItem('dark-mode', 'disabled');
}

if(darkMode === 'enabled'){
   enableDarkMode();
}

toggleBtn.onclick = (e) =>{
   darkMode = localStorage.getItem('dark-mode');
   if(darkMode === 'disabled'){
      enableDarkMode();
   }else{
      disableDarkMode();
   }
}

let profile = document.querySelector('.header .flex .profile');

document.querySelector('#user-btn').onclick = () =>{
   profile.classList.toggle('active');
   search.classList.remove('active');
}

let search = document.querySelector('.header .flex .search-form');

document.querySelector('#search-btn').onclick = () =>{
   search.classList.toggle('active');
   profile.classList.remove('active');
}

let sideBar = document.querySelector('.side-bar');

document.querySelector('#menu-btn').onclick = () =>{
   sideBar.classList.toggle('active');
   body.classList.toggle('active');
}

document.querySelector('#close-btn').onclick = () =>{
   sideBar.classList.remove('active');
   body.classList.remove('active');
}

window.onscroll = () =>{
   profile.classList.remove('active');
   search.classList.remove('active');

   if(window.innerWidth < 1200){
      sideBar.classList.remove('active');
      body.classList.remove('active');
   }
}
// Sélectionner l'icône du menu
const menuBtn = document.getElementById('menu-btn');

// Sélectionner la barre latérale
const side_Bar = document.querySelector('.side-bar');

// Ajouter un écouteur d'événement pour le clic sur l'icône du menu
menuBtn.addEventListener('click', function() {
    // Ajouter ou supprimer une classe pour masquer ou afficher la barre latérale
    sideBar.classList.toggle('hidden');
});

// Sélectionner l'icône du mode sombre
const darkModeBtn = document.getElementById('dark-mode-btn');

// Ajouter un écouteur d'événement pour le clic sur l'icône du mode sombre
darkModeBtn.addEventListener('click', function() {
    // Ajouter ou supprimer une classe pour basculer entre le mode sombre et le mode clair
    document.body.classList.toggle('dark-mode');
    
    // Enregistrer la préférence de l'utilisateur dans le stockage local (localStorage)
    if (document.body.classList.contains('dark-mode')) {
        localStorage.setItem('darkMode', 'enabled');
    } else {
        localStorage.setItem('darkMode', 'disabled');
    }
});

// Vérifier si le mode sombre est déjà activé dans le stockage local
window.addEventListener('load', function() {
    const currentMode = localStorage.getItem('darkMode');
    if (currentMode === 'enabled') {
        document.body.classList.add('dark-mode');
    }
});
