@extends('frontend.layout.app')

@section('content')
    <!-- Header Section -->
    <section class="d-flex align-items-center justify-content-center text-center" style="height: 70vh;">
        <div class="container">
            <h1 class="display-1">Contact</h1>
            <p>We're here to help—get in touch with us today!</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-5">
        <div class="row g-3">
            <div class="col-lg-4">
                <div class="border p-3 shadow-lg">
                    <i class="bi bi-geo-alt"></i>
                    <h3>Our Address</h3>
                    <p>4582 Magnolia Avenue<br>Riverside, CA 92506</p>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="border p-3 shadow-lg">
                    <i class="bi bi-telephone"></i>
                    <h3>Call Us</h3>
                    <p>+1 (951) 684-9123<br>+1 (951) 787-4534</p>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="border p-3 shadow-lg">
                    <i class="bi bi-envelope"></i>
                    <h3>Email Us</h3>
                    <p>contact@example.com<br>support@example.com</p>
                </div>
            </div>
        </div>

        <div class="row g-3 mt-5">
            <div class="col-lg-6">
                <div class="ratio ratio-4x3">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3304517.0188656467!2d63.78336213090239!3d28.995282677787223!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f30e37c15e13d75%3A0x36b5d10b196d09bc!2sBalochistan%2C%20Pakistan!5e0!3m2!1sen!2sus!4v1695060000000!5m2!1sen!2sus" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <div class="col-lg-6">
                <form action="forms/contact.php" method="post" class="border p-2 shadow-sm">
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Your Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea id="message" name="message" rows="6" class="form-control" placeholder="Write your message here" required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="d-flex justify-content-center gap-3 mt-5">
            <a href="#" class="d-flex align-items-center justify-content-center border border-3 rounded-circle text-dark text-decoration-none" style="width: 3rem; height: 3rem;">
                <i class="bi bi-twitter fs-4"></i>
            </a>
            <a href="#" class="d-flex align-items-center justify-content-center border border-3 rounded-circle text-dark text-decoration-none" style="width: 3rem; height: 3rem;">
                <i class="bi bi-facebook fs-4"></i>
            </a>
            <a href="#" class="d-flex align-items-center justify-content-center border border-3 rounded-circle text-dark text-decoration-none" style="width: 3rem; height: 3rem;">
                <i class="bi bi-instagram fs-4"></i>
            </a>
            <a href="#" class="d-flex align-items-center justify-content-center border border-3 rounded-circle text-dark text-decoration-none" style="width: 3rem; height: 3rem;">
                <i class="bi bi-linkedin fs-4"></i>
            </a>
            <a href="#" class="d-flex align-items-center justify-content-center border border-3 rounded-circle text-dark text-decoration-none" style="width: 3rem; height: 3rem;">
                <i class="bi bi-youtube fs-4"></i>
            </a>
        </div>
    </section>
@endsection
