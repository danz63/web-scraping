/* Set the width of the side navigation to 250px */
var sidenav = document.getElementById("mySidenav");
if (sidenav != null)
    sidenav.style.width = "250px";
var main = document.getElementById("main");
// sideNav
function sideNav() {
    if (sidenav.style.width == "250px") {
        closeNav();
    } else {
        openNav();
    }
}

function openNav() {
    sidenav.style.width = "250px";
    main.style.marginLeft = "250px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
    sidenav.style.width = "0";
    main.style.marginLeft = "0";
}

// End Of SideNav