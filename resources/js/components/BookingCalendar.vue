<template>
    <div>
        <!-- <VCalendar v-model.range="range" :attributes="attributes" :min-date='new Date()' is-range /> -->
        <VDatePicker v-model.range="range" :attributes="attributes" :min-date='new Date()' />
    </div>
</template>

<script setup>
import { ref } from 'vue'

const today = new Date().toISOString().split('T')[0];

const attributes = ref([
  {
    key: 'today',
    highlight: {
      fillMode: 'solid',
      contentClass: 'today'
    },
    // dates: today
  }
]);

const range = ref({
    start: new Date(),
    end: new Date()
})
</script>