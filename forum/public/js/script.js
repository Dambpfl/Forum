const nav = document.getElementById("nav"),
      ouverture = document.getElementById('nav-toggle'),
      fermeture = document.getElementById('nav-close')


if(ouverture) {
    ouverture.addEventListener('click', () =>{
        nav.style.left = "-65%";
        document.getElementById('nav-toggle').style.display = "none";
    })
}

if(fermeture) {
    fermeture.addEventListener('click', () =>{
        nav.style.left = "-100%";
        document.getElementById('nav-toggle').style.display = "block";
    })
}