document.addEventListener("DOMContentLoaded", function () {
    var subMenus = document.querySelectorAll('.sub-menu');

    subMenus.forEach(function (subMenu) {
        subMenu.previousElementSibling.addEventListener('click', function (event) {
            event.preventDefault();
            toggleSubMenu(subMenu);
        });

        var subMenuLinks = subMenu.querySelectorAll('.option a');
        subMenuLinks.forEach(function (link) {
            link.addEventListener('click', function () {
                // Agrega una clase para indicar que el submenú está abierto
                subMenu.classList.add('open');
            });
        });
    });
});

function toggleSubMenu(subMenu) {
    if (!subMenu || !(subMenu instanceof Element)) {
        return;
    }

    var computedStyle = window.getComputedStyle(subMenu);

    if (computedStyle.display === 'block') {
        subMenu.style.display = 'none';
    } else {
        // Oculta otros submenús abiertos antes de mostrar el actual
        closeOtherSubMenus();
        subMenu.style.display = 'block';
    }
}

function closeOtherSubMenus() {
    var openSubMenus = document.querySelectorAll('.sub-menu.open');
    openSubMenus.forEach(function (openSubMenu) {
        openSubMenu.style.display = 'none';
        openSubMenu.classList.remove('open');
    });
}
