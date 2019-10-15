<template>
    <v-card max-width="600px">
      <v-card-title>
        <h2 class="title">Enregistrez vous</h2>
      </v-card-title>
      <v-card-text>
        <v-form class="px-3">
          <v-text-field label="username" v-model="username" required></v-text-field>
          <v-text-field label="email" v-model="email" required></v-text-field>
          <v-text-field label="password" v-model="password" required></v-text-field>
        </v-form>
      </v-card-text>
    </v-card>

</template>

<script>
  export default {
    data() {
      return {
        username:'',
        email:'',
        password:'',
      }
    }
  }
</script>

<style lang="scss" scoped>

</style>