<script setup lang="ts">
import AppLayout from "@/layouts/AppLayout.vue";

import akshayImg from "../../assets/judges/akshay.png";
import dharmeshImg from "../../assets/judges/Dharmesh.png";
import akanshyaImg from "../../assets/judges/akanshya.png";
import imonImg from "../../assets/judges/imon.png";
import pariImg from "../../assets/judges/pari.png";
import riteshImg from "../../assets/judges/ritesh.png";
import rohanImg from "../../assets/judges/rohan.png";
import { computed, ref } from 'vue';
import BaseLayout from "@/layouts/BaseLayout.vue";
import Footer from "@/components/Footer.vue";

// Mock data: replace with API or props
type Judge = {
    id: number;
    name: string;
    title: string;
    role: 'Grand Final' | 'Semi Finale' | 'Guest';
    genre: string;
    city: string;
    image: string;
    awards?: string[];
    experience: number;
    shows: number;
    followers: number;
    bio: string;
    links?: { label: string; href: string }[];
};

const judges = ref<Judge[]>([
    { id: 1, name: 'Dharmesh Sir', title: 'Celebrity Choreographer', role: 'Grand Final', genre: 'Bollywood/Freestyle', city: 'Mumbai', image: dharmeshImg, awards: ['TV Judge', 'National Tours'], experience: 15, shows: 120, followers: 950, bio: 'Renowned performer and mentor known for dynamic freestyle and mentorship across national platforms.', links: [{ label: 'Instagram', href: '#' }] },
    { id: 2, name: 'Imon Kharjana', title: 'Choreographer', role: 'Semi Finale', genre: 'Contemporary', city: 'Guwahati', image: imonImg, experience: 9, shows: 60, followers: 120, bio: 'Acclaimed for emotive contemporary storytelling and clean technique.' },
    { id: 3, name: 'Akashya Priyadarshoni', title: 'Performer & Coach', role: 'Semi Finale', genre: 'Classical Fusion', city: 'Kolkata', image: akanshyaImg, experience: 8, shows: 48, followers: 85, bio: 'Classical roots blended with modern forms; mentor to multiple state-level winners.' },
    { id: 4, name: 'Ritesh Pal', title: 'Choreographer', role: 'Semi Finale', genre: 'Hip-Hop', city: 'Shillong', image: riteshImg, experience: 7, shows: 52, followers: 65, bio: 'Crew founder and street styles advocate with strong musicality.' },
    { id: 5, name: 'Rohan Choudhary', title: 'Performer & Teacher', role: 'Semi Finale', genre: 'Urban', city: 'Guwahati', image: rohanImg, experience: 6, shows: 41, followers: 58, bio: 'Urban grooves with focus on texture and control; teaches across the Northeast.' },
    { id: 6, name: 'Pari Tamang', title: 'Special Guest', role: 'Guest', genre: 'Fashion/Hosting', city: 'Gangtok', image: pariImg, experience: 10, shows: 90, followers: 140, bio: 'Model and event host bringing charm and stage presence to the show.' },
]);

// Filters
const query = ref('');
const filter = ref<{ role: '' | Judge['role']; genre: string }>({ role: '', genre: '' });

const genres = computed(() => {
    const set = new Set(judges.value.map(j => j.genre));
    return Array.from(set).sort();
});

const filteredJudges = computed(() => {
    const q = query.value.trim().toLowerCase();
    return judges.value.filter(j => {
        const passesQuery =
            !q ||
            j.name.toLowerCase().includes(q) ||
            j.genre.toLowerCase().includes(q) ||
            j.city.toLowerCase().includes(q) ||
            j.title.toLowerCase().includes(q);
        const passesRole = !filter.value.role || j.role === filter.value.role;
        const passesGenre = !filter.value.genre || j.genre === filter.value.genre;
        return passesQuery && passesRole && passesGenre;
    });
});

// Counts for hero stats
const counts = computed(() => ({
    grandFinal: filteredJudges.value.filter(j => j.role === 'Grand Final').length,
    semi: filteredJudges.value.filter(j => j.role === 'Semi Finale').length,
    guests: filteredJudges.value.filter(j => j.role === 'Guest').length,
}));

