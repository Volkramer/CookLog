<template>
  
    <v-card
      max-width="480"
      class="mx-auto"
    >
      
      <v-list-item three-line>

        <v-icon size="40">mdi-folder</v-icon>

        <v-list-item-content>
          <v-list-item-title class="headline mb-1">Test</v-list-item-title>
        </v-list-item-content>

        <v-card-actions>
          <v-icon>mdi-trash-can-outline</v-icon>
          <v-icon>mdi-file-document-edit</v-icon>
        </v-card-actions>

      </v-list-item>
      
    </v-card>
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