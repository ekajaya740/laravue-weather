<script setup lang="ts">
import FutureWeatherItem from '@/Components/FutureWeatherItem.vue'
import { forecastWeatherType } from '@/schemas/forecastWeather';

defineProps<{
  weatherData: forecastWeatherType
}>()
</script>

<template>
  <div class='bg-black/20 backdrop-blur-sm px-8 py-4 w-full h-full text-white'>
    <div class='space-y-4'>
      <div class='space-y-3'>
        <h6 class='font-bold text-2xl'>Next 7 Days Forecast</h6>
        <div class='bg-white w-full h-0.5'></div>
      </div>
      <ul class='flex md:flex-row flex-col flex-wrap xl:justify-between items-center gap-6'>
        <li v-for='forecast in weatherData.forecast.forecastday' class='w-full md:w-fit' >
            <FutureWeatherItem :forecast='forecast'/>
        </li>
      </ul>
    </div>
  </div>
</template>