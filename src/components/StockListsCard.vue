<template>
  
    <v-card
      max-width="480"
      class="mx-auto"
    >
      
      <v-list-item three-line>

        <v-icon size="40">mdi-folder</v-icon>

        <v-list-item-content>
          <v-list-item-title class="headline mb-1 justify-content"> {{stock_lists.name}} </v-list-item-title>
        </v-list-item-content>
          
          <AddProductToStock />

        <v-card-actions>
          <v-btn fab small class="red--text">
            <v-icon>mdi-trash-can-outline</v-icon>
          </v-btn>
          <v-btn fab small class="primary--text">
            <v-icon>mdi-file-document-edit</v-icon>
          </v-btn>
        </v-card-actions>

      </v-list-item>
      <StockListCard 
        v-for='stock in stockList'
        :key='stock.id'
        />

      
    </v-card>
</template>

<script>
import StockListCard from "@/components/StockListCard";
import AddProductToStock from "@/components/AddProductToStock";
    export default {
      components:{
        StockListCard,
        AddProductToStock,
      },
      props:{
        stockList: Object,
      }
    }
</script>

<style scoped>

</style>