@extends('layouts.v_template')

@section('title', 'Home')

@section('content')
@include('layouts.v_hero')


<section id="testimonials" class="testimonials">
  <div class="container" data-aos="fade-up">

    {{-- <div class="section-title">
      <h2>Testimonials</h2>
      <p class="text-light">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem.
        Sit sint
        consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in
        iste officiis commodi quidem hic quas.</p>
    </div> --}}

    <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper-wrapper">

        <div class="swiper-slide">
          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Find out what you like doing best, and get someone to pay you for doing it.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="{{ asset('img/quotes') }}/Katharine.png" class="testimonial-img" alt="">
            <h3>Katharine Whitehorn</h3>
            <h4>British journalist and columnist</h4>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              The most common way people give up their power is by thinking they don’t have any.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="{{ asset('img/quotes') }}/Alice.png" class="testimonial-img" alt="">
            <h3>Alice Walker</h3>
            <h4>American novelist and short story writer
            </h4>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              The truth is that our finest moments are most likely to occur when we are feeling deeply uncomfortable,
              unhappy, or unfulfilled. For it is only in such moments, propelled by our discomfort, that we are likely
              to step out of our ruts and start searching for different ways or truer answers.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="{{ asset('img/quotes') }}/Scott.png" class="testimonial-img" alt="">
            <h3>M. Scott Peck</h3>
            <h4>American psychiatrist </h4>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              If you don’t feel it, flee from it. Go where you are celebrated, not merely tolerated.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="{{ asset('img/quotes') }}/Paul.jpeg" class="testimonial-img" alt="">
            <h3>Paul F. Davis</h3>
            <h4>writer, and broadcaster</h4>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-item">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              It does not matter how slowly you go as long as you do not stop.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="{{ asset('img/quotes') }}/Confucius.png" class="testimonial-img" alt="">
            <h3>Confucius</h3>
            <h4>Chinese philosopher
            </h4>
          </div>
        </div><!-- End testimonial item -->

      </div>
      <div class="swiper-pagination"></div>
    </div>

  </div>
</section><!-- End Testimonials Section -->

@endsection