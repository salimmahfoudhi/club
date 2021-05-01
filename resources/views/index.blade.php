@extends('layouts.front')
@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background: url(assets/img/slide/slide-1.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Bienvenue à <span>Clubii</span></h2>
                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                <a href="" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background: url(assets/img/slide/slide-2.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated fanimate__adeInDown">Bienvenue à <span>Clubii</span></h2>
                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                <a href="" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background: url(assets/img/slide/slide-3.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Bienvenue à <span>Clubii</span></h2>
                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                <a href="" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>


  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Featured Section ======= -->

    <section id="featured" class="featured">
        <div class="container ">
            <div class="row"  >
                <div class="col-lg-6">
        @foreach($evenements as $evenement)
                        <div class="container ">
                        <div class="row icon-box"  >
                            <div class="col-lg-4">
                                <i class=""><a href="profil"><img src="{{ $evenement['banner']  }}" class="img-fluid imgpublication" alt=""></a></i>
                            </div>
                            <div class="col-lg-8">
                                <h3><a href="profil">{{ $evenement['name']  }}<br> {{ $evenement['date_and_time']  }}</a></h3>
                                <p>{{ $evenement['description']  }}</p>
                            </div>
                        </div>
                        </div>
        @endforeach
                </div>
                <div class="col-lg-6">
                    @foreach($formations as $formation)
                        <div class="container ">
                            <div class="row icon-box"  >
                                <div class="col-lg-4">
                                    <i class=""><a href="profil"><img src="{{ $formation['banner']  }}" class="img-fluid imgpublication" alt=""></a></i>
                                </div>
                                <div class="col-lg-8">
                                    <h3><a href="profil">{{ $formation['name']  }}<br> {{ $formation['date_and_time']  }}</a></h3>
                                    <p>{{ $formation['description']  }}</p>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>

    </section><!-- End Featured Section -->



      <section id="clients" class="clients">
          <div class="container">

              <div class="section-title">
                  <h2>Clients</h2>
                  <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
              </div>

              <div class="clients-slider swiper-container">
                  <div class="swiper-wrapper align-items-center">

                      @foreach($clubs as $club)

                      <div class="swiper-slide"><img src="{{$club['logo']}}" class="img-fluid" alt=""></div>


                                @endforeach
                  </div>
                  <div class="swiper-pagination"></div>
              </div>

          </div>
      </section><!-- End Clients Section -->

  </main><!-- End #main -->
@endsection

