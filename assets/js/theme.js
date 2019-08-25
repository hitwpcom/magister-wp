// A few helpers
// -----------------------------

// forEach
const forEach = function(arr, callback) {
  Array.prototype.forEach.call(arr, callback);
};

// -------------------------------

// Hide sections, except the first one
const sections = document.querySelectorAll('.section');
for (let i = 1; i < sections.length; i++) {
  sections[i].classList.add('hidden');
}

// Event handler for main menu items
const menuItems = document.querySelectorAll('.menu-item');
forEach(menuItems, function(el) {
  el.addEventListener('click', function(event) {
    event.preventDefault();
    const pageUrl = event.target.getAttribute('href');
    const theMatch = pageUrl.match('.+\/([^\/]+)\/?');
    if (theMatch && theMatch.length > 0) {
      const pageSlug = theMatch[1];
      const section = document.getElementById(pageSlug);
      if (section) {
        for (let i = 0; i < sections.length; i++) {
          sections[i].classList.add('hidden');
        }
        section.classList.remove('hidden');
      }
    }
  });
});
