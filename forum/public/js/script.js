const nav = document.getElementById("nav"),
      ouverture = document.getElementById('nav-toggle'),
      fermeture = document.getElementById('nav-close')


if(ouverture) {
    ouverture.addEventListener('click', () =>{
        nav.classList.add('show-boutons')
    })
}

if(fermeture) {
    fermeture.addEventListener('click', () =>{
        nav.classList.remove('show-boutons')
    })
}