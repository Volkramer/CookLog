<template>

    <v-content>
      <HelloWorld />
      <h2>Test Home</h2>
      <v-container>
        <h2>Test Home Container</h2>
      </v-container>
    </v-content>
      

</template>

<script>
import HelloWorld from '@/components/HelloWorld';

export default {
  name: 'home',
  components: {
    HelloWorld,
  },
  data: () => ({
    //
  }),
};
</script>

