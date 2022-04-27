<script>
export default {
    props: ['title'],
  data() {
    return {
      count: 0,
    };
  },
};
</script>

<template>
  <button class="w3-button w3-card w3-round-large w3-grey">
      {{ title }}
    </button>
</template>