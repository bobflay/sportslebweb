@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold text-primary">Support & Help</h1>
                <p class="lead text-muted">Get help with Woodstyle fitness app</p>
            </div>

            <!-- Developer Contact Section -->
            <div class="card shadow-sm mb-5">
                <div class="card-header bg-primary text-white">
                    <h2 class="h4 mb-0">
                        <i class="bi bi-person-badge"></i> Contact Developer
                    </h2>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h3 class="h5 text-primary mb-3">Ahmad Ghaddar</h3>
                            <p class="text-muted mb-4">Full Stack Developer & App Creator</p>
                            
                            <div class="contact-methods">
                                <div class="mb-3">
                                    <a href="https://wa.me/96181034191" 
                                       target="_blank" 
                                       class="btn btn-success btn-lg me-3 mb-2">
                                        <i class="bi bi-whatsapp"></i> WhatsApp
                                    </a>
                                    <a href="mailto:ahmadghaddar05@outlook.com" 
                                       class="btn btn-outline-primary btn-lg mb-2">
                                        <i class="bi bi-envelope"></i> Email
                                    </a>
                                </div>
                                <div class="contact-details">
                                    <p class="mb-1">
                                        <i class="bi bi-whatsapp text-success"></i> 
                                        <strong>WhatsApp:</strong> +961 81 034 191
                                    </p>
                                    <p class="mb-0">
                                        <i class="bi bi-envelope text-primary"></i> 
                                        <strong>Email:</strong> ahmadghaddar05@outlook.com
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="developer-avatar bg-light rounded-circle d-inline-flex align-items-center justify-content-center" 
                                 style="width: 120px; height: 120px;">
                                <i class="bi bi-person-circle text-primary" style="font-size: 4rem;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h2 class="h4 mb-0">
                        <i class="bi bi-question-circle"></i> Frequently Asked Questions
                    </h2>
                </div>
                <div class="card-body">
                    <div class="accordion" id="faqAccordion">
                        
                        <!-- FAQ 1 -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faq1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" 
                                        data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                    How do I view upcoming games and matches?
                                </button>
                            </h3>
                            <div id="collapse1" class="accordion-collapse collapse show" 
                                 aria-labelledby="faq1" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Navigate to the "Games" section from the main menu to see all upcoming games, 
                                    including dates, times, teams, locations, and broadcast information. You can also view past game results.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 2 -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faq2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                                        data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                    What sports and teams are covered in this app?
                                </button>
                            </h3>
                            <div id="collapse2" class="accordion-collapse collapse" 
                                 aria-labelledby="faq2" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    The Woodstyle app covers various sports teams and competitions. You can find information about 
                                    team rosters, player details, match schedules, and results for all supported teams and leagues.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 3 -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faq3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                                        data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                    How can I find information about specific teams?
                                </button>
                            </h3>
                            <div id="collapse3" class="accordion-collapse collapse" 
                                 aria-labelledby="faq3" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Use the Teams section to browse all available teams. You can view team profiles, 
                                    player rosters, upcoming matches, and historical performance for each team.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 4 -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faq4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                                        data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                    Where can I watch live games or broadcasts?
                                </button>
                            </h3>
                            <div id="collapse4" class="accordion-collapse collapse" 
                                 aria-labelledby="faq4" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Games that are being broadcast will show broadcast information and links in the game details. 
                                    Look for the "Watch" button next to games that are available for live streaming or broadcast.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 5 -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faq5">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                                        data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                    How often is the sports information updated?
                                </button>
                            </h3>
                            <div id="collapse5" class="accordion-collapse collapse" 
                                 aria-labelledby="faq5" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Game schedules, team information, and match results are updated regularly to ensure 
                                    you have the most current sports information available.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 6 -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faq6">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                                        data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                    Can I get directions to game venues?
                                </button>
                            </h3>
                            <div id="collapse6" class="accordion-collapse collapse" 
                                 aria-labelledby="faq6" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes! Each game shows the venue location, and you can tap "View on Map" to get directions 
                                    through Google Maps to the game location.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 7 -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faq7">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                                        data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                                    What should I do if the app is not working properly?
                                </button>
                            </h3>
                            <div id="collapse7" class="accordion-collapse collapse" 
                                 aria-labelledby="faq7" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    First, try refreshing the page or closing and reopening the app. If the problem persists, 
                                    restart your device. For ongoing issues, contact our developer Ahmad Ghaddar via WhatsApp or email.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Additional Help Section -->
            <div class="text-center mt-5">
                <div class="bg-light p-4 rounded">
                    <h3 class="h5 text-primary mb-3">Still Need Help?</h3>
                    <p class="text-muted mb-3">
                        Can't find what you're looking for? Our developer is here to help!
                    </p>
                    <div class="d-flex justify-content-center gap-3 flex-wrap">
                        <a href="https://wa.me/96181034191" target="_blank" class="btn btn-success">
                            <i class="bi bi-whatsapp"></i> Chat on WhatsApp
                        </a>
                        <a href="mailto:ahmadghaddar05@outlook.com" class="btn btn-primary">
                            <i class="bi bi-envelope"></i> Send Email
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    .developer-avatar {
        border: 3px solid #dee2e6;
    }
    
    .contact-methods .btn {
        min-width: 140px;
    }
    
    .accordion-button:not(.collapsed) {
        background-color: rgba(13, 110, 253, 0.1);
        border-color: rgba(13, 110, 253, 0.25);
    }
    
    @media (max-width: 768px) {
        .container {
            padding-left: 15px;
            padding-right: 15px;
        }
        
        .display-4 {
            font-size: 2rem;
        }
        
        .btn-lg {
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
        }
        
        .contact-methods .btn {
            min-width: 120px;
            margin-bottom: 0.5rem;
        }
        
        .developer-avatar {
            width: 80px !important;
            height: 80px !important;
            margin-bottom: 1rem;
        }
        
        .developer-avatar i {
            font-size: 2.5rem !important;
        }
    }
</style>
@endsection