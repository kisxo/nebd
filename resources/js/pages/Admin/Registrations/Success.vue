<script setup lang="ts">
import BaseLayout from '@/layouts/BaseLayout.vue';

// Props typing using TypeScript
const props = defineProps<{
  status: 'success' | 'error';
  message: string;
  id?: number | string;
}>();
</script>

<template>
  <BaseLayout>
  <div class="min-h-screen flex items-center justify-center bg-gray-100 p-6">
    <!-- Success message -->
    <div
      v-if="props.status === 'success'"
      class="bg-green-100 border border-green-300 text-green-800 p-6 rounded-xl shadow-lg max-w-md text-center"
    >
      ✅ {{ props.message }}
      <div v-if="props.id" class="mt-2 text-sm text-gray-700">
        Your Registration ID: <b>{{ props.id }}</b>
      </div>
    </div>

    <!-- Error message -->
    <div
      v-else
      class="bg-red-100 border border-red-300 text-red-800 p-6 rounded-xl shadow-lg max-w-md text-center"
    >
      ❌ {{ props.message }}
    </div>
  </div>
  </BaseLayout>
</template>
