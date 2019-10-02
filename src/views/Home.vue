<template>
  <LayoutCookLog>
    <v-content>
      <HelloWorld />
    </v-content>
      
  </LayoutCookLog>
</template>

<script>
import HelloWorld from '../components/HelloWorld';
import LayoutCookLog from "../layouts/LayoutCookLog";

export default {
  components: {
    HelloWorld,
    LayoutCookLog,
  },
};
</script>

