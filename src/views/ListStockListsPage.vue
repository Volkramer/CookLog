<template>
  <div>
    <h2>Liste des stocks</h2>
    <br />
    <AddStockToList />
    <br />
    <StockListsCard v-for="stockList in stockLists" :key="stockList.id" :stockList="stockList" />
  </div>
</template>

<script>
import StockListsCard from "@/components/StockListsCard.vue";
import AddStockToList from "@/components/AddStockToList";
import Axios from "axios";

export default {
  components: {
    StockListsCard,
    AddStockToList
  },
  data() {
    return {
      stockLists: [],
      stockList: {}
    };
  },
  mounted() {
    Axios({
      url: "http://api.cooklog.local/api/stocklist",
      method: "GET"
    }).then(resp => {
      this.stockLists = resp.data.data;
    });
  }
};
</script>

<style lang="scss" scoped>
</style>