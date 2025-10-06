<script setup lang="ts">
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

const danceCategory = ["Sub Junior", "Junior", "Senior","Duet", "Group"];
const fashionCategory = ["Mr", "Miss", "Mrs"];

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
            class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-700 via-pink-600 to-red-500 p-6">
            <div
                class="w-full max-w-2xl bg-white/90 backdrop-blur-xl shadow-2xl rounded-3xl p-8 border border-white/30">
                <h2
                    class="text-3xl font-extrabold text-center mb-6 bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-pink-500">
                    Registration Form
                </h2>

                <!-- Event -->
                <div class="relative pb-6">
                    <label for="event"
                        class=" text-gray-500 ps-2 text-sm transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-base peer-focus:top-1 peer-focus:text-sm peer-focus:text-purple-600">
                        Type
                    </label>
                    <select v-model="form.event"
                        class="peer w-full border-b-2 border-gray-300 bg-transparent px-2 pt-2 pb-1 text-lg focus:border-purple-500 focus:outline-none">
                        <option value="">-- Select Event --</option>
                        <option value="Dance">Dance</option>
                        <option value="Fashion">Fashion</option>
                    </select>

                    <p v-if="form.errors.event" class="text-red-500 text-sm mt-1">{{ form.errors.event }}</p>
                </div>

                <!-- Category -->
                <div class="relative pb-6">
                                        <label for="category"
                        class=" text-gray-500 ps-2 text-sm transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-base peer-focus:top-1 peer-focus:text-sm peer-focus:text-purple-600">
                        Category
                    </label>
                    <select v-model="form.category"
                        class="peer w-full border-b-2 border-gray-300 bg-transparent px-2 pt-2 pb-1 text-lg focus:border-purple-500 focus:outline-none">
                        <option value="">-- Select Category --</option>
                        <option v-if="form.event == 'Dance'" v-for="item in danceCategory" :value="item">{{ item }}</option>
                        <option v-if="form.event == 'Fashion'" v-for="item in fashionCategory" :value="item">{{ item }}</option>
                    </select>

                    <p v-if="form.errors.category" class="text-red-500 text-sm mt-1">{{ form.errors.category }}</p>
                </div>

                <form @submit.prevent="submitForm" class="space-y-6">

                    <!-- Full Name -->
                    <div class="relative">
                        <input v-model="form.fullName" type="text" id="fullName" placeholder=" "
                            class="peer w-full border-b-2 border-gray-300 bg-transparent px-2 pt-4 pb-1 text-lg focus:border-purple-500 focus:outline-none" />
                        <label for="fullName"
                            class="absolute left-2 top-1 text-gray-500 text-sm transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-base peer-focus:top-1 peer-focus:text-sm peer-focus:text-purple-600">
                            Full Name
                        </label>
                        <p v-if="form.errors.fullName" class="text-red-500 text-sm mt-1">{{ form.errors.fullName }}</p>
                    </div>

                    <!-- Father's Name -->
                    <div class="relative">
                        <input v-model="form.fatherName" type="text" id="fatherName" placeholder=" "
                            class="peer w-full border-b-2 border-gray-300 bg-transparent px-2 pt-4 pb-1 text-lg focus:border-purple-500 focus:outline-none" />
                        <label for="fatherName"
                            class="absolute left-2 top-1 text-gray-500 text-sm transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-base peer-focus:top-1 peer-focus:text-sm peer-focus:text-purple-600">
                            Father's Name
                        </label>
                        <p v-if="form.errors.fatherName" class="text-red-500 text-sm mt-1">{{ form.errors.fatherName }}
                        </p>
                    </div>

                    <!-- Age -->
                    <div class="relative">
                        <input v-model="form.age" type="number" id="age" placeholder=" "
                            class="peer w-full border-b-2 border-gray-300 bg-transparent px-2 pt-4 pb-1 text-lg focus:border-purple-500 focus:outline-none" />
                        <label for="age"
                            class="absolute left-2 top-1 text-gray-500 text-sm transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-base peer-focus:top-1 peer-focus:text-sm peer-focus:text-purple-600">
                            Age
                        </label>
                        <p v-if="form.errors.age" class="text-red-500 text-sm mt-1">{{ form.errors.age }}</p>
                    </div>

                    <!-- Date of Birth -->
                    <div class="relative pt-2">
                                                <label for="dob"
                            class="ps-2  text-gray-500 text-sm transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-base peer-focus:top-1 peer-focus:text-sm peer-focus:text-purple-600">
                            Date of Birth
                        </label>
                        <input v-model="form.dob" type="date" id="dob" placeholder=" "
                            class="peer w-full border-b-2 border-gray-300 bg-transparent px-2 pt-2 pb-1 text-lg focus:border-purple-500 focus:outline-none" />

                        <p v-if="form.errors.dob" class="text-red-500 text-sm mt-1">{{ form.errors.dob }}</p>
                    </div>

                    <!-- Address -->
                    <div class="relative">
                        <input v-model="form.address" type="text" id="address" placeholder=" "
                            class="peer w-full border-b-2 border-gray-300 bg-transparent px-2 pt-4 pb-1 text-lg focus:border-purple-500 focus:outline-none" />
                        <label for="address"
                            class="absolute left-2 top-1 text-gray-500 text-sm transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-base peer-focus:top-1 peer-focus:text-sm peer-focus:text-purple-600">
                            Address
                        </label>
                        <p v-if="form.errors.address" class="text-red-500 text-sm mt-1">{{ form.errors.address }}</p>
                    </div>

                    <!-- Phone -->
                    <div class="relative">
                        <input v-model="form.phone" type="tel" id="phone" placeholder=" "
                            class="peer w-full border-b-2 border-gray-300 bg-transparent px-2 pt-4 pb-1 text-lg focus:border-purple-500 focus:outline-none" />
                        <label for="phone"
                            class="absolute left-2 top-1 text-gray-500 text-sm transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-base peer-focus:top-1 peer-focus:text-sm peer-focus:text-purple-600">
                            Phone
                        </label>
                        <p v-if="form.errors.phone" class="text-red-500 text-sm mt-1">{{ form.errors.phone }}</p>
                    </div>

                    <!-- Email -->
                    <div class="relative">
                        <input v-model="form.email" type="email" id="email" placeholder=" "
                            class="peer w-full border-b-2 border-gray-300 bg-transparent px-2 pt-4 pb-1 text-lg focus:border-purple-500 focus:outline-none" />
                        <label for="email"
                            class="absolute left-2 top-1 text-gray-500 text-sm transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-base peer-focus:top-1 peer-focus:text-sm peer-focus:text-purple-600">
                            Email
                        </label>
                        <p v-if="form.errors.email" class="text-red-500 text-sm mt-1">{{ form.errors.email }}</p>
                    </div>

                    <!-- School -->
                    <div class="relative">
                        <input v-model="form.school" type="text" id="school" placeholder=" "
                            class="peer w-full border-b-2 border-gray-300 bg-transparent px-2 pt-4 pb-1 text-lg focus:border-purple-500 focus:outline-none" />
                        <label for="school"
                            class="absolute left-2 top-1 text-gray-500 text-sm transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-base peer-focus:top-1 peer-focus:text-sm peer-focus:text-purple-600">
                            School
                        </label>
                        <p v-if="form.errors.school" class="text-red-500 text-sm mt-1">{{ form.errors.school }}</p>
                    </div>

                    <!-- Academy -->
                    <div class="relative">
                        <input v-model="form.academy" type="text" id="academy" placeholder=" "
                            class="peer w-full border-b-2 border-gray-300 bg-transparent px-2 pt-4 pb-1 text-lg focus:border-purple-500 focus:outline-none" />
                        <label for="academy"
                            class="absolute left-2 top-1 text-gray-500 text-sm transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-base peer-focus:top-1 peer-focus:text-sm peer-focus:text-purple-600">
                            Academy/Coach
                        </label>
                        <p v-if="form.errors.academy" class="text-red-500 text-sm mt-1">{{ form.errors.academy }}</p>
                    </div>

                    <!-- Teacher -->
                    <div class="relative">
                        <input v-model="form.teacher" type="text" id="teacher" placeholder=" "
                            class="peer w-full border-b-2 border-gray-300 bg-transparent px-2 pt-4 pb-1 text-lg focus:border-purple-500 focus:outline-none" />
                        <label for="teacher"
                            class="absolute left-2 top-1 text-gray-500 text-sm transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-base peer-focus:top-1 peer-focus:text-sm peer-focus:text-purple-600">
                            Teacher
                        </label>
                        <p v-if="form.errors.teacher" class="text-red-500 text-sm mt-1">{{ form.errors.teacher }}</p>
                    </div>

                    <!-- Payment Screenshot -->
                    <div class="relative py-2">
                                             <label
                            class="ps-2 text-gray-500 text-sm transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-base peer-focus:top-1 peer-focus:text-sm peer-focus:text-purple-600">
                            Upload Payment Screenshot
                        </label>
                        <input type="file" @change="form.payment_screenshot = $event.target.files[0]"
                            class="peer w-full border-b-2 border-gray-300 bg-transparent px-2 pt-2 pb-1 text-lg focus:border-purple-500 focus:outline-none" />
   
                        <p v-if="form.errors.payment_screenshot" class="text-red-500 text-sm mt-1">{{
                            form.errors.payment_screenshot }}</p>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full py-3 rounded-xl bg-gradient-to-r from-purple-600 to-pink-500 text-white font-bold shadow-lg hover:opacity-90 transform hover:scale-[1.02] transition duration-300">
                        🚀 Register Now
                    </button>

                </form>
            </div>
        </div>
        <div v-if="status === 'success'"
            class="p-6 bg-green-100 border border-green-300 rounded-xl text-green-800 shadow-lg">
            ✅ {{ message }}
            <div v-if="id" class="mt-2 text-sm text-gray-700">
                Your Registration ID: <b>{{ id }}</b>
            </div>
        </div>
    </BaseLayout>
</template>
