@extends('layouts.homeland')
@section('content')
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{asset('images/hero_bg_2.jpg')}});" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center">
        <div class="col-md-10">
          <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Property Details of</span>
          <h1 class="mb-2">{{ $property->address }}</h1>
          <p class="mb-5"><strong class="h2 text-success font-weight-bold">{{ $property->price }}</strong></p>
        </div>
      </div>
    </div>
</div>

  <div class="site-section site-section-sm">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div>
            <div class="slide-one-item home-slider owl-carousel">
              @foreach (json_decode($property->images) as $img)
                <div>
                  <img src="{{asset('images/'.$img)}}" alt="Image" class="img-fluid"></div>
              @endforeach

            </div>
          </div>
          <div class="bg-white property-body border-bottom border-left border-right">
            <div class="row mb-5">
              <div class="col-md-6">
                <strong class="text-success h1 mb-3">{{ $property->getPriceAsCurrency() }}</strong>
              </div>
              <div class="col-md-6">
                <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                <li>
                  <span class="property-specs">Beds</span>
                  <span class="property-specs-number">{{ $property->bedrooms }}<sup>+</sup></span>

                </li>
                <li>
                  <span class="property-specs">Baths</span>
                  <span class="property-specs-number">{{ $property->bathrooms }}</span>

                </li>
                <li>
                  <span class="property-specs">SQ FT</span>
                  <span class="property-specs-number">{{ $property->sq_ft }}</span>

                </li>
              </ul>
              </div>
            </div>
            <div class="row mb-5">
              <div class="col-md-6 col-lg-3 text-center border-bottom border-top py-3">
                <span class="d-inline-block text-black mb-0 caption-text">Home Type</span>
                <strong class="d-block">{{ $property->listType->name }}</strong>
              </div>
              <div class="col-md-6 col-lg-3 text-center border-bottom border-top py-3">
                <span class="d-inline-block text-black mb-0 caption-text">Year Built</span>
                <strong class="d-block">{{ $property->year_built }}</strong>
              </div>
              <div class="col-md-6 col-lg-3 text-center border-bottom border-top py-3">
                <span class="d-inline-block text-black mb-0 caption-text">Price/Sqft</span>
                <strong class="d-block">{{ $property->getPriceBySquareFeet() }}</strong>
              </div>
              <div class="col-md-6 col-lg-3 text-center border-bottom border-top py-3">
                <span class="d-inline-block text-black mb-0 caption-text">City</span>
                <strong class="d-block">{{ $property->city->name }}</strong>
              </div>
            </div>
            <h2 class="h4 text-black">More Info</h2>
            <p>{{ $property->description }}</p>

            <div class="row no-gutters mt-5">
              <div class="col-12">
                <h2 class="h4 text-black mb-3">Gallery</h2>
              </div>

              @foreach (json_decode($property->images) as $img)
              <div class="col-sm-6 col-md-4 col-lg-3">
                <a href="{{asset('images/'.$img)}}" class="image-popup gal-item">
                    <img src="{{asset('images/'.$img)}}" alt="Image" class="img-fluid">
                </a>
             </div>
              @endforeach
            </div>
          </div>
        </div>

        <div class="col-lg-4">

          <div class="bg-white widget border rounded">

            <h3 class="h4 text-black widget-title mb-3">Contact Agent</h3>
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div id="successAlert" class="alert alert-success d-none">
                Contact message has been send
            </div>

            <form action="" id="formContactAgent" class="form-contact-agent" method="POST">
              @csrf
              <input type="hidden" id="property_id" name="property_id" value="{{ $property->id }}">

              <div class="form-group">
                <label for="contact_name">Name</label>
                <input type="text" id="contact_name" name="contact_name" class="form-control" value="{{ old('contact_name') }}">
              </div>
              <div class="form-group">
                <label for="contact_email">Email</label>
                <input type="email" id="contact_email" name="contact_email" class="form-control" value="{{ old('contact_email') }}">
              </div>
              <div class="form-group">
                <label for="contact_phone">Phone</label>
                <input type="text" id="contact_phone" name="contact_phone" class="form-control" value="{{ old('contact_phone') }}">
              </div>
              <div class="form-group">
                <label for="contact_message">Mensaje</label>
                <textarea id="contact_message" name="contact_message" class="form-control" rows="5">{{ old('contact_message') }}</textarea>
              </div>
              <div class="form-group">
                <input type="submit" id="btnSendContactAgentMessage" class="btn btn-primary" value="Send Message">
              </div>
            </form>
          </div>

          <div class="bg-white widget border rounded">
            <h3 class="h4 text-black widget-title mb-3 ml-0">Share</h3>
                <div class="px-3" style="margin-left: -15px;">
                  <a href="https://www.facebook.com/sharer/sharer.php?u=&quote=" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                  <a  href="https://twitter.com/intent/tweet?text=&url=" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                  <a href="https://www.linkedin.com/sharing/share-offsite/?url=" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                </div>
          </div>

        </div>

      </div>
    </div>
  </div>

  <div class="site-section site-section-sm bg-light">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="site-section-title mb-5">
            <h2>Reviews</h2>
          </div>
        </div>
    </div>
  </div>



