@extends('front.layouts.app_front')

@section('content')

<section>
	<div class="container-fluid px-md-5 px-lg-5  my-5">
		<div class="row left-sidebar">

			<!-- left Column -->
			<div class="col-md-2 order-2 order-sm-2  order-md-1 first-side">
				
			@include('front.layouts.left_sidebar')

			</div>

			<!-- Middle Column -->

			<div class="col-md-10 col-lg-10 col-sm-12 col-12  order-1 order-sm-1 order-md-2 order-lg-2">
		   
				<div class="row">
					<div class="col-md-3">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-lg-12">
							<h6>Home > About Us > Privacy & Policy</h6></div>    
						</div>
						@include('front.layouts.about_leftsidebar')
					</div>    
					<div class="col-md-9">
						<h2 class="fw-bold">Privacy & Policy</h2>
						<p>At XYZ Online Car Company, we are committed to protecting the privacy and security of our customers' personal information. This Privacy Policy outlines how we collect, use, disclose, and protect the information you provide when using our online car selling services. When you create an account or purchase a car through our platform, we collect personal information such as your name, contact details, address, email address, and payment information. We may also collect additional information related to your vehicle. We use this information to facilitate the car selling process, provide customer support, improve our services, and comply with legal obligations. We do not sell or share your personal information with third parties for marketing purposes without your explicit consent. We maintain appropriate security measures to protect your information from unauthorized access, disclosure, or misuse. By using our services, you acknowledge and consent to the collection, use, and disclosure of your personal information as described in this Privacy Policy. If you have any questions or concerns about our privacy practices, please contact us at [contact information].</p>
					<!--start-->
					<div class="privacy-policy-content">
                <!-- privacy-policy-box -->
                <div class="privacy-policy-box">
                    <p>SS JAPAN CO., LTD. (“SS JAPAN”) recognizes the importance of social responsibility that it truthfully works to meet the needs of its customers and to contribute to the society. The Personal Information obtained from customers
                        during business activities are an important asset of the customers and of SS JAPAN as it leads to creation of new value. SS JAPAN protects Personal Information from information security threats with the following Basic
                        Policy and meets its customer’s expectations on its reliability as a company, SS JAPAN is committed to the responsible handling of Personal Information.
                    </p>
                </div>
                <!--<div class="personal-info-protection d-lg-flex justify-content-between">-->
                <!--    <div class="img-box">-->
                <!--        <img src="../assets/images/about-us/privacy-policy.png" alt="image">-->
                <!--    </div>-->
                <!--    <div class="privacy-policy-box">-->
                <!--        <p class="mb-3 fw-bold">Personal Information Protection Policy:</p>-->
                <!--        <p class="mb-3">1. SS JAPAN has established a management framework to protect Personal Information, and assigned a person to “Personal Information Protection Administrator” position and implemented the appropriate protection of it.</p>-->
                <!--        <p class="mb-3">2. SS JAPAN utilizes Personal Information within the scope of the intended use that is clearly communicated to customers and takes measures not to be used beyond the scope. SS JAPAN does not disclose or provide Personal-->
                <!--            Information provided by customers to third parties except with the consent of the customer from whom the Personal Information was obtained or when there is a legitimate reason.-->
                <!--        </p>-->
                <!--        <p class="mb-3">3. SS JAPAN strives to prevent unauthorized access to Personal Information or the leakage, loss, or damage of Personal Information and continually enhances, remediates and manages information security.</p>-->
                <!--        <p>4. SS JAPAN responds to inquiries concerning Personal Information or requests from customers for disclosure of their Personal Information sincerely and without delay.</p>-->
                <!--    </div>-->
                <!--</div>-->
                <!-- privacy-policy-box -->
                <div class="privacy-policy-box">
                    <p class="question">1. Personal Information</p>
                    <p>Personal Information means information concerning a User as an individual, which can identify the User based on the name, address, telephone number, e-mail address, educational institution, or other descriptions, etc. constituting
                        such information. In addition, any information which cannot identify the User solely by itself but can easily be collated with other information and, as a result thereof, can identify the User, is also included in the
                        scope of Personal Information. <br> ” Personal Information” is described in this Privacy Policy exclude Specific Personal Information, etc.
                    </p>
                </div>
                <!-- privacy-policy-box -->
                <div class="privacy-policy-box">
                    <p class="question">2. Purpose of Use of Personal Information</p>
                    <p class="mb-3">SS JAPAN will use Personal Information within the scope of the purposes provided in the Purpose of Use. The Purpose of Use is specifically defined and made clear to our customers and is announced on our website as shown
                        below. SS JAPAN will try to limit the Purpose of Use according to the situation in which the information is obtained.
                    </p>
                    <p> 1. Achieving the Purpose of Use of our service and business. <br> 2. Notices of service, etc. to its customers. <br> 3. Giving notice to shareholders, provision of various types of information and shareholder management
                        <br> 4. Exercise of rights or performance of obligations based on Act of Japan and other relevant laws and ordinances <br> 5. Responding to inquiries, requests, etc. from its customers <br> 6. Carrying out operations
                        incidental to (1) through (5) above and operations to properly and smoothly manage the business of SS JAPAN
                    </p>
                </div>
                <!-- privacy-policy-box -->
                <div class="privacy-policy-box">
                    <p class="question">3. Provision of Personal Data to Third Parties</p>
                    <p class="mb-3">SS JAPAN will not provide Personal Information to a third party without the customer’s consent, unless where any of the following applies:</p>
                    <p> required under laws or ordinances; <br> required to protect human life, body or asset (including that of legal entities) and difficult to obtain the approval by the customer him/herself; <br> made to a consignee within
                        the scope necessary for carrying out our business <br> to use Personal Information jointly with a group company or a business partner of SS JAPAN within the scope of the intended use; <br> to provide, in an unrecoverable
                        format, Personal Information in a format that does not allow easy identification or recognition of the corresponding individual.
                    </p>
                </div>
                <!-- privacy-policy-box -->
                <div class="privacy-policy-box">
                    <p class="question">4. Disclaimer concerning the provision of Personal Information to third parties</p>
                    <p class="mb-3">Personal Information by a third party where any of the following applies:</p>
                    <p> A User indicates his/her own Personal Information to a specific company, using any function under the Services or by other means (As for the handling of Personal Information in the Service Using Companies, etc., please
                        directly make inquiries to each of the Service Using Companies, etc.); <br> A User is unexpectedly identified by information entered by the User under the Services; <br> A User provides Personal Information to, and
                        the User’s Personal Information is used at, an external site linked by the Services or <br> Anyone other than a User obtains the User’s information (ID, password, etc.) which can identify the User as an individual.
                        <br> Additionally, to above, Personal Information is leaked by computer viruses or similar causes.
                    </p>
                </div>
                <!-- privacy-policy-box -->
                <div class="privacy-policy-box">
                    <p class="question">5. Supervision of contractors</p>
                    <p>SS JAPAN may consign all or part of our customer’s Personal Information handling operation. In such a case, SS JAPAN elects a contractor who is expected to properly handle Personal Information, appropriately specify matters
                        concerning handling of Personal Information such as Security Management Measures, confidentiality, terms of use of reconsignment, return of Personal Information upon expiration or termination of contract agreement,
                        and performs necessary and appropriate supervision.
                    </p>
                </div>
                <!-- privacy-policy-box -->
                <div class="privacy-policy-box">
                    <p class="question">6. Handling of Sensitive Information</p>
                    <p>SS JAPAN will not collect, use, or provide to a third-party Sensitive Information, including but not limited to information regarding your healthcare or case history, except for cases provided by the Privacy Act, other
                        relevant laws, ordinances and guidelines.
                    </p>
                </div>
                <!-- privacy-policy-box -->
                <div class="privacy-policy-box">
                    <p class="question">7. Handling of Specific Personal Information, etc.</p>
                    <p>The Purpose of Use of Specific Personal Information, etc. is limited under the “My Number” Act, and SS JAPAN will not collect or use Specific Personal Information, etc. beyond the prescribed Purpose of Use. <br> We will
                        not provide Specific Personal Information, etc. to a third party except in cases permitted under the “My Number” Act.
                    </p>
                </div>
                <!-- privacy-policy-box -->
                <div class="privacy-policy-box">
                    <p class="question">8. Notice of Matters, Disclosure, Amendment, or Suspension of Use of Personal Information and Specific Personal Information, etc.</p>
                    <p>Customer requests for any notice of matters, disclosure, amendment, or suspension of use of Personal Information and Specific Personal Information, etc. held by SS JAPAN under the Privacy Act shall be directed to the “Contact
                        Office” indicated in Clause 11 below. After confirming the customer as the requesting party, the customer is requested to complete a form designated by us. SS JAPAN will then follow the procedures and, in principle,
                        provide a written response in a proper, timely manner. SS JAPAN will charge the prescribed fees for responding to a request for any disclosure.
                    </p>
                </div>
                <!-- privacy-policy-box -->
                <div class="privacy-policy-box">
                    <p class="question">9. Use of Cookies</p>
                    <p>SS JAPAN uses cookies provide better services on its websites. Please see our cookie policy.</p>
                </div>
                <!-- privacy-policy-box -->
                <div class="privacy-policy-box">
                    <p class="question">10. Management of Personal Data and Specific Personal Information, etc.</p>
                    <p>SS JAPAN will take a rational security measures to manage Personal Information and Specific Personal Information, etc. securely and to prevent divulgence, loss or damage to Personal Information and Specific Personal Information,
                        etc. handled by SS JAPAN, and will ensure the accuracy and prompt updating of Personal Information and Specific Personal Information, etc. which are necessary to achieve the Purpose of Use.
                    </p>
                </div>
                <!-- privacy-policy-box -->
                <div class="privacy-policy-box">
                    <p class="question">11. Contact Information</p>
                    <p class="mb-3">SS JAPAN will appropriately and immediately respond to any complaint or consultation regarding the handling of Personal Information and Specific Personal Information, etc. <br> If you have any inquiry or matter for consultation
                        regarding the handling of Personal Information and Specific Personal Information, etc. by us, please contact the office indicated below.
                    </p>
                    <p>Contact Office <br> SS JAPAN CO., LTD. <br> Email: info@ss-japan.com</p>
                </div>
                <!-- privacy-policy-box -->
                <div class="privacy-policy-box">
                    <p class="question">12. Review of Privacy Policy</p>
                    <p>SS JAPAN practices the handling of Personal Information according to laws and other standard practices, and constantly strives to make improvements to the above activities without any prior notice. Privacy Policy may be
                        revised according to the change of rules such as law. We will post changes to this Privacy Policy and update the effective date when this Privacy Policy is updated.
                    </p>
                </div>
                <!-- privacy-policy-box -->
                <div class="privacy-policy-box">
                    <p class="question">13. Other</p>
                    <p>The use of the Website and the interpretation of the content of Website shall be governed by the law of Japan. <br> Should any dispute arise out of or relating to the use of the Website, it is agreed that the initial hearing
                        should take place under the jurisdiction of the Nagoya District Court.
                    </p>
                </div>
            </div>
					
					<!--end-->
					</div>
					
				</div>
			</div>


			<!-- Right Column -->

		   

		</div>
	</div>


</section>

@endsection
