<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Portofolio Iqbal Hambali — Programmer, Project Manager & Full-Stack Web Developer.">
  <meta property="og:title" content="Iqbal Hambali — Programmer">
  <meta property="og:description" content="Portofolio pribadi, project manager & full-stack web developer.">
  <meta property="og:image" content="{{ asset('assets/img/logo-ih.svg') }}">
  <link rel="icon" href="{{ asset('iqbal_hambali_logo_transparent.png') }}">
  <title>@yield('title', 'Iqbal Hambali — Programmer')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Inter:400,700&display=swap" rel="stylesheet">
</head>
<body class="bg-dark text-light" style="font-family: 'Inter', system-ui, sans-serif;">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-black border-bottom border-secondary">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-2" href="#">
        <img src="{{ asset('iqbal_hambali_logo_transparent.png') }}" alt="Logo IH" width="32" height="32">
        <span class="fw-bold">Portfolio</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
          <li class="nav-item"><a class="nav-link" href="#work">Work</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        </ul>
        <a href="{{ asset('assets/cv.pdf') }}" class="btn btn-success ms-lg-3" download>Download CV</a>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main>
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="bg-black text-center py-4 mt-5 border-top border-secondary">
    <div class="container">
      <small>&copy; <span id="year"></span> Iqbal Hambali</small>
      <br>
      <a href="#hero" class="btn btn-link text-success">Back to top</a>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.js"></script>
  <script src="{{ asset('assets/js/app.js') }}"></script>
  <script>
    // Set current year in footer
    document.getElementById('year').textContent = new Date().getFullYear();
  </script>
  @yield('scripts')
</body>
</html>
