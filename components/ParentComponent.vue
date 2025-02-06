<template>
  <div>
    <FormComponent @add-assignment="addAssignment" />
    <ul>
      <li v-for="assignment in assignments" :key="assignment">{{ assignment }}</li>
    </ul>
  </div>
</template>

<script>
import FormComponent from './FormComponent.vue';

export default {
  components: {
    FormComponent
  },
  data() {
    return {
      assignments: []
    };
  },
  methods: {
    addAssignment(newAssignment) {
      this.assignments.push(newAssignment);
    }
  }
};
</script>

<style scoped>
/* Add your styles here */
</style>
