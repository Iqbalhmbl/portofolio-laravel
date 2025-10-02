@extends('layouts.front')

@section('content')
<style>
/* Grid 1–2–3 kolom (opsional kalau sudah pakai row-cols) */
#work .project-grid { row-gap: 1.5rem; }

/* Card konsisten */
.project-card{
  display:flex; flex-direction:column; height:100%;
  background:#0d0f10; border:1px solid #3a3a3a; color:#eaeaea;
  border-radius:14px; overflow:hidden;
}
.project-card:hover{ transform:translateY(-2px); transition:.2s ease; }

/* Gambar konsisten */
.project-img{
  width:100%; height:220px; object-fit:cover; display:block;
}

/* Body fleksibel */
.project-body{ display:flex; flex-direction:column; gap:.5rem; padding:1rem; }

/* Judul & deskripsi ter-clamp agar tinggi seragam */
.project-title{
  color:#32f08c; font-weight:700; margin:0 0 .25rem 0;
  display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;
}
.project-desc{
  margin:0;
  display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden;
}

/* Badge wrap rapi, batas tinggi 2 baris agar tidak “mendorong” card */
.project-badges{
  display:flex; flex-wrap:wrap; gap:.4rem .5rem;
  max-height:3.2rem; overflow:hidden;
}

/* Tombol selalu di bawah */
.project-actions{ margin-top:auto; display:flex; gap:.5rem; }

/* Perbaiki badge radius agar konsisten */
.badge{ border-radius:999px; font-weight:600; }
</style>

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

<section class="container py-5" id="work">
  <h2 class="fw-bold mb-4">Projects</h2>

  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 project-grid">
    @foreach($projects as $project)
      <div class="col">
        <div class="project-card card">
          @if($project->files && $project->files->count() > 0)
            <img src="{{ asset($project->files->first()->file_path) }}"
                 alt="{{ $project->title }}"
                 class="project-img card-img-top">
          @else
            <div class="project-img d-flex align-items-center justify-content-center bg-secondary">
              <span class="text-dark fw-semibold">No Image</span>
            </div>
          @endif

          <div class="project-body card-body">
            <h5 class="project-title card-title">{{ $project->title }}</h5>
            <p class="project-desc card-text">{!! Str::limit(strip_tags($project->description), 160) !!}</p>

            <div class="project-badges">
              @foreach($project->tech_stack_skills as $tech_skill)
                @php
                  $colors = ['primary','success','danger','warning','info','secondary','dark'];
                  $color = $colors[$loop->index % count($colors)];
                @endphp
                <span class="badge bg-{{ $color }}">{{ $tech_skill->name }}</span>
              @endforeach
            </div>

            <div class="project-actions">
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
                        <!-- Title + Company -->
                        <div class="mb-1">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title text-success mb-0">{{ $exp->title }}</h5>
                                <!-- Badge hanya tampil di desktop -->
                                <span class="badge bg-success text-dark d-none d-md-inline">{{ $exp->company }}</span>
                            </div>
                            <!-- Badge tampil di mobile, di bawah title -->
                            <span class="badge bg-success text-dark d-md-none mt-1">{{ $exp->company }}</span>
                        </div>

                        <small class="text-success d-block mb-2">
                            {{ $exp->start_date }} - {{ $exp->end_date ?? "Present" }}
                        </small>
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
          <li><i class="bi bi-geo-alt-fill me-2" aria-label="Location"></i>Sidoarjo, Indonesia</li>
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