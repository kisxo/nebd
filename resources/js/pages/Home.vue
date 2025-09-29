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
                            <a href="/register" class='bg-orange-600 text-white px-8 py-2 rounded-sm'>Register
                                Now</a>
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

        <div class="max-w-7xl mx-auto p-8 md:p-16 ">

            <h2 class="text-center custom-title py-10">Our Judges</h2>
            <p class="pb-20 text-lg text-center font-medium text-neutral-600">A panel of expert choreographers and
                performers, <br> bringing passion, experience, and fair judgment to every performance.</p>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                <div v-for="judge in judges" class="shadow rounded overflow-hidden">
                    <img :src="judge.image" alt="">
                    <div class="p-4">
                        <p class="text-lg lg:text-2xl font-bold">{{ judge.name }}</p>
                        <p class="lg:text-lg font-thin">{{ judge.role }}</p>
                    </div>
                </div>
            </div>
        </div>
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