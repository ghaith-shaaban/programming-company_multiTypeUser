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
              <h1>Services Details</h1>
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
            <li class="current">Services Details</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Service Details Section -->
    <section id="service-details" class="service-details section">

      <div class="container">

        <div class="row gy-5">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">

            <div class="service-box">
              <h4>Serivces List</h4>
              <div class="services-list">
                @foreach ($services as $anyservice )
                    <a href="{{route('admin.services.show',$anyservice['id'])}}" class={{$anyservice["id"]==$service['id']?"active":""}}>
                        <i class="bi bi-arrow-right-circle"></i><span>{{$anyservice['title']}}</span>
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
            <img src="{{url('storage/'.$service['image'])}}" alt="" class="img-fluid services-img">
            <h3>{{$service['title']}}</h3>
            <p>
                {{$service['content']}}
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> <span>{{$service['content']}}</span></li>
              <li><i class="bi bi-check-circle"></i> <span>{{$service['content']}}</span></li>
            </ul>
            <p>
                {{$service['content']}}
            </p>
          </div>

        </div>

      </div>

    </section><!-- /Service Details Section -->

</main>
@include('shared.footer')
