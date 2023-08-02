<template>
  <div>
    <h2>Client List</h2>
    <ul>
      <li v-for="client in clients" :key="client.email">
        {{ client.name }} ({{ client.email }}) - {{ client.phone }}
        <button @click="editClient(client)">Edit</button>
        <button @click="removeClient(client.email)">Delete</button>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  props: {
    clients: Array
  },
  methods: {
    editClient(client) {
      this.$emit('edit-client', client);
    },
    removeClient(email) {
      this.$emit('remove-client', email);
    }
  }
}
</script>
