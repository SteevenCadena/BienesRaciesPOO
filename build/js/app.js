
const mobilMenu = document.querySelector('.mobile-menu');
const navegacion = document.querySelector('.navegacion');
const botonDarkMode = document.querySelector('.dark-mode-boton');

//leer preferencia del sistema
const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

//Carga completa del sitio
document.addEventListener('DOMContentLoaded', () => {
    eventListeners()
    // darkMode();
});

const darkMode = () => {
    // if (prefiereDarkMode.matches) {
    //     document.body.classList.add('dark-mode');
    // } else {
    //     document.body.classList.remove('dark-mode');

    // }

    botonDarkMode.addEventListener('click', () => {
        // document.body.classList.toggle('dark-mode');
    });
}
const eventListeners = () => {

    mobilMenu.addEventListener('click', () => navegacionResponsive());

}

//Opcion 1 con contains
// const navegacionResponsive = () =>{
//     if(navegacion.classList.contains('mostrar')){//contains Contiene si contiene la clase
//         navegacion.classList.remove('mostrar');
//     } else {
//         navegacion.classList.add('mostrar');
//     }
// }

//Opcion con toggle
const navegacionResponsive = () => {
    navegacion.classList.toggle('mostrar');
}