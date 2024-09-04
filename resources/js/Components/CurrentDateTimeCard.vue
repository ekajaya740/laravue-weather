<script lang="ts">
import { useCurrentDateTime } from "../composables/useCurrentDateTime";
import { defineComponent } from 'vue';

export default defineComponent({ 
  name: "DateTimeCard",
  setup() {
    const { currentDateTime,  } = useCurrentDateTime();
    return { currentDateTime };
  },
});



</script>

<template>
  <div class='bg-black/40 backdrop-blur-sm px-6 py-4 w-fit h-fit text-white' >
    <div class='space-y-2 text-end'>
        <p class='font-bold text-4xl'>{{ currentDateTime.format('hh:mm A') }}</p>
        <p class='text-lg'>{{ currentDateTime.format('dddd, DD MMMM YYYY') }}</p>
    </div>
  </div>
</template>
