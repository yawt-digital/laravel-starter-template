<script lang="ts" setup>
defineProps<{ appVersion: String }>();
</script>

<template>
  <div class="flex h-screen w-screen flex-col items-center justify-center bg-[rgb(7_83_107)]">
    <Logo class="w-80 md:w-96" />

    <p class="mt-5 text-white">Powered by Typescript, Vue 3, InertiaJS and Laravel {{ appVersion }}</p>
  </div>
</template>
