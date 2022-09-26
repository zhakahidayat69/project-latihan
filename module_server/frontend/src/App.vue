<template>
  <Navbar />
  <router-view/>
</template>

<script>
import Navbar from '@/components/Navbar.vue';

export default {
  components: {
    Navbar
  }
}
</script>

<style>
.btn-outline-main {
  color: #38416F;
  border: 1px solid #38416F;
  background-color: white;
}
.btn-outline-main:hover {
  color: white !important;
  border: 1px solid #38416F !important;
  background-color: #38416F !important;
}


</style>