// Mouse-following icons
const icons = [
  document.getElementById('icon-code'),
  document.getElementById('icon-cloud'),
  document.getElementById('icon-db'),
  document.getElementById('icon-analytics')
];
let mouseX = window.innerWidth/2, mouseY = window.innerHeight/2;
let iconPositions = [
  {x: mouseX, y: mouseY},
  {x: mouseX, y: mouseY},
  {x: mouseX, y: mouseY},
  {x: mouseX, y: mouseY}
];

document.body.addEventListener('mousemove', function(e) {
  mouseX = e.clientX;
  mouseY = e.clientY;
});

function animateIcons() {
  // Ikon akan mengikuti mouse dengan delay dan offset
  iconPositions.forEach((pos, i) => {
    // Smooth lerp
    pos.x += (mouseX + Math.sin(Date.now()/800 + i)*30 - pos.x) * 0.12;
    pos.y += (mouseY + Math.cos(Date.now()/900 + i)*30 - pos.y) * 0.12;
    if (icons[i]) {
      icons[i].style.left = (pos.x + i*24 - 16) + 'px';
      icons[i].style.top = (pos.y + i*24 - 16) + 'px';
    }
  });
  requestAnimationFrame(animateIcons);
}
animateIcons();
// Fetch & render projects
fetch('data/projects.json')
  .then(res => res.json())
  .then(data => {
    const grid = document.getElementById('projects-grid');
    grid.innerHTML = '';
    data.projects.forEach(project => {
      const stackBadges = project.stack.map(s => `<span class='badge bg-secondary me-1 mb-1'>${s}</span>`).join(' ');
      grid.innerHTML += `
        <div class="col-12 col-md-6 col-lg-4">
          <div class="card h-100">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">${project.title}</h5>
              <p class="card-text">${project.summary}</p>
              <div class="mb-2">${stackBadges}</div>
              <small class="text-muted mb-2">${project.team}</small>
              <a href="${project.url || '#'}" class="btn btn-success mt-auto" target="_blank" rel="noopener" ${project.url ? '' : 'disabled'} aria-label="Visit ${project.title}">Visit</a>
            </div>
          </div>
        </div>
      `;
    });
  });

// Contact form handler
const contactForm = document.getElementById('contactForm');
if (contactForm) {
  contactForm.addEventListener('submit', function(e) {
    e.preventDefault();
    const name = contactForm.name.value.trim();
    const email = contactForm.email.value.trim();
    const message = contactForm.message.value.trim();
    const alertDiv = document.getElementById('formAlert');
    if (!name || !email || !message) {
      alertDiv.innerHTML = '<div class="alert alert-danger">Semua field wajib diisi.</div>';
      return;
    }
    // Simulasi AJAX
    fetch('/api/contact', {
      method: 'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({name, email, message})
    })
    .then(() => {
      alertDiv.innerHTML = '<div class="alert alert-success">Pesan berhasil dikirim!</div>';
      contactForm.reset();
    })
    .catch(() => {
      alertDiv.innerHTML = '<div class="alert alert-danger">Gagal mengirim pesan.</div>';
    });
  });
}
