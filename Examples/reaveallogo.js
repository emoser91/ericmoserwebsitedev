Splitting();

const site = document.querySelector("#site");

site.addEventListener('animationend', (e) => {
  if (e.animationName == "reveal") {
    site.dataset.loaded = 'true';
  }
});