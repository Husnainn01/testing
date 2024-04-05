@extends('front.layouts.app_front')

@section('content')

<section>
	<div class="container-fluid  my-5">
		<div class="row ">

			<!-- left Column -->


			<div class="col-md-2 order-2 order-sm-2  order-md-1 first-side">
			@include('front.layouts.left_sidebar')

			</div>

			<!-- Middle Column -->

			<div class="col-md-10   order-md-2 order-lg-2 order-sm-1 order-1">

				<div class="row">
					<div class="col-md-3">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-lg-12 ">
							<h6><a href="{{route('front.home')}}" class="text-dark"> Home </a> > About Us > Company Profile</h6></div>
						</div>
					@include('front.layouts.about_leftsidebar')
					</div>
					<div class="col-md-9">
						<h2>SS Japan-A Reliable Source Of Car</h2>
						<p>We Started our operations in 2005 with local buying and selling.We Specialized in procurement of vehicles from local dealers in Japan.Now we have started to export vehicles around the globe.Our Mission is to provide 7 days & 24/7 competative service Affordable vehicles where the customer recive quality vehicles and service at a resonable price.We will offer a variety of choices to the customer.From Japan, Singapore, South Korea, UK , UAE, South Africa & Thailand will also serve the domestic services as well.</p>
						<h4>Our Mission </h4>
						<p>To continuously provide and improve better services to our customers globally and pursue customer’s satisfaction with constant efforts and passion in used and new automobile industry.</p>
						<h4>Our Vision</h4>
						<p>With the growth of developing countries and increasing cost of new vehicles with competitive prices, the needs for used automobiles have been and will be becoming greater and greater globally. Our worldwide services will assist and promote your business according to the global trend.</p>
						<h4>What We Are</h4>
						<p>SS JAPAN is one of the leading automobile trading companies whose headquarter is in Nagoya, Japan. Each automobile in our great inventory is purchased after careful inspection in Japan, by our experienced inspection staff, so any automobile that we have can be your best choice.When customer buys our vehicle from inventory or from auction house, it is sent to the customer in the shortest time possible through our smooth and prompt procedures. Registered customers on SS Japan website can participate in automobile auctions, where you may find your favorite car. Our discerning and experienced staff can bid for your selection in place of you. We perform thorough inspection for each vehicle, so you never have to worry the quality and condition of the vehicle.</p>
					   <div class="row">
					       <table class="table table-condensed">
					                   <tr>
                                            <td class="col-md-4 ps-md-2" style="background-color:rgba(0, 0, 0, 0.06);"><center style="display: flex">Company Name:</center> </td>
                                            <td class="ps-md-1"  style="  text-align: left;">SS Japan Co,. LTD</td>
                                        </tr>
                                        <tr ><td style=" margin:10px;"></td></tr>
					                    <tr>
                                            <td class="col-md-4 ps-md-1" style="background-color:rgba(0, 0, 0, 0.06);"><center style="display: flex">Foundation:</center> </td>
                                            <td class="ps-md-1"  style="  text-align: left;">Since 1998</td>
                                        </tr>
                         <!--               <tr style=" margin:20px;"><td></td></tr>-->
					                    <!--<tr>-->
                         <!--                   <td class="col-md-4 ps-md-1" style="background-color:rgba(0, 0, 0, 0.06);"><center style="display: flex">President & CEO:</center> </td> -->
                         <!--                   <td class="ps-md-1"  style="  text-align: left;">Sasaki Sufian Ahmad</td>-->
                         <!--               </tr>                                 -->
                                        <tr style=" margin:20px;"><td></td></tr>
					                    <tr>
                                            <td class="col-md-4 ps-md-1" style="background-color:rgba(0, 0, 0, 0.06);"><center style="display: flex">Head Office:</center> </td>
                                            <td class="ps-md-1"  style="  text-align: left;">1-1506, Nishifukuda, Minato-ku, Nagoya city, Aichi-ken, Japan 455-0874.</td>
                                        </tr>
                                        <tr style=" margin:20px;"><td></td></tr>
					                    <tr>
                                            <td class="col-md-4 ps-md-1" style="background-color:rgba(0, 0, 0, 0.06);"><center style="display: flex">Phone number:</center> </td>
                                            <td class="ps-md-1"  style="  text-align: left;">+81-52-387-9772</td>
                                        </tr>
                                        <tr style=" margin:20px;"><td></td></tr>
					                    <tr>
                                            <td class="col-md-4 ps-md-1" style="background-color:rgba(0, 0, 0, 0.06);"><center style="display: flex">Fax number:</center> </td>
                                            <td class="ps-md-1"  style="  text-align: left;">+81-52-387-9773</td>
                                        </tr>
                                        <tr style=" margin:20px;"><td></td></tr>
					                    <tr>
                                            <td class="col-md-4 ps-md-1" style="background-color:rgba(0, 0, 0, 0.06);"><center style="display: flex">Business Description:</center> </td>
                                            <td class="ps-md-1"  style="  text-align: left;">Export and Import of Used and New Automobiles and Machineries.</td>
                                        </tr>
                                        <tr style=" margin:20px;"><td></td></tr>
					                    <tr>
                                            <td class="col-md-4 ps-md-1" style="background-color:rgba(0, 0, 0, 0.06);"><center style="display: flex">Corporate Site:</center> </td>
                                            <td class="ps-md-1"  style="  text-align: left;">www.ss-japan.com</td>
                                        </tr>
                                        <tr style=" margin:20px;"><td></td></tr>
					                    <tr>
                                            <td class="col-md-4 ps-md-1" style="background-color:rgba(0, 0, 0, 0.06);"><center style="display: flex">Branches in Japan:</center> </td>
                                            <td class="ps-md-1"  style="  text-align: left;">Gunma Branch <br>2-1207-8-A202, Tabei-cho, Isesaki city, Gunma-ken, <br> Japan 379-2222.</td>
                                        </tr>
                                        <tr style=" margin:20px;"><td></td></tr>
					                    <tr>
                                            <td class="col-md-4 ps-md-1" style="background-color:rgba(0, 0, 0, 0.06);"><center style="display: flex">License of Secondhand Dealer Number:</center> </td>
                                            <td class="ps-md-1"  style="  text-align: left;">第　542631701400　号</td>
                                        </tr>
                                        <tr style=" margin:20px;"><td></td></tr>
					                    <tr>
                                            <td class="col-md-4 ps-md-1" style="background-color:rgba(0, 0, 0, 0.06);"><center style="display: flex">Nagoya Chamber of Commerce Membership:</center> </td>
                                            <td class="ps-md-1"  style="  text-align: left;">1247239</td>
                                        </tr>

                            </table>



                        </div>
					</div>


				</div>
			</div>


			<!-- Right Column -->



		</div>
	</div>


</section>


@endsection
