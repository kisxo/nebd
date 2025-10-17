<script setup lang="ts">
import BaseLayout from '@/layouts/BaseLayout.vue';
import { motion } from 'framer-motion';
import akshayImg from "../../assets/judges/akshay.png";

// Optional: Example team data
const team = [
    {
        name: 'Akshay Paul',
        role: 'Founder & Choreographer',
        image: akshayImg,
    }
];
</script>

<template>
    <BaseLayout>
        <!-- Hero Section -->
        <section
            class="relative overflow-hidden bg-gradient-to-br from-purple-700 via-pink-600 to-red-500 text-white py-28 px-6">
            <div class="max-w-5xl mx-auto text-center relative z-10">
                <h1 class="text-5xl md:text-6xl font-extrabold mb-4 drop-shadow-lg">
                    About <span class="text-yellow-300">Step Up Academy</span>
                </h1>
                <p class="text-lg md:text-xl text-white/90 max-w-3xl mx-auto leading-relaxed">
                    Where passion meets performance — we nurture talent, creativity, and confidence through the
                    universal
                    language of dance and fashion.
                </p>
            </div>

            <!-- Floating Orbs -->
            <div class="absolute top-20 left-20 w-40 h-40 bg-white/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 right-20 w-60 h-60 bg-yellow-400/20 rounded-full blur-3xl animate-ping">
            </div>
        </section>

        <!-- Mission & Vision -->
        <section class="py-20 px-6 md:px-20 bg-gray-50 text-gray-800">
            <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-purple-700">Our Mission</h2>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Our mission is to empower young and aspiring performers to express themselves with confidence
                        and
                        creativity. We believe in nurturing raw talent and transforming it into artistic brilliance
                        through
                        disciplined training, mentorship, and opportunities to shine.
                    </p>
                </div>
                <div>
                    <!-- <img src="/images/mission.jpg" alt="Our Mission"
                        class="rounded-2xl shadow-xl hover:scale-105 transition-transform duration-500" /> -->
                </div>
            </div>

            <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 mt-20 items-center">
                <div class="order-2 md:order-1">
                    <!-- <img src="/images/vision.jpg" alt="Our Vision"
                        class="rounded-2xl shadow-xl hover:scale-105 transition-transform duration-500" /> -->
                </div>
                <div class="order-1 md:order-2">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-pink-600">Our Vision</h2>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        We envision a world where performing arts break boundaries and connect hearts. Step Up Academy
                        aspires to
                        be a global platform where creativity thrives, talent flourishes, and every performer gets their
                        moment in
                        the spotlight.
                    </p>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section class="py-20 px-6 md:px-20 bg-white relative overflow-hidden">
            <div class="text-center mb-12 relative z-10">
                <h2 class="text-4xl font-extrabold text-gray-900 mb-3">Meet Our Founder</h2>
                <p class="text-gray-500 text-lg max-w-2xl mx-auto">
                    The creative mind behind our vision, leading with passion, discipline, and dedication to the art of
                    performance.
                </p>
            </div>

            <div
                class="max-w-4xl mx-auto flex flex-col md:flex-row items-center gap-10 bg-gradient-to-br from-purple-100 to-pink-100 p-10 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 relative z-10">
                <img :src="akshayImg" alt="Founder"
                    class="w-48 h-48 object-cover rounded-full border-4 border-white shadow-lg transform hover:scale-105 transition-transform duration-500" />

                <div class="text-center md:text-left">
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Akshay Paul</h3>
                    <p class="text-pink-600 font-semibold mb-4">Founder & Choreographer</p>
                    <p class="text-gray-600 leading-relaxed">
                        With years of experience in choreography and stage direction, Niranjan has transformed young
                        talents into
                        confident performers. His dedication, creativity, and mentorship are the heart of our academy’s
                        success.
                    </p>
                </div>
            </div>

            <!-- Background glow effects -->
            <div class="absolute top-20 left-10 w-56 h-56 bg-purple-400/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-10 right-10 w-72 h-72 bg-pink-400/30 rounded-full blur-3xl animate-ping"></div>
        </section>


        <!-- Call to Action -->
        <section class="py-16 bg-gradient-to-r from-pink-600 to-purple-700 text-center text-white">
            <h2 class="text-3xl font-bold mb-4">Join Our Journey</h2>
            <p class="text-white/90 mb-8 max-w-2xl mx-auto">
                Become a part of our growing community of dreamers, dancers, and fashion enthusiasts.
            </p>
            <a href="/enroll"
                class="inline-block bg-white text-pink-600 font-semibold px-8 py-4 rounded-full shadow-lg hover:shadow-xl hover:bg-gray-100 transition">
                Enroll Now
            </a>
        </section>
    </BaseLayout>
</template>

<style scoped>
@keyframes fade-in {
    from {
        opacity: 0;
        transform: translateY(15px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in {
    animation: fade-in 1s ease-out;
}
</style>
