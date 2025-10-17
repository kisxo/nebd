<script setup lang="ts">
import Footer from "@/components/Footer.vue";
import BaseLayout from "@/layouts/BaseLayout.vue";
import { useForm } from "@inertiajs/vue3";
import { reactive, ref } from "vue";

defineProps({
    status: String,
    message: String,
    id: {
        type: [String, Number],
        default: null,
    },
});

const form = useForm({
    fullName: "",
    fatherName: "",
    age: "",
    dob: "",
    address: "",
    phone: "",
    email: "",
    school: "",
    academy: "",
    teacher: "",
    event: "",
    category: "",
    payment_screenshot: null,
});

const categories = {
    Dance: [
        {
            name: "Sub Junior",
            fees: 300,
            ageRange: "Below 12 years",
            description: "Solo performance for participants under 12 years."
        },
        {
            name: "Junior",
            fees: 400,
            ageRange: "13–17 years",
            description: "Solo dance category for teenage participants."
        },
        {
            name: "Senior",
            fees: 500,
            ageRange: "18 years & above",
            description: "Open solo category for adult dancers."
        },
        {
            name: "Duet",
            fees: 700,
            ageRange: "All ages",
            description: "Two-person dance performance showcasing coordination."
        },
        {
            name: "Group",
            fees: 1000,
            ageRange: "All ages",
            description: "Group dance category (minimum 3 members)."
        }
    ],

    Fashion: [
        {
            name: "Mr",
            fees: 500,
            ageRange: "18 years & above",
            description: "Fashion walk and personality round for male participants."
        },
        {
            name: "Miss",
            fees: 500,
            ageRange: "18 years & above",
            description: "Fashion walk and talent round for female participants."
        },
        {
            name: "Mrs",
            fees: 600,
            ageRange: "Married participants",
            description: "Special category for married contestants."
        }
    ]
};


// initial value of form submit
const success = ref(false);
const submitting = ref(false);
// ID of the submitted form, used to download PDF
const submittedId = ref<number | null>(null);
const errorModel = ref({});

// Submit the form using Inertia js Form helper
const submitForm = () => {

    const maxSize = 1024 * 1024; // 1MB
    const files = [
        // { name: 'Passport Photo', file: form.passport_photo },
        // { name: 'Marksheet', file: form.marksheet },
        // { name: 'TC Certificate', file: form.tc_certificate },
        { name: 'Payment Screenshot', file: form.payment_screenshot }
    ];

    for (const { name, file } of files) {
        if (file?.size > maxSize) {
            alert(`${name} is too big (> 1MB)`);
            return;
        }
    }

    submitting.value = true;
    form.post('/online-registration', {
        forceFormData: true,
        // onError: () => {
        //     errorModel.value = form.errors ? { ...form.errors } : {};
        //     submitting.value = false;
        // },
        // onSuccess: (data) => {
        //     success.value = true;
        //     form.reset();
        //     submitting.value = false;
        //     // Set the submitted ID from the flash data
        //     submittedId.value = (data.props.flash && (data.props.flash as any).data.id) ?? null;
        // },
        // onFinish: () => {
        //     submitting.value = false;
        // },
    })
}

</script>


