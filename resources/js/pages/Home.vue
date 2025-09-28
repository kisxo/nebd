<script setup lang="ts">
import BaseLayout from '@/layouts/BaseLayout.vue';
import danceHero1 from '../../assets/dance-hero-1.jpg';
import danceHero2 from '../../assets/dance-hero-2.jpg';
import nebdLogo from '../../assets/nebdLogo.png';

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
        name: "Akanshya Sharma",
        image: akanshyaImg,
        role: "Dance + Winner"
    },
    {
        name: "Akshay Paul",
        image: imonImg,
        role: "Organizer"
    },
    {
        name: "Akanshya Sharma",
        image: pariImg,
        role: "Dance + Winner"
    },
    {
        name: "Akshay Paul",
        image: riteshImg,
        role: "Organizer"
    },
    {
        name: "Akanshya Sharma",
        image: rohanImg,
        role: "Dance + Winner"
    }
]

</script>

<template>
    <BaseLayout>
        <div class="bg-no-repeat bg-cover bg-center" :style="{ backgroundImage: `url(${danceHero1})` }">
            <div class="p-8 md:p-16 flex flex-col-reverse md:grid md:grid-cols-2 w-full min-h-[500px] backdrop-blur-sm">
                <div class="flex flex-col items-center justify-evenly min-h-[300px]">
                    <div class="flex flex-col items-center justify-center gap-20 w-full h-full pb-20 md:py-20">
                        <div class="">
                            <div class="bg-red-500 px-1 text-white text-sm font-medium w-fit m-1">
                                STEP UP DANCE ACADEMY PRESENTS
                            </div>
                            <div class="nebd">
                                NORTH EAST
                                <br>
                                BEST DANCER
                            </div>
                            <div class="text-blue-200 text-end pt-5">
                                Northeast's Biggest Dance Championship
                            </div>
                        </div>

                        <!-- <img :src="nebdLogo" class="w-[50%]" /> -->

                        <div class=''>
                            <a href="/register" class='bg-orange-600 text-white px-8 py-2 rounded-sm'>Register
                                Now</a>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="flex flex-col items-center justify-center w-full h-full">
                        <img :src="nebdLogo" alt="" class="w-[50%]">
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto p-8 md:p-16 ">

            <h2 class="text-center custom-title py-10">Our Judges</h2>
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
    font-size: 50px;
    line-height: 45px;
    color: white;
}

.custom-title{
    font-family: 'Calligraffitti', cursive;
    font-weight: 900;
    font-size: 5rem;
    text-shadow: -15px 5px 20px #ced0d3;
    letter-spacing: 0.02em;
    text-align: center;
    color: #fff183;
    text-shadow: 2px 2px 0px #F9f1cc, 
        2px 2px 0px #FFD662, 
        4px 4px 0px  #FF80BF, 
        6px 6px 0px #EF5097, 
        8px 8px 0px #6868AC, 
        10px 10px 0px #90B1E0;
}
</style>