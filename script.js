// To show or hide the nav
function showHideNav() {
    var nav = document.getElementById('navCategories');
    //if it is visible, hide. Else show
    if (nav.classList.contains('hide')) {
        nav.classList.remove('hide');
    } else {
        nav.classList.add('hide');
    } 
}