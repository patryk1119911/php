<template>
  <div>
    <h2>Welcome, {{ user.username }}!</h2>
    <button @click="logout">Logout</button>
  </div>
</template>

<script>
import { useAuthStore } from '../store';

export default {
  computed: {
    user() {
      return useAuthStore().user;
    },
  },
  methods: {
    logout() {
      // Wykonaj logikę wylogowania, np. czyszczenie danych sesji na serwerze

      // Wyczyść dane użytkownika z store Pinii
      useAuthStore().logout();

      // Przekieruj użytkownika na stronę logowania
      this.$router.push('/login');
    },
  },
};
</script>
