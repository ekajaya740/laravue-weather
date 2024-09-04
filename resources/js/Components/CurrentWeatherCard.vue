<script setup lang="ts">
import { useTemperatureUnit } from '@/composables/useTemperatureUnit';
import { currentWeatherType } from '@/schemas/currentWeather';

const { currentUnit, setUnit } = useTemperatureUnit()

defineProps<{
  weatherData: currentWeatherType
} > ();
</script>

<template>
  <div class='bg-black/20 backdrop-blur-sm px-8 py-4 w-fit h-fit text-white' >
    <div class='space-y-3'>
      <div class='flex md:flex-row flex-col justify-between items-center gap-4 w-full'>
        <div class='flex justify-start items-center gap-1 space-x-3'>
          <p class='font-bold text-6xl text-white' v-if='currentUnit === "c"'>
            {{ weatherData?.current.temp_c }}°
          </p>
          <p class='font-bold text-6xl text-white' v-if='currentUnit === "f"'>
            {{ weatherData?.current.temp_f }}°
          </p>
          <div class='flex flex-col'>
            <button :class="{ 'hover:font-bold text-white': true, 'text-lg font-bold underline': currentUnit === 'c'}" @click='setUnit("c")'>C</button>
            <button :class="{ 'hover:font-bold text-white': true, 'text-lg font-bold underline': currentUnit === 'f'}" @click='setUnit("f")'>F</button>
          </div>
        </div>
        <img :src='weatherData?.current.condition.icon'/>
      </div>
      <div>
        <p>{{ weatherData?.location.name }}</p>
        <p>{{ weatherData?.location.region }}, {{ weatherData?.location.country }}</p>
      </div>
    </div>
  </div>
</template>
