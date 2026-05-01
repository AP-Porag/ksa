<template>
<!--    <div>-->
<!--        <button class="btn btn-primary" @click="prepareData">-->
<!--            Load & Download CSV-->
<!--        </button>-->

<!--        <download-csv-->
<!--            v-if="jsonData.length"-->
<!--            :data="jsonData"-->
<!--            name="labels.csv"-->
<!--        >-->
<!--            <button class="btn btn-success mt-2">-->
<!--                Download CSV-->
<!--            </button>-->
<!--        </download-csv>-->
<!--    </div>-->
    <div>
        <!-- Prepare Button -->
        <button
            v-if="!isReady"
            class="btn btn-primary"
            :disabled="loading"
            @click="prepareData"
        >
            <span v-if="loading">Preparing...</span>
            <span v-else>Prepare Data</span>
        </button>

        <!-- Download Button -->
        <button
            v-if="isReady"
            class="btn btn-success"
            @click="downloadCSV"
        >
            Download CSV
        </button>
    </div>
</template>

<script>
// import axios from 'axios'

// export default {
//     components: { 'download-csv': JsonCSV },
//     data() {
//         return {
//             jsonData: []
//         }
//     },
//
//     methods: {
//         async prepareData() {
//             const ids = window.selectedEntryIds || [];
//
//             if (!ids.length) {
//                 Swal.fire("Please select at least one row from the table!", "", "error");
//                 // alert('Please select at least one row');
//                 return;
//             }
//
//             const res = await axios.post('/admin/label/get/label-data', {
//                 ids: ids
//             });
//
//             this.jsonData = res.data;
//         }
//     }
// }

export default {
    data() {
        return {
            jsonData: [],
            loading: false,
            isReady: false
        }
    },

    methods: {
        async prepareData() {
            const ids = window.selectedEntryIds || [];

            if (!ids.length) {
                Swal.fire("Please select at least one row!", "", "error");
                return;
            }

            this.loading = true;
            this.isReady = false;

            try {
                const res = await axios.post('/admin/label/get/label-data', {
                    ids: ids
                });

                this.jsonData = res.data;

                if (!this.jsonData.length) {
                    Swal.fire("No data found!", "", "warning");
                    return;
                }

                this.isReady = true;

            } catch (error) {
                console.error(error);
                Swal.fire("Something went wrong!", "", "error");
            } finally {
                this.loading = false;
            }
        },

        downloadCSV() {
            if (!this.jsonData.length) return;

            const headers = [
                'id',
                'Year',
                'Manufacturer',
                'Card Number',
                'Name of Card',
                'Details',
                'Serial Number',
                'Grade',
                'Grade Exp',
                'Auto Grade'
            ];

            const chunkSize = 500;
            let csvRows = [];

            // Header row
            csvRows.push(headers.join(','));

            // Process in chunks
            for (let i = 0; i < this.jsonData.length; i += chunkSize) {
                const chunk = this.jsonData.slice(i, i + chunkSize);

                chunk.forEach(item => {
                    const row = headers.map(header => {
                        let val = item[header] ?? '';

                        // Escape quotes
                        val = String(val).replace(/"/g, '""');

                        // 🔥 Force Excel-safe text (prevents 1E+09 + left align)
                        return `="${val}"`;
                    });

                    csvRows.push(row.join(','));
                });
            }

            const csvString = csvRows.join('\n');

            // Excel UTF-8 fix
            const blob = new Blob(["\uFEFF" + csvString], {
                type: 'text/csv;charset=utf-8;'
            });

            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = `labels_${Date.now()}.csv`;

            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);

            // 🔥 Reset selection (important)
            window.selectedEntryIds = [];

            if (typeof $ !== 'undefined') {
                $('.row-checkbox').prop('checked', false);
                $('#select-all').prop('checked', false);
            }

            // Reset state
            this.isReady = false;
            this.jsonData = [];
        }
    }
}
</script>
