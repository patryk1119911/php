<template>
  <table>
    <thead>
      <tr>
        <th @click="sort('name')">Imię</th>
        <th @click="sort('email')">Email</th>
        <th @click="sort('age')">Wiek</th>
      </tr>
    </thead>
    <tbody>
      <customer-item v-for="customer in customers" :key="customer.id" :customer="customer" />
    </tbody>
  </table>
</template>

<script>
import CustomerItem from "./CustomerItem";

export default {
  components: {
    CustomerItem,
  },
  props: {
    customers: {
      type: Array,
      required: true,
    },
  },
  methods: {
    sort(sortKey) {
      this.$emit("sort", sortKey);
    },
  },
};
</script>
