@extends('app')

@section('content')
<div class="mt-[90px]">
    <div class="container mx-auto px-4">
        <section class="bg-white p-8 rounded-lg shadow-lg mb-12">
            <h2 class="text-4xl font-bold mb-4">ABOUT US</h2>
            <p class="text-lg mb-4">Welcome to <b class="text-sky_blue_color">BIKEY</b>, your premier destination for high-quality bikes and bike parts. Established in 2024, we are dedicated to providing cycling enthusiasts and casual riders with the best products and services in the industry.</p>
            <p class="text-lg mb-4">Our shop offers a diverse selection of bikes, from sleek road bikes to rugged mountain bikes, along with a comprehensive range of bike parts and accessories. We source our products from top brands to ensure durability, performance, and style.</p>
            <p class="text-lg mb-4">Our mission is to offer exceptional customer service and expert advice. Whether you're a seasoned cyclist or new to biking, our knowledgeable staff is here to help you find the perfect bike and gear for your needs.</p>
            <p class="text-lg mb-4">Thank you for choosing <b class="text-sky_blue_color">BIKEY</b>. We are committed to making your cycling experience enjoyable and rewarding. We look forward to serving you!</p>
        </section>

        <section class="bg-white p-8 rounded-lg shadow-lg mb-12">
            <h2 class="text-3xl font-bold mb-4">Our Team</h2>
            <div class="flex flex-wrap -mx-4">
                <div class="w-full md:w-1/3 px-4 mb-8">
                    <div class="bg-gray-200 p-6 rounded-lg shadow-lg">
                        <img src="team-member-1.jpg" alt="John Doe" class="w-full h-48 object-cover rounded-lg mb-4">
                        <h3 class="text-xl font-semibold mb-2">John Doe</h3>
                        <p class="text-gray-700">Founder & CEO</p>
                        <p class="mt-2">John has over 20 years of experience in the cycling industry. His passion for biking and dedication to quality service has driven the success of <b class="text-sky_blue_color">BIKEY</b>.</p>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-4 mb-8">
                    <div class="bg-gray-200 p-6 rounded-lg shadow-lg">
                        <img src="team-member-2.jpg" alt="Jane Smith" class="w-full h-48 object-cover rounded-lg mb-4">
                        <h3 class="text-xl font-semibold mb-2">Jane Smith</h3>
                        <p class="text-gray-700">Customer Service Manager</p>
                        <p class="mt-2">Jane ensures that every customer receives the best possible service. Her expertise and friendly demeanor make her a valuable part of our team.</p>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-4 mb-8">
                    <div class="bg-gray-200 p-6 rounded-lg shadow-lg">
                        <img src="team-member-3.jpg" alt="Mike Johnson" class="w-full h-48 object-cover rounded-lg mb-4">
                        <h3 class="text-xl font-semibold mb-2">Mike Johnson</h3>
                        <p class="text-gray-700">Bike Technician</p>
                        <p class="mt-2">Mike is a skilled bike technician with a knack for solving complex issues. His attention to detail ensures that every bike is in top condition.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-white p-8 rounded-lg shadow-lg mb-12">
            <h2 class="text-3xl font-bold mb-4">Our History</h2>
            <p class="text-lg mb-4"><b class="text-sky_blue_color">BIKEY</b> was founded in 2024 with a vision to provide the best biking experience for enthusiasts of all levels. Starting as a small local shop, we quickly grew due to our commitment to quality and customer satisfaction.</p>
            <p class="text-lg mb-4">Over the years, we've expanded our offerings and built a loyal customer base. Our journey has been marked by milestones, including the launch of our online store and the addition of new product lines. We're proud of our growth and excited about the future.</p>
            <p class="text-lg mb-4">Our history is a testament to our dedication to the biking community. We continue to innovate and improve, always striving to meet and exceed our customers' expectations.</p>
        </section>

        <section class="bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold mb-4">Customer Testimonials</h2>
            <div class="flex flex-wrap -mx-4">
                <div class="w-full md:w-1/2 px-4 mb-8">
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <p class="text-lg mb-4">"<b class="text-sky_blue_color">BIKEY</b> has transformed my cycling experience! Their knowledgeable staff helped me find the perfect bike, and their service is second to none." - Alex R.</p>
                    </div>
                </div>
                <div class="w-full md:w-1/2 px-4 mb-8">
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <p class="text-lg mb-4">"I’ve been a loyal customer for years. The team at <b class="text-sky_blue_color">BIKEY</b> is always friendly and provides expert advice. Highly recommended!" - Samantha W.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection