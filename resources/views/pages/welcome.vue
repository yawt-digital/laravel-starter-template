<template>
  <div
    class="bg-animate flex h-screen w-screen flex-col items-center justify-center bg-gradient-to-br from-[rgb(16_23_42)] via-slate-800 to-slate-900">
    <Logo class="wiggle w-80 md:w-96" />

    <p class="text-white">Powered by Typescript, Vue 3, InertiaJS and Laravel</p>
  </div>
</template>

<style>
.bg-animate {
  background-size: 400%;
  background-repeat: no-repeat;
  -webkit-animation: flow 15s ease infinite;
  -moz-animation: flow 15s ease infinite;
  animation: flow 15s ease infinite;
}

.wiggle:hover {
  animation: wiggle 0.5s ease forwards;
  -webkit-animation: wiggle 0.5s ease forwards;
  -moz-animation: wiggle 0.5s ease forwards;
}

@keyframes flow {
  0%,
  100% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
}

@keyframes wiggle {
  0%,
  40% {
    transform: rotate(-3deg);
  }
  20%,
  80% {
    transform: rotate(3deg);
  }
  100% {
    transform: rotate(0deg);
  }
}
</style>
