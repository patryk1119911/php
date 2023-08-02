<template>
  <div>
    <h2 v-if="!editing">Add Client</h2>
    <h2 v-else>Edit Client</h2>
    <form @submit.prevent="saveClient">
      <div>
        <label>Name:</label>
        <input v-model="name" required />
      </div>
      <div>
        <label>Email:</label>
        <input v-model="email" type="email" required />
      </div>
      <div>
        <label>Phone:</label>
        <input v-model="phone" type="tel" required />
      </div>
      <button type="submit">{{ editing ? 'Save' : 'Add' }}</button>
      <button v-if="editing" type="button" @click="cancelEdit">Cancel</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: '',
      email: '',
      phone: '',
      editing: false
    };
  },
  methods: {
    saveClient() {
      const client = {
        name: this.name,
        email: this.email,
        phone: this.phone
      };
      this.$emit('save-client', client);
      this.clearForm();
    },
    cancelEdit() {
      this.editing = false;
      this.clearForm();
    },
    clearForm() {
      this.name = '';
      this.email = '';
      this.phone = '';
    },
    editClient(client) {
      this.editing = true;
      this.name = client.name;
      this.email = client.email;
      this.phone = client.phone;
    }
  }
}
</script>
