@extends('layouts.app')

@section('title', 'Contact Us | EZE POST')

@section('content')
<section class="hero" style="padding: 3rem 0 2rem 0; background: #fafafa;">
    <div class="container" style="display: flex; justify-content: space-between; align-items: center;">
        <div>
            <span style="color: #2563eb; font-weight: 700; font-size: 0.75rem; tracking: 0.05em; text-transform: uppercase;">WE'RE HERE TO HELP</span>
            <h1 style="font-size: 2.5rem; font-weight: 800; color: #0f172a; margin: 0.5rem 0;">Contact Us</h1>
            <p style="color: #64748b; font-size: 1rem;">Get in touch with the EZE POST team.</p>
        </div>
        
        <div style="font-size: 4rem; opacity: 0.8;">
            ✉️✈️
        </div>
    </div>
</section>

<section class="section" style="padding: 2rem 0 4rem 0;">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1.2fr 1fr; gap: 2rem; align-items: start;">
            
            
            <div class="card" style="padding: 2.5rem; background: #ffffff; border-radius: 12px; border: 1px solid #e2e8f0;">
                <h2 style="font-size: 1.5rem; font-weight: 700; color: #0f172a; margin-bottom: 0.25rem;">Send us a message</h2>
                <p style="color: #64748b; font-size: 0.875rem; margin-bottom: 1.5rem;">Fill in the form below and we'll get back to you shortly.</p>

                
                @if(session('success'))
                    <div style="background: #dcfce7; color: #15803d; border: 1px solid #bbf7d0; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; font-size: 0.9rem; font-weight: 500;">
                        ✓ {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.send') }}" style="display: flex; flex-direction: column; gap: 1.25rem;">
                    @csrf
                    <div>
                        <label style="display: block; font-size: 0.85rem; font-weight: 600; color: #334155; margin-bottom: 0.4rem;">Full name</label>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter your full name" style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.9rem; background: #f8fafc;" required>
                    </div>

                    <div>
                        <label style="display: block; font-size: 0.85rem; font-weight: 600; color: #334155; margin-bottom: 0.4rem;">Email address</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email address" style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.9rem; background: #f8fafc;" required>
                    </div>

                    <div>
                        <label style="display: block; font-size: 0.85rem; font-weight: 600; color: #334155; margin-bottom: 0.4rem;">Subject</label>
                        <input type="text" name="subject" value="{{ old('subject') }}" placeholder="Enter a subject" style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.9rem; background: #f8fafc;" required>
                    </div>

                    <div>
                        <label style="display: block; font-size: 0.85rem; font-weight: 600; color: #334155; margin-bottom: 0.4rem;">Message</label>
                        <textarea name="message" rows="5" placeholder="Tell us how we can help..." style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.9rem; background: #f8fafc; resize: vertical;" required>{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="button" style="width: 100%; padding: 0.85rem; background: #2563eb; color: #ffffff; border: none; border-radius: 6px; font-weight: 600; font-size: 0.95rem; cursor: pointer; margin-top: 0.5rem;">Send message</button>
                </form>
            </div>

            
            <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                
                <!-- Card Informativ -->
                <div class="card" style="padding: 2.5rem; background: #ffffff; border-radius: 12px; border: 1px solid #e2e8f0;">
                    <h2 style="font-size: 1.5rem; font-weight: 700; color: #0f172a; margin-bottom: 0.25rem;">Contact information</h2>
                    <p style="color: #64748b; font-size: 0.875rem; margin-bottom: 1.75rem;">Here are the different ways to reach us.</p>

                    <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                        <!-- Support -->
                        <div style="display: flex; gap: 1rem; align-items: flex-start;">
                            <div style="background: #eff6ff; color: #2563eb; padding: 0.6rem; border-radius: 8px; font-size: 1.1rem;">✉️</div>
                            <div>
                                <h4 style="margin: 0; font-size: 0.95rem; font-weight: 700; color: #0f172a;">Support</h4>
                                <p style="margin: 0.1rem 0 0.25rem 0; font-size: 0.8rem; color: #64748b;">For product support and technical help.</p>
                                <a href="mailto:support@ezepost.com" style="color: #2563eb; text-decoration: none; font-size: 0.85rem; font-weight: 500;">support@ezepost.com</a>
                            </div>
                        </div>

                        <!-- General enquiries -->
                        <div style="display: flex; gap: 1rem; align-items: flex-start;">
                            <div style="background: #eff6ff; color: #2563eb; padding: 0.6rem; border-radius: 8px; font-size: 1.1rem;">✉️</div>
                            <div>
                                <h4 style="margin: 0; font-size: 0.95rem; font-weight: 700; color: #0f172a;">General enquiries</h4>
                                <p style="margin: 0.1rem 0 0.25rem 0; font-size: 0.8rem; color: #64748b;">For sales, partnerships or general questions.</p>
                                <a href="mailto:info@ezepost.com" style="color: #2563eb; text-decoration: none; font-size: 0.85rem; font-weight: 500;">info@ezepost.com</a>
                            </div>
                        </div>

                        <!-- Help Centre -->
                        <div style="display: flex; gap: 1rem; align-items: flex-start;">
                            <div style="background: #eff6ff; color: #2563eb; padding: 0.6rem; border-radius: 8px; font-size: 1.1rem;">📖</div>
                            <div>
                                <h4 style="margin: 0; font-size: 0.95rem; font-weight: 700; color: #0f172a;">Help Centre</h4>
                                <p style="margin: 0.1rem 0 0.25rem 0; font-size: 0.8rem; color: #64748b;">Find answers to common questions, installation guides and more.</p>
                                <a href="{{ route('help-centre') }}" style="color: #2563eb; text-decoration: none; font-size: 0.85rem; font-weight: 600; display: inline-flex; align-items: center; gap: 0.25rem;">Visit our Help Centre &rarr;</a>
                            </div>
                        </div>

                        <!-- Business hours -->
                        <div style="display: flex; gap: 1rem; align-items: flex-start;">
                            <div style="background: #eff6ff; color: #2563eb; padding: 0.6rem; border-radius: 8px; font-size: 1.1rem;">🕒</div>
                            <div>
                                <h4 style="margin: 0; font-size: 0.95rem; font-weight: 700; color: #0f172a;">Business hours</h4>
                                <p style="margin: 0.1rem 0 0; font-size: 0.8rem; color: #475569; font-weight: 500;">Monday - Friday</p>
                                <p style="margin: 0; font-size: 0.8rem; color: #64748b;">9:00AM - 6:00PM (GMT)</p>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div class="card" style="padding: 1.25rem; background: #ffffff; border-radius: 12px; border: 1px solid #e2e8f0;">
                        <div style="color: #2563eb; font-size: 1.25rem; margin-bottom: 0.5rem;">📖</div>
                        <h4 style="margin: 0 0 0.25rem 0; font-size: 0.9rem; font-weight: 700; color: #0f172a;">Help Centre</h4>
                        <p style="margin: 0 0 1rem 0; font-size: 0.75rem; color: #64748b; line-height: 1.3;">Browse our guides, FAQs and troubleshooting articles.</p>
                        <a href="{{ route('help-centre') }}" style="display: inline-block; width: 100%; text-align: center; padding: 0.4rem 0.5rem; background: #ffffff; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.75rem; font-weight: 600; color: #2563eb; text-decoration: none;">Go to Help Centre &rarr;</a>
                    </div>

                    <div class="card" style="padding: 1.25rem; background: #ffffff; border-radius: 12px; border: 1px solid #e2e8f0;">
                        <div style="color: #2563eb; font-size: 1.25rem; margin-bottom: 0.5rem;">🎧</div>
                        <h4 style="margin: 0 0 0.25rem 0; font-size: 0.9rem; font-weight: 700; color: #0f172a;">Support</h4>
                        <p style="margin: 0 0 1rem 0; font-size: 0.75rem; color: #64748b; line-height: 1.3;">Need immediate help? Get in touch with our support team.</p>
                        <a href="mailto:support@ezepost.com" style="display: inline-block; width: 100%; text-align: center; padding: 0.4rem 0.5rem; background: #ffffff; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.75rem; font-weight: 600; color: #2563eb; text-decoration: none;">Contact Support &rarr;</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
@endsection