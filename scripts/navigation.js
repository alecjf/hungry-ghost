function toggleNavigation() {
  const navElem = document.getElementById("responsive-nav-menu"),
    isOpen = navElem.style.top === "0px";
  navElem.style.top = isOpen ? "-120vh" : "0px";
}

const menuLinks = document
  .getElementById("responsive-nav-menu")
  ?.getElementsByTagName("a");

const pageTitle = document.getElementById("page-title")?.innerHTML;

menuLinks &&
  [...menuLinks]
    .filter((elem) => elem.innerHTML === pageTitle)
    .forEach((elem) => (elem.className += " active"));
