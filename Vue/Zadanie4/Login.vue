<template>
  <div>
    <input v-model="username" type="text" placeholder="Username" />
    <input v-model="password" type="password" placeholder="Password" />
    <button @click="login">Login</button>
  </div>
</template>

<script>
import { useAuthStore } from '../store';

export default {
  data() {
    return {
      username: '',
      password: '',
    };
  },
  methods: {
    login() {
      // Wykonaj logikę logowania, np. sprawdzając dane użytkownika w serwisie
      const user = { username: this.username, /* inne dane użytkownika */ };

      // Zapisz zalogowanego użytkownika w store Pinii
      useAuthStore().login(user);

      // Przekieruj użytkownika na stronę po zalogowaniu
      this.$router.push('/dashboard');
    },
  },
};
</script>
