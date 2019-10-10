<template>
  <router-link class="event-link" :to="{ name: 'event-show', params: { id: stockList.id } }">
    <v-card
      max-width="480"
      class="mx-auto"
    >
      
      <v-list-item three-line>
        
        <v-icon size="40">mdi-folder</v-icon>
        
        <v-list-item-content>
          <v-list-item-title class="headline mb-1">{{stockList.name}}</v-list-item-title>
        </v-list-item-content>

        <v-card-actions>
          <v-icon>mdi-trash-can-outline</v-icon>
          <v-icon>mdi-file-document-edit</v-icon>
        </v-card-actions>
      </v-list-item>      
      
    </v-card>
  </router-link>
</template>

<script>
    export default {
      props:{
        stockList: Object,
      }
    }
</script>

<style scoped>

</style>