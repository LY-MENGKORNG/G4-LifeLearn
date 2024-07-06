<template>
  <el-table :data="grades" style="width: 100%">
    <el-table-column label="Grade" prop="grade_number" />
    <el-table-column label="System" prop="system_id" />
    <el-table-column label="Action">
      <template #default="scope">
        <el-button size="small" @click="handleEdit(scope.$index, scope.row)">Edit</el-button>
        <el-button size="small" type="danger" @click="handleDelete(scope.$index, scope.row)">Delete</el-button>
      </template>
    </el-table-column>
  </el-table>
</template>

<script lang="ts" setup>
import { computed, ref, defineProps } from 'vue';

interface Grade {
  grade_number: string;
  system_id: string;
  status: number;
}

const props = defineProps<{ grades: Grade[] }>();

// const search = ref('');
// const filterTableData = computed(() =>
//   props.grades.filter((data) =>
//       !search.value || data.grade.toLowerCase().includes(search.value.toLowerCase())
//   )
// );

const handleEdit = (index: number, row: Grade) => {
  console.log(index, row);
};

const handleDelete = (index: number, row: Grade) => {
  console.log(index, row);
};
</script>
