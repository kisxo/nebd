<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import type { Registration, BreadcrumbItem } from '@/types';

interface Props {
  registration: Registration;
}

const props = defineProps<Props>();

const breadcrumbs: BreadcrumbItem[] = [
  { title: 'Registrations', href: '/admin/registrations' },
  { title: `#${props.registration.id}`, href: `/admin/registrations/${props.registration.id}` },
];
</script>

<template>
  <Head :title="`Registration #${props.registration.id}`" />

  <AppLayout :breadcrumbs="breadcrumbs">
    <div class="w-full bg-white shadow-md rounded-2xl p-8 m-6 border border-gray-200">
      <h2 class="text-2xl font-bold mb-6 text-indigo-700">
        Registration Details
      </h2>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700">
        <div>
          <p class="font-semibold text-gray-900">Full Name:</p>
          <p>{{ props.registration.fullName }}</p>
        </div>

        <div>
          <p class="font-semibold text-gray-900">Father’s Name:</p>
          <p>{{ props.registration.fatherName }}</p>
        </div>

        <div>
          <p class="font-semibold text-gray-900">Address:</p>
          <p>{{ props.registration.address }}</p>
        </div>

        <div>
          <p class="font-semibold text-gray-900">Phone:</p>
          <p>{{ props.registration.phone }}</p>
        </div>

        <div>
          <p class="font-semibold text-gray-900">Email:</p>
          <p>{{ props.registration.email }}</p>
        </div>

        <div>
          <p class="font-semibold text-gray-900">Academy:</p>
          <p>{{ props.registration.academy }}</p>
        </div>

        <div>
          <p class="font-semibold text-gray-900">Event:</p>
          <p>{{ props.registration.event }}</p>
        </div>

        <div>
          <p class="font-semibold text-gray-900">Category:</p>
          <p>{{ props.registration.category }}</p>
        </div>
      </div>

      <!-- Payment Screenshot -->
      <div v-if="props.registration.payment_screenshot" class="mt-8">
        <p class="font-semibold text-gray-900 mb-2">Payment Screenshot:</p>
        <img
          :src="props.registration.payment_screenshot"
          alt="Payment Screenshot"
          class="rounded-lg border border-gray-300 shadow-sm max-h-96 object-contain"
        />
      </div>

      <div class="mt-8 text-right">
        <a
          href="/admin/registrations"
          class="inline-block px-4 py-2 rounded-xl bg-indigo-600 text-white font-medium hover:bg-indigo-700 transition-all"
        >
          Back to List
        </a>
      </div>
    </div>
  </AppLayout>
</template>
