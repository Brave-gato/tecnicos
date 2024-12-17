<template>
  <div>
    <h1>Dashboard Admin</h1>
    <p>Bienvenue dans le tableau de bord des administrateurs !</p>

    <!-- Exemple d'affichage d'un tableau des utilisateurs -->
    <table class="min-w-full table-auto border-collapse border border-gray-300">
      <thead>
        <tr>
          <th class="px-4 py-2 border-b">Nom</th>
          <th class="px-4 py-2 border-b">Email</th>
          <th class="px-4 py-2 border-b">Rôle</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users" :key="user.id">
          <td class="px-4 py-2 border-b">{{ user.name }}</td>
          <td class="px-4 py-2 border-b">{{ user.email }}</td>
          <td class="px-4 py-2 border-b">{{ user.role }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const users = ref([]);

// Charger les utilisateurs à partir d'une API ou d'un prop
onMounted(() => {
  // Ici, tu peux appeler une API ou charger des données via des props
  // Pour l'exemple, nous allons juste ajouter quelques utilisateurs fictifs
  users.value = [
    { id: 1, name: 'Admin User', email: 'admin@example.com', role: 'admin' },
    { id: 2, name: 'Technician User', email: 'technician@example.com', role: 'technician' },
    { id: 3, name: 'Regular User', email: 'user@example.com', role: 'technician' }
  ];
});
</script>

<style scoped>
h1 {
  font-size: 2rem;
  margin-bottom: 20px;
}

table {
  width: 100%;
  margin-top: 20px;
}

th, td {
  text-align: left;
}
</style>
