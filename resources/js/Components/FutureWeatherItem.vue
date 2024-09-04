<script setup lang="ts">
import { forecastDayType } from '@/schemas/forecastWeather';
import dayjs from 'dayjs';

defineProps<{
  forecast: forecastDayType
} > ();
</script>

<template>
  <div class='md:flex md:flex-col justify-between items-center gap-2 grid grid-cols-2 w-full md:w-fit'>
    <div>
        <p class='font-bold text-xl'>{{ dayjs(forecast.date).format("dddd") }}</p>
        <p>{{ dayjs(forecast.date).format("DD MMMM YYYY") }}</p>
    </div>
    <div class='flex flex-col items-center gap-1'>
      <img :src='forecast.day.condition.icon'/>
      <p class='text-center'>{{forecast.day.condition.text}}</p>
    </div>
  </div>
</template>