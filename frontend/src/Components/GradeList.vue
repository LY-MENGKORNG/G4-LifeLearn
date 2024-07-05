<template>
    <el-table :data="filterTableData" style="width: 100%">
      <el-table-column label="Grade" prop="grade" />
      <el-table-column label="Date" prop="date" />
      <el-table-column label="Action">
        <!-- <template #header>
        </template> -->
        <template #default="scope">
          <el-button size="small" @click="handleEdit(scope.$index, scope.row)">
            Edit
          </el-button>
          <el-button
            size="small"
            type="danger"
            @click="handleDelete(scope.$index, scope.row)"
          >
            Delete
          </el-button>
        </template>
      </el-table-column>
    </el-table>
  </template>
  
  <script lang="ts" setup>
  import { computed, ref } from 'vue'
  
  interface User {
    date: string
    grade: string
    address: string
  }
  
  const search = ref('')
  const filterTableData = computed(() =>
    tableData.filter(
      (data) =>
        !search.value ||
        data.grade.toLowerCase().includes(search.value.toLowerCase())
    )
  )
  const handleEdit = (index: number, row: User) => {
    console.log(index, row)
  }
  const handleDelete = (index: number, row: User) => {
    console.log(index, row)
  }
  
  const tableData: User[] = [
    {
      date: '2016-05-03',
      grade: 'grade 1',
      address: 'No. 189, Grove St, Los Angeles',
    },
    {
      date: '2016-05-02',
      grade: 'grade 2',
      address: 'No. 189, Grove St, Los Angeles',
    },
    {
      date: '2016-05-04',
      grade: 'grade 3',
      address: 'No. 189, Grove St, Los Angeles',
    },
    {
      date: '2016-05-01',
      grade: 'grade 4',
      address: 'No. 189, Grove St, Los Angeles',
    },
  ]
  </script>
  