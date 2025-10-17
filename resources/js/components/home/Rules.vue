<script setup lang="ts">
import nebdLogo from '../../../assets/nebdLogo.png';
import nefsLogo from '../../../assets/nefsLogo.png';
import hiphopDancer from '../../../assets/hip-hop-dancer.png';
import fashionGirl from '../../../assets/fashion-girl.png';


import { ref, nextTick } from 'vue';
import { Link } from '@inertiajs/vue3';

type Tab = {
    id: string;
    label: string;
    panelId: string;
};

const tabs = ref<Tab[]>([
    { id: 'tab-dance', label: 'Northeast Best Dancer', panelId: 'panel-dance' },
    { id: 'tab-fashion', label: 'Mr & Miss Northeast Fashion Star', panelId: 'panel-fashion' }
]);

const activeId = ref<string>('tab-dance');

function handleClick(id: string) {
    activeId.value = id;
    nextTick(() => {
        const el = document.getElementById(id);
        el?.focus();
    });
}

function onKeydown(e: KeyboardEvent) {
    const idx = tabs.value.findIndex(t => t.id === activeId.value);
    if (idx < 0) return;

    let nextIdx = idx;
    if (e.key === 'ArrowRight') {
        e.preventDefault();
        nextIdx = (idx + 1) % tabs.value.length;
    } else if (e.key === 'ArrowLeft') {
        e.preventDefault();
        nextIdx = (idx - 1 + tabs.value.length) % tabs.value.length;
    } else if (e.key === 'Home') {
        e.preventDefault();
        nextIdx = 0;
    } else if (e.key === 'End') {
        e.preventDefault();
        nextIdx = tabs.value.length - 1;
    }

    if (nextIdx !== idx) {
        activeId.value = tabs.value[nextIdx].id;
        nextTick(() => {
            const el = document.getElementById(activeId.value);
            el?.focus();
        });
    }
}
</script>

