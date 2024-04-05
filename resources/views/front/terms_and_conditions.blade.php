@extends('front.layouts.app_front')

@section('content')


<section>
	<div class="container-fluid px-md-5 px-lg-5  my-5 ">
		<div class="row left-sidebar">

			<!-- left Column -->

			<div class="col-md-2 order-2 order-sm-2  order-md-1 first-side">
				@include('front.layouts.left_sidebar')

			</div>
			<!-- Middle Column -->

			<div class="col-md-10 col-lg-10 col-sm-12 col-12 order-1 order-sm-1 order-md-2 order-lg-2  ">
		   
				<div class="row">
					<div class="col-md-3">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-lg-12">
							<h6><a href="{{route('front.home')}}" class="text-dark"> Home </a> > About Us > Terms of Conditions</h6>  
							@include('front.layouts.about_leftsidebar')
                        </div>  
						</div>
					
					</div>    
					<div class="col-md-9">
						<div class="row">
			  
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-12 col-sm-12 col-lg-12">
									   
										<h3 class="font-weight-bold my-3">Terms of Services</h3>
								  
									</div>
								</div>
					  
							   <div class="row">
								<div class="col-md-12 col-lg-12 col-sm-12">
			 
									<div class="" style="background:rgba(0, 0, 0, 0.06);;box-shadow: 0px 0px 4px rgb(0 0 0 / 12%);padding: 16px 16px 24px;margin-bottom: 24px;">
                                                <h5 class="font-weight-bold" style="color: var(--dark)"><i class="fas fa-caret-down fa-rotate-270 orange mr-2"></i>1. GENERAL
											 
												</h5><p class="pl-4 py-2">CSS JAPAN CO., LTD. (SS JAPAN) operates the website www.ss-japan.com (the site) in accordance with the following terms of use (terms). By using the site, you acknowledge you agree to these terms.
												</p>
                                    </div>

									<div class="" style="background:rgba(0, 0, 0, 0.06);;box-shadow: 0px 0px 4px rgb(0 0 0 / 12%);padding: 16px 16px 24px;margin-bottom: 24px;">
                                                <h5 class="font-weight-bold" style="color: var(--dark)"><i class="fas fa-caret-down fa-rotate-270 orange mr-2"></i>2. COPYRIGHT
											 
												</h5><p class="pl-4 py-2">Copyrights to all content on the site belong to SS JAPAN. Reproduction or use of content on the site is prohibited and is subject to legal action.
												</p>
                                    </div>

									<div class="" style="background:rgba(0, 0, 0, 0.06);;box-shadow: 0px 0px 4px rgb(0 0 0 / 12%);padding: 16px 16px 24px;margin-bottom: 24px;">
                                                <h5 class="font-weight-bold" style="color: var(--dark)"><i class="fas fa-caret-down fa-rotate-270 orange mr-2"></i>3. OTHER AGREEMENTS
											 
												</h5><p class="pl-4 py-2">These terms govern all transactions except where SS JAPAN signs a separate written contract with you. If SS JAPAN signs a contract with you, that contract will prevail wherever that contract and these terms differ.												</p>
                                    </div>
 
									<div class="" style="background:rgba(0, 0, 0, 0.06);;box-shadow: 0px 0px 4px rgb(0 0 0 / 12%);padding: 16px 16px 24px;margin-bottom: 24px;">
                                                <h5 class="font-weight-bold" style="color: var(--dark)"><i class="fas fa-caret-down fa-rotate-270 orange mr-2"></i>3. OTHER AGREEMENTS
											 
												</h5><p class="pl-4 py-2">These terms govern all transactions except where SS JAPAN signs a separate written contract with you. If SS JAPAN signs a contract with you, that contract will prevail wherever that contract and these terms differ.												</p>
                                    </div>
                                                                       
                                    <div class="" style="background:rgba(0, 0, 0, 0.06);;box-shadow: 0px 0px 4px rgb(0 0 0 / 12%);padding: 16px 16px 24px;margin-bottom: 24px;">
                                        <h5 class="font-weight-bold" style="color: var(--dark)"><i class="fas fa-caret-down fa-rotate-270 orangemr-2"></i>
                                    
                                    4. NON-ENGLISH TERMS
                                    
                                        </h5>
                                        <p class="pl-4 py-2">
                                    Only the English version of these terms is authoritative. Non-English translations are inoperative and intended for only convenience.
                                    
                                              
                                        </p>                          
                                    </div>
                                    
                                    
                                    <div class="" style="background:rgba(0, 0, 0, 0.06);;box-shadow: 0px 0px 4px rgb(0 0 0 / 12%);padding: 16px 16px 24px;margin-bottom: 24px;">
                                        <h5 class="font-weight-bold" style="color: var(--dark)"><i class="fas fa-caret-down fa-rotate-270 orangemr-2"></i>
                                        
                                    5. REGISTRATION
                                    
                                    
                                        </h5>
                                        <p class="pl-4 py-2">
                                    Customer account registration is required to make transactions. Registration is free. To register, you must provide SS JAPAN accurate, complete, and current information. SS JAPAN will not be liable for loss arising from wrong information.
                                    
                                    
                                              
                                        </p>                          
                                    </div>
                                    
                                    
                                    
                                    <div class="" style="background:rgba(0, 0, 0, 0.06);;box-shadow: 0px 0px 4px rgb(0 0 0 / 12%);padding: 16px 16px 24px;margin-bottom: 24px;">
                                        <h5 class="font-weight-bold" style="color: var(--dark)"><i class="fas fa-caret-down fa-rotate-270 orangemr-2"></i>
                                        
                                    6. PRICING AND SALE
                                    
                                        </h5>
                                        <p class="pl-4 py-2">
                                    Cars are priced in United States dollars or Japanese yen and, unless otherwise stated in writing, sold on CFR or FOB terms.
                                     
                                        </p>                          
                                    </div>
                                    
                                    
                                    
                                    <div class="" style="background:rgba(0, 0, 0, 0.06);;box-shadow: 0px 0px 4px rgb(0 0 0 / 12%);padding: 16px 16px 24px;margin-bottom: 24px;">
                                        <h5 class="font-weight-bold" style="color: var(--dark)"><i class="fas fa-caret-down fa-rotate-270 orangemr-2"></i>
                                        
                                    7. PAYMENT
                                    
                                    
                                        </h5>
                                        <p class="pl-4 py-2">
                                    Full or part payment is due three days after invoice issuance and is deemed paid on SS JAPAN’s receipt of your electronic funds transfer. For cars shipped on part payment, full payment is due three days after the carrier’s sailing BL copy is provided. Bank charges and other transaction costs are not included in the invoice price and payable by you.
                                    
                                     
                                        </p>                          
                                    </div>
                                    
                                    
                                    
                                    <div class="" style="background:rgba(0, 0, 0, 0.06);;box-shadow: 0px 0px 4px rgb(0 0 0 / 12%);padding: 16px 16px 24px;margin-bottom: 24px;">
                                        <h5 class="font-weight-bold" style="color: var(--dark)"><i class="fas fa-caret-down fa-rotate-270 orangemr-2"></i>
                                        
                                    8. DELIVERY AND SHIPPING
                                    
                                    
                                    
                                        </h5>
                                        <p class="pl-4 py-2">
                                    After full or part payment, SS JAPAN books shipping subject to carrier’s terms. The place of delivery is carrier’s facility. Risk passes to you on tender to the carrier. Carriers’ schedules are approximate, and SS JAPAN will not be liable for carrier delay, error, or nonperformance. You must comply with applicable import law and procedure, including limits to car age, class, and drive side. SS JAPAN will not be liable for noncompliance or denied entry. On receiving shipment, SS JAPAN advises checking and refilling engine oil, radiator coolant, and other consumables.
                                    
                                    
                                     
                                        </p>                          
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    <div class="" style="background:rgba(0, 0, 0, 0.06);;box-shadow: 0px 0px 4px rgb(0 0 0 / 12%);padding: 16px 16px 24px;margin-bottom: 24px;">
                                        <h5 class="font-weight-bold" style="color: var(--dark)"><i class="fas fa-caret-down fa-rotate-270 orangemr-2"></i>
                                        
                                    9. DOCUMENTS
                                    
                                    
                                    
                                    
                                        </h5>
                                        <p class="pl-4 py-2">
                                    Original transportation documents are released and sent to you only after full payment. You must make timely full payment for processing and sending before shipment POD arrival. SS JAPAN will not be liable for loss arising from damaged, delayed, erroneous, lost, non-amended, non-issued, or retained documents.
                                    
                                    
                                    
                                     
                                        </p>                          
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                    <div class="" style="background:rgba(0, 0, 0, 0.06);;box-shadow: 0px 0px 4px rgb(0 0 0 / 12%);padding: 16px 16px 24px;margin-bottom: 24px;">
                                        <h5 class="font-weight-bold" style="color: var(--dark)"><i class="fas fa-caret-down fa-rotate-270 orangemr-2"></i>
                                        
                                    10. NONPAYMENT AND CANCELATION
                                    
                                    
                                    
                                    
                                    
                                        </h5>
                                        <p class="pl-4 py-2">
                                    If you fail to pay SS JAPAN the full invoice price by three days after the carrier’s sailing BL copy, the car will be deemed unpaid, and you might forfeit any part payment. SS JAPAN is entitled to possession of and may resell an unpaid car. After SS JAPAN tenders a car to the carrier, the order becomes noncancelable.
                                    
                                    
                                    
                                    
                                     
                                        </p>                          
                                    </div>
                                    
                                    
                                    
                                    
                                    <div class="" style="background:rgba(0, 0, 0, 0.06);;box-shadow: 0px 0px 4px rgb(0 0 0 / 12%);padding: 16px 16px 24px;margin-bottom: 24px;">
                                        <h5 class="font-weight-bold" style="color: var(--dark)"><i class="fas fa-caret-down fa-rotate-270 orangemr-2"></i>
                                        
                                    11. SITE CONTENT
                                    
                                    
                                    
                                    
                                    
                                    
                                        </h5>
                                        <p class="pl-4 py-2">
                                    SS JAPAN exercises due care in posting information on the site; however, SS JAPAN makes no warranty of completeness, accuracy, validity, or safety thereof. SS JAPAN will not be liable for loss arising from decisions or actions taken by you reliant on information posted on the site.
                                    
                                    
                                    
                                    
                                    
                                     
                                        </p>                          
                                    </div>
                                    
                                    
                                    
                                    <div class="" style="background:rgba(0, 0, 0, 0.06);;box-shadow: 0px 0px 4px rgb(0 0 0 / 12%);padding: 16px 16px 24px;margin-bottom: 24px;">
                                        <h5 class="font-weight-bold" style="color: var(--dark)"><i class="fas fa-caret-down fa-rotate-270 orangemr-2"></i>
                                        
                                    12. NONPARTY PROVIDERS
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                        </h5>
                                        <p class="pl-4 py-2">
                                    You acknowledge nonparty service providers, including banks and carriers, are not controlled by or related to SS JAPAN, and SS JAPAN will not be liable for loss arising from their use, to a car in nonparty custody, or for nonparty delay, error, or nonperformance.
                                    
                                    
                                    
                                    
                                    
                                    
                                     
                                        </p>                          
                                    </div>
                                    
                                    
                                    
                                    <div class="" style="background:rgba(0, 0, 0, 0.06);;box-shadow: 0px 0px 4px rgb(0 0 0 / 12%);padding: 16px 16px 24px;margin-bottom: 24px;">
                                        <h5 class="font-weight-bold" style="color: var(--dark)"><i class="fas fa-caret-down fa-rotate-270 orangemr-2"></i>
                                        
                                    13. WARRANTY
                                    
                                        </h5>
                                        <p class="pl-4 py-2">
                                    SS JAPAN offers the site and cars as is without warranting fitness for your particular purpose and merchantability. SS JAPAN warrants only that cars correspond to descriptions on the site, and a car is deemed defective only if not corresponding to description. SS JAPAN will not be liable for disclosed car defects.
                                    
                                        </p>                          
                                    </div>
                                    
                                    
                                    
                                    
                                    <div class="" style="background:rgba(0, 0, 0, 0.06);;box-shadow: 0px 0px 4px rgb(0 0 0 / 12%);padding: 16px 16px 24px;margin-bottom: 24px;">
                                        <h5 class="font-weight-bold" style="color: var(--dark)"><i class="fas fa-caret-down fa-rotate-270 orangemr-2"></i>
                                        
                                    14. LIMITED LIABILITY
                                    
                                        </h5>
                                        <p class="pl-4 py-2">
                                    SS JAPAN will not be liable for more than the invoice price of the subject car(s); consequential, indirect, or punitive damages; or lost business, profit, or use
                                    
                                        </p>                          
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    <div class="" style="background:rgba(0, 0, 0, 0.06);;box-shadow: 0px 0px 4px rgb(0 0 0 / 12%);padding: 16px 16px 24px;margin-bottom: 24px;">
                                        <h5 class="font-weight-bold" style="color: var(--dark)"><i class="fas fa-caret-down fa-rotate-270 orangemr-2"></i>
                                        
                                    15. INDEMNITY
                                    
                                        </h5>
                                        <p class="pl-4 py-2">
                                    You shall indemnify SS JAPAN for loss arising from your breach of these terms, negligence, wrongdoing, or violation of contract or third-party rights or law.
                                    
                                        </p>                          
                                    </div>
                                    
                                    
                                    
                                    <div class="" style="background:rgba(0, 0, 0, 0.06);;box-shadow: 0px 0px 4px rgb(0 0 0 / 12%);padding: 16px 16px 24px;margin-bottom: 24px;">
                                        <h5 class="font-weight-bold" style="color: var(--dark)"><i class="fas fa-caret-down fa-rotate-270 orangemr-2"></i>
                                        
                                    16. ANTICORRUPTION
                                    
                                        </h5>
                                        <p class="pl-4 py-2">
                                    SS JAPAN complies with the Japan Unfair Competition Prevention Act, OECD Convention on Combating Bribery of Foreign Public Officials, and other anti-corruption applicable law. Any contravening transaction of prohibited.
                                        </p>                          
                                    </div>
                                    
                                    
                                    
                                    
                                    <div class="" style="background:rgba(0, 0, 0, 0.06);;box-shadow: 0px 0px 4px rgb(0 0 0 / 12%);padding: 16px 16px 24px;margin-bottom: 24px;">
                                        <h5 class="font-weight-bold" style="color: var(--dark)"><i class="fas fa-caret-down fa-rotate-270 orangemr-2"></i>
                                        
                                    17. ANTI-SOCIAL FORCES
                                    
                                    
                                        </h5>
                                        <p class="pl-4 py-2">
                                    SS JAPAN never deals with organized crime and takes measures to prevent anti-social transactions, including screening business partners for anti-social affiliations and including terms excluding anti-social forces in procurement and sales contracts. Any contravening transaction is prohibited.
                                    
                                        </p>                          
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                    <div class="" style="background:rgba(0, 0, 0, 0.06);;box-shadow: 0px 0px 4px rgb(0 0 0 / 12%);padding: 16px 16px 24px;margin-bottom: 24px;">
                                        <h5 class="font-weight-bold" style="color: var(--dark)"><i class="fas fa-caret-down fa-rotate-270 orangemr-2"></i>
                                        
                                    18. SECURITY EXPORT CONTROL
                                    
                                        </h5>
                                        <p class="pl-4 py-2">
                                    SS JAPAN complies with Japan Foreign Exchange and Foreign Trade Act export controls, including list controls and catch-all controls and other applicable laws and regulations to prevent illegal weapons development. Any contravening transaction is prohibited.
                                    
                                        </p>                          
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    <div class="" style="background:rgba(0, 0, 0, 0.06);;box-shadow: 0px 0px 4px rgb(0 0 0 / 12%);padding: 16px 16px 24px;margin-bottom: 24px;">
                                        <h5 class="font-weight-bold" style="color: var(--dark)"><i class="fas fa-caret-down fa-rotate-270 orangemr-2"></i>
                                        
                                    19. MISCELLANEOUS
                                    
                                        </h5>
                                        <p class="pl-4 py-2">
                                    These terms constitute the entire agreement between you “Registered customer” and SS JAPAN, and a forbearance in exercising or requiring satisfaction of a provision, act, omission, or course of dealing will not waive a right, remedy, or condition. If part of these terms is held unenforceable, the rest remains effective as written except where held unenforceable. These terms are governed and ad judicable by only the laws and courts of Japan.
                                        </p>                          
                                    </div>

                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
									<!--<ul class="list-unstyled">-->
									 
									<!--		<li><h5 class="font-weight-bold"><i class="fas fa-caret-down fa-rotate-270 orange mr-2"></i>Copy Right-->
											 
									<!--			</h5 class="font-weight-bold"><p class="pl-4 py-2">Copyrights to all content on the site belong to ss Japan. Reproduction or use-->
									<!--				of content on the site is prohibited-->
									<!--			</p>-->
									<!--			</li>-->
									<!--			<li><h5 class="font-weight-bold"><i class="fas fa-caret-down fa-rotate-270 orange mr-2"></i>OTHER AGREEMENTS-->

	
									<!--				</h5 class="font-weight-bold"><p class="pl-4 py-2">These terms govern all transactions except where ss Japan signs a separate-->
									<!--					written contract with you. If ss Japan signs a contract with you, that contract-->
									<!--					will prevail wherever that contract and these terms dier.-->
														
									<!--				</p></li>-->
									<!--				<li><h5 class="font-weight-bold"><i class="fas fa-caret-down fa-rotate-270 orange mr-2"></i>NON-ENGLISH TERMS-->

	
									<!--				</h5 class="font-weight-bold"><p class="pl-4 py-2">Only the English version of these terms is authoritative. Non-English-->
									<!--					translations are inoperative and intended for only convenience.-->
														
									<!--				</p></li>-->
									<!--				<li><h5 class="font-weight-bold"><i class="fas fa-caret-down fa-rotate-270 orange mr-2"></i>REGISTRATION-->

	
									<!--				</h5 class="font-weight-bold"><p class="pl-4 py-2">Customer account registration is required to make transactions.-->
									<!--					Registration is free. To register, you must provide ss Japan accurate,-->
									<!--					complete, and current information. ss Japan will not be liable for loss arising-->
									<!--					from wrong information.-->
														
									<!--				</p></li>-->
									<!--				<li><h5 class="font-weight-bold"><i class="fas fa-caret-down fa-rotate-270 orange mr-2"></i>PRICING AND SALE-->

	
									<!--				</h5 class="font-weight-bold"><p class="pl-4 py-2">Cars are priced in United States dollars or Japanese yen and, unless-->
									<!--					otherwise stated in writing, sold on CFR or FOB terms.-->
														
														
									<!--				</p></li>-->
									<!--								  <li><h5 class="font-weight-bold"><i class="fas fa-caret-down fa-rotate-270 orange mr-2"></i>PAYMENT-->

	
									<!--				</h5 class="font-weight-bold"><p class="pl-4 py-2">Full or part payment is due seven days after invoice issuance and is-->
									<!--					deemed paid on SBT’s receipt of your electronic funds transfer. For cars-->
									<!--					shipped on part payment, full payment is due seven days after the-->
									<!--					carrier’s sailing date. Bank charges and other transaction costs are not-->
									<!--					included in the invoice price and payable by you-->
									<!--				</p></li>-->
									<!--				<li><h5 class="font-weight-bold"><i class="fas fa-caret-down fa-rotate-270 orange mr-2"></i>DELIVERY AND SHIPPING-->

	
									<!--				</h5 class="font-weight-bold"><p class="pl-4 py-2">After full or part payment, ss Japan books shipping subject to carrier’s terms.-->
									<!--					The place of delivery is carrier’s facility. Risk passes to you on tender to-->
									<!--					the carrier. Carriers’ schedules are approximate, and ss Japan JAPAN will not-->
									<!--					be liable for carrier delay, error, or nonperformance. You must comply with-->
									<!--					applicable import law and procedure, including limits to car age, class,-->
									<!--					and drive side. ss Japan will not be liable for noncompliance or denied entry.-->
									<!--					On receiving shipment, ss Japan JAPAN advises checking and refilling engine-->
									<!--					oil, radiator coolant, and other consumables-->
									<!--				</p></li>-->
									<!--				<li><h5 class="font-weight-bold"><i class="fas fa-caret-down fa-rotate-270 orange mr-2"></i>DOCUMENTS-->

	
									<!--				</h5 class="font-weight-bold"><p class="pl-4 py-2">Original transportation documents are released and sent to you only-->
									<!--					after full payment. You must make timely full payment for processing and-->
									<!--					sending before shipment POD arrival. ss Japan will not be liable for loss-->
									<!--				</p></li>-->
									<!--</ul>-->
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
