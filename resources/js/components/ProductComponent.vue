<template>
    <tr>
        <th>{{ name }}</th>
        <td><input type="text" class="form-control" :placeholder="'x'+stock"></td>
        <td><input type="text" class="form-control" placeholder="x1"></td>
    </tr>
</template>

<script>
    export default {
        props:['name', 'stock'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
