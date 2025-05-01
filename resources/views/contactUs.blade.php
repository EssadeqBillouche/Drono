@extends('layouts.app')

@section('title', 'Contact Us')

@section('css')
    <style>



        .accent-border {
            border-left: 4px solid #ff7e00;
            padding-left: 1rem;
        }

        .map-container {
            height: 400px;
            width: 100%;
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .social-icon {
            @apply ;
        }

        details {
            @apply ;
        }

        details summary {
            @apply p-4 cursor-pointer bg-white hover:bg-gray-50 flex justify-between items-center;
        }

        details[open] summary {
            @apply border-b border-gray-200;
        }

        details div {
            @apply p-4 bg-white text-secondary;
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-primary/20 to-background rounded-lg p-10 mb-8">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl font-bold text-text mb-4">Contact Us</h1>
            <p class="text-xl text-secondary max-w-3xl mx-auto">We'd love to hear from you! Reach out with questions, partnership opportunities, or to learn more about our drone delivery services.</p>
        </div>
    </div>

    <!-- Contact Options Section -->
    <section class="mb-12">
        <div class="content-card bg-white rounded-lg shadow-md p-8 mb-8">
            <h2 class="section-title text-2xl font-bold mb-6 text-text accent-border">Get in Touch</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Email Contact -->
                <div class="contact-card bg-white rounded-lg shadow-md p-6 flex items-start border-l-4 border-primary transition-all duration-300 hover:shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="contact-icon w-10 h-10 mr-4 text-primary flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <div>
                        <h3 class="font-semibold text-lg mb-1 text-text">Email Us</h3>
                        <p class="text-secondary mb-3">Our team typically responds within 24 hours.</p>
                        <a href="mailto:contact@drono.ma" class="text-primary font-medium hover:underline">contact@drono.ma</a>
                    </div>
                </div>

                <!-- Phone Contact -->
                <div class="contact-card bg-white rounded-lg shadow-md p-6 flex items-start border-l-4 border-primary transition-all duration-300 hover:shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="contact-icon w-10 h-10 mr-4 text-primary flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    <div>
                        <h3 class="font-semibold text-lg mb-1 text-text">Call Us</h3>
                        <p class="text-secondary mb-3">Available Monday-Friday, 9am-6pm</p>
                        <a href="tel:+212522123456" class="text-primary font-medium hover:underline">+212 522 123 456</a>
                    </div>
                </div>

                <!-- Office Location -->
                <div class="contact-card bg-white rounded-lg shadow-md p-6 flex items-start border-l-4 border-primary transition-all duration-300 hover:shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="contact-icon w-10 h-10 mr-4 text-primary flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <div>
                        <h3 class="font-semibold text-lg mb-1 text-text">Visit Our Office</h3>
                        <p class="text-secondary mb-3">By appointment only</p>
                        <address class="not-italic text-secondary">
                            Technopark Casablanca<br>
                            Route de Nouaceur<br>
                            Casablanca, Morocco
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form and Map Section -->
    <section class="mb-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Contact Form -->
            <div class="content-card bg-white rounded-lg shadow-md p-8 mb-8">
                <h2 class="section-title text-2xl font-bold mb-6 text-text accent-border">Send Us a Message</h2>

                <form action="" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="input-group mb-4">
                            <label for="first_name" class="input-label block text-sm font-medium text-text mb-1">First Name</label>
                            <input type="text" id="first_name" name="first_name" class="text-input w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-transparent bg-white" required>
                        </div>
                        <div class="input-group mb-4">
                            <label for="last_name" class="input-label block text-sm font-medium text-text mb-1">Last Name</label>
                            <input type="text" id="last_name" name="last_name" class="text-input w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-transparent bg-white" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="input-group mb-4">
                            <label for="email" class="input-label block text-sm font-medium text-text mb-1">Email Address</label>
                            <input type="email" id="email" name="email" class="text-input w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-transparent bg-white" required>
                        </div>
                        <div class="input-group mb-4">
                            <label for="phone" class="input-label block text-sm font-medium text-text mb-1">Phone Number</label>
                            <input type="tel" id="phone" name="phone" class="text-input w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-transparent bg-white">
                        </div>
                    </div>

                    <div class="input-group mb-4">
                        <label for="subject" class="input-label block text-sm font-medium text-text mb-1">Subject</label>
                        <input type="text" id="subject" name="subject" class="text-input w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-transparent bg-white" required>
                    </div>

                    <div class="input-group mb-4">
                        <label for="message" class="input-label block text-sm font-medium text-text mb-1">Your Message</label>
                        <textarea id="message" name="message" rows="5" class="text-input w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-transparent bg-white" required></textarea>
                    </div>

                    <!-- File upload for business inquiries -->
                    <div class="input-group mb-4">
                        <label for="attachment" class="input-label block text-sm font-medium text-text mb-1">Attachment (Optional)</label>
                        <div class="flex items-center">
                            <input type="file" id="attachment" name="attachment" class="hidden">
                            <label for="attachment" class="flex items-center px-4 py-2 border border-gray-300 rounded-md cursor-pointer hover:bg-gray-50 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                </svg>
                                <span class="text-sm text-text">Choose file</span>
                            </label>
                            <span id="file-name" class="ml-3 text-sm text-secondary">No file selected</span>
                        </div>
                        <p class="text-xs text-secondary mt-1">Max size: 5MB. Accepted formats: PDF, DOC, DOCX, JPG, PNG</p>
                    </div>

                    <div class="input-group">
                        <label class="flex items-start">
                            <input type="checkbox" name="consent" required class="mt-1 rounded text-primary focus:ring-primary mr-2">
                            <span class="text-sm text-secondary">I consent to DRONO collecting my data through this form for the purpose of responding to my inquiry. I understand that the information I provide will be processed in accordance with DRONO's <a href="" class="text-primary hover:underline">Privacy Policy</a>.</span>
                        </label>
                    </div>

                    <div>
                        <button type="submit" class="bg-primary hover:bg-primary/90 text-white font-bold py-3 px-6 rounded-full shadow-md transition-colors inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                            </svg>
                            Send Message
                        </button>
                    </div>
                </form>
            </div>

            <!-- Map and Business Info -->
            <div>
                <div class="content-card bg-white rounded-lg shadow-md p-8 mb-8">
                    <h2 class="section-title text-2xl font-bold mb-6 text-text accent-border">Find Us</h2>

                    <!-- Map container -->
                    <div class="map-container mb-6">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3324.088099065393!2d-7.633681084482863!3d33.5800082806698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7cd49f9bc3e17%3A0x8e79d32b15204fa8!2sTechnopark%20Casablanca!5e0!3m2!1sen!2sma!4v1619395128462!5m2!1sen!2sma" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>

                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="font-semibold text-lg mb-3 text-text">Business Hours</h3>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-secondary">Monday - Friday</span>
                                <span class="text-text font-medium">9:00 AM - 6:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-secondary">Saturday</span>
                                <span class="text-text font-medium">10:00 AM - 2:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-secondary">Sunday</span>
                                <span class="text-text font-medium">Closed</span>
                            </div>
                        </div>
                        <hr class="my-4 border-gray-200">
                        <h3 class="font-semibold text-lg mb-3 text-text">Connect With Us</h3>
                        <div class="flex space-x-3">
                            <a href="#" class="social-icon w-9 h-9 rounded-full flex items-center justify-center text-white transition-transform hover:scale-110bg-[#1877F2]"> <!-- Facebook blue -->
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path></svg>
                            </a>
                            <a href="#" class="social-icon w-9 h-9 rounded-full flex items-center justify-center text-white transition-transform hover:scale-110bg-[#1DA1F2]"> <!-- Twitter blue -->
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path></svg>
                            </a>
                            <a href="#" class="social-icon w-9 h-9 rounded-full flex items-center justify-center text-white transition-transform hover:scale-110bg-[#E4405F]"> <!-- Instagram pink/purple -->
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path></svg>
                            </a>
                            <a href="#" class="social-icon w-9 h-9 rounded-full flex items-center justify-center text-white transition-transform hover:scale-110bg-[#0A66C2]"> <!-- LinkedIn blue -->
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" clip-rule="evenodd"></path></svg>
                            </a>
                            <a href="#" class="social-icon w-9 h-9 rounded-full flex items-center justify-center text-white transition-transform hover:scale-110  bg-[#FF0000]"> <!-- YouTube red -->
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z" clip-rule="evenodd"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="mb-12">
        <div class="content-card bg-white rounded-lg shadow-md p-8 mb-8">
            <h2 class="section-title text-2xl font-bold mb-6 text-text accent-border">Frequently Asked Questions</h2>

            <div class="space-y-3">
                <!-- Question 1 -->
                <details class="group">
                    <summary class="flex justify-between items-center font-medium cursor-pointer text-text">
                        <span>How do I schedule a drone delivery?</span>
                        <span class="transition group-open:rotate-180">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                    </summary>
                    <div>
                        <p>You can schedule a drone delivery through our website or mobile app. Simply create an account, enter your delivery details, select a delivery time, and confirm your order. Our system will automatically assign a drone to fulfill your delivery request.</p>
                    </div>
                </details>

                <!-- Question 2 -->
                <details class="group">
                    <summary class="flex justify-between items-center font-medium cursor-pointer text-text">
                        <span>What areas do you currently service?</span>
                        <span class="transition group-open:rotate-180">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                    </summary>
                    <div>
                        <p>We are currently operating in select areas of Casablanca and Rabat as part of our initial launch. We plan to expand to other major cities in Morocco throughout 2025. Please enter your address on our website to check if delivery is available in your area.</p>
                    </div>
                </details>

                <!-- Question 3 -->
                <details class="group">
                    <summary class="flex justify-between items-center font-medium cursor-pointer text-text">
                        <span>What types of items can be delivered by drone?</span>
                        <span class="transition group-open:rotate-180">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                    </summary>
                    <div>
                        <p>Our drones can currently deliver packages weighing up to 2.5 kg (5.5 lbs) with dimensions no larger than 30x30x30 cm. We specialize in delivering small parcels, medications, documents, and food orders. For safety and regulatory reasons, we cannot deliver hazardous materials, flammable items, or alcoholic beverages.</p>
                    </div>
                </details>

                <!-- Question 4 -->
                <details class="group">
                    <summary class="flex justify-between items-center font-medium cursor-pointer text-text">
                        <span>How can businesses partner with DRONO?</span>
                        <span class="transition group-open:rotate-180">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                    </summary>
                    <div>
                        <p>We offer various partnership models for businesses looking to integrate drone delivery into their operations. These include API integration with your existing ordering systems, dedicated drone services for your business, and co-branded delivery options. Contact our business development team at <a href="mailto:partnerships@drono.ma" class="text-primary hover:underline">partnerships@drono.ma</a> to discuss partnership opportunities.</p>
                    </div>
                </details>

                <!-- Question 5 -->
                <details class="group">
                    <summary class="flex justify-between items-center font-medium cursor-pointer text-text">
                        <span>How does the drone navigate to my location?</span>
                        <span class="transition group-open:rotate-180">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                    </summary>
                    <div>
                        <p>Our drones use a combination of GPS, computer vision, and advanced obstacle detection technologies to navigate. When you place an order, our system requests your precise GPS coordinates from your device. For optimal delivery accuracy, we recommend using the "Get My Precise Location" feature when placing your order. The drone will follow pre-approved flight corridors and automatically avoid obstacles like buildings, trees, and power lines.</p>
                    </div>
                </details>
            </div>
        </div>
    </section>

    <!-- Newsletter Subscribe Section -->
    <section class="mb-8">
        <div class="bg-gradient-to-r from-gray-50 to-primary/5 rounded-lg shadow-md p-8 text-center">
            <h2 class="text-2xl font-bold mb-4 text-text">Stay Updated</h2>
            <p class="text-secondary mb-6 max-w-2xl mx-auto">Subscribe to our newsletter to receive the latest updates about drone delivery technology and be the first to know when we expand to new areas.</p>
            <form action="" method="POST" class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto">
                @csrf
                <input type="email" name="email" placeholder="Your email address" required class="flex-grow px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                <button type="submit" class="bg-primary hover:bg-primary/90 text-white font-bold py-3 px-6 rounded-lg shadow-md transition-colors">
                    Subscribe
                </button>
            </form>
        </div>
    </section>
@endsection

@section('script')
    <script>
        document.getElementById('attachment').addEventListener('change', function(e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : 'No file selected';
            document.getElementById('file-name').textContent = fileName;
        });

        // Initialize accordion for FAQ
        const detailsElements = document.querySelectorAll('details');
        detailsElements.forEach((details) => {
            details.addEventListener('toggle', () => {
                if (details.open) {
                    detailsElements.forEach((otherDetails) => {
                        if (otherDetails !== details) {
                            otherDetails.open = false;
                        }
                    });
                }
            });
        });
    </script>
@endsection
