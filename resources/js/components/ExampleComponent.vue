<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Example Component</div>

          <div class="card-body">I'm an example component.</div>
        </div>

        <ul>
          <li v-bind:key="arrItem.id " v-for="arrItem in arrayOfItems">{{arrItem.title}}</li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    arrayOfItems: Array
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
