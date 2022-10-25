<template>
    <div class="table-responsive table-bordered text-center">
        <table class="table table-nowrap mb-0">
            <thead>
                <tr>
                    <th>SNAME</th>
                    <th>CPI</th>
                    <th>QUOTA</th>
                    <th>TOTAL</th>
                    <th>LINK</th>
                    <th>COMPLETE</th>
                    <th>TERMINATE</th>
                    <th>QUOTAFULL</th>
                    <th>INCOMPLETE</th>
                    <th>LOI</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody v-if="vendors.length > 0">
                <tr v-for="(vendor, key) in vendors" :key="key">
                    <td>{{ vendor.supplier.name }}</td>
                    <td>{{ vendor.cpi }}</td>
                    <td>{{ vendor.no_of_completes }}</td>
                    <td>{{ vendor.no_of_completes }}</td>
                    <td><button class="btn btn-secondary btn-sm link-btn" :data-link="vendor.survey_link">Copy
                            Link</button>
                    </td>
                    <td>{{ vendor.completes.length }}</td>
                    <td>{{ vendor.terminate.length }}</td>
                    <td>{{ vendor.quotafull.length }}</td>
                    <td>{{ vendor.incomplete.length }}</td>
                    <td>{{ vendor.project.loi }} Min</td>
                    <td>
                        <button class="btn btn-primary btn-sm edit-supplier" :data-id="vendor.id"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit Supplier"><i
                                class=" ri-edit-box-line"></i></button>
                        <button class="btn btn-danger btn-sm delete-supplier"
                            :href="`/supplier/project/delete/` + vendor.id" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="Delete Supplier"><i
                                class="ri-delete-bin-line"></i></button>
                        <a target="_blank" :href="`/supplier-project/download?pid=` + vendor.id"
                            class="btn btn-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="Download Report"><i class=" ri-download-cloud-2-line"></i></a>
                        <a :href="vendor.survey_link" target="_blank" class="btn btn-secondary btn-sm"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Test Link"><i
                                class="ri-links-line"></i></a>
                        <button class="btn btn-info btn-sm btn-fetch" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="Fetch Supplier Details"><i
                                class=" ri-file-list-line"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    data() {
        return {
            vendors: []
        }
    },
    mounted() {
        this.getData();
    },
    methods: {
        getData() {
            axios.get('/project/670549ee-58a4-4b0e-a41c-4ba78b1ba3b3').then((response) => {
                this.vendors = response.data.data;
            })
        }
    }
}
</script>
