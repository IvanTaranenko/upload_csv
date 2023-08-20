<template>
    <div>
        <input type="file" @change="handleFileUpload" accept=".csv"/>
        <button @click="uploadFile">Import</button>
        <div>
            <h2>Uploaded Files:</h2>
            <ul>
                <li v-for="(file, index) in uploadedFiles" :key="file">
                    {{ file }}
                    <span v-if="uploadTimes[index]">Time taken: {{ uploadTimes[index] }} seconds</span>
                </li>

            </ul>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import router from "../router/index.js";

export default {
    data() {
        return {
            selectedFile: null,
            uploadStartTime: null,
            uploadEndTime: null,
            uploadedFiles:[],
            uploadTimes: [],

        };
    },
    computed: {
        timeTaken() {
            return ((this.uploadEndTime - this.uploadStartTime) / 1000).toFixed(2);
        },
    },
    mounted() {
        this.fetchUploadedFiles();
    },
    methods: {
        async fetchUploadedFiles() {
            try {
                const response = await axios.get("/api/get-uploaded-files");
                this.uploadedFiles = response.data.files;
                console.log( this.uploadedFiles);
            } catch (error) {
                console.error("Error fetching uploaded files:", error);
            }
        },
        handleFileUpload(event) {
            this.selectedFile = event.target.files[0];
            console.log('Selected file:', this.selectedFile);
        },
        async uploadFile() {
            if (!this.selectedFile) {
                alert("Please select a file before uploading.");
                return;
            }
            this.uploadStartTime = new Date();
            const formData = new FormData();
            formData.append("file", this.selectedFile);
            try {
                await axios.post("/api/upload", formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                });
                this.uploadEndTime = new Date();
                alert(`File uploaded successfully! Time taken: ${this.timeTaken} seconds`);
                router.push('/upload-csv');
                alert('Waiting for dowload all files');
                this.uploadTimes.push(this.timeTaken);
            } catch (error) {
                console.error("Error uploading file:", error);
                if (error.response && error.response.data && error.response.data.errors) {
                    console.error("Validation errors:", error.response.data.errors);
                }
            }
        },
    },
};
</script>
