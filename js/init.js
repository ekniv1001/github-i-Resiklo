// sidenav
const sideNav = document.querySelectorAll('.sidenav');
M.Sidenav.init(sideNav, {});
// slider
const slider = document.querySelector('.slider');
M.Slider.init(slider, {
    indicators: false,
    height: 500,
});

const parallax = document.querySelector('.parallax');
M.Parallax.init(parallax, {});

document.addEventListener('DOMContentLoaded', function () {
    var parallax = document.querySelectorAll('.parallax');
    var instances = M.Parallax.init(parallax, {});
});

document.addEventListener('DOMContentLoaded', function () {
    var scrollspy = document.querySelectorAll('.scrollspy');
    var instances = M.ScrollSpy.init(scrollspy, {});
});

document.addEventListener('DOMContentLoaded', function () {
    var modal = document.querySelectorAll('.modal');
    var instances = M.Modal.init(modal, {});
});

var datepicker = document.querySelector('.datepicker');
var instance = M.Datepicker.init(datepicker, {
    yearRange: 10,
    showClearBtn: true,
});


var sidenav = document.querySelectorAll('.sidenav');
var instances = M.Sidenav.init(sidenav, {
});

var dropdown = document.querySelectorAll('.dropdown-trigger');
var instances = M.Dropdown.init(dropdown, {
});

document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems, {});
});
// document.addEventListener('DOMContentLoaded', function() {
//     var select = document.querySelectorAll('select');
//     var instances = M.FormSelect.init(select, {});
//   });

// document.addEventListener('DOMContentLoaded', function () {
//     var collapsible = document.querySelectorAll('.collapsible');
//     var instances = M.Collapsible.init(collapsible, {});
// });