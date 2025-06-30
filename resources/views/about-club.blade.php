@push('title', 'About Club | Industry 4.0')

<x-app-layout>
<!-- Hero Section -->
<section class="relative bg-blue-900 text-white py-20 px-6 text-center">
    <h1 class="text-4xl md:text-5xl font-bold mb-4">Welcome to Industry 4.0 Club</h1>
    <p class="text-lg md:text-xl max-w-2xl mx-auto">Shaping the future through innovation, technology, and collaboration.</p>
</section>

<!-- About Section -->
<section class="py-16 px-6 bg-gray-100">
    <div class="max-w-5xl mx-auto text-center">
        <h2 class="text-3xl font-semibold mb-6">About the Club</h2>
        <p class="text-lg text-gray-700 leading-relaxed">
            The Industry 4.0 Club is a student-driven organization focused on exploring modern industrial technologies such as Artificial Intelligence, Internet of Things (IoT), Cyber-Physical Systems, and Digital Twins. 
            We aim to bridge the gap between academia and industry through events, workshops, and hands-on projects.
        </p>
    </div>
</section>

<!-- Objectives -->
<section class="py-16 px-6 bg-white">
    <div class="max-w-5xl mx-auto">
        <h2 class="text-2xl font-bold mb-4">Our Objectives</h2>
        <ul class="list-disc list-inside text-gray-700 space-y-2">
            <li>Raise awareness of Industry 4.0 concepts among students.</li>
            <li>Organize tech events, seminars, and project showcases.</li>
            <li>Encourage student participation in innovation and problem-solving.</li>
            <li>Create networking opportunities with professionals and companies.</li>
        </ul>
    </div>
</section>

<!-- Activities -->
<section class="py-16 px-6 bg-gray-100">
    <div class="max-w-5xl mx-auto">
        <h2 class="text-2xl font-bold mb-4">Our Activities</h2>
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-white shadow p-4 rounded-lg">
                <h3 class="font-semibold text-lg mb-2">Workshops</h3>
                <p>Hands-on learning in AI, robotics, programming, and more.</p>
            </div>
            <div class="bg-white shadow p-4 rounded-lg">
                <h3 class="font-semibold text-lg mb-2">Tech Talks</h3>
                <p>Industry experts share insights on new trends and tools.</p>
            </div>
            <div class="bg-white shadow p-4 rounded-lg">
                <h3 class="font-semibold text-lg mb-2">Hackathons</h3>
                <p>Collaborative competitions to solve real-world problems.</p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-16 px-6 bg-white">
    <div class="max-w-5xl mx-auto text-center">
        <h2 class="text-2xl font-bold mb-4">Meet Our Team</h2>
        <p class="text-gray-600 mb-8">A group of passionate students driving digital transformation.</p>

        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-gray-100 p-4 rounded-lg">
                <img src="/images/team1.jpg" alt="Team Member" class="rounded-full w-24 h-24 mx-auto mb-3">
                <h3 class="font-semibold">Fatimzahra H.</h3>
                <p class="text-sm text-gray-600">Club President</p>
            </div>
            <div class="bg-gray-100 p-4 rounded-lg">
                <img src="/images/team2.jpg" alt="Team Member" class="rounded-full w-24 h-24 mx-auto mb-3">
                <h3 class="font-semibold">Ayoub L.</h3>
                <p class="text-sm text-gray-600">Tech Lead</p>
            </div>
            <div class="bg-gray-100 p-4 rounded-lg">
                <img src="/images/team3.jpg" alt="Team Member" class="rounded-full w-24 h-24 mx-auto mb-3">
                <h3 class="font-semibold">Sara M.</h3>
                <p class="text-sm text-gray-600">Event Coordinator</p>
            </div>
        </div>
    </div>
</section>
</x-app-layout>

