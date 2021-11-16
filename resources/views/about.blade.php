@include('layouts.main')

<div class="text-center ">
    <h2 class="display-5">{{ $title }} Me</h2>
<img class="mt-4" src="img/{{ $img }}" alt="{{ $name }}" width="200" class="rounded-circle img-thumbnail" />
    <h4 class="display-6">{{ $name }}</h4>
    <p class="lead">Student | Junior Web Development</p>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path
        fill="#ed280e"
        fill-opacity="1"
        d="M0,32L48,32C96,32,192,32,288,69.3C384,107,480,181,576,186.7C672,192,768,128,864,117.3C960,107,1056,149,1152,170.7C1248,192,1344,192,1392,192L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
      ></path>
    </svg>
</div>
    