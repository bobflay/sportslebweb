@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h1 class="h3 mb-0">Privacy Policy</h1>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-4">
                        <strong>Last updated:</strong> {{ date('F j, Y') }}
                    </p>

                    <div class="privacy-section mb-4">
                        <h2 class="h5 text-primary mb-3">1. Information We Collect</h2>
                        <p>We collect information you provide directly to us, such as when you:</p>
                        <ul>
                            <li>Create an account or profile</li>
                            <li>Register for gym sessions or games</li>
                            <li>Subscribe to notifications</li>
                            <li>Contact us for support</li>
                        </ul>
                        <p>This may include your name, email address, phone number, and other contact information.</p>
                    </div>

                    <div class="privacy-section mb-4">
                        <h2 class="h5 text-primary mb-3">2. How We Use Your Information</h2>
                        <p>We use the information we collect to:</p>
                        <ul>
                            <li>Provide and maintain our fitness services</li>
                            <li>Process gym reservations and check-ins</li>
                            <li>Send you notifications about upcoming games and events</li>
                            <li>Communicate with you about your account</li>
                            <li>Improve our services and user experience</li>
                        </ul>
                    </div>

                    <div class="privacy-section mb-4">
                        <h2 class="h5 text-primary mb-3">3. Information Sharing</h2>
                        <p>We do not sell, trade, or otherwise transfer your personal information to third parties except:</p>
                        <ul>
                            <li>With your explicit consent</li>
                            <li>To service providers who assist us in operating our platform</li>
                            <li>When required by law or to protect our rights</li>
                        </ul>
                    </div>

                    <div class="privacy-section mb-4">
                        <h2 class="h5 text-primary mb-3">4. Push Notifications</h2>
                        <p>We may send you push notifications about:</p>
                        <ul>
                            <li>Upcoming games and events</li>
                            <li>Gym session reminders</li>
                            <li>Important account updates</li>
                        </ul>
                        <p>You can disable push notifications at any time through your device settings or app preferences.</p>
                    </div>

                    <div class="privacy-section mb-4">
                        <h2 class="h5 text-primary mb-3">5. Data Security</h2>
                        <p>We implement appropriate security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction. However, no method of transmission over the internet is 100% secure.</p>
                    </div>

                    <div class="privacy-section mb-4">
                        <h2 class="h5 text-primary mb-3">6. Data Retention</h2>
                        <p>We retain your personal information for as long as necessary to provide our services and fulfill the purposes outlined in this privacy policy, unless a longer retention period is required by law.</p>
                    </div>

                    <div class="privacy-section mb-4">
                        <h2 class="h5 text-primary mb-3">7. Your Rights</h2>
                        <p>You have the right to:</p>
                        <ul>
                            <li>Access and update your personal information</li>
                            <li>Request deletion of your account and data</li>
                            <li>Opt out of marketing communications</li>
                            <li>Request a copy of your data</li>
                        </ul>
                    </div>

                    <div class="privacy-section mb-4">
                        <h2 class="h5 text-primary mb-3">8. Children's Privacy</h2>
                        <p>Our services are not intended for children under 13 years of age. We do not knowingly collect personal information from children under 13.</p>
                    </div>

                    <div class="privacy-section mb-4">
                        <h2 class="h5 text-primary mb-3">9. Changes to This Policy</h2>
                        <p>We may update this privacy policy from time to time. We will notify you of any changes by posting the new privacy policy on this page and updating the "Last updated" date.</p>
                    </div>

                    <div class="privacy-section">
                        <h2 class="h5 text-primary mb-3">10. Contact Us</h2>
                        <p>If you have any questions about this privacy policy or our data practices, please contact us at:</p>
                        <div class="contact-info bg-light p-3 rounded">
                            <p class="mb-1"><strong>Email:</strong> info@xpertbotacademy.online</p>
                            <p class="mb-0"><strong>Address:</strong> Beirut, Lebanon</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .privacy-section {
        border-left: 3px solid #007bff;
        padding-left: 1rem;
    }
    
    .contact-info {
        border: 1px solid #dee2e6;
    }
    
    @media (max-width: 768px) {
        .container {
            padding-left: 15px;
            padding-right: 15px;
        }
        
        .card-body {
            padding: 1rem;
        }
        
        h1.h3 {
            font-size: 1.5rem;
        }
        
        h2.h5 {
            font-size: 1.2rem;
        }
    }
</style>
@endsection