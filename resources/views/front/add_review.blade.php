@extends('front.layouts.app_front')

@section('content')
@php
$g_setting = \App\Models\GeneralSetting::where('id',1)->first();
@endphp
<style>
    .star-rating i {
      font-size: 24px;
      color: gold;
      cursor: pointer;
    }
  </style>
<section>
	<div class="container-fluid">
		<div class="row">
            <div class="col-md-6 col-sm-12 col-lg-6" style="background: #FBFBFB;">
				<div class="py-5 text-center">
				  <h4 class="font-weight-bold">Add Client Review!</h4>

				  <div class="form">

					<form action="{{ route('submit-review') }}" method="post"   class="w-75 mob-full-width d-block m-auto px-5 py-4 shadow myform rounded">

@csrf
                                  <!-- Image URL Input -->
                                  <div class="form-group">
                                    <label for="imageInput">Image URL</label>
                                    <input name="img" type="file" class="w-100" id="imageInput" placeholder="Enter image URL">
                                  </div>

                                  <!-- Description Input -->
                                  <div class="form-group">
                                    <label for="descriptionInput">Description</label>
                                    <textarea name="description" class="w-100" id="descriptionInput" rows="4" placeholder="Enter your review"></textarea>
                                  </div>

                                  <!-- Star Rating Input -->
                                  <div class="form-group">
                                    <label for="ratingInput">Star Rating</label>
                                    <div class="star-rating" id="ratingInput">
                                      <i class="fas fa-star" data-rating="1"></i>
                                      <i class="fas fa-star" data-rating="2"></i>
                                      <i class="fas fa-star" data-rating="3"></i>
                                      <i class="fas fa-star" data-rating="4"></i>
                                      <i class="fas fa-star" data-rating="5"></i>
                                    </div>
                                    <!-- Hidden input to store the selected rating -->
                                    <input  type="hidden" name="rating" id="selectedRating">
                                  </div>

                                  <!-- Submit Button -->
                                  <button type="submit" class="btn-primary px-5 py-2">Submit Review</button>


					</form>


				  </div>
				</div>

			</div>
			<div class="col-md-6 col-sm-12 col-lg-6 " style="background:#FBFBFB;"><div class="py-5 text-center">
				<img src="https://assets.materialup.com/uploads/444427ae-92ba-4052-bb60-f144a3fc0c90/animated_teaser.gif" class="w-50 my-3" alt="logo">
				<h4 class="font-weight-bold">Why SS Japan?</h4>
				<p class="w-50 d-block m-auto">More than Decade in Business, Exported over 500,000 vehicles to more than 152 countries</p>

			</div>

		</div>

		</div>
	</div>
</section>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script>
 $(document).ready(function () {
    $('.star-rating i').on('click', function () {
      var rating = $(this).data('rating');
      $('#selectedRating').val(rating);
      // Reset all stars to empty
      $('.star-rating i').removeClass('fas').addClass('far');
      // Fill stars up to the selected rating
      $(this).prevAll().addBack().removeClass('far').addClass('fas');
    });
  });
</script>
@endsection
