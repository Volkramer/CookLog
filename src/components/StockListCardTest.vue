<template>
  
    <v-card
      max-width="480"
      class="mx-auto"
    >
      
      <v-list-item three-line>
        <v-list-item-avatar
          tile
          size="40"
          color="grey"
        >
          <img src="https://static.openfoodfacts.org/images/products/305/110/020/0170/front_fr.4.full.jpg" alt="nom du produit" >
        </v-list-item-avatar>
        <v-list-item-content>
          <v-list-item-title class="headline mb-1">Farine a Pizza - - 1kg</v-list-item-title>
          <v-list-item-subtitle>dlc/dluo: 03/20</v-list-item-subtitle>
          <v-list-item-subtitle>quantité: 1</v-list-item-subtitle>
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