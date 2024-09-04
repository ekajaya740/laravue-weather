import dayjs from 'dayjs';
import { ref, onBeforeUnmount } from 'vue';

export const useCurrentDateTime = () => {
  const currentDateTime = ref(dayjs());

  const updateCurrentTime = () => {
    currentDateTime.value = dayjs();
  };

  const updateTimeInterval = setInterval(updateCurrentTime, 1000);
  onBeforeUnmount(() => {
    clearInterval(updateTimeInterval);
  });
  
  return {
    currentDateTime,
  };
};
