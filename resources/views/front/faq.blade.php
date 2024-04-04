@extends('front.layouts.app_front')

@section('content')

<section>
    <div class="container-fluid px-md-5 px-lg-5 px-4  my-5">
        <div class="row ">

            <!-- left Column -->

          <div class="col-md-2 order-2 order-sm-2  order-md-1 left-sidebar">
            <div class=" first-side">
               @include('front.layouts.left_sidebar')

            </div>
		</div>

            <!-- Middle Column -->

            <div class="col-md-10   order-md-2 order-lg-2 order-sm-1 order-1">
           <h2 class="font-weight-bold theme-text my-3">Frequently Asked Questions</h2>
               	<div class="row">
					<div class="mainfaqs">
					  
						<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
						   <li class="nav-item" role="presentation">
							 <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Questions Related To all Topic</a>
						   </li>
						   <li class="nav-item" role="presentation">
							 <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">AUCTION SERVICE</a>
						   </li>
						   <li class="nav-item" role="presentation">
							 <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-lhd" aria-selected="false">PAYMENT</a>
						   </li>
						   <li class="nav-item" role="presentation">
							   <a class="nav-link" id="pills-others-tab" data-toggle="pill" href="#pills-others" role="tab" aria-controls="pills-others" aria-selected="false">SHIPMENT</a>
							 </li>
							 <li class="nav-item" role="presentation">
							   <a class="nav-link" id="pills-howtopay-tab" data-toggle="pill" href="#pills-howtopay" role="tab" aria-controls="pills-howtopay" aria-selected="false">MISCELLANEOUS QUESTIONS</a>
							 </li>
							 
						 </ul>
						 <div class="tab-content" id="pills-tabContent">
						   <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
									   <div class="row  px-4">
									   
									   <div class="accordion w-100" id="accordionExample">
									   
											   
									   
										   <div class="card row ">
											 <div class="card-header" id="heading1">
											   <h2 class="mb-0">
												 <a class="accordo-text btn-link btn-block text-left collapsed font-weight-bold" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
												   Q How do I buy a vehicle/machinery from SS Japan Limited?
												 </a>
											   </h2>
											 </div>
										 
											 <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordionExample">
											   <div class="card-body">
												   Once you have provided us with the necessary information regarding the vehicle you want, and have made the initial auction deposit, we can start searching and send you possible matches daily. Once you give us a go ahead to purchase, we will source your car.
											   </div>
											 </div>
										   </div>
   
										   <div class="card row ">
											   <div class="card-header" id="heading2">
												 <h2 class="mb-0">
												   <a class="accordo-text  btn-link btn-block text-left collapsed font-weight-bold" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
													   Q. Who takes care of getting my car ready for export and shipping it?
												   </a>
												 </h2>
											   </div>
										   
											   <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordionExample">
												 <div class="card-body">
												   We will prepare your vehicle for export to any port of your choosing and will handle all the booking and shipping process from Japan. Depending on your country and method of shipping, costs for transport will be confirmed.
												 </div>
											   </div>
											 </div>
   
   
											 <div class="card row ">
											   <div class="card-header" id="heading3">
												 <h2 class="mb-0">
												   <a class="accordo-text  btn-link btn-block text-left collapsed font-weight-bold" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
													   Q. What is the Auction Grading System?
												   </a>
												 </h2>
											   </div>
										   
											   <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordionExample">
												 <div class="card-body">
												   All vehicles sold at auction are given an overall grade by the independent auction engineers that inspect them. Grades can range from 0 to 9 but most auctions only use 0 to 5. This number is shown in either the top left or top right of the auction sheet.
												 </div>
											   </div>
											 </div>
   
											 <div class="card row ">
											   <div class="card-header" id="heading4">
												 <h2 class="mb-0">
												   <a class="accordo-text  btn-link btn-block text-left collapsed font-weight-bold" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
													   Q. How can I confirm about the quality of the car?
												   </a>
												 </h2>
											   </div>
										   
											   <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordionExample">
												 <div class="card-body">
												   We thoroughly inspect every vehicle to ensure highest quality possible, and provide only the most recent pictures of the vehicles to our customers for their satisfaction. Furthermore, our agents guide you extensively about the vehicle’s condition before and after you buy them.
												 </div>
											   </div>
											 </div>
   
											 <div class="card row ">
											   <div class="card-header" id="heading5">
												 <h2 class="mb-0">
												   <a class="accordo-text  btn-link btn-block text-left collapsed font-weight-bold" type="button" data-toggle="collapse" data-target="#collapse5" aria-expanded="true" aria-controls="collapse5">
													   Q. Does your buying team inspect the cars before bidding?
												   </a>
												 </h2>
											   </div>
										   
											   <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordionExample">
												 <div class="card-body">
												   Yes, we examine the car completely and once satisfied, we bid on your selected vehicles.
												 </div>
											   </div>
											 </div>
   
											
   
   
							   
										   
										 </div>
								   
								   </div>
						   </div>
						   <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
						   
											   
									   
										   <div class="card row ">
											 <div class="card-header" id="heading1">
											   <h2 class="mb-0">
												 <a class="accordo-text  btn-link btn-block text-left collapsed font-weight-bold" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
												   Q. When do I have to make the complete payment?
												 </a>
											   </h2>
											 </div>
										 
											 <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordionExample">
											   <div class="card-body">
												   You are required to make the complete payment after the bid is YEN(¥) or USD ($) , to avoid any delay in the shipment.
											   </div>
											 </div>
										   </div>
									   
										   
						   </div>
						   <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
						   
											   
									   
										   <div class="card row ">
											 <div class="card-header" id="heading2">
											   <h2 class="mb-0">
												 <a class="accordo-text  btn-link btn-block text-left collapsed font-weight-bold" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
												   Q. When will the car be shipped?
												 </a>
											   </h2>
											 </div>
										 
											 <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordionExample">
											   <div class="card-body">
												   We will ship your vehicle as soon as you complete the minimum deposit for shipment. It is 50%~100% of the Total C&F, which is required for the shipment to be processed.
											   </div>
											 </div>
										   </div>
						   
										   
						   </div>
						   <div class="tab-pane fade" id="pills-others" role="tabpanel" aria-labelledby="pills-others-tab">
   
											   
									   
										   <div class="card row ">
											 <div class="card-header" id="heading3">
											   <h2 class="mb-0">
												 <button class="accordo-text  btn-link btn-block text-left collapsed font-weight-bold" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
												   Q. How long will shipping take?
												 </button>
											   </h2>
											 </div>
										 
											 <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordionExample">
											   <div class="card-body">
												   We cannot commit an accurate time of shipment as it depends on shipping schedule and availability of space. On an average, it takes 4 to 6 weeks.
											   </div>
											 </div>
										   </div>
									   
										   
						   </div>
						   <div class="tab-pane fade" id="pills-howtopay" role="tabpanel" aria-labelledby="pills-howtopay">
						   
											   
									   
										   <div class="card row ">
											 <div class="card-header" id="heading4">
											   <h2 class="mb-0">
												 <a class="accordo-text  btn-link btn-block text-left collapsed font-weight-bold" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
												   Q. How long does it take for the documents to reach my country?
												 </a>
											   </h2>
											 </div>
										 
											 <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordionExample">
											   <div class="card-body">
												   Once shipment has departed, Original BL Scan will be supplied within 2-3 business days after the complete CNF payment is made.
											   </div>
											 </div>
										   </div>
								   
						   </div>
						 </div>	
					   </div>
								</div>
            </div>


            <!-- Right Column -->

           

        </div>
    </div>


</section>


@endsection