// Pagination
const page = ref(1);
const pageSize = ref(6);
const totalPages = computed(() => Math.max(1, Math.ceil(filteredJudges.value.length / pageSize.value)));
const pagedJudges = computed(() => {
    if (page.value > totalPages.value) page.value = totalPages.value;
    const start = (page.value - 1) * pageSize.value;
    return filteredJudges.value.slice(start, start + pageSize.value);
});

// Modal
const activeJudge = ref<Judge | null>(null);
function openBio(j: Judge) {
    activeJudge.value = j;
}

// Helpers
function badgeClass(role: Judge['role']) {
    if (role === 'Grand Final') return 'text-black bg-gradient-to-r from-yellow-300 to-yellow-100 border border-yellow-200';
    if (role === 'Semi Finale') return 'text-yellow-100 bg-white/10 border border-yellow-100/30';
    return 'text-yellow-200 bg-blue-900/40 border border-yellow-100/20';
}
</script>


<template>
    <BaseLayout>
        <main class="min-h-screen bg-gradient-to-br from-[#061137] via-[#070e23] to-[#213a60] text-white">

            <!-- Hero -->
            <section class="relative overflow-hidden py-24 px-6 md:px-20 rounded-b-[3rem]">
                <!-- Glows -->
                <div
                    class="absolute -top-40 -left-40 w-96 h-96 bg-gradient-to-r from-blue-800/50 via-blue-900/70 to-transparent rounded-full blur-[160px] opacity-60">
                </div>
                <div
                    class="absolute bottom-0 right-0 w-96 h-96 bg-gradient-to-bl from-yellow-100 via-yellow-400/30 to-transparent rounded-full blur-[120px] opacity-40">
                </div>

                <div class="relative z-10 max-w-7xl mx-auto text-center">
                    <span
                        class="inline-block bg-white/10 border border-yellow-100/20 text-yellow-100 rounded-xl px-4 py-1 tracking-wide">Official
                        Panel</span>
                    <h1
                        class="mt-6 text-5xl md:text-7xl font-extrabold bg-gradient-to-r from-yellow-200 via-white to-yellow-300 bg-clip-text text-transparent tracking-tight">
                        Judges & Guests
                    </h1>
                    <p class="mt-5 text-yellow-100/90 max-w-3xl mx-auto">
                        A distinguished panel of choreographers, performers, and industry mentors delivering fair,
                        insightful adjudication for every performance.
                    </p>

                    <!-- Stats -->
                    <div class="mt-10 grid grid-cols-2 sm:grid-cols-4 gap-4 max-w-3xl mx-auto">
                        <div class="bg-white/5 border border-yellow-100/20 rounded-2xl p-4 text-center">
                            <p class="text-3xl font-extrabold text-yellow-200">{{ filteredJudges.length }}</p>
                            <p class="text-xs text-yellow-100/80">Total Members</p>
                        </div>
                        <div class="bg-white/5 border border-yellow-100/20 rounded-2xl p-4 text-center">
                            <p class="text-3xl font-extrabold text-yellow-200">{{ counts.grandFinal }}</p>
                            <p class="text-xs text-yellow-100/80">Grand Final Judges</p>
                        </div>
                        <div class="bg-white/5 border border-yellow-100/20 rounded-2xl p-4 text-center">
                            <p class="text-3xl font-extrabold text-yellow-200">{{ counts.semi }}</p>
                            <p class="text-xs text-yellow-100/80">Semi-Finale Judges</p>
                        </div>
                        <div class="bg-white/5 border border-yellow-100/20 rounded-2xl p-4 text-center">
                            <p class="text-3xl font-extrabold text-yellow-200">{{ counts.guests }}</p>
                            <p class="text-xs text-yellow-100/80">Special Guests</p>
                        </div>
                    </div>

                    <!-- Search + Filters -->
                    <div class="mt-12 max-w-5xl mx-auto">
                        <div class="grid md:grid-cols-[1fr,260px,260px] gap-4">
                            <div class="relative">
                                <input v-model="query" type="text" placeholder="Search judges by name, style, city..."
                                    class="w-full rounded-2xl bg-white/10 border border-yellow-100/20 px-5 py-3 outline-none placeholder-yellow-100/60 focus:ring-2 focus:ring-yellow-300" />
                                <svg class="w-5 h-5 absolute right-4 top-1/2 -translate-y-1/2 text-yellow-200"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="m21 21-4.35-4.35M11 19a8 8 0 1 1 0-16 8 8 0 0 1 0 16z" />
                                </svg>
                            </div>
                            <select v-model="filter.role"
                                class="rounded-2xl bg-white/10 border border-yellow-100/20 px-4 py-3 outline-none focus:ring-2 focus:ring-yellow-300">
                                <option value="">All Roles</option>
                                <option value="Grand Final">Grand Final Judge</option>
                                <option value="Semi Finale">Semi-Finale Judge</option>
                                <option value="Guest">Special Guest</option>
                            </select>
                            <select v-model="filter.genre"
                                class="rounded-2xl bg-white/10 border border-yellow-100/20 px-4 py-3 outline-none focus:ring-2 focus:ring-yellow-300">
                                <option value="">All Genres</option>
                                <option v-for="g in genres" :key="g" :value="g">{{ g }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Judges Grid -->
            <section class="relative z-10 max-w-7xl mx-auto px-6 md:px-10 py-14">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
                    <article v-for="j in pagedJudges" :key="j.id" class="group relative flex flex-col items-stretch">
                        <!-- Card -->
                        <div
                            class="relative flex flex-col h-full w-full bg-white/5 backdrop-blur-2xl border border-yellow-100/20 rounded-[2rem] overflow-hidden shadow-xl hover:shadow-2xl hover:shadow-yellow-300/20 transition-all duration-700">
                            <!-- Glow rings -->
                            <div
                                class="absolute -top-4 -right-4 w-8 h-8 rounded-full bg-gradient-to-br from-yellow-300/60 to-yellow-200/60 blur-sm opacity-0 group-hover:opacity-100 group-hover:animate-ping transition-all duration-500">
                            </div>
                            <div
                                class="absolute -bottom-4 -left-4 w-6 h-6 rounded-full bg-gradient-to-tr from-blue-500/40 to-indigo-500/40 blur-sm opacity-0 group-hover:opacity-100 group-hover:animate-pulse transition-all duration-700">
                            </div>

                            <!-- Image -->
                            <div class="relative h-[280px] w-full overflow-hidden rounded-t-[2rem] flex-shrink-0">
                                <img :src="j.image" :alt="j.name"
                                    class="w-full h-full object-cover transition-all duration-1000 group-hover:scale-110 group-hover:rotate-[0.5deg]" />
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-blue-900/40 opacity-50 group-hover:opacity-40 transition">
                                </div>

                                <!-- Badge -->
                                <div class="absolute top-4 left-4 inline-flex items-center gap-2 px-3 py-1 rounded-full text-[11px] font-bold"
                                    :class="badgeClass(j.role)">
                                    <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                                    {{ j.role }}
                                </div>
                            </div>

                            <!-- Body -->
                            <div class="relative p-6 flex flex-col justify-between flex-1">
                                <div
                                    class="absolute inset-0 rounded-b-[2rem] bg-gradient-to-br from-white/5 via-blue-900/10 to-transparent pointer-events-none">
                                </div>
                                <header class="relative z-10">
                                    <h3 class="text-2xl font-bold tracking-tight text-yellow-100">{{ j.name }}</h3>
                                    <p class="text-sm text-yellow-100/80 mt-1">{{ j.title }}</p>
                                </header>

                                <ul class="relative z-10 mt-4 text-[13px] text-yellow-100/80 space-y-1">
                                    <li><span class="text-yellow-300">Genre:</span> {{ j.genre }}</li>
                                    <li><span class="text-yellow-300">City:</span> {{ j.city }}</li>
                                    <li v-if="j.awards?.length"><span class="text-yellow-300">Awards:</span> {{
                                        j.awards.join(', ') }}</li>
                                </ul>

                                <div class="relative z-10 mt-5 flex items-center justify-between">
                                    <button @click="openBio(j)"
                                        class="inline-flex items-center gap-2 text-black font-semibold px-4 py-2 rounded-xl bg-gradient-to-r from-yellow-300 via-yellow-400 to-yellow-200 hover:brightness-110 transition">
                                        View Bio
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                    <div
                                        class="text-[12px] px-3 py-1 rounded-lg bg-white/10 border border-yellow-100/20 text-yellow-100/90">
                                        {{ j.experience }} yrs exp
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Pagination -->
                <div class="mt-10 flex items-center justify-center gap-2">
                    <button
                        class="px-3 py-2 rounded-lg bg-white/10 border border-yellow-100/20 hover:bg-white/15 disabled:opacity-40"
                        :disabled="page === 1" @click="page--">
                        Prev
                    </button>
                    <span class="text-yellow-100/90 text-sm">Page {{ page }} / {{ totalPages }}</span>
                    <button
                        class="px-3 py-2 rounded-lg bg-white/10 border border-yellow-100/20 hover:bg-white/15 disabled:opacity-40"
                        :disabled="page === totalPages" @click="page++">
                        Next
                    </button>
                </div>
            </section>

            <!-- Modal: Bio -->
            <transition name="fade">
                <div v-if="activeJudge" class="fixed inset-0 z-50 flex  items-center justify-center">
                    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" @click="activeJudge = null"></div>
                    <div
                        class="relative z-10 grid grid-cols-1 lg:grid-cols-3 max-w-5xl w-[80%] bg-gradient-to-br from-[#0b163e] via-[#0b1228] to-[#193257] rounded-3xl border border-yellow-100/20 shadow-2xl overflow-hidden">
                        <div class="relative lg:col-span-1">
                            <img :src="activeJudge.image" :alt="activeJudge.name" class="w-full object-cover ">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent">
                            </div>
                        </div>
                        <div class="p-6 md:p-8 lg:col-span-2">
                            <h3
                                class="text-3xl font-extrabold bg-gradient-to-r from-yellow-200 via-white to-yellow-300 bg-clip-text text-transparent">
                                {{ activeJudge.name }}
                            </h3>
                            <p class="text-yellow-100/90 mt-1">{{ activeJudge.title }} — <span
                                    class="text-yellow-300">{{ activeJudge.role }}</span></p>

                            <div class="grid sm:grid-cols-3 gap-3 mt-6">
                                <div class="bg-white/5 border border-yellow-100/20 rounded-xl p-3 text-center">
                                    <p class="text-2xl font-extrabold text-yellow-200">{{ activeJudge.experience }}</p>
                                    <p class="text-[11px] text-yellow-100/80">Years Experience</p>
                                </div>
                                <div class="bg-white/5 border border-yellow-100/20 rounded-xl p-3 text-center">
                                    <p class="text-2xl font-extrabold text-yellow-200">{{ activeJudge.shows }}</p>
                                    <p class="text-[11px] text-yellow-100/80">Shows Judged</p>
                                </div>
                                <div class="bg-white/5 border border-yellow-100/20 rounded-xl p-3 text-center">
                                    <p class="text-2xl font-extrabold text-yellow-200">{{ activeJudge.followers }}k</p>
                                    <p class="text-[11px] text-yellow-100/80">Followers</p>
                                </div>
                            </div>

                            <p class="mt-6 text-yellow-50/90 leading-relaxed">{{ activeJudge.bio }}</p>

                            <div v-if="activeJudge.links?.length" class="mt-6 flex flex-wrap gap-3">
                                <a v-for="l in activeJudge.links" :key="l.href" :href="l.href" target="_blank"
                                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white/10 border border-yellow-100/20 hover:bg-white/15">
                                    <svg class="w-4 h-4 text-yellow-200" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 3h7v7M10 14L21 3M5 7v14h14" />
                                    </svg>
                                    {{ l.label }}
                                </a>
                            </div>
                                                        <button class="absolute top-4 right-4 p-2 rounded-full bg-white/15 hover:bg-white/25"
                                @click="activeJudge = null" aria-label="Close">
                                <svg class="w-5 h-5 text-yellow-200" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </transition>

        </main>
        <Footer />
    </BaseLayout>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity .2s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
