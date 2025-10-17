<script setup lang="ts">
import BaseLayout from '@/layouts/BaseLayout.vue';
import { ref, computed } from 'vue';
import { CheckCircleIcon, XCircleIcon, ArrowLeftIcon, DownloadIcon } from 'lucide-vue-next';

// Props
const props = defineProps<{
  status: 'success' | 'error';
  message: string;
  id?: number | string;
}>();

const isSuccess = computed(() => props.status === 'success');
</script>

<template>
  <BaseLayout>
    <div
      class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-700 via-pink-600 to-red-500 relative overflow-hidden"
    >
      <!-- Floating gradient orbs for background effect -->
      <div class="absolute top-10 left-10 w-40 h-40 bg-white/10 rounded-full blur-3xl animate-pulse"></div>
      <div class="absolute bottom-20 right-20 w-60 h-60 bg-purple-400/20 rounded-full blur-3xl animate-ping"></div>

      <div
        class="relative bg-white/20 backdrop-blur-xl border border-white/30 rounded-3xl shadow-2xl p-10 text-center max-w-lg w-full animate-fade-in"
      >
        <!-- Icon -->
        <div
          class="flex justify-center items-center mb-6"
        >
          <component
            :is="isSuccess ? CheckCircleIcon : XCircleIcon"
            class="w-20 h-20"
            :class="isSuccess ? 'text-green-400' : 'text-red-400'"
          />
        </div>

        <!-- Message -->
        <h2
          class="text-3xl font-extrabold mb-4 bg-clip-text text-transparent bg-gradient-to-r from-purple-300 to-pink-400"
        >
          {{ isSuccess ? 'Registration Successful!' : 'Something Went Wrong' }}
        </h2>
        <p
          class="text-white/90 text-lg mb-6 leading-relaxed"
        >
          {{ props.message }}
        </p>

        <!-- Registration ID (if success) -->
        <div
          v-if="isSuccess && props.id"
          class="bg-white/10 border border-white/20 text-white text-sm py-3 px-5 rounded-xl mb-6"
        >
          <span class="text-white/70">Your Registration ID:</span>
          <span class="font-semibold text-white ml-2">{{ props.id }}</span>
        </div>

        <!-- Buttons -->
        <div class="flex justify-center gap-4">
          <button
            v-if="isSuccess"
            class="flex items-center gap-2 bg-gradient-to-r from-green-400 to-emerald-500 text-white px-5 py-3 rounded-xl font-semibold shadow-lg hover:opacity-90 transition"
          >
            <DownloadIcon class="w-4 h-4" /> Download Receipt
          </button>
          <a
            href="/"
            class="flex items-center gap-2 bg-white/20 border border-white/30 text-white px-5 py-3 rounded-xl font-semibold shadow-md hover:bg-white/30 transition"
          >
            <ArrowLeftIcon class="w-4 h-4" /> Go Back Home
          </a>
        </div>
      </div>
    </div>
  </BaseLayout>
</template>

<style scoped>
@keyframes fade-in {
  from {
    opacity: 0;
    transform: scale(0.95);
  }
  to {
    opacity: 1;
    transform: scale(1);
  }
}

.animate-fade-in {
  animation: fade-in 0.8s ease-out;
}
</style>
