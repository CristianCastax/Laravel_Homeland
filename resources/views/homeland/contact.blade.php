@extends('layouts.homeland')
@section('content')
    <div class="site-section">
        <div class="container">
        <div class="row">

            <div class="col-md-12 col-lg-8 mb-5">
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

            <form action="{{ route('contact_submit') }}" class="p-5 bg-white border" method="POST">
                @csrf
                <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                    <label class="font-weight-bold" for="name">Full Name</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Full Name" value="{{ old('name') }}">
                </div>
                </div>
                <div class="row form-group">
                <div class="col-md-12">
                    <label class="font-weight-bold" for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" value="{{ old('email') }}">
                </div>
                </div>
                <div class="row form-group">
                <div class="col-md-12">
                    <label class="font-weight-bold" for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" class="form-control" placeholder="Enter Subject" value="{{ old('subject') }}">
                </div>
                </div>
                <div class="row form-group">
                <div class="col-md-12">
                    <label class="font-weight-bold" for="message">Message</label>
                    <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Say hello to us">{{ old('message') }}</textarea>
                </div>
                </div>

                <div class="row form-group">
                <div class="col-md-12">
                    <input type="submit" value="Send Message" class="btn btn-primary  py-2 px-4 rounded-0">
                </div>
                </div>
            </form>
            </div>

            <div class="col-lg-4">
            <div class="p-4 mb-3 bg-white">
                <h3 class="h6 text-black mb-3 text-uppercase">Contact Info</h3>
                <p class="mb-0 font-weight-bold">Address</p>
                <p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>

                <p class="mb-0 font-weight-bold">Phone</p>
                <p class="mb-4"><a href="#">+1 232 3235 324</a></p>

                <p class="mb-0 font-weight-bold">Email Address</p>
                <p class="mb-0"><a href="#">youremail@domain.com</a></p>

            </div>

            </div>
        </div>
        </div>
    </div>

    <div class="site-section bg-light">
    <div class="container">
        <div class="row mb-5 justify-content-center">
        <div class="col-md-7">
            <div class="site-section-title text-center">
            <h2>Our Agents</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero magnam officiis ipsa eum pariatur labore fugit amet eaque iure vitae, repellendus laborum in modi reiciendis quis! Optio minima quibusdam, laboriosam.</p>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
            <div class="team-member">

                <img src="images/person_1.jpg" alt="Image" class="img-fluid rounded mb-4">

                <div class="text">

                <h2 class="mb-2 font-weight-light text-black h4">Megan Smith</h2>
                <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere blanditiis praesentium est. Totam atque corporis nisi, veniam non. Tempore cupiditate, vitae minus obcaecati provident beatae!</p>
                <p>
                    <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                    <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                    <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p>
                </div>

            </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
            <div class="team-member">

                <img src="images/person_2.jpg" alt="Image" class="img-fluid rounded mb-4">

                <div class="text">

                <h2 class="mb-2 font-weight-light text-black h4">Brooke Cagle</h2>
                <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, cumque vitae voluptates culpa earum similique corrupti itaque veniam doloribus amet perspiciatis recusandae sequi nihil tenetur ad, modi quos id magni!</p>
                <p>
                    <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                    <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                    <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p>
                </div>

            </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
            <div class="team-member">

                <img src="images/person_3.jpg" alt="Image" class="img-fluid rounded mb-4">

                <div class="text">

                <h2 class="mb-2 font-weight-light text-black h4">Philip Martin</h2>
                <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores illo iusto, inventore, iure dolorum officiis modi repellat nobis, praesentium perspiciatis, explicabo. Atque cupiditate, voluptates pariatur odit officia libero veniam quo.</p>
                <p>
                    <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                    <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                    <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p>
                </div>

            </div>
            </div>



        </div>
    </div>
  </div>

@endsection
