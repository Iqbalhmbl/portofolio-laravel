@extends('layouts.front')

@section('content')

<!-- Hero -->
  <section class="min-vh-50 d-flex flex-column justify-content-center align-items-center py-5 position-relative overflow-hidden" id="hero">
      <!-- Logo -->
      <img src="{{ asset('assets/img/iqbal_hambali_logo_transparent.png') }}" alt="Logo IH" width="80" height="80" class="mb-3 rounded-circle shadow" style="background: #222;">
      <!-- Hero Content -->
      <h1 class="display-4 fw-bold text-success mb-2 text-center">Hi, I’m Iqbal Hambali</h1>

      <p class="lead mb-4">Full-Stack Developer</p>
      <div class="d-flex gap-4 mb-3">
          <a href="https://instagram.com/iqbalhmbl" target="_blank" class="text-success" aria-label="Instagram">
              <i class="bi bi-instagram" style="font-size:2rem;"></i>
          </a>
          <a href="https://linkedin.com/in/iqbal-hambali-a31a88195" target="_blank" class="text-success" aria-label="LinkedIn">
              <i class="bi bi-linkedin" style="font-size:2rem;"></i>
          </a>
          <a href="https://github.com/Iqbalhmbl" target="_blank" class="text-success" aria-label="GitHub">
              <i class="bi bi-github" style="font-size:2rem;"></i>
          </a>
          <a href="mailto:iqbalhmbl505@gmail.com" class="text-success" aria-label="Gmail">
              <i class="bi bi-envelope-fill" style="font-size:2rem;"></i>
          </a>
      </div>
      <div class="d-flex gap-3 mt-2">
          <a href="#work" class="btn btn-success px-4 py-2">See Projects</a>
          <a href="#contact" class="btn btn-outline-light px-4 py-2">Contact</a>
      </div>
  </section>

  <!-- About -->
  <section class="container py-5" id="about">
    <div class="row align-items-center">
      <div class="col-md-6 mb-4 mb-md-0">
        <h2 class="fw-bold">About Me</h2>
        <p>Passionate Full Stack Web Developer with expertise in building scalable, high-performance web applications. Over two years of experience in designing, developing, and maintaining frontend and backend systems using modern web technologies. Proficient in PHP (Laravel, CodeIgniter), JavaScript (Vue.js, Next.js), and database management (MySQL, MongoDB, SQL Server). Strong problem-solving skills, ability to collaborate in Agile teams, and experience managing projects using JIRA, Trello, and Click-Up.</p>
        {{-- <span class="badge bg-success">2022–2025</span> --}}
      </div>
      <div class="col-md-6">
        <div class="card bg-black border-secondary">
          <div class="card-body">
            <h5 class="card-title">Skills &amp; Tools</h5>
            <div class="d-flex flex-wrap gap-2">
                @foreach($skills as $skill)
                    @php
                        $colors = ['primary', 'success', 'danger', 'warning', 'info', 'secondary', 'dark'];
                        $color = $colors[$loop->index % count($colors)];
                    @endphp
                    <span class="badge bg-{{ $color }}">{{ $skill->name }}</span>
                @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Work (Projects) -->
  <section class="container py-5" id="work">
    <h2 class="fw-bold mb-4">Projects</h2>
    <div class="row g-4">
@foreach($projects as $project)
<div class="col-12 col-md-6 col-lg-4">
    <div class="card h-100 bg-black border-secondary text-light">
        @if($project->files && $project->files->count() > 0)
            <img src="{{ asset($project->files->first()->file_path) }}" class="card-img-top" alt="{{ $project->title }}" style="height: 200px; object-fit: cover;">
        @else
            <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center" style="height: 200px;">
                <span class="text-muted">No Image</span>
            </div>
        @endif
        <div class="card-body d-flex flex-column">
            <h5 class="card-title text-success">{{ $project->title }}</h5>
            <p class="card-text">{!! Str::limit($project->description, 100) !!}</p>
            <div class="mb-3">
                @foreach($project->tech_stack_skills as $tech_skill)
                    @php
                        $colors = ['primary', 'success', 'danger', 'warning', 'info', 'secondary', 'dark'];
                        $color = $colors[$loop->index % count($colors)];
                    @endphp
                    <span class="badge bg-{{ $color }} me-1 mb-1">{{ $tech_skill->name }}</span>
                @endforeach
            </div>
            <div class="mt-auto d-flex gap-2">
                <a href="{{ route('detail', $project->id) }}" class="btn btn-outline-light btn-sm">Detail</a>
            </div>
        </div>
    </div>
</div>
@endforeach

    </div>
  </section>
  <!-- Experience -->
<section class="container py-5" id="experience">
    <div class="row align-items-start">
        <!-- Left Column: Title & Description -->
        <div class="col-md-5 mb-4 mb-md-0">
            <h2 class="fw-bold text-white mb-3">Experience</h2>
        <p class="fs-6">
            Here are some of my work experiences and projects as a developer and project manager. Each experience has provided new insights and skills that strengthen my abilities in the tech industry.
        </p>
        </div>
        <!-- Right Column: Scrollable Experience Cards -->
        <div class="col-md-7">
            <div style="max-height: 350px; overflow-y: auto;">
                @foreach($experiences as $exp)
                <div class="card bg-black border-secondary mb-3 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h5 class="card-title text-success mb-0">{{ $exp->title }}</h5>
                            <span class="badge bg-success text-dark">{{ $exp->company }}</span>
                        </div>
                        <small class="text-success d-block mb-2">{{ $exp->start_date }} - {{ $exp->end_date ?? "Present" }}</small>
                        <p class="mt-2 mb-0">{!! $exp->description !!}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

  <!-- Contact -->
  <section class="container py-5" id="contact">
    <h2 class="fw-bold mb-4">Contact</h2>
    <div class="row">
      <div class="col-md-6 mb-4 mb-md-0">
        <ul class="list-unstyled">
          <li><i class="bi bi-geo-alt-fill me-2" aria-label="Location"></i> Sukorejo, 71A, Sidoarjo, Indonesia</li>
          <li><i class="bi bi-envelope-fill me-2" aria-label="Email"></i> iqbalhmbl505@gmail.com</li>
          <li><i class="bi bi-telephone-fill me-2" aria-label="Phone"></i> +62 878 2873 6448</li>
        </ul>
      </div>
      <div class="col-md-6">
        <form id="contactForm" autocomplete="off">
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
          </div>
          <button type="submit" class="btn btn-success">Send</button>
        </form>
        <div id="formAlert" class="mt-3"></div>
      </div>
    </div>
  </section>
<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    let form = e.target;
    let data = {
        name: form.name.value,
        email: form.email.value,
        message: form.message.value,
        _token: '{{ csrf_token() }}'
    };
    fetch('{{ route('contact.send') }}', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    })
    .then(res => res.json())
    .then(res => {
        document.getElementById('formAlert').innerHTML =
            '<div class="alert alert-success">' + res.message + '</div>';
        form.reset();
    })
    .catch(() => {
        document.getElementById('formAlert').innerHTML =
            '<div class="alert alert-danger">Failed to send message.</div>';
    });
});
</script>
@endsection