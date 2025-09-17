@extends('frontend.layout.app')

@section('content')
    <!-- Header Section -->
    <section class="d-flex align-items-center justify-content-center text-center" style="height: 70vh;">
        <div class="container">
            <h1 class="display-1">About Us</h1>
            <p>Empowering Balochistan through fair and transparent testing services.</p>
        </div>
    </section>

    <!-- About Content Section -->
    <section class="py-5">
        <div class="container">
            <!-- Introduction -->
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <img src="https://picsum.photos/600/400?random=1" class="img-fluid rounded shadow-sm" alt="About Image">
                </div>
                <div class="col-lg-6">
                    <h2>Who We Are</h2>
                    <p>
                        Established to bridge the gap in standardized assessments, our testing organization serves as a trusted evaluation platform for educational institutions, recruitment bodies, and government departments in Balochistan.
                    </p>
                    <p>
                        We conduct transparent, secure, and merit-based testing processes that ensure equal opportunity for all candidates across urban and remote areas of the province.
                    </p>
                </div>
            </div>

            <!-- Our Mission -->
            <div class="row g-5 align-items-center mt-5">
                <div class="col-lg-6 order-lg-2">
                    <img src="https://picsum.photos/600/400?random=2" class="img-fluid rounded shadow-sm" alt="Our Mission">
                </div>
                <div class="col-lg-6">
                    <h2>Our Mission</h2>
                    <p>
                        To build a credible and transparent testing mechanism that upholds merit and fairness, providing institutions in Balochistan with dependable assessment services.
                    </p>
                    <p>
                        We strive to create a level playing field for every individual seeking education, employment, or career advancement through a secure and unbiased process.
                    </p>
                </div>
            </div>

            <!-- Our Vision -->
            <div class="row g-5 align-items-center mt-5">
                <div class="col-lg-6">
                    <img src="https://picsum.photos/600/400?random=3" class="img-fluid rounded shadow-sm" alt="Vision">
                </div>
                <div class="col-lg-6">
                    <h2>Our Vision</h2>
                    <p>
                        To be the leading testing organization in Balochistan, known for promoting excellence, equal opportunity, and innovation in evaluation services.
                    </p>
                    <p>
                        Our long-term vision includes empowering students and professionals by ensuring fair access to academic, professional, and governmental opportunities.
                    </p>
                </div>
            </div>

            <!-- Core Values -->
            <div class="row mt-5">
                <div class="col-12">
                    <h2 class="text-center mb-4">Our Core Values</h2>
                </div>
                <div class="col-md-4">
                    <div class="border p-4 shadow-sm h-100">
                        <h5>Integrity</h5>
                        <p>We ensure the highest standards of honesty and ethics in every aspect of our testing procedures.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border p-4 shadow-sm h-100">
                        <h5>Transparency</h5>
                        <p>All our processes are transparent, traceable, and open to verification for complete trust.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border p-4 shadow-sm h-100">
                        <h5>Merit</h5>
                        <p>We are committed to promoting meritocracy by ensuring unbiased assessments and results.</p>
                    </div>
                </div>
            </div>

            <!-- Why Choose Us -->
            <div class="row mt-5">
                <div class="col-12">
                    <h2 class="text-center mb-4">Why Choose Us?</h2>
                </div>
                <div class="col-md-6">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">✅ Province-specific testing expertise in Balochistan</li>
                        <li class="list-group-item">✅ Secure, monitored, and standardized testing environments</li>
                        <li class="list-group-item">✅ Services for recruitment, admissions, scholarships & training programs</li>
                        <li class="list-group-item">✅ Online and offline test delivery options</li>
                        <li class="list-group-item">✅ Partnership with educational institutions & government bodies</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <img src="https://picsum.photos/600/400?random=4" class="img-fluid rounded shadow-sm" alt="Why Choose Us">
                </div>
            </div>

            <!-- Partnerships Section -->
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <h2>Work With Us</h2>
                    <p>We collaborate with public and private organizations across Balochistan to conduct recruitment and academic testing with integrity. Let's build a more equitable system together.</p>
                    <a href="/contact" class="btn btn-outline-primary mt-2">Contact Us</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Social Links -->
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
@endsection
