import { ref } from 'vue';

export const useTemperatureUnit = () => {
  const currentUnit = ref<'c' | 'f'>('c');

  const setUnit = (val: 'c' | 'f') => {
    currentUnit.value = val;
  };

  return {
    currentUnit,
    setUnit,
  };
};
