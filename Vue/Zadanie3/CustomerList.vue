<template>
  <div>
    <div>
      <input v-model="searchTerm" placeholder="Szukaj klienta" @input="handleSearch" />
      <button @click="resetSearch">Resetuj</button>
    </div>
    <customer-table :customers="displayedCustomers" @sort="handleSort" />
    <div>
      <button @click="prevPage">Poprzednia strona</button>
      <button @click="nextPage">Następna strona</button>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import CustomerTable from "./CustomerTable";

export default {
  components: {
    CustomerTable,
  },
  data() {
    return {
      customers: [], // Tu powinna być lista klientów pobrana z API
      displayedCustomers: [], // Tutaj trzymamy dane wyświetlane na danej stronie
      currentPage: 1,
      itemsPerPage: 10,
      searchTerm: "",
    };
  },
  methods: {
    fetchData() {
      // Tutaj można użyć axios do pobrania danych klientów z API
      // np. axios.get("/api/customers").then((response) => this.customers = response.data);
      // W tym przykładzie użyję danych z tablicy.
      this.customers = [
        { id: 1, name: "Jan Kowalski", email: "jan@example.com", age: 35 },
        //...
        // Dodaj inne dane klientów
      ];
      this.updateDisplayedCustomers();
    },
    updateDisplayedCustomers() {
      const startIndex = (this.currentPage - 1) * this.itemsPerPage;
      const endIndex = startIndex + this.itemsPerPage;
      this.displayedCustomers = this.customers.slice(startIndex, endIndex);
    },
    handleSort(sortKey) {
      // Tu można zaimplementować sortowanie po wybranej kolumnie
      // np. this.customers.sort((a, b) => a[sortKey] - b[sortKey])
    },
    handleSearch() {
      // Tu można zaimplementować filtrowanie na podstawie searchTerm
      // np. this.displayedCustomers = this.customers.filter(customer => customer.name.toLowerCase().includes(this.searchTerm.toLowerCase()));
    },
    resetSearch() {
      this.searchTerm = "";
      this.handleSearch();
    },
    prevPage() {
      if (this.currentPage > 1) {
        this.currentPage--;
        this.updateDisplayedCustomers();
      }
    },
    nextPage() {
      const totalPages = Math.ceil(this.customers.length / this.itemsPerPage);
      if (this.currentPage < totalPages) {
        this.currentPage++;
        this.updateDisplayedCustomers();
      }
    },
  },
  created() {
    this.fetchData();
  },
};
</script>
