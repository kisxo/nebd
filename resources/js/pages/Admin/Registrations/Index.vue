<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { Registration, type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Registrations',
        href: dashboard().url,
    },
];

interface Props {
    registrations: Registration[]
}
const props = defineProps<Props>()
 
</script>

<template>

    <Head title="Registrations" />

    <AppLayout :breadcrumbs="breadcrumbs">
<table class="w-full border shadow-sm rounded-2xl overflow-hidden">
  <!-- Caption -->
  <caption class="text-gray-500 italic bg-gray-50 py-3">
    A list of your recent registrations
  </caption>

  <!-- Table Header -->
  <thead class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
    <tr>
      <th class="w-[90px] font-semibold text-left px-4 py-3">#ID</th>
      <th class="font-semibold text-left px-4 py-3">Full Name</th>
      <th class="font-semibold text-left px-4 py-3">Father’s Name</th>
      <th class="font-semibold text-left px-4 py-3">Address</th>
      <th class="font-semibold text-left px-4 py-3">Phone</th>
      <th class="font-semibold text-left px-4 py-3">Event</th>
      <th class="font-semibold text-right px-4 py-3">Action</th>
    </tr>
  </thead>

  <!-- Table Body -->
  <tbody>
    <tr
      v-for="registration in props.registrations"
      :key="registration.id"
      class="hover:bg-gray-50 transition-colors"
    >
      <!-- ID -->
      <td class="font-semibold text-gray-800 px-4 py-2">{{ registration.id }}</td>

      <!-- Name -->
      <td class="text-gray-700 px-4 py-2">{{ registration.fullName }}</td>

      <!-- Father Name -->
      <td class="text-gray-600 px-4 py-2">{{ registration.fatherName }}</td>

      <!-- Address -->
      <td class="text-gray-600 px-4 py-2 truncate max-w-[200px]">
        {{ registration.address }}
      </td>

      <!-- Phone -->
      <td class="text-gray-600 px-4 py-2">{{ registration.phone }}</td>
            <td class="text-gray-600 px-4 py-2">{{ registration.event }}</td>

<!-- 
      <td class="text-gray-500 px-4 py-2">
        {{
          new Date(registration.category).toLocaleString('en-CA', {
            year: 'numeric',
            month: '2-digit',
            day: '2-digit',
            hour: '2-digit',
            minute: '2-digit'
          })
        }}
      </td> -->

      <!-- Actions -->
      <td class="text-right px-4 py-2">
        <a
          :href="`/admin/registrations/${registration.id}`"
          class="inline-block px-3 py-1 border border-indigo-500 text-indigo-600 rounded-xl hover:bg-indigo-50 transition-all text-sm font-medium"
        >
          Details
        </a>
      </td>
    </tr>
  </tbody>
</table>


    </AppLayout>
</template>
