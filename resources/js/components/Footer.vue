<script setup lang="ts">
import { NavItem } from '@/types';
import { Link } from '@inertiajs/vue3';
import AppLogoIcon from './AppLogoIcon.vue';
import { MapPin, Phone, Mail } from 'lucide-vue-next';

// Quick navigation items
// Quick links for Dance Academy
const QuickLinksItems: NavItem[] = [
    {
        title: 'Enroll Now',
        href: '/enroll',
    },
    {
        title: 'Class Schedule',
        href: '/classes',
    },
    {
        title: 'Our Instructors',
        href: '/instructors',
    },
    {
        title: 'Performances & Events',
        href: '/events',
    },
    {
        title: 'Photo & Video Gallery',
        href: '/gallery',
    },
    {
        title: 'About the Academy',
        href: '/about',
    },
    {
        title: 'Contact Us',
        href: '/contact',
    },
    {
        title: 'Student Stories',
        href: '/testimonials',
    },
];


// Information navigation items for Dance Academy
const InformationItems: NavItem[] = [
    {
        title: 'Academy Policies',
        href: '/policies',
    },
    {
        title: 'Certificates & Recognition',
        href: '/certificates',
    },
    {
        title: 'Announcements',
        href: '/announcements',
    },
    {
        title: 'Fees & Payment Details',
        href: '/fees',
    },
    {
        title: 'Competition Results',
        href: '/results',
    },
    {
        title: 'Join Our Team',
        href: '/career',
    },
];


// Address navigation items
const AddressItems: NavItem[] = [
    {
        title: 'Sarupathar, Golaghat - 785602 (ASSAM)',
        href: 'https://maps.app.goo.gl/Av8DGWGY4ZMmstBKA',
        icon: MapPin,
    },
    {
        title: 'Phone: 70862 08757',
        href: 'tel:+917086208757',
        icon: Phone,
    },
    {
        title: 'Email: akuakshu41@gmail.com',
        href: 'mailto:akuakshu41@gmail.com',
        icon: Mail,
    },
];

</script>

<template>
    <div class="footer">
        <!-- <div class="bg-[#182333] px-8 py-20"> -->
        <!-- <div class="bg-[var(--primary-brand-500)] px-8 py-20"> -->
        <div class="bg-neutral-100 px-8 py-20">
            <div class="flex-col justify-center max-w-7xl mx-auto">
                <div class="flex gap-5">
                    <div class="size-20">
                        <AppLogoIcon />
                    </div>
                    <div class="my-auto">
                        <h5 class="">Step Up Dance Academy</h5>
                        <span class="font-medium">
                            Established in 2005, ISO 9001:2015 Certified Institute.
                            <br>
                            Regd. No. AS-29-0000575
                        </span>
                    </div>
                </div>
                <p class="mt-5">
                    Where World Champions Are Made.
                </p>
                <hr class="border-black/20 my-10">
            </div>


            <div
                class="footer-top grid text-left grid-cols-2 md:grid-cols-3 text-gray-700 small font-medium gap-x-8 gap-y-8 max-w-7xl mx-auto">
                <div class="flex flex-col items-start">
                    <h4 class="text-black mb-3">Quick Links</h4>
                    <Link
                        class="pb-1 small relative after:bg-gray-300 after:absolute after:h-[1.5px] after:w-0 after:bottom-0 after:left-0 hover:after:w-full after:transition-all after:duration-300 cursor-pointer w-fit"
                        v-for="item in QuickLinksItems" :key="item.title" :href="item.href">{{ item.title }}</Link>
                </div>
                <div class="flex flex-col items-start">
                    <h4 class="text-black mb-3">Information</h4>
                    <Link
                        class="pb-1 small relative after:bg-gray-300 after:absolute after:h-[1.5px] after:w-0 after:bottom-0 after:left-0 hover:after:w-full after:transition-all after:duration-300 cursor-pointer w-fit"
                        v-for="item in InformationItems" :key="item.title" :href="item.href">{{ item.title }}</Link>
                </div>
                <div class="flex flex-col items-start">
                    <h4 class="text-black mb-3">Address</h4>
                    <a target="_blank" rel="noopener noreferrer"
                        class="pb-1 small relative after:bg-gray-300 after:absolute after:h-[2px] after:w-0 after:bottom-0 after:left-0 hover:after:w-full after:transition-all after:duration-300 cursor-pointer w-fit"
                        v-for="item in AddressItems" :key="item.title" :href="item.href">
                        <span class="flex items-center">
                            <component :is="item.icon" class="size-4 mr-2" />
                            {{ item.title }}
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <!-- <div class="bg-[#021526] p-8"> -->
        <div class="bg-[#3d5cd8] p-8">
        <div
                class="footer-bottom grid grid-cols-1 md:grid-cols-2 text-white small gap-y-8 max-w-7xl mx-auto">
                <div class="flex flex-col items-center text-center md:items-start">
                    <span class="text-gray-300">©2025 Step Up Dance Academy, All Rights Reserved.</span>
                    <!-- <a href="https://www.deolang.com/" target="_blank" class="text-sky-100 hover:text-white font-semibold">Powered by
                        DeoLang
                    </a> -->
                </div>
                <div class="flex flex-col items-center md:items-end">
                    <!-- <span class="text-right text-gray-500">Today's visitors: 17</span> -->
                    <!-- <span class="text-right text-gray-500">Total visitors : 1,188</span> -->
                </div>
            </div>
        </div>
    </div>
</template>