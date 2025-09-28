<script setup lang="ts">
import type { HTMLAttributes } from 'vue';
import logoImg from './../../assets/logo.png'

defineOptions({
    inheritAttrs: false,
});

interface Props {
    className?: HTMLAttributes['class'];
}

defineProps<Props>();
</script>

<template>
    <img :src="logoImg" alt="Step Up Dance Academy Logo">
</template>