<template>
    <section id="rules"
        class="relative overflow-hidden py-24 px-6 md:px-24 bg-gradient-to-br from-[#061137] via-[#070e23] to-[#213a60] text-white">
        <!-- Background glows -->
        <div
            class="absolute -top-40 -left-40 w-96 h-96 bg-gradient-to-r from-blue-800/50 via-blue-900/70 to-transparent rounded-full blur-[160px] opacity-60" />
        <div
            class="absolute bottom-0 right-0 w-96 h-96 bg-gradient-to-bl from-yellow-100 via-yellow-400/30 to-transparent rounded-full blur-[120px] opacity-40" />

        <!-- Header -->
        <div class="relative z-10 text-center mb-10">
            <h2
                class="text-4xl md:text-5xl font-extrabold bg-gradient-to-r from-yellow-200 via-white to-yellow-300 bg-clip-text text-transparent tracking-tight">
                Rules & Regulations
            </h2>
            <p class="mt-3 text-yellow-100/90">
                Two events will be held. Choose an event to view its specific guidelines.
            </p>
        </div>

        <!-- Tabs -->
        <div class="relative z-10 max-w-6xl mx-auto">
            <div id="event-tablist" role="tablist" aria-label="Event selector"
                class="flex flex-wrap gap-3 justify-center border-b border-yellow-100/20 pb-4" @keydown="onKeydown">
                <button v-for="t in tabs" :key="t.id" :id="t.id" role="tab" :aria-controls="t.panelId"
                    :aria-selected="t.id === activeId ? 'true' : 'false'" :tabindex="t.id === activeId ? 0 : -1"
                    :data-active="t.id === activeId" @click="handleClick(t.id)"
                    class="px-5 py-3 rounded-xl text-sm md:text-base font-semibold bg-white/10 text-yellow-100 border border-yellow-100/20 hover:bg-white/15 focus:outline-none focus:ring-2 focus:ring-yellow-300 data-[active=true]:bg-yellow-300 data-[active=true]:text-black">
                    {{ t.label }}
                </button>
            </div>

            <!-- Shared Info badges -->
            <div class="grid sm:grid-cols-3 gap-4 mt-8" v-show="activeId === 'tab-dance'">
                <div class="bg-white/5 border border-yellow-100/20 rounded-xl p-4 grid place-content-center ">
                    <img :src="nebdLogo" alt="North East Best Dancer Logo">
                </div>
                <div class="bg-white/5 border border-yellow-100/20 rounded-xl p-4">
                    <p class="text-xs uppercase text-yellow-300 font-bold">Event Name</p>
                    <p class="text-lg mt-1 text-yellow-50">North East Best Dancer</p>
                    <br>
                    <p class="text-xs uppercase text-yellow-300 font-bold">Event Type</p>
                    <p class="text-lg mt-1 text-yellow-50">Dance Championship</p>
                    <br>
                    <p class="text-xs uppercase text-yellow-300 font-bold">Description</p>
                    <p class="text-sm mt-1 text-yellow-50">Biggest dance competition of the year! Witness jaw-dropping
                        performances from talented dancers across North East India.</p>
                </div>
                <div class="bg-white/5 border border-yellow-100/20 rounded-xl p-2 grid place-content-center">
                    <img :src="hiphopDancer" alt="North East Best Dancer Logo" class="max-h-[250px] opacity-80">
                </div>
            </div>

            <!-- Shared Info badges -->
            <div class="grid sm:grid-cols-3 gap-4 mt-8" v-show="activeId === 'tab-fashion'">
                <div class="bg-white/5 border border-yellow-100/20 rounded-xl p-4 grid place-content-center">
                    <img :src="nefsLogo" alt="North East Fashion Star Logo">
                </div>
                <div class="bg-white/5 border border-yellow-100/20 rounded-xl p-4">
                    <p class="text-xs uppercase text-yellow-300 font-bold">Event Name</p>
                    <p class="text-lg mt-1 text-yellow-50">North East Fashion Star</p>
                    <br>
                    <p class="text-xs uppercase text-yellow-300 font-bold">Event Type</p>
                    <p class="text-lg mt-1 text-yellow-50">Beauty Padgent</p>
                    <br>
                    <p class="text-xs uppercase text-yellow-300 font-bold">Description</p>
                    <p class="text-sm mt-1 text-yellow-50">Biggest fashion show of the year! Witness jaw-dropping
                        performances from talented dancers across North East India.</p>
                </div>
                <div class="bg-white/5 border border-yellow-100/20 rounded-xl p-2 grid place-content-center">
                    <img :src="fashionGirl" alt="North East Best Dancer Logo" class="max-h-[250px] opacity-80">
                </div>
            </div>

            <!-- Shared Info badges -->
            <div class="grid sm:grid-cols-3 gap-4 mt-8">
                <div class="bg-white/5 border border-yellow-100/20 rounded-xl p-4">
                    <p class="text-xs uppercase text-yellow-300 font-bold">Event Dates</p>
                    <p class="text-lg mt-1 text-yellow-50">27–28 December 2025</p>
                </div>
                <div class="bg-white/5 border border-yellow-100/20 rounded-xl p-4">
                    <p class="text-xs uppercase text-yellow-300 font-bold">Reporting</p>
                    <p class="text-lg mt-1 text-yellow-50">8:00 AM daily</p>
                </div>
                <div class="bg-white/5 border border-yellow-100/20 rounded-xl p-4">
                    <p class="text-xs uppercase text-yellow-300 font-bold">Venue</p>
                    <p class="text-lg mt-1 text-yellow-50">Sarupathar, Golaghat</p>
                </div>
            </div>

            <!-- Panels -->
            <div class="mt-10">
                <!-- DANCE PANEL -->
                <div id="panel-dance" role="tabpanel" aria-labelledby="tab-dance" tabindex="0"
                    v-show="activeId === 'tab-dance'">
                    <div class="grid lg:grid-cols-[280px,1fr] gap-10">
                        <!-- TOC -->
                        <aside class="hidden lg:block">
                            <div
                                class="sticky top-24 bg-white/5 backdrop-blur-xl border border-yellow-100/20 rounded-2xl p-4">
                                <p class="text-sm font-semibold text-yellow-200 mb-3">Quick Jump</p>
                                <nav class="space-y-2 text-yellow-50/90">
                                    <a href="#d-eligibility" class="block hover:text-yellow-300 transition">Eligibility
                                        & Age</a>
                                    <a href="#d-categories" class="block hover:text-yellow-300 transition">Categories &
                                        Time</a>
                                    <a href="#d-fees" class="block hover:text-yellow-300 transition">Fees & Refunds</a>
                                    <a href="#d-music" class="block hover:text-yellow-300 transition">Music & Props</a>
                                    <a href="#d-conduct" class="block hover:text-yellow-300 transition">Code of
                                        Conduct</a>
                                    <a href="#d-scoring" class="block hover:text-yellow-300 transition">Judging &
                                        Scoring</a>
                                    <a href="#d-safety" class="block hover:text-yellow-300 transition">Safety</a>
                                    <a href="#d-rights" class="block hover:text-yellow-300 transition">Rights &
                                        Media</a>
                                    <a href="#d-contact" class="block hover:text-yellow-300 transition">Contact</a>
                                </nav>
                            </div>
                        </aside>

                        <!-- Content -->
                        <div class="space-y-8">
                            <details id="d-eligibility"
                                class="group bg-white/6 backdrop-blur-xl border border-yellow-100/20 rounded-2xl">
                                <summary class="cursor-pointer list-none px-6 py-5 flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <span class="w-2 h-2 rounded-full bg-yellow-300"></span>
                                        <h3 class="text-xl font-bold text-yellow-100">Eligibility & Age (Dance)</h3>
                                    </div>
                                    <span class="text-yellow-300 group-open:rotate-180 transition">&#9662;</span>
                                </summary>
                                <div class="px-6 pb-6 text-yellow-50/90">
                                    <ul class="list-disc ml-6 space-y-2">
                                        <li>Sub Junior: 3–7 years</li>
                                        <li>Junior: 8–12 years</li>
                                        <li>Senior: 13 years & above</li>
                                        <li>Duet / Group: No age limit</li>
                                    </ul>
                                </div>
                            </details>

                            <details id="d-categories"
                                class="group bg-white/6 backdrop-blur-xl border border-yellow-100/20 rounded-2xl">
                                <summary class="cursor-pointer list-none px-6 py-5 flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <span class="w-2 h-2 rounded-full bg-yellow-300"></span>
                                        <h3 class="text-xl font-bold text-yellow-100">Categories, Durations & Stage
                                            (Dance)</h3>
                                    </div>
                                    <span class="text-yellow-300 group-open:rotate-180 transition">&#9662;</span>
                                </summary>
                                <div class="px-6 pb-6 text-yellow-50/90">
                                    <ul class="list-disc ml-6 space-y-2">
                                        <li>Solo: Sub Junior 2:00, Junior 2:00, Senior 3:00</li>
                                        <li>Duet: 3:00 · Group: 4:00</li>
                                        <li>Extra time subject to approval and surcharge</li>
                                        <li>Stage: non‑slippery; damaging materials not permitted</li>
                                    </ul>
                                </div>
                            </details>

                            <details id="d-fees"
                                class="group bg-white/6 backdrop-blur-xl border border-yellow-100/20 rounded-2xl">
                                <summary class="cursor-pointer list-none px-6 py-5 flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <span class="w-2 h-2 rounded-full bg-yellow-300"></span>
                                        <h3 class="text-xl font-bold text-yellow-100">Entry Fees & Refunds (Dance)</h3>
                                    </div>
                                    <span class="text-yellow-300 group-open:rotate-180 transition">&#9662;</span>
                                </summary>
                                <div class="px-6 pb-6 text-yellow-50/90">
                                    <ul class="list-disc ml-6 space-y-2">
                                        <li>Sub Junior: ₹800 · Junior: ₹1000 · Senior: ₹1000 · Duet: ₹1500 · Group:
                                            ₹2000</li>
                                        <li>Fees must be paid in full; non‑refundable except organizer
                                            changes/cancellation</li>
                                    </ul>
                                </div>
                            </details>

                            <details id="d-music"
                                class="group bg-white/6 backdrop-blur-xl border border-yellow-100/20 rounded-2xl">
                                <summary class="cursor-pointer list-none px-6 py-5 flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <span class="w-2 h-2 rounded-full bg-yellow-300"></span>
                                        <h3 class="text-xl font-bold text-yellow-100">Music, Props & Stage Usage (Dance)
                                        </h3>
                                    </div>
                                    <span class="text-yellow-300 group-open:rotate-180 transition">&#9662;</span>
                                </summary>
                                <div class="px-6 pb-6 text-yellow-50/90">
                                    <ul class="list-disc ml-6 space-y-2">
                                        <li>Submit music at registration; carry USB/phone backup</li>
                                        <li>No liquids, glitter, powder, fire, sharp objects</li>
                                        <li>Props hand‑carried; setup/strike ≤ 60s unless pre‑approved</li>
                                    </ul>
                                </div>
                            </details>

                            <details id="d-conduct"
                                class="group bg-white/6 backdrop-blur-xl border border-yellow-100/20 rounded-2xl">
                                <summary class="cursor-pointer list-none px-6 py-5 flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <span class="w-2 h-2 rounded-full bg-yellow-300"></span>
                                        <h3 class="text-xl font-bold text-yellow-100">Code of Conduct (Dance)</h3>
                                    </div>
                                    <span class="text-yellow-300 group-open:rotate-180 transition">&#9662;</span>
                                </summary>
                                <div class="px-6 pb-6 text-yellow-50/90">
                                    <ul class="list-disc ml-6 space-y-2">
                                        <li>Respect to staff, judges, and participants</li>
                                        <li>Age‑appropriate costumes/choreography; no offensive content</li>
                                        <li>Backstage access restricted to authorized personnel</li>
                                    </ul>
                                </div>
                            </details>

                            <details id="d-scoring"
                                class="group bg-white/6 backdrop-blur-xl border border-yellow-100/20 rounded-2xl">
                                <summary class="cursor-pointer list-none px-6 py-5 flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <span class="w-2 h-2 rounded-full bg-yellow-300"></span>
                                        <h3 class="text-xl font-bold text-yellow-100">Judging & Scoring (Dance)</h3>
                                    </div>
                                    <span class="text-yellow-300 group-open:rotate-180 transition">&#9662;</span>
                                </summary>
                                <div class="px-6 pb-6 text-yellow-50/90">
                                    <ul class="list-disc ml-6 space-y-2">
                                        <li>Technique, choreography, musicality, presence, impact</li>
                                        <li>Judges’ decisions final; ties resolved by head judge</li>
                                    </ul>
                                </div>
                            </details>

                            <details id="d-safety"
                                class="group bg-white/6 backdrop-blur-xl border border-yellow-100/20 rounded-2xl">
                                <summary class="cursor-pointer list-none px-6 py-5 flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <span class="w-2 h-2 rounded-full bg-yellow-300"></span>
                                        <h3 class="text-xl font-bold text-yellow-100">Safety (Dance)</h3>
                                    </div>
                                    <span class="text-yellow-300 group-open:rotate-180 transition">&#9662;</span>
                                </summary>
                                <div class="px-6 pb-6 text-yellow-50/90">
                                    <ul class="list-disc ml-6 space-y-2">
                                        <li>Warm‑up recommended; unsafe acrobatics may be restricted</li>
                                        <li>Approved shoes only; avoid tripping hazards</li>
                                    </ul>
                                </div>
                            </details>

                            <details id="d-rights"
                                class="group bg-white/6 backdrop-blur-xl border border-yellow-100/20 rounded-2xl">
                                <summary class="cursor-pointer list-none px-6 py-5 flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <span class="w-2 h-2 rounded-full bg-yellow-300"></span>
                                        <h3 class="text-xl font-bold text-yellow-100">Organizer Rights & Media (Dance)
                                        </h3>
                                    </div>
                                    <span class="text-yellow-300 group-open:rotate-180 transition">&#9662;</span>
                                </summary>
                                <div class="px-6 pb-6 text-yellow-50/90">
                                    <ul class="list-disc ml-6 space-y-2">
                                        <li>Organizer may alter schedule/categories/judging if required</li>
                                        <li>Participation permits event photography/videography usage</li>
                                    </ul>
                                </div>
                            </details>

                            <details id="d-contact"
                                class="group bg-white/6 backdrop-blur-xl border border-yellow-100/20 rounded-2xl">
                                <summary class="cursor-pointer list-none px-6 py-5 flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <span class="w-2 h-2 rounded-full bg-yellow-300"></span>
                                        <h3 class="text-xl font-bold text-yellow-100">Contact (Dance)</h3>
                                    </div>
                                    <span class="text-yellow-300 group-open:rotate-180 transition">&#9662;</span>
                                </summary>
                                <div class="px-6 pb-6 text-yellow-50/90">
                                    <ul class="list-disc ml-6 space-y-2">
                                        <li>Organizer: Akshay Paul (Step Up Dance Academy)</li>
                                        <li>Call / WhatsApp: 7086208757</li>
                                    </ul>
                                </div>
                            </details>
                        </div>
                    </div>
                </div>

                <!-- FASHION PANEL -->
                <div id="panel-fashion" role="tabpanel" aria-labelledby="tab-fashion" tabindex="0"
                    v-show="activeId === 'tab-fashion'">
                    <div class="grid lg:grid-cols-[280px,1fr] gap-10">
                        <!-- TOC -->
                        <aside class="hidden lg:block">
                            <div
                                class="sticky top-24 bg-white/5 backdrop-blur-xl border border-yellow-100/20 rounded-2xl p-4">
                                <p class="text-sm font-semibold text-yellow-200 mb-3">Quick Jump</p>
                                <nav class="space-y-2 text-yellow-50/90">
                                    <a href="#f-eligibility"
                                        class="block hover:text-yellow-300 transition">Eligibility</a>
                                    <a href="#f-rounds" class="block hover:text-yellow-300 transition">Rounds & Time</a>
                                    <a href="#f-dress" class="block hover:text-yellow-300 transition">Dress &
                                        Grooming</a>
                                    <a href="#f-stage" class="block hover:text-yellow-300 transition">Stage & Props</a>
                                    <a href="#f-fees" class="block hover:text-yellow-300 transition">Fees & Refunds</a>
                                    <a href="#f-judging" class="block hover:text-yellow-300 transition">Judging
                                        Criteria</a>
                                    <a href="#f-rights" class="block hover:text-yellow-300 transition">Rights &
                                        Media</a>
                                    <a href="#f-contact" class="block hover:text-yellow-300 transition">Contact</a>
                                </nav>
                            </div>
                        </aside>

                        <!-- Content -->
                        <div class="space-y-8">
                            <details id="f-eligibility"
                                class="group bg-white/6 backdrop-blur-xl border border-yellow-100/20 rounded-2xl">
                                <summary class="cursor-pointer list-none px-6 py-5 flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <span class="w-2 h-2 rounded-full bg-yellow-300"></span>
                                        <h3 class="text-xl font-bold text-yellow-100">Eligibility (Fashion)</h3>
                                    </div>
                                    <span class="text-yellow-300 group-open:rotate-180 transition">&#9662;</span>
                                </summary>
                                <div class="px-6 pb-6 text-yellow-50/90">
                                    <ul class="list-disc ml-6 space-y-2">
                                        <li>Open categories: Mr & Miss (16+ recommended; ID may be requested)</li>
                                        <li>Participants must be available for rehearsals and fittings as scheduled</li>
                                    </ul>
                                </div>
                            </details>

                            <details id="f-rounds"
                                class="group bg-white/6 backdrop-blur-xl border border-yellow-100/20 rounded-2xl">
                                <summary class="cursor-pointer list-none px-6 py-5 flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <span class="w-2 h-2 rounded-full bg-yellow-300"></span>
                                        <h3 class="text-xl font-bold text-yellow-100">Rounds & Time (Fashion)</h3>
                                    </div>
                                    <span class="text-yellow-300 group-open:rotate-180 transition">&#9662;</span>
                                </summary>
                                <div class="px-6 pb-6 text-yellow-50/90">
                                    <ul class="list-disc ml-6 space-y-2">
                                        <li>Round 1: Introduction Walk (60–90s)</li>
                                        <li>Round 2: Theme/Traditional Wear (90s)</li>
                                        <li>Round 3: Evening/Designer Wear with Q&A (up to 2:00)</li>
                                        <li>Backstage changes must be swift; late calls may be disqualified</li>
                                    </ul>
                                </div>
                            </details>

                            <details id="f-dress"
                                class="group bg-white/6 backdrop-blur-xl border border-yellow-100/20 rounded-2xl">
                                <summary class="cursor-pointer list-none px-6 py-5 flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <span class="w-2 h-2 rounded-full bg-yellow-300"></span>
                                        <h3 class="text-xl font-bold text-yellow-100">Dress Code & Grooming</h3>
                                    </div>
                                    <span class="text-yellow-300 group-open:rotate-180 transition">&#9662;</span>
                                </summary>
                                <div class="px-6 pb-6 text-yellow-50/90">
                                    <ul class="list-disc ml-6 space-y-2">
                                        <li>Outfits must be tasteful and stage‑appropriate; avoid offensive prints</li>
                                        <li>Heels must have guards; no items that damage the stage floor</li>
                                        <li>Carry safety pins, tape, and backups for quick fixes</li>
                                    </ul>
                                </div>
                            </details>

                            <details id="f-stage"
                                class="group bg-white/6 backdrop-blur-xl border border-yellow-100/20 rounded-2xl">
                                <summary class="cursor-pointer list-none px-6 py-5 flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <span class="w-2 h-2 rounded-full bg-yellow-300"></span>
                                        <h3 class="text-xl font-bold text-yellow-100">Stage & Props (Fashion)</h3>
                                    </div>
                                    <span class="text-yellow-300 group-open:rotate-180 transition">&#9662;</span>
                                </summary>
                                <div class="px-6 pb-6 text-yellow-50/90">
                                    <ul class="list-disc ml-6 space-y-2">
                                        <li>Simple handheld props allowed with prior approval</li>
                                        <li>No confetti, glitter, liquids, fire, or powder effects</li>
                                    </ul>
                                </div>
                            </details>

                            <details id="f-fees"
                                class="group bg-white/6 backdrop-blur-xl border border-yellow-100/20 rounded-2xl">
                                <summary class="cursor-pointer list-none px-6 py-5 flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <span class="w-2 h-2 rounded-full bg-yellow-300"></span>
                                        <h3 class="text-xl font-bold text-yellow-100">Entry Fees & Refunds (Fashion)
                                        </h3>
                                    </div>
                                    <span class="text-yellow-300 group-open:rotate-180 transition">&#9662;</span>
                                </summary>
                                <div class="px-6 pb-6 text-yellow-50/90">
                                    <ul class="list-disc ml-6 space-y-2">
                                        <li>Individual entry (Mr or Miss): ₹1000</li>
                                        <li>Fees are non‑refundable except organizer changes/cancellation</li>
                                    </ul>
                                </div>
                            </details>

                            <details id="f-judging"
                                class="group bg-white/6 backdrop-blur-xl border border-yellow-100/20 rounded-2xl">
                                <summary class="cursor-pointer list-none px-6 py-5 flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <span class="w-2 h-2 rounded-full bg-yellow-300"></span>
                                        <h3 class="text-xl font-bold text-yellow-100">Judging Criteria</h3>
                                    </div>
                                    <span class="text-yellow-300 group-open:rotate-180 transition">&#9662;</span>
                                </summary>
                                <div class="px-6 pb-6 text-yellow-50/90">
                                    <ul class="list-disc ml-6 space-y-2">
                                        <li>Walk & Posture, Styling & Fit, Theme Presentation</li>
                                        <li>Confidence, Audience Engagement, Q&A</li>
                                    </ul>
                                </div>
                            </details>

                            <details id="f-rights"
                                class="group bg-white/6 backdrop-blur-xl border border-yellow-100/20 rounded-2xl">
                                <summary class="cursor-pointer list-none px-6 py-5 flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <span class="w-2 h-2 rounded-full bg-yellow-300"></span>
                                        <h3 class="text-xl font-bold text-yellow-100">Organizer Rights & Media (Fashion)
                                        </h3>
                                    </div>
                                    <span class="text-yellow-300 group-open:rotate-180 transition">&#9662;</span>
                                </summary>
                                <div class="px-6 pb-6 text-yellow-50/90">
                                    <ul class="list-disc ml-6 space-y-2">
                                        <li>Organizer may alter schedule/rounds/judging panel if required</li>
                                        <li>Participation permits event photography/videography usage</li>
                                    </ul>
                                </div>
                            </details>

                            <details id="f-contact"
                                class="group bg-white/6 backdrop-blur-xl border border-yellow-100/20 rounded-2xl">
                                <summary class="cursor-pointer list-none px-6 py-5 flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <span class="w-2 h-2 rounded-full bg-yellow-300"></span>
                                        <h3 class="text-xl font-bold text-yellow-100">Contact (Fashion)</h3>
                                    </div>
                                    <span class="text-yellow-300 group-open:rotate-180 transition">&#9662;</span>
                                </summary>
                                <div class="px-6 pb-6 text-yellow-50/90">
                                    <ul class="list-disc ml-6 space-y-2">
                                        <li>Organizer: Akshay Paul (Step Up Dance Academy)</li>
                                        <li>Call / WhatsApp: 7086208757</li>
                                    </ul>
                                </div>
                            </details>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA -->
            <div class="mt-10 text-center">
                <Link href="/online-registration/create" target="_blank"
                    class="inline-flex items-center gap-3 px-8 py-3 bg-gradient-to-r from-yellow-300 via-yellow-400 to-yellow-200 text-black font-extrabold rounded-full shadow-lg hover:scale-105 transition">
                    Agree & Register
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </Link>
            </div>
        </div>
    </section>
</template>

<style scoped>
/* Optional: smooth details open/close */
details[open] summary~* {
    animation: details-open 0.25s ease-in-out;
}

@keyframes details-open {
    from {
        opacity: 0;
        transform: translateY(-4px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
