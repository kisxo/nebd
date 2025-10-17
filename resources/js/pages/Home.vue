<script setup lang="ts">
import BaseLayout from '@/layouts/BaseLayout.vue';
import danceHero1 from '../../assets/dance-hero-1.jpg';
import danceHero2 from '../../assets/dance-hero-2.jpg';
import nebdLogo from '../../assets/nebdLogo.png';
import nefsLogo from '../../assets/nefsLogo.png';

import akshayImg from "../../assets/judges/akshay.png";
import akanshyaImg from "../../assets/judges/akanshya.png";
import imonImg from "../../assets/judges/imon.png";
import pariImg from "../../assets/judges/pari.png";
import riteshImg from "../../assets/judges/ritesh.png";
import rohanImg from "../../assets/judges/rohan.png";
import dancePoster from "../../assets/dance-poster.png";


import Footer from '@/components/Footer.vue';
import Rules from '@/components/home/Rules.vue';
import { Link } from '@inertiajs/vue3';

const judges = [
    {
        name: "Akshay Paul",
        image: akshayImg,
        role: "Organizer"
    },
    {
        name: "Akanshya Priyadarshoni",
        image: akanshyaImg,
        role: "Dance + Pro"
    },
    {
        name: "Imon Kharjana",
        image: imonImg,
        role: "Hip Hop India"
    },
    {
        name: "Pari Tamang",
        image: pariImg,
        role: "Super Dancer 4"
    },
    {
        name: "Ritesh Pal",
        image: riteshImg,
        role: "Dance + Pro"
    },
    {
        name: "Rohan Choudhary",
        image: rohanImg,
        role: "India's Best Dancer 4"
    }
]

</script>

