<template>
    <div>
        <button class="btn btn-primary" @click="prepareData">
            Load & Download CSV
        </button>

        <download-csv
            v-if="jsonData.length"
            :data="jsonData"
            name="labels.csv"
        >
            <button class="btn btn-success mt-2">
                Download CSV
            </button>
        </download-csv>
    </div>
</template>

<script>
import JsonCSV from 'vue-json-csv';
import axios from 'axios'

export default {
    components: { 'download-csv': JsonCSV },
    data() {
        return {
            jsonData: []
        }
    },

    methods: {
        async prepareData() {
            const ids = window.selectedEntryIds || [];

            if (!ids.length) {
                Swal.fire("Please select at least one row from the table!", "", "error");
                // alert('Please select at least one row');
                return;
            }

            const res = await axios.post('/admin/label/get/label-data', {
                ids: ids
            });

            this.jsonData = res.data;
        }
    }
}
</script>
