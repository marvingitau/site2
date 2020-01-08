<template>
  <div class="elaine">
    <p>My name id {{ name }}</p>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log(" El Component mounted.");
  },

  data() {
    name: String;
  },
  methods() {}
};
</script>

<style scoped>
</style>