<template>
    <BaseLayout>
        <div class="bg-no-repeat bg-cover bg-center" :style="{ backgroundImage: `url(${danceHero1})` }">
            <div
                class="p-8 md:p-16 flex flex-col-reverse md:grid md:grid-cols-2 w-full min-h-[500px] bg-black/15 backdrop-blur-sm">
                <div class="flex flex-col items-center justify-evenly min-h-[300px] py-12">
                    <div class="flex flex-col items-center justify-center w-full h-full gap-8">
                        <div class="">
                            <div class="bg-red-500 px-1 text-white text-sm font-medium w-fit m-1">
                                STEP UP DANCE ACADEMY PRESENTS
                            </div>
                            <div class="nebd text-8xl flex flex-col mt-4">
                                <span class="text-3xl ps-1"> NORTHEAST'S</span>
                                <span>BIGGEST</span>
                            </div>
                            <div class=" text-white flex justify-center gap-6 items-end ultra-gold pt-8">
                                <span class="molle-regular-italic text-6xl ">Dance</span>
                                <span class="custom-and text-4xl">&</span>
                                <span class="molle-regular-italic text-6xl">Fashion</span>
                            </div>
                            <div class=" text-white flex justify-center gap-6 items-end ultra-gold">
                                <span class="molle-regular-italic text-5xl ">Championship</span>
                            </div>
                        </div>

                        <div class="">
                            <div class="flex flex-col items-center justify-center w-full h-full md:hidden pb-10">
                                <img :src="nebdLogo" alt="" class="w-[50%]">
                                <img :src="nefsLogo" alt="" class="w-[50%]">
                            </div>
                        </div>

                        <div class=''>
                            <Link href="/online-registration/create"
                                class='bg-orange-600 text-white px-8 py-2 rounded-sm'>Register
                                Now</Link>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="hidden md:flex flex-col items-center justify-center w-full h-full ">
                        <img :src="nebdLogo" alt="" class="w-[50%]">
                        <img :src="nefsLogo" alt="" class="w-[50%]">
                    </div>
                </div>
            </div>
        </div>

        <section
            class="relative overflow-hidden py-32 px-6 md:px-28 bg-gradient-to-br from-[#061137] via-[#070e23] to-[#213a60] text-white">

            <!-- Layered Gold & Blue Glows -->
            <div
                class="absolute -top-40 -left-40 w-96 h-96 bg-gradient-to-r from-blue-800/50 via-blue-900/70 to-transparent rounded-full blur-[180px] opacity-60">
            </div>
            <div
                class="absolute bottom-0 right-0 w-96 h-96 bg-gradient-to-bl from-yellow-100 via-yellow-400/30 to-transparent rounded-full blur-[120px] opacity-40">
            </div>
            <div
                class="absolute top-[40%] left-[10%] w-24 h-24 bg-gradient-to-br from-yellow-200/20 to-yellow-100/40 rounded-full blur-xl opacity-30 animate-pulse">
            </div>
            <div
                class="absolute bottom-[18%] right-[20%] w-20 h-20 bg-gradient-to-tr from-blue-600/40 to-indigo-800/30 rounded-full blur-lg opacity-30 animate-bounce">
            </div>

            <!-- Decorative Flicker Particles -->
            <div class="absolute inset-0 pointer-events-none">
                <div
                    class="absolute top-[19%] left-[68%] w-4 h-4 bg-yellow-200 rounded-full blur-md opacity-70 animate-ping">
                </div>
                <div
                    class="absolute bottom-[30%] left-[30%] w-2 h-2 bg-[#ffd700] rounded-full blur-sm opacity-70 animate-bounce delay-300">
                </div>
                <div
                    class="absolute top-[52%] right-[5%] w-3 h-3 bg-yellow-200 rounded-full blur-sm opacity-80 animate-pulse delay-500">
                </div>
            </div>

            <!-- Header -->
            <div class="text-center relative z-20 mb-20">
                <h1
                    class="text-6xl md:text-7xl font-extrabold bg-gradient-to-r from-yellow-200 via-white to-yellow-300 bg-clip-text text-transparent tracking-tight drop-shadow-lg">
                    Northeast Best Dancer 2025
                </h1>
                <p class="mt-6 text-lg md:text-2xl text-yellow-100">
                    <span class="text-yellow-300 font-bold">Incredible Talent of Northeast</span> · Total Cash Prize
                    <strong class="text-yellow-200">₹1,25,000</strong>
                </p>
            </div>

            <!-- Grid Layout -->
            <div class="relative z-20 grid md:grid-cols-2 gap-16 items-start">
                <!-- Poster -->
                <div class="group relative">
                    <div
                        class="rounded-[2rem] overflow-hidden border-2 border-yellow-200/40 shadow-[0_0_48px_6px_rgba(18,23,60,0.26)] bg-black/30 backdrop-blur-xl transition-all duration-700 group-hover:scale-105">
                        <img :src="dancePoster" alt="Event Poster"
                            class="w-full h-full object-cover opacity-90 hover:opacity-100 transition duration-500" />
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-blue-900/50 opacity-0 group-hover:opacity-70 transition duration-700">
                        </div>
                    </div>
                    <!-- <div class="absolute bottom-6 left-6  to-white/20 backdrop-blur border border-yellow-100/60 rounded-xl p-4 text-base font-bold uppercase text-gray-900 shadow-lg">
        Empowering Northeast Talent
      </div> -->
                </div>

                <!-- Right Details Column -->
                <div class="space-y-10">
                    <!-- Event Info Card -->
                    <div
                        class="bg-white/5 backdrop-blur-2xl border border-yellow-100/20 rounded-[1.8rem] p-8 shadow-xl hover:shadow-yellow-200/20 transition-all duration-500">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-4 h-4 bg-yellow-400 rounded-full"></div>
                            <h3 class="text-2xl font-semibold text-yellow-100">Event Details</h3>
                        </div>
                        <ul class="space-y-2 text-yellow-100">
                            <li><strong class="text-yellow-300">Date:</strong> 27–28 December 2025</li>
                            <li><strong class="text-yellow-300">Reporting:</strong> 8:00 AM</li>
                            <li><strong class="text-yellow-300">Venue:</strong> Sarupathar, Golaghat</li>
                            <li><strong class="text-yellow-300">Organizer:</strong> Akshay Paul (Step Up Dance Academy)
                            </li>
                            <li><strong class="text-yellow-300">Contact:</strong> 7086208757</li>
                        </ul>
                    </div>

                    <!-- Judges Card -->
                    <div
                        class="bg-gradient-to-br from-black/40 via-blue-900/50 to-blue-800/40 border border-yellow-100/10 rounded-[1.8rem] p-8 shadow-2xl">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-4 h-4 bg-yellow-300 rounded-full"></div>
                            <h3 class="text-2xl font-semibold text-yellow-100">Judges & Guests</h3>
                        </div>
                        <ul class="gap-y-2 grid grid-cols-2 text-yellow-50 list-disc list-inside">
                            <li>Dharmesh Sir <span class="text-yellow-200/70 text-sm">(Grand Final)</span></li>
                            <li>Imon Kharjana</li>
                            <li>Akashya Priyadarshoni</li>
                            <li>Ritesh Pal</li>
                            <li>Rohan Choudhary</li>
                            <li>Pari Tamang <span class="text-yellow-100/70 text-sm">(Guest)</span></li>
                        </ul>
                    </div>

                    <!-- Competition Info Card -->
                    <div
                        class="bg-white/5 backdrop-blur-xl border border-yellow-100/20 rounded-[1.8rem] p-8 relative overflow-hidden group">
                        <div
                            class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-yellow-400/10 to-transparent opacity-60 group-hover:opacity-80 transition-all duration-700">
                        </div>
                        <div class="flex items-center gap-3 mb-6 relative">
                            <div class="w-4 h-4 bg-yellow-200 rounded-full"></div>
                            <h3 class="text-2xl font-semibold text-yellow-100">Competition Structure</h3>
                        </div>
                        <div class="grid md:grid-cols-3 gap-8 text-yellow-50 relative">
                            <div>
                                <h4 class="text-yellow-300 font-bold mb-2">Age Limit</h4>
                                <ul class="space-y-1">
                                    <li>Sub Junior: 3–7</li>
                                    <li>Junior: 8–12</li>
                                    <li>Senior: 13+</li>
                                    <li>Duet/Group: No limit</li>
                                </ul>
                            </div>
                            <div>
                                <h4 class="text-yellow-300 font-bold mb-2">Song Duration</h4>
                                <ul class="space-y-1">
                                    <li>Sub Junior: 2:00</li>
                                    <li>Junior: 2:00</li>
                                    <li>Senior: 3:00</li>
                                    <li>Duet: 3:00</li>
                                    <li>Group: 4:00</li>
                                </ul>
                            </div>
                            <div>
                                <h4 class="text-yellow-300 font-bold mb-2">Entry Fees</h4>
                                <ul class="space-y-1">
                                    <li>Sub Junior: ₹800</li>
                                    <li>Junior: ₹1000</li>
                                    <li>Senior: ₹1000</li>
                                    <li>Duet: ₹1500</li>
                                    <li>Group: ₹2000</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Call to Action -->
                    <div class="pt-4">
                        <Link href="/online-registration/create"
                            class="inline-flex items-center gap-3 px-10 py-4 bg-gradient-to-r from-yellow-300 via-yellow-400 to-yellow-200 text-black font-extrabold rounded-full shadow-lg hover:scale-105 transition-transform duration-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="w-6 h-6">
                                <path d="M22 12H2m10-10v20" />
                            </svg>
                            Register Now
                        </Link>
                    </div>
                </div>

            </div>
            <!-- Decorative Gold Border -->
            <!-- <div class="absolute bottom-0 left-0 right-0 h-3 bg-gradient-to-r from-yellow-100 via-yellow-300 via-blue-900 to-blue-800 rounded-b-[3.5rem] opacity-70"></div> -->
        </section>


        <div
            class="relative mx-auto py-32 px-6 md:px-20 bg-gradient-to-br from-rose-50 via-amber-50/30 to-pink-100 overflow-hidden shadow-[0_0_100px_rgba(255,170,170,0.3)]">

            <!-- Complex Background Layer System -->
            <div class="absolute inset-0">
                <!-- Primary floating shapes -->
                <div
                    class="absolute top-16 left-20 w-64 h-64 bg-gradient-to-br from-pink-300/40 to-rose-400/30 rounded-full blur-[80px] animate-pulse">
                </div>
                <div
                    class="absolute bottom-20 right-16 w-80 h-80 bg-gradient-to-tl from-amber-300/30 to-orange-200/40 rounded-full blur-[120px] animate-ping">
                </div>

                <!-- Secondary accent blobs -->
                <div class="absolute top-1/2 left-1/3 w-40 h-40 bg-rose-200/50 rounded-full blur-[60px] animate-bounce">
                </div>
                <div
                    class="absolute bottom-1/3 left-1/4 w-48 h-48 bg-pink-300/30 rounded-full blur-[90px] animate-pulse delay-1000">
                </div>

                <!-- Mesh gradient overlay -->
                <div
                    class="absolute inset-0 bg-gradient-to-r from-transparent via-rose-100/20 to-transparent opacity-60">
                </div>
            </div>

            <!-- Floating Particles -->
            <div class="absolute inset-0 pointer-events-none">
                <div
                    class="absolute top-[20%] left-[15%] w-2 h-2 bg-pink-400 rounded-full opacity-40 animate-ping delay-500">
                </div>
                <div
                    class="absolute top-[60%] right-[20%] w-3 h-3 bg-rose-300 rounded-full opacity-30 animate-pulse delay-1000">
                </div>
                <div
                    class="absolute bottom-[30%] left-[70%] w-1 h-1 bg-amber-400 rounded-full opacity-50 animate-bounce delay-700">
                </div>
            </div>

            <!-- Header with Complex Typography -->
            <div class="relative z-20 text-center mb-24">
                <div class="relative inline-block">
                    <h2
                        class="text-6xl md:text-7xl font-black bg-gradient-to-r from-rose-600 via-pink-500 via-amber-400 to-orange-500 bg-clip-text text-transparent tracking-tight drop-shadow-sm">
                        Our Judges
                    </h2>
                    <!-- Accent line -->
                    <div
                        class="absolute -bottom-4 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-gradient-to-r from-rose-400 to-pink-400 rounded-full">
                    </div>
                </div>
                <p class="mt-8 text-neutral-700 text-xl md:text-2xl leading-relaxed font-medium max-w-3xl mx-auto">
                    A stellar lineup of celebrated choreographers and performers, <br>
                    united by <span class="text-rose-600 font-semibold">artistry</span>, <span
                        class="text-pink-600 font-semibold">fairness</span>, and <span
                        class="text-amber-600 font-semibold">passion</span> for dance.
                </p>
            </div>

            <!-- Advanced Judges Grid: Uniform Card Size -->
            <div class="relative z-20 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-16">
                <div v-for="judge in judges" class="group relative flex flex-col items-stretch h-[450px] max-h-[450px]">

                    <!-- Card Structure: fixed size container -->
                    <div
                        class="relative flex flex-col h-full w-full bg-white/60 backdrop-blur-2xl border border-white/80 rounded-[2rem] overflow-hidden shadow-xl hover:shadow-2xl hover:shadow-rose-300/40 transition-all duration-700">

                        <!-- Floating glow rings -->
                        <div
                            class="absolute -top-4 -right-4 w-8 h-8 rounded-full bg-gradient-to-br from-pink-400/60 to-rose-400/60 blur-sm opacity-0 group-hover:opacity-100 group-hover:animate-ping transition-all duration-500">
                        </div>
                        <div
                            class="absolute -bottom-4 -left-4 w-6 h-6 rounded-full bg-gradient-to-tr from-amber-300/50 to-orange-300/50 blur-sm opacity-0 group-hover:opacity-100 group-hover:animate-pulse transition-all duration-700">
                        </div>

                        <!-- Image container: fixed height and aspect -->
                        <div class="relative h-[260px] w-full overflow-hidden rounded-t-[2rem] flex-shrink-0">
                            <img :src="judge.image" alt=""
                                class="w-full h-full object-cover transition-all duration-1000 group-hover:scale-110 group-hover:rotate-1" />
                            <!-- Overlays -->
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-rose-900/60 via-pink-500/20 to-transparent opacity-60 group-hover:opacity-40 transition-all duration-500">
                            </div>
                            <div
                                class="absolute inset-0 bg-gradient-radial from-transparent via-rose-200/10 to-rose-300/30 opacity-0 group-hover:opacity-100 transition-all duration-700">
                            </div>
                            <div
                                class="absolute top-4 right-4 w-8 h-8 rounded-full bg-white/30 backdrop-blur-md border border-white/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-500 group-hover:animate-bounce">
                                <div class="w-3 h-3 rounded-full bg-gradient-to-br from-pink-400 to-rose-500"></div>
                            </div>
                        </div>

                        <!-- Card body: equal padding, fills space -->
                        <div class="relative p-8 flex flex-col justify-between flex-1">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-white/80 via-rose-50/60 to-pink-50/40 rounded-b-[2rem]">
                            </div>
                            <div class="relative z-10 text-center flex flex-col justify-center h-full">
                                <h3
                                    class="text-2xl md:text-3xl font-bold text-rose-800 mb-2 tracking-tight group-hover:text-rose-900 transition-colors duration-300">
                                    {{ judge.name }}
                                </h3>
                                <p
                                    class="text-lg md:text-xl font-light text-rose-600 group-hover:text-rose-700 transition-colors duration-300">
                                    {{ judge.role }}
                                </p>
                                <div
                                    class="mt-4 w-12 h-0.5 bg-gradient-to-r from-rose-400 to-pink-400 mx-auto opacity-0 group-hover:opacity-100 transition-all duration-500 transform scale-x-0 group-hover:scale-x-100">
                                </div>
                            </div>
                        </div>

                        <!-- Card border glow effect -->
                        <div
                            class="absolute inset-0 rounded-[2rem] border border-gradient-to-r from-rose-300/50 via-pink-300/30 to-amber-300/40 opacity-0 group-hover:opacity-100 transition-all duration-500">
                        </div>
                    </div>
                </div>
            </div>



            <!-- Corner accent elements -->
            <div class="absolute top-8 left-8 w-16 h-16 border-l-2 border-t-2 border-rose-300/40 rounded-tl-2xl"></div>
            <div class="absolute bottom-8 right-8 w-16 h-16 border-r-2 border-b-2 border-pink-300/40 rounded-br-2xl">
            </div>
        </div>

        <Rules/>


        <Footer />
    </BaseLayout>
</template>

<style scoped>
.nebd {
    font-weight: 900;
    font-family: "Poppins", sans-serif;
    color: white;
    line-height: 65px;
}


.ultra-gold {
    background: linear-gradient(to bottom, #cfc09f 27%, #ffecb3 40%, #8e7942 78%);
    -webkit-background-clip: text;
    filter: drop-shadow(.5px .5px .5px rgb(255, 248, 185));
    -webkit-text-fill-color: transparent;
}



.molle-regular-italic {
    font-family: "Tangerine", cursive;
    font-weight: 700;
    font-style: normal;
}

.custom-and {
    font-family: 'Calligraffitti', cursive;
    font-weight: 900;
}

.custom-title {
    font-family: 'Calligraffitti', cursive;
    font-weight: 900;
    font-size: 5rem;
    text-shadow: -15px 5px 20px #ced0d3;
    letter-spacing: 0.02em;
    text-align: center;
    color: #fff183;
    text-shadow: 2px 2px 0px #F9f1cc,
        2px 2px 0px #FFD662,
        4px 4px 0px #FF80BF,
        6px 6px 0px #EF5097,
        8px 8px 0px #6868AC,
        10px 10px 0px #90B1E0;
}
</style>