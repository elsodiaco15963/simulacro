function toggleMenu() {
    const menuSide = document.getElementById('menuSide');
    menuSide.classList.toggle('small-menu');

    const h4s = document.querySelectorAll('.option h4');

    if (menuSide.classList.contains('small-menu')) {
        h4s.forEach(h4 => {
            h4.style.display = 'none';
        });
    } else {
        h4s.forEach(h4 => {
            h4.removeAttribute('style');
        });
    }
}
