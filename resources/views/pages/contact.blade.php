@extends('app')

@section('content')
<div class="mt-[90px]">

    <div class="container mx-auto p-6 lg:p-12">
        
        <header class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Contact Us</h1>
            <p class="text-gray-600 text-lg">We’d love to hear from you! Here’s how you can get in touch with us.</p>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Our Office</h2>
                <p class="text-gray-600 mb-2"><strong>Address:</strong> 1234 Elm Street, Suite 567, Metropolis, NY 12345</p>
                <p class="text-gray-600 mb-2"><strong>Phone:</strong> (123) 456-7890</p>
                <p class="text-gray-600 mb-4"><strong>Email:</strong> <a href="mailto:bikey@example.com" class="text-blue-500 hover:underline">bikey@example.com</a></p>
                <p class="text-gray-600 mb-2"><strong>Business Hours:</strong></p>
                <ul class="list-disc list-inside text-gray-600">
                    <li>Monday - Friday: 9:00 AM - 6:00 PM</li>
                    <li>Saturday: 10:00 AM - 4:00 PM</li>
                    <li>Sunday: Closed</li>
                </ul>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Find Us</h2>
                <div class="relative pb-2/3">
                    <iframe class="absolute inset-0 w-full h-full rounded-lg shadow-md" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3023.843211007052!2d-73.9352420840591!3d40.73061005965901!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259af83f18b77%3A0x23cce2baf1dcb741!2sNY!5e0!3m2!1sen!2sus!4v1632413612354!5m2!1sen!2sus" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>

        </div>

        <section class="bg-white p-6 rounded-lg shadow-md mb-12">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Frequently Asked Questions (FAQ)</h2>
            <div class="space-y-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">What is your refund policy?</h3>
                    <p class="text-gray-600 mt-1">We offer a full refund within 30 days of purchase if you're not satisfied with our product. Please contact us for more details.</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">How can I track my order?</h3>
                    <p class="text-gray-600 mt-1">Once your order is shipped, you will receive an email with tracking information. You can also track your order status through our website.</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Do you offer international shipping?</h3>
                    <p class="text-gray-600 mt-1">Yes, we offer international shipping to many countries. Please check our shipping policy for more details.</p>
                </div>
            </div>
        </section>

        <section class="text-center">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Additional Contact Methods</h2>
            <p class="text-gray-600 mb-4">For any urgent matters or specific inquiries, feel free to reach out to us via our social media channels or by using the contact email provided.</p>
            <div class="flex justify-center space-x-6">
                <a href="https://facebook.com" target="_blank" class="text-blue-600 hover:text-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12c0 5.05 3.84 9.19 8.81 9.91V14.89h-2.67v-2.5h2.67v-1.83c0-2.65 1.6-4.09 3.98-4.09 1.14 0 2.12.09 2.41.12v2.8h-1.66c-1.3 0-1.55.62-1.55 1.56v2.06h2.66l-.35 2.5h-2.31v7.02C18.16 21.19 22 17.05 22 12c0-5.52-4.48-10-10-10z"/></svg>
                </a>
                <a href="https://twitter.com" target="_blank" class="text-blue-400 hover:text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24" fill="currentColor"><path d="M23 3a10.9 10.9 0 0 1-3.14.86A5.48 5.48 0 0 0 22.4 2a10.91 10.91 0 0 1-3.45 1.32A5.46 5.46 0 0 0 16.16 1c-3.02 0-5.47 2.45-5.47 5.47 0 .43.05.85.12 1.26A15.48 15.48 0 0 1 3 2.3a5.44 5.44 0 0 0-.74 2.75c0 1.89.97 3.56 2.44 4.54A5.41 5.41 0 0 1 2 7.7v.07c0 2.67 1.88 4.9 4.37 5.41a5.48 5.48 0 0 1-2.47.09c.69 2.14 2.68 3.7 5.04 3.74A10.9 10.9 0 0 1 1 21.15a15.3 15.3 0 0 0 8.29 2.43c9.94 0 15.4-8.22 15.4-15.4v-.7A10.99 10.99 0 0 0 23 3z"/></svg>
                </a>
                <a href="https://linkedin.com" target="_blank" class="text-blue-700 hover:text-blue-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5C4.98 2.12 6.1 1 7.6 1s2.62 1.12 2.62 2.5S9.11 6 7.6 6 4.98 4.88 4.98 3.5zm.07 4.83h5.17v13.34H5.05V8.33zM16.89 8.34c-1.2 0-2.18.59-2.68 1.45v-.01h-.03v-.01c-.35-.68-1.05-1.16-1.89-1.16-1.07 0-1.96.86-1.96 1.91v2.46h5.13v2.45h-5.13v6.77h-5.17V8.33h5.17v2.45c.6-1.16 1.75-1.91 3.08-1.91 2.24 0 4.07 1.79 4.07 4v7.61h-5.13v-6.8c0-1.67-.99-2.85-2.48-2.85z"/></svg>
                </a>
            </div>
        </section>

    </div>

</div>
@endsection