<template>
    <BaseLayout>
        <div
            class="min-h-screen bg-gradient-to-br from-purple-800 via-pink-700 to-red-600 flex items-center justify-center p-6 py-20">
            <div
                class="max-w-5xl w-full bg-white/10 backdrop-blur-2xl rounded-3xl shadow-2xl border border-white/20 overflow-hidden flex flex-col md:flex-row">

                <!-- Left Info Panel -->
                <div
                    class="md:w-1/2 bg-gradient-to-br from-purple-900/60 to-pink-700/60 p-10 text-white flex flex-col justify-center relative">
                    <div class="absolute inset-0 bg-[url('/assets/pattern.svg')] opacity-10 bg-cover bg-center"></div>

                    <h2 class="relative text-4xl font-extrabold mb-4 leading-tight tracking-wide drop-shadow-lg">
                        Register for <br />
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-300 to-yellow-400">
                            The Ultimate Championship
                        </span>
                    </h2>
                    <p class="relative text-sm opacity-90">
                        Join Northeast's biggest <b>Dance</b> & <b>Fashion Championship</b> of 2025. Showcase your
                        talent,
                        shine
                        on stage, and win exciting prizes! 🌟
                    </p>

                    <ul class="mt-6 space-y-2 text-sm opacity-90">
                        <li class="flex items-center gap-2"><span class="text-yellow-300">🎭</span> Open for all age
                            groups
                        </li>
                        <li class="flex items-center gap-2"><span class="text-yellow-300">💃</span> Dance & Fashion
                            categories</li>
                        <li class="flex items-center gap-2"><span class="text-yellow-300">🏆</span> Certificates &
                            trophies
                            for winners</li>
                    </ul>
                </div>

                <!-- Right Form Panel -->
                <div class="md:w-1/2 bg-white/90 backdrop-blur-xl p-8 md:p-10 relative">
                    <h2
                        class="text-3xl font-bold text-center mb-8 bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-pink-500">
                        Registration Form
                    </h2>

                    <form @submit.prevent="submitForm" class="space-y-5">

                        <!-- Event -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-600 mb-1">Type <span
                                    class="text-red-500">*</span></label>
                            <select v-model="form.event"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-pink-400 focus:outline-none bg-white">
                                <option value="">-- Select Event --</option>
                                <option value="Dance">Dance</option>
                                <option value="Fashion">Fashion</option>
                            </select>
                            <p v-if="form.errors.event" class="text-red-500 text-sm mt-1">{{ form.errors.event }}</p>
                        </div>

                        <!-- Category -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-600 mb-1">
                                Category <span class="text-red-500">*</span>
                            </label>

                            <select v-model="form.category"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-purple-400 focus:outline-none bg-white">
                                <option value="">-- Select Category --</option>
                                <option v-if="form.event === 'Dance'" v-for="item in categories.Dance" :key="item.name"
                                    :value="item.name">
                                    {{ item.name }} — ₹{{ item.fees }}
                                </option>
                                <option v-if="form.event === 'Fashion'" v-for="item in categories.Fashion"
                                    :key="item.name" :value="item.name">
                                    {{ item.name }} — ₹{{ item.fees }}
                                </option>
                            </select>

                            <p v-if="form.errors.category" class="text-red-500 text-sm mt-1">
                                {{ form.errors.category }}
                            </p>

                        </div>


                        <!-- Grid Layout for Basic Details -->
                        <div class="grid md:grid-cols-2 gap-5">
                            <div v-for="field in [
                                { id: 'fullName', label: 'Full Name', type: 'text' },
                                { id: 'fatherName', label: 'Father\'s Name', type: 'text' },
                                { id: 'age', label: 'Age', type: 'number' },
                                { id: 'dob', label: 'Date of Birth', type: 'date' },
                                { id: 'phone', label: 'Phone', type: 'tel' },
                                { id: 'email', label: 'Email', type: 'email' },
                            ]" :key="field.id" class="relative">
                                <label :for="field.id" class="block text-sm font-semibold text-gray-600 mb-1">{{
                                    field.label
                                    }} <span class="text-red-500">*</span></label>
                                <input v-model="form[field.id]" :type="field.type" :id="field.id"
                                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-purple-400 focus:outline-none bg-white" />
                                <p v-if="form.errors[field.id]" class="text-red-500 text-sm mt-1">{{
                                    form.errors[field.id]
                                    }}</p>
                            </div>
                        </div>

                        <!-- Address -->
                        <div>
                            <label for="address" class="block text-sm font-semibold text-gray-600 mb-1">Address <span
                                    class="text-red-500">*</span></label>
                            <input v-model="form.address" type="text" id="address"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-pink-400 focus:outline-none bg-white" />
                            <p v-if="form.errors.address" class="text-red-500 text-sm mt-1">{{ form.errors.address }}
                            </p>
                        </div>

                        <!-- School / Academy / Teacher -->
                        <div class="grid md:grid-cols-1 gap-5">
                            <div>
                                <label class="block text-sm font-semibold text-gray-600 mb-1">School <span
                                    class="text-red-500">*</span></label>
                                <input v-model="form.school" type="text"
                                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-pink-400 focus:outline-none bg-white" />
                                <p v-if="form.errors.school" class="text-red-500 text-sm mt-1">
                                {{ form.errors.school }}
                            </p>
                                </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-600 mb-1">Academy</label>
                                <input v-model="form.academy" type="text"
                                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-pink-400 focus:outline-none bg-white" />
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-600 mb-1">Teacher</label>
                                <input v-model="form.teacher" type="text"
                                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-pink-400 focus:outline-none bg-white" />
                            </div>
                        </div>

                        <!-- Payment Screenshot -->
                        <div>

                            <label class="block text-sm font-semibold text-gray-600 mb-1">Upload Payment
                                Screenshot <span class="text-red-500">*</span></label>
                            <!-- Fee Display -->
                            <p v-if="form.category && form.event" class="text-purple-600 font-medium mt-2">
                                Entry Fee:
                                ₹{{
                                    categories[form.event].find((c) => c.name === form.category)?.fees || 0
                                }}
                            </p>
                            <div class="flex items-center justify-center w-full">
                                <label
                                    class="flex flex-col w-full h-28 border-2 border-dashed border-purple-300 rounded-xl cursor-pointer hover:bg-purple-50 transition-all duration-300">
                                    <div class="flex flex-col items-center justify-center pt-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-purple-400 mb-2"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5.002 5.002 0 0117 9a5.002 5.002 0 01.9 9.9H7z" />
                                        </svg>
                                        <p class="text-sm text-gray-600">Click to upload or drag & drop</p>
                                    </div>
                                    <input type="file" @change="form.payment_screenshot = $event.target.files[0]"
                                        class="hidden" />
                                </label>
                            </div>
                            <p v-if="form.errors.payment_screenshot" class="text-red-500 text-sm mt-1">{{
                                form.errors.payment_screenshot }}</p>
                        </div>

                        <!-- Submit -->
                        <div class="pt-4">
                            <button type="submit"
                                class="w-full py-3 rounded-xl bg-gradient-to-r from-purple-600 via-pink-500 to-orange-400 text-white font-bold shadow-lg hover:shadow-2xl hover:scale-[1.02] transition-all duration-300">
                                🚀 Register Now
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <Footer />
    </BaseLayout>
</template>
