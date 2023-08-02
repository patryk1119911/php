<template>
  <tr>
    <td>{{ customer.name }}</td>
    <td>{{ customer.email }}</td>
    <td>{{ customer.age }}</td>
  </tr>
</template>

<script>
export default {
  props: {
    customer: {
      type: Object,
      required: true,
    },
  },
};
</script>
