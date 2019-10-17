<template>
  <div>
    <h2>Liste des stocks</h2>
    <br>
    <AddStockToList />
    <br>
    <StockListsCard v-for="stockList in stockLists" :key="stockList.id" :stockList="stockList" />
  </div>
</template>

<script>
import StockListsCard from "@/components/StockListsCard.vue";
import StockService from "../services/StockService";
import AddStockToList from "@/components/AddStockToList";

  export default {
    components:{
      StockListsCard,
      AddStockToList,
    },
    data(){
      return{
        stockLists:[]
      }
    },
    created(){
      StockService.getStockLists()
        .then(response => {
          this.stockLists=response.data;
        })
        .catch(error => {
          console.log(error);
        })
    }
  }
</script>

<style lang="scss" scoped>

</style>