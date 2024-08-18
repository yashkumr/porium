<?php require_once "config/db.php"?>
<?php include "includes/header.php"?>

<main class="main">
			<nav aria-label="breadcrumb" class="breadcrumb-nav">
				<div class="container">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="index.html"><i class="icon-home"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Contact Us
						</li>
					</ol>
				</div>
			</nav>

			<!-- <div id="map"></div> -->
			

			<div class="container contact-us-container">
				<div class="contact-info">
					<div class="row">
						<div class="col-12">
							<h2 class="ls-n-25 m-b-1">
								Contact Info
							</h2>

							<p class="display-5">
								If you’re looking for professional E-commerce website , look no further than Marketing Porium. Contact us today to learn more about our services and how we can help you achieve its online goals..
							</p>
						</div>

						<div class="col-sm-6 col-lg-4">
							<div class="feature-box text-center">
							<i class="fa fa-address-card" aria-hidden="true"></i>
								<div class="feature-box-content">
									<h3>Address</h3>
									<h5>New Delhi</h5>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-4">
							<div class="feature-box text-center">
								<i class="fa fa-mobile-alt"></i>
								<div class="feature-box-content">
									<h3>Phone Number</h3>
									<h5>+91 9953945408</h5>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-4">
							<div class="feature-box text-center">
								<i class="far fa-envelope"></i>
								<div class="feature-box-content">
									<h3>E-mail Address</h3>
									<h5><a href="#" class="__cf_email__" data-cfemail="afdfc0dddbc0efdfc0dddbc0dbc7cac2ca81ccc0c2">sahajent6@gmail.com</a></h5>
								</div>
							</div>
						</div>
						<!-- <div class="col-sm-6 col-lg-3">
							<div class="feature-box text-center">
								<i class="far fa-calendar-alt"></i>
								<div class="feature-box-content">
									<h3>Working Days/Hours</h3>
									<h5>Monday to Saturday – 9:00 am to 7:00 pm
										Sunday – 10:00 am to 5:00 pm</h5>
								</div>
							</div>
						</div> -->
					</div>
				</div>

				<div class="row">
					<div class="col-lg-6">
						<h2 class="mt-6 mb-2">Send Us a Message</h2>

						<form class="mb-0" action="#">
							<div class="form-group">
								<label class="mb-1" for="contact-name">Your Name
									<span class="required">*</span></label>
								<input type="text" class="form-control" id="contact-name" name="contact-name"
									required />
							</div>

							<div class="form-group">
								<label class="mb-1" for="contact-email">Your E-mail
									<span class="required">*</span></label>
								<input type="email" class="form-control" id="contact-email" name="contact-email"
									required />
							</div>

							<div class="form-group">
								<label class="mb-1" for="contact-message">Your Message
									<span class="required">*</span></label>
								<textarea cols="30" rows="1" id="contact-message" class="form-control"
									name="contact-message" required></textarea>
							</div>

							<div class="form-footer mb-0">
								<button type="submit" class="btn btn-dark font-weight-normal">
									Send Message
								</button>
							</div>
						</form>
					</div>

					<div class="col-lg-6">
						<h2 class="mt-6 mb-1">Frequently Asked Questions</h2>
						<div id="accordion">
							<div class="card card-accordion">
								<a class="card-header" href="#" data-toggle="collapse" data-target="#collapseOne"
									aria-expanded="true" aria-controls="collapseOne">
									What is e-commerce?
								</a>

								<div id="collapseOne" class="collapse show" data-parent="#accordion">
									<p>E-commerce, short for electronic commerce, refers to the buying and selling of goods and services over the internet. It involves online transactions between businesses (B2B), businesses and consumers (B2C), or consumers themselves (C2C). E-commerce platforms provide a virtual marketplace where buyers and sellers can interact and complete transactions electronically.</p>
								</div>
							</div>

							<div class="card card-accordion">
								<a class="card-header collapsed" href="#" data-toggle="collapse"
									data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
									How does e-commerce work?
								</a>

								<div id="collapseTwo" class="collapse" data-parent="#accordion">
									<p>E-commerce typically involves the following steps:a. Product or service selection: Customers browse through online catalogs and select the desired items.
									<br>	b. Shopping cart: Customers add chosen items to their virtual shopping carts. <br> c. Checkout process: Customers provide their shipping and payment information to complete the purchase.
									<br>	d. Payment processing: The e-commerce platform securely processes the payment through various payment gateways. <br> e. Order fulfillment: The seller prepares the order for shipping and arranges for its delivery to the customer.
									<br>	f. After-sales support: E-commerce platforms may offer customer support for order tracking, returns, or any issues that arise after the purchase.</p>
								</div>
							</div>

							<div class="card card-accordion">
								<a class="card-header collapsed" href="#" data-toggle="collapse"
									data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
									What are the advantages of e-commerce?
								</a>

								<div id="collapseThree" class="collapse" data-parent="#accordion">
									<p>E-commerce offers several benefits, including:
										<br> a. Global reach: Businesses can reach customers worldwide, expanding their market reach. <br> b. Convenience: Customers can shop anytime, anywhere, without the limitations of physical store hours.
										<br> c. Cost savings: E-commerce eliminates the need for physical stores, reducing expenses associated with rent, utilities, and staffing. <br> d. Increased product variety: Online stores can offer a wider range of products and services compared to physical stores.
										<br> e. Personalization: E-commerce platforms can use customer data to personalize the shopping experience and recommend relevant products. <br>f. Comparison shopping: Customers can easily compare prices, features, and reviews of products from different sellers before making a purchase decision.</p>
								</div>
							</div>

							<div class="card card-accordion">
								<a class="card-header collapsed" href="#" data-toggle="collapse"
									data-target="#collapseFour" aria-expanded="true" aria-controls="collapseThree">
									What are the different types of e-commerce?
								</a>

								<div id="collapseFour" class="collapse" data-parent="#accordion">
									<p>There are several types of e-commerce models:a. Business-to-Consumer (B2C): The most common type, where businesses sell products or services directly to individual consumers.
										b. Business-to-Business (B2B): Involves online transactions between businesses, such as manufacturers selling to wholesalers.c. Consumer-to-Consumer (C2C): Allows consumers to sell products or services to other consumers through online platforms.
										d. Consumer-to-Business (C2B): Occurs when individuals offer products or services to businesses. Examples include freelancers or influencers selling their services to companies.e. Business-to-Government (B2G): Involves online transactions between businesses and government entities.</p>
								</div>
							</div>

							
						</div>
					</div>
				</div>
			</div>
			

			<div class="mb-8"></div>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13998.33841438588!2d77.1045392585595!3d28.702070169706193!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d03e0504dcca3%3A0x4b13ca89cd2c3677!2sSector%208%2C%20Rohini%2C%20Delhi%2C%20110085!5e0!3m2!1sen!2sin!4v1688457549907!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>		</main>

<?php include "includes/footer.php"?>