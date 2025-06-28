@include('shared.header')
@include('shared.body_header')

<main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
                <br>
              <h1>team member Details</h1>
              <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem.
                Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores.
                 Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{route('main')}}">Home</a></li>
            <li class="current">team member Details</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- team member Details Section -->
    <section id="team member-details" class="service-details section">

      <div class="container">

        <div class="row gy-5">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">

            <div class="service-box">
              <h4>team List</h4>
              <div class="services-list">
                @foreach ($teams as $anyteam )
                    <a href="{{route('admin.teams.show',$anyteam['id'])}}" class={{$anyteam["id"]==$team['id']?"active":""}}>
                        <i class="bi bi-arrow-right-circle"></i><span>{{$anyteam['name']}}</span>
                    </a>
                @endforeach
              </div>
            </div><!-- End Services List -->

            <div class="service-box">
              <h4>Download Catalog</h4>
              <div class="download-catalog">
                <a href="#"><i class="bi bi-filetype-pdf"></i><span>Catalog PDF</span></a>
                <a href="#"><i class="bi bi-file-earmark-word"></i><span>Catalog DOC</span></a>
              </div>
            </div><!-- End Services List -->

            <div class="help-box d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-headset help-icon"></i>
              <h4>Have a Question?</h4>
              <p class="d-flex align-items-center mt-2 mb-0"><i class="bi bi-telephone me-2"></i> <span>+1 5589 55488 55</span></p>
              <p class="d-flex align-items-center mt-1 mb-0"><i class="bi bi-envelope me-2"></i> <a href="mailto:contact@example.com">contact@example.com</a></p>
            </div>

          </div>

          <div class="col-lg-8 ps-lg-5" data-aos="fade-up" data-aos-delay="200">
            <img src="{{url('storage/'.$team['image'])}}" alt="" class="img-fluid services-img">
            <h3>{{$team['name']}}</h3>
            <p>
                {{$team['jobDescription']}}
            </p>
                {{$team['bio']}}
            </p>
          </div>

        </div>

      </div>

    </section><!-- /Service Details Section -->

</main>
@include('shared.footer')
