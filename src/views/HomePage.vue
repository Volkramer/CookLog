<template>

    <v-content>
      <v-container>
        <h1>Bienvenue sur CookLog</h1>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deserunt obcaecati officiis tenetur. Id a aliquid totam explicabo et earum atque sed, dolorum ducimus voluptatum, temporibus tenetur eveniet adipisci, ipsum fuga.</p>
        
        <v-btn outlined rounded class="signup">
          <v-icon left>mdi-account-plus</v-icon>
          s'inscrire
        </v-btn>
        
        <v-btn outlined rounded>
          <v-icon left>mdi-login</v-icon>
          se connecter
        </v-btn>
      </v-container>
    </v-content>
      

</template>

<script>

export default {
  name: 'home',
  components: {
  },
  data: () => ({
    //
  }),
};
</script>

<style scoped>
  .signup  {
    margin-right : 5px,
  }
</style>