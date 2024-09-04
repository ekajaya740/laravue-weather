import { ref } from 'vue';

export const useModal = () => {
  const open = ref(false);

  const setOpen = (val: boolean) => {
    open.value = val;
  };

  return {
    open,
    setOpen,
  };
};
