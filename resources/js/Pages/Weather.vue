<script lang="ts">
import CurrentDateTimeCard from '@/Components/CurrentDateTimeCard.vue';
import CurrentWeatherCard from '@/Components/CurrentWeatherCard.vue';
import FutureWeatherCard from '@/Components/FutureWeatherCard.vue';
import Modal from '@/Components/Modal.vue';
import { useCurrentDateTime } from '@/composables/useCurrentDateTime';
import { currentWeatherSchema } from '@/schemas/currentWeather';
import { forecastWeatherSchema } from '@/schemas/forecastWeather';

export default {
    name: "Weather",
    components: {
        CurrentDateTimeCard,
        CurrentWeatherCard,
        FutureWeatherCard,
    },
    props: {
        currentWeatherData: Object,
        forecastWeatherData: Object,

    },
    setup(props) {
        const { currentDateTime } = useCurrentDateTime();

        



        const pCurrentWeatherData = currentWeatherSchema.parse(props.currentWeatherData);

        const pForecastWeatherData = forecastWeatherSchema.parse(props.forecastWeatherData)

        return {
            currentDateTime,
            currentWeatherData: pCurrentWeatherData,
            forecastWeatherData: pForecastWeatherData,
        };
  }

};

</script>

<template>
    <section class='w-dvw h-dvh'>
        <img src='../../images/backgrounds/bg-night.jpg' class='-z-10 fixed w-full h-full'>
        <img src='../../images/backgrounds/bg-afternoon.jpg' class='-z-10 fixed w-full h-full' v-if='currentDateTime.hour() >=12 && currentDateTime.hour()<=18'>
        <img src='../../images/backgrounds/bg-morning.jpg' class='-z-10 fixed w-full h-full' v-if='currentDateTime.hour() >=6 && currentDateTime.hour()<=12'>
        <div class='flex flex-col gap-8 md:grid md:grid-cols-2 p-8 w-full h-full'>
            <div v-if='currentWeatherData'>
                <CurrentWeatherCard :weather-data='currentWeatherData' />
            </div>
            <div class='place-self-end self-start'>
                <CurrentDateTimeCard />
            </div>
            <div class='col-span-2' v-if='forecastWeatherData'>
                <FutureWeatherCard :weather-data='forecastWeatherData' />
            </div>
        </div>
        
    </section>
   
</template>