<div class="container">
  <section>
    <div class="row d-flex justify-content-center">
        <div class="col-md-10 col-xl-8 text-center">
            <h3 class="mb-4">Testimonials</h3>
            <p class="mb-4 pb-2 mb-md-5 pb-md-0">
                Opiniones de usuarios
            </p>
        </div>
    </div>

    <div class="row text-center">
        @foreach ($ratings as $rating)
        <div class="col-md-4 mb-5 mb-md-0">
            <div class="d-flex justify-content-center mb-4">
                <img src="{{asset('images/icono.jpeg')}}" class="rounded-circle shadow-1-strong" width="150" height="150" />
            </div>
            <p class="text-muted mb-4">{{ $rating->created_at->format('d-m-Y') }}</p> <!-- Aquí se muestra la fecha -->
            <h5 class="mb-3">{{ $rating->name }}</h5>
            <h6 class="text-primary mb-3">{{ $rating->email }}</h6>
            <p class="px-xl-3">
                <i class="fas fa-quote-left pe-2"></i>{{ $rating->opinion }}
            </p>

            <ul class="list-unstyled d-flex justify-content-center mb-0">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $rating->rating)
                        <li><i class="fas fa-star fa-sm text-warning"></i></li>
                    @else
                        <li><i class="far fa-star fa-sm text-warning"></i></li>
                    @endif
                @endfor
            </ul>
        </div>
        @endforeach
     </div>
  </section>
</div>

  <div class="site-section site-section-sm bg-light">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="site-section-title mb-5">
            <h2>Reviews</h2>

            <div class="col-lg-10 ">

                <div class="bg-white widget border rounded">

                  <h3 class="h4 text-black widget-title mb-3">Deja tu opinión</h3>
                  @if(session()->has('message'))
                  <div class="alert alert-success">
                      {{ session()->get('message') }}
                  </div>
                  @endif

                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif

                  <form action="{{ route('ratings', $property->id) }}" class="form-review" method="POST">
                    @csrf
                    <input type="hidden" name="property_id" value="{{ $property->id }}">


                    <div class="form-group">
                      <label for="rating_name">Name</label>
                      <input type="text" id="rating_name" name="rating_name" class="form-control" value="{{ old('rating_name') }}">
                    </div>
                    <div class="form-group">
                      <label for="rating_email">Email</label>
                      <input type="email" id="rating_email" name="rating_email" class="form-control" value="{{ old('rating_email') }}">
                    </div>
                    <div class="form-group">
                      <label for="rating_opinion">Opinion</label>
                      <textarea id="rating_opinion" name="rating_opinion" class="form-control" rows="5">{{ old('rating_opinion') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="rating_stars">Puntaje</label>
                        <div class="rating">
                            <label>
                              <input type="radio" name="rating_stars" value="1" {{ old('rating_stars') == '1' ? 'checked' : '' }}/>
                              <span class="icon">★</span>
                            </label>
                            <label>
                              <input type="radio" name="rating_stars" value="2" {{ old('rating_stars') == '2' ? 'checked' : '' }}/>
                              <span class="icon">★</span>
                              <span class="icon">★</span>
                            </label>
                            <label>
                              <input type="radio" name="rating_stars" value="3" {{ old('rating_stars') == '3' ? 'checked' : '' }} />
                              <span class="icon">★</span>
                              <span class="icon">★</span>
                              <span class="icon">★</span>
                            </label>
                            <label>
                              <input type="radio" name="rating_stars" value="4" {{ old('rating_stars') == '4' ? 'checked' : '' }}/>
                              <span class="icon">★</span>
                              <span class="icon">★</span>
                              <span class="icon">★</span>
                              <span class="icon">★</span>
                            </label>
                            <label>
                              <input type="radio" name="rating_stars" value="5" {{ old('rating_stars') == '5' ? 'checked' : '' }}/>
                              <span class="icon">★</span>
                              <span class="icon">★</span>
                              <span class="icon">★</span>
                              <span class="icon">★</span>
                              <span class="icon">★</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                      <input type="submit" id="submit_review" class="btn btn-primary" value="Send review">
                    </div>

                  </form>
                </div>

              </div>
          </div>
        </div>
    </div>
  </div>


@endsection
