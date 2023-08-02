<template>
  <div>
    <client-form
      v-if="showForm"
      @save-client="addOrUpdateClient"
    />
    <client-list
      :clients="clients"
      @edit-client="editClient"
      @remove-client="removeClient"
    />
    <button @click="showForm = !showForm">
      {{ showForm ? 'Cancel' : 'Add Client' }}
    </button>
  </div>
</template>

<script>
import ClientList from './components/ClientList.vue';
import ClientForm from './components/ClientForm.vue';

export default {
  components: {
    ClientList,
    ClientForm
  },
  data() {
    return {
      clients: [],
      showForm: false
    };
  },
  methods: {
    addOrUpdateClient(client) {
      // Walidacja danych klienta
      if (!this.validateEmail(client.email)) {
        alert('Invalid email address. Please provide a valid email.');
        return;
      }

      if (!this.validatePhone(client.phone)) {
        alert('Invalid phone number. Please provide a valid phone number.');
        return;
      }

      const existingClientIndex = this.clients.findIndex(c => c.email === client.email);

      if (existingClientIndex !== -1) {
        // Edycja klienta
        this.clients.splice(existingClientIndex, 1, client);
      } else {
        // Dodawanie nowego klienta
        this.clients.push(client);
      }
    },
    editClient(client) {
      this.showForm = true;
      this.clientToEdit = client;
    },
    removeClient(email) {
      const index = this.clients.findIndex(c => c.email === email);
      if (index !== -1) {
        this.clients.splice(index, 1);
      }
    },
    validateEmail(email) {
      // Prosta walidacja adresu e-mail za pomocą wyrażenia regularnego
      const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
      return emailPattern.test(email);
    },
    validatePhone(phone) {
      // Prosta walidacja numeru telefonu za pomocą wyrażenia regularnego
      const phonePattern = /^[0-9]{9,15}$/;
      return phonePattern.test(phone);
    }
  }
};
</script